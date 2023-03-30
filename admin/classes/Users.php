<?php
// PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Importing PHPMailer files
require 'assets/PHPMailer/Exception.php';
require 'assets/PHPMailer/PHPMailer.php';
require 'assets/PHPMailer/SMTP.php';

session_start();
require_once("config/Config.php");
class Users extends Config
{
    // Admin's information table.
    protected function adminInfo()
    {
        return $this->con->query("SELECT * FROM `palki_admin`");
    }
    public function getUser()
    {
        return $this->adminInfo();
    }

    // Creating Admin Account
    public function createAdmin($data)
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pass = md5($_POST["password"]);
        $c_pass = md5($_POST["confirm_password"]);
        $img = $_POST["img_name"];
        $tempImg = $_POST["temp_name"];
        $role = 1;

        $count = 0;
        $adminData = $this->adminInfo();
        if ($adminData->num_rows > 0) {
            foreach ($adminData as $elm) {
                if ($elm["email"] === $email) {
                    $count++;
                }
            }
        }
        if ($count == 0) {
            if ($pass === $c_pass) {
                $sql = "INSERT INTO `palki_admin`(`id`, `user_name`, `email`, `password`, `image`, `role`) VALUES (null,'$name','$email','$pass','$img','$role')";
                $this->con->query($sql);
                move_uploaded_file($tempImg, "images/avater/" . $img);
                return 1;
            } else {
                return "Password doses not match!";
            }
        } else {
            return "You allready have an account!!";
        }
    }

    //Admin Login and Logout Authentication...
    public function loginAdmin($data)
    {
        $email = $data["email"];
        $pass = md5($data["password"]);
        $userEmail = "";
        $id = "";

        $adminData = $this->adminInfo();

        if ($adminData->num_rows > 0) {
            $count = 0;
            foreach ($adminData as $elm) {
                if ($elm["email"] === $email) {
                    $count++;
                    if ($elm["password"] === $pass) {
                        $count++;
                        $userName = $elm["user_name"];
                        $userEmail = $elm["email"];
                        $id = $elm["id"];
                        $img = $elm["image"];
                        $role = $elm["role"];
                    }
                }
            }
            if ($count == 0) {
                return "Please check your email!";
            } elseif ($count == 1) {
                return "Incorrect password! did you forgot the password?";
            } elseif ($count == 2) {
                $_SESSION["user_name"] = $userName;
                $_SESSION["user_id"] = $id;
                $_SESSION["user_email"] = $userEmail;
                $_SESSION["user_img"] = $img;
                $_SESSION["user_role"] = $role;
            }
        } else {
            return "Empty databse! Please create an account";
        }
    }
    public function adminLogout()
    {
        session_destroy();
        header("Location: index.php");
    }

    //Sending email to the user
    protected function sendMailToUser($name, $email, $password, $id)
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP(); //Send using SMTP
            $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
            $mail->SMTPAuth = true; //Enable SMTP authentication
            $mail->Username = 'nalve111007@gmail.com'; //SMTP username
            $mail->Password = 'biqkhkyrhcnnikmp'; //App password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Enable implicit TLS encryption
            $mail->Port = 587; //TCP port to connect to; use 465 for SSL

            //Recipients
            $mail->setFrom('nalve111007@gmail.com', 'Palki Auto Bot'); //My email
            $mail->addAddress($email, $name); //Add a recipient

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = 'Change password - Palki Admin Panel';
            $message = "<p>Hello {$name},</p>
            <br>
            <p>A request has been made to reset your password. If you did not request this, please ignore this email.</p>
            <p>To reset your password, click on the following link:</p>
            <p><a href='http://localhost/palki/admin/changepassword.php?token={$password}{$id}'>Reset Password</a></p>
            <p>If you have any questions or concerns, please contact us at nalve111007@gmail.com.</p>
            <br>
            <p>Thank you,</p>
            <p>MD Nwoshad Alam Chowdhury</p>
            <p>Admin - <a href='http://localhost/palki'>Palki</a></p>";
            $mail->Body = $message;

            //Send the email
            $mail->send();
            return 1;
        } catch (Exception $e) {
            return "Your email is not vaild or the server is busy! Please check your email or try again letter.";
        }
    }
    // Admin Reset Password
    public function adminResetPass($data)
    {
        $adminData = $this->adminInfo();
        $email = $data["email"];

        $count = 0;
        if ($adminData->num_rows > 0) {
            foreach ($adminData as $value) {
                if ($email === $value["email"]) {
                    $count++;
                    $password = $value["password"];
                    $name = $value["user_name"];
                    $id = $value["id"];
                }
            }
        }
        if ($count > 0) {
            $status = $this->sendMailToUser($name, $email, $password, $id);
            return $status;
        } else {
            return "No such account exist!!";
        }
    }
    // Check the token for reset password
    public function checkUserToken($data)
    {
        $adminData = $this->adminInfo();
        $count = 0;
        if ($adminData->num_rows > 0) {
            foreach ($adminData as $elm) {
                if ($elm["password"] . $elm["id"] === $data["token"]) {
                    $count++;
                }
            }
            if ($count > 0) {
                return 1;
            } else {
                return 0;
            }
        } else {
            header("Location: register.php");
        }
    }
    // Changing Password
    public function changePassword($data)
    {
        $id = $data["id"];
        $pass = md5($data["new_password"]);
        $c_pass = md5($data["confirm_password"]);
        if ($pass === $c_pass) {
            $sql = "UPDATE `palki_admin` SET `password`='$pass' WHERE `id` = '$id'";
            $response = $this->con->query($sql);
            if ($response) {
                return 1;
            } else {
                return "Something went wront! Try again letter";
            }
        } else {
            return "Password do not match";
        }
    }
    // Updating User info
    public function updateUser($data)
    {
        $id = $data["id"];
        $name = $data["user_name"];
        $email = $data["email"];
        $pass = md5($data["password"]);
        $confirm_pass = md5($data["confirm_pass"]);
        $img = $data["img"];
        $tmp = "";
        if ($pass === $confirm_pass) {
            if (isset($data["tmp"])) {
                move_uploaded_file($data["tmp"], "images/avater/".$img);
                $_SESSION["user_img"] = $img;
                // Get the image file path
                $prevImgPath = "images/avater/" . $data["prev_img"];
                // Delete the file
                if (file_exists($prevImgPath)) {
                    unlink($prevImgPath);
                }
            }
            // Sql
            $sql = "UPDATE `palki_admin` SET `user_name`='$name',`email`='$email',`password`='$pass',`image`='$img' WHERE `id`='$id'";
            $result = $this->con->query($sql);
            if($result){
                return 1;
            } else{
                return -1;
            }
        } else {
            return 0;
        }
    }
}

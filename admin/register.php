<?php
include("classes/Users.php");
$res = "";
if (isset($_POST["create_acc"])) {
    $user = new Users();
    if (isset($_FILES["admin_img"])) {
        $_POST["img_name"] = $_FILES["admin_img"]["name"];
        $_POST["temp_name"] = $_FILES["admin_img"]["tmp_name"];
    }
    $res = $user->createAdmin($_POST);
}
// Authentication
if (isset($_SESSION["user_email"]) && isset($_SESSION["user_id"])) {
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - Palki Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-light">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center vh-100 align-items-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg p-4">
                                <div class="card-header bg-primary text-light">
                                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                </div>
                                <!-- Alert -->
                                <?php
                                if ($res !== "") {
                                    if ($res == 1) { ?>
                                        <div class="alert alert-success alert-dismissible fade show mb-0 mt-3" role="alert">
                                            <?= "Account has been created! You can login now." ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php
                                        header("refresh:5;url=index.php");
                                    } else { ?>
                                        <div class="alert alert-warning alert-dismissible fade show mb-0 mt-3" role="alert">
                                            <?= $res ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                <?php
                                    }
                                    $res = "";
                                } else {
                                    $res = "";
                                }
                                ?>
                                <!-- Form -->
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name" required />
                                            <label for="inputEmail">Full name</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" required />
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputPassword" type="password" placeholder="Create a password" name="password" required />
                                                    <label for="inputPassword">Password</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" name="confirm_password" required />
                                                    <label for="inputPasswordConfirm">Confirm Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="mb-2" for="admin_img">Upload profile picture </label>
                                            <input class="form-control" id="admin_img" name="admin_img" type="file" accept=".png, .jpg, .jpeg" required />
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><input type="submit" class="btn btn-primary btn-block" value="Create Account" name="create_acc" /></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="index.php">Have an account? Go to login</a></div>
                                </div>
                                <div class="mt-2 text-center"><a class="btn btn-primary btn-md w-100" href="../">Back to home</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>
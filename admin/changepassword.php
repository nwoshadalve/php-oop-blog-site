<?php
include("classes/Users.php");
$user = new Users();
$res = "";
// Authentication
if (isset($_SESSION["user_email"]) && isset($_SESSION["user_id"])) {
    header("Location: dashboard.php");
}
if (isset($_GET["token"])) {
    $isTokenValid = $user->checkUserToken($_GET);
    if ($isTokenValid == 1) {
        if (isset($_POST["reset_password"])) {
            $_POST["id"] = substr($_GET["token"],-1);
            $res = $user->changePassword($_POST);
        }
    } else {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
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
    <title>Password Reset - Admin Palki</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-light">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center vh-100 align-items-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg p-4">
                                <div class="card-header bg-primary text-light">
                                    <h3 class="text-center font-weight-light my-4">Password Recovery</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Alert -->
                                    <?php
                                    if ($res !== "") {
                                        if ($res == 1) { ?>
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <?= "Password changed Successfully." ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        <?php
                                            header( "refresh:3;url=index.php" );
                                        } else { ?>
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
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
                                    <form method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="new_password" type="password" placeholder="name@example.com" name="new_password" required />
                                            <label for="new_password">Enter a new password</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="confirm_password" type="password" placeholder="name@example.com" name="confirm_password" required />
                                            <label for="confirm_password">Confirm password</label>
                                        </div>
                                        <div class="mt-3 mb-0">
                                            <button type="submit" class="btn btn-primary form-control" name="reset_password" value="reset">Save</button>
                                        </div>
                                    </form>
                                </div>
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
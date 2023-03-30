<?php
include("classes/Users.php");
$user = new Users();
$res = "";
if (isset($_POST["reset_password"])) {
    $res = $user->adminResetPass($_POST);
    if ($res == null) {
        $res = "";
    }
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
                                                <?= "A password reset link has been emailed." ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        <?php
                                            header( "refresh:5;url=index.php");
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
                                    <div class="small mb-3 text-muted">Enter your email address and a reset link will be send to your email address.</div>
                                    <form method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="email" required />
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="index.php">Return to login</a>
                                            <button type="submit" class="btn btn-primary" name="reset_password" value="reset">Reset Password</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
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
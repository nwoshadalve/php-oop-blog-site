<?php
require_once("classes/Users.php");
$user = new Users();
$users = $user->getUser();
if ($users->num_rows > 0) {
    foreach ($users as $elm) {
        if ($elm["id"] === $_SESSION["user_id"]) {
            $userData = $elm;
        }
    }
}
$res = "";
if (isset($_POST["update_user"])) {
    if (isset($_FILES["img"])) {
        if ($_FILES["img"]["name"] === "") {
            $_POST["img"] = $userData["image"];
        } else {
            $_POST["img"] = $_FILES["img"]["name"];
            $_POST["tmp"] = $_FILES["img"]["tmp_name"];
            $_POST["prev_img"] = $userData["image"];
        }
    }
    $res = $user->updateUser($_POST);
}
?>
<h1 class="mt-4">Settings</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">User account settings</li>
</ol>
<?php
if (isset($_GET["profileid"])) {
?>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form class="mt-5" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $userData["id"]; ?>">
                <div class="form-floating mb-3">
                    <input class="form-control" id="user_name" type="text" name="user_name" placeholder="Enter user name" value="<?= $userData["user_name"] ?>" required>
                    <label for="user_name">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="email" type="email" name="email" placeholder="Enter user email" value="<?= $userData["email"] ?>" required>
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="password" type="password" name="password" placeholder="Enter password" value="<?= $userData["password"] ?>" required>
                    <label for="user_name">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="confirm_pass" type="password" name="confirm_pass" placeholder="Enter password again" value="<?= $userData["password"] ?>" required>
                    <label for="user_name">Confirm Password</label>
                </div>
                <div class="form-group mb-3">
                    <label for="user_name">Update Photo (optional)</label>
                    <input class="form-control" id="img" type="file" name="img">
                </div>
                <div class="form-group text-center mb-3">
                    <a class="btn btn-primary me-3" href="settings.php">Back to Profile</a>
                    <button type="submit" class="btn btn-primary" name="update_user" value="Update user">Update User</button>
                    <?php
                    if ($res == 0) {
                    ?>
                        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                            <div id="customToast" class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                                <div class="toast-body bg-danger text-light">
                                    Password Does not Match!.
                                </div>
                            </div>
                        </div>
                    <?php
                    } elseif ($res == -1) {
                    ?>
                        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                            <div id="customToast" class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                                <div class="toast-body bg-warning text-light">
                                    Something went wrong!.
                                </div>
                            </div>
                        </div>
                    <?php
                    } elseif ($res == 1) {
                    ?>
                        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                            <div id="customToast" class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                                <div class="toast-body bg-success text-light">
                                    Updated successfully!.
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
<?php
} else {
?>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="user-info mt-5 text-center">
                <div class="img_container text-center">
                    <img src="images/avater/<?= $userData["image"]; ?>" alt="<?= $userData["user_name"] ?>" style="width: 100px; height: 100px; border: 1px solid rgba(0,0,0,0.5); object-fit: contain;">
                </div>
                <h4 class="text-center mt-2 h5">Name : <span class="lead"><?= $userData["user_name"]; ?></span></h4>
                <h4 class="text-center mt-2 h5">Email : <span class="lead"><?= $userData["email"]; ?></span></h4>
                <h4 class="text-center mt-2 h5">Role : <span class="lead"><?= $userData["role"] == 1 ? "Admin" : "User"; ?></span></h4>
                <a class="btn btn-primary text-center mt-3" href="?profileid=<?= $userData["id"]; ?>">Edit Profile</a>
            </div>
        </div>
    </div>
<?php
}
?>
<?php
require_once("classes/Categories.php");
$category = new Categories();
$res = "";
if (isset($_POST["submit_category"])) {
    $res = $category->addcategories($_POST);
    $_POST = null;
}
if (isset($_POST["update_category"])) {
    $res = $category->updateCategory($_POST);
    $_POST = null;
}
?>

<?php
if (isset($_GET["edit"])) {
    $catValues = $category->getUpdateableCat($_GET["edit"]);
    if (isset($catValues)) {
?>
        <h1 class="mt-4">Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Update the category</li>
        </ol>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="mt-5" action="" method="post">
                    <input type="hidden" name="id" value="<?= $catValues["id"] ?>">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="category_name" type="text" name="category" placeholder="Enter category name" value="<?= $catValues["cat_name"] ?>" required />
                        <label for="category_name">Update the category name</label>
                    </div>
                    <div class="form-group mb-3">
                        <textarea class="form-control" name="category_des" id="category_des" rows="5" placeholder="Write a short description(not more than 250 words)" style="resize: none;"><?= $catValues["cat_des"] ?></textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-dark" name="update_category" value="Update Category">Update Category</button>

                        <?php
                        if ($res == 1) {
                        ?>
                            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                                <div id="customToast" class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                                    <div class="toast-body bg-success text-light">
                                        Category updated.
                                    </div>
                                </div>
                            </div>
                        <?php
                            $url = "manage_category.php";
                            $rederict = '<html><head><meta http-equiv="refresh" content="1; url=' . $url . '"></head><body></body></html>';
                            echo $rederict;
                            $rederict = "";
                            echo $rederict;
                        } elseif ($res == 0) {
                        ?>
                            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                                <div id="customToast" class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                                    <div class="toast-body bg-warning text-dark">
                                        Can not insert duplicate category name!
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        $res = "";
                        ?>
                    </div>
                </form>
            </div>
        </div>
    <?php
    } else {
        echo "<h4>No category to show!<h4>";
    }
    ?>
<?php
} else {
?>
    <h1 class="mt-4">Category</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Add a new Category</li>
    </ol>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form class="mt-5" action="" method="post">
                <div class="form-floating mb-3">
                    <input class="form-control" id="category_name" type="text" name="category" placeholder="Enter category name" required />
                    <label for="category_name">Insert a category name</label>
                </div>
                <div class="form-group mb-3">
                    <textarea class="form-control" name="category_des" id="category_des" rows="5" placeholder="Write a short description(not more than 250 words)" style="resize: none;"></textarea>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-dark" name="submit_category" value="Add Category">Add Category</button>

                    <?php
                    if ($res == 1) {
                    ?>
                        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                            <div id="customToast" class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                                <div class="toast-body bg-success text-light">
                                    Category inserted successfully!
                                </div>
                            </div>
                        </div>
                    <?php
                    } elseif ($res == 0) {
                    ?>
                        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                            <div id="customToast" class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                                <div class="toast-body bg-warning text-dark">
                                    Category allready exists!
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    $res = "";
                    ?>
                </div>
            </form>
        </div>
    </div>
<?php
}
?>
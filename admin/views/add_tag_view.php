<?php
require_once("classes/Tags.php");
$tag = new Tags();
$res = "";
if (isset($_POST["submit_tag"])) {
    $res = $tag->addTag($_POST);
    $_POST = null;
}
if (isset($_POST["update_tag"])) {
    $res = $tag->updateTag($_POST);
    $_POST = null;
}
?>

<?php
if (isset($_GET["edit"])) {
    $tagValues = $tag->getUpdateableTag($_GET["edit"]);
    if (isset($tagValues)) {
?>
        <h1 class="mt-4">Tag</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Update the tag</li>
        </ol>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="mt-5" action="" method="post">
                    <input type="hidden" name="id" value="<?= $tagValues["id"] ?>">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="tag_name" type="text" name="tag" placeholder="Enter tag name" value="<?= $tagValues["tag_name"] ?>" required />
                        <label for="tag_name">Update the tag name</label>
                    </div>
                    <div class="form-group mb-3">
                        <textarea class="form-control" name="tag_des" id="tag_des" rows="5" placeholder="Write a short description(not more than 250 words)" style="resize: none;"><?= $tagValues["tag_des"] ?></textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-dark" name="update_tag" value="Update tag">Update Category</button>

                        <?php
                        if ($res == 1) {
                        ?>
                            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                                <div id="customToast" class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                                    <div class="toast-body bg-success text-light">
                                        The tag updated.
                                    </div>
                                </div>
                            </div>
                        <?php
                            $url = "manage_tag.php";
                            $rederict = '<html><head><meta http-equiv="refresh" content="1; url=' . $url . '"></head><body></body></html>';
                            echo $rederict;
                            $rederict = "";
                            echo $rederict;
                        } elseif ($res == 0) {
                        ?>
                            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                                <div id="customToast" class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                                    <div class="toast-body bg-warning text-dark">
                                        Can not insert duplicate tag name!
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
        echo "<h4>No tags to show!<h4>";
    }
    ?>
<?php
} else {
?>
    <h1 class="mt-4">Tag</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Add a new tag</li>
    </ol>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form class="mt-5" action="" method="post">
                <div class="form-floating mb-3">
                    <input class="form-control" id="tag_name" type="text" name="tag" placeholder="Enter tag name" required />
                    <label for="tag_name">Insert a tag name</label>
                </div>
                <div class="form-group mb-3">
                    <textarea class="form-control" name="tag_des" id="tag_des" rows="5" placeholder="Write a short description(not more than 250 words)" style="resize: none;"></textarea>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-dark" name="submit_tag" value="Add Tag">Add Tag</button>

                    <?php
                    if ($res == 1) {
                    ?>
                        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                            <div id="customToast" class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                                <div class="toast-body bg-success text-light">
                                    Tag inserted successfully!
                                </div>
                            </div>
                        </div>
                    <?php
                    } elseif ($res == 0) {
                    ?>
                        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                            <div id="customToast" class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                                <div class="toast-body bg-warning text-dark">
                                    Tag allready exists!
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
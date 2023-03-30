<?php
require_once("classes/Posts.php");
require_once("classes/Categories.php");
require_once("classes/Tags.php");
$post = new Posts();
$category = new Categories();
$tag = new Tags();
$catData = $category->showCategories();
$tagData = $tag->showTags();

$res = "";
// Creating a new Post
if (isset($_POST["publish_post"])) {
    if (isset($_FILES["post_image"])) {
        $_POST["img"] = $_FILES["post_image"]["name"];
        $_POST["tmp_img"] = $_FILES["post_image"]["tmp_name"];
    }
    $res = $post->addPost($_POST);
    $_POST = null;
}
// Updating the post
if (isset($_POST["update_post"])) {
    if (isset($_FILES["post_image"])) {
        $_POST["img"] = $_FILES["post_image"]["name"];
        $_POST["tmp_img"] = $_FILES["post_image"]["tmp_name"];
    }
    $res = $post->updatePost($_POST);
    echo $res;
    $_POST = null;
}
?>

<?php
if (isset($_GET["edit"])) {
    $postValues = $post->getUpdateablePost($_GET["edit"]);
    if (isset($postValues)) {
?>
        <h1 class="mt-4">Post</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Update the post</li>
        </ol>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="mt-5" action="" method="post" enctype="multipart/form-data">
                    <!-- Post tittle -->
                    <input hidden name="post_id" type="text" value="<?= $postValues["post_id"] ?>">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="post_tittle" type="text" name="post_tittle" placeholder="write a post tittle" value="<?= $postValues["post_tittle"] ?>" required />
                        <label for="post_tittle">Post tittle</label>
                    </div>
                    <!-- Posted by -->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="author_name" type="text" name="author_name" placeholder="Author name" value="<?= $postValues["user_name"] ?>" required />
                        <label for="author_name">Posted By</label>
                    </div>
                    <!-- Posted on and user role -->
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label for="post_date" class="mb-2">Posted on</label>
                            <input class="form-control" id="post_date" type="text" name="post_date" value="<?= $postValues["post_date"] ?>" disabled />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="user_role" class="mb-2">User Role</label>
                            <input class="form-control" id="user_role" type="text" name="user_role" value="<?= $postValues["post_role"] ?>" disabled />
                        </div>
                    </div>
                    <!-- Categories -->
                    <div class="form-group mb-3">
                        <label for="categories" class="mb-2">Select Category</label>
                        <select class="form-select" name="categories" id="categories" required>
                            <option value="" disabled>--Select Category--</option>
                            <?php
                            if (isset($catData)) {
                                if (mysqli_num_rows($catData) > 0) {
                                    foreach ($catData as $elm) {
                                        if ($elm["category"] === $postValues["post_category"]) {
                            ?>
                                            <option value="<?= $elm["category"] ?>" selected><?= $elm["category"] ?></option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="<?= $elm["category"] ?>"><?= $elm["category"] ?></option>
                            <?php
                                        }
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <!-- Tags -->
                    <div class="form-group mb-2">
                        <label>Selected Tags (add or remove tags)</label>
                    </div>
                    <div class="form-group mb-3">
                        <?php
                        if (isset($tagData)) {
                            if (mysqli_num_rows($tagData) > 0) {
                                $tagItems = explode(", ", $postValues["post_tag"]);
                                foreach ($tagData as $elm) {
                                    $isTagExist = "";
                                    foreach ($tagItems as $tagElm) {
                                        if ($elm["tag"] == $tagElm) {
                        ?>
                                            <div class="form-check-inline mb-2">
                                                <input type="checkbox" class="btn-check" id="<?= $elm["tag"] ?>" name="tags[]" value="<?= $elm["tag"] ?>" autocomplete="off" checked>
                                                <label class="btn btn-outline-secondary" for="<?= $elm["tag"] ?>"><?= $elm["tag"] ?></label>
                                            </div>
                                        <?php
                                            $isTagExist = $tagElm;
                                        }
                                    }
                                    if ($isTagExist === "") {
                                        ?>
                                        <div class="form-check-inline mb-2">
                                            <input type="checkbox" class="btn-check" id="<?= $elm["tag"] ?>" name="tags[]" value="<?= $elm["tag"] ?>" autocomplete="off">
                                            <label class="btn btn-outline-secondary" for="<?= $elm["tag"] ?>"><?= $elm["tag"] ?></label>
                                        </div>
                                    <?php
                                        $isTagExist = "";
                                    }
                                    ?>
                        <?php
                                }
                            }
                        }
                        ?>
                    </div>
                    <!-- links -->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="facebook_link" type="text" name="facebook_link" placeholder="Facebook link" value="<?= $postValues["post_facebook"] ?>" />
                        <label for="facebook_link">Facebook link (Optional)</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="twitter_link" type="text" name="twitter_link" placeholder="Enter the twitter link" value="<?= $postValues["post_twitter"] ?>" />
                        <label for="twitter_link">Twitter link (Optional)</label>
                    </div>
                    <!-- Update Pucture -->
                    <label class="mb-2">Current Photo</label>
                    <div class="form-control mb-3 text-center">
                        <img style="height: 150px; width:150px; object-fit: cover;" src="images/posts/<?= $postValues["post_img"] ?>" alt="<?= $postValues["post_tittle"] ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label class="" for="post_image">Update Photo</label>
                        <input type="file" class="form-control" id="post_image" name="post_image" value="<?= $postValues["post_img"] ?>">
                    </div>
                    <!-- Post descriptions -->
                    <div class="form-group mb-3">
                        <textarea class="form-control" name="post_description" id="post_description" rows="5" placeholder="Write post descriptions" style="resize: vertical;"><?= $postValues["post_description"] ?></textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-dark" name="update_post" value="Update Post">Update</button>

                        <?php
                        if ($res == 1) {
                        ?>
                            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                                <div id="customToast" class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                                    <div class="toast-body bg-success text-light">
                                        Post Updated.
                                    </div>
                                </div>
                            </div>
                        <?php
                            $url = "manage_post.php";
                            $rederict = '<html><head><meta http-equiv="refresh" content="1; url=' . $url . '"></head><body></body></html>';
                            echo $rederict;
                            $rederict = "";
                            echo $rederict;
                        } elseif ($res == 0) {
                        ?>
                            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                                <div id="customToast" class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                                    <div class="toast-body bg-warning text-dark">
                                        Post allready exists!
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
        echo "<h4>No Posts to show!<h4>";
    }
    ?>
<?php
} else {
?>
    <h1 class="mt-4">Post</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Create a new post</li>
    </ol>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form class="mt-5" action="" method="post" enctype="multipart/form-data">
                <!-- Post tittle -->
                <div class="form-floating mb-3">
                    <input class="form-control" id="post_tittle" type="text" name="post_tittle" placeholder="write a post tittle" required />
                    <label for="post_tittle">Post tittle</label>
                </div>
                <!-- Categories -->
                <div class="form-group mb-3">
                    <select class="form-select" name="categories" id="categories" required>
                        <option value="" selected disabled>--Select Category--</option>
                        <?php
                        if (isset($catData)) {
                            if (mysqli_num_rows($catData) > 0) {
                                foreach ($catData as $elm) {
                        ?>
                                    <option value="<?= $elm["category"] ?>"><?= $elm["category"] ?></option>
                        <?php
                                }
                            }
                        }
                        ?>
                    </select>
                </div>
                <!-- Tags -->
                <div class="form-group mb-2">
                    <label>Select Tags</label>
                </div>
                <div class="form-group mb-3">
                    <?php
                    if (isset($tagData)) {
                        if (mysqli_num_rows($tagData) > 0) {
                            foreach ($tagData as $elm) {
                    ?>
                                <div class="form-check-inline mb-2">
                                    <input type="checkbox" class="btn-check" id="<?= $elm["tag"] ?>" name="tags[]" value="<?= $elm["tag"] ?>" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="<?= $elm["tag"] ?>"><?= $elm["tag"] ?></label>
                                </div>
                    <?php
                            }
                        }
                    }
                    ?>
                </div>
                <!-- links -->
                <div class="form-floating mb-3">
                    <input class="form-control" id="facebook_link" type="text" name="facebook_link" placeholder="Enter the facebook link" />
                    <label for="facebook_link">Facebook link (Optional)</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="twitter_link" type="text" name="twitter_link" placeholder="Enter the twitter link" />
                    <label for="twitter_link">Twitter link (Optional)</label>
                </div>
                <!-- Post image -->
                <div class="form-group mb-3">
                    <label class="" for="post_image">Post Image</label>
                    <input type="file" class="form-control" id="post_image" name="post_image" required>
                </div>
                <!-- Post descriptions -->
                <div class="form-group mb-3">
                    <textarea class="form-control" name="post_description" id="post_description" rows="5" placeholder="Write post descriptions" style="resize: vertical;"></textarea>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-dark" name="publish_post" value="Publish Post">Publish</button>

                    <?php
                    if ($res == 1) {
                    ?>
                        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                            <div id="customToast" class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                                <div class="toast-body bg-success text-light">
                                    Post has been published.
                                </div>
                            </div>
                        </div>
                    <?php
                    } elseif ($res == 0) {
                    ?>
                        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                            <div id="customToast" class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                                <div class="toast-body bg-warning text-dark">
                                    Post allready exists!
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
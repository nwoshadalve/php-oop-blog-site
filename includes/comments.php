<?php
require_once("admin/config/Config.php");
require_once("admin/classes/Comments.php");
$comment = new Comments();
// Get Comments
$comments = $comment->getComment($postInfo["post_id"]);
$res = "";
if (isset($_POST["submit_comment"])) {
    $res = $comment->postComments($_POST);
}
?>
<!-- Comments Will be added letter -->
<div class="col-lg-12">
    <div class="sidebar-item comments">
        <div class="sidebar-heading">
            <h2><?= $comments->num_rows ?> comments</h2>
        </div>
        <div class="content">
            <ul>
                <?php
                if ($comments->num_rows > 0) {
                    foreach ($comments as $elm) {
                ?>
                        <li>
                            <div class="author-thumb">
                                <img src="assets/images/comment-visitor.png" alt="A dummy user icon">
                            </div>
                            <div class="right-content">
                                <h4><?= $elm["name"]; ?><span><?= $elm["comment_date"]; ?></span></h4>
                                <p><?= $elm["comment"]; ?></p>
                            </div>
                        </li>
                        <?php
                        if (!empty($elm["reply"])) {
                        ?>
                            <li class="replied">
                                <div class="author-thumb">
                                    <img src="admin/images/avater/<?= $elm["replier_img"]; ?>" alt="<?= $elm["replier_name"]; ?>" style="width: 100px; height: 100px; object-fit: contain;">
                                </div>
                                <div class="right-content">
                                    <h4><?= $elm["replier_name"]; ?><span><?= $elm["replier_date"]; ?></span></h4>
                                    <p><?= $elm["reply"]; ?></p>
                                </div>
                            </li>
                <?php
                        }
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<!-- Comment form -->
<div class="col-lg-12">
    <div class="sidebar-item submit-comment">
        <div class="sidebar-heading">
            <h2>Your comment</h2>
        </div>
        <div class="content">
            <form id="comment" action="" method="post">
                <div class="row justify-content-center">
                    <?php
                    if ($res === "success") {
                    ?>
                        <div class="alert alert-success w-100 text-center" role="alert">
                            Thanks for your comment.
                        </div>
                    <?php
                    } elseif ($res !== "") {
                    ?>
                        <div class="alert alert-warning w-100 text-center" role="alert">
                            <?= $res ?>
                        </div>
                    <?php
                    }
                    $res = "";
                    ?>
                    <input type="hidden" name="post_id" value="<?= $postInfo["post_id"]; ?>">
                    <div class="col-md-12 col-sm-12">
                        <fieldset>
                            <input name="name" type="text" id="name" placeholder="Your Name" style="text-transform: none;" required="">
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <fieldset>
                            <textarea name="comment" rows="6" id="comment" placeholder="Type your comment" style="text-transform: none;" required=""></textarea>
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <fieldset>
                            <input type="submit" id="form-submit" class="main-button text-light" name="submit_comment" style="cursor: pointer; background-color: #f48840;" value="Submit">
                        </fieldset>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
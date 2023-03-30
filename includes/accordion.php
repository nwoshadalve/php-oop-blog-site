<?php
include_once("admin/config/Config.php");
include_once("admin/classes/Posts.php");
require_once("admin/classes/Comments.php");
$post = new Posts();
$postData = $post->getPosts();
$comment = new Comments();
?>

<!-- Banner Starts Here -->
<div class="main-banner header-text">
    <div class="container-fluid">
        <div class="owl-banner owl-carousel">
            <?php
            if ($postData->num_rows > 0) {
                foreach ($postData as $elm) {
            ?>
                    <div class="item">
                        <div style="width: 100%; height: 380px; position: relative;">
                            <img style="width: 100%; height: 100%; object-fit: cover;" src="admin/images/posts/<?= $elm["post_img"] ?>" alt="<?= $elm["post_tittle"] ?>">
                            <span style="width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.50); position: absolute; top: 0; left: 0;"></span>
                        </div>
                        <div class="item-content">
                            <div class="main-content">
                                <div class="meta-category">
                                    <span><?= $elm["post_category"] ?></span>
                                </div>
                                <a href="post-details.php?postnum=<?= $elm["post_id"] ?>">
                                    <h4><?= $elm["post_tittle"] ?></h4>
                                </a>
                                <ul class="post-info">
                                    <li><a href="#"><?= $elm["post_role"] ?></a></li>
                                    <li><a href="#"><?= $elm["post_date"] ?></a></li>
                                    <li><a href="#"><?php 
                                    $comments = $comment->getComment($elm["post_id"]);
                                    echo $comments->num_rows." Comments";
                                    ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<!-- Banner Ends Here -->
<div class="all-blog-posts">
    <div class="row">
        <?php
        // Limit Post to show 5
        $blogToShow = 1;
        foreach ($postData as $elm) {
        ?>
            <div class="col-lg-12">
                <div class="blog-post">
                    <div class="blog-thumb border" style="width: 100%;">
                        <img style="width: 100%; height: 300px; object-fit: cover;" src="admin/images/posts/<?= $elm["post_img"] ?>" alt="<?= $elm["post_tittle"] ?>">
                    </div>
                    <div class="down-content">
                        <span><?= $elm["post_category"] ?></span>
                        <a href="post-details.php?postnum=<?= $elm["post_id"]; ?>">
                            <h4><?= $elm["post_tittle"] ?></h4>
                        </a>
                        <ul class="post-info">
                            <li><a href="#"><?= $elm["post_role"]; ?></a></li>
                            <li><a href="#"><?= $elm["post_date"]; ?></a></li>
                            <li><a href="#"><?php
                                            $comments = $comment->getComment($elm["post_id"]);
                                            echo $comments->num_rows . " Comments";
                                            ?></a></li>
                        </ul>
                        <p><?= $elm["post_summary"] ?><a href="post-details.php?postnum=<?= $elm["post_id"]; ?>">read more</a></p>
                        <div class="post-options">
                            <div class="row">
                                <div class="col-6">
                                    <ul class="post-tags">
                                        <li><i class="fa fa-tags"></i></li>
                                        <!-- Tags -->
                                        <?php
                                        $tagString = $elm["post_tag"];
                                        $postTags = explode(", ", $tagString);
                                        $count = count($postTags) - 1;
                                        foreach ($postTags as $tagelm) {
                                            if ($count == 0) {
                                        ?>
                                                <li><a href="#"><?= $tagelm ?></a></li>
                                            <?php
                                            } else {
                                            ?>
                                                <li><a href="#"><?= $tagelm ?></a>,</li>
                                            <?php

                                            }
                                            $count--;
                                            ?>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <ul class="post-share">
                                        <li><i class="fa fa-share-alt"></i></li>
                                        <li><a href="<?= $elm["post_facebook"] ?>">Facebook</a>,</li>
                                        <li><a href="<?= $elm["post_twitter"] ?>"> Twitter</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            if ($blogToShow == 5) {
                break;
            }
            $blogToShow++;
        }
        ?>
        <div class="col-lg-12">
            <div class="main-button">
                <a href="blog.php">View All Posts</a>
            </div>
        </div>
    </div>
</div>
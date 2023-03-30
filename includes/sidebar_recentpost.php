<div class="col-lg-12">
    <div class="sidebar-item recent-posts">
        <div class="sidebar-heading">
            <h2>Recent Posts</h2>
        </div>
        <div class="content">
            <ul>
                <?php
                if($postData->num_rows > 0){
                    $recentPost = array();
                    foreach($postData as $val){
                        $recentPost[] = $val;
                    }
                }
                $count = 1;
                $recentPost = array_reverse($recentPost);
                foreach ($recentPost as $elm) {
                ?>
                    <li><a href="post-details.php?postnum=<?= $elm["post_id"] ?>">
                            <h5><?= $elm["post_tittle"] ?></h5>
                            <span><?= $elm["post_date"] ?></span>
                        </a></li>
                <?php
                    if ($count == 5) {
                        break;
                    }
                    $count++;
                }
                ?>
            </ul>
        </div>
    </div>
</div>
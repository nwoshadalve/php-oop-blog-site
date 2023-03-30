<?php
    include_once("admin/classes/Tags.php");
    $tag = new Tags();
    $tagData = $tag->showTags();
?>
<div class="col-lg-12">
    <div class="sidebar-item tags">
        <div class="sidebar-heading">
            <h2>Tag Clouds</h2>
        </div>
        <div class="content">
            <ul>
                <?php
                    foreach ($tagData as $elm) {
                        ?>
                        <li><a href="#"><?= $elm["tag"] ?></a></li>
                        <?php
                    }
                ?>
            </ul>
        </div>
    </div>
</div>
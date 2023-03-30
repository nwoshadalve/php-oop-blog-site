<?php
include_once("admin/classes/Categories.php");
$cat = new Categories();
$catData = $cat->showCategories();
?>
<div class="col-lg-12">
    <div class="sidebar-item categories">
        <div class="sidebar-heading">
            <h2>Categories</h2>
        </div>
        <div class="content">
            <ul>
                <?php
                foreach ($catData as $elm) {
                ?>
                    <li><a href="#">- <?= $elm["category"] ?></a></li>

                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>
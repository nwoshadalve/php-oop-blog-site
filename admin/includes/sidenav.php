<?php
    $user = new Users();
    $userData = $user->getUser();
    $currentUser = "";
    $userRole = "";
    foreach($userData as $elm){
        if($elm["id"] === $_SESSION["user_id"]){
            $currentUser=$elm["user_name"];
            if($elm["role"] == 1){
                $userRole = "Admin";
            }else{
                $userRole = "User";
            }
        }
    }
?>
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="dashboard.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#post" aria-expanded="false" aria-controls="post">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-square-rss"></i></div>
                    Post
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="post" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="add_post.php">Create Post</a>
                        <a class="nav-link" href="manage_post.php">Manage Posts</a>
                    </nav>
                </div>
                <!-- Category -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#category" aria-expanded="false" aria-controls="category">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-layer-group"></i></div>
                    Category
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="category" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="add_category.php">Add Category</a>
                        <a class="nav-link" href="manage_category.php">Manage Categories</a>
                    </nav>
                </div>
                <!-- Tags -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#tag" aria-expanded="false" aria-controls="tag">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-tags"></i></div>
                    Tag
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="tag" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="add_tag.php">Add Tag</a>
                        <a class="nav-link" href="manage_tag.php">Manage Tag</a>
                    </nav>
                </div>
                <!-- Inbox -->
                <a class="nav-link" href="inbox.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-inbox"></i></i></div>
                    Inbox
                </a>
                <!-- comments -->
                <a class="nav-link" href="comments.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-comment"></i></div>
                    Comments
                </a>
                <!-- Logout -->
                <a class="nav-link" href="dashboard.php?action=logout">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket"></i></div>
                    Logout
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as: <?= $userRole ?></div>
            <?= $currentUser ?>
        </div>
    </nav>
</div>
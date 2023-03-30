    <!-- Manage routes -->
    <?php
    include("classes/Users.php");
    $user = new Users();
    // Authentication
    $user_email = $_SESSION["user_email"];
    $user_id = $_SESSION["user_id"];
    if($user_email == null && $user_id == null){
        header("Location: index.php");
    }
    // Logout
    if(isset($_GET["action"])){
        $user->adminLogout();
    }
    ?>
    <!-- Template Mastering -->
    <!-- Including Header -->
    <?php include_once("includes/header.php"); ?>
    <!-- Top navbar -->
    <?php include_once("includes/nav-top.php"); ?>
    <div id="layoutSidenav">
        <!-- Sidenav  -->
        <?php include_once("includes/sidenav.php"); ?>
        <div id="layoutSidenav_content">
            <!-- Contents Layout -->
            <main>
                <div class="container-fluid px-4">
                    <?php
                    if (isset($path)) {
                        if ($path === "dashboard") {
                            require_once("views/dashboard_view.php");
                        } elseif ($path === "add_category") {
                            require_once("views/add_cat_view.php");
                        } elseif ($path === "manage_categories") {
                            require_once("views/manage_cat_view.php");
                        } elseif ($path === "add_post") {
                            require_once("views/add_post_view.php");
                        } elseif ($path === "manage_post") {
                            require_once("views/manage_post_view.php");
                        } elseif ($path === "add_tag") {
                            require_once("views/add_tag_view.php");
                        } elseif ($path === "manage_tag") {
                            require_once("views/manage_tag_view.php");
                        } elseif ($path === "inbox") {
                            require_once("views/inbox_view.php");
                        } elseif ($path === "settings") {
                            require_once("views/settings_view.php");
                        } elseif ($path === "comments") {
                            require_once("views/comments_view.php");
                        }
                    }
                    ?>
                </div>
            </main>
            <!-- Footer -->
            <?php include_once("includes/footer.php"); ?>
        </div>
    </div>
    <!-- Scripts -->
    <?php include_once("includes/scripts.php"); ?>
    </body>

    </html>
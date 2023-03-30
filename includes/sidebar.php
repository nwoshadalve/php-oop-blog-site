<div class="col-lg-4">
    <div class="sidebar">
        <div class="row">
            <div class="col-lg-12">
                <div class="sidebar-item search">
                    <form id="search_form" name="gs" method="GET" action="#">
                        <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                    </form>
                </div>
            </div>
            <!-- Recent Post -->
            <?php include_once("includes/sidebar_recentpost.php"); ?>

            <!-- Sidebar categories -->
            <?php include_once("includes/sidebar_categories.php"); ?>

            <!-- Sidebar tags -->
            <?php include_once("includes/sidebar_tags.php"); ?>

        </div>
    </div>
</div>
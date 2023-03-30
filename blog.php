<?php
$active = "blog";
$tittle = "Palki | Blog";
$bannerName = "Recent Posts";
$banerTittle = "Our Recent Blog Entries";
include_once("admin/config/Config.php");
include_once("admin/classes/Posts.php");
include_once("admin/classes/Tags.php");
include_once("admin/classes/Posts.php");
require_once("admin/classes/Comments.php");
$post = new Posts();
$postData = $post->getPosts();
$tag = new Tags();
$tagData = $tag->showTags();
$comment = new Comments();
?>
<!-- Html Head Part -->
<?php require_once("includes/header.php"); ?>

<!-- Preloader -->
<?php include_once("includes/preloader.php"); ?>

<!-- Navbar -->
<?php include_once("includes/navbar.php"); ?>

<!-- Page Content -->
<!-- Banner Starts Here -->
<?php include_once("includes/banner.php") ?>
<!-- Banner Ends Here -->

<section class="blog-posts grid-system">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="all-blog-posts">
          <div class="row">
            <?php
            $limit = 4; // number of posts to show per page
            $page = isset($_GET['page']) ? $_GET['page'] : 1; // get current page number from query string or default to 1
            $offset = ($page - 1) * $limit; // calculate offset for the SQL query

            $totalPosts = $postData->num_rows; // get total number of posts
            $totalPages = ceil($totalPosts / $limit); // calculate total number of pages

            $posts = $postData->fetch_all(MYSQLI_ASSOC); // fetch all posts as an associative array
            $posts = array_slice($posts, $offset, $limit); // slice the array to get only the posts for the current page

            foreach ($posts as $elm) {
            ?>
              <div class="col-lg-6">
                <div class="blog-post">
                  <div class="blog-thumb">
                    <img src="admin/images/posts/<?= $elm["post_img"]; ?>" alt="<?= $elm["post_tittle"]; ?>">
                  </div>
                  <div class="down-content">
                    <span><?= $elm["post_category"]; ?></span>
                    <a href="post-details.php?postnum=<?= $elm["post_id"]; ?>">
                      <h4><?= $elm["post_tittle"]; ?></h4>
                    </a>
                    <ul class="post-info">
                      <li><a href="#"><?= $elm["user_name"]; ?> (<?= $elm["post_role"]; ?>)</a></li>
                      <li><a href="#"><?= $elm["post_date"]; ?></a></li>
                      <li><a href="#"><?php 
                                    $comments = $comment->getComment($elm["post_id"]);
                                    echo $comments->num_rows." Comments";
                                    ?></a></li>
                    </ul>
                    <p><?= $elm["post_summary"]; ?><a href="post-details.php?postnum=<?= $elm["post_id"]; ?>">read more</a></p>
                    <div class="post-options">
                      <div class="row">
                        <div class="col-lg-12">
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
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
            <div class="col-lg-12">
              <ul class="page-numbers">
                <?php
                for ($i = 1; $i <= $totalPages; $i++) {
                  $active = $i == $page ? 'active' : '';
                ?>
                  <li class="<?= $active ?>"><a href="?page=<?= $i ?>"><?= $i ?></a></li>
                <?php
                }
                ?>
            </div>
          </div>
        </div>
      </div>
      <!-- Sidebar -->
      <?php include("includes/sidebar.php"); ?>
    </div>
  </div>
</section>


<!-- Footer -->
<?php include("includes/footer.php"); ?>


<!-- Scripts -->
<?php include("includes/scripts.php"); ?>

</body>

</html>
<?php
$active = "post_details";
$tittle = "Palki | Post Details";
$bannerName = "Post Details";
$banerTittle = "Single blog post";
include_once("admin/config/Config.php");
include_once("admin/classes/Posts.php");
include_once("admin/classes/Tags.php");
$post = new Posts();
$postData = $post->getPosts();
$tag = new Tags();
$tagData = $tag->showTags();
if (isset($_GET["postnum"])) {
  $postInfo = "";
  foreach ($postData as $elm) {
    if ($_GET["postnum"] == $elm["post_id"]) {
      $postInfo = $elm;
    }
  }
} else {
  header("Location: index.php");
}
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


<section class="blog-posts grid-system">
  <div class="container">
    <div class="row">
      <?php
      if (isset($postInfo)) {
      ?>
        <div class="col-lg-8">
          <div class="all-blog-posts">
            <div class="row">
              <div class="col-lg-12">
                <div class="blog-post">
                  <div class="blog-thumb border" style="width: 100%;">
                    <img style="width: 100%; height: 300px; object-fit: cover;" src="admin/images/posts/<?= $postInfo["post_img"] ?>" alt="<?= $postInfo["post_tittle"] ?>">
                  </div>
                  <div class="down-content">
                    <span><?= $postInfo["post_category"]; ?></span>
                    <a href="post-details.html">
                      <h4><?= $postInfo["post_tittle"]; ?></h4>
                    </a>
                    <ul class="post-info">
                      <li><a href="#"><?= $postInfo["user_name"]; ?> | <?= $postInfo["post_role"]; ?></a></li>
                      <li><a href="#"><?= $postInfo["post_date"]; ?></a></li>
                      <li><a href="#">10 Comments</a></li>
                    </ul>
                    <p><?= $postInfo["post_description"]; ?></p>
                    <div class="post-options">
                      <div class="row">
                        <div class="col-6">
                          <ul class="post-tags">
                            <li><i class="fa fa-tags"></i></li>
                            <!-- Tags -->
                            <?php
                            $tagString = $postInfo["post_tag"];
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
                            <li><a href="<?= $postInfo["post_facebook"]; ?>">Facebook</a>,</li>
                            <li><a href="<?= $postInfo["post_twitter"]; ?>"> Twitter</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Comments -->
              <?php include_once("includes/comments.php"); ?>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
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
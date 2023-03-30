<?php
  $active = "home";
  $tittle = "Palki | Home";
?>
<!-- Html Head Part -->
<?php require_once("includes/header.php"); ?>

<!-- Preloader -->
<?php include_once("includes/preloader.php"); ?>

<!-- Navbar -->
<?php include_once("includes/navbar.php"); ?>

<!-- Page Content -->
<!-- Accordion -->
<?php include_once("includes/accordion.php"); ?>

<!-- Advertisement -->

<section class="blog-posts">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <!-- Blog Post -->
        <?php include_once("includes/homeblogpost.php"); ?>

      </div>
      <!-- Sidebar -->
      <?php include_once("includes/sidebar.php"); ?>

    </div>
  </div>
</section>


<!-- Footer -->
<?php include_once("includes/footer.php"); ?>


<!-- Scripts -->
<?php include_once("includes/scripts.php"); ?>

</body>

</html>
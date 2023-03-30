<?php
$active = "contact";
$tittle = "Palki | Contact";
$bannerName = "contact us";
$banerTittle = "let’s stay in touch!";
?>
<!-- Html Head Part -->
<?php require_once("includes/header.php"); ?>
<!-- Preloader -->

<!-- Navbar -->
<?php include_once("includes/navbar.php"); ?>
<!-- Page Content -->
<!-- Banner Starts Here -->
<?php include_once("includes/banner.php"); ?>
<!-- Banner Ends Here -->
<section class="contact-us">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="down-contact">
          <div class="row">
            <!-- Contact Form -->
            <?php include_once("includes/contact_form.php"); ?>
            <!-- Contact Info -->
            <?php include_once("includes/contact_info.php"); ?>
          </div>
        </div>
      </div>
      <!-- Map -->
      <?php include_once("includes/map.php"); ?>
    </div>
  </div>
</section>
<!-- Footer -->
<?php include("includes/footer.php"); ?>

<!-- Scripts -->
<?php include("includes/scripts.php"); ?>

</body>

</html>
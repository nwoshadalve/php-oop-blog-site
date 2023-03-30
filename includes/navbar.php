<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <h2><em>PALKI</em>.</h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <?php
                    if ($active === "home") {
                    ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                    <?php
                    if ($active === "about") {
                    ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="about.php">About Us</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About Us</a>
                        </li>
                    <?php
                    }
                    ?>
                    <?php
                    if ($active === "blog") {
                    ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="blog.php">Blog Entries</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="blog.php">Blog Entries</a>
                        </li>
                    <?php
                    }
                    ?>
                    <?php
                    if ($active === "contact") {
                    ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="contact.php">Contact Us</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact Us</a>
                        </li>
                    <?php
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/">Log In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
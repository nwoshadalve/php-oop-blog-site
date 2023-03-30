<?php
include_once("admin/config/Config.php");
include_once("admin/classes/Contacts.php");
$contact = new Contacts();
$res = "";
if (isset($_POST["send"])) {
    $res = $contact->getUserMessage($_POST);
}
?>
<div class="col-lg-8">
    <div class="sidebar-item contact-form">
        <div class="sidebar-heading">
            <h2>Send us a message</h2>
        </div>
        <div class="content">
            <?php
            if ($res == 0) {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Message allready sent!</strong>
                </div>
            <?php
            } elseif ($res == 1) {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Message has been sent successfully!</strong>
                </div>
            <?php
            }
            ?>
            <form id="contact" action="" method="post">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <fieldset>
                            <input name="name" type="text" id="name" placeholder="YOUR NAME" required="">
                        </fieldset>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <fieldset>
                            <input name="email" type="email" id="email" placeholder="YOUR EMAIL" required="">
                        </fieldset>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <fieldset>
                            <input name="subject" type="text" id="subject" placeholder="SUBJECT">
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <fieldset>
                            <textarea name="message" rows="6" id="message" placeholder="Your Message" required=""></textarea>
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <fieldset>
                            <button type="submit" id="form-submit" class="main-button" name="send" value="send_message" style="cursor: pointer;">Send Message</button>
                        </fieldset>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
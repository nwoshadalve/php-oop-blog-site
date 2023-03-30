<?php
require_once("classes/Contacts.php");
$contact = new Contacts();
$contacts = $contact->showContacts();
$res = "";
if(isset($_GET["delete"])){
    $res = $contact->deleteMessage($_GET);
    $_GET = null;
}
?>


<h1 class="mt-4">Inbox</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Messages from visitors</li>
</ol>

<div class="card mb-4">
    <div class="card-body">
        <b>Instructions:</b> Afrter clicking the delete button please wait untill the messege disappear. Only Admin can view and delete messages from here.
    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All Messages
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="table table-hover align-middle" style="table-layout: fixed;">
            <thead>
                <tr>
                    <th class="scope-col">#</th>
                    <th class="scope-col">Name</th>
                    <th class="scope-col">Email</th>
                    <th class="scope-col">Subject</th>
                    <th class="scope-col">Message</th>
                    <th class="scope-col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($contacts) > 0) {
                    $count = 1;
                    foreach ($contacts as $elm) {
                ?>
                        <tr>
                            <td><?= $count++ ?></td>
                            <td><?= $elm["name"] ?></td>
                            <td><?= $elm["email"] ?></td>
                            <td><?= $elm["subject"] ?></td>
                            <td><?= $elm["message"] ?></td>
                            <td>
                                <a class="btn btn-danger" href="?delete=<?= $elm["id"]; ?>"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    if ($res == 1) {
                    ?>
                        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                            <div id="customToast" class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                                <div class="toast-body bg-success text-light">
                                    The tag has been deleted.
                                </div>
                            </div>
                        </div>
                <?php
                        $url = "inbox.php";
                        $rederict = '<html><head><meta http-equiv="refresh" content="1; url=' . $url . '"></head><body></body></html>';
                        echo $rederict;
                        $rederict = "";
                        echo $rederict;
                        $res = "";
                    }
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th class="scope-col">#</th>
                    <th class="scope-col">Name</th>
                    <th class="scope-col">Email</th>
                    <th class="scope-col">Subject</th>
                    <th class="scope-col">Message</th>
                    <th class="scope-col">Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<?php
    require_once("classes/Tags.php");
    $tag = new Tags();
    $tags = $tag->showTags();
    $res = "";
    if(isset($_GET["delete"])){
        $res = $tag->deleteTag($_GET);
        $_GET = null;
    }
?>


<h1 class="mt-4">Tag</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Manage Tags</li>
</ol>

<div class="card mb-4">
    <div class="card-body">
        <b>Instructions:</b> Do not insert same tags twice. Afrter clicking the delete button please wait untill the messege disappear. Only Admin can view, update and delete tags from here.
    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All Tags
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="table table-hover align-middle" style="table-layout: fixed;">
            <thead>
                <tr>
                    <th class="scope-col">#</th>
                    <th class="scope-col">Tags</th>
                    <th class="scope-col">Description</th>
                    <th class="scope-col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($tags->num_rows > 0){
                        $count = 1;
                        foreach ($tags as $elm) {
                        ?>
                            <tr>
                                <td><?= $count++ ?></td>
                                <td><?= $elm["tag"] ?></td>
                                <td><?= $elm["tag_description"] ?></td>
                                <td>
                                    <a class="btn btn-primary me-2" href="add_tag.php?edit=<?= $elm["tag_id"] ?>"><i class="fa-solid fa-pen"></i></a>
                                    <a class="btn btn-danger" href="?delete=<?= $elm["tag_id"] ?>"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                    if($res == 1){
                        ?>
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                    <div id="customToast" class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                        <div class="toast-body bg-success text-light">
                            The tag has been deleted.
                        </div>
                    </div>
                </div>
                <?php
                    $url = "manage_tag.php";
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
                    <th>#</th>
                    <th>Tags</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<?php
require_once("classes/Posts.php");
require_once("classes/Comments.php");
$post = new Posts();
$comment = new Comments();
$posts = $post->getPosts();
$allComments = array();
if ($posts->num_rows > 0) {
    foreach ($posts as $elm) {
        $commentData = $comment->getComment($elm["post_id"]);
        if ($commentData->num_rows > 0) {
            foreach ($commentData as $val) {
                $val["post_tittle"] = $elm["post_tittle"];
                $allComments[] = $val;
            }
        }
    }
}
$res = "";
if (isset($_POST["submit_replay"])) {
    $res = $comment->updateReply($_POST);
}
if (isset($_GET["delete"])) {
    $res = $comment->deleteReply($_GET["delete"]);
}
$allComments = array_reverse($allComments);
?>
<h1 class="mt-4">Comments</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Comments and replies</li>
</ol>

<div class="card mb-4">
    <div class="card-body">
        <b>Instructions:</b> Comments are sorted by the latest comment. From here admin can make reply to the comment or can delete the comment.
    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Comments
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="table table-hover align-middle" style="table-layout: fixed;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tittle</th>
                    <th>Comment</th>
                    <th>Reply</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                foreach ($allComments as $elm) {
                ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= $elm["post_tittle"] ?></td>
                        <td><?= $elm["comment"] ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $elm["id"]; ?>">
                                <input class="form-control" name="reply" placeholder="Write your reply..." value="<?= $elm["reply"] ?>">
                        </td>
                        <td>
                            <button type="submit" name="submit_replay" class="text-primary d-inline-block lead bg-transparent" style="border: none;"><i class="fa-solid fa-reply"></i></button>
                            <a class="text-danger d-inline-block lead" href="?delete=<?= $elm["id"]; ?>"><i class="fa-solid fa-trash"></i></a>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <?php
            if ($res == 1) {
            ?>
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                    <div id="customToast" class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                        <div class="toast-body bg-success text-light">
                            Reply sent!!
                        </div>
                    </div>
                </div>
            <?php
                $url = "comments.php";
                $rederict = '<html><head><meta http-equiv="refresh" content="1; url=' . $url . '"></head><body></body></html>';
                echo $rederict;
                $rederict = "";
                echo $rederict;
                $res = "";
            } elseif ($res == 0) {
            ?>
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                    <div id="customToast" class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                        <div class="toast-body bg-warning text-light">
                            Something went wrong!!
                        </div>
                    </div>
                </div>
            <?php
            } elseif ($res == 2) {
            ?>
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                    <div id="customToast" class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                        <div class="toast-body bg-danger text-light">
                            Comment deleted!!
                        </div>
                    </div>
                </div>
            <?php
                $url = "comments.php";
                $rederict = '<html><head><meta http-equiv="refresh" content="1; url=' . $url . '"></head><body></body></html>';
                echo $rederict;
                $rederict = "";
                echo $rederict;
                $res = "";
            }
            $res = "";
            ?>
            <tfoot>
                <tr>
                    <th class="scope-col">#</th>
                    <th class="scope-col">Tittle</th>
                    <th class="scope-col">Comment</th>
                    <th class="scope-col">Reply</th>
                    <th class="scope-col">Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
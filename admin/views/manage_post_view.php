<?php
require_once("classes/Posts.php");
$post = new Posts();
$posts = $post->getPosts();
$res = "";
if (isset($_GET["delete"])) {
    $res = $post->deletePost($_GET);
    $_GET = null;
}
?>


<h1 class="mt-4">Posts</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Manage Posts</li>
</ol>

<div class="card mb-4">
    <div class="card-body">
        <b>Instructions:</b> Do not create same post twice. Afrter clicking the delete button please wait untill the messege disappear. Only Admin can view, update and delete posts from here. Click on edit button to view more details of the post.
    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All Posts
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="table table-hover align-middle" style="table-layout: fixed;">
            <thead>
                <tr>
                    <th class="scope-col">#</th>
                    <th class="scope-col">Tittle</th>
                    <th class="scope-col">Description</th>
                    <th class="scope-col">Category</th>
                    <th class="scope-col">Image</th>
                    <th class="scope-col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($posts->num_rows > 0) {
                    $count = 1;
                    foreach ($posts as $elm) {
                ?>
                        <tr>
                            <td><?= $count++ ?></td>
                            <td><?= $elm["post_tittle"] ?></td>
                            <td><?= $elm["post_summary"] ?></td>
                            <td><?= $elm["post_category"] ?></td>
                            <td><img style="width: 100px; height: 100px; object-fit: cover;" src="images/posts/<?= $elm["post_img"] ?>" alt="<?= $elm["post_tittle"] ?>"></td>
                            <td>
                                <a class="text-primary d-inline-block lead me-2" href="add_post.php?edit=<?= $elm["post_id"] ?>"><i class="fa-solid fa-pen"></i></a>
                                <a class="text-danger d-inline-block lead" href="?delete=<?= $elm["post_id"] ?>"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    if ($res == 1) {
                    ?>
                        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                            <div id="customToast" class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                                <div class="toast-body bg-success text-light">
                                    The post deleted successfully.
                                </div>
                            </div>
                        </div>
                <?php
                        $url = "manage_post.php";
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
                    <th class="scope-col">Tittle</th>
                    <th class="scope-col">Description</th>
                    <th class="scope-col">Image</th>
                    <th class="scope-col">Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<?php
    require_once("classes/Categories.php");
    $category = new Categories();
    $categories = $category->showCategories();
    $res = "";
    if(isset($_GET["delete"])){
        $res = $category->deleteCategory($_GET);
        $_GET = null;
    }
?>


<h1 class="mt-4">Category</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Manage Categories</li>
</ol>

<div class="card mb-4">
    <div class="card-body">
        <b>Instructions:</b> Do not insert same catagories twice. Afrter clicking delete button please wait untill the messege disappear. Only Admin can view, update and delete categories from here.
    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All Categories
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="table table-hover align-middle" style="table-layout: fixed;">
            <thead>
                <tr>
                    <th class="scope-col">#</th>
                    <th class="scope-col">Categories</th>
                    <th class="scope-col">Description</th>
                    <th class="scope-col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($categories->num_rows > 0){
                        $count = 1;
                        foreach ($categories as $elm) {
                        ?>
                            <tr>
                                <td><?= $count++ ?></td>
                                <td><?= $elm["category"] ?></td>
                                <td><?= $elm["category_description"] ?></td>
                                <td>
                                    <a class="btn btn-primary me-2" href="add_category.php?edit=<?= $elm["category_id"] ?>"><i class="fa-solid fa-pen"></i></a>
                                    <a class="btn btn-danger" href="?delete=<?= $elm["category_id"] ?>"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                    if($res == 1){
                        ?>
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                    <div id="customToast" class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                        <div class="toast-body bg-success text-light">
                            Category has been deleted.
                        </div>
                    </div>
                </div>
                <?php
                    $url = "manage_category.php";
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
                    <th>Categories</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
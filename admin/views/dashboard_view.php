<?php
include_once("classes/Posts.php");
include_once("classes/Categories.php");
include_once("classes/Tags.php");
include_once("classes/Contacts.php");
$post = new Posts();
$category = new Categories();
$tag = new Tags();
$contact = new Contacts();
$catData = $category->showCategories();
$tagData = $tag->showTags();
$postData = $post->getPosts();
$messages = $contact->showContacts();
if (isset($postData)) {
    $totalPost = 0;
    if ($postData->num_rows > 0) {
        foreach ($postData as $elm) {
            $totalPost++;
        }
    } else {
        $totalPost = 0;
    }
}
if (isset($catData)) {
    $totalCat = 0;
    if ($catData->num_rows > 0) {
        foreach ($catData as $elm) {
            $totalCat++;
        }
    } else {
        $totalCat = 0;
    }
}
if (isset($tagData)) {
    $totalTag = 0;
    if ($tagData->num_rows > 0) {
        foreach ($tagData as $elm) {
            $totalTag++;
        }
    } else {
        $totalTag = 0;
    }
}
if (isset($messages)) {
    $totalMessage = 0;
    if ($messages->num_rows > 0) {
        foreach ($messages as $elm) {
            $totalMessage++;
        }
    } else {
        $totalMessage = 0;
    }
}
?>
<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body text-center h4">Total Posts : <?= $totalPost; ?></div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body text-center h4">Total Categories : <?= $totalCat; ?></div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body text-center h4">Total Tags : <?= $totalTag; ?></div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body text-center h4">Total Messages : <?= $totalMessage; ?></div>
        </div>
    </div>
</div>

<!-- <div class="card-footer d-flex align-items-center justify-content-between">
    <a class="small text-white stretched-link" href="#">View Details</a>
    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
</div> -->
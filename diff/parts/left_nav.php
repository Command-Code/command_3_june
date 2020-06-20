<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link <?=(!isset($_GET["category"]))?"active":"";?>" href="index.php">Все</a>
<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/admin/functions.php";
$categories = getCategories();
foreach ($categories as $category) {
?>
    <a class="nav-link <?=($_GET["category"] == $category["id"])?"active":"";?>" href="index.php?category=<?=$category["id"];?>"><?=$category["title"];?></a>
<?php
}
?>
</div>
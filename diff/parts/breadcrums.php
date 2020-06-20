<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="index.php?category=<?=$product["id_category"];?>"><?=getCategoryName($product["id_category"]);?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?=$product["title"];?></li>
    </ol>
</nav>
<div id="selectmovie2"><br><br><br><br><br>
<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/admin/functions.php";
$categories = getCategories();
foreach ($categories as $category) {
?>
    <div class="btn-group"  style="display: block;">
        <button type="button" class="btn btn-info dropdown-toggle <?=($_GET["category"] == $category["id"])?" active ":"";?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?=$category["title"];?>
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="shop.php?category=<?=$category["id"];?>">Все</a>
            <div class="dropdown-divider"></div>
            <?php
                $subcats = getSubcategoriesByCategory($category["id"]);
                if ($subcats) {
                    foreach ($subcats as $subcat){ ?>
                        <a class="dropdown-item" href="shop.php?category=<?=$category["id"];?>&sub=<?=$subcat["id"];?>"><?=$subcat["title"];?></a>
                    <?php }
                }
            ?>
        </div><br><br><br><br><br>
    </div>
<?php
}
?>
</div>





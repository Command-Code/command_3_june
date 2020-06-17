<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/admin/functions.php";
if (!isset($_COOKIE["basket"])){
setcookie("basket",json_encode([]), time()+60*60*24 , "/");
}
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/head.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/top_nav.php";







?>
<div class="container">
    <div class="row m-2">
        <div class="col-2">
            <?php
            include_once $_SERVER["DOCUMENT_ROOT"]."/parts/left_nav.php";
            ?>
        </div>
        <div class="col-10" id="content_column">
            <div class="container">
                <div class="row" id="cards_container">
                    <?php
                    $currentPage = 1;
                    if (isset($_GET["page"]))
                        $currentPage = $_GET["page"];

                    $productsOnPage = 6;
                    include_once $_SERVER["DOCUMENT_ROOT"]."/parts/index_cards.php";
                    ?>
                </div>
                <div class="row">
                    <div class="col-4 offset-4" id="show-more">
                        <input type="hidden" value="<?=$currentPage;?>" id="current_page">
                        <input type="hidden" value="<?=$productsOnPage;?>" id="products-on-page">
                        <button class="btn btn-primary">показать еще</button>
                    </div>
                </div>
                <div class="row">
                    <?php
                        $category = null;
                        if (isset($_GET["category"]))
                            $category = $_GET["category"];
                        $countPage = ceil(getCountProducts($category)/$productsOnPage);
                        if ($countPage){
                            ?>
                    <nav aria-label="...">
                        <ul class="pagination pagination-sm">
                            <?php
                            $i = 1;
                            while ( $i <= $countPage ){
                                if ($i == $currentPage){
                                    ?>
                                    <li class="page-item active" id="pagination<?=$i;?>">
                                      <span class="page-link">
                                        <?=$i;?>
                                      </span>
                                    </li>
                                    <?php
                                }else{
                                    ?>
                                    <li class="page-item" id="pagination<?=$i;?>">
                                        <a class="page-link" href="index.php?<?=$category?"category=".$category:"";?>&page=<?=$i;?>&limit=<?=$productsOnPage;?>"><?=$i;?></a>
                                    </li>
                                    <?php
                                }
                                $i++;
                            }
                            ?>
                        </ul>
                    </nav>
                            <?php
                        }
                    ?>





                </div>
            </div>

        </div><!--/#content_column-->
    </div>
</div><!-- /.container -->


<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/bottom.php";
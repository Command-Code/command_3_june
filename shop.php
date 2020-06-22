<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/admin/functions.php";
if (!isset($_COOKIE["basket"])){
    setcookie("basket",json_encode([]), time()+60*60*24 , "/");
}
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/header.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/top_nav.php";

?>

<div class="container-fluid menu clearfix">
<div class="row">
    <div class="col-2 spisoc">
                <?php
                include_once $_SERVER["DOCUMENT_ROOT"]."/parts/left_nav.php";
                ?>
            </div>


        <!-- контейнер для вывода товаров из категорий -->
    <!-- <div class="col-md-4"> -->
    <div class="col-9">

        <div class="container-fluid " id="cards-sales">

            <!--вывод карточек-->
            <div class="row " id="cards_container">

                <?php
                $currentPage = 1;
                if (isset($_GET["page"]))
                    $currentPage = $_GET["page"];

                $productsOnPage = 6;
                include_once $_SERVER["DOCUMENT_ROOT"]."/parts/index_cards.php";
                ?>

            </div>
            <!--вывод карточек-->

            <!--пагинация-->
            <div class="row " id="pagination-naw">
                <?php
                $category = null;
                $sub_cat = null;
                if (isset($_GET["category"]))
                    $category = $_GET["category"];
                if (isset($_GET["sub"]))
                    $sub_cat = $_GET["sub"];

                $countPage = ceil(getCountProducts($category, $sub_cat)/$productsOnPage);

                if ($countPage) {
                    ?>
                    <nav class="col-12" aria-label="...">
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
                                        <a class="page-link" href="shop.php?<?=$category?"category=".$category:"";?>&page=<?=$i;?>&limit=<?=$productsOnPage;?>"><?=$i;?></a>
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
            <!--/пагинация-->

            <!-- Кнопка показать ещё -->
            <div class="row" >
                <div class="col-12">
                    <input type="hidden" value="<?=$currentPage;?>" id="current_page">
                    <input type="hidden" value="<?=$productsOnPage;?>" id="products-on-page">
                    <button class="btn btn-primary btn-lg"   id="show-more" >показать еще</button>
                </div>
            </div>
            <!-- /Кнопка показать ещё -->
        </div>

    </div>

</div>
</div>
<?php
include $_SERVER["DOCUMENT_ROOT"] . "/parts/footer.php";
?>
<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/admin/functions.php";
if (!isset($_COOKIE["basket"])){
    setcookie("basket",json_encode([]), time()+60*60*24 , "/");
}
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/header.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/top_nav.php";

?>

<div class="container-fluid menu">

    <div class="row glavField">
        <div class="col-2_5 spisoc">
                <?php
                include_once $_SERVER["DOCUMENT_ROOT"]."/parts/left_nav.php";
                ?>
            </div>
        </div> <!-- <div class="col-2"> -->


        <!-- контейнер для вывода товаров из категорий -->
        <div class="col-9_5">

            <div class="container-flui">
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
                    $sub_cat = null;
                    if (isset($_GET["category"]))
                        $category = $_GET["category"];
                    if (isset($_GET["sub"]))
                        $sub_cat = $_GET["sub"];

                    $countPage = ceil(getCountProducts($category, $sub_cat)/$productsOnPage);
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



                <div class="row">












                    <!-- СЛАЙДЕР  -->
                    <!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                      </ol>
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img class="d-block w-100" src="картинки товаров" alt="Первый слайд">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="картинки товаров" alt="Второй слайд">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="картинки товаров" alt="Третий слайд">
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div> -->

                    <!-- /..СЛАЙДЕР  -->

                    <!-- ТУТ ВЫВОДИТЬ КАРТОЧКИ -->

                </div> <!-- /<div class="row"> -->
            </div> <!-- /<div class="container-fluid" style="text-align: center;"> -->

        </div> <!-- /<div class="col-10"> -->

    </div>
















 <!-- <div class="row centered mt-12">
  	<div class="col-6 FILMS">
	  	<a href="/media/films/index.php">
	  	  <img src="img/artage-io-1776234_1592492222.png">
	  	  
	  	  <h2 id="f">ОРУЖИЕ</h2>
	    </a>
	</div>
	<div class="col-6" id="patron">
	  	<a href="/media/music/index_music.php">
		  <img src="img/imgonline-com-ua-Resize-VLMoDweuUxNp29vT.png">
		  <h2>ПАТРОНЫ</h2>
		</a>
	</div>
	<div class="col-6" id="odezhda">
	  	<a href="/media/books/index_books.php">
	  	  <img src="img/imgonline-com-ua-Resize-bSovx7toBWC.png">
	  	  <h2>ОДЕЖДА</h2>
	  	</a>
	</div>
	<div class="col-6">
	  	<a href="/media/books/index_books.php">
	  	  <img src="img/imgonline-com-ua-Resize-rue41hRYmvhDM1.png">
	  	  <h2>ОПТИКА</h2>
	  	</a>
	</div>
  </div>-->
</div>

<?php
include $_SERVER["DOCUMENT_ROOT"] . "/parts/footer.php";
?>
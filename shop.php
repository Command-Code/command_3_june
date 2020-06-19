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

            <!-- Image and text -->
            <!-- <nav class="navbar navbar-light select_iscustvo">
              <a class="navbar-brand" href="http://fmbteka.local/media/films/index.php">
                <img src="../../img/film.png" width="30" height="30" class="d-inline-block align-top" alt="">
              </a>
              <a class="navbar-brand" href="http://fmbteka.local/media/music/index_music.php">
                <img src="../../img/2music.png" width="30" height="30" class="d-inline-block align-top" alt="">
              </a>
              <a class="navbar-brand" href="http://fmbteka.local/media/books/index_books.php">
                <img src="../../img/1book.png" width="30" height="30" class="d-inline-block align-top" alt="">
              </a>
            </nav>
         -->
            <div id="selectmovie2"><br><br><br><br><br>
                <!-- <a href="index.php"><h3>Все</h3></a> -->
                <div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Оружие
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Подкатегории</a>
                        <a class="dropdown-item" href="#">Подкатегории</a>
                        <a class="dropdown-item" href="#">Подкатегории</a>
                        <!-- <div class="dropdown-divider"></div> --><!-- линия между пунктами меню -->
                        <a class="dropdown-item" href="#">Подкатегории</a>
                    </div><br><br><br><br><br>

                    <div class="btn-group">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Одежда
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Подкатегории</a>
                            <a class="dropdown-item" href="#">Подкатегории</a>
                            <a class="dropdown-item" href="#">Подкатегории</a>
                            <!-- <div class="dropdown-divider"></div> --><!-- линия между пунктами меню -->
                            <a class="dropdown-item" href="#">Подкатегории</a>
                        </div>
                    </div><br><br><br><br><br>

                    <div class="btn-group">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Патроны
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Подкатегории</a>
                            <a class="dropdown-item" href="#">Подкатегории</a>
                            <a class="dropdown-item" href="#">Подкатегории</a>
                            <!-- <div class="dropdown-divider"></div> --><!-- линия между пунктами меню -->
                            <a class="dropdown-item" href="#">Подкатегории</a>
                        </div>
                    </div><br><br><br><br><br>

                    <div class="btn-group">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Оптика
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Подкатегории</a>
                            <a class="dropdown-item" href="#">Подкатегории</a>
                            <a class="dropdown-item" href="#">Подкатегории</a>
                            <!-- <div class="dropdown-divider"></div> --> <!-- линия между пунктами меню -->
                            <a class="dropdown-item" href="#">Подкатегории</a>
                        </div>
                    </div>
                </div>



                <?php
                include_once $_SERVER["DOCUMENT_ROOT"]."/parts/left_nav.php";
                ?>







            </div>

        </div> <!-- <div class="col-2"> -->


        <!-- контейнер для вывода товаров из категорий -->
        <div class="col-9_5">

            <div class="container-flui">
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
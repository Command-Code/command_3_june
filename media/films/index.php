<?php
include $_SERVER['DOCUMENT_ROOT'] . '/db.php';
include $_SERVER["DOCUMENT_ROOT"] . "/parts/header.php";
include "spisok_category.php";
?>


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

<?php 
$i = 0;
// если запрос в поиск есть и он не равен пустоте
if(isset($_GET["poisk-text"]) && $_GET["poisk-text"] != "") {

	include 'poisk_film.php';

} else {
	$sql = "SELECT * FROM `weapons`";
	$result = mysqli_query($connect, $sql);

	$sum = mysqli_num_rows($result);
	$i = 0;

	while ($sum > $i) {
	$comp = mysqli_fetch_assoc($result);

include 'card_film.php';

	$i = $i + 1;
	} // while
}			

?>

		</div> <!-- /<div class="row"> -->
	</div> <!-- /<div class="container-fluid" style="text-align: center;"> -->

</div> <!-- /<div class="col-10"> -->

<?php
include $_SERVER["DOCUMENT_ROOT"] . "/parts/footer.php";
?>
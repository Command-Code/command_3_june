<?php
include $_SERVER['DOCUMENT_ROOT'] . '/db.php';
include $_SERVER["DOCUMENT_ROOT"] . "/parts/header.php";
include "spisok_category.php";
?>

<div class="col-9_5">

	<div class="container-fluid" style="text-align: center;">
		<div class="row">
				
<?php
$i = 0;
// если запрос в поиск есть и он не равен пустоте
if(isset($_GET["poisk-text"]) && $_GET["poisk-text"] != "") {

	include 'poisk_film.php';

} else {

	$sql = "SELECT * FROM `films` WHERE category_id = ' ". $_GET["id"] ." ' ";
	$result = mysqli_query($connect, $sql);

	$sum = mysqli_num_rows($result);
	$i = 0;
	while ($sum > $i) {
	$comp = mysqli_fetch_assoc($result);

	$sql2 = "SELECT name FROM directors_films WHERE id_director = '". $_GET['id'] ."'";
  
  	$result2 = mysqli_query($connect, $sql2);

  	$comp2 = mysqli_fetch_assoc($result2);

include 'card_film.php';

	$i = $i + 1;
	} // while
} // else
?>

		</div> <!-- /<div class="row"> -->
	</div> <!-- /<div class="container-fluid" style="text-align: center;"> -->

</div> <!-- /<div class="col-10"> -->

<?php
include $_SERVER["DOCUMENT_ROOT"] . "/parts/footer.php";
?>
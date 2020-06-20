<?php
include $_SERVER['DOCUMENT_ROOT'] . '/db.php';
include $_SERVER["DOCUMENT_ROOT"] . "/parts/header.php";
include "spisok_category.php";
?>

<?php

$sql = "SELECT * FROM directors_films WHERE id_director = '". $_GET['id'] ."'";

$result = mysqli_query($connect, $sql);

$comp = mysqli_fetch_assoc($result);
?>
<div class="col-9_5">
	<img class="kartinka" src="<?php echo $comp['photo']; ?>">


	<p class="Film">
		<b>Имя: </b><?php echo $comp['name'];?><br>
		<b>Краткая биография: </b><?php echo $comp['biography']; ?><br>
		<b>Фильмы этого режиссера: </b><?php echo $comp['films']; ?><br>




<?php
include $_SERVER["DOCUMENT_ROOT"] . "/parts/footer.php";
?>
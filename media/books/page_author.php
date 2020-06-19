<?php
include $_SERVER['DOCUMENT_ROOT'] . '/db.php';
include $_SERVER["DOCUMENT_ROOT"] . "/parts/header.php";
include "spisok_category_books.php";
?>

<?php

$sql = "SELECT * FROM autours_books WHERE id_books = '". $_GET['id'] ."'";

$result = mysqli_query($connect, $sql);

$comp = mysqli_fetch_assoc($result);
?>
<div class="col-9_5">
	<img class="kartinka" src="<?php echo $comp['photo']; ?>">


	<p class="Film">
		<b>Имя: </b><?php echo $comp['name'];?><br>
		<b>Краткая биография: </b><?php echo $comp['biography']; ?><br>
		<b>Книги этого автора: </b><?php echo $comp['books']; ?><br>




<?php
include $_SERVER["DOCUMENT_ROOT"] . "/parts/footer.php";
?>
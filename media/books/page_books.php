<?php
include $_SERVER['DOCUMENT_ROOT'] . '/db.php';
include $_SERVER["DOCUMENT_ROOT"] . "/parts/header.php";
include "spisok_category_books.php";
?>

<?php

if(isset($_GET['id'])){
	$sql = "SELECT * FROM books WHERE id = '". $_GET['id'] ."' ";
	$result = mysqli_query($connect, $sql);

	$comp = mysqli_fetch_assoc($result);

	$sql2 = "SELECT name FROM autours_books WHERE id_books = '".$comp['author']."'";
  

  $result2 = mysqli_query($connect, $sql2);

  $comp2 = mysqli_fetch_assoc($result2);

  $sql3 = "SELECT form FROM categories_books_form WHERE id = '".$comp['categories_books_form_id']."'";
  
  

  $result3 = mysqli_query($connect, $sql3);

  $comp3 = mysqli_fetch_assoc($result3);

  $sql4 = "SELECT rubric FROM categories_books_content WHERE id = '".$comp['categories_books_content_id']."'";
  

  $result4 = mysqli_query($connect, $sql4);

  $comp4 = mysqli_fetch_assoc($result4);

if($comp['banner'] != "") {
?>
<div class="col-9_5">
	<img class="kartinka" src="<?php echo $comp['banner']; ?>">
<?php
} else {
?>
<div class="col-9_5">
		<img class="kartinka" src="../../img/grand_book.png">
<?php
}
?>
		<p class="Book">
		<b>Название: </b><?php echo $comp['name'];?><br>
		<b>Год: </b><?php echo $comp['year']; ?><br>
		<b>Страна: </b><?php echo $comp['country']; ?><br>
		<b>Автор: </b><?php echo $comp2['name']; ?> <a href="page_author.php?id=<?php echo $comp['author'];?> " type="button">Подписаться</a><br>
		<b>Формат: </b><?php echo $comp3['form'];

		// $sqli = "SELECT genre FROM categories WHERE id = '"  "' "

		 ?><br>
		<b>Жанр: </b><?php echo $comp4['rubric']; ?></p>

		<p class="description"><?php echo $comp['description']; ?></p>
	<!-- <img src="../images/09.jpg">
	<img src="../images/batman5_64.jpg">
	<img src="../images/163136.jpg"> -->

		<a class="torrentLink" href="<?php echo $comp['torrent']; ?>" download><h2>Скачать торрент</h2><a/>

	</div> <!-- <div class="col-10"> -->
<?php
}
?>

<?php
include $_SERVER["DOCUMENT_ROOT"] . "/parts/footer.php";
?>
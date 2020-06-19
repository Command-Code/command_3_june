<?php
include $_SERVER['DOCUMENT_ROOT'] . '/db.php';
include $_SERVER["DOCUMENT_ROOT"] . "/parts/header.php";
include "spisok_category_books.php";
?>
<div class="col-9_5">

	<div class="container-fluid" style="text-align: center;">
		<div class="row">

<?php
$i = 0;
if(isset($_GET["poisk-text"]) && $_GET["poisk-text"] != "") {
	
	//подключить файл с запросом поиска
	include 'poisk_books.php';

} else {

	$sql = "SELECT * FROM `books` WHERE categories_books_content_id = ' ". $_GET["id"] ." ' ";
	$result = mysqli_query($connect, $sql);
	$col_books = mysqli_num_rows($result);

	while ($i < $col_books) {
	$book = mysqli_fetch_assoc($result);

	include 'card_book.php';

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
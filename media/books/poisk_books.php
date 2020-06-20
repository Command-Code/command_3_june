<?php
$sql = "SELECT * FROM books WHERE name LIKE '%".$_GET["poisk-text"]."%' 
	OR year LIKE '%".$_GET["poisk-text"]."%'
	OR author LIKE '%".$_GET["poisk-text"]."%'
	OR description LIKE '%".$_GET["poisk-text"]."%'
	OR country LIKE '%".$_GET["poisk-text"]."%'";
	
	$result = mysqli_query($connect, $sql);
	$col_books = mysqli_num_rows($result);

	while ($i < $col_books) {
	$book = mysqli_fetch_assoc($result);

	include 'card_book.php';

	$i = $i + 1;
}
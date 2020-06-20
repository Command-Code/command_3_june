<?php
$sql = "SELECT * FROM films WHERE name LIKE '%". $_GET["poisk-text"] ."%' 
	OR country LIKE '%".$_GET["poisk-text"]."%'
	OR director LIKE '%".$_GET["poisk-text"]."%'
	OR year LIKE '%".$_GET["poisk-text"]."%'
	OR actors LIKE '%".$_GET["poisk-text"]."%'";

	$result = mysqli_query($connect, $sql);
	$sum = mysqli_num_rows($result);

	while ($i < $sum) {
	$comp = mysqli_fetch_assoc($result);
	
include 'card_film.php';

	$i = $i + 1;
	} // while
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/db.php';
include $_SERVER["DOCUMENT_ROOT"] . "/parts/header.php";
include "spisok_category_music.php";
?>

<?php

$sql = "SELECT * FROM autours_music WHERE id_music = '". $_GET['id'] ."'";

$result = mysqli_query($connect, $sql);

$comp = mysqli_fetch_assoc($result);
?>
<div class="col-9_5">
	<img class="kartinka" src="<?php echo $comp['photo']; ?>">


	<p class="Film">
		<b>Имя: </b><?php echo $comp['name'];?><br>
		<b>Краткая биография: </b><?php echo $comp['biography']; ?><br>
		<b>Альбомы этого(их) исполнителя(ей): </b><?php echo $comp['music']; ?><br>




<?php
include $_SERVER["DOCUMENT_ROOT"] . "/parts/footer.php";
?>
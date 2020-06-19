<?php
include $_SERVER['DOCUMENT_ROOT'] . '/db.php';
include $_SERVER["DOCUMENT_ROOT"] . "/parts/header.php";
include "spisok_category_music.php";
?>

<?php

if(isset($_GET['id'])){
	$sql = "SELECT * FROM music WHERE id = '". $_GET['id'] ."' ";
	$result = mysqli_query($connect, $sql);

	$comp = mysqli_fetch_assoc($result);

	$sql2 = "SELECT name FROM autours_music WHERE id_music = '".$comp['authors_album']."'";

  $result2 = mysqli_query($connect, $sql2);

  $comp2 = mysqli_fetch_assoc($result2);

  $sql3 = "SELECT genre FROM categories_music WHERE id = '".$comp['categories_music_id']."'";
  
  $result3 = mysqli_query($connect, $sql3);

  $comp3 = mysqli_fetch_assoc($result3);

if($comp['banner'] != "") {
?>
<div class="col-9_5">
	<img class="kartinkaMusic" src="<?php echo $comp['banner']; ?>">
<?php
} else {
?>
<div class="col-9_5">
	<img class="kartinkaMusic" src="image/vinyl.png">
<?php
}
?>
	<p class="Music">
	<b>Название: </b><?php echo $comp['name_album'];?><br>
	<b>Год: </b><?php echo $comp['year']; ?><br>
	<b>Страна: </b><?php echo $comp['country']; ?><br>
	<b>Автор(ы) альбома: </b><?php echo $comp2['name']; ?> <a href="page_autour_album.php?id=<?php echo $comp['authors_album'];?> " type="button">Подписаться</a><br>
	<b>Содержимое альбома: </b><?php echo $comp['complement_album']; ?><br>
	<b>Жанр: </b><?php echo $comp3['genre']; 

	
	?>
	</p>

	<p class="slovo_faktu"><b>Интересные факты</b></p>
	<p class="description"><?php echo $comp['description']; ?></p>


	<a class="torrentLink" href="<?php echo $comp['torrent']; ?>" download ><h2>Скачать торрент</h2></a>

</div> 
<?php
}
?>

<?php
include $_SERVER["DOCUMENT_ROOT"] . "/parts/footer.php";
?>
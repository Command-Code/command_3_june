<?php

$sql = "SELECT * FROM music WHERE name_album LIKE '%".$_GET["poisk-text"]."%' 
OR authors_album LIKE '%".$_GET["poisk-text"]."%'
OR complement_album LIKE '%".$_GET["poisk-text"]."%'
OR year LIKE '%".$_GET["poisk-text"]."%'
OR country LIKE '%".$_GET["poisk-text"]."%'";

$result = mysqli_query($connect, $sql);
$col_music = mysqli_num_rows($result);

while ($i < $col_music) {
$music = mysqli_fetch_assoc($result);

include 'card_music.php';

$i = $i + 1;
} //while
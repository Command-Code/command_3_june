<?php
include $_SERVER['DOCUMENT_ROOT'] . '/db.php';
include $_SERVER["DOCUMENT_ROOT"] . "/parts/header.php";
include "spisok_category.php";
?>

<?php

if(isset($_GET['id'])){
	$sql = "SELECT * FROM films WHERE id = '". $_GET['id'] ."' ";
	$result = mysqli_query($connect, $sql);

	$comp = mysqli_fetch_assoc($result);

  $sql2 = "SELECT name FROM directors_films WHERE id_director = '".$comp['director']."'";
  

  $result2 = mysqli_query($connect, $sql2);

  $comp2 = mysqli_fetch_assoc($result2);

  $sql3 = "SELECT genre FROM categories WHERE id = '".$comp['category_id']."'";
  

  $result3 = mysqli_query($connect, $sql3);

  $comp3 = mysqli_fetch_assoc($result3);

if($comp['baner'] != "") {
?>
<div class="col-9_5">
	<img class="kartinka" src="<?php echo $comp['baner']; ?>">
<?php
} else {
?>
<div class="col-9_5">
		<img class="kartinka" src="mage/zastavka_kamera3.png.png">
<?php
}
?>

			<p class="Film">
			<b>Название: </b><?php echo $comp['name'];?><br>
			<b>Год: </b><?php echo $comp['year']; ?><br>
			<b>Страна: </b><?php echo $comp['country']; ?><br>
			<b>Режиссер: </b><?php echo $comp2['name']; ?> <a href="page_director.php?id=<?php echo $comp['director'];?>" type="button">Подписаться</a><br>
			<b>Актеры: </b><?php echo $comp['actors']; ?><br>
			<b>Жанр: </b><?php echo $comp3['genre'];
			 ?>
			</p>

			<p class="description"><?php echo $comp['description']; ?></p>

		<video poster="" src="mage/video/1.mov" muted width="350" height="180" controls preload="none"></video>

		<a class="torrentLink" href="<?php echo $comp['torrent']; ?>" download ><h2>Скачать торрент</h2></a>
		

<?php
if (isset($_POST["submit"]) && isset($_POST["user"]) && isset($_POST["email"]) && isset($_POST["content"]) && $_POST["user"] != "" && $_POST["content"] != "") {

  $sql = "INSERT INTO `comments` (`user`,`komu`, `email`, `content`, `rate`) VALUES ('" . $_POST["user"] . "','" . $_POST["komu"] . "', '" . $_POST["email"] . "', '" . $_POST["content"] . "', '" . $_POST["rate"] . "')";
    $connect->query($sql); 
}


if (isset($_COOKIE['polzovatel_id'])) {
?>
<div>
    <h5>Добавить комментарий</h5>
</div>
  <form id="form" method="POST">
      <div id="pole">
          <input type="hidden" name="user" value="<?php echo $_COOKIE['polzovatel_id']; ?>">
          <input type="hidden" name="komu" value="<?php echo $_GET['id']; ?>">
      </div>
      <div id="pole">
          <label id="em">Email</label>
          <input id="email" name="email" type="email" title="Ваша почта" required>
      </div>
      <div id="pole">
          <label id="choose">Личное<br>мнение<br>пользова<br>теля</label>
          <select id="ocenka" name="rate" required>
            <option disabled selected hidden>Сделайте выбор...</option>
            <option id="rec">Рекоммендую</option>
            <option id="notrec">Не рекоммендую</option>
            <option>Нейтрально</option>
          </select>
      </div>
        <div id="pole">
          <label id="cont">Content</label>
          <textarea  id="content" name="content" title="Введите текст комментария" required maxlength="100"></textarea>
        </div>
        <button id="submit" name="submit" type="submit">Добавить отзыв</button>
        <input id="home" type="button" value="Вернуться на главную" onClick='location.href="http://fmbteka.local/"'>
    </form>
    <a class="torrentLink" href="<?php echo $comp['torrent']; ?>" download ><h2>Скачать торрент</h2></a>  



<?php
include $_SERVER['DOCUMENT_ROOT'] . '/comments/rating.php';
  } //if (isset($_COOKIE['polzovatel_id']))
include $_SERVER['DOCUMENT_ROOT'] . '/comments/comment_field.php';
?>

  </div> <!-- <div class="col-10"> -->

<?php
}
?>

<?php
include $_SERVER["DOCUMENT_ROOT"] . "/parts/footer.php";
?>
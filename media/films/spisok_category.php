<div class="container-fluid noPading glavField">
	<div class="row glavField">
  		<div class="col-2_5 spisoc">

<?php 
include $_SERVER["DOCUMENT_ROOT"] . '/parts/select_iscustvo.php';
?>

<div id="selectmovie2" ><br><br><br><br><br>
		<!-- <a href="index.php"><h3>Все</h3></a> -->
		<div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" 
  aria-haspopup="true" aria-expanded="false">
   						 Оружие 
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Подкатегории</a>
    <a class="dropdown-item" href="#">Подкатегории</a>
    <a class="dropdown-item" href="#">Подкатегории</a>
    <!-- <div class="dropdown-divider"></div> --><!-- линия между пунктами меню -->
    <a class="dropdown-item" href="#">Подкатегории</a>
  </div><br><br><br><br><br>

  <div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    					Одежда
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Подкатегории</a>
    <a class="dropdown-item" href="#">Подкатегории</a>
    <a class="dropdown-item" href="#">Подкатегории</a>
    <!-- <div class="dropdown-divider"></div> --><!-- линия между пунктами меню -->
    <a class="dropdown-item" href="#">Подкатегории</a>
  </div>
</div><br><br><br><br><br>

<div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    					Патроны
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Подкатегории</a>
    <a class="dropdown-item" href="#">Подкатегории</a>
    <a class="dropdown-item" href="#">Подкатегории</a>
    <!-- <div class="dropdown-divider"></div> --><!-- линия между пунктами меню -->
    <a class="dropdown-item" href="#">Подкатегории</a>
  </div>
</div><br><br><br><br><br>

<div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    					Оптика 
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Подкатегории</a>
    <a class="dropdown-item" href="#">Подкатегории</a>
    <a class="dropdown-item" href="#">Подкатегории</a>
    <!-- <div class="dropdown-divider"></div> --> <!-- линия между пунктами меню -->
    <a class="dropdown-item" href="#">Подкатегории</a>
  </div>
</div>
</div>
	<?php
		$sql = "SELECT * FROM `categories`";
		$result = mysqli_query($connect, $sql);

		while ($comp = mysqli_fetch_assoc($result)) {
	?>
		<a href="category.php?id=<?php echo $comp['id'];?>"><h2><?php echo $comp['genre'] ?></h2></a>
	<?php
		}
	?>
</div>

</div> <!-- <div class="col-2"> -->

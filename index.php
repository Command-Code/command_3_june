<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/admin/functions.php";
if (!isset($_COOKIE["basket"])){
    setcookie("basket",json_encode([]), time()+60*60*24 , "/");
}
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/header.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/parts/top_nav.php";

?>

<div class="container-fluid menu">
  <div class="row centered mt-12">
  	<div class="col-6 FILMS">
	  	<a href="/shop.php?category=1">
	  	  <img src="img/artage-io-1776234_1592492222.png">
	  	  
	  	  <h2 id="f">ОРУЖИЕ</h2>
	    </a>
	</div>
	<div class="col-6" id="patron">
	  	<a href="/shop.php?category=2">
		  <img src="img/imgonline-com-ua-Resize-VLMoDweuUxNp29vT.png">
		  <h2>ПАТРОНЫ</h2>
		</a>
	</div>
	<div class="col-6" id="odezhda">
	  	<a href="/shop.php?category=3">
	  	  <img src="img/imgonline-com-ua-Resize-bSovx7toBWC.png">
	  	  <h2>ОДЕЖДА</h2>
	  	</a>
	</div>
	<div class="col-6">
	  	<a href="/shop.php?category=4">
	  	  <img src="img/imgonline-com-ua-Resize-rue41hRYmvhDM1.png">
	  	  <h2>ОПТИКА</h2>
	  	</a>
	</div>
  </div>
</div>

<?php
include $_SERVER["DOCUMENT_ROOT"] . "/parts/footer.php";
?>

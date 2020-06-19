<div class="col-6">
	<div class="col-lg-8 mx-auto">
		<div class="card mb-10" style='width: 18rem;'>

<a href="page_film.php?id=<?php echo $comp['id'];?>">

<?php
if($comp['image'] != "") {
?>
	<img class="card_img_top" src="<?php echo $comp['image']?>" alt="Card image cap">
<?php
} else {
?>
	<img class="card_img_top" src="mage/zastavka_kamera3.png.png" alt="Card image cap">
<?php
}
?>
	<div class="card-body">
  		<h5 class="card-title"><?php echo $comp['Name']; ?></h5>
 		 <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
		</div>
	<div class="card-footer">
  		<small class="text-muted"></small>
	</div>
</a>

	    </div> <!-- /<div class="card mb-10" style='width: 18rem;'> -->
	</div> <!-- /<div class="col-lg-8 mx-auto"> -->
</div><!--  /<div class="col-4"> -->

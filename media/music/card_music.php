<div class="col-4">
		<div class="col-lg-8 mx-auto">
			<div class="card mb-10 card_music">

<a href="page_music.php?id=<?php echo $music['id'];?>">
	<?php
	if($music['banner'] != "") {
	?>
		<img class="card_img_music" src="<?php echo $music['banner']?>" alt="Card image cap">
	<?php
	} else {
	?>
		<img class="card_img_music" src="image/vinyl.png" alt="Card image cap">
	<?php
	}
	?>
	<div class="card-body">
  		<h5 class="card-title"><?php echo $music['name_album'] ?></h5>
 		 <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
	</div>
	<div class="card-footer">
  		<small class="text-muted"></small>
	</div>
</a>

		</div> <!-- /<div class="card mb-10" style='width: 18rem;'> -->
	</div> <!-- /<div class="col-lg-8 mx-auto"> -->
</div><!--  /<div class="col-4"> -->
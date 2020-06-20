<?php
include $_SERVER['DOCUMENT_ROOT'] . '/db.php';
include $_SERVER["DOCUMENT_ROOT"] '/coments/rating.php';		
?>


<!DOCTYPE html>
<html>
<head>
	<title>klei-tv</title>
	<style>
		.point {
			background-image: url(images/stars.png);
			width: 300px;
			height: 59px;
				}

		#point {
			background-image: url(images/stars2.png);
			width: <?php echo $width; ?>px;
			height: 59px;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<video poster="" src="video/1.mov" muted width="350" height="180" controls preload="none"></video>
	<div id="content">

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/comments/comment_field.php';
?>

	</div>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/comments/rating.php';
?>
</body>
</html>
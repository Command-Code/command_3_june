<?php
include $_SERVER['DOCUMENT_ROOT'] . '/db.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
	
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../style/style.css">
	<link rel="stylesheet" href="../../style/page_style.css">
	
	<!-- подключил стили для формы регистрации и авторизации из bootstrap -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

	<title>PATRON</title>
	<!-- <link rel="stylesheet" href="../../css/style.css" media="all"> -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
</head>
<body>
<header>

	<!-- Image and text -->
<!-- 	navbar navbar-light bg-light 
	pos-f-t
 --><nav class="shapka">
	  <a class="logotype" href="http://patron2.local/">
	   <img src="/img/logo.png" class="img-logo">
	  </a>

	  <form method="GET" id="poisk" class="form-inline poisk">
	    <input class="form-control mr-sm-2" type="text" name="poisk-text" placeholder="Search" aria-label="Search">
	    <button type="search" name="search" class="btn vvod my-2 my-sm-0"><img src="../../img/search5.png"></button>
	  </form>

	  <span class="vhod">
		  <h5 class="text-white h4"><a href="/register/register.php">Регистрация</a></h5>
		  <?php 
			if (isset($_COOKIE["polzovatel_id"])) {
				$sql = "SELECT * FROM polzovateli WHERE id=" . $_COOKIE["polzovatel_id"];
				$result = mysqli_query($connect, $sql);
				$polzovatel = mysqli_fetch_assoc($result);

				?>
				<h5 class="text-white h4"><a href="/register/exit.php" id="exit-login"><?php echo $polzovatel["name"]; ?> &#187;</a></h5>
				<?php	
			} else {
				?>
				<h5 class="text-white h4"><a href="/register/login.php">Авторизация</a></h5>		
			<?php						
			}
			?>		  
	  </span>

	  
	</nav>

</header>

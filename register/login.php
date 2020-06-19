<?php
include $_SERVER["DOCUMENT_ROOT"] . "/parts/header.php";
include $_SERVER['DOCUMENT_ROOT'] . '/db.php';

if (
	isset($_POST["email"]) && isset($_POST["password"])
	&& ($_POST["email"] != "" && $_POST["password"] != "")) {
	// сделать sql запрос из бд чтобы найти пользователя с таким же email и password
	$sql = "SELECT * FROM `polzovateli` WHERE `email` LIKE '" . $_POST["email"] . "' AND `password` LIKE '" . $_POST["password"] . "'";

	$result = mysqli_query($connect, $sql);
	$col_polzovateley = mysqli_num_rows($result);

	if ($col_polzovateley == 1) {

		$polzovatel = mysqli_fetch_assoc($result);

		// создаем куки для хранения данных пользователя на указаное время (60 минут)
		setcookie("polzovatel_id", $polzovatel["id"], time() + 3600, "/");
		// переход на главную / страницу сайта
		header("Location: /");
	} else {
		 echo "<h2>Логин или пароль введены неверно!</h2>";
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Авторизация</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
	<body>
		<div class="container" id="container">
 	<div class="row main-form" style=" margin-top: 200px">
		 <form class="" method="post" action="#">
		 
		 <div class="form-group">
		 	<label for="name" class="cols-sm-2 control-label">Your Name</label>
		 		<div class="cols-sm-10">
		 			<div class="input-group">
		 				<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
		 			<input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name"/>
		 		</div>
		 	</div>
		 </div>

		 <!-- <div class="form-group">
		 	<label for="email" class="cols-sm-2 control-label">Your Email</label>
		 		<div class="cols-sm-10">
		 			<div class="input-group">
		 				<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
		 			<input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email"/>
		 		</div>
		 	</div>
		 </div> -->

		 <div class="form-group">
		 	<label for="password" class="cols-sm-2 control-label">Password</label>
		 		<div class="cols-sm-10">
		 			<div class="input-group">
		 				<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
		 			<input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password"/>
		 		</div>
		 	</div>
		 </div>

		 <div class="form-group ">
		 	<a href="#" target="_blank" type="button" id="button" 
		 	   class="btn btn-primary btn-lg btn-block login-button">Log In
		 	</a>
		 </div>
		 
		 </form>
 		</div>
 	</div>
</body>
</html>

<?php
include $_SERVER["DOCUMENT_ROOT"] . "/parts/footer.php";
?>
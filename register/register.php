<?php
include $_SERVER["DOCUMENT_ROOT"] . "/parts/header.php";
include $_SERVER['DOCUMENT_ROOT'] . '/db.php';

if (isset($_POST["email"]) && isset($_POST["name"]) && isset($_POST["password"])
 && isset($_POST["repassword"])
	&& ($_POST["email"] != "" && $_POST["name"] != "" && $_POST["password"] != "" && $_POST["repassword"] != "" && $_POST["password"] == $_POST["repassword"])) {
	// Вставить в таблицу !название таблицы!()
	$sql ="INSERT INTO polzovateli (email, name, password) VALUES ('" . $_POST["email"] . "','" . $_POST["name"] . "','" . $_POST["password"] . "')";

	if (mysqli_query($connect, $sql)) {
		echo "<h2>Пользователь добавлен</h2>";
		// header("Location: /");
	} else {
		echo "<h2>Ошибка</h2>". mysqli_error($connect); 
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
</head>
<body>
 <div class="container" id="container">
	 <div class="row main-form">
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

		 <div class="form-group">
		 	<label for="email" class="cols-sm-2 control-label">Your Email</label>
		 		<div class="cols-sm-10">
		 			<div class="input-group">
		 				<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
		 			<input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email"/>
		 		</div>
		 	</div>
		 </div>

		 <div class="form-group">
		 	<label for="username" class="cols-sm-2 control-label">Username</label>
		 		<div class="cols-sm-10">
		 			<div class="input-group">
						 <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
					 <input type="text" class="form-control" name="username" id="username" placeholder="Enter your Username"/>
		 		</div>
		 	</div>
		 </div>

		 <div class="form-group">
		 	<label for="password" class="cols-sm-2 control-label">Password</label>
		 		<div class="cols-sm-10">
		 			<div class="input-group">
		 				<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
					 <input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password"/>
		 		</div>
		 	</div>
		 </div>

		 <div class="form-group">
		 	<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
		 		<div class="cols-sm-10">
		 			<div class="input-group">
		 				<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
		 			<input type="password" class="form-control" name="confirm" id="confirm" placeholder="Confirm your Password"/>
		 		</div>
		 	</div>
		 </div>

		 <div class="form-group ">
		 	<a href="#" target="_blank" type="button" id="button" class="btn btn-primary btn-lg btn-block login-button">
		 		Register
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
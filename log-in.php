<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
	setcookie("teacher", "", 0);
	setcookie("student", "", 0);
	if(isset($_POST["email"]) && $_POST["email"] != "" &&
	(isset($_POST["password"])) && $_POST["password"] != ""){
		$logInSql = "SELECT * FROM contacts WHERE `login` LIKE '" . $_POST["email"] . "' AND `password` LIKE '" . $_POST["password"] . "'";
		$logResult = mysqli_query($connect, $logInSql);
		$quant = mysqli_num_rows($logResult);
		if($quant == 1){
			$person = mysqli_fetch_assoc($logResult);
			if($person["user_status"] == 1){
				setcookie("teacher", $person["id"], time() + 60*60);
				header("Location: /pages/teacher-chat.php");
			}else{
				setcookie("student", $person["id"], time() + 60*60);
				header("Location: /pages/child-chat.php");
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/style/style.css">
	<link rel="stylesheet" type="text/css" href="/style/log.css">
	<link rel="shortcut icon" type="image/x-icon" href="/images/ic.png" />
	<title>Увійти</title>
</head>
<body>
	<?php
		include $_SERVER['DOCUMENT_ROOT'] . "/pice-of-site/header.php";
	?>
	<div class="modal" id="log-in-modal" style="display:block;">
		<p>Вхід</p>
		<form id="log-in-form" action="/log-in.php" method="POST">
			<label for="login-in">Ваш логін:</label>
			<input id="login-in" type="email" name="email" placeholder="aaa@gmail.com" required>
			<label for="password-in">Ваш пароль:</label>
			<input id="password-in" type="password" name="password" placeholder="fIm62WF92z" required>
			<a id="go-to-sign-up" href="/registration.php">Немає акаунту? Зареєструйтесь!</a>
			<button type="submit">Увійти</button>
		</form>
	</div>
</body>
</html>

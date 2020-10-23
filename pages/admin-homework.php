<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/style/style.css">
	<link rel="stylesheet" type="text/css" href="/style/chat.css">
	<link rel="stylesheet" type="text/css" href="/style/admin.css">
	<link rel="shortcut icon" type="image/x-icon" href="/images/t-ic.png" />
	<title>Адміністрування</title>
</head>
<body>

	<?php
		include $_SERVER['DOCUMENT_ROOT'] . "/pice-of-site/header.php";
		include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
		if(!isset($_COOKIE["teacher"])){
			header("Location: /pages/log-in.php");
		}
	?>

	<main id="main">
		<div id="content" class="flex">
			<p class="admin-title">Оголосити про нове домашнє завдання</p>
			<form action="http://class.local/modules/add-homework.php" method="POST" id="add">
				<input type="text" name="date" placeholder="Дата перевірки">
				<input type="text" name="home" placeholder="Завдання">
				<input type="hidden" name="teacher" value="<?php echo $_COOKIE["teacher"] ?>">
				<button type="submit" name="add-home">Оголосити</button>
			</form>

			<table id="admin-home">
				<?php
					include $_SERVER['DOCUMENT_ROOT'] . "/modules/table-home.php";
				?>
		</table>
		</div>
	</main>
	<script src="/js/admin.js"></script>
</body>
</html>
<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" type="text/css" href="style/index.css">
	<link rel="shortcut icon" type="image/x-icon" href="/images/ic.png" />
	<title>Наш клас</title>
</head>
<body>
	<?php
		include $_SERVER['DOCUMENT_ROOT'] . "/pice-of-site/header.php";
	?>
	<main>
		<div class="head">
			<h1 class="title">НАШ 8-Ф</h1>
		</div>
		<div class="memories">
			<h2 class="memory__title">Наша остання поїздка</h2>
			<div class="content">
				<div class="memory__cards">
					<div class="card">
						<div class="image"></div>
						<p>Святкуємо наближення Пасхи в Києві! Фото біла Лаври.</p>
						<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore nemo voluptatum explicabo repellendus sit cumque.</p>
					</div>
					<div class="card">
						<div class="image"></div>
						<p>Приїхали до Києва після страусиної ферми. Знайомимося з визначними місцями.</p>
						<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore nemo voluptatum explicabo repellendus sit cumque.</p>
					</div>
					<div class="card">
						<div class="image"></div>
						<p>Відвідали страусину ферму. Дізнались багато нового та цікавого</p>
						<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore nemo voluptatum explicabo repellendus sit cumque.</p>
					</div>
					<div class="card">
						<div class="image"></div>
						<p>Наш чудовий класний керівник, який організував нам цю подію.</p>
						<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore nemo voluptatum explicabo repellendus sit cumque.</p>
					</div>
				</div>
				<div class="also-memory">
					<div class="image"></div>
					<div class="image"></div>
				</div>
			</div>
		</div>
	</main>

	<footer>
		<a href="index.php" id="logo">
			<img src="images/ic.png" alt="logo">
			<span>
				<b>Наш клас</b>
			</span>
		</a>
		<div class="year">2020</div>
		<div class="info">
			<div class="statosta">Староста: Олена Ліновал</div>
			<div class="teacher">Класний керівник: Тимофієва Тетяна Олегівна</div>
		</div>
	</footer>
</body>
</html>
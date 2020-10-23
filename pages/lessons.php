<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/style/style.css">
	<link rel="stylesheet" type="text/css" href="/style/chat.css">
	<link rel="shortcut icon" type="image/x-icon" href="/images/ic.png" />
	<title>Розклад дзвінків</title>
</head>
<body>

	<?php
		include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
		include $_SERVER['DOCUMENT_ROOT'] . "/pice-of-site/header.php";
		if(!isset($_COOKIE["student"])){
			header("Location: /log-in.php");
		}
	?>
	<main>
		<div id="content" class="flex">
			<p class="admin-title">Розклад дзвінків</p>
			<table>
			<tr>
				<th>№ уроку</th>
				<th>Початок</th>
				<th>Кінець</th>
				<th>Перерва</th>
			</tr>
			<?php
				$sql_lessons = "SELECT * FROM lessons";
				// выполнить sql запрос в базе данных
				$result_lessons = mysqli_query($connect, $sql_lessons);
				// mysqli_num_rows - получить кол-во результатов
				$col_lessons = mysqli_num_rows($result_lessons);
				$i = 0;
            // пока в перемменной хранится значение меньше чем кол-во уроков
            while($i < $col_lessons) {
				// mysqli_fetch_assoc - преобразовать полученные данные пользователя в массив
					$lessons = mysqli_fetch_assoc($result_lessons);
			?>
					<tr>
						<td><?php echo $i+1 ?></td>
						<td><?php echo $lessons["time_1"]; ?></td>
						<td><?php echo $lessons["time_2"]; ?></td>
						<td><?php echo $lessons["break"]; ?> хв</td>
					</tr>
				<?php
				// Увеличиваем счетчик
				$i = $i + 1;
				}
				?>
			</table>
		</div>
	</main>
</body>
</html>
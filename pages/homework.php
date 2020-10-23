<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/style/style.css">
	<link rel="stylesheet" type="text/css" href="/style/chat.css">
	<link rel="shortcut icon" type="image/x-icon" href="/images/ic.png" />
	<title>Домашня робота</title>
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
			<p class="admin-title">Домашня робота</p>
			<table>
				<tr>
					<th>№</th>
					<th>Предмет</th>
					<th>Завдання</th>
					<th>День перевірки</th>
				</tr>
			<?php
				$sql_homework = "SELECT * FROM homework";
				// выполнить sql запрос в базе данных
				$result_homework = mysqli_query($connect, $sql_homework);
				// mysqli_num_rows - получить кол-во результатов
				$col_homework = mysqli_num_rows($result_homework);
            $i = 0;
            // пока в перемменной хранится значение меньше чем кол-во ДЗ
            while($i < $col_homework) {
					// mysqli_fetch_assoc - преобразовать полученные данные пользователя в массив
					$homework = mysqli_fetch_assoc($result_homework);
					$sql_user = "SELECT * FROM contacts WHERE user_status = 1";
					// выполнить sql запрос в базе данных
					$result_user = mysqli_query($connect, $sql_user);
					$user = mysqli_fetch_assoc($result_user);
         ?>
				<tr>
					<td><?php echo $i+1; ?></td>
					<td><?php echo $user["subject"]; ?></td>
					<td><?php echo $homework["homework"]; ?></td>
					<td><?php echo $homework["day"]; ?></td>
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
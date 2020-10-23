<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/style/style.css">
	<link rel="stylesheet" type="text/css" href="/style/chat.css">
	<link rel="shortcut icon" type="image/x-icon" href="/images/t-ic.png" />
	<title>Вчителі</title>
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
			<p class="admin-title">Контакти вчителів</p>
			<table>
				<tr>
					<th>№</th>
					<th>ПІБ</th>
					<th>Предмет</th>
					<th>Контакт</th>
				</tr>
			<?php
				$sql_contacts = "SELECT * FROM contacts WHERE user_status != 0";
				// выполнить sql запрос в базе данных
				$result_contacts = mysqli_query($connect, $sql_contacts);
				// mysqli_num_rows - получить кол-во результатов
				$col_contacts = mysqli_num_rows($result_contacts);
				// $i счетчик для подсчета пользователей
            $i = 0;
              // пока в перемменной хранится значение меньше чем кол-во пользователей
				while($i < $col_contacts) {
					// mysqli_fetch_assoc - преобразовать полученные данные пользователя в массив
					$contact = mysqli_fetch_assoc($result_contacts);
				?>
				<tr>
					<td><?php echo $i+1; ?></td>
					<td><?php echo $contact["name"]; ?></td>
					<td><?php echo $contact["subject"]; ?></td>
					<td><?php echo $contact["phone"]; ?></td>
				</tr>
				<?php
            // Увеличиваем счетчик
            $i = $i + 1;
				}
			?>   
			</table>
		</div>
	</main>
	
	<script src="js/main.js"></script>
</body>
</html>
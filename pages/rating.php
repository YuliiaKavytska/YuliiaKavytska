<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/style/style.css">
	<link rel="stylesheet" type="text/css" href="/style/chat.css">
	<link rel="shortcut icon" type="image/x-icon" href="/images/ic.png" />
	<title>Оцінки</title>
</head>
<body>

	<?php
		include $_SERVER['DOCUMENT_ROOT'] . "/pice-of-site/header.php";
		include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
		if(!isset($_COOKIE["student"])){
			header("Location: /log-in.php");
		}
	?>

	<main>
		<div id="content" class="flex">
			<p class="admin-title">Мої оцінки</p>
			<table>
				<tr>
					<th>№</th>
					<th>Учень</th>
					<th>Предмет</th>
					<th>Дата</th>
					<th>Оцінка</th>
				</tr>
			<?php
				$sqlRating = "SELECT * FROM rating WHERE student_id=" . $_COOKIE["student"];
				$resultRating = mysqli_query($connect, $sqlRating);
				$col_rating = mysqli_num_rows($resultRating);
            $i = 0;
              // пока в перемменной хранится значение меньше чем кол-во ДЗ
				while($i < $col_rating) {
					$rating = mysqli_fetch_assoc($resultRating);
					$sqlStudent = "SELECT * FROM contacts WHERE id=" . $rating["student_id"];
					$resultStudentResult = mysqli_query($connect, $sqlStudent);
					$student = mysqli_fetch_assoc($resultStudentResult);
					$sqlTeacher = "SELECT * FROM contacts WHERE id=" . $rating["subject"];
					$resultTeacher = mysqli_query($connect, $sqlTeacher);
					$teacher = mysqli_fetch_assoc($resultTeacher);
			?>	
				<tr>
					<td><?php echo $i+1; ?></td>
					<td><?php echo $student["name"]; ?></td>
					<td><?php echo $teacher["subject"]; ?></td>
					<td><?php echo $rating["date"]; ?></td>
					<td><?php echo $rating["rating"]; ?></td>
				</tr>
				<?php
					// Увеличиваем счетчи
					$i = $i + 1;
				}
				?>
			</table>
		</div>
	</main>
</body>
</html>
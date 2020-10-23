<tr>
	<th>№</th>
	<th>Учень</th>
	<th>Предмет</th>
	<th>Дата</th>
	<th>Оцінка</th>
	<th>Видалення</th>
</tr>
	<?php
		$sqlRating = "SELECT * FROM rating WHERE subject=" . $_COOKIE["teacher"];
		$resultRating = mysqli_query($connect, $sqlRating);
		$col_rating = mysqli_num_rows($resultRating);
		$i = 0;
		// пока в перемменной хранится значение меньше чем кол-во оценок
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
		<td><div data-link="http://class.local/modules/delete-rating.php?id=<?php echo $rating["id"] ?>" onclick="deleteProduct(this)" class="click">Видалити</div> </td>
	</tr>
	<?php
		// Увеличиваем счетчик
		$i = $i + 1;
		}
	?>
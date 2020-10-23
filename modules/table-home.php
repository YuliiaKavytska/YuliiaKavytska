<tr>
	<th>№</th>
	<th>Предмет</th>
	<th>Дата перевірки</th>
	<th>Завдання</th>
	<th>Видалення</th>
</tr>
	<?php
		$sqlHomework = "SELECT * FROM homework WHERE subject=" . $_COOKIE["teacher"];
		$resultHomework = mysqli_query($connect, $sqlHomework);
		$col_homework = mysqli_num_rows($resultHomework);
		$i = 0;
		// пока в перемменной хранится значение меньше чем кол-во ДЗ
		while($i < $col_homework) {
			$homework = mysqli_fetch_assoc($resultHomework);
			$sqlTeacher = "SELECT * FROM contacts WHERE id=" . $homework["subject"];
			$resultTeacher = mysqli_query($connect, $sqlTeacher);
			$teacher = mysqli_fetch_assoc($resultTeacher);	
	?>
	<tr>
		<td><?php echo $i+1; ?></td>
		<td><?php echo $teacher["subject"]; ?></td>
		<td><?php echo $homework["day"]; ?></td>
		<td><?php echo $homework["homework"]; ?></td>
		<td><div data-link="http://class.local/modules/delete-home.php?id=<?php echo $homework["id"] ?>" onclick="deleteProduct(this)" class="click">Видалити</div> </td>
	</tr>
	<?php
		// Увеличиваем счетчик
		$i = $i + 1;
}
?>
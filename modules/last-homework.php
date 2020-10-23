<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

	$homeworkSql = "SELECT * FROM homework";
	$homeResult = $connect->query($homeworkSql);
	$quant = mysqli_num_rows($homeResult);

	if($quant < 5){
		while($homework = mysqli_fetch_assoc($homeResult)){
			$subjectSql = "SELECT * FROM contacts WHERE id=" . $homework["subject"];
			$teacherResult = mysqli_query($connect, $subjectSql);
			$teacher = mysqli_fetch_assoc($teacherResult);
?>
			<li class="home__item">
				<p>Виконати на <span><?php echo $homework["day"] ?></span></p>
				<p><?php echo $teacher["subject"] ?>:</p>
				<p><?php echo $homework["homework"] ?></p>
			</li>
<?php
		}
	}else{
		$i = 0;
		while($i < 5){
			$subjectSql = "SELECT * FROM contacts WHERE id=" . $homework["subject"];
			$teacherResult = mysqli_query($connect, $subjectSql);
			$teacher = mysqli_fetch_assoc($teacherResult);
?>
			<li class="home__item">
				<p>Виконати на <span><?php echo $homework["day"] ?></span></p>
				<p><?php echo $teacher["subject"] ?>:</p>
				<p><?php echo $homework["homework"] ?></p>
			</li>
<?php
	}
}
?>
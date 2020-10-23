<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

	if(isset($_POST["add-rating"])){
		$addSql = "INSERT INTO rating (student_id, `date`, rating, `subject`) VALUES ('" . $_POST["student"] . "', '" . 
		$_POST["date"] . "', '" . $_POST["rating"] . "', '" . $_POST["teacher"] . "')";
		mysqli_query($connect, $addSql);
	}
	include $_SERVER['DOCUMENT_ROOT'] . "/modules/table-rating.php";
?>
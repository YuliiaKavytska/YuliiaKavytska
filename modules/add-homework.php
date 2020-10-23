<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

	if(isset($_POST["add-home"])){
		$addSql = "INSERT INTO homework (`subject`, `day`, homework) VALUES ('" . $_POST["teacher"] . "', '" . $_POST["date"] . "', '" . $_POST["home"] . "')";
		mysqli_query($connect, $addSql);
	}
	include $_SERVER['DOCUMENT_ROOT'] . "/modules/table-home.php";
?>
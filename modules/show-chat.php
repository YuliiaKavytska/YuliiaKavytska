<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
	if(isset($_POST["show"])){
		$addSql = "INSERT INTO messages (sender_id, recipient_id, message) VALUES ('" . $_POST["sender"] . "', '" . $_POST["recipient"] . "', '" . $_POST["message"] . "')";
		mysqli_query($connect, $addSql);

		$editSqlFirst = "UPDATE contacts SET last_message ='" . $_POST["message"] . "' WHERE contacts.id =" . $_POST["sender"];
		mysqli_query($connect, $editSqlFirst);

		$editSqlSec = "UPDATE contacts SET last_message ='" . $_POST["message"] . "' WHERE contacts.id =" . $_POST["recipient"];
		mysqli_query($connect, $editSqlSec);

		
		$recipient = $_POST["recipient"];
		include $_SERVER['DOCUMENT_ROOT'] . "/modules/message-block.php";
	}
?>
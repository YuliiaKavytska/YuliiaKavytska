<?php
	if(isset($_POST["find"])){
		$chat =  $_POST["find_user"];
		$nameChat = $_POST["chat"];
		include $_SERVER['DOCUMENT_ROOT'] . "/modules/chats-block.php";
		}
?>
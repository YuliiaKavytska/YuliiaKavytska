<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/style/style.css">
	<link rel="stylesheet" type="text/css" href="/style/chat.css">
	<link rel="shortcut icon" type="image/x-icon" href="/images/t-ic.png" />
	<title>Чат</title>
</head>
<body>

	<?php
		include $_SERVER['DOCUMENT_ROOT'] . "/pice-of-site/header.php";
		if(isset($_GET["user_id"])){
			include $_SERVER['DOCUMENT_ROOT'] . "/modules/user-modal.php";
		}
		if(!isset($_COOKIE["student"]) && !isset($_COOKIE["teacher"])){
			header("Location: /log-in.php");
		}
	?>

	<main>
		<div id="content">
			<aside id="users">
			<form method="POST" id="search" action="http://class.local/modules/sql-find-user.php">
					<input type="text" name="find-user" placeholder="Search...">
					<input type="hidden" name="chat" value='<?php if(isset($_COOKIE['student'])){ echo "student"; }else{ echo "teacher"; } ?>'>
					<button type="submit" name="find">
						<img src="/images/search.png" alt="search">
					</button >
				</form>
				<div id="chat-list">
					<?php include $_SERVER['DOCUMENT_ROOT'] . "/modules/chats-block.php" ?>
				</div>
				</aside>

			<section id="message-story">
				<div id="messages">
					<?php 
					include $_SERVER['DOCUMENT_ROOT'] . "/modules/message-block.php";
					?>
				</div>
				<?php
				if(isset($_GET["chat_id"])){
					$recipiendSql = "SELECT * FROM contacts WHERE id=" . $_GET["chat_id"];
					$recipientResult = $connect -> query($recipiendSql);
					$recipient = mysqli_fetch_assoc($recipientResult);
					if(isset($_COOKIE["student"])){
						$findUserSql = "SELECT * FROM contacts WHERE id=" . $_COOKIE["student"];
					}else{
						$findUserSql = "SELECT * FROM contacts WHERE id=" . $_COOKIE["teacher"];
					}
					$findResult = $connect -> query($findUserSql);
					$user = mysqli_fetch_assoc($findResult);
					?>
					<form id="send-form" method="POST" action="http://class.local/modules/show-chat.php">
						<div class="avatar">
							<img src="<?php if($user["image"] == ""){ echo "/images/not-find.png"; }else{ echo $user["image"]; } ?>" alt="user">
						</div>
						<div class="main-form">
							<textarea name="message" id="text-message" placeholder="Ваше повідомлення..."></textarea>
							<input type="hidden" name="sender" value="<?php if(isset($_COOKIE["student"])){ echo $_COOKIE["student"]; }else{ echo $_COOKIE["teacher"]; } ?>">
							<input type="hidden" name="recipient" value="<?php echo $_GET["chat_id"] ?>">
							<button type="send"> <img src="/images/send.png" alt="">Надіслати</button>
						</div>
						<div class="avatar">
							<img src="<?php if($recipient["image"] == ""){ echo "/images/not-find.png"; }else{ echo $recipient["image"]; } ?>" alt="user">
						</div>
					</form>
					<?php
				}
				?>
			</section>
		</div>
	</main>
	<div class="baground">	</div>
	<script src="/js/main.js"></script>
	<script src="/js/script.js"></script>
</body>
</html>
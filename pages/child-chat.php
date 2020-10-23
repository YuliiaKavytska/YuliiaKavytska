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
	<link rel="shortcut icon" type="image/x-icon" href="/images/ic.png" />
	<title>Чат</title>
</head>
<body>

	<?php
		include $_SERVER['DOCUMENT_ROOT'] . "/pice-of-site/header.php";
		if(isset($_GET["user_id"])){
			include $_SERVER['DOCUMENT_ROOT'] . "/modules/user-modal.php";
		}
		if(!isset($_COOKIE["student"])){
			header("Location: /log-in.php");
		}
	?>

	<main>
		<div id="content">
			<aside id="users">
				<form method="POST" id="search" action="http://class.local/modules/sql-find-user.php">
					<input type="text" name="find-user" placeholder="Search...">
					<input type="hidden" name="chat" value="child">
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

					$findUserSql = "SELECT * FROM contacts WHERE id=" . $_COOKIE["student"];
					$findResult = $connect -> query($findUserSql);
					$user = mysqli_fetch_assoc($findResult);
					?>
					<form id="send-form" method="POST" action="http://class.local/modules/show-chat.php">
						<div class="avatar">
							<img src="<?php if($user["image"] == ""){ echo "/images/not-find.png"; }else{ echo $user["image"]; } ?>" alt="user">
						</div>
						<div class="main-form">
							<textarea name="message" id="text-message" placeholder="Ваше повідомлення..."></textarea>
							<input type="hidden" name="sender" value="<?php echo $_COOKIE["student"] ?>">
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
			<section class="actions">
				<div class="actions__info">
					<p>Корисна інформація:</p>
					<a href="/pages/lessons.php" target="_blank">Розклад дзвінків</a>
					<a href="/pages/rating.php" target="_blank">Переглянути оцінки</a>
					<a href="/pages/contacts.php" target="_blank">Контакти вчителів</a>
				</div>
				<div class="homework-block">
					<p>Останні домашні завдання:</p>
					<a href="/pages/homework.php" target="_blank">Переглянути всі домашні завдання</a>
					<ul class="homework">
						<?php include $_SERVER['DOCUMENT_ROOT'] . "/modules/last-homework.php" ?>
					</ul>
				</div>
			</section>
		</div>
	</main>

	<div class="baground">	</div>
	<script src="/js/main.js"></script>
	<script src="/js/script.js"></script>
</body>
</html>
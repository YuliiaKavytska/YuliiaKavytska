<ul>
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
		if(isset($_GET["chat_id"]) || isset($recipient)){
			if(isset($_COOKIE["student"])){
				$user = $_COOKIE["student"];
			}else{
				$user = $_COOKIE["teacher"];
			}
			if(isset($recipientUserId)){
				$recipient = $recipientUserId;
			}else if(isset($_GET["chat_id"])){
				$recipient = $_GET["chat_id"];
			}
			if((isset($_GET["chat_id"]) && $_GET["chat_id"] == 1) || (isset($recipient) && $recipient == 1)){
				$chatSql = "SELECT * FROM messages WHERE recipient_id = 1";
			}else{
				$chatSql = "SELECT * FROM messages WHERE sender_id = " . $user . " AND recipient_id = " . $recipient . 
			" OR sender_id = " . $recipient . " AND recipient_id = " . $user;
			}
			$chatResult = $connect -> query($chatSql);
			$chatQuantity = mysqli_num_rows($chatResult);
			if($chatQuantity > 0){
				while($message = mysqli_fetch_assoc($chatResult)){
					$avatarSql = "SELECT * FROM contacts WHERE id = " . $message["sender_id"];
					$avatatResult = $connect -> query($avatarSql);
					$findUser = mysqli_fetch_assoc($avatatResult);
					?>
						<li>
							<a class="avatar" href="<?php if(stristr($_SERVER['REQUEST_URI'],  '/pages/teacher-chat.php')){ echo "/pages/teacher-chat.php?user_id=" . $findUser["id"];  }else{ echo "/pages/child-chat.php?user_id=" . $findUser["id"]; } ?>">
								<img src="<?php if($findUser["image"] == ""){ echo "/images/not-find.png"; }else{ echo $findUser["image"]; }  ?>" alt="user">
							</a>
							<div id="infos-chat">
								<h2><?php echo $findUser["name"]  ?></h2>
								<p><?php echo $message["message"] ?></p>
							</div>
							<div class="time"><?php echo $message["time"] ?></div>
						</li>
					<?php
				}
			}else{
				echo "<h2 class=\"chose-contact\">Повідомлень немає.</h2>";
			}
			
		}else{ //Запросов ГЕТ не существует. значит чат еще нужно выбрать
			echo "<h2 class=\"chose-contact\">Чат не обрано. Оберіть користувача зі списку чатів...</h2>";
		}
	?>
</ul>

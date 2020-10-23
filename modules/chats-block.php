<ul id="replace">
<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
	if(isset($_COOKIE["teacher"])){
		$findUser = $_COOKIE["teacher"];
		if(isset($chat) && $nameChat ==  'teacher'){
			$chatsSql = "SELECT * FROM contacts WHERE name LIKE '%" . $chat . "%' AND user_status=0";
		}else{
			$chatsSql = "SELECT * FROM contacts WHERE user_status = 0";
		}
	}else{
		$findUser = $_COOKIE["student"];
		if(isset($chat) && $nameChat ==  'child'){
			$chatsSql = "SELECT * FROM contacts WHERE name LIKE '%" . $chat . "%' AND user_status=0";
		}else if(isset($chat) && $nameChat ==  'student'){
			$chatsSql = "SELECT * FROM contacts WHERE name LIKE '%" . $chat . "%' AND user_status=1";
		}else if(stristr($_SERVER['REQUEST_URI'],  '/pages/child-chat.php')){
			$chatsSql = "SELECT * FROM contacts WHERE user_status = 0";
		}else if(stristr($_SERVER['REQUEST_URI'],  '/pages/teacher-chat.php')){
			$chatsSql = "SELECT * FROM contacts WHERE user_status = 1";
		}
	}
	$chatResult = mysqli_query($connect, $chatsSql);
	if(mysqli_num_rows($chatResult) != 0){
		while($user = mysqli_fetch_assoc($chatResult)){
			?>
			<li <?php if(isset($_GET["chat_id"]) && $_GET["chat_id"] == $user["id"]){ echo "class='active-chat'"; } ?>>
				<a class="avatar" href="<?php if(stristr($_SERVER['REQUEST_URI'],  '/pages/teacher-chat.php')){ echo "/pages/teacher-chat.php?user_id=" . $user["id"];  }else{ echo "/pages/child-chat.php?user_id=" . $user["id"]; } ?>">
					<img src="<?php if($user["image"] == ""){ echo "/images/not-find.png"; }else{ echo $user["image"]; }  ?>" alt="user">
				</a>
				<a id="infos-chat" href="<?php if(stristr($_SERVER['REQUEST_URI'],  '/pages/teacher-chat.php') || (isset($nameChat) && $nameChat ==  'teacher')){ echo "/pages/teacher-chat.php?chat_id=" . $user["id"];  }else{ echo "/pages/child-chat.php?chat_id=" . $user["id"]; } ?>">
					<h2><?php if($user["id"] == $findUser){ echo "Мої нотатки"; }else{ echo $user["name"]; }  ?></h2>
					<p><?php if($user["id"] == $findUser){ echo ""; }else{ echo $user["last_message"]; }  ?></p>
				</a>
			</li>
			<?php	
		}
	}else{
		echo "<h2 class=\"chose-contact\">Пошук не дав результатів.</h2>";
	}
?>
</ul>
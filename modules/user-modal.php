<?php
	$sqlModal = "SELECT * FROM contacts WHERE id=" . $_GET["user_id"];
	$resultModal = mysqli_query($connect, $sqlModal);
	$userModal = mysqli_fetch_assoc($resultModal);

	if(isset($_COOKIE["teacher"])){
		$sql = "SELECT * FROM contacts WHERE id=" . $_COOKIE["teacher"];
	}else{
		$sql = "SELECT * FROM contacts WHERE id=" . $_COOKIE["student"];
	}
	$result = mysqli_query($connect, $sql);
	$user = mysqli_fetch_assoc($result);
?>

<div <?php if($user["user_status"] == 1){ echo "class='bg'"; }else{ echo "class='baground'"; } ?> style="display:block;">	</div>
<div class="user-modal" style="display:block;">
	<div class="close"><a href="<?php if(stristr($_SERVER['REQUEST_URI'],  '/pages/teacher-chat.php')){ echo "/pages/teacher-chat.php";  }else{ echo "/pages/child-chat.php?"; } ?>">X</a></div>
	<div class="inner-userid">
		<div class="header-user">
			<img src="<?php if($userModal["image"] == ""){ echo "/images/not-find.png"; }else{ echo $userModal["image"]; } ?>" alt="avatar">
			<div>
				<!-- Создаем имя и достаем его из персоны -->
				<h3><?php echo $userModal["name"]; ?></h3> 
				<p>Був(ла): нещодавно</p>
			</div>
		</div>
		<ul class="main-info">
			<li>
				<p>Мобільний телефон:</p>
				<!-- Добстаем из нашего массива персоны все контактные данные -->
				<p><a href="tel: <?php echo $userModal["phone"]; ?> "><?php echo $userModal["phone"] ?></a></p>
			</li>
			<li>
				<p>Почта:</p>
				<p>@<?php echo $userModal["login"]; ?></p>
			</li>
			<li>
				<p>Про себе:</p>
				<p><?php echo $userModal["about"]; ?></p>
			</li>
		</ul>
	</div>
</div>
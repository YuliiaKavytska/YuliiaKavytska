<header class="header">
	<a href="/" id="logo">
		<img src="/images/ic.png" alt="logo">
		<span>
			<b>Наш клас</b>
		</span>
	</a>

	<div class="menu">
		<?php
			if(isset($_COOKIE["teacher"])){
		?>
				<a href="/pages/admin-rating.php">Оцінки</a> 
				<a href="/pages/admin-homework.php">Домашнє завдання</a> 
				<a href="/pages/teacher-chat.php">Чат з учнями</a> 
				<a href="/log-out.php">Вийти</a>
		<?php
			}elseif(isset($_COOKIE["student"])){
		?>
				<a href="/pages/child-chat.php">Чат з однокласниками</a> 
				<a href="/pages/teacher-chat.php">Чат з вчителями</a> 
				<a href="/pages/homework.php">Дізнатися домашню роботу</a> 
				<a href="/log-out.php">Вийти</a>
		<?php
			}else{
		?>
				<a href="/registration.php">Зареєструватися</a> 
				<a href="/log-in.php">Увійти</a> 
		<?php
			}
		?>
	</div>
</header>
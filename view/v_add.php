<a href="<?=ROOT?>messages">На главную</a>
<hr>
<form method="post">
	<div>
		<div>Имя</div>
		<input type="text" name="user" value="<?=$user?>">
	</div>
	<div>
		<div>Email</div>
		<input type="email" name="email" value="<?=$email?>">
	</div>
	<div>
		<div>Задача</div>
		<textarea name="text"><?=$text?></textarea>
	</div>
	<button>Отправить</button>
</form>
 <?=$msg?> 

<a href="<?=ROOT?>messages">На главную</a>
<hr>
<form method="post">
	<div>
		<div>Имя</div>
		<input type="text" name="name" value="<?=$message['user']?>">
	</div>
	<div>
		<div>Email</div>
		<input type="text" name="name" value="<?=$message['email']?>">
	</div>
	<div>
		<div>Сообщения</div>
		<textarea name="text"><?=$message['text']?></textarea>
	</div>
	<button>Отправить</button>
</form>


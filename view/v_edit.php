<a href="<?=ROOT?>messages">На главную</a>
<hr>
<form method="post">
	<div>
		<div>Имя</div>
		<div><?=$message['user']?></div>
	</div>
	<div>
		<div>Email</div>
		<div><?=$message['email']?></div>
	</div>
	<div>
		<div>Сообщения</div>
		<textarea name="text"><?=$message['text']?></textarea>
	</div>
	<div>
		<input type="checkbox" name="status">Выполнена
	</div>
	<button>Отправить</button>
</form>


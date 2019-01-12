<a href="<?=ROOT?>tasks">На главную</a>
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
		<input type="checkbox" name="status"<?php if ($message['status'] =='1'): ?>
			checked
		<?endif;?>>
		Выполнена
	</div>
	<button>Отправить</button>
</form>


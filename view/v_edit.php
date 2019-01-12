<a href="<?=ROOT?>tasks">На главную</a>
<hr>
<form method="post">
	<div>
		<div>Имя</div>
		<div><?=$task['user']?></div>
	</div>
	<div>
		<div>Email</div>
		<div><?=$task['email']?></div>
	</div>
	<div>
		<div>Сообщения</div>
		<textarea name="text"><?=$task['text']?></textarea>
	</div>
	<div>
		<input type="checkbox" name="status"<?php if ($task['status'] =='1'): ?>
			checked
		<?endif;?>>
		Выполнена
	</div>
	<button>Отправить</button>
</form>


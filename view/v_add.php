<a href="<?=ROOT?>messages">На главную</a>
<hr>
<form method="post">
	<div>
		<div>Имя</div>
		<input type="text" name="name" value="<?=$name?>">
	</div>
	<div>
		<div>Сообщения</div>
		<textarea name="text"><?=$text?></textarea>
	</div>
	<button>Отправить</button>
</form>
<?=$msg?>

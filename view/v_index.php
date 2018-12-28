<h2>Список товаров</h2>
<hr>
<a href="<?=ROOT?>messages/?view=table">В виде таблицы</a>
<hr>
<a href="add">Написать</a>
<table class="table">
	<? foreach($tasks as $tsk): ?>
		<tr class="item">
			<td>
				<?=$tsk['user']?>
			</td>
			<td>
				<?=$tsk['email']?>
			</td>
			<td>
				<?=$tsk['text']?>
			</td>
			<td>
				<a href="<?=ROOT?>tasks/one/<?=$msg['id_message']?>">Перейти</a>
			</td>
		</tr>
	<? endforeach; ?>
</table>
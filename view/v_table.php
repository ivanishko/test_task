<a href="<?=ROOT?>add">Написать</a>
<hr>
<a href="<?=ROOT?>messages">В виде списка</a>
<hr>
<div class="messages">
	<table>
		<thead>
			<th>Дата</th>
			<th>Имя</th>
			<th>Текст</th>
		</thead>
		<tbody>
			<? foreach($messages as $tsk): ?>
				<tr>
					<td><?=$tsk['dt']?></td>
					<td><?=$tsk['name']?></td>
					<td><?=$tsk['text']?></td>
				</tr>
			<? endforeach; ?>
		</tbody>
	</table>
</div>
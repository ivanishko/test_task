<h2>Список задач</h2>
<hr>

<a href="add">Написать</a>
<table class="table table-striped">
	<thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">User</th>
      <th scope="col">Email</th>
      <th scope="col">Task</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  	<tbody>
	<? foreach($messages as $tsk): ?>
		<tr class="item">
			<th scope="row">
				#
			</th>
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
				<?= $tsk['status'] ? 'Выполнена' : 'Не выполнена'?>
			</td>
		</tr>
	<? endforeach; ?>
	<tbody>
</table>
<h2>Список задач</h2>
<hr>

<a href="messages/add">Написать</a>
<table 
  data-toggle="table"
  data-height="360"
 class="table table-striped">
	<thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col" data-sortable="true">User</th>
      <th scope="col" data-sortable="true">Email</th>
      <th scope="col">Task</th>
      <th scope="col" data-sortable="true">Status</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  	<tbody>
	<? foreach($messages as $task): ?>
		<tr class="item">
			<td scope="row">
				# 
			</td>
			<td>
				<?=$task['user']?>
			</td>
			<td>
				<?=$task['email']?>
			</td>
			<td>
				<?=$task['text']?>
			</td>
			<td>
				<?= $task['status'] ? 'Выполнена' : 'Не выполнена'?>
			</td>
			<td>
				<?  if($_SESSION['auth']):  ?>	
            		<a href="<?=ROOT?>messages/edit/<?=$tsk['task_id']?>">Править</a> | <a href="<?=ROOT?>messages/delete/<?=$tsk['task_id']?>">Удалить</a> 
                <? endif;?>
			</td>
		</tr>
	<? endforeach; ?>
	<tbody>
</table>
<?php 
		
		for ($i = 1; $i <= $pages; $i++) {
	    // если текущая старница
		    if($i == $page){
		        echo " [$i] ";
		    } else {
		        echo "<a href='messages?page=$i'>$i</a> ";
		    }
		}
?>



		

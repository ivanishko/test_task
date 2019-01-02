<h2>Список задач</h2>
<hr>

<a href="messages/add">Написать</a>
<table class="table table-striped">
	<thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">User</th>
      <th scope="col">Email</th>
      <th scope="col">Task</th>
      <th scope="col">Status</th>
      <th scope="col">Edit</th>
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



		

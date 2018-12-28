<!DOCTYPE html>
<html lang="ru">
<head>
	<link rel="stylesheet" href="<?=ROOT?>assets/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="<?=ROOT?>assets/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<title><?=$title?></title>
</head>
<body>
	<div class="container">
		<ul class="nav">
  <li class="nav-item">
  	<a class="nav-link active" href="<?=ROOT?>">Главная</a>
   
  </li>
  <? if($user === null): ?>
    <li class="nav-item"><a class="nav-link" href="<?=ROOT?>auth/login">Войти</a></li>
    <? else: ?>
    <li class="nav-item"><a class="nav-link" href="<?=ROOT?>auth/logout">Выйти</a></li>
   <? endif; ?>

</ul>

		    <main>
                    <h1><?=$title?></h1>
					<section>
						<?=$content?>
					</section>
                </main>
	</div>

</body>
</html>



<?php 


?>
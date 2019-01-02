<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<? if(WORK_MODE == WORK_MODE_DEV): ?>
		<?php echo nl2br($e) ?>
	<? endif; ?>
	<h2>Сайт сломался, админ знает</h2>
</body>
</html>

<?php

function redirect($location)
{
	header('Location:'.$location);
}

function error($error)
{
	die($error);
}

function head($title)
{
	?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
	<link rel="stylesheet" type="text/css" href="/public/style.css">
</head>
<body>

	<?php
}
function foot()
{
	?>
<script type="text/javascript" src="/public/script.js"></script>
</body>
</html>
	<?php
}
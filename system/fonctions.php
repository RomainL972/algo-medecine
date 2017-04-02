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
</head>
<body>

	<?php
}
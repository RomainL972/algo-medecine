<?php
function error($error='', $redirect='/error', $line=NULL, $file=NULL)
{
	$_SESSION['error'] = 'Erreur : ';
	if ($line and $file) {
		$_SESSION['error'] .= "ligne $line fichier $file ";
	}
	$_SESSION['error'] .= $error;
	redirect($redirect);
}

function success($message='', $redirect='/', $line=NULL, $file=NULL)
{
	$_SESSION['success'] = '';
	if ($line and $file) {
		$_SESSION['success'] .= "ligne $line fichier $file ";
	}
	$_SESSION['success'] .= $message;
	redirect($redirect);
}

function redirect($to='/')
{
	header('Location:'.$to);
}

function head($title='Algorithmes Médecine')
{
	?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="https://rawgit.com/notifyjs/notifyjs/master/dist/notify.js"></script>
	<link rel="stylesheet" type="text/css" href="/public/style.css">
</head>
<body>
	<script type="text/javascript" src="/public/script.js"></script>
	<?php
	if (isset($_SESSION['error']) and $_SESSION['error']) {
		?>
	<script type="text/javascript">$.notify("<?php echo $_SESSION['error']?>", "error")</script>
		<?php
		$_SESSION['error'] = NULL;
	}
	if (isset($_SESSION['success']) and $_SESSION['success']) {
		?>
	<script type="text/javascript">$.notify("<?php echo $_SESSION['success']?>", "success")</script>
		<?php
		$_SESSION['success'] = NULL;
	}
}

function foot()
{
	?>
</body>
</html>
	<?php	
}
<?php

require_once 'system/main.php';

//Récupère le nom du fichier et la fonction à éxecuter
$query_args 	= explode('/', substr($_SERVER['REDIRECT_URL'], 1));
$controller 	= empty($query_args[0]) ? 'default' : urldecode($query_args[0]);
$action 			= empty($query_args[1]) ? 'index' : urldecode($query_args[1]);

if (!file_exists('controllers/'.$controller.'.php')) {
	error(__FILE__, __LINE__, 'Le fichier n\'existe pas');
}

require_once 'controllers/'.$controller.'.php';

if (!function_exists($action)) {
	error(__LINE__, __FILE__, 'La fonction n\'existe pas');
}

call_user_func($action);
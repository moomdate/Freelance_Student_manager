<?php
session_start();
if(isset($_GET['comm'])){
	$menu = $_GET['comm'];
}else{
	$menu = NULL;
}
switch ($menu) {
	case NULL:
		if(isset($_SESSION['comm']))
			require 'pages/home.php';
		else
			require 'pages/login.php';
		break;
	case 'login':
		require 'pages/login.php';
		break;
	case 'log':
		require 'system/login.inc.php';
		break;
	case 'main':
		require 'pages/home.php';
		break;	
	default:
		# code...
		break;
}
?>
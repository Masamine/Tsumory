<?php
	/* -----------------------------
	ログアウト
	----------------------------- */
	session_start();
	$_SESSION = array(); 
	session_destroy();
	setcookie("user", '', time() - 1800);

	header('location: /');
	exit();
	
?>
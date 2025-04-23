<?php
	ob_start();
	define('WebApp', true);
	require_once 'php/session/start.php';
	require_once 'php/cache/control.php';
	require_once 'php/database/connect.php';
	require_once 'php/function/main.php';
	$q = explode('/', getUrl());
	unset($q[0]);
	$w = '';

	if (!$q[1]) 
	{
		require_once 'php/request/net/index.php';
	}
	/* elseif ($q[1] == 'example') 
	{
		require_once 'php/request/net/example.php';
	} */
	else
	{
		require_once 'php/request/net/error.php';
	}

	ob_end_clean();
	$result = str_replace('	', '', $w);
	echo $result;
	ob_start();
	require_once 'php/database/close.php';
	require_once 'php/session/regenerate.php';
	ob_end_clean();
?>

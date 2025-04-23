<?php
	ob_start();
	define('WebApp', true);
	require_once 'php/cache/control.php';
	require_once 'php/database/connect.php';
	require_once 'php/function/main.php';
	require_once 'php/json/format.php';
	$q = explode('/', getUrl());
	unset($q[0]);
	unset($q[1]);
	$w = array();

	if (!$q[2])
	{
		require_once 'php/request/api/index.php';
	}
	/* elseif ($q[2] == 'example') 
	{
		require_once 'php/request/api/example.php';
	} */
	else 
	{
		require_once 'php/request/api/error.php';
	}

	ob_end_clean();
	$result = $w;
	echo json_encode($result);
	ob_start();
	require_once 'php/database/close.php';
	ob_end_clean();
?>

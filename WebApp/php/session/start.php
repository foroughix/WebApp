<?php
	if(!defined('WebApp')){exit();}
	$session_time = 604800;
	ini_set('session.cookie_lifetime', $session_time);
	ini_set('session.gc_maxlifetime', $session_time);
	session_start();
?> 

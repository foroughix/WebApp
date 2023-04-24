<?php
if(!defined('WebApp')){exit();}
# DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME
$connect = mysqli_connect('localhost', 'root', '', 'webapp');
if (!$connect)
{
	echo 'Error connecting to database!';
	exit();
}
mysqli_set_charset($connect, 'utf8mb4');
?> 
<?php
ob_start();
define('WebApp', true);
require_once 'php/cache/control.php';
require_once 'php/database/connect.php';
require_once 'php/function/functions.php';
require_once 'php/json/format.php';
$q = explode('/', get_url());
unset($q[0]);
$w = array();

require_once 'php/request/api/hello.php';

ob_end_clean();
$result = $w;
echo json_encode($result);
ob_start();
require_once 'php/database/close.php';
ob_end_clean();
?>
<?php
	if(!defined('WebApp')){exit();}
	function POST($var = 'action') {
		global $connect;
		if(isset($_POST[$var]))
		return strip_tags(mysqli_real_escape_string($connect, $_POST[$var]));
	}
	function POST2($var = 'action') {
		global $connect;
		if(isset($_POST[$var]))
		return mysqli_real_escape_string($connect, $_POST[$var]);
	}
	function GET($var = 'action') {
		global $connect;
		if(isset($_GET[$var]))
		return strip_tags(mysqli_real_escape_string($connect, $_GET[$var]));
	}
	function GET2($var = 'action') {
		global $connect;
		if(isset($_GET[$var]))
		return mysqli_real_escape_string($connect, $_GET[$var]);
	}
	function CHECK($var = null) {
		global $connect;
		return strip_tags(mysqli_real_escape_string($connect, $var));
	}
	function CHECK2($var = null) {
		global $connect;
		return mysqli_real_escape_string($connect, $var);
	}
	function is_string_valid($var1 = null, $var2 = 12, $var3 = 24) {
		if (!isset($var1) || trim($var1) === '') {
			return false;	
		}
		else {
			if (mb_strlen($var1, 'UTF-8') < $var2) {
				return false;
			}
			else if (mb_strlen($var1, 'UTF-8') > $var3) {
				return false;
			}
			else {       
				return true;
			}
		}
	}
	function is_url_valid($var = null) {
		if (filter_var($var, FILTER_VALIDATE_URL) === FALSE) {
			return false;
		}
		else {
			return true;
		}
	}
	function is_username_valid($var = null) {
		if (preg_match('/^[A-Za-z0-9]{4,24}$/', $var)) {
			return true;
		}
		else {
			return false;
		}
	}
	function is_email_valid($var = null) {
		if (filter_var($var, FILTER_VALIDATE_EMAIL)) {
			if (is_string_valid($var, 6, 32)) {
				return true;
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}
	}
	function get_ip() {
		$ip = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ip = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ip = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ip = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ip = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
			$ip = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ip = getenv('REMOTE_ADDR');
		else
			$ip = 'UNKNOWN';
		$ip = CHECK($ip);
		return $ip;
	}
	function get_agent() {
		return CHECK($_SERVER['HTTP_USER_AGENT']);
	}
	function get_url() {
		return CHECK($_SERVER['REQUEST_URI']);
	}
	function dl_slash($var = null) {
		if (substr($var, -1) == '/') {
			return substr($var, 0, -1);
		}
		else {
			return $var;
		}
	}
	function dl_comma($var = null) {
		if (substr($var, -1) == ',') {
			return substr($var, 0, -1);
		}
		else {
			return $var;
		}
	}
	function random_password($var = 8) {
		$ch = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array(); 
		$chl = strlen($ch) - 1; 
		for ($i = 0; $i < $var; $i++) {
			$n = rand(0, $chl);
			$pass[] = $ch[$n];
		}
		return implode($pass);
	}
	function random_key($var1 = 24, $var2 = false) {
		$ch = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$key_a = array(); 
		$chl = strlen($ch) - 1; 
		for ($i = 0; $i < $var1; $i++) {
			$n = rand(0, $chl);
			$key_a[] = $ch[$n];
		}
		if ($var2 == true) {
			return uniqid().implode($key_a);
		}
		else {
			return implode($key_a);
		}
	}
?>

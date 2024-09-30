<?php
	if(!defined('WebApp')){exit();}
	function post($var = 'action', $check = 'full')
	{
		global $connect;
		if (isset($_POST[$var]))
		{
			if ($check == 'full')
			{
				return strip_tags(mysqli_real_escape_string($connect, $_POST[$var]));
			}
			else if ($check == 'sql')
			{
				return mysqli_real_escape_string($connect, $_POST[$var]);
			}
			else if ($check == 'html')
			{
				return strip_tags($_POST[$var]);
			}
		}
		else
		{
			return '';
		}
	}
	function get($var = 'action', $check = 'full')
	{
		global $connect;
		if (isset($_GET[$var]))
		{
			if ($check == 'full')
			{
				return strip_tags(mysqli_real_escape_string($connect, $_GET[$var]));
			}
			else if ($check == 'sql')
			{
				return mysqli_real_escape_string($connect, $_GET[$var]);
			}
			else if ($check == 'html')
			{
				return strip_tags($_GET[$var]);
			}
		}
		else
		{
			return '';
		}
	}
	function check($string = '', $check = 'full')
	{
		global $connect;
		if ($check == 'full')
		{
			return strip_tags(mysqli_real_escape_string($connect, $string));
		}
		else if ($check == 'sql')
		{
			return mysqli_real_escape_string($connect, $string);
		}
		else if ($check == 'html')
		{
			return strip_tags($string);
		}
	}
	function isValidString($string = null, $min = 4, $max = 32)
	{
		if (!isset($string) || trim($string) === '')
		{
			return false;	
		}
		else
		{
			if (mb_strlen($string, 'UTF-8') < $min)
			{
				return false;
			}
			else if (mb_strlen($string, 'UTF-8') > $max)
			{
				return false;
			}
			else
			{       
				return true;
			}
		}
	}
	function isValidUrl($string = '')
	{
		if (filter_var($string, FILTER_VALIDATE_URL) === FALSE)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	function isValidUsername($string = '')
	{
		if (preg_match('/^[A-Za-z0-9]{4,32}$/', $string))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function isValidEmail($string = '')
	{
		if (filter_var($string, FILTER_VALIDATE_EMAIL))
		{
			if (isValidString($string, 4, 32))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	function getIp()
	{
		$ip = '';
		if (getenv('HTTP_CLIENT_IP'))
		{
			$ip = getenv('HTTP_CLIENT_IP');
		}
		else if (getenv('HTTP_X_FORWARDED_FOR'))
		{
			$ip = getenv('HTTP_X_FORWARDED_FOR');
		}
		else if (getenv('HTTP_X_FORWARDED'))
		{
			$ip = getenv('HTTP_X_FORWARDED');
		}
		else if (getenv('HTTP_FORWARDED_FOR'))
		{
			$ip = getenv('HTTP_FORWARDED_FOR');
		}
		else if (getenv('HTTP_FORWARDED'))
		{
			$ip = getenv('HTTP_FORWARDED');
		}
		else if (getenv('REMOTE_ADDR'))
		{
			$ip = getenv('REMOTE_ADDR');
		}
		else
		{
			$ip = 'UNKNOWN';
		}
		$ip = check($ip);
		return $ip;
	}
	function getAgent()
	{
		return check($_SERVER['HTTP_USER_AGENT']);
	}
	function getUrl()
	{
		return check($_SERVER['REQUEST_URI']);
	}
	function deleteLastChar($string = '', $char = ',')
	{
		if (substr($string, -1) == $char)
		{
			return substr($string, 0, -1);
		}
		else
		{
			return $string;
		}
	}
	function randomKey($number = 32, $uniq = false)
	{
		$string = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$stringNumber = strlen($string) - 1; 
		$result = array(); 
		for ($i = 0; $i < $number; $i++)
		{
			$random = rand(0, $stringNumber);
			$result[] = $string[$random];
		}
		if ($uniq == true)
		{
			return uniqid() . implode($result);
		}
		else
		{
			return implode($result);
		}
	}
?>

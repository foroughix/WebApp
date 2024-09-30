# Create table
```
mysqli_query($connect,'CREATE TABLE webapp(
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
title TINYTEXT,
content TEXT,
status INT
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_general_ci');
```
# Select table
```
$mq = mysqli_query($connect,'SELECT id FROM table WHERE id = "'.$id.'"');
$mnr = mysqli_num_rows($mq);
if ($mnr > 0) {
	while($item = mysqli_fetch_assoc($mq))
	{
		echo $item['id'];
	}
}
```
# Pick token from headers
```
$token = '';
$headers = apache_request_headers();
foreach ($headers as $header => $value) 
{
	if($header == 'token')
	{
		$token = check($value);
	}
}
```
# Mysqli update, delete, insert
```
mysqli_query($connect, 'UPDATE table SET value = "'.$value.'" WHERE id = "'.$id.'"');
mysqli_query($connect, 'DELETE FROM table WHERE id = "'.$id.'" AND value = "'.$value.'"');	
mysqli_query($connect, 'INSERT INTO table (name, value) VALUES ("'.$name.'", "'.$value.'")');
```
# Password hash
```
$get_password = '';
$password = password_hash($get_password, PASSWORD_DEFAULT);
if (password_verify($get_password, $password)) {
    echo 'Password is valid!';
}
```
# Post check
```
if (!empty($_POST)) {
	
}
```
# Session set
```
$_SESSION['userid'] = '';
```
# Session destroy
```
unset($_SESSION['userid']);
session_destroy();
```

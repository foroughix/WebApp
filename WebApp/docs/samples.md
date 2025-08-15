# Select table
```
$mq = mysqli_query($connect,'SELECT id FROM webapp WHERE id = "'.$id.'"');
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
mysqli_query($connect, 'UPDATE webapp SET value = "'.$value.'" WHERE id = "'.$id.'"');
mysqli_query($connect, 'DELETE FROM webapp WHERE id = "'.$id.'" AND name = "'.$name.'"');	
mysqli_query($connect, 'INSERT INTO webapp (name, value) VALUES ("'.$name.'", "'.$value.'")');
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

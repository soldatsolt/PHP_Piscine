<?php
session_start();
$NAME = "dear guest";
if ($_SESSION[$loggued_on_user])
	$NAME =  $_SESSION[$loggued_on_user] . PHP_EOL;
else
	$NAME = "dear guest";
// Create connection
$conn = new mysqli ("192.168.99.100", "root", "root", "Rush00", 3306);
if($_POST['submit'])
if ($_POST['tomod'])
{
	$query = "UPDATE products SET ".$_POST['tomod']."='".$_POST['onmod']."' WHERE name='".$_POST['name']."'";
	$result = mysqli_query($conn, $query);
}
$conn->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>MAGAZ</title>
		<link rel="stylesheet" href="index.css">
	</head>
	<body>
			<form class="rega" action="mod_comics.php" method="POST">
					<br>
					название комикса <input name="name" type="text" value=""></input>
					<br>
					что вы хотите изменить <input name="tomod" type="text" value=""></input>
					<br>
					новое значение <input name="onmod" type="text" value=""></input>
					<br>
					<input name="submit" type="submit" value="OK"></input>
					<br>(price/quantity/name/category/hero)
					<a href="index.php">вернуться на главную</a>
			</form>
	</body>
</html>

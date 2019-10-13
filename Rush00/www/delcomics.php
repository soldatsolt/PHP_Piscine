<?php
// Create connection
$conn = new mysqli ("192.168.99.100", "root", "root", "Rush00", 3306);
if($_POST['submit'])
{
	$query = "DELETE FROM products WHERE name='".$_POST['name']."'";
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
			<form class="rega" action="delcomics.php" method="POST">
					<br>
					COMICS TO DELETE <input name="name" type="text" value=""></input>
					<br>
					<input name="submit" type="submit" value="OK"></input>
					<a href="index.php">вернуться на главную</a>
			</form>
	</body>
</html>

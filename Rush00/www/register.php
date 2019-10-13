<?php
	$login = $_POST['login'];
	$mail = $_POST['mail'];
	$passwd = $_POST['passwd'];

	$host = "192.168.99.100";
	$dbusername = "root";
	$dbpassword = "root";
	$dbname = "Rush00";
	// Create connection
	$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, 3306);
	$sql = "SELECT * FROM users";
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc())
		$array[] = $row;

	function find_n_of_user($array, $priznak, $valuetofind)
	{
		$i = 0;
		while ($array[$i])
		{
			if ($array[$i][$priznak] == $valuetofind)
				return $i;
			$i++;
		}
		return -1;
	}
	if (mysqli_connect_error())
		die('Connect Error ('. mysqli_connect_errno() .') ' . mysqli_connect_error());
	else
	{
		if (find_n_of_user($array, "login", $login) == -1 && isset($login) && isset($passwd))
			$sql = "INSERT INTO users (login, mail, passwd)   values ('$login','$mail','$passwd')";
		if ($_POST && $sql && $conn->query($sql))
			header("Location: index.php");
		$conn->close();
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>MAGAZ</title>
		<link rel="stylesheet" href="index.css">
	</head>
	<body>
			<form class="rega" action="register.php" method="POST">
				<br>
				login: <input name="login" type="text" value=""></input>
				<br>
				mail: <input name="mail" type="text" value=""></input>
				<br>
				passwd: <input name="passwd" type="text" value=""></input>
				<br>
				<input name="submit" type="submit" value="OK"></input>
				<a href="index.php">вернуться на главную</a>
			</form>
	</body>
</html>

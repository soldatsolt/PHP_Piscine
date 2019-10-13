<?php
	$host = "192.168.99.100";
	$dbusername = "root";
	$dbpassword = "root";
	$dbname = "Rush00";
	// Create connection
	$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, 3306);
	if (mysqli_connect_error())
		die('Connect Error ('. mysqli_connect_errno() .') ' . mysqli_connect_error());
	else
	{
		$sql = "SELECT * FROM users";
		if (!$conn->query($sql))
			// header("Location: index.php");
			echo "Error: ". $sql ." ". $conn->error;
	}
	$result = $conn->query($sql);
	// var_dump($result);
	while ($row = $result->fetch_assoc())
	{
		var_dump($row);
	}
	// var_dump($sql);
	$conn->close();
?>

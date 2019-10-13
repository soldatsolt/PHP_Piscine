<?php
    // $username = filter_input(INPUT_POST, 'login');
	// $password = filter_input(INPUT_POST, 'passwd');
	$username = "dasd";
	$password = "qweqwe";
	$price = "123";
	$quantity = "1";
	$name = "Флэш против негодяев";
	$category = "супергерои";
	$hero = "Flash";

	if (!empty($username))
	{
		if (!empty($password))
		{
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
				$sql = "INSERT INTO products (price, quantity, name, category, hero)   values ('$price','$quantity','$name','$category','$hero')";
				if ($conn->query($sql))
					header("Location: index.php");
				else
					echo "Error: ". $sql ." ". $conn->error;
				$conn->close();
			}
		}
		else
		{
			echo "Password should not be empty";
			die();
		}
    }
	else
	{
		echo "Username should not be empty";
		die();
	}
    ?>
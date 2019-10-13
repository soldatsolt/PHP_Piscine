<?php
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
	$name = $_POST['name'];
	$category = $_POST['category'];
	$hero = $_POST['hero'];

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
				if (isset($name) && isset($hero))
					$sql = "INSERT INTO products (price, quantity, name, category, hero)   values ('$price','$quantity','$name','$category','$hero')";
				if ($sql && $conn->query($sql))
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
			<form class="rega" action="add_comics.php" method="POST">
					<br>
					цена: <input name="price" type="text" value=""></input>
					<br>
					кол-во: <input name="quantity" type="text" value=""></input>
					<br>
					название: <input name="name" type="text" value=""></input>
					<br>
					категория: <input name="category" type="text" value=""></input>
					<br>
					герой: <input name="hero" type="text" value=""></input>
					<br>
					<input name="submit" type="submit" value="OK"></input>
					<a href="index.php">вернуться на главную</a>
			</form>
	</body>
</html>

<?php
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
	$name = $_POST['name'];
	$category = $_POST['category'];
	$hero = $_POST['hero'];
	$id = $_POST['id'];
	$url = $_POST['url'];

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
					$sql = "INSERT INTO products (price, quantity, name, category, hero, id , url)   values ('$price','$quantity','$name','$category','$hero','$id','$url')";
				if ($sql && $conn->query($sql))
					header("Location: index.php");
				$conn->close();
			}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>21 Comics</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/index.css" />
    <link rel="icon" type="image/x-icon" href="dc.ico?v=1" />
</head>

<body>
    <div class="top-div">
	<a href="index.php"><p class="top-txt">-- 21 Comics <?php echo $NAME;?> --</p></a>
        <p class="top-sub">In Batman we trust<p>
    </div>
    <ul style="top: 150px">
        <li><a class="active" href="index.php">Home</a></li>
        <li class="dropdown">
        </li>
        </li>
        <li class="dropdown" style="float:left">
            <a href="#" class="dropbtn">Superhero<img src="img/arrow.png" class="img-arrow"></a>
            <div class="dropdown-content">
                <a href="">Batman</a>
                <a href="">Aquaman</a>
                <a href="">Flush</a>
                <a href="">Ligue</a>
            </div>
        </li>
        <li class="dropdown" style="float:right">
            <a href="cart.php" class="dropbtn"><img src="img/bag.png" class="img-bag"></a>
        </li>
        <li class="dropdown" style="float:right">
            <a href="#" class="dropbtn">My account<img src="img/arrow.png" class="img-arrow"></a>
            <div class="dropdown-content">
                <a href="register.php">Registration</a>
                <a href="sign_in.php">Sign in</a>
                <a href="account.php">Change comics</a>
                <a href="logout.php">Sign out</a>
            </div>
        </li>
        <li class="dropdown" style="float:right">
		    <form method="GET" action="search.php" class="dropbtn search-menu">
			    <input class="search-bar" type="text" name="search" placeholder="Search...">
                <button class="search-button" type="submit"><img class="img-loupe" src="img/loupe.png"></button>
		    </form>
	    </li>
    </ul>
    <div class="main">
		<img class="home-img" src="img/home<?php echo (time() % 2);?>.jpg" alt="background">
		</div>
		<div class="home-txt1">
            <h1>Change</h1>
            <div class="form.txt">
				<form class="form_o" action="add_comics.php" method="POST">
					<input class="form" name="price" type="text" placeholder="цена" value="">
					<br>
					<input class="form" name="quantity" type="text" placeholder="кол-во" value="">
					<br>
					<input class="form" name="name" type="text" placeholder="название" value="">
					<br>
					<input class="form" name="category" type="text" placeholder="категория" value="">
					<br>
					<input class="form" name="hero" type="text" placeholder="герой" value="">
					<br>
					<input class="form" name="id" type="text" placeholder="id" value="">
					<br>
					<input class="form" name="url" type="text" placeholder="url" value="">
					<br>
					<input class="butonform" name="submit" type="submit" value="OK"><br />
					<a  href="index.php"><input class="butonform" name="submit" type="submit" value="Return"><br /></a>
				</form>
        	</div>
    	</div>	

</body>
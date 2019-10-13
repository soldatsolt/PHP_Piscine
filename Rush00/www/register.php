<?php
	$login = $_POST['login'];
	$mail = $_POST['mail'];
	$passwd = $_POST['passwd'];
	$hashed_passwd = hash('whirlpool', $passwd);
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
			$sql = "INSERT INTO users (login, mail, passwd)   values ('$login','$mail', '$hashed_passwd')";
		if ($_POST && $sql && $conn->query($sql))
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
                <a href="account.php">My preferences</a>
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
            <h1>Registration</h1>
            <div class="form.txt">
				<form class="form_o" action="register.php" method="POST">
					<input class="form" name="login" type="text" placeholder="Enter login" value="batman">
					<br>
					<input class="form" name="mail" type="text" placeholder="Enter mail" value="batman@mail.ru">
					<br>
					<input class="form" name="passwd" type="text" placeholder="Enter password" value="">
					<br>
					<input class="butonform" name="submit" type="submit" value="OK"><br />
					<a  href="index.php"><input class="butonform" name="submit" type="submit" value="Return"><br /></a>
				</form>
        	</div>
    	</div>	

</body>
</html>



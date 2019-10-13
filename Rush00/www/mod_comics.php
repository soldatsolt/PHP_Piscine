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
				<form class="form_o" action="mod_comics.php.php" method="POST">
					<input class="form" name="name" type="text" placeholder="название комикса" value="">
					<br>
					<input class="form" name="tomod" type="text" placeholder="изменить" value="">
					<br>
					<input class="form" name="onmod" type="text" placeholder="new" value="">
					<br>
					<input class="butonform" name="submit" type="submit" value="OK"><br />
					<a  href="index.php"><input class="butonform" name="submit" type="submit" value="Return"><br /></a>
				</form>
        	</div>
    	</div>	
</body>
</html>
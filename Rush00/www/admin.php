<?php
function calculate_all_quantity($array)
{
	$i = 0;
	$n = 0;
	while ($array[$i])
	{
		$n += $array[$i]["quantity"];
		$i++;
	}
	return $n;
}
function calculate_all_cost($array)
{
	$i = 0;
	$n = 0;
	while ($array[$i])
	{
		$n += $array[$i]["quantity"] * $array[$i]["price"];
		$i++;
	}
	return $n;
}
session_start();
$NAME = "guest";
if ($_SESSION[$loggued_on_user])
	$NAME =  $_SESSION[$loggued_on_user] . PHP_EOL;
else
	$NAME = "guest";
// Create connection
$conn = new mysqli ("192.168.99.100", "root", "root", "Rush00", 3306);
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc())
	$array[] = $row;
$comics_quantity = calculate_all_quantity($array);
$all_cost = calculate_all_cost($array);
$conn->close();
// var_dump($array[0]['name']);
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
​
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
			<a href="#" class="dropbtn"><?php echo '$'.$all_cost;?></a>
			<a href="#" class="dropbtn"><?php echo $comics_quantity."шт";?></a>
            <a href="cart.php" class="dropbtn"><img src="img/bag.png" class="img-bag"></a>
        </li>
        <li class="dropdown" style="float:right">
            <a href="#" class="dropbtn">Action<img src="img/arrow.png" class="img-arrow"></a>
            <div class="dropdown-content">
                <a href="add_comics.php">Add item</a>
                <a href="delcomics.php">Remove item</a>
                <a href="mod_comics.php">Change item</a>
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
</body>
</html>
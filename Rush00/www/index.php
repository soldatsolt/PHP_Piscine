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
// $comics_quantity = 0;
// $all_cost = 0;
$assoc = array('buy1'=>1,'buy2'=>2,'buy3'=>3,'buy4'=>4,'buy5'=>5,'buy6'=>6,'buy7'=>7,'buy8'=>8,'buy9'=>9,'buy10'=>10,'buy11'=>11,'buy12'=>12);
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
	$NAME = $_SESSION[$loggued_on_user] . PHP_EOL;
else
	$NAME = "guest";
// Create connection
$conn = new mysqli ("192.168.99.100", "root", "root", "Rush00", 3306);
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc())
	$array[] = $row;
$ssttrr = array_shift($_POST);
$ssttrr = array_key_first($_POST);
$thisis = $array[$num - 1]['quantity'] + 1;
// $comics_quantity = calculate_all_quantity($array);
// $all_cost = calculate_all_cost($array);
$num = $assoc[$ssttrr];
// $_SESSION[$comics_quantity]++;
// $_SESSION[$all_cost] += $array[$num]['price'];
	if ($_POST)
	{
		$_SESSION['all_cost'] += $array[$num - 1]['price'];
		$_SESSION['comics_quantity']++;
		$query = "UPDATE products SET quantity='$thisis' WHERE id='$num'";
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
		<?php if (!$result)
		echo "sdsdas"?>
        <li class="dropdown">
        </li>
        </li>
        <li class="dropdown" style="float:left">
			<a href="#" class="dropbtn">Superhero<img src="img/arrow.png" class="img-arrow"></a>
            <div class="dropdown-content">
			
                <a href="">Batman</a>
                <a href="">Aquaman</a>
                <a href="">Flash</a>
                <a href="">Ligue</a>
            </div>
        </li>
		<li class="dropdown" style="float:right">
			<a href="#" class="dropbtn"><?php echo '$'.$_SESSION['all_cost'];?></a>
			<a href="#" class="dropbtn"><?php echo $_SESSION['comics_quantity']."шт";?></a>
            <a href="cart.php" class="dropbtn"><img src="img/bag.png" class="img-bag"></a>
        </li>
        <li class="dropdown" style="float:right">
            <a href="#" class="dropbtn">My account<img src="img/arrow.png" class="img-arrow"></a>
            <div class="dropdown-content">
                <a href="register.php">Registration</a>
				<a href="sign_in.php">Sign in</a>
				<?php if ($_SESSION[$loggued_on_user] == "admin" || $_SESSION[$loggued_on_user] == "kmills" || $_SESSION[$loggued_on_user] == "tjuana")
				echo '
				<a href="admin.php">My preferences</a>';
				?>
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
        <img class="home-img" src="img/home1.jpg" alt="background">
        <div class="home-txt">
            <h1>Welcome</h1>
            <div class="home-txt-par">
                <p>But it takes more than muscles to fight the way Batman does.</p>
                <h2>Batman film 1989</h2>
            </div>
        </div>
        <div class="container">
				<div class="goods">
					<div class="product">
						<img class="product_img" src="<?php $i=0; echo $array[$i]['url']; ?>" alt="">
							<p><?php echo $array[$i]['name']; ?></p>
						<div class="product_price">
						<?php echo $array[$i]['price'].'$'; ?>
						<form  class="addtocart" action="index.php" method="POST">
                        <input type="text" name="good1" value="1">
						<input class="butonform2" name="buy1" type="submit" value="buy">
						</form>
						</div>
					</div> 
					<div class="product">
						<img class="product_img" src="<?php $i++; echo $array[$i]['url']; ?>" alt="">
						<p><?php echo $array[$i]['name']; ?></p>
						<div class="product_price">
						<?php echo $array[$i]['price'].'$'; ?>
						<form  class="addtocart" action="index.php" method="POST">
						<input class="addtocart" type="text" name="good2" value="1">
						<input class="butonform2" name="buy2" type="submit" value="buy">
						</form>
						</div>
					</div>
					<div class="product">
						<img class="product_img" src="<?php $i++; echo $array[$i]['url']; ?>" alt="">
						<p><?php echo $array[$i]['name']; ?></p>
						<div class="product_price">
						<?php echo $array[$i]['price'].'$'; ?>
						<form  class="addtocart" action="index.php" method="POST">
                        <input class="addtocart" type="text" name="good3" value="1">
						<input class="butonform2" name="buy3" type="submit" value="buy">
						</form>
						</div>
					</div>
					<div class="product">
						<img class="product_img" src="<?php $i++; echo $array[$i]['url']; ?>" alt="">
						<p><?php echo $array[$i]['name']; ?></p>
						<div class="product_price">
						<?php echo $array[$i]['price'].'$'; ?>
						<form  class="addtocart" action="index.php" method="POST">
                        <input class="addtocart" type="text" name="good4" value="1">
						<input class="butonform2" name="buy4" type="submit" value="buy">
						</form>
						</div>
					</div>
				</div>
            </div>
            <div class="container">
				<div class="goods">
					<div class="product">
						<img class="product_img" src="<?php $i++; echo $array[$i]['url']; ?>" alt="">
							<p><?php echo $array[$i]['name']; ?></p>
						<div class="product_price">
						<?php echo $array[$i]['price'].'$'; ?>
						<form  class="addtocart" action="index.php" method="POST">
                        <input class="addtocart" type="text" name="good5" value="1">
						<input class="butonform2" name="buy5" type="submit" value="buy">
						</form>
						</div>
					</div>
					<div class="product">
						<img class="product_img" src="<?php $i++; echo $array[$i]['url']; ?>" alt="">
						<p><?php echo $array[$i]['name']; ?></p>
						<div class="product_price">
						<?php echo $array[$i]['price'].'$'; ?>
						<form  class="addtocart" action="index.php" method="POST">
                        <input class="addtocart" type="text" name="good6" value="1">
						<input class="butonform2" name="buy6" type="submit" value="buy">
						</form>
						</div>
					</div>
					<div class="product">
						<img class="product_img" src="<?php $i++; echo $array[$i]['url']; ?>" alt="">
						<p><?php echo $array[$i]['name']; ?></p>
						<div class="product_price">
						<?php echo $array[$i]['price'].'$'; ?>
						<form  class="addtocart" action="index.php" method="POST">
                        <input class="addtocart" type="text" name="good7" value="1">
						<input class="butonform2" name="buy7" type="submit" value="buy">
						</form>
						</div>
					</div>
					<div class="product">
						<img class="product_img" src="<?php $i++; echo $array[$i]['url']; ?>" alt="">
						<p><?php echo $array[$i]['name']; ?></p>
						<div class="product_price">
						<?php echo $array[$i]['price'].'$'; ?>
						<form  class="addtocart" action="index.php" method="POST">
                        <input class="addtocart" type="text" name="good8" value="1">
						<input class="butonform2" name="buy8" type="submit" value="buy">
						</form>
						</div>
					</div>
				</div>
            </div>
            <div class="container">
				<div class="goods">
					<div class="product">
						<img class="product_img" src="<?php $i++; echo $array[$i]['url']; ?>" alt="">
							<p><?php ; echo $array[$i]['name']; ?></p>
						<div class="product_price">
						<?php echo $array[$i]['price'].'$'; ?>
						<form  class="addtocart" action="index.php" method="POST">
                        <input class="addtocart" type="text" name="good9" value="1">
						<input class="butonform2" name="buy9" type="submit" value="buy">
						</form>
						</div>
					</div> 
					<div class="product">
						<img class="product_img" src="<?php $i++; echo $array[$i]['url']; ?>" alt="">
						<p><?php echo $array[$i]['name']; ?></p>
						<div class="product_price">
						<?php echo $array[$i]['price']; ?>
						<form  class="addtocart" action="index.php" method="POST">
                        <input class="addtocart" type="text" name="good10" value="1">
						<input class="butonform2" name="buy10" type="submit" value="buy">
						</form>
						</div>
					</div>
					<div class="product">
						<img class="product_img" src="<?php $i++; echo $array[$i]['url']; ?>" alt="">
						<p><?php echo $array[$i]['name']; ?></p>
						<div class="product_price">
						<?php echo $array[$i]['price'].'$'; ?>
						<form  class="addtocart" action="index.php" method="POST">
                        <input class="addtocart" type="text" name="good11" value="1">
						<input class="butonform2" name="buy11" type="submit" value="buy">
						</form>
						</div>
					</div>
					<div class="product">
						<img class="product_img" src="<?php $i++; echo $array[$i]['url']; ?>" alt="">
						<p><?php echo $array[$i]['name']; ?></p>
						<div class="product_price">
						<?php echo $array[$i]['price'].'$'; ?>
						<form  class="addtocart" action="index.php" method="POST">
                        <input class="addtocart" type="text" name="good12" value="1">
						<input class="butonform2" name="buy12" type="submit" value="buy">
						</form>
						</div>
					</div>
				</div>
            </div>
		</div>
	</body>
</html>
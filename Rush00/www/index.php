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
						<img class="product_img" src="https://files.slack.com/files-pri/TE6FVDN1Y-FPDQ5P1GW/__________________________________________.__________2.jpg" alt="">
							<p><?php $i = 0; echo $array[$i]['name']; ?></p>
						<div class="product_price">
                        <?php echo $array[$i]['price'].'$'; ?>
                        <input class="addtocart" type="text" name="good1" value="1">
						<input class="butonform2" name="buy1" type="submit" value="buy"><br />
						</div>
					</div> 
					<div class="product">
						<img class="product_img" src="https://files.slack.com/files-pri/TE6FVDN1Y-FPDDUFRUP/______________________________.__________4.jpg" alt="">
						<p><?php $i++; echo $array[$i]['name']; ?></p>
						<div class="product_price">
                        <?php echo $array[$i]['price']; ?>
						<input class="addtocart" type="text" name="good2" value="1">
						<input class="butonform2" name="buy2" type="submit" value="buy"><br />
						</div>
					</div>
					<div class="product">
						<img class="product_img" src="https://files.slack.com/files-pri/TE6FVDN1Y-FNYQK19SN/____________________________________________________________________.__________6.jpg" alt="">
						<p><?php $i++; echo $array[$i]['name']; ?></p>
						<div class="product_price">
                        <?php echo $array[$i]['price']; ?>
                        <input class="addtocart" type="text" name="good3" value="1">
						<input class="butonform2" name="buy3" type="submit" value="buy"><br />
						</div>
					</div>
					<div class="product">
						<img class="product_img" src="https://static-eu.insales.ru/r/w-r8fiH5Z14/fit/530/530/ce/1/plain/images/products/1/141/252141709/tor-kto-derjit-molot.jpg@webp" alt="">
						<p><?php $i++; echo $array[$i]['name']; ?></p>
						<div class="product_price">
                        <?php echo $array[$i]['price']; ?>
                        <input class="addtocart" type="text" name="good4" value="1">
						<input class="butonform2" name="buy4" type="submit" value="buy"><br />
						</div>
					</div>
				</div>
            </div>
            <div class="container">
				<div class="goods">
					<div class="product">
						<img class="product_img" src="https://files.slack.com/files-pri/TE6FVDN1Y-FPDQ5P1GW/__________________________________________.__________2.jpg" alt="">
							<p><?php $i = 0; echo $array[$i]['name']; ?></p>
						<div class="product_price">
                        <?php echo $array[$i]['price'].'$'; ?>
                        <input class="addtocart" type="text" name="good5" value="1">
						<input class="butonform2" name="buy5" type="submit" value="buy"><br />
						</div>
					</div> 
					<div class="product">
						<img class="product_img" src="https://files.slack.com/files-pri/TE6FVDN1Y-FPDDUFRUP/______________________________.__________4.jpg" alt="">
						<p><?php $i++; echo $array[$i]['name']; ?></p>
						<div class="product_price">
                        <?php echo $array[$i]['price']; ?>
                        <input class="addtocart" type="text" name="good6" value="1">
						<input class="butonform2" name="buy6" type="submit" value="buy"><br />
						</div>
					</div>
					<div class="product">
						<img class="product_img" src="https://files.slack.com/files-pri/TE6FVDN1Y-FNYQK19SN/____________________________________________________________________.__________6.jpg" alt="">
						<p><?php $i++; echo $array[$i]['name']; ?></p>
						<div class="product_price">
                        <?php echo $array[$i]['price']; ?>
                        <input class="addtocart" type="text" name="good7" value="1">
						<input class="butonform2" name="buy7" type="submit" value="buy"><br />
						</div>
					</div>
					<div class="product">
						<img class="product_img" src="https://static-eu.insales.ru/r/w-r8fiH5Z14/fit/530/530/ce/1/plain/images/products/1/141/252141709/tor-kto-derjit-molot.jpg@webp" alt="">
						<p><?php $i++; echo $array[$i]['name']; ?></p>
						<div class="product_price">
                        <?php echo $array[$i]['price']; ?>
                        <input class="addtocart" type="text" name="good8" value="1">
						<input class="butonform2" name="buy8" type="submit" value="buy"><br />
						</div>
					</div>
				</div>
            </div>
            <div class="container">
				<div class="goods">
					<div class="product">
						<img class="product_img" src="https://files.slack.com/files-pri/TE6FVDN1Y-FPDQ5P1GW/__________________________________________.__________2.jpg" alt="">
							<p><?php $i = 0; echo $array[$i]['name']; ?></p>
						<div class="product_price">
                        <?php echo $array[$i]['price'].'$'; ?>
                        <input class="addtocart" type="text" name="good9" value="1">
						<input class="butonform2" name="buy9" type="submit" value="buy"><br />
						</div>
					</div> 
					<div class="product">
						<img class="product_img" src="https://files.slack.com/files-pri/TE6FVDN1Y-FPDDUFRUP/______________________________.__________4.jpg" alt="">
						<p><?php $i++; echo $array[$i]['name']; ?></p>
						<div class="product_price">
                        <?php echo $array[$i]['price']; ?>
                        <input class="addtocart" type="text" name="good10" value="1">
						<input class="butonform2" name="buy10" type="submit" value="buy"><br />
						</div>
					</div>
					<div class="product">
						<img class="product_img" src="https://files.slack.com/files-pri/TE6FVDN1Y-FNYQK19SN/____________________________________________________________________.__________6.jpg" alt="">
						<p><?php $i++; echo $array[$i]['name']; ?></p>
						<div class="product_price">
                        <?php echo $array[$i]['price']; ?>
                        <input class="addtocart" type="text" name="good11" value="1">
						<input class="butonform2" name="buy11" type="submit" value="buy"><br />
						</div>
					</div>
					<div class="product">
						<img class="product_img" src="https://static-eu.insales.ru/r/w-r8fiH5Z14/fit/530/530/ce/1/plain/images/products/1/141/252141709/tor-kto-derjit-molot.jpg@webp" alt="">
						<p><?php $i++; echo $array[$i]['name']; ?></p>
						<div class="product_price">
                        <?php echo $array[$i]['price']; ?>
                        <input class="addtocart" type="text" name="good12" value="1">
						<input class="butonform2" name="buy12" type="submit" value="buy"><br />
						</div>
					</div>
				</div>
            </div>
		</div>
	</body>
</html>
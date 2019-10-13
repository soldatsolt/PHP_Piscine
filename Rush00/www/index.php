<?php
session_start();
$NAME = "dear guest";
if ($_SESSION[$loggued_on_user])
	$NAME =  $_SESSION[$loggued_on_user] . PHP_EOL;
else
	$NAME = "dear guest";
// Create connection
$conn = new mysqli ("192.168.99.100", "root", "root", "Rush00", 3306);
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc())
	$array[] = $row;
$conn->close();
// var_dump($array[0]['name']);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>MAGAZ</title>
		<link rel="stylesheet" href="index.css">
	</head>
	<body>
		<header>
			<div class="container">
				<nav class="clearfix">
					<ul class="menu">
						<li>
							<span style="margin-right: 100px" href="">hello, <?=$NAME ?></span>
						</li>
						<li>
							<a href="./add_comics.php">добавить комикс</a>
						</li>
						<li>
							<a href="./find_comics_to_mod_it.php">mod</a>
						</li>
						<li>
							<a href="./index.php">home</a>
						</li>
						<?php if ($NAME == "dear guest")
						echo "<li>
						<a href=\"./sign_in.php\">sign in</a>
					</li>
					<li>
						<a href=\"./form.html\">registration</a>
					</li>";
						?>
						<?php if ($NAME != "dear guest")
						echo "<li>
						<a href=\"./logout.php\">log out</a>
					</li>";
						?>
					</ul>
				</nav>
			</div>
		</header>
		<section>
		<div class="container">
			<div class="banners">
				<img src="https://static-eu.insales.ru/files/1/8121/8347577/original/marvel-thin.png" alt="">
				<img src="https://static-eu.insales.ru/files/1/8132/8347588/original/dc-thin.png" alt="">
			</div>
		</div>
		</section>
		<section>
			<div class="container">
				<div class="goods">
					<div class="product">
						<img class="product_img" src="https://files.slack.com/files-pri/TE6FVDN1Y-FPDQ5P1GW/__________________________________________.__________2.jpg" alt="">
							<p><?php $i = 0; echo $array[$i]['name']; ?></p>
						<div class="product_price">
						<?php echo $array[$i]['price']; ?>
						</div>
					</div> 
					<div class="product">
						<img class="product_img" src="https://files.slack.com/files-pri/TE6FVDN1Y-FPDDUFRUP/______________________________.__________4.jpg" alt="">
						<p><?php $i++; echo $array[$i]['name']; ?></p>
						<div class="product_price">
						<?php echo $array[$i]['price']; ?>
						</div>
					</div>
					<div class="product">
						<img class="product_img" src="https://files.slack.com/files-pri/TE6FVDN1Y-FNYQK19SN/____________________________________________________________________.__________6.jpg" alt="">
						<p><?php $i++; echo $array[$i]['name']; ?></p>
						<div class="product_price">
						<?php echo $array[$i]['price']; ?>
						</div>
					</div>
					<div class="product">
						<img class="product_img" src="https://static-eu.insales.ru/r/w-r8fiH5Z14/fit/530/530/ce/1/plain/images/products/1/141/252141709/tor-kto-derjit-molot.jpg@webp" alt="">
						<p><?php $i++; echo $array[$i]['name']; ?></p>
						<div class="product_price">
						<?php echo $array[$i]['price']; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>

<?php
session_start();
$NAME = "dear guest";
if ($_SESSION[$loggued_on_user])
	$NAME =  $_SESSION[$loggued_on_user] . PHP_EOL;
else
	$NAME = "dear guest";
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
				<div class="hello menu">
						hello, 
<?=$NAME ?>
				</div>
				<nav class="clearfix">
					<ul class="menu">
						<li>
							<a href="./index.php">home</a>
						</li>
						<li>
							<a href="./index.php">home</a>
						</li>
						<?php if ($NAME == "dear guest")
						echo "<li>
						<a href=\"./sign_in.php\">sign in</a>
					</li>
					<li>
						<a href=\"./registration.php\">registration</a>
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
	</body>
</html>

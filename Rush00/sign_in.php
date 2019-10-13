<?php
include "auth.php";
session_start();
$NAME = "dear guest";
if (($_POST['login'] && $_POST['passwd']) && auth($_POST['login'], $_POST[passwd]))
{
	$_SESSION[$loggued_on_user] = $_POST['login'];
	$NAME = $_SESSION[$loggued_on_user] . PHP_EOL;
	header("Location: index.php");
}
else if (($_POST['login'] && $_POST['passwd']))
{
	$NAME = "dear quest\n";
}
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
			<form class="rega" action="sign_in.php" method="POST">
					<br>
					Username: <input name="login" type="text" value=""></input>
					<br>
					Password: <input name="passwd" type="password" value=""></input>
					<br>
					<input name="submit" type="submit" value="OK"></input>
			</form>
		</header>
	</body>
</html>

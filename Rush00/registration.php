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
			<form class="rega" action="registration.php" method="POST">
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

<?php
if (!file_exists("./private"))
	mkdir("./private");
if (!$_POST['passwd'] || !($_POST['submit'] == 'OK'))
{
	echo "ERROR\n";
	exit;
}
if (file_exists('./private/passwd') && unserialize(file_get_contents('./private/passwd'))[0])
	$array = unserialize(file_get_contents('./private/passwd'));
$i = 0;
while (file_exists('./private/passwd') && $array[$i]['login'])
{
	if ($_POST['login'] == $array[$i]['login'])
	{
		echo "ERROR\n";
		exit;
	}
	$i++;
}
$_POST['passwd'] = hash('whirlpool', $_POST['passwd']);
$array[] = $_POST;
file_put_contents('./private/passwd', serialize($array));
echo "OK\n";
?>
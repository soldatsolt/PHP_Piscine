<?php
include "auth.php";
session_start();
if (($_GET['login'] && $_GET['passwd']) && auth($_GET['login'], $_GET[passwd]))
{
	echo "OK\n";
	$_SESSION[$loggued_on_user] = $_GET['login'];
	exit;
}
else if (($_GET['login'] && $_GET['passwd']))
{
	echo "ERROR\n";
	exit;
}
?>
<!DOCTYPE html>
<html>
    <body>
        <form method="GET">
			<br>
			Username: <input name="login" type="text" value=""></input>
			<br>
			Password: <input name="passwd" type="password" value=""></input>
			<br>
			<input name="submit" type="submit" value="OK"></input>
		</form>
    </body>
</html>
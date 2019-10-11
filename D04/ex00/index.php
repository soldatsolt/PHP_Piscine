<?php
session_start();
?>
<html>
    <body>
        <form action="index.php" method="GET">
			<br>
			Username: <input name="login" type="text" value="<?php echo $_GET["login"]?>"></input>
			<br>
			Password: <input name="passwd" type="text" value="<?php echo $_GET["passwd"]?>"></input>
			<br>
			<input name="submit" type="submit" value="OK"></input>
		</form>

    </body>
</html>
<?php
// $img = "../img/42.png";
// header('Content-Type: image/png');
// readfile($img);
// header("Content-Type: text/plain");
// var_dump($_SERVER);
if ($_SERVER["PHP_AUTH_USER"] && $_SERVER["PHP_AUTH_PW"] && $_SERVER["PHP_AUTH_USER"] == 'zaz' && $_SERVER["PHP_AUTH_PW"] == 'Ilovemylittleponey')
	header("Content-type: text/html");
else
{
	header('HTTP/1.0 401 Unauthorized');
	header("WWW-Authenticate: Basic realm=''Member area''");
	header('Content-Length: 72');
    header("Content-type: text/html");
    echo "<html><body>That area is accessible for members only</body></html>\n";
    exit;
}
?>
<html>
    <body>
        <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents("../img/42.png")); ?>">
    </body>
</html>
#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Moscow');
$fd = fopen("/var/run/utmpx", "r");
while ($str = fread($fd, 628))
{
	$array = unpack("a256username/itermindef/a32tty/ipid/itimestamp/itimemicro/a256hostname/a64hzz", $str);
	$datetime = date("M d H:i", $array["timemicro"]);
	if ($array[timestamp] == 7)
		echo trim($array["username"]) . "   " . trim($array["tty"]) . "  " . trim($datetime) . "\n";
}
?>

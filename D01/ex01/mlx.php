#!/usr/bin/php
<?php
$str = "XXXXXXXXXX";
for ($i = 0; $i < 100; $i++)
{
	echo $str;
	if ($i % 4 == 0)
		echo "\n";
}
echo "\n";
?>

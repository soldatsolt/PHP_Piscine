#!/usr/bin/php
<?php

while (42)
{
	echo "Enter a number: ";
	$str = fgets(STDIN);
	$str = trim($str);
	if (feof(STDIN))
	{
		echo "\n";
		exit (0);
	}
	if (is_numeric($str))
	{
		$i = (int)$str;
		if ($i % 2 == 0)
		{
			echo "The number ". $str. " is even\n";
		}
		else
		{
			echo "The number ". $str. " is odd\n";
		}
	}
	else
	{
		echo "'";
		echo $str;
		echo "' is not a number\n";
	}
}
?>

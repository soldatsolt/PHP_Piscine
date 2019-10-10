#!/usr/bin/php
<?php

function ft_split($str)
{
	$i = 0;
	while (42)
	{
		$str = trim($str);
		$ar[0] = is_numeric(strpos($str, " ")) ? strpos($str, " ") : PHP_INT_MAX;
		$ar[1] = is_numeric(strpos($str, "\t")) ? strpos($str, "\t") : PHP_INT_MAX;
		$ar[2] = is_numeric(strpos($str, "\n")) ? strpos($str, "\n") : PHP_INT_MAX;
		$ar[3] = is_numeric(strpos($str, "\r")) ? strpos($str, "\r") : PHP_INT_MAX;
		$spc = min($ar);
		if ($spc == FALSE || $spc == PHP_INT_MAX)
		{
			$array[$i] = $str;
			break ;
		}
		unset($ar);
		$array[$i] = substr($str, 0, $spc);
		$str = substr($str, $spc);
		$i++;
	}
	return $array;
}

$strarr = array();
$i = 1;
$ii = 0;
while ($i < $argc)
{
	while (ft_split($argv[$i])[$ii])
	{
		array_push($strarr, ft_split($argv[$i])[$ii]);
		$ii++;
	}
	$ii = 0;
	$i++;
}
sort($strarr);
$i = 0;
while ($strarr[$i])
{
	echo $strarr[$i];
	$i++;
	echo "\n";
}
?>

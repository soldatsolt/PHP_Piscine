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

function cmp($a, $b)
{
	$i = 0;
	while ($a[$i] == $b[$i])
		$i++;
	while (($a[$i] >= "A" && $a[$i] <= Z )|| ($a[$i] >= "a" && $a[$i] <= z) && ($b[$i] >= "A" && $b[$i] <= Z )|| ($b[$i] >= "a" && $b[$i] <= z))
	{
		if ($a[$i] > $b[$i])
			return 1;
		else if ($a[$i] < $b[$i])
			return -1;
		$i++;
	}
	if ((($a[$i] >= "A" && $a[$i] <= Z ) || ($a[$i] >= "a" && $a[$i] <= z)) && !($b[$i] >= "A" && $b[$i] <= Z )|| ($b[$i] >= "a" && $b[$i] <= z))
		return 1;
	if ((!($a[$i] >= "A" && $a[$i] <= Z ) || ($a[$i] >= "a" && $a[$i] <= z)) && (($b[$i] >= "A" && $b[$i] <= Z )|| ($b[$i] >= "a" && $b[$i] <= z)))
		return -1;
	while (($a[$i] >= "0" && $a[$i] <= "9") && ($b[$i] >= "0" && $b[$i] <= "9"))
	{
		if ($a[$i] > $b[$i])
			return 1;
		else if ($a[$i] < $b[$i])
			return -1;
		$i++;
	}
	if (($a[$i] >= "0" && $a[$i] <= "9") && !($b[$i] >= "0" && $b[$i] <= "9"))
		return 1;
	if (!($a[$i] >= "0" && $a[$i] <= "9") && ($b[$i] >= "0" && $b[$i] <= "9"))
		return -1;
	while ($a[$i] == $b[$i])
		$i++;
	if ($a[$i] < $b[$i])
		return -1;
	else
		return 1;
}

$strarrletter = array();
$strarrnum = array();
$strarrelse = array();
$i = 1;
$ii = 0;
while ($i < $argc)
{
	while (ft_split($argv[$i])[$ii])
	{
		if ((ft_split($argv[$i])[$ii][0] >= "A" && ft_split($argv[$i])[$ii][0] <= "Z") || (ft_split($argv[$i])[$ii][0] >= "a" && ft_split($argv[$i])[$ii][0] <= "z"))
			array_push($strarrletter, ft_split($argv[$i])[$ii]);
		else if (ft_split($argv[$i])[$ii][0] >= "0" && ft_split($argv[$i])[$ii][0] <= "9")
			array_push($strarrnum, ft_split($argv[$i])[$ii]);
		else
			array_push($strarrelse, ft_split($argv[$i])[$ii]);
		$ii++;
	}
	$ii = 0;
	$i++;
}
usort($strarrletter, "cmp");
usort($strarrnum, "cmp");
usort($strarrelse, "cmp");
$i = 0;
while ($strarrletter[$i])
{
	echo $strarrletter[$i];
	$i++;
	echo "\n";
}
$i = 0;
while ($strarrnum[$i])
{
	echo $strarrnum[$i];
	$i++;
	echo "\n";
}
$i = 0;
while ($strarrelse[$i])
{
	echo $strarrelse[$i];
	$i++;
	echo "\n";
}

?>

#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');
echo strtotime("Tuesday 12 November 2013 12:21:21"). "\n";
$Day_of_the_week = array("lundi"=>"Monday", "mardi"=>"Tuesday",
						 "mercredi"=>"Wednesday", "jeudi"=>"Thursday",
						 "vendredi"=>"Friday", "samedi"=>"Saturday",
						 "dimanche"=>"Sunday");
$Monthes = array("NOT A MONTH", 
			   "janvier", 
			   "fevrier", 
			   "mars", 
			   "avril", 
			   "mai", 
			   "juin", 
			   "juillet", 
			   "aout", 
			   "septembre", 
			   "octobre", 
			   "novembre", 
			   "decembre");
if ($argc == 2)
{
	$str = $argv[1];
	if (preg_match())
	{

	}
}
// echo $Month[1] . "\n";
$text = 'lundi 12 novembre 2013 12:02:21';
$text = trim($text);
$regexp = '/(?<weekday>lundi|mardi|mercredi|jeudi|vendredi|samedi|dimanche)[\s]+(?<daynumber>[0-9]{1,})[\s]+(?<month>janvier|fevrier|mars|avril|mai|juin|juillet|aout|septembre|octobre|novembre|decembre)[\s]+(?<year>[0-9]{4,})[\s]+(?<hour>[0-9]{2,})[:](?<minute>[0-9]{2,})[:](?<second>[0-9]{2,})/i';
// $regexp = '/(?<weekday>[lundi|mardi]+)[\s]+/i';
$result = preg_match_all($regexp, $text, $match);
if ($result)
{
	$weekday = strtolower($match["weekday"][0]);
	$daynumber = strtolower($match["daynumber"][0]);
	$month = strtolower($match["month"][0]);
	$year = strtolower($match["year"][0]);
	$hour = strtolower($match["hour"][0]);
	$minute = strtolower($match["minute"][0]);
	$second = strtolower($match["second"][0]);
	echo $weekday. "\n". $daynumber. "\n". $month. "\n". $year. "\n". $hour. "\n". $minute. "\n". $second. "\n";
}
// var_dump($match);
?>

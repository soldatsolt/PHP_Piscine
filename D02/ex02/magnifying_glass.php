#!/usr/bin/php
<?php


$str = file_get_contents("data");


$str = str_replace("EA", "ea", $str);

$titles = '#<a .+title="(?<titles>.+)".+/a>#';
$inside = '#<a.*?>(?<inside>[\w\s]+)<.*?/a>#';
$result1 = preg_match_all($titles, $str, $match1);
$result2 = preg_match_all($inside, $str, $match2);
var_dump($match1);
var_dump($match2);
?>
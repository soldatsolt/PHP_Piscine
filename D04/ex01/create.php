<?php
if (!file_exists("../private"))
	mkdir("../private");
if (!$_POST['passwd'] || !($_POST['submit'] == 'OK'))
{
	echo "ERROR\n";
	exit;
}
if (file_exists('../private/passwd') && unserialize(file_get_contents('../private/passwd'))[0])
	$array = unserialize(file_get_contents('../private/passwd'));
$i = 0;
while (file_exists('../private/passwd') && $array[$i]['login'])
{
	if ($_POST['login'] == $array[$i]['login'])
	{
		echo "ERROR\n";
		exit;
	}
	$i++;
}
$_POST['passwd'] = hash('whirlpool', $_POST['passwd']);
$array[] = $_POST;
file_put_contents('../private/passwd', serialize($array));
echo "OK\n";
?>
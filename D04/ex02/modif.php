<?php
if (!$_POST['login'] || !($_POST['submit'] == 'OK') || !$_POST['oldpw'] || !$_POST['newpw'] || !file_exists('../private/passwd'))
{
	echo "ERROR\n";
	exit;
}
$array = unserialize(file_get_contents('../private/passwd'));
$i = 0;
while (file_exists('../private/passwd') && $array[$i]['login'])
{
	if ($_POST['login'] == $array[$i]['login'])
	{
		break;
		exit;
	}
	$i++;
}
if (!$array[$i]['login'] || (hash('whirlpool', $_POST['oldpw']) != $array[$i]['passwd']))
{
	echo "ERROR\n";
	exit;
}
$array[$i]['passwd'] = hash('whirlpool', $_POST['newpw']);
file_put_contents('../private/passwd', serialize($array));
echo "OK\n";
?>
<?php
function auth($login, $passwd)
{
	if (!$login || !$passwd || !file_exists('../private/passwd'))
		return (FALSE);
	$array = unserialize(file_get_contents('../private/passwd'));
	$i = 0;
	while (file_exists('../private/passwd') && $array[$i]['login'])
	{
		if ($login == $array[$i]['login'])
		{
			break;
			exit;
		}
		$i++;
	}
	if (!$array[$i]['login'] || (hash('whirlpool', $passwd) != $array[$i]['passwd']))
		return (FALSE);
	return (TRUE);
}
?>
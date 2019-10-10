<?php

function ft_is_sort($tab)
{
	if (is_array($tab))
	{
		$ttab = $tab;
		sort($ttab);
		$f = 0;
		$i = 0;
		while ($i < count($tab))
		{
			if ($tab[$i] != $ttab[$i])
				$f = 1;
			$i++;
		}
		if ($f == 1)
			return FALSE;
		else
			return TRUE;
	}
}

?>

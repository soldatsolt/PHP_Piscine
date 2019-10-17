<?php

class Lannister
{
	public function sleepWith($some)
	{
		if ($some instanceof Lannister)
			echo 'With pleasure, but only in a tower in Winterfell, then.'.PHP_EOL;
		else
			echo 'Let\'s do this'.PHP_EOL;
	}
}

?>
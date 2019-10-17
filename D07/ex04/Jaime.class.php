<?php

class Jaime extends Lannister
{
	public function sleepWith($some)
	{
		if ($some instanceof Lannister && get_class($some) != 'Tyrion')
			echo 'With pleasure, but only in a tower in Winterfell, then.'.PHP_EOL;
		else if (get_class($some) == 'Tyrion')
			echo 'Not even if I\'m drunk !'.PHP_EOL;
		else
			echo 'Let\'s do this'.PHP_EOL;
	}
}

?>
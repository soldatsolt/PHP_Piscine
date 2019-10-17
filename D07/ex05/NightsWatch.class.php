<?php

class NightsWatch
{
	public $members = array();

	public function recruit($some)
	{
		if ($some instanceof IFighter)
		{
			$this->members[] = $some;
		}
	}

	public function fight()
	{
		foreach ($this->members as $i)
		{
			$i->fight();
		}
	}
}

?>
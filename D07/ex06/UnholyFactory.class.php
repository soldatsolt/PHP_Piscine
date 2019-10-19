<?php

Class UnholyFactory
{
	private static $inhere = array();
	private static $names = array();

	public function absorb($sold)
	{
		if (!($sold instanceof Fighter))
			echo "(Factory can't absorb this, it's not a fighter)".PHP_EOL;
		else if ($this->inhere == NULL || array_search($sold->get_name(), $this->inhere) === FALSE)
		{
			$this->inhere[] = $sold;
			$this->names[] = $sold->get_name();
			echo "(Factory absorbed a fighter of type foot ".$sold->get_name().")".PHP_EOL;
		}
		else
			echo "(Factory already absorbed a fighter of type foot ".$sold->get_name().")".PHP_EOL;
	}

	public function fabricate($sold)
	{
		if (array_search($sold, $this->names) === FALSE)
		{
			echo "(Factory hasn't absorbed any fighter of type ".$sold.")".PHP_EOL;
			return NULL;
		}
		echo "(Factory fabricates a fighter of type ".$sold.")".PHP_EOL;
		return $this->inhere[array_search($sold, $this->names)];
	}
}

?>
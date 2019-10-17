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

//----------------------------------------------------------------------------------//

include_once('Fighter.class.php');

class Footsoldier extends Fighter {
	public function __construct() {
		parent::__construct("foot soldier");
	}

	public function fight($target) {
		print ("* draws his sword and runs towards " . $target . " *" . PHP_EOL);
	}
}

class Archer extends Fighter {
	public function __construct() {
		parent::__construct("archer");
	}

	public function fight($target) {
		print ("* shoots arrows at " . $target . " *" . PHP_EOL);
	}
}

class Assassin extends Fighter {
	public function __construct() {
		parent::__construct("assassin");
	}

	public function fight($target) {
		print ("* creeps behind " . $target . " and stabs at it *" . PHP_EOL);
	}
}

class Llama {
	public function fight($target) {
		print ("* spits at " . $target . " *" . PHP_EOL);
	}
}

$uf = new UnholyFactory();
$uf->absorb(new Footsoldier());
$uf->absorb(new Footsoldier());
$uf->absorb(new Archer());
$uf->absorb(new Assassin());
$uf->absorb(new Llama());

$requested_fighters = Array(
	"foot soldier",
	"llama",
	"foot soldier",
	"archer",
	"foot soldier",
	"assassin",
	"foot soldier",
	"archer",
);

$actual_fighters = Array(
);

foreach ($requested_fighters as $rf) {
	$f = $uf->fabricate($rf);
	if ($f != null) {
		array_push($actual_fighters, $f);
	}
}

$targets = Array("the Hound", "Tyrion", "Podrick");

foreach ($actual_fighters as $f) {
	foreach ($targets as $t) {
		$f->fight($t);
	}
}


?>
<?php

class Color
{
	public	$summ;
	public	$red;
	public	$green;
	public	$blue;
	public static $verbose = FALSE;

	public function __Construct(array $rgb = array('red' => 255, 'green' => 255, 'blue' => 255))
	{
		if (isset($rgb['red']) && isset($rgb['green']) && isset($rgb['blue']))
		{
			$this->red = intval($rgb['red']);
			$this->green = intval($rgb['green']);
			$this->blue = intval($rgb['blue']);
			$this->summ = $this->blue + ($this->green << 8) + ($this->red << 16);
			if (self::$verbose == TRUE)
				echo $this.' constructed.'.PHP_EOL;
		}
		else if (isset($rgb['rgb']))
		{
			$this->summ = intval($rgb['rgb']);
			$this->from_summ_to_colours();
			$this->summ = $this->blue + ($this->green << 8) + ($this->red << 16);
			if (self::$verbose == TRUE)
				echo $this.' constructed.'.PHP_EOL;
		}
		return ;
	}

	public function __Destruct()
	{
		if (self::$verbose == TRUE)
			echo $this.' destructed.'.PHP_EOL;
		return ;
	}

	public static function doc()
	{
		return file_get_contents("./Color.doc.txt");
	}

	private function from_summ_to_colours()
	{
		$this->red = intval((0xFF0000 & $this->summ) >> 16);
		$this->green = intval((0xFF00 & $this->summ) >> 8);
		$this->blue = intval(0xFF & $this->summ);
	}

	public function __toString()
	{
		return (sprintf("Color( red:%4s, green:%4s, blue:%4s )", $this->red, $this->green, $this->blue));
	}

	public function add(Color $rhs)
	{
		$tmpsumm = $this->summ + $rhs->summ;
		$qwe = new Color(array('rgb' => $tmpsumm));
		$qwe->from_summ_to_colours();
		return $qwe;
	}

	public function sub(Color $rhs)
	{
		$tmpsumm = $this->summ - $rhs->summ;
		$qwe = new Color(array('rgb' => $tmpsumm));
		$qwe->from_summ_to_colours();
		return $qwe;
	}

	public function mult($f)
	{
		$qwe = new Color(array('red' => ($this->red * $f), 'green' => ($this->green * $f)   , 'blue' => ($this->blue) * $f));
		return $qwe;
	}
}

?>
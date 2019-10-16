#!/usr/bin/php
<?php

class Color
{
	public	$red;
	public	$green;
	public	$blue;

	public function __Construct(array $rgb = array(0, 0, 0))
	{
		print('Constructed' . PHP_EOL);
		$this->red = $rgb[0];
		$this->green = $rgb[1];
		$this->blue = $rgb[2];
		return ;
	}

	public function __Destruct()
	{
		print('Destructed' . PHP_EOL);
		return ;
	}

	public function __toString()
	{
		return 'R = '.$this->red.PHP_EOL.'G = '.$this->green.PHP_EOL.'B = '.$this->blue.PHP_EOL;
	}

}

$color = new Color(array(50,50,50));
echo $color;
?>
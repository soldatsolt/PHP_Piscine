#!/usr/bin/php
<?php

class Color
{
	public	$summ;
	public	$red;// = intval($red);
	public	$green;// = intval($green);
	public	$blue;// = intval($blue);
	public static $verbose = FALSE;

	public function __Construct(array $rgb = array('red' => 0, 'green' => 0, 'blue' => 0))
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

	public function doc()
	{
		return ("
<- Color ----------------------------------------------------------------------
The Color class handles RGB colors.

An instance can be contructed from either a RGB value:
new Color( array( 'rgb' => 12345 ) );

Or from distinct red, green, blue constitutives:
new Color( array( 'red' => 255, 'green' => 255, 'blue' => 255 ) );

Red, green, blue constitutives and RGB values are converted to intergers.
Negative or > to 255 color constitutives are left as is.
Any other use is undefined behaviour.

The class provides the following methods :

Color   add( Color ".'$rhs'." );
Adds each color constitutive and returns a new Color instance.

Color   sub( Color ".'$rhs'." );
Substracts each color constitutive and returns a new Color instance.

Color   mult( ".'$f'." );
Multiplies each color constitutive by factor ".'$f'." and returns a new Color
instance.
---------------------------------------------------------------------- Color ->
");
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


print( Color::doc() );
Color::$verbose = True;
$red     = new Color( array( 'red' => 0xff, 'green' => 0   , 'blue' => 0    ) );
$green   = new Color( array( 'rgb' => 255 << 8 ) );
$blue    = new Color( array( 'red' => 0   , 'green' => 0   , 'blue' => 0xff ) );

$yellow  = $red->add( $green );
$cyan    = $green->add( $blue );
$magenta = $blue->add( $red );

$white   = $red->add( $green )->add( $blue );

print( $red     . PHP_EOL );
print( $green   . PHP_EOL );
print( $blue    . PHP_EOL );
print( $yellow  . PHP_EOL );
print( $cyan    . PHP_EOL );
print( $magenta . PHP_EOL );
print( $white   . PHP_EOL );

Color::$verbose = False;

$black = $white->sub( $red )->sub( $green )->sub( $blue );
print( 'Black: ' . $black . PHP_EOL );

Color::$verbose = True;

$darkgrey = new Color( array( 'rgb' => (10 << 16) + (10 << 8) + 10 ) );
print( 'darkgrey: ' . $darkgrey . PHP_EOL );
$lightgrey = $darkgrey->mult( 22.5 );
print( 'lightgrey: ' . $lightgrey . PHP_EOL );

$random = new Color( array( 'red' => 12.3, 'green' => 31.2, 'blue' => 23.1 ) );
print( 'random: ' . $random . PHP_EOL );

?>
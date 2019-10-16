<?php
require_once '../ex00/Color.class.php';

class Vertex
{
	public	static $verbose = FALSE;
	public	$x;
	public	$y;
	public	$z;
	public	$w;
	public	$color;

	public function __Construct(array $coords = array('x' => 0.0, 'y' => 0.0, 'z' => 0.0, 'w' => 1.0), $construct_color = 'empty')
	{
		if ($construct_color == 'empty')
			$this->color = new Color();
		else
		$this->color = $construct_color;
		if (isset($coords['x']) && isset($coords['y']) && isset($coords['z']))
		{
			$x = $coords['x'];
			$y = $coords['y'];
			$z = $coords['z'];
		}
		else
		{
			$x = 0.00;
			$y = 0.00;
			$z = 0.00;
		}
		if (!isset($coords['w']))
			$w = 1.00;
		else
			$w = $coords['w'];
		if (self::$verbose == TRUE)
			echo $this.' constructed.'.PHP_EOL;
		return ;
	}


	public function __Destruct()
	{
		if (self::$verbose == TRUE)
			echo $this.' destructed.'.PHP_EOL;
		return ;
	}

	public function __toString()
	{
		if ($this->color->summ == 0xFFFFFF)
			return sprintf("Vertex( x:%4.2f, %4.2f, %4.2f, %4.2f )", $this->x, $this->y, $this->z, $this->w);
		else
			return 'NOT READY YET';
	}
}

Color::$verbose = True;
Vertex::$verbose = True;

$red   = new Color();
$vtxO  = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0 ) );
print( $vtxO  . PHP_EOL );

?>
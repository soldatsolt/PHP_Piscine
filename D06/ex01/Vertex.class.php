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

	public function __Construct(array $coords = array('x' => 0.0, 'y' => 0.0, 'z' => 0.0, 'w' => 1.0))
	{
		if (!isset($coords['color']))
			$this->color = new Color();
		else
			$this->color = $coords['color'];
		if (isset($coords['x']) && isset($coords['y']) && isset($coords['z']))
		{
			$this->x = $coords['x'];
			$this->y = $coords['y'];
			$this->z = $coords['z'];
		}
		else
		{
			$this->x = 0.00;
			$this->y = 0.00;
			$this->z = 0.00;
		}
		if (!isset($coords['w']))
			$this->w = 1.00;
		else
			$this->w = $coords['w'];
		if (self::$verbose == TRUE)
			echo $this.' constructed'.PHP_EOL;
		return ;
	}

	public static function doc()
	{
		return file_get_contents("./Vertex.doc.txt");
	}

	public function __Destruct()
	{
		if (self::$verbose == TRUE)
			echo $this.' destructed'.PHP_EOL;
		return ;
	}

	public function __toString()
	{
		if (!self::$verbose)
			return sprintf("Vertex( x: %4.2f, y: %4.2f, z:%4.2f, w:%4.2f )", $this->x, $this->y, $this->z, $this->w);
		else
			return sprintf("Vertex( x: %4.2f, y: %4.2f, z:%4.2f, w:%4.2f, %s )", $this->x, $this->y, $this->z, $this->w, $this->color);
	}
}

?>
<?php
require_once '../ex01/Vertex.class.php';

class Vector
{
	private $x;
	private $y;
	private $z;
	private $w = 0;
	static $verbose = false;

	public function getX() { return $this->x; }
	public function getY() { return $this->y; }
	public function getZ() { return $this->z; }
	public function getW() { return $this->w; }

	public function __construct($array)
	{
		if (isset($array['dest']) && $array['dest'] instanceof Vertex)
		{
			if (isset($array['orig']) && $array['orig'] instanceof Vertex)
				$orig = new Vertex(array('x' => $array['orig']->getX(), 'y' => $array['orig']->getY(), 'z' => $array['orig']->getZ()));
			else
				$orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0));
			$this->x = $array['dest']->getX() - $orig->getX();
			$this->y = $array['dest']->getY() - $orig->getY();
			$this->z = $array['dest']->getZ() - $orig->getZ();
			$this->w = 0;
		}
		if (self::$verbose == TRUE)
			echo $this.' constructed'.PHP_EOL;
		return ;
	}

	public function __Destruct()
	{
		if (self::$verbose == TRUE)
			echo $this.' destructed'.PHP_EOL;
		return ;
	}

	function __toString()
	{
		return (sprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )",$this->x, $this->y, $this->z, $this->w));
	}

	public static function doc()
	{
		return file_get_contents("./Vector.doc.txt");
	}

	public function magnitude()
	{
		return (float)sqrt(($this->x * $this->x) + ($this->y * $this->y) + ($this->z * $this->z));
	}

	public function normalize()
	{
		$l = $this->magnitude();
		if ($l == 1)
			return clone $this;
		return new Vector(array('dest' => new Vertex(array
		('x' => $this->x / $l, 'y' => $this->y / $l, 'z' => $this->z / $l))));
	}

	public function add(Vector $rhs)
	{
		return new Vector(array('dest' => new Vertex(array('x' => $this->x + $rhs->x, 
		'y' => $this->y + $rhs->y, 'z' => $this->z + $rhs->z))));
	}

	public function sub(Vector $rhs)
	{
		return new Vector(array('dest' => new Vertex(array('x' => $this->x - $rhs->x, 
		'y' => $this->y - $rhs->y, 'z' => $this->z - $rhs->z))));
	}

	public function opposite()
	{
		return new Vector(array('dest' => new Vertex
		(array('x' => $this->x * -1, 'y' => $this->y * -1, 'z' => $this->z * -1))));
	}

	public function scalarProduct($k)
	{
		return new Vector(array('dest' => new Vertex
		(array('x' => $this->x * $k, 'y' => $this->y * $k, 'z' => $this->z * $k))));
	}

	public function dotProduct(Vector $rhs)
	{
		return (float)(($this->x * $rhs->x) + ($this->y * $rhs->y) + ($this->z * $rhs->z));
	}

	public function crossProduct(Vector $rhs)
	{
		return new Vector(array('dest' => new Vertex(array(
		'x' => $this->y * $rhs->getZ() - $this->z * $rhs->getY(),
		'y' => $this->z * $rhs->getX() - $this->x * $rhs->getZ(),
		'z' => $this->x * $rhs->getY() - $this->y * $rhs->getX()))));
	}

	public function cos(Vector $rhs)
	{
		return ($this->dotProduct($rhs) / sqrt
		((($this->x * $this->x) + ($this->y * $this->y) + ($this->z * $this->z)) * 
		(($rhs->x * $rhs->x) + ($rhs->y * $rhs->y) + ($rhs->z * $rhs->z))));
	}
}
?>
<?php
require_once '../ex01/Vertex.class.php';

class Vector
{
	public	static $verbose = FALSE;
	private	$x0;
	private	$y0;
	private	$z0;
	private	$x1;
	private	$y1;
	private	$z1;
	private	$x;
	private	$y;
	private	$z;
	private	$w;
	private	$orig;
	private	$dest;

	public function getX() { return $this->x; }
	public function getY() { return $this->y; }
	public function getZ() { return $this->z; }
	public function getW() { return $this->w; }
	public static function doc()
	{
		return file_get_contents("./Vector.doc.txt");
	}

	public function __Construct(array $origdest)
	{
		if (!isset($origdest['orig']))
			$this->orig = new Vertex();
		else
			$this->orig = $origdest['orig'];
		$this->x0 = $this->orig->getX();
		$this->y0 = $this->orig->getY();
		$this->z0 = $this->orig->getZ();
		if (!isset($origdest['dest']))
			$this->dest = new Vertex();
		else
			$this->dest = $origdest['dest'];
		$this->x1 = $this->dest->getX();
		$this->y1 = $this->dest->getY();
		$this->z1 = $this->dest->getZ();
		$this->x = $this->x1 - $this->x0;
		$this->y = $this->y1 - $this->y0;
		$this->z = $this->z1 - $this->z0;
		$this->w = 0.0;
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
		return (sprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
	}

	public function magnitude()
	{
		return (sqrt($this->x**2 + $this->y**2 + $this->z**2));
	}

	public function normalize()
	{
		$l = $this->magnitude();
		if ($l != 0)
		{
			$xx = $this->x/$l;
			$yy = $this->y/$l;
			$zz = $this->z/$l;
			$qwe = new Vector(array('dest'=>new Vertex(array('x' => $xx, 'y' => $yy, 'z' => $zz))));
		}
		return $qwe;
	}

	public function add(Vector $rhs)
	{
		$xx = $this->x + $rhs->x;
		$yy = $this->y + $rhs->y;
		$zz = $this->z + $rhs->z;
		$qwe = new Vector(array('dest'=>new Vertex(array('x' => $xx, 'y' => $yy, 'z' => $zz))));
		return $qwe;
	}

	public function sub(Vector $rhs)
	{
		$xx = $this->x - $rhs->x;
		$yy = $this->y - $rhs->y;
		$zz = $this->z - $rhs->z;
		$qwe = new Vector(array('dest'=>new Vertex(array('x' => $xx, 'y' => $yy, 'z' => $zz))));
		return $qwe;
	}

	public function opposite()
	{
		$xx = - $this->x;
		$yy = - $this->y;
		$zz = - $this->z;
		$qwe = new Vector(array('dest'=>new Vertex(array('x' => $xx, 'y' => $yy, 'z' => $zz))));
		return $qwe;
	}

	public function scalarProduct($k)
	{
		$xx = $this->x * $k;
		$yy = $this->y * $k;
		$zz = $this->z * $k;
		$qwe = new Vector(array('dest'=>new Vertex(array('x' => $xx, 'y' => $yy, 'z' => $zz))));
		return $qwe;
	}

	public function crossProduct(Vector $rhs)
	{
		$xx = $this->y*$rhs->z - $this->z*$rhs->y;
		$yy = $this->z*$rhs->x - $this->x*$rhs->z;
		$zz = $this->x*$rhs->y - $this->y*$rhs->x;
		$qwe = new Vector(array('dest'=>new Vertex(array('x' => $xx, 'y' => $yy, 'z' => $zz))));
		return $qwe;
	}

	public function dotProduc(Vector $rhs)
	{
		return ($this->x * $rhs->x + $this->y * $rhs->y + $this->z * $rhs->z);
	}

	public function cos(Vector $rhs)
	{
		return ($this->dotProduc($rhs) / ($this->magnitude() * $rhs->magnitude()));
	}
}













?>
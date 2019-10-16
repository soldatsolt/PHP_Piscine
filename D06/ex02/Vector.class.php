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
	public	$x;
	public	$y;
	public	$z;
	public	$w;
	public	$orig;
	public	$dest;

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
		$this->x0 = $this->orig->x;
		$this->y0 = $this->orig->y;
		$this->z0 = $this->orig->z;
		if (!isset($origdest['dest']))
			$this->dest = new Vertex();
		else
			$this->dest = $origdest['dest'];
		$this->x1 = $this->dest->x;
		$this->y1 = $this->dest->y;
		$this->z1 = $this->dest->z;
		$this->x = $this->x1 - $this->x0;
		$this->y = $this->y1 - $this->y0;
		$this->z = $this->z1 - $this->z0;
		$this->w = 0.0;
		echo 'created' . PHP_EOL;
	}

	public function __Destruct()
	{
		echo 'discreated' . PHP_EOL;
	}

	public function __toString()
	{
		return 'x0= '.$this->x0.' x1= '.$this->x1.' y0= '.$this->y0.' y1= '.$this->y1.PHP_EOL;
	}

	public function magnitude()
	{
		return (sqrt($this->x**2 + $this->y**2 + $this->z**2));
	}

	public function normalize()
	{
		$l = $this->magnitude();
		$xx = $this->x/$l;
		$yy = $this->y/$l;
		$zz = $this->z/$l;
		$qwe = new Vector(array('dest'=>new Vertex(array('x' => $xx, 'y' => $yy, 'z' => $zz))));
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
}

$vtxO = new Vertex( array( 'x' => 1.0, 'y' => 1.0, 'z' => 0.0 ) );
$vtxX = new Vertex( array( 'x' => 2.0, 'y' => 2.0, 'z' => 0.0 ) );
$vtcXunit = new Vector( array( 'orig' => $vtxO, 'dest' => $vtxX ) );
$norm = $vtcXunit->normalize();
$summ = $vtcXunit->add($norm);
$sub = $vtcXunit->sub($norm);
$sc = $vtcXunit->scalarProduct(4);
echo $vtcXunit->magnitude(). PHP_EOL. $vtcXunit. PHP_EOL;
echo $norm->magnitude(). PHP_EOL. $norm. PHP_EOL;
echo $summ->magnitude(). PHP_EOL. $summ. PHP_EOL;
echo $sub->magnitude(). PHP_EOL. $sub. PHP_EOL;
echo $sc->magnitude(). PHP_EOL. $sc. PHP_EOL;












?>
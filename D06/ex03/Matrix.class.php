<?php

require_once '../ex02/Vector.class.php';

class Matrix
{
	const TRANSLATION = "TRANSLATION";
	const PROJECTION = "PROJECTION";
	const RX = "Ox ROTATION";
	const RY = "Oy ROTATION";
	const RZ = "Oz ROTATION";
	const IDENTITY = "IDENTITY";
	const SCALE = "SCALE";
	protected $matrix = array();
	private $preset;
	private $ratio;
	private $vtc;
	private $fov;
	private $far;
	private $near;
	private $angle;
	static $verbose = false;

	public function __construct($array = NULL)
	{
		if (isset($array))
		{
			if (isset($array['preset']))
			    $this->preset = $array['preset'];
			if (isset($array['scale']))
			    $this->_scale = $array['scale'];
			if (isset($array['angle']))
			    $this->angle = $array['angle'];
			if (isset($array['vtc']))
			    $this->vtc = $array['vtc'];
			if (isset($array['fov']))
			    $this->fov = $array['fov'];
			if (isset($array['ratio']))
			    $this->ratio = $array['ratio'];
			if (isset($array['near']))
			    $this->near = $array['near'];
			if (isset($array['far']))
			    $this->far = $array['far'];
			$this->check();
			$this->createMatrix();
			if (Self::$verbose)
			{
				if ($this->preset == Self::IDENTITY)
				    echo "Matrix " . $this->preset . " instance constructed\n";
				else
				    echo "Matrix " . $this->preset . " preset instance constructed\n";
			}
			$this->dispatch();
	    }
	}

	function __destruct()
	{
	    if (Self::$verbose)
	        printf("Matrix instance destructed\n");
	}

	private function dispatch()
	{
		switch ($this->preset) 
		{
			case (self::IDENTITY) :
			    $this->identity(1);
			    break;
			case (self::TRANSLATION) :
			    $this->translation();
			    break;
			case (self::SCALE) :
			    $this->identity($this->_scale);
			    break;
			case (self::RX) :
			    $this->rotation_x();
			    break;
			case (self::RY) :
			    $this->rotation_y();
			    break;
			case (self::RZ) :
			    $this->rotation_z();
			    break;
			case (self::PROJECTION) :
			    $this->projection();
			    break;
	    }
	}	

	private function createMatrix()
	{
		for ($i = 0; $i < 16; $i++) 
	        $this->matrix[$i] = 0;
	}	

	private function identity($scale)
	{
		$this->matrix[0] = $scale;
		$this->matrix[5] = $scale;
		$this->matrix[10] = $scale;
		$this->matrix[15] = 1;
	}	

	private function translation()
	{
		$this->identity(1);
		$this->matrix[3] = $this->vtc->getX();
		$this->matrix[7] = $this->vtc->getY();
		$this->matrix[11] = $this->vtc->getZ();
	}	

	private function rotation_x()
	{
		$this->identity(1);
		$this->matrix[0] = 1;
		$this->matrix[5] = cos($this->angle);
		$this->matrix[6] = -sin($this->angle);
		$this->matrix[9] = sin($this->angle);
		$this->matrix[10] = cos($this->angle);
	}	

	private function rotation_y()
	{
		$this->identity(1);
		$this->matrix[0] = cos($this->angle);
		$this->matrix[2] = sin($this->angle);
		$this->matrix[5] = 1;
		$this->matrix[8] = -sin($this->angle);
		$this->matrix[10] = cos($this->angle);
	}	

	private function rotation_z()
	{
		$this->identity(1);
		$this->matrix[0] = cos($this->angle);
		$this->matrix[1] = -sin($this->angle);
		$this->matrix[4] = sin($this->angle);
		$this->matrix[5] = cos($this->angle);
		$this->matrix[10] = 1;
	}	

	private function projection()
	{
		$this->identity(1);
		$this->matrix[5] = 1 / tan(0.5 * deg2rad($this->fov));
		$this->matrix[0] = $this->matrix[5] / $this->ratio;
		$this->matrix[10] = -1 * (-$this->near - $this->far) / ($this->near - $this->far);
		$this->matrix[14] = -1;
		$this->matrix[11] = (2 * $this->near * $this->far) / ($this->near - $this->far);
		$this->matrix[15] = 0;
	}	

	private function check()
	{
		if (empty($this->preset))
		    return "error";
		if ($this->preset == self::SCALE && empty($this->_scale))
		    return "error";
		if (($this->preset == self::RX || $this->preset == self::RY || $this->preset == self::RZ) && empty($this->angle))
		    return "error";
		if ($this->preset == self::TRANSLATION && empty($this->vtc))
		    return "error";
		if ($this->preset == self::PROJECTION && (empty($this->fov) || empty($this->_radio) || empty($this->near) || empty($this->far)))
			return "error";
	}	

	public function mult(Matrix $rhs)
	{
		$tmp = array();
		for ($i = 0; $i < 16; $i += 4)
		{
			for ($j = 0; $j < 4; $j++)
			{
				$tmp[$i + $j] = 0;
				$tmp[$i + $j] += $this->matrix[$i + 0] * $rhs->matrix[$j + 0];
				$tmp[$i + $j] += $this->matrix[$i + 1] * $rhs->matrix[$j + 4];
				$tmp[$i + $j] += $this->matrix[$i + 2] * $rhs->matrix[$j + 8];
				$tmp[$i + $j] += $this->matrix[$i + 3] * $rhs->matrix[$j + 12];
		    }
		}
		$matrice = new Matrix();
		$matrice->matrix = $tmp;
		return $matrice;
	}	

	public function transformVertex(Vertex $vtx)
	{
		$tmp = array();
		$tmp['x'] = ($vtx->getX() * $this->matrix[0]) + ($vtx->getY() * $this->matrix[1]) + ($vtx->getZ() * $this->matrix[2]) + ($vtx->getW() * $this->matrix[3]);
		$tmp['y'] = ($vtx->getX() * $this->matrix[4]) + ($vtx->getY() * $this->matrix[5]) + ($vtx->getZ() * $this->matrix[6]) + ($vtx->getW() * $this->matrix[7]);
		$tmp['z'] = ($vtx->getX() * $this->matrix[8]) + ($vtx->getY() * $this->matrix[9]) + ($vtx->getZ() * $this->matrix[10]) + ($vtx->getW() * $this->matrix[11]);
		$tmp['w'] = ($vtx->getX() * $this->matrix[11]) + ($vtx->getY() * $this->matrix[13]) + ($vtx->getZ() * $this->matrix[14]) + ($vtx->getW() * $this->matrix[15]);
		$tmp['color'] = $vtx->getColor();
		$vertex = new Vertex($tmp);
		return $vertex;
	}

	function __toString()
	{
return (sprintf(
"M | vtcX | vtcY | vtcZ | vtxO
-----------------------------
x | %0.2f | %0.2f | %0.2f | %0.2f
y | %0.2f | %0.2f | %0.2f | %0.2f
z | %0.2f | %0.2f | %0.2f | %0.2f
w | %0.2f | %0.2f | %0.2f | %0.2f",
$this->matrix[0], $this->matrix[1],$this->matrix[2], $this->matrix[3],
$this->matrix[4], $this->matrix[5],$this->matrix[6], $this->matrix[7],
$this->matrix[8], $this->matrix[9],$this->matrix[10], $this->matrix[11],
$this->matrix[12], $this->matrix[13],$this->matrix[14], $this->matrix[15]));
	}

	public static function doc()
	{
	    $read = fopen("Matrix.doc.txt", 'r');
	    echo "\n";
	    while ($read && !feof($read))
			echo fgets($read);
	    echo "\n";
	}
}

Vertex::$verbose = False;
Vector::$verbose = False;

print( Matrix::doc() );
Matrix::$verbose = True;

print( 'Let\'s start with an harmless identity matrix :' . PHP_EOL );
$I = new Matrix( array( 'preset' => Matrix::IDENTITY ) );
print( $I . PHP_EOL . PHP_EOL );

print( 'So far, so good. Let\'s create a translation matrix now.' . PHP_EOL );
$vtx = new Vertex( array( 'x' => 20.0, 'y' => 20.0, 'z' => 0.0 ) );
$vtc = new Vector( array( 'dest' => $vtx ) );
$T  = new Matrix( array( 'preset' => Matrix::TRANSLATION, 'vtc' => $vtc ) );
print( $T . PHP_EOL . PHP_EOL );

print( 'A scale matrix is no big deal.' . PHP_EOL );
$S  = new Matrix( array( 'preset' => Matrix::SCALE, 'scale' => 10.0 ) );
print( $S . PHP_EOL . PHP_EOL );

print( 'A Rotation along the OX axis :' . PHP_EOL );
$RX = new Matrix( array( 'preset' => Matrix::RX, 'angle' => M_PI_4 ) );
print( $RX . PHP_EOL . PHP_EOL );

print( 'Or along the OY axis :' . PHP_EOL );
$RY = new Matrix( array( 'preset' => Matrix::RY, 'angle' => M_PI_2 ) );
print( $RY . PHP_EOL . PHP_EOL );

print( 'Do a barrel roll !' . PHP_EOL );
$RZ = new Matrix( array( 'preset' => Matrix::RZ, 'angle' => 2 * M_PI ) );
print( $RZ . PHP_EOL . PHP_EOL );

print( 'The bad guy now, the projection matrix : 3D to 2D !' . PHP_EOL );
print( 'The values are arbitray. We\'ll decipher them in the next exercice.' . PHP_EOL );
$P = new Matrix( array( 'preset' => Matrix::PROJECTION,
						'fov' => 60,
						'ratio' => 640/480,
						'near' => 1.0,
						'far' => -50.0 ) );
print( $P . PHP_EOL . PHP_EOL );

print( 'Matrices are so awesome, that they can be combined !' . PHP_EOL );
print( 'This is a model matrix that scales, then rotates around OY axis,' . PHP_EOL );
print( 'then rotates around OX axis and finally translates.' . PHP_EOL );
print( 'Please note the reverse operations order. It\'s not an error.' . PHP_EOL );
$M = $T->mult( $RX )->mult( $RY )->mult( $S );
print( $M . PHP_EOL . PHP_EOL );

print( 'What can you do with a matrix and a vertex ?' . PHP_EOL );
$vtxA = new Vertex( array( 'x' => 1.0, 'y' => 1.0, 'z' => 0.0 ) );
print( $vtxA . PHP_EOL );
print( $M . PHP_EOL );
print( 'Transform the damn vertex !' . PHP_EOL );
$vtxB = $M->transformVertex( $vtxA );
print( $vtxB . PHP_EOL . PHP_EOL );
?>
<?php
require('fpdf/fpdf.php');
include_once "../../MYSQLDB/conexion.php";
include_once "estudiante.php";
$estudiante = estudiante::obtenerUno($_GET["id"]);
$numero=1;
$nombres= $estudiante->nombre1.' '.$estudiante->nombre2.' '.$estudiante->apellido1.' '.$estudiante->apellido2;

class PDF extends FPDF
{
	// Cabecera de página
	function Header()
	{
	    $this->Ln(10);
	    $this->SetFont('Arial','B',14);
	    // Movernos a la derecha
	    $this->Cell(55);
	    // Título
	    $this->Cell(80,8,'REPORTE DE NOTAS ',1,0,'C');
	    // Salto de línea
    	$this->Ln(20);
	}

	// Pie de página
	function Footer()
	{
	    // Posición: a 1,5 cm del final
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',8);
	    // Número de página
	    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
	}
}

$pdf=new PDF/*('L','mm','A4')*/;
$pdf->AliasNbPages();
$pdf->AddPage();

//informacion del estudiantes
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10);

$pdf->Cell(30,6, 'Nombre',1,0,'C',0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(90,6, $nombres,1,0,'C',0);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(18,6, 'Grado',1,0,'C',0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(30,6, $estudiante->grado,1,1,'C',0);
$pdf->Cell(10);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,6, utf8_decode('Identificación'),1,0,'C',0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(90,6, $estudiante->id,1,0,'C',0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(18,6, 'Curso',1,0,'C',0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(30,6, $estudiante->curso,1,1,'C',0);
$pdf->Cell(10);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,6, utf8_decode('Institución'),1,0,'C',0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(138,6, utf8_decode('Institución Educativa Atanasio Girardot'),1,1,'C',0);
$pdf->Ln(10);


//notas del estudiante
$consulta="SELECT * FROM materias";
$resultado=$mysqli->query($consulta);
$resultado2=$mysqli->query($consulta);
$cont_mat=0;

while ($row2 = $resultado2->fetch_assoc()) 
{
	$cont_mat=$cont_mat+1;
}

$pdf->SetFont('Arial','B',10);

$pdf->Cell(37);
$pdf->Cell(10,6, utf8_decode('Nº'),1,0,'C',0);
$pdf->Cell(30,6, 'Codigo',1,0,'C',0);
$pdf->Cell(50,6, 'Nombre',1,0,'C',0);
$pdf->Cell(25,6, 'Puntaje',1,1,'C',0);
$pdf->SetFont('Arial','',10);

while ($row = $resultado->fetch_assoc()) 
{
	$pdf->Cell(37);
	$pdf->Cell(10,8, $numero,1,0,'C',0);
	$pdf->Cell(30,8, $row['id'],1,0,'C',0);
	$pdf->Cell(50,8, $row['nombre'],1,0,'C',0);

	$identificador=$row['id'];
	$consulta2="SELECT puntaje, id_materia FROM notas_estudiantes_materias WHERE id_estudiante = $estudiante->id";
	$resultado2=$mysqli->query($consulta2);	
	
	$row2=0;
	$contador = 0;
	$sumatoria = 0;
	$promedio = 0;
	$activo=0;

	while ($row2 = $resultado2->fetch_assoc()) 
	{
		if($identificador<=0)
		{
			$sumatoria=0;
			$contador=0;
		}
		else
		{
			$nota=$row2["id_materia"];

			if($row['id']==$nota)
			{
				$nota=$row2['puntaje'];
				$pdf->Cell(25,8, $nota,1,1,'C',0);
				$activo=1;
			}

			$sumatoria += $row2['puntaje'];
			$contador=$contador+1;
		}
	}

	if($sumatoria!=0 && $contador==$cont_mat)
	{
		$promedio=($sumatoria/$contador);
		$promedio=number_format($promedio,2);
	}
	else
	{
		if($activo==0)
		{
			$pdf->Cell(25,8, 'No asignada',1,1,'C',0);
		}	
	}

	$numero=$numero+1;
}

if($promedio==0)
{
	$promedio='Faltan notas';
}

$pdf->Cell(37);
$pdf->Cell(90,8, 'Promedio',1,0,'C',0);
$pdf->Cell(25,8, $promedio,1,1,'C',0);

$pdf->Output();
?>
<?php
require('../../pdf_generador/fpdf.php');
include_once "../../MYSQLDB/conexion.php";

class PDF extends FPDF
{
	// Cabecera de página
	function Header()
	{
	    $this->SetFont('Arial','B',16);
	    // Movernos a la derecha
	    $this->Cell(35);
	    // Título
	    $this->Cell(100,10,'Listado de estudiantes ' ,0,0,'C');
		
		// Salto de línea
    	$this->Ln(15);
		
    	$this->SetFont('Arial','B',10);
    	$this->Cell(-5);
    	$this->Cell(27,8, utf8_decode('codigo'),1,0,'C',0);
		$this->Cell(16,8, 'Grado',1,0,'C',0);
		$this->Cell(14,8, 'Curso',1,0,'C',0);
		$this->Cell(30 * 4,8, 'Estudiante',1,0,'C',0);
		$this->Cell(16*1.7,8, 'Nota definitiva',1,1,'C',0);
	}

	// Pie de página
	function Footer()
	{
		$this->SetFont('Arial','B',7);

		$this->Cell(50,10,'Generado el  ' . strval(date("Y/m/d")) ,0,0,'C');		
		
	    
	    // Posición: a 1,5 cm del final
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',8);
	    // Número de página
	    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
		
	}
}

$consulta="SELECT * FROM estudiantes";
$resultado=$mysqli->query($consulta);
$perdidos = 0;
$pasados = 0;
$consulta2="SELECT * FROM materias";
$resultado2=$mysqli->query($consulta2);
$cont_mat=0;

while ($row2 = $resultado2->fetch_assoc()) 
{
	$cont_mat=$cont_mat+1;
}


$pdf=new PDF;
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',13);
while ($row = $resultado->fetch_assoc()) 
{
$pdf->SetTextColor(0,0,255);  // Establece el color del texto (en este caso es blanco)

	$pdf->Cell(-5);
	$pdf->Cell(27,8, $row['id'],1,0,'C',0);
	$pdf->Cell(16,8, $row['grado'],1,0,'C',0);
	$pdf->Cell(14,8, $row['curso'],1,0,'C',0);
	$pdf->Cell(30 * 4,8, $row['apellido1'] . " " . $row['apellido2']. " "  . $row['nombre2']. " " .  $row['nombre1'],1,0,'C',0);
	
	

	$identificador=$row['id'];
	$consulta2="SELECT puntaje FROM notas_estudiantes_materias WHERE id_estudiante = $identificador";
	$resultado2=$mysqli->query($consulta2);	

	$contador = 0;
	$sumatoria = 0;
	$promedio = 0;

	while ($row2 = $resultado2->fetch_assoc()) 
	{
		if($identificador<=0)
		{
			$sumatoria=0;
			$contador=0;
		}
		else
		{
			$sumatoria += $row2["puntaje"];
			$contador=$contador+1;
		}
	}

	if($sumatoria!=0 && $contador==$cont_mat)
	{
		$promedio=($sumatoria/$contador);
		$promedio=number_format($promedio,2);
	}

	if($promedio >= 3.0){
	$pdf->SetTextColor(0,255,0);
	$pasados++;	


	}else{
		$pdf->SetTextColor(255,0,0);
		$perdidos++;
	}
	$pdf->Cell(16*1.7,8, $promedio,1,1,'C',0);
	$pdf->SetTextColor(0,0,0);


	
}

$pdf->Cell(30,12,  "pasaron :  " . $pasados,0,0,'C',0);
$pdf->Cell(30,12, "perdieron " . $perdidos,0,1,'C',0);


$pdf->Output();
?>
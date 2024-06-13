<?php
require_once '../vendor/autoload.php';
require_once '../DB/Conexion.php';
use Fpdf\Fpdf;
$pdf = new Fpdf();


$pdf->AddPage();

if($conn->connect_error){
    die("Conexion fallida: ".$conn->connect_error);
}else{
    $sql = "SELECT `Nombre`, `Tiempo de Ejecucion`, `Calidad`, `Complejidad` FROM `usuarios` ";
    $result =$conn->query($sql);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->image('code.jpg', 4, 4, 40, 0);
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 40, 'Reporte de Analisis', 0, 30, 'C');
    //Encabezados de la tabla
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40, 10, 'Nombre', 1);
    $pdf->Cell(50, 10, 'Tiempo de Ejecucion', 1);
    $pdf->Cell(40, 10, 'Calidad', 1);
    $pdf->Cell(40, 10, 'Complejidad', 1);
    $pdf->Ln();
}

$pdf->SetFont('Arial', '', 12);
if ($result->num_rows > 0) {     
    while($row = $result->fetch_assoc()) { 
                $pdf->Cell(40, 10, $row["Nombre"], 1); 
                $pdf->Cell(50, 10, $row["Tiempo de Ejecucion"], 1); 
                $pdf->Cell(40, 10, $row["Calidad"], 1);
                $pdf->Cell(40, 10, $row["Complejidad"], 1); 
                $pdf->Ln(); 
            }
} else {    
       $pdf->Cell(0, 10, 'No se encontraron resultados', 1, 1, 'C'); 
    }
$conn ->close();
$pdf->Output();
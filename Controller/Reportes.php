<?php

require_once '../vendor/autoload.php';
require_once '../DB/Conexion.php';
$pdf = new FPDF();

$pdf->AddPage();

if($coneccion->connect_error){
    die("Conexion fallida: ".$conn->connect_error);
}else{
    $sql = "SELECT Username, password FROM usuarios";
    $result =$conn->query($sql);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->image('code.png', 4, 4, 40, 0);
    $pdf->Cell(0, 10, 'Tabla de Usuarios', 0, 1, 'C');
    $pdf->Ln();
    $pdf->SetFont('Arial', 'B', 10);
    $anchoPagina = $pdf->GetPageWidth();
    $anchoColumna = 50;
    $posicionX = ($anchoPagina - $anchoColumna * 5)/5;
    $pdf->SetX($posicionX);
    $pdf->Cell($anchoColumna, 10, 'Nombre', 1, 0, 'C');
    $pdf->Cell($anchoColumna, 10, 'Tiempo de Ejecucion', 1, 1, 'C');
    $pdf->Cell($anchoColumna, 10, 'Calidad', 1, 1, 'C');
    $pdf->Cell($anchoColumna, 10, 'Complejidad', 1, 1, 'C');
    $pdf->SetFont('Arial', '', 10);

}

if ($result->num_rows >0){
    while ($row = $result->fetch_assoc()){
        $posicionX = ($anchoPagina -$anchoColumna * 5)/5;
        $pdf->SetX($posicionX);
        // Nombre de los campos en la db
        $pdf->Cell($anchoColumna, 10, $row["Nombre"], 1, 0, 'C');
        $pdf->Cell($anchoColumna, 10, $row["Tiempo de Ejecucion"], 1, 1, 'C');
        $pdf->Cell($anchoColumna, 10, $row["Calidad"], 1, 1, 'C');
        $pdf->Cell($anchoColumna, 10, $row["Complejidad"], 1, 1, 'C');
    }

}else{
    // Error por si no se encuentran los datos!
    $pdf->Cell($anchoColumna *2, 10, 'No se encontraron usuarios');

}
ob_clean();
$pdf->Output();
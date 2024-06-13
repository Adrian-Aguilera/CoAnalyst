<?php
require_once '../vendor/autoload.php';
require "ResponseController.php";

use Fpdf\Fpdf;
$pdf = new Fpdf();

$pdf->AddPage();
$responseController = new ResponseController();
session_start();
$user_id = $_SESSION['user_id'];
$response = $responseController->getDataByID(intval($user_id));
$datos = json_encode($response, true);

$pdf->SetFont('Arial', 'B', 12);
$pdf->image('code.jpg', 4, 4, 40, 0);
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 40, 'Reporte de Analisis', 0, 30, 'C');
    //Encabezados de la tabla
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 10, 'estado', 1);
$pdf->Cell(50, 10, 'Tiempo de Ejecucion', 1);
$pdf->Cell(40, 10, 'memoria usada', 1);
$pdf->Cell(40, 10, 'Complejidad', 1);
$pdf->Ln();

$pdf->SetFont('Arial', '', 12);
if ($datos) {
    foreach ($response as $fila) {
        $pdf->Cell(40, 10, $fila["estado"], 1);
        $pdf->Cell(50, 10, $fila["tiempo_ejecucion"], 1);
        $pdf->Cell(40, 10, $fila["memoria_usada"], 1);
        $pdf->Cell(40, 10, $fila["complejidad"], 1);  // Asegúrate de que esta clave sea correcta
        $pdf->Ln();
    }
} else {
    $pdf->Cell(0, 10, 'No se encontraron resultados', 1, 1, 'C');
}
$pdf->Output();

$log_insert = '../logs/log_pdf.log';
file_put_contents($log_insert, $datos . PHP_EOL, FILE_APPEND);
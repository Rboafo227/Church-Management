<?php
include('inc/db-const.php');

$conn = mysqli_connect('localhost', 'root', '', 'project');
//$database = new Database();
$id = $_GET['id'];
$result = $conn->query("SELECT topic, preacher, date, verse, sermon FROM sermons WHERE id='$id'");
$header = $conn->query("SELECT UCASE(`COLUMN_NAME`) 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='crud' 
AND `TABLE_NAME`='sermons'
and `COLUMN_NAME` in ('topic','preacher','sermon','verse')");

require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
//$pdf = array(10, 15, 12, 14, 25, 17, 35, 15, 15, 20);



foreach ($header as $heading) {
    foreach ($heading as $row_heading)
        $pdf->Multicell(95, 12, $row_heading, 1);
}
foreach ($result as $row) {
    $pdf->Ln();
    foreach ($row as $row)
        $pdf->Multicell(185, 10, $row, 1);
}
$pdf->Output();

<?php
session_start();
require "fpdf181/fpdf.php";

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Times','B',16);
$pdf->setMargins(0,0,0);
$pdf->Image("http://localhost/WTProject/uploads/".$_GET['file'],5,5,200,250);
$pdf->Cell(100,225,"",0,2);
$pdf->Cell(150,25,"ATTESTED",0,2,'C');
$pdf->Image('http://chart.googleapis.com/chart?cht=qr&chs=300x300&chl='.$_GET['sample'],100,265,30,30,'PNG');
$filename = "C:/xampp/htdocs/WTProject/attested/".substr($_GET['file'], 0,10)."_".substr($_GET['file'], 11,1).".pdf";
$pdf->Output($filename,'F');
session_write_close();
unlink(dirname(__FILE__)."/uploads/".$_GET['file']);
include("attestfile.php");
?>
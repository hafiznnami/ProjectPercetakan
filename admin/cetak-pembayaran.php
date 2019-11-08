<?php
require('cetak.php');
require "../db.php";

$id = $_GET["id"];
$query = mysqli_query($conn,"SELECT * FROM pembayaran WHERE id_pembayaran = '$id'");

$row = mysqli_fetch_assoc($query);
                    
$pdf = new FPDF('p','mm','A4');
$pdf->AddPage();

// set font to Arial,Bold,14pt
$pdf->setFont('Arial','B',18);

// cell(width,height,text,border,end line,[align])

$pdf->Cell(190,20,'                             Pembayaran Percetakan Kieta',1,1);
$pdf->Cell(190,5,'',0,1);
$pdf->setFont('Arial','',12);
$pdf->Cell(200,10,'ID Transaksi            	     	  :    '.$row['id_transaksi'].'           ',0,1);
$pdf->Cell(200,10,'Jumlah Transfer               :    '.$row['jumlah_uang'].'             ',0,1);
$pdf->Cell(200,10,'Tanggal Transfer        		    :    '.$row['tanggal_pembayaran'].'     ',0,1);
$pdf->Cell(200,10,'Catatan                            :    '.$row['catatan_pembayaran'].'     ',0,1);
$pdf->Cell(200,10,'              ',0,1);
$pdf->Cell(320,20,'Admin Percetakan Kieta',0,1,'C');


$pdf->Output();
?>
<?php
require('cetak.php');
require "../db.php";

$id = $_GET["id"];
$query = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_transaksi = '$id'");

$row = mysqli_fetch_assoc($query);

$pdf = new FPDF('p','mm','A4');
$pdf->AddPage();

// set font to Arial,Bold,14pt
$pdf->setFont('Arial','B',18);

// cell(width,height,text,border,end line,[align])

$pdf->Cell(190,20,'                             Transaksi Percetakan Kieta',1,1);
$pdf->Cell(190,5,'',0,1);
$pdf->setFont('Arial','',12);
$pdf->Cell(200,10,'ID Pesanan            	     	  :    '.$row['id_pesanan'].'           ',0,1);
$pdf->Cell(200,10,'Deskripsi Pesanan          :    '.$row['desc_pesanan'].'             ',0,1);
$pdf->Cell(200,10,'Tanggal Transaksi        		:    '.$row['tgl_transaksi'].'     ',0,1);
$pdf->Cell(200,10,'Metode Pembayaran      :    '.$row['metode_transaksi'].'     ',0,1);
$pdf->Cell(200,10,'Metode Pengiriman       	:    '.$row['pengiriman_transaksi'].'     ',0,1);
$pdf->Cell(200,10,'Total Harga       		   				  	 :    Rp.'.$row['total_transaksi'].'     ',0,1);
$pdf->Cell(200,10,'              ',0,1);
$pdf->Cell(320,20,'Admin Percetakan Kieta',0,1,'C');


$pdf->Output();
?>
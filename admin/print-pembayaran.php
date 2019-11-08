<?php
require('cetak.php');
require "../db.php";

// Setting halaman PDF
$pdf = new FPDF('l','mm','A5');
// Menambah halaman baru
$pdf->AddPage();
// Setting jenis font
$pdf->SetFont('Arial','B',16);
// Membuat string
$pdf->Cell(190,7,'Laporan Pembayaran PercetakanKieta',0,1,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(190,7,'Jl. Tuar Indah XI No.18 Blok 9 Martubung',0,1,'C');
// Setting spasi kebawah supaya tidak rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(50,6,'',0,1);
$pdf->Cell(10,6,'ID',1,0);
$pdf->Cell(20,6,'ID Transaksi',1,0);
$pdf->Cell(25,6,'Jumlah Transfer',1,0);
$pdf->Cell(30,6,'Bukti Transfer',1,0);
$pdf->Cell(100,6,'Catatan',1,1);
 
$pdf->SetFont('Arial','',8);
$query = mysqli_query($conn, "SELECT * FROM pembayaran");
while ($row = mysqli_fetch_array($query)){
	$pdf->Cell(10,6,$row['id_pembayaran'],1,0);
	$pdf->Cell(20,6,$row['id_transaksi'],1,0);
	$pdf->Cell(25,6,$row['jumlah_uang'],1,0);
	$pdf->Cell(30,6,$row['gambar_pembayaran'],1,0);
	$pdf->Cell(100,6,$row['catatan_pembayaran'],1,1);
}

$pdf->Output();
?>
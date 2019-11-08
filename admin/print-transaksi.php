<?php
require('cetak.php');
require "../db.php";

// Setting halaman PDF
$pdf = new FPDF('l','mm','A4');
// Menambah halaman baru
$pdf->AddPage();
// Setting jenis font
$pdf->SetFont('Arial','B',16);
// Membuat string
$pdf->Cell(290,7,'Laporan Transaksi PercetakanKieta',0,1,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(290,7,'Jl. Tuar Indah XI No.18 Blok 9 Martubung',0,1,'C');
// Setting spasi kebawah supaya tidak rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,6,'ID',1,0);
$pdf->Cell(20,6,'ID Pesanan',1,0);
$pdf->Cell(20,6,'Username',1,0);
$pdf->Cell(100,6,'Deskripsi Pesanan',1,0);
$pdf->Cell(25,6,'Tanggal',1,0);
$pdf->Cell(45,6,'Metode Pembayaran',1,0);
$pdf->Cell(40,6,'Metode Pengiriman',1,0);
$pdf->Cell(20,6,'Total Harga',1,1);
 
$pdf->SetFont('Arial','',8);
$query = mysqli_query($conn, "SELECT * FROM transaksi");
while ($row = mysqli_fetch_array($query)){
	$pdf->Cell(10,6,$row['id_transaksi'],1,0);
	$pdf->Cell(20,6,$row['id_pesanan'],1,0);
	$pdf->Cell(20,6,$row['userName'],1,0);
	$pdf->Cell(100,6,$row['desc_pesanan'],1,0);
	$pdf->Cell(25,6,$row['tgl_transaksi'],1,0);
	$pdf->Cell(45,6,$row['metode_transaksi'],1,0);
	$pdf->Cell(40,6,$row['pengiriman_transaksi'],1,0);
	$pdf->Cell(20,6,$row['total_transaksi'],1,1);
}

$pdf->Output();
?>
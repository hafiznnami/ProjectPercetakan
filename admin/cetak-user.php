<?php
require('cetak.php');
require "../db.php";

$id = $_GET["id"];
$query = mysqli_query($conn,"SELECT * FROM user WHERE userId = '$id'");

$row = mysqli_fetch_assoc($query);


                     
$pdf = new FPDF('p','mm','A4');
$pdf->AddPage();

// set font to Arial,Bold,14pt
$pdf->setFont('Arial','B',18);

// cell(width,height,text,border,end line,[align])

$pdf->Cell(190,20,'                             Data Pelanggan Percetakan Kieta',1,1);
$pdf->Cell(190,5,'',0,1);
$pdf->setFont('Arial','',14);
$pdf->Cell(200,10,'  Nama            	     	          :        '.$row['userNama'].'           ',0,1);
$pdf->Cell(200,10,'  Alamat               		          :        '.$row['userAlamat'].'             ',0,1);
$pdf->Cell(200,10,'  Email        		        				 		    :        '.$row['userEmail'].'     ',0,1);
$pdf->Cell(200,10,'  No HP       		   				  	 	      :        '.$row['userHp'].'     ',0,1);
$pdf->setFont('Arial','B',14);
$pdf->Cell(200,10,'              ',0,1);


$pdf->Output();
?>
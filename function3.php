<?php

$conn = mysqli_connect("localhost","root","","dbpercetakan"); 


function pesanSpanduk($data){
	global $conn;
    $username = htmlspecialchars($_POST["username"]);
    $produk = htmlspecialchars($_POST["produk"]);
    $nopesanan = htmlspecialchars($_POST["noPesanan"]);
    $bahan = htmlspecialchars($_POST["bahanBanner"]);
    $ukuran = htmlspecialchars($_POST["ukuranBanner"]);
    $jumlah = htmlspecialchars($_POST["jumlahBanner"]);
    $message = htmlspecialchars($_POST["message"]);
    $totalHarga = htmlspecialchars($_POST["totalHarga"]);
		
    $query = mysqli_query($conn,"SELECT * FROM banner WHERE harga_banner = '$ukuran'");
    $row = mysqli_fetch_assoc($query);
    $ukuranBanner = $row["ukuran_banner"];

	//upload gambar
	$file1 = uploadSpanduk1();
  $file2 = uploadSpanduk2();
	if(!$file1){
		return false;
	}
	$insert = mysqli_query($conn,"INSERT INTO `dbpercetakan`.`cetak_banner` (`id_cetakbanner`, `userName`, `nama_produk`, `pesanan_cetakbanner`, `ukuran_cetakbanner`, `bahan_cetakbanner`, `jumlah_cetakbanner`, `harga_cetakbanner`, `file_satu`, `file_dua`, `catatan_cetakbanner`) VALUES (NULL, '$username', '$produk', '$nopesanan', '$bahan', '$ukuranBanner', '$jumlah', '$totalHarga', '$file1', '$file2', '$message')");


   if($insert){

	  return mysqli_affected_rows($conn);
   }
}

function pesanXbanner($data){
  global $conn;
    $username = htmlspecialchars($_POST["username"]);
    $produk = htmlspecialchars($_POST["produk"]);
    $nopesanan = htmlspecialchars($_POST["noPesanan"]);
    $bahan = htmlspecialchars($_POST["bahanBanner"]);
    $ukuran = htmlspecialchars($_POST["ukuranBanner"]);
    $jumlah = htmlspecialchars($_POST["jumlahBanner"]);
    $message = htmlspecialchars($_POST["message"]);
    $totalHarga = htmlspecialchars($_POST["totalHarga"]);
    
    $query = mysqli_query($conn,"SELECT * FROM banner WHERE harga_banner = '$ukuran'");
    $row = mysqli_fetch_assoc($query);
    $ukuranBanner = $row["ukuran_banner"];

  //upload gambar
  $file1 = uploadXbanner1();
  $file2 = uploadXbanner2();
  if(!$file1){
    return false;
  }
  $insert = mysqli_query($conn,"INSERT INTO `dbpercetakan`.`cetak_banner` (`id_cetakbanner`, `userName`, `nama_produk`, `pesanan_cetakbanner`, `ukuran_cetakbanner`, `bahan_cetakbanner`, `jumlah_cetakbanner`, `harga_cetakbanner`, `file_satu`, `file_dua`, `catatan_cetakbanner`) VALUES (NULL, '$username', '$produk', '$nopesanan', '$bahan', '$ukuranBanner', '$jumlah', '$totalHarga', '$file1', '$file2', '$message')");


   if($insert){

    return mysqli_affected_rows($conn);
   }
}

function uploadSpanduk1(){
 $namafile = $_FILES['file1']['name'];
 $ukuranfile = $_FILES['file1']['size'];
 $error = $_FILES['file1']['error'];
 $tmpname = $_FILES['file1']['tmp_name'];

 //cek apakah tidak ada gambar yg di upload
 if($error === 4){
 	echo "<script>
 	     alert('Pilih Gambar Terlebih Dahulu');
 	      </script>";
 	      return false;
}


 //yg boleh di upload hanya gambar
 $ekstensiGambarValid = ['jpg','jpeg','png'];
 $ekstensiGambar = explode('.',$namafile);
 $ekstensiGambar = strtolower(end($ekstensiGambar));
 if( !in_array($ekstensiGambar,$ekstensiGambarValid)){
 	echo "<script>
 	      alert('yang anda upload bukan gambar');
 	      </script>";

 	      return false;
 }


 //cek jika ukuran terlalu besar
 if($ukuranfile > 10000000){
 	echo "<script>
 	     alert('Ukuran Gambar Terlalu Besar');
 	      </script>";
 	      return false;
 }

 //lolos pengecekkan
 //generate nama gambar baru
 $namafilebaru = uniqid();
 $namafilebaru .= '.';
 $namafilebaru .= $ekstensiGambar;
   move_uploaded_file($tmpname,'admin/img/'.$namafilebaru);
   return $namafilebaru; 
 	

}

function uploadSpanduk2(){
 $namafile = $_FILES['file2']['name'];
 $ukuranfile = $_FILES['file2']['size'];
 $error = $_FILES['file2']['error'];
 $tmpname = $_FILES['file2']['tmp_name'];

 //yg boleh di upload hanya gambar
 $ekstensiGambarValid = ['jpg','jpeg','png'];
 $ekstensiGambar = explode('.',$namafile);
 $ekstensiGambar = strtolower(end($ekstensiGambar));
 if( !in_array($ekstensiGambar,$ekstensiGambarValid)){
        return false;
 }


 //cek jika ukuran terlalu besar
 if($ukuranfile > 10000000){
  echo "<script>
       alert('Ukuran Gambar Terlalu Besar');
        </script>";
        return false;
 }

 //lolos pengecekkan
 //generate nama gambar baru
 $namafilebaru = uniqid();
 $namafilebaru .= '.';
 $namafilebaru .= $ekstensiGambar;
   move_uploaded_file($tmpname,'admin/img/'.$namafilebaru);
   
   return $namafilebaru; 

}

function uploadXbanner1(){
 $namafile = $_FILES['file1']['name'];
 $ukuranfile = $_FILES['file1']['size'];
 $error = $_FILES['file1']['error'];
 $tmpname = $_FILES['file1']['tmp_name'];

 //cek apakah tidak ada gambar yg di upload
 if($error === 4){
  echo "<script>
       alert('Pilih Gambar Terlebih Dahulu');
        </script>";
        return false;
}


 //yg boleh di upload hanya gambar
 $ekstensiGambarValid = ['jpg','jpeg','png'];
 $ekstensiGambar = explode('.',$namafile);
 $ekstensiGambar = strtolower(end($ekstensiGambar));
 if( !in_array($ekstensiGambar,$ekstensiGambarValid)){
  echo "<script>
        alert('yang anda upload bukan gambar');
        </script>";

        return false;
 }


 //cek jika ukuran terlalu besar
 if($ukuranfile > 10000000){
  echo "<script>
       alert('Ukuran Gambar Terlalu Besar');
        </script>";
        return false;
 }

 //lolos pengecekkan
 //generate nama gambar baru
 $namafilebaru = uniqid();
 $namafilebaru .= '.';
 $namafilebaru .= $ekstensiGambar;
   move_uploaded_file($tmpname,'admin/img/'.$namafilebaru);
   return $namafilebaru; 
  

}

function uploadXbanner2(){
 $namafile = $_FILES['file2']['name'];
 $ukuranfile = $_FILES['file2']['size'];
 $error = $_FILES['file2']['error'];
 $tmpname = $_FILES['file2']['tmp_name'];

 //yg boleh di upload hanya gambar
 $ekstensiGambarValid = ['jpg','jpeg','png'];
 $ekstensiGambar = explode('.',$namafile);
 $ekstensiGambar = strtolower(end($ekstensiGambar));
 if( !in_array($ekstensiGambar,$ekstensiGambarValid)){
        return false;
 }


 //cek jika ukuran terlalu besar
 if($ukuranfile > 10000000){
  echo "<script>
       alert('Ukuran Gambar Terlalu Besar');
        </script>";
        return false;
 }

 //lolos pengecekkan
 //generate nama gambar baru
 $namafilebaru = uniqid();
 $namafilebaru .= '.';
 $namafilebaru .= $ekstensiGambar;
   move_uploaded_file($tmpname,'admin/img/'.$namafilebaru);
   
   return $namafilebaru; 

}

function checkoutBanner($data){
  global $conn;
    $id = htmlspecialchars($_POST["Id"]);
    $username = htmlspecialchars($_POST["Username"]);
    $desc = htmlspecialchars($_POST["Desc"]);
    $tanggal = htmlspecialchars($_POST["Tanggal"]);
    $pembayaran = htmlspecialchars($_POST["Pembayaran"]);
    $pengiriman = htmlspecialchars($_POST["Pengiriman"]);
    $total = htmlspecialchars($_POST["Total"]);
    $status = htmlspecialchars($_POST["Status"]);

    $insert = mysqli_query($conn,"INSERT INTO `dbpercetakan`.`transaksi` (`id_transaksi`, `id_pesanan`, `userName`, `desc_pesanan`, `tgl_transaksi`, `metode_transaksi`, `pengiriman_transaksi`, `total_transaksi`, `status_transaksi`) VALUES (NULL, '$id', '$username', '$desc', '$tanggal', '$pembayaran', '$pengiriman', '$total', '$status')");

  
   if($insert){

    return mysqli_affected_rows($conn);
   }
}

function hapusBanner($id) {
  global $conn;
  mysqli_query($conn, "DELETE FROM cetak_banner WHERE id_cetakbanner = '$id' " );
  return mysqli_affected_rows($conn);
}

?>
<?php

$conn = mysqli_connect("localhost","root","","dbpercetakan"); 


function pesanBrosur($data){
	global $conn;
    $username = htmlspecialchars($_POST["username"]);
    $produk = htmlspecialchars($_POST["produk"]);
    $nopesanan = htmlspecialchars($_POST["noPesanan"]);
    $ukuran = htmlspecialchars($_POST["ukuranKertas"]);
    $jenis = htmlspecialchars($_POST["jenisKertas"]);
    $sisi = htmlspecialchars($_POST["jumlahSisi"]);
    $lipatan = htmlspecialchars($_POST["lipatan"]);
    $jumlah = htmlspecialchars($_POST["jumlah"]);
    $total = htmlspecialchars($_POST["totalHarga"]);
    $message = htmlspecialchars($_POST["message"]);

	//upload gambar
	$gambar1 = uploadBrosur1();
  $gambar2 = uploadBrosur2();
	if(!$gambar1){
		return false;
	}

  if($jumlah >= 1 && $jumlah <= 49) {
    $insert = mysqli_query($conn,"INSERT INTO `dbpercetakan`.`brosur` (`id_brosur`, `userName`, `nama_produk`, `pesanan_brosur`, `ukuran_brosur`, `kertas_brosur`, `sisi_brosur`, `lipatan_brosur`, `jumlah_brosur`, `harga_brosur`, `file_depan`, `file_belakang`, `catatan_brosur`) VALUES (NULL, '$username', '$produk', '$nopesanan', '$ukuran', '$jenis', '$sisi', '$lipatan', '$jumlah', '$total', '$gambar1', '$gambar2', '$message')");
  }

  if($jumlah >= 50 && $jumlah <= 99) {
    $disc = 0.25 * $total;
    $totalJumlah = $total - $disc;
    $insert = mysqli_query($conn,"INSERT INTO `dbpercetakan`.`brosur` (`id_brosur`, `userName`, `nama_produk`, `pesanan_brosur`, `ukuran_brosur`, `kertas_brosur`, `sisi_brosur`, `lipatan_brosur`, `jumlah_brosur`, `harga_brosur`, `file_depan`, `file_belakang`, `catatan_brosur`) VALUES (NULL, '$username', '$produk', '$nopesanan', '$ukuran', '$jenis', '$sisi', '$lipatan', '$jumlah', '$totalJumlah', '$gambar1', '$gambar2', '$message')");
  }

  if($jumlah >= 100 && $jumlah <= 499) {
    $disc = 0.50 * $total;
    $totalJumlah = $total - $disc;
    $insert = mysqli_query($conn,"INSERT INTO `dbpercetakan`.`brosur` (`id_brosur`, `userName`, `nama_produk`, `pesanan_brosur`, `ukuran_brosur`, `kertas_brosur`, `sisi_brosur`, `lipatan_brosur`, `jumlah_brosur`, `harga_brosur`, `file_depan`, `file_belakang`, `catatan_brosur`) VALUES (NULL, '$username', '$produk', '$nopesanan', '$ukuran', '$jenis', '$sisi', '$lipatan', '$jumlah', '$totalJumlah', '$gambar1', '$gambar2', '$message')");
  }

  if($jumlah >= 500) {
    $disc = 0.75 * $total;
    $totalJumlah = $total - $disc;
    $insert = mysqli_query($conn,"INSERT INTO `dbpercetakan`.`brosur` (`id_brosur`, `userName`, `nama_produk`, `pesanan_brosur`, `ukuran_brosur`, `kertas_brosur`, `sisi_brosur`, `lipatan_brosur`, `jumlah_brosur`, `harga_brosur`, `file_depan`, `file_belakang`, `catatan_brosur`) VALUES (NULL, '$username', '$produk', '$nopesanan', '$ukuran', '$jenis', '$sisi', '$lipatan', '$jumlah', '$totalJumlah', '$gambar1', '$gambar2', '$message')");
  }
  
	
   if($insert){

	  return mysqli_affected_rows($conn);
   }
}

function pesanFlyer($data){
  global $conn;
    $username = htmlspecialchars($_POST["username"]);
    $produk = htmlspecialchars($_POST["produk"]);
    $nopesanan = htmlspecialchars($_POST["noPesanan"]);
    $ukuran = htmlspecialchars($_POST["ukuranKertas"]);
    $jenis = htmlspecialchars($_POST["jenisKertas"]);
    $sisi = htmlspecialchars($_POST["jumlahSisi"]);
    $jumlah = htmlspecialchars($_POST["jumlah"]);
    $total = htmlspecialchars($_POST["totalHarga"]);
    $message = htmlspecialchars($_POST["message"]);

  //upload gambar
  $gambar1 = uploadFlyer1();
  $gambar2 = uploadFlyer2();
  if(!$gambar1){
    return false;
  }

  if($jumlah >= 1 && $jumlah <= 49) {
    $insert = mysqli_query($conn,"INSERT INTO `dbpercetakan`.`cetak_kertas` (`id_cetakertas`, `userName`, `nama_produk`, `pesanan_cetakertas`, `ukuran_cetakertas`, `kertas_cetakertas`, `sisi_cetakertas`, `jumlah_cetakertas`, `harga_cetakertas`, `gambar_depan`, `gambar_belakang`, `catatan_cetakertas`) VALUES (NULL, '$username', '$produk', '$nopesanan', '$ukuran', '$jenis', '$sisi', '$jumlah', '$total', '$gambar1', '$gambar2', '$message')");
  
  }

  if($jumlah >= 50 && $jumlah <= 99) {
    $disc = 0.25 * $total;
    $totalJumlah = $total - $disc;
    $insert = mysqli_query($conn,"INSERT INTO `dbpercetakan`.`cetak_kertas` (`id_cetakertas`, `userName`, `nama_produk`, `pesanan_cetakertas`, `ukuran_cetakertas`, `kertas_cetakertas`, `sisi_cetakertas`, `jumlah_cetakertas`, `harga_cetakertas`, `gambar_depan`, `gambar_belakang`, `catatan_cetakertas`) VALUES (NULL, '$username', '$produk', '$nopesanan', '$ukuran', '$jenis', '$sisi', '$jumlah', '$totalJumlah', '$gambar1', '$gambar2', '$message')");
  }

  if($jumlah >= 100 && $jumlah <= 499) {
    $disc = 0.50 * $total;
    $totalJumlah = $total - $disc;
    $insert = mysqli_query($conn,"INSERT INTO `dbpercetakan`.`cetak_kertas` (`id_cetakertas`, `userName`, `nama_produk`, `pesanan_cetakertas`, `ukuran_cetakertas`, `kertas_cetakertas`, `sisi_cetakertas`, `jumlah_cetakertas`, `harga_cetakertas`, `gambar_depan`, `gambar_belakang`, `catatan_cetakertas`) VALUES (NULL, '$username', '$produk', '$nopesanan', '$ukuran', '$jenis', '$sisi', '$jumlah', '$totalJumlah', '$gambar1', '$gambar2', '$message')");
  }

  if($jumlah >= 500) {
    $disc = 0.75 * $total;
    $totalJumlah = $total - $disc;
    $insert = mysqli_query($conn,"INSERT INTO `dbpercetakan`.`cetak_kertas` (`id_cetakertas`, `userName`, `nama_produk`, `pesanan_cetakertas`, `ukuran_cetakertas`, `kertas_cetakertas`, `sisi_cetakertas`, `jumlah_cetakertas`, `harga_cetakertas`, `gambar_depan`, `gambar_belakang`, `catatan_cetakertas`) VALUES (NULL, '$username', '$produk', '$nopesanan', '$ukuran', '$jenis', '$sisi', '$jumlah', '$totalJumlah', '$gambar1', '$gambar2', '$message')");
  }
  
  
   if($insert){

    return mysqli_affected_rows($conn);
   }
}

function pesanPoster($data){
  global $conn;
    $username = htmlspecialchars($_POST["username"]);
    $produk = htmlspecialchars($_POST["produk"]);
    $nopesanan = htmlspecialchars($_POST["noPesanan"]);
    $ukuran = htmlspecialchars($_POST["ukuranKertas"]);
    $jenis = htmlspecialchars($_POST["jenisKertas"]);
    $sisi = htmlspecialchars($_POST["jumlahSisi"]);
    $jumlah = htmlspecialchars($_POST["jumlah"]);
    $total = htmlspecialchars($_POST["totalHarga"]);
    $message = htmlspecialchars($_POST["message"]);

  //upload gambar
  $gambar1 = uploadPoster1();
  $gambar2 = uploadPoster2();
  if(!$gambar1){
    return false;
  }
  
  if($jumlah >= 1 && $jumlah <= 49) {
    $insert = mysqli_query($conn,"INSERT INTO `dbpercetakan`.`cetak_kertas` (`id_cetakertas`, `userName`, `nama_produk`, `pesanan_cetakertas`, `ukuran_cetakertas`, `kertas_cetakertas`, `sisi_cetakertas`, `jumlah_cetakertas`, `harga_cetakertas`, `gambar_depan`, `gambar_belakang`, `catatan_cetakertas`) VALUES (NULL, '$username', '$produk', '$nopesanan', '$ukuran', '$jenis', '$sisi', '$jumlah', '$total', '$gambar1', '$gambar2', '$message')");
  
  }

  if($jumlah >= 50 && $jumlah <= 99) {
    $disc = 0.25 * $total;
    $totalJumlah = $total - $disc;
    $insert = mysqli_query($conn,"INSERT INTO `dbpercetakan`.`cetak_kertas` (`id_cetakertas`, `userName`, `nama_produk`, `pesanan_cetakertas`, `ukuran_cetakertas`, `kertas_cetakertas`, `sisi_cetakertas`, `jumlah_cetakertas`, `harga_cetakertas`, `gambar_depan`, `gambar_belakang`, `catatan_cetakertas`) VALUES (NULL, '$username', '$produk', '$nopesanan', '$ukuran', '$jenis', '$sisi', '$jumlah', '$totalJumlah', '$gambar1', '$gambar2', '$message')");
  }

  if($jumlah >= 100 && $jumlah <= 499) {
    $disc = 0.50 * $total;
    $totalJumlah = $total - $disc;
    $insert = mysqli_query($conn,"INSERT INTO `dbpercetakan`.`cetak_kertas` (`id_cetakertas`, `userName`, `nama_produk`, `pesanan_cetakertas`, `ukuran_cetakertas`, `kertas_cetakertas`, `sisi_cetakertas`, `jumlah_cetakertas`, `harga_cetakertas`, `gambar_depan`, `gambar_belakang`, `catatan_cetakertas`) VALUES (NULL, '$username', '$produk', '$nopesanan', '$ukuran', '$jenis', '$sisi', '$jumlah', '$totalJumlah', '$gambar1', '$gambar2', '$message')");
  }

  if($jumlah >= 500) {
    $disc = 0.75 * $total;
    $totalJumlah = $total - $disc;
    $insert = mysqli_query($conn,"INSERT INTO `dbpercetakan`.`cetak_kertas` (`id_cetakertas`, `userName`, `nama_produk`, `pesanan_cetakertas`, `ukuran_cetakertas`, `kertas_cetakertas`, `sisi_cetakertas`, `jumlah_cetakertas`, `harga_cetakertas`, `gambar_depan`, `gambar_belakang`, `catatan_cetakertas`) VALUES (NULL, '$username', '$produk', '$nopesanan', '$ukuran', '$jenis', '$sisi', '$jumlah', '$totalJumlah', '$gambar1', '$gambar2', '$message')");
  }
  
  
   if($insert){

    return mysqli_affected_rows($conn);
   }
}

function uploadBrosur1(){
 $namafile = $_FILES['gambarDepan']['name'];
 $ukuranfile = $_FILES['gambarDepan']['size'];
 $error = $_FILES['gambarDepan']['error'];
 $tmpname = $_FILES['gambarDepan']['tmp_name'];

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

function uploadBrosur2(){
 $namafile = $_FILES['gambarBelakang']['name'];
 $ukuranfile = $_FILES['gambarBelakang']['size'];
 $error = $_FILES['gambarBelakang']['error'];
 $tmpname = $_FILES['gambarBelakang']['tmp_name'];

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

function uploadFlyer1(){
 $namafile = $_FILES['gambarDepan']['name'];
 $ukuranfile = $_FILES['gambarDepan']['size'];
 $error = $_FILES['gambarDepan']['error'];
 $tmpname = $_FILES['gambarDepan']['tmp_name'];

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

function uploadFlyer2(){
 $namafile = $_FILES['gambarBelakang']['name'];
 $ukuranfile = $_FILES['gambarBelakang']['size'];
 $error = $_FILES['gambarBelakang']['error'];
 $tmpname = $_FILES['gambarBelakang']['tmp_name'];

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

function uploadPoster1(){
 $namafile = $_FILES['gambarDepan']['name'];
 $ukuranfile = $_FILES['gambarDepan']['size'];
 $error = $_FILES['gambarDepan']['error'];
 $tmpname = $_FILES['gambarDepan']['tmp_name'];

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

function uploadPoster2(){
 $namafile = $_FILES['gambarBelakang']['name'];
 $ukuranfile = $_FILES['gambarBelakang']['size'];
 $error = $_FILES['gambarBelakang']['error'];
 $tmpname = $_FILES['gambarBelakang']['tmp_name'];

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

function checkoutBrosur($data){
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

function checkoutKertas($data){
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

function hapusBrosur($id) {
  global $conn;
  mysqli_query($conn, "DELETE FROM brosur WHERE id_brosur = '$id' " );
  return mysqli_affected_rows($conn);
}

function hapusKertas($id) {
  global $conn;
  mysqli_query($conn, "DELETE FROM cetak_kertas WHERE id_cetakertas = '$id' " );
  return mysqli_affected_rows($conn);
}

?>
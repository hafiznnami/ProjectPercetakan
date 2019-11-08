<?php

require 'aws/vendor/autoload.php';


$conn = mysqli_connect("localhost","root","","dbpercetakan"); 


function pesanPrint($data){
  global $conn;
    $username = htmlspecialchars($_POST["username"]);
    $produk = htmlspecialchars($_POST["produk"]);
    $nopesanan = htmlspecialchars($_POST["noPesanan"]);
    $ukuran = htmlspecialchars($_POST["ukuranKertas"]);
    $bw = htmlspecialchars($_POST["bw"]);
    $color = htmlspecialchars($_POST["color"]);
    $sisi = htmlspecialchars($_POST["jumlahSisi"]);
    $jilid = htmlspecialchars($_POST["jilid"]);
    $total = htmlspecialchars($_POST["totalHarga"]);
    $message = htmlspecialchars($_POST["message"]);

    $query = mysqli_query($conn,"SELECT * FROM kertas_print WHERE harga_kertas = '$ukuran'");
    $row = mysqli_fetch_assoc($query);
    $ukuranKertas = $row["ukuran_kertas"];

  //upload gambar
  $dokumen = uploadPrint();
  if(!$dokumen){
    return false;
  }
  $insert = mysqli_query($conn,"INSERT INTO `dbpercetakan`.`print` (`id_print`, `userName`, `nama_produk`, `pesanan_print`, `ukuran_print`, `black_print`, `color_print`, `sisi_print`, `jilid_print`, `harga_print`, `file_print`, `catatan_print`) VALUES (NULL, '$username', '$produk', '$nopesanan', '$ukuranKertas', '$bw', '$color', '$sisi', '$jilid', '$total', '$dokumen', '$message')");

  
   if($insert){

    return mysqli_affected_rows($conn);
   }
}

function uploadPrint(){

$s3 = new Aws\S3\S3Client([
      'region' => 'us-east-1',
      'version' => 'latest',
      'credentials' => [
              'key'    => 'AKIA6I4IJNBHAP6Y3U72',
              'secret' => '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',
      ]
]);

 $namafile = $_FILES['dokumen']['name'];
 $ukuranfile = $_FILES['dokumen']['size'];
 $error = $_FILES['dokumen']['error'];
 $tmpname = $_FILES['dokumen']['tmp_name'];

 //cek apakah tidak ada file dokumen yang di upload
 if($error === 4){
  echo "<script>
       alert('Pilih File Document Terlebih Dahulu');
        </script>";
        return false;
}


 //yg boleh di upload hanya dokumen yang mau di print
 $ekstensiDokumenValid = ['doc','docx','pdf','xlsx'];
 $ekstensiDokumen = explode('.',$namafile);
 $ekstensiDokumen = strtolower(end($ekstensiDokumen));
 if( !in_array($ekstensiDokumen,$ekstensiDokumenValid)){
  echo "<script>
        alert('Yang Anda Upload Bukan Document');
        </script>";

        return false;
 }


 //cek jika ukuran terlalu besar
 if($ukuranfile > 20000000){
  echo "<script>
       alert('Ukuran Gambar Terlalu Besar');
        </script>";
        return false;
 }

 //lolos pengecekkan
 //generate nama gambar baru
 $namafilebaru = uniqid();
 $namafilebaru .= '.';
 $namafilebaru .= $ekstensiDokumen;

  try {
    $result = $s3->putObject([
      'Bucket' => 'project-percetakan',
      'Key' => $namafilebaru,
      'SourceFile' => $tmpname
    ]);

    move_uploaded_file($tmpname,'admin/doc/'.$namafilebaru);
    return $namafilebaru;
  }
  catch (\Aws\S3\Exception\S3Exception $e){
    echo "<script>
       alert('".$e->getAwsErrorMessage()."');
        </script>";
        return false;
  }
  catch (Exception $e){
    echo "<script>
       alert('".$e->getMessage()."');
        </script>";
        return false;
  } 

}

function checkoutPrint($data){
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

function kirimPembayaran($data){
  global $conn;
    $id = htmlspecialchars($_POST["id"]);
    $transfer = htmlspecialchars($_POST["transfer"]);
    $tanggal = htmlspecialchars($_POST["tanggal"]);
    $message = htmlspecialchars($_POST["message"]);

    $gambar = uploadPembayaran();
    if(!$gambar){
      return false;
    }

    $insert = mysqli_query($conn,"INSERT INTO `dbpercetakan`.`pembayaran` (`id_pembayaran`, `id_transaksi`, `jumlah_uang`, `tanggal_pembayaran`, `gambar_pembayaran`, `catatan_pembayaran`) VALUES (NULL, '$id', '$transfer', '$tanggal', '$gambar', '$message')");

  
   if($insert){

    return mysqli_affected_rows($conn);
   }
}

function uploadPembayaran(){
 $namafile = $_FILES['gambar']['name'];
 $ukuranfile = $_FILES['gambar']['size'];
 $error = $_FILES['gambar']['error'];
 $tmpname = $_FILES['gambar']['tmp_name'];

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
   move_uploaded_file($tmpname,'admin/bukti/'.$namafilebaru);
   
   return $namafilebaru; 

}

function hapusPrint($id) {
  global $conn;
  mysqli_query($conn, "DELETE FROM print WHERE id_print = '$id' " );
  return mysqli_affected_rows($conn);
}

?>
<?php
require "db.php";
require "function3.php";
session_start();

  $query1 = mysqli_query($conn,"SELECT * FROM banner WHERE ukuran_banner = '60 x 160 cm'");
  $query2 = mysqli_query($conn,"SELECT * FROM banner WHERE ukuran_banner = '80 x 180 cm'");
  $query3 = mysqli_query($conn,"SELECT * FROM banner WHERE nama_produk = 'xbanner'");
  $row1 = mysqli_fetch_assoc($query1);
  $row2 = mysqli_fetch_assoc($query2);
  $row3 = mysqli_fetch_assoc($query3);

  $nopesan = uniqid();

  if(!isset($_SESSION["user"])){
    header("location:login.php");
  }
  if(isset($_SESSION["user"])){
      $id = $_SESSION["user"];
  }

  if(isset($_POST["pesan"])){
   if(pesanXbanner($_POST) > 0){
      echo " <script>
              alert('Pemesanan Anda Ada Di Keranjang');
              document.location.href = '';
            </script> " ;
      }
      else{
         echo " <script>
              alert('Gagal Memesan Ada Kesalahan Pada Saat Mengisi Data');
              document.location.href = '';
            </script> " ;
      }
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <title>Percetakan</title>
  </head>

  <body>

      <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: #2F4F4F;">
        <div class="container">
          <a class="navbar-brand" href="index.php">PercetakanKieta</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="katalog.html">Katalog <span class="sr-only">(current)</span></a>
              </li>
               <li class="nav-item active">
                <a class="nav-link" href="keranjang.php?id=<?=$_SESSION["user"];?>">Cart</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="transaction.php?id=<?=$_SESSION["user"];?>">Transaksi</a>
              </li>
              <?php if(isset($_SESSION["user"])) { ?>
              <li class="nav-item">
                <a class="btn btn-primary tombol" href="logout.php">Logout, &nbsp; <?=$_SESSION["user"];?></a>
              </li>
              <?php } else if(!isset($_SESSION["user"])) { ?>
              <li class="nav-item">
                <a class="btn btn-primary tombol" href="login.php">Login</a>
              </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </nav>
    <!-- Akhir Navbar -->

       <!-- Jumbotron -->
      <div class="jumbotron jumbotron4 jumbotron-fluid">
        <div class="container">
        </div>
      </div>
    <!-- Akhir Jumbotron -->


    <!-- Form -->
        <div class="container">
          <header class="section-header">
              <h3>X-Banner</h3>
            <div class="card card-style">
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">
              <input type="hidden" name="username" id="userName" value="<?=$id;?>">
              <input type="hidden" name="produk" id="produk" value="<?=$row3['nama_produk'];?>">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputPesanan">No Pesanan</label>
              <input type="text" class="form-control" id="inputPesanan" name="noPesanan" value="<?=$nopesan?>" readonly>
            </div>
            <div class="form-group col-md-4">
              <label for="inputUkuran">Pilihan Ukuran</label>
              <select id="inputUkuran" class="form-control" name="ukuranBanner">
                <option selected value="0">Pilih...</option>
                <option value="<?=$row1['harga_banner'];?>">60 x 160 cm</option>
                <option value="<?=$row2['harga_banner'];?>">80 x 180 cm</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="inputBahan">Bahan</label>
              <input type="text" class="form-control" id="inputBahan" name="bahanBanner" value="<?=$row1['bahan_banner']?>" readonly>
            </div>
            <div class="form-group col-md-4">
              <label for="inputJumlah">Jumlah</label>
              <input type="text" class="form-control" id="inputJumlah" name="jumlahBanner">
            </div>
            <div class="form-group col-md-4">
              <label for="inputHarga">Total Harga</label>
              <input type="text" class="form-control" name="totalHarga" id="inputHarga" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="inputPesan">Catatan</label>
                <textarea id="inputPesan" name="message" class="form-control" placeholder="Maksimal 100 Karakter"></textarea>
              </div>
              <div class="form-group col-md-2">
                <label for="exampleFormControlFile1">File 1</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file1">
              </div>
              <div class="form-group col-md-2">
                <label for="exampleFormControlFile1">File 2</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile2" name="file2">
              </div>
            </div>
          <button type="submit" class="btn btn-primary tombol" name="pesan">Pesan</button>
          <button type="submit" class="btn btn-primary tombol" id="cekHarga5">Cek Harga</button>
        </form>
      </header>
    </div>
  </div>
</div><br>
    <!-- Akhir Form -->

    <!-- Petunjuk -->
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body kartu">
              <h4>Petunjuk Jasa PercetakanKieta</h4>
              <p class="description">Percetakan kieta mempunyai 6 produk/jasa yang ditawarkan seperti print, brosur, flyer, poster, spanduk dan x-banner<br>
              <b>Pemesanan Print</b>
              Untuk pemesanan print akan dicetak dan disiapkan dalam waktu 10 – 15 menit setelah melakukan pemesanan. File yang dapat di print adalah berektensi .docx, .doc, .pdf, dan .xlsx.<br>
              <b>Pemesanan Brosur, Flyer dan Poster</b>
              Untuk pemesanan cetak brosur, flyer dan poster akan disiapkan dalam waktu 6 – 7 jam untuk pemesanan dibawah 100 pcs, untuk pemesanan diatas 100 pcs akan disiapkan dalam 1 – 2 hari dan untuk pemesanan diatas 500 pcs akan disiapkan dalam waktu 3 – 4 hari.  File yang dapat dicetak adalah berekstensi JPG, JPEG, PNG dan beresolusi 300 pixel.<br>
              <b>Pemesanan Spanduk</b>
              Untuk pemesanan spanduk akan disiapkan dalam waktu antara 3 jam – 1 hari. Pemesanan spanduk melalui online hanya dapat mencetak dengan ukuran 1 x 1 meter sampai 5 x 1 meter. Cetak spanduk dengan ukuran lain dapat didiskusikan dengan menghubungi customer service atau langsung datang ke tempat percetakan. Ekstensi yang dapat dicetak adalah JPG, JPEG, PNG  dan beresolusi minimal 72 pixel.<br>
              <b>Pemesanan X-Banner</b>
              Untuk pemesanan x-banner akan disiapkan dalam waktu 1 – 2 hari dan hanya tersedia dua pilihan ukuran yaitu 60 x 160 cm dan 80 x 180 cm. Sudah termasuk dengan rangka x berbahan plastik. Ekstensi yang dapat dicetak adalah JPG, JPEG, PNG  dan beresolusi minimal 100 pixel.<br>
              Hasil Cetak yang sudah selesai dapat diambil langsung ke tempat percetakan atau dapat diantar oleh petugas percetakan.<br>
              Bila ada file yang salah saat upload dapat langsung menghubungi customer service dan jika file yang diupload beresolusi rendah maka customer service akan menghubungi anda.<br>
              Terima kasih untuk pelanggan yang sudah membaca petunjuk.<br>
              Salam, <b>Admin Percetakan Kieta.</b><br>
              </p>
            </div>
          </div>
        </div>  
      </div>
    </div><br>
    <!-- Akhir Petunjuk -->


        <!-- Footer -->
     <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6 footer-info">
            <h3>PercetakanKieta</h3>
            <p>Percetakan merupakan usaha yang diperlukan untuk mendapatkan berbagai hasil dari desain yang dibuat dalam berbagai bentuk dan produk. Dimana selain jasa percetakan offline yang bisa Anda pilih, sekarang ini ada jenis jasa cetak online yang bisa dipilih sesuai dengan perkembangan jaman. Jasa percetakan online ini juga mempunyai banyak sekali keuntungan yang bisa dirasakan sebagai tempat usaha untuk percetakan dan desain yang Anda butuhkan.</p>
          </div>

          <div class="col-lg-3"></div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Jl. Tuar Indah XI No.18 Blok 9 Martubung<br>
              Medan Labuhan, Kota Medan 20251<br>
              Sumatera Utara<br>
              <strong>Phone:</strong> 087869208821<br>
              <strong>Email:</strong> hafiznnami@gmail.com<br>
            </p>

            <div class="social-links">
              <a href="https://twitter.com/hafiz_nnami" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="https://web.facebook.com/hafiz.nami.3" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="https://www.instagram.com/hafiznami/" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong>PercetakanKieta</strong>. All Rights Reserved
        </div>
      </div>
    </footer>
    <!-- Akhir Footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main2.js"></script>
  </body>
</html>
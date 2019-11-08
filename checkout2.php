<?php
require "db.php";
require "function2.php";
session_start();

  $id = $_GET["id"];
  $query = mysqli_query($conn, "SELECT * FROM cetak_kertas WHERE id_cetakertas = '$id'" );
  $row = mysqli_fetch_assoc($query);

  if(!isset($_SESSION["user"])){
    header("location:login.php");
  }
  if(isset($_SESSION["user"])){
      $id = $_SESSION["user"];
  }

  if(isset($_POST["checkout"])){
   if(checkoutKertas($_POST) > 0){
      echo " <script>
              alert('Transaksi Berhasil');
              document.location.href = '';
            </script> " ;
      }
      else{
         echo " <script>
              alert('Transaksi Gagal');
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

    <!-- Form -->
    <div class="container">
      <header class="section-header">
      <h3>Checkout</h3>
      <div class="row">
        <div class="col"></div>
          <div class="col-md-8">
            <div class="card card-style">
            <div class="card-body">
              <form method="post" action="">
                <div class="form-group">
                    <label for="inputPesanan">ID Pesanan</label>
                    <input type="text" class="form-control" id="inputPesanan" name="Id" value="<?=$row['id_cetakertas']?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="inputUsername">Nama User</label>
                    <input type="text" class="form-control" id="inputUsername" name="Username" value="<?=$row['userName'];?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="inputDesc">Deskripsi</label>
                    <input type="text" class="form-control" id="inputDesc" name="Desc" value="<?=$row['pesanan_cetakertas'];?>, <?=$row['nama_produk'];?>, <?=$row['ukuran_cetakertas'];?>, <?=$row['kertas_cetakertas'];?>, <?=$row['sisi_cetakertas'];?>, <?=$row['jumlah_cetakertas'];?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="inputTanggal">Tanggal</label>
                    <input type="date" class="form-control" id="inputTanggal" name="Tanggal">
                  </div>
                  <div class="form-group">
                    <label for="inputJenisPembayaran">Metode Pembayaran</label>
                    <select id="inputJenisPembayaran" class="form-control" name="Pembayaran">
                      <option selected value="0">Pilih...</option>
                      <option>COD (CASH ON DELIVERY)</option>
                      <option>Bank Transfer</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="inputJenisPengiriman">Metode Pengiriman</label>
                    <select id="inputJenisPengiriman" class="form-control" name="Pengiriman">
                      <option selected value="0">Pilih...</option>
                      <option>Delivery Order</option>
                      <option>Ambil Di Tempat Percetakan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="inputHarga">Total Harga</label>
                    <input type="text" class="form-control" name="Total" id="inputHarga" value="<?=$row['harga_cetakertas']?>" readonly>
                  </div>        
                  <div class="form-group">
                    <input type="hidden" class="form-control" id="inputStatus" name="Status" value="1">
                  </div>
                  <button type="submit" name="checkout" class="btn btn-primary">Submit <i class="fa fa-arrow-right"></i></button>
              </form>
            </div>
          </div>
          </div>
        <div class="col"></div>
      </div>
    </div>
    <!-- Akhir Form -->

     <!-- Footer -->
     <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6 footer-info">
            <h3>PercetakanKieta</h3>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
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
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/jquery-3.2.1.min"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
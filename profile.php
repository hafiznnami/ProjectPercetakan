<?php
require "db.php";
session_start();

  $id = $_GET["id"];
  $query = mysqli_query($conn,"SELECT * FROM user WHERE userName = '$id'");
  $row = mysqli_fetch_assoc($query);

  if(!isset($_SESSION["user"])){
    header("location:login.php");
  }
  if(isset($_SESSION["user"])){
      $id = $_SESSION["user"];
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
      <div class="row">
        <div class="col"></div>
        <div class="col-md-8">
          <div class="card card-login">
            <div class="card-body">
              <div id="pesanRegis"></div>
              <h4 class="card-title">Ubah Profile Anda</h4>
                  <div class="form-group">
                    <label for="inputUsername">Username *</label>
                    <input type="text" class="form-control" id="inputUsername" name="Username" value="<?=$row['userName'];?>">
                  </div>
                  <div class="form-group">
                    <label for="inputPassword">Password *</label>
                    <input type="password" class="form-control" id="inputPassword" name="Password" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="inputPassword">Konfirmasi Password *</label>
                    <input type="password" class="form-control" id="inputPassword" name="Password1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="inputNama">Nama *</label>
                    <input type="text" class="form-control" id="inputNama" name="Nama" value="<?=$row['userNama'];?>">
                  </div>
                  <div class="form-group">
                    <label for="inputAlamat">Alamat Lengkap *</label>
                    <input type="text" class="form-control" id="inputAlamat" name="Alamat" value="<?=$row['userAlamat'];?>">
                  </div>
                  <div class="form-group">
                    <label for="inputEmail">Email *</label>
                    <input type="email" class="form-control" id="inputEmail" name="Email" value="<?=$row['userEmail'];?>">
                  </div>
                  <div class="form-group">
                    <label for="inputHp">No HP (Aktif)*</label>
                    <input type="text" class="form-control" id="inputHp" name="Nohp" value="<?=$row['userHp'];?>">
                  </div>
                  <div class="form-group">
                    <input type="hidden" class="form-control" id="inputGroup"name="Group" value="2">
                  </div>
                  <button type="submit" id="daftar" class="btn btn-primary">Ubah Profile</button>
                  <a class="btn btn-danger" href="index.php">Batal</a>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/jquery-3.2.1.min"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
<?php

session_start();

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
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light">
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
              <li class="nav-item">
                <a class="nav-link" href="profile.php?id=<?=$_SESSION["user"];?>">Profile</a>
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
    <div class="jumbotron jumbotronn jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Finish your prints <span>faster</span><br> and <span>better</span> with us</h1>
      </div>
    </div>
    <!-- Akhir Jumbotron -->

    <!-- Product -->
    <div class="container">
        <header class="section-header">
          <h3>Our Product</h3>
          <div class="row">
            <div class="col">
              <div class="card card-panel">
                <div class="card-body">
                  <a href="print.php"><img src="img/printer.png" alt="printer"></a>
                  <h5 class="card-title">Print</h5>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card card-panel">
                <div class="card-body">
                  <a href="brosur.php"><img src="img/brochure.png" alt="brosur"></a>
                  <h5 class="card-title">Brochure</h5>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card card-panel">
                <div class="card-body">
                  <a href="flyer.php"><img src="img/flyer.png" alt="flyer"></a>
                  <h5 class="card-title">Flyer</h5>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card card-panel">
                <div class="card-body">
                  <a href="poster.php"><img src="img/poster.png" alt="poster"></a>
                  <h5 class="card-title">Poster</h5>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card card-panel">
                <div class="card-body">
                  <a href="banner.php"><img src="img/banner.png" alt="banner"></a>
                  <h5 class="card-title">Banner</h5>
                </div>
              </div>
            </div>
             <div class="col">
              <div class="card card-panel">
                <div class="card-body">
                  <a href="xbanner.php"><img src="img/roll-up.png" alt="xbanner"></a>
                  <h5 class="card-title">X-Banner</h5>
                </div>
              </div>
            </div>
          </div>
        </header>
    </div>
    <!-- Akhir Product -->
    <br><br>

    <!-- Contact Us -->
    <div class="container">
    <div class="row contactus">
      <div class="col-lg">
        <img src="img/contactus.png" alt="contactus" class="img-fluid">
      </div>
      <div class="col-lg">
        <h3>Tidak Mendapat Apa yang Dicari Atau Ingin Desain Custom?</h3>
        <p>Buat desain custom sesuai dengan ketentuan dan keinginan Anda sendiri. kami siap membantu Anda. hubungi Kami</p>
        <p><i class="fa fa-whatsapp"></i> +62 878 6920 8821</p>
        <p><i class="fa fa-google-plus"></i> hafiznnami@gmail.com</p>
      </div>
    </div>
    </div>
    <!-- Akhir Contact Us -->
    
    <!-- Service -->
    <div class="container service">
      <header class="section-header">
         <h3>Service</h3>

         <div class="row">

          <div class="col-md-4 box">
            <i class="ion-ios-home-outline"></i>
            <h4 class="title">Percetakan Online di Kota Medan</h4>
            <p class="description">Kami memberikan kemudahan kepada customer untuk
            melakukan pemesanan melalui website dan platform android</p>
          </div>

          <div class="col-md-4 box">
            <i class="ion-ios-heart-outline"></i>
            <h4 class="title">Menjaga Harga dan Kualitas</h4>
            <p class="description">Kami memastikan kepada customer bahwa harga terjangkau dan kualitas baik</p>
          </div>

          <div class="col-md-4 box">
            <i class="ion-ios-speedometer-outline"></i>
            <h4 class="title">Menggunakan Sistem Delivery Order</h4>
            <p class="description">Kami menggunakan sistem delivery order untuk customer yang melakukan pemesanan melalui website dan gratis ongkos kirim untuk kota medan</p>
          </div>

       </header>
    </div>
    <!-- Akhir Service -->
    <br><br>

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
              <strong>Whatsapp:</strong> +62 878 6920 8821<br>
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
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
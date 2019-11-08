<?php
  require "db.php";
  session_start();

  $username = $_GET["id"];
  $query = mysqli_query($conn, "SELECT * FROM print WHERE userName = '$username'" );
  $query1 = mysqli_query($conn, "SELECT * FROM brosur WHERE userName = '$username'" );
  $query2 = mysqli_query($conn, "SELECT * FROM cetak_kertas WHERE userName = '$username'" );
  $query3 = mysqli_query($conn, "SELECT * FROM cetak_banner WHERE userName = '$username'" );

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
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

   <div class="container">
    <header class="section-header">
      <h3>Keranjang</h3>
    
       <div class="card card-style">
       <div class="card-body">
           <h4>Daftar Pesanan <?=$_SESSION['user'];?></h4>
           <hr>
           <!-- Pemesanan  Print -->
           <div class="col">
            <div class="row">
              <div class="table-responsive">
              <table class="table table-striped"> 
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Produk</th>  
                    <th>No Pesanan</th>
                    <th>Ukuran</th>
                    <th>Black</th>
                    <th>Color</th>
                    <th>Jumlah Sisi</th>
                    <th>Jilid</th>
                    <th>Total Harga</th>
                    <th>File</th>
                    <th>Catatan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($query)) {  ?>
                  <tr>
                    <td><?=$row['id_print'];?></td>
                    <td><?=$row["nama_produk"];;?></td>
                    <td><?=$row["pesanan_print"];?></td>
                    <td><?=$row["ukuran_print"];?></td>
                    <td><?=$row["black_print"];?></td>
                    <td><?=$row["color_print"];?></td>
                    <td><?=$row["sisi_print"];?></td>
                    <td><?=$row["jilid_print"];?></td>
                    <td><?=$row["harga_print"];?></td>
                    <td><?=$row["file_print"];?></td>
                    <td><?=$row["catatan_print"];?></td>
                    <td>
                    <a class="btn btn-success btn-sm" href="checkout.php?id=<?=$row['id_print'];?>" role="button">Checkout</a>
                    <a class="btn btn-danger btn-sm" href="hapus.php?id=<?=$row['id_print'];?>" role="button">Hapus</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div><br>
      <!-- Akhir -->

      <!-- Pemesanan  Brosur -->
      <div class="col">
            <div class="row">
              <div class="table-responsive">
              <table class="table table-striped"> 
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Produk</th>   
                    <th>No Pesanan</th>
                    <th>Ukuran</th>
                    <th>Jenis Kertas</th>
                    <th>Jumlah Sisi</th>
                    <th>Lipatan</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>File Depan</th>
                    <th>File Belakang</th>
                    <th>Catatan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($query1)) {  ?>
                  <tr>
                    <td><?=$row["id_brosur"];?></td>
                    <td><?=$row["nama_produk"];;?></td>
                    <td><?=$row["pesanan_brosur"];?></td>
                    <td><?=$row["ukuran_brosur"];?></td>
                    <td><?=$row["kertas_brosur"];?></td>
                    <td><?=$row["sisi_brosur"];?></td>
                    <td><?=$row["lipatan_brosur"];?></td>
                    <td><?=$row["jumlah_brosur"];?></td>
                    <td><?=$row["harga_brosur"];?></td>
                    <td><?=$row["file_depan"];?></td>
                    <td><?=$row["file_belakang"];?></td>
                    <td><?=$row["catatan_brosur"];?></td>
                    <td>
                    <a class="btn btn-success btn-sm" href="checkout1.php?id=<?=$row['id_brosur'];?>" role="button">Checkout</a>
                    <a class="btn btn-danger btn-sm" href="hapus1.php?id=<?=$row['id_brosur'];?>" role="button">Hapus</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div><br>
      <!-- Akhir -->

      <!-- Pemesanan Flyer dan Poster -->
      <div class="col">
            <div class="row">
              <div class="table-responsive">
              <table class="table table-striped"> 
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Produk</th> 
                    <th>No Pesanan</th>
                    <th>Ukuran</th>
                    <th>Jenis Kertas</th>
                    <th>Jumlah Sisi</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Gambar Depan</th>
                    <th>Gambar Belakang</th>
                    <th>Catatan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($query2)) {  ?>
                  <tr>
                    <td><?=$row["id_cetakertas"];?></td>
                    <td><?=$row["nama_produk"];;?></td>
                    <td><?=$row["pesanan_cetakertas"];?></td>
                    <td><?=$row["ukuran_cetakertas"];?></td>
                    <td><?=$row["kertas_cetakertas"];?></td>
                    <td><?=$row["sisi_cetakertas"];?></td>
                    <td><?=$row["jumlah_cetakertas"];?></td>
                    <td><?=$row["harga_cetakertas"];?></td>
                    <td><?=$row["gambar_depan"];?></td>
                    <td><?=$row["gambar_belakang"];?></td>
                    <td><?=$row["catatan_cetakertas"];?></td>
                    <td>
                    <a class="btn btn-success btn-sm" href="checkout2.php?id=<?=$row['id_cetakertas'];?>" role="button">Checkout</a>
                    <a class="btn btn-danger btn-sm" href="hapus2.php?id=<?=$row['id_cetakertas'];?>" role="button">Hapus</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div><br>
      <!-- Akhir -->

      <!-- Pemesanan Spanduk dan X-Banner -->
      <div class="col">
            <div class="row">
              <div class="table-responsive">
              <table class="table table-striped"> 
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Produk</th>
                    <th>No Pesanan</th>
                    <th>Ukuran</th>
                    <th>Bahan</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>File Satu</th>
                    <th>File Dua</th>
                    <th>Catatan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($query3)) {  ?>
                  <tr>
                    <td><?=$row["id_cetakbanner"];?></td>
                    <td><?=$row["nama_produk"];;?></td>
                    <td><?=$row["pesanan_cetakbanner"];?></td>
                    <td><?=$row["ukuran_cetakbanner"];?></td>
                    <td><?=$row["bahan_cetakbanner"];?></td>
                    <td><?=$row["jumlah_cetakbanner"];?></td>
                    <td><?=$row["harga_cetakbanner"];?></td>
                    <td><?=$row["file_satu"];?></td>
                    <td><?=$row["file_dua"];?></td>
                    <td><?=$row["catatan_cetakbanner"];?></td>
                    <td>
                    <a class="btn btn-success btn-sm" href="checkout3.php?id=<?=$row['id_cetakbanner'];?>" role="button">Checkout</a>
                    <a class="btn btn-danger btn-sm" href="hapus3.php?id=<?=$row['id_cetakbanner'];?>" role="button">Hapus</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div><br>
      <!-- Akhir -->

    </div>
  </div>
    
   </div>

<p><br></p>
<p><br></p>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="js/jquery-3.2.1.min"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    
  </body>
</html>
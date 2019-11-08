<?php
  require "db.php";
  require "function1.php";
  session_start();

  $username = $_GET["id"];
  $query = mysqli_query($conn, "SELECT * FROM transaksi WHERE userName = '$username'" );

  if(!isset($_SESSION["user"])){
    header("location:login.php");
  }
  if(isset($_SESSION["user"])){
      $id = $_SESSION["user"];
  }

  if(isset($_POST["kirim"])){
   if(kirimPembayaran($_POST) > 0){
      echo " <script>
              alert('Data Pembayran Anda Berhasil Disimpan');
              document.location.href = '';
            </script> " ;
      }
      else{
         echo " <script>
              alert('Data Pembayaran Gagal');
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
      <h3>Transaksi</h3>
    
       <div class="card card-style">
       <div class="card-body">
           <h4>Transaksi <?=$_SESSION['user'];?></h4>
           <div class="col">
            <div class="row">
              <div class="table-responsive">
              <table class="table table-striped"> 
                <thead>
                  <tr>
                    <th>ID Transaksi</th>
                    <th>ID Pesanan</th>  
                    <th>Username</th>
                    <th>Deskripsi Pesanan</th>
                    <th>Tanggal Transaksi</th>
                    <th>Metode Pembayaran</th>
                    <th>Metode Pengiriman</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($query)) {  ?>
                  <tr>
                    <td><?=$row['id_transaksi'];?></td>
                    <td><?=$row["id_pesanan"];;?></td>
                    <td><?=$row["userName"];?></td>
                    <td><?=$row["desc_pesanan"];?></td>
                    <td><?=$row["tgl_transaksi"];?></td>
                    <td><?=$row["metode_transaksi"];?></td>
                    <td><?=$row["pengiriman_transaksi"];?></td>
                    <td><?=$row["total_transaksi"];?></td>
                    <?php if($row["status_transaksi"] == 1) { ?>
                      <td><button class="btn btn-success btn-sm" disabled="">Verifikasi</button></td>
                    <?php } else if($row["status_transaksi"] == 2) { ?>
                      <td><button class="btn btn-warning btn-sm" disabled="">On Process</button></td>
                    <?php } else if($row["status_transaksi"] == 3) { ?>
                      <td><button class="btn btn-info btn-sm" disabled="">Delivered</button></td>
                    <?php } ?>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <small class="form-text text-muted">Status di transaksi akan di update oleh Admin Percetakan
            <br>Segera mengisi form pembayaran jika memilih metode pembayaran dnegan bank transfer
          </small>
        </div>
      </div><br>
      <!-- Akhir -->
    </div>
  </div>
</div>

      <!-- Form -->
      <div class="container">
        <header class="section-header">
        <h3>Pembayaran</h3>
        <div class="row">
          <div class="col"></div>
          <div class="col-md-6">
            <div class="card card-style">
              <div class="card-body">
                <form method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="idTransaksi" class="col-form-label">Transaksi ID</label>
                <input type="text" class="form-control" id="idTransaksi" name="id" placeholder="Masukkan Transaksi Id Anda" required>
              </div>
              <div class="form-group">
                <label for="jumlahTransfer" class="col-form-label">Jumlah Transfer</label>
                <input type="number" class="form-control" id="jumlahTransfer" name="transfer" placeholder="Masukkan Jumlah Uang" required>
              </div>
              <div class="form-group">
                <label for="tanggalPembayaran" class="col-form-label">Tanggal Pembayaran</label>
                <input type="date" class="form-control" id="tanggalPembayaran" name="tanggal" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlFile1" class="col-form-label">Gambar Bukti Transfer</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="gambar">
              </div>
              <div class="form-group">
                <label for="inputPesan">Catatan</label>
                <textarea id="inputPesan" name="message" class="form-control" placeholder="Maksimal 100 Karakter"></textarea>
              </div>
              <button type="submit" name="kirim" class="btn btn-primary">Kirim <i class="fa fa-arrow-right"></i></button>
            </form>
            <small class="form-text text-muted">Silakan isi form diatas jika melakukan pembayaran dengan Bank Transfer</small>
            <small class="form-text text-muted">Bank BRI : 628761-121-167-1 a.n Percetakan Kieta<br>
              Bank BNI : 1218718-1291-2 a.n Percetakan Kieta<br>
              minimal transfer DP 30% dari total biaya
            </small>
            <small class="form-text text-muted">Jika ada pertanyaan hubungi costumer service Admin Percetakan</small>
              </div>
            </div>
          </div>
          <div class="col"></div>
        </div>
      </div>
      <!-- Akhir Form -->

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
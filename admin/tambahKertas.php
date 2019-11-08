<?php
session_start();

  if(!isset($_SESSION["admin"])){
    header("location:../login-admin.php");
  }
  if(isset($_SESSION["admin"])){
      $id = $_SESSION["admin"];
  }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Kertas</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Percetakan</a>
            </div>

             <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="../logout1.php"><i class="fa fa-user"></i> Logout, <?=$_SESSION["admin"];?></a>
                </li>
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu" href="index.php"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="user.php"><i class="fa fa-users"></i>User</a>
                    </li>
                    <li>
                        <a href="spesifikasi.php"><i class="fa fa-archive"></i>Spesifikasi</a>
                    </li>
                    <li>
                        <a href="pesanan.php"><i class="fa fa-tags"></i>Pesanan</a>
                    </li>
                    <li>
                        <a href="transaksi.php"><i class="fa fa-shopping-cart"></i>Transaksi</a>
                    </li>
                    <li>
                        <a href="produksi.php"><i class="fa fa-arrow-circle-down"></i>Produksi</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Tambah Kertas <small>Percetakan Kieta</small>
                        </h1>
                        <div class="panel panel-default">
					<div class="panel-body">
						<label>ID</label>
						<input type="text" id="idKertas" class="form-control form-control-sm">
						<label>Produk</label>
						<input type="text" id="idProduk" class="form-control form-control-sm">
						<label>Ukuran</label>
						<input type="text" id="ukuranKertas" class="form-control form-control-sm">
                        <label>Jenis</label>
                        <input type="text" id="jenisKertas" class="form-control form-control-sm">
                        <label>Harga Kertas</label>
                        <input type="text" id="hargaKertas" class="form-control form-control-sm">
						<br/>
						<button type="submit" id="tambahKertas" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
						<a class="btn btn-danger" href="spesifikasi.php" role="button"><i class="glyphicon glyphicon-remove"></i> Batal</a>
					</div>
				</div>
			</div>                        </div>
                    </div> 
                 <!-- /. ROW  -->
				</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>

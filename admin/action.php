<?php
require "../db.php";
session_start();

if(isset($_POST["ubahPrint"])){

    $id = $_POST["PrintId"];
    $produk = $_POST["ProdukId"];
    $ukuran = $_POST["PrintUkuran"];
    $warna = $_POST["PrintWarna"];
    $harga = $_POST["PrintHarga"];

    $update = mysqli_query($conn,"UPDATE kertas_print SET 
          nama_produk = '$produk',
          ukuran_kertas = '$ukuran',
          warna_kertas = '$warna',
          harga_kertas = '$harga'

          WHERE id_kertasprint = '$id'
        ");
    if($update){
        echo "data berhasil diubah";
    }else{
        echo "data tidak berhasil diubah";
    }

}

if(isset($_POST["ubahKertas"])){
    
    $id = $_POST["KertasId"];
    $produk = $_POST["ProdukId"];
    $ukuran = $_POST["KertasUkuran"];
    $jenis = $_POST["KertasJenis"];
    $harga = $_POST["KertasHarga"];

    $update = mysqli_query($conn,"UPDATE kertas SET 
          nama_produk = '$produk',
          ukuran_kertas = '$ukuran',
          jenis_kertas = '$jenis',
          jumlah_harga = '$harga'

          WHERE id_kertas = '$id'
        ");
    if($update){
        echo "data berhasil diubah";
    }else{
        echo "data tidak berhasil diubah";
    }

}

if(isset($_POST["ubahBanner"])){
    
    $id = $_POST["BannerId"];
    $produk = $_POST["ProdukId"];
    $bahan = $_POST["BannerBahan"];
    $ukuran = $_POST["BannerUkuran"];
    $harga = $_POST["BannerHarga"];

    $update = mysqli_query($conn,"UPDATE banner SET 
          nama_produk = '$produk',
          bahan_banner = '$bahan',
          ukuran_banner = '$ukuran',
          harga_banner = '$harga'

          WHERE id_banner = '$id'
        ");
    if($update){
        echo "data berhasil diubah";
    }else{
        echo "data tidak berhasil diubah";
    }

}

if(isset($_POST["tambahPrint"])){
    
    $id = $_POST["IdPrint"];
    $produk = $_POST["IdProduk"];
    $ukuran = $_POST["UkuranPrint"];
    $warna = $_POST["WarnaPrint"];
    $harga = $_POST["HargaPrint"];

    $query = mysqli_query($conn, "SELECT * FROM kertas_print WHERE id_kertasprint = '$id' " );
    $count = mysqli_num_rows($query);
    if ($count == 1) {
        echo "data sudah ada";

    } else {
        $insert = mysqli_query($conn, "INSERT INTO kertas_print VALUES ('$id','$produk','$ukuran','$warna','$harga') " );
        if ($insert) {
            echo 'data berhasil ditambahkan';
            }
        }

}

if(isset($_POST["tambahKertas"])){
    
    $id = $_POST["IdKertas"];
    $produk = $_POST["IdProduk"];
    $ukuran = $_POST["UkuranKertas"];
    $jenis = $_POST["JenisKertas"];
    $harga = $_POST["HargaKertas"];

    $query = mysqli_query($conn, "SELECT * FROM kertas WHERE id_kertas = '$id' " );
    $count = mysqli_num_rows($query);
    if ($count == 1) {
        echo "data sudah ada";

    } else {
        $insert = mysqli_query($conn, "INSERT INTO kertas VALUES ('$id','$produk','$ukuran','$jenis', '$harga') " );
        if ($insert) {
            echo 'data berhasil ditambahkan';
            }
        }

}

if(isset($_POST["tambahBanner"])){
    
    $id = $_POST["IdBanner"];
    $produk = $_POST["IdProduk"];
    $bahan = $_POST["BahanBanner"];
    $ukuran = $_POST["UkuranBanner"];
    $harga = $_POST["HargaBanner"];

    $query = mysqli_query($conn, "SELECT * FROM banner WHERE id_banner = '$id' " );
    $count = mysqli_num_rows($query);
    if ($count == 1) {
        echo "data sudah ada";

    } else {
        $insert = mysqli_query($conn, "INSERT INTO banner VALUES ('$id','$produk','$bahan','$ukuran', '$harga') " );
        if ($insert) {
            echo 'data berhasil ditambahkan';
            }
        }

}

// Table User

if (isset($_POST["user"])) {
    $query = mysqli_query($conn, "SELECT * FROM user" );
    
    echo' <table class="table table-striped table-bordered table-hover"> ';
    echo '                  <thead>
                              <tr>
                                <th>No</th>
                                <th>Username</th>  
                                <th>Password</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Group</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
    ';

    echo '
                            <tbody>';
        while ($row = mysqli_fetch_assoc($query)) { 
        $id = $row["userId"];
        $username = $row["userName"];
        $password = $row["userPass"];
        $nama = $row["userNama"]; 
        $alamat = $row["userAlamat"];
        $email = $row["userEmail"];
        $nohp = $row["userHp"];
        $group = $row["userGroup"];
                            echo '
                              <tr>
                                <td>'.$id.'</td>
                                <td>'.$username.'</td>
                                <td>'.$password.'</td>
                                <td>'.$nama.'</td>
                                <td>'.$alamat.'</td>
                                <td>'.$email.'</td>
                                <td>'.$nohp.'</td>
                                <td>'.$group.'</td>
                                <td>
                                <a class="btn btn-primary btn-sm" href="cetak-user.php?id='.$id.'"
                                role="button"><i class="glyphicon glyphicon-print"></i></a>
                                <button id="hapusU" uid="'.$id.'" class="btn btn-danger btn-sm">
                                  <span class="glyphicon glyphicon-trash"></span> 
                                </button></td>
                              </tr>
                              ';


        }
        
        echo '                  </tbody>

    ';
echo '</table>';

    }

if(isset($_POST["hapusU"])) {
    $id = $_POST["Id"];

        $delete = mysqli_query($conn, "DELETE FROM user WHERE userId = '$id' " );
        if ($delete) {
            echo 'data berhasil dihapus';
            }else{
                echo "data gagal dihapus";
            }   
}

// Table Kertas Print

if (isset($_POST["kertas_print"])) {
    $query = mysqli_query($conn, "SELECT * FROM kertas_print" );
    
 echo' <table class="table table-striped table-bordered table-hover"
        style="text-align: center;"> ';
    echo '                  <thead>
                              <tr>
                                <th>ID</th>
                                <th>Produk</th>
                                <th>Ukuran</th>
                                <th>Warna</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
    ';

    echo '
                            <tbody>';
        while ($row = mysqli_fetch_assoc($query)) {
        $id = $row["id_kertasprint"];
        $produk = $row["nama_produk"];
        $ukuran = $row["ukuran_kertas"];
        $warna = $row["warna_kertas"];
        $harga = $row["harga_kertas"]; 
                            echo '
                              <tr>
                                <td>'.$id.'</td>
                                <td>'.$produk.'</td>
                                <td>'.$ukuran.'</td>
                                <td>'.$warna.'</td>
                                <td>'.$harga.'</td>
                                <td>
                               <a class="btn btn-success btn-sm" href="ubahPrint.php?id='.$id.'"
                                role="button"><i class="glyphicon glyphicon-pencil"></i></a>
                                <button id="hapusKP" kpid="'.$id.'" class="btn btn-danger btn-sm">
                                  <span class="glyphicon glyphicon-trash"></span> 
                                </button></td>
                              </tr>
                              ';

        echo '                  </tbody>

    ';

        }
echo '</table>';

    }

if(isset($_POST["hapusKP"])) {
    $id = $_POST["Id"];

        $delete = mysqli_query($conn, "DELETE FROM kertas_print WHERE id_kertasprint = '$id' " );
        if ($delete) {
            echo 'data berhasil dihapus';
            }else{
                echo "data gagal dihapus";
            }   
}

// Table Kertas

if (isset($_POST["kertas"])) {
    $query = mysqli_query($conn, "SELECT * FROM kertas" );
    
 echo' <table class="table table-striped table-bordered table-hover"
        style="text-align: center;"> ';
    echo '                  <thead>
                              <tr>
                                <th>ID</th>
                                <th>Produk</th>
                                <th>Ukuran</th>
                                <th>Jenis</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
    ';

    echo '
                            <tbody>';
        while ($row = mysqli_fetch_assoc($query)) {
        $id = $row["id_kertas"];
        $produk = $row["nama_produk"];
        $ukuran = $row["ukuran_kertas"];
        $jenis = $row["jenis_kertas"];
        $harga = $row["harga_kertas"]; 
                            echo '
                              <tr>
                                <td>'.$id.'</td>
                                <td>'.$produk.'</td>
                                <td>'.$ukuran.'</td>
                                <td>'.$jenis.'</td>
                                <td>'.$harga.'</td>
                                <td>
                               <a class="btn btn-success btn-sm" href="ubahKertas.php?id='.$id.'"
                                role="button"><i class="glyphicon glyphicon-pencil"></i></a>
                                <button id="hapusK" kid="'.$id.'" class="btn btn-danger btn-sm">
                                  <span class="glyphicon glyphicon-trash"></span> 
                                </button></td>
                              </tr>
                              ';

        echo '                  </tbody>

    ';

        }
echo '</table>';

    }

if(isset($_POST["hapusK"])) {
    $id = $_POST["Id"];

        $delete = mysqli_query($conn, "DELETE FROM kertas WHERE id_kertas = '$id' " );
        if ($delete) {
            echo 'data berhasil dihapus';
            }else{
                echo "data gagal dihapus";
            }   
}

// Table Banner

if (isset($_POST["banner"])) {
    $query = mysqli_query($conn, "SELECT * FROM banner" );
    
 echo' <table class="table table-striped table-bordered table-hover"
        style="text-align: center;"> ';
    echo '                  <thead>
                              <tr>
                                <th>ID</th>
                                <th>Produk</th>
                                <th>Bahan</th>
                                <th>Ukuran</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
    ';

    echo '
                            <tbody>';
        while ($row = mysqli_fetch_assoc($query)) {
        $id = $row["id_banner"];
        $produk = $row["nama_produk"];
        $bahan = $row["bahan_banner"];
        $ukuran = $row["ukuran_banner"];
        $harga = $row["harga_banner"]; 
                            echo '
                              <tr>
                                <td>'.$id.'</td>
                                <td>'.$produk.'</td>
                                <td>'.$bahan.'</td>
                                <td>'.$ukuran.'</td>
                                <td>'.$harga.'</td>
                                <td>
                               <a class="btn btn-success btn-sm" href="ubahBanner.php?id='.$id.'"
                                role="button"><i class="glyphicon glyphicon-pencil"></i></a>
                                <button id="hapusB" bid="'.$id.'" class="btn btn-danger btn-sm">
                                  <span class="glyphicon glyphicon-trash"></span> 
                                </button></td>
                              </tr>
                              ';

        echo '                  </tbody>

    ';

        }
echo '</table>';

    }

if(isset($_POST["hapusB"])) {
	$id = $_POST["Id"];

        $delete = mysqli_query($conn, "DELETE FROM banner WHERE id_banner = '$id' " );
        if ($delete) {
            echo 'data berhasil dihapus';
            }else{
            	echo "data gagal dihapus";
            }	
}


?>
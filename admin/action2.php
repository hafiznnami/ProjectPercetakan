<?php
require "../db.php";
session_start();

if (isset($_POST["print"])) {
    $query = mysqli_query($conn, "SELECT * FROM print" );
    
    echo' <table class="table table-striped table-bordered table-hover"> ';
    echo '                  <thead>
                              <tr>
                                <th>ID</th>
                                <th>Nama User</th>
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
    ';

    echo '
                            <tbody>';
        while ($row = mysqli_fetch_assoc($query)) { 
        $id = $row["id_print"];
        $username = $row["userName"];
        $produk = $row["nama_produk"];
        $nopesanan = $row["pesanan_print"];
        $ukuran = $row["ukuran_print"]; 
        $black = $row["black_print"];
        $color = $row["color_print"];
        $jumlah_sisi = $row["sisi_print"];
        $jilid = $row["jilid_print"];
        $total = $row["harga_print"];
        $file = $row["file_print"];
        $catatan = $row["catatan_print"];
                            echo '
                              <tr>
                                <td>'.$id.'</td>
                                <td>'.$username.'</td>
                                <td>'.$produk.'</td>
                                <td>'.$nopesanan.'</td>
                                <td>'.$ukuran.'</td>
                                <td>'.$black.'</td>
                                <td>'.$color.'</td>
                                <td>'.$jumlah_sisi.'</td>
                                <td>'.$jilid.'</td>
                                <td>'.$total.'</td>
                                <td><a href="doc/'.$file.'" download>Download</a></td>
                                <td>'.$catatan.'</td>
                                <td>
                                <button id="hapusP" pid="'.$id.'" class="btn btn-danger btn-sm">
                                  <span class="glyphicon glyphicon-trash"></span> 
                                </button></td>
                              </tr>
                              ';


        }
        
        echo '                  </tbody>

    ';
echo '</table>';

    }

if(isset($_POST["hapusP"])) {
    $id = $_POST["Id"];

        $delete = mysqli_query($conn, "DELETE FROM print WHERE id_print = '$id' " );
        if ($delete) {
            echo 'data berhasil dihapus';
            }else{
                echo "data gagal dihapus";
            }   
}

if (isset($_POST["brosur"])) {
    $query = mysqli_query($conn, "SELECT * FROM brosur" );
    
    echo' <table class="table table-striped table-bordered table-hover"> ';
    echo '                  <thead>
                              <tr>
                                <th>ID</th>
                                <th>Nama User</th>
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
    ';

    echo '
                            <tbody>';
        while ($row = mysqli_fetch_assoc($query)) { 
        $id = $row["id_brosur"];
        $username = $row["userName"];
        $produk = $row["nama_produk"];
        $nopesanan = $row["pesanan_brosur"];
        $ukuran = $row["ukuran_brosur"]; 
        $jenis = $row["kertas_brosur"];
        $jumlah_sisi = $row["sisi_brosur"];
        $lipatan = $row["lipatan_brosur"];
        $jumlah = $row["jumlah_brosur"];
        $total = $row["harga_brosur"];
        $file1 = $row["file_depan"];
        $file2 = $row["file_belakang"];
        $catatan = $row["catatan_brosur"];
                            echo '
                              <tr>
                                <td>'.$id.'</td>
                                <td>'.$username.'</td>
                                <td>'.$produk.'</td>
                                <td>'.$nopesanan.'</td>
                                <td>'.$ukuran.'</td>
                                <td>'.$jenis.'</td>
                                <td>'.$jumlah_sisi.'</td>
                                <td>'.$lipatan.'</td>
                                <td>'.$jumlah.'</td>
                                <td>'.$total.'</td>
                                <td><a href="img/'.$file1.'" download>Download</a></td>
                                <td><a href="img/'.$file2.'" download>Download</a></td>
                                <td>'.$catatan.'</td>
                                <td>
                                <button id="hapusB" bid="'.$id.'" class="btn btn-danger btn-sm">
                                  <span class="glyphicon glyphicon-trash"></span> 
                                </button></td>
                              </tr>
                              ';


        }
        
        echo '                  </tbody>

    ';
echo '</table>';

    }

if(isset($_POST["hapusB"])) {
    $id = $_POST["Id"];

        $delete = mysqli_query($conn, "DELETE FROM brosur WHERE id_brosur = '$id' " );
        if ($delete) {
            echo 'data berhasil dihapus';
            }else{
                echo "data gagal dihapus";
            }   
}

if (isset($_POST["cetakertas"])) {
    $query = mysqli_query($conn, "SELECT * FROM cetak_kertas" );
    
    echo' <table class="table table-striped table-bordered table-hover"> ';
    echo '                  <thead>
                              <tr>
                                <th>ID</th>
                                <th>Nama User</th> 
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
    ';

    echo '
                            <tbody>';
        while ($row = mysqli_fetch_assoc($query)) { 
        $id = $row["id_cetakertas"];
        $username = $row["userName"];
        $produk = $row["nama_produk"];
        $nopesanan = $row["pesanan_cetakertas"];
        $ukuran = $row["ukuran_cetakertas"]; 
        $jenis = $row["kertas_cetakertas"];
        $jumlah_sisi = $row["sisi_cetakertas"];
        $jumlah = $row["jumlah_cetakertas"];
        $total = $row["harga_cetakertas"];
        $gambar1 = $row["gambar_depan"];
        $gambar2 = $row["gambar_belakang"];
        $catatan = $row["catatan_cetakertas"];
                            echo '
                              <tr>
                                <td>'.$id.'</td>
                                <td>'.$username.'</td>
                                <td>'.$produk.'</td>
                                <td>'.$nopesanan.'</td>
                                <td>'.$ukuran.'</td>
                                <td>'.$jenis.'</td>
                                <td>'.$jumlah_sisi.'</td>
                                <td>'.$jumlah.'</td>
                                <td>'.$total.'</td>
                                <td><a href="img/'.$gambar1.'" download>Download</a></td>
                                <td><a href="img/'.$gambar2.'" download>Download</a></td>
                                <td>'.$catatan.'</td>
                                <td>
                                <button id="hapusCK" ckid="'.$id.'" class="btn btn-danger btn-sm">
                                  <span class="glyphicon glyphicon-trash"></span> 
                                </button></td>
                              </tr>
                              ';


        }
        
        echo '                  </tbody>

    ';
echo '</table>';

    }

if(isset($_POST["hapusCK"])) {
    $id = $_POST["Id"];

        $delete = mysqli_query($conn, "DELETE FROM cetak_kertas WHERE id_cetakertas = '$id' " );
        if ($delete) {
            echo 'data berhasil dihapus';
            }else{
                echo "data gagal dihapus";
            }   
}

if (isset($_POST["cetakbanner"])) {
    $query = mysqli_query($conn, "SELECT * FROM cetak_banner" );
    
    echo' <table class="table table-striped table-bordered table-hover"> ';
    echo '                  <thead>
                              <tr>
                                <th>ID</th>
                                <th>Nama User</th>
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
    ';

    echo '
                            <tbody>';
        while ($row = mysqli_fetch_assoc($query)) { 
        $id = $row["id_cetakbanner"];
        $username = $row["userName"];
        $produk = $row["nama_produk"];
        $nopesanan = $row["pesanan_cetakbanner"];
        $ukuran = $row["ukuran_cetakbanner"];
        $bahan = $row["bahan_cetakbanner"]; 
        $jumlah = $row["jumlah_cetakbanner"];
        $harga = $row["harga_cetakbanner"];
        $file1 = $row["file_satu"];
        $file2 = $row["file_dua"];
        $catatan = $row["catatan_cetakbanner"];
                            echo '
                              <tr>
                                <td>'.$id.'</td>
                                <td>'.$username.'</td>
                                <td>'.$produk.'</td>
                                <td>'.$nopesanan.'</td>
                                <td>'.$ukuran.'</td>
                                <td>'.$bahan.'</td>
                                <td>'.$jumlah.'</td>
                                <td>'.$harga.'</td>
                                <td><a href="img/'.$file1.'" download>Download</a></td>
                                <td><a href="img/'.$file2.'" download>Download</a></td>
                                <td>'.$catatan.'</td>
                                <td>
                                <button id="hapusCB" cbid="'.$id.'" class="btn btn-danger btn-sm">
                                  <span class="glyphicon glyphicon-trash"></span> 
                                </button></td>
                              </tr>
                              ';


        }
        
        echo '                  </tbody>

    ';
echo '</table>';

    }

if(isset($_POST["hapusCB"])) {
    $id = $_POST["Id"];

        $delete = mysqli_query($conn, "DELETE FROM cetak_banner WHERE id_cetakbanner = '$id' " );
        if ($delete) {
            echo 'data berhasil dihapus';
            }else{
                echo "data gagal dihapus";
            }   
}

if (isset($_POST["transaksi"])) {
    $query = mysqli_query($conn, "SELECT * FROM transaksi" );
    
    echo' <table class="table table-striped table-bordered table-hover"> ';
    echo '                  <thead>
                              <tr>
                                <th>ID</th>
                                <th>ID Pesanan</th>  
                                <th>Username</th>
                                <th>Deskripsi Pesanan</th>
                                <th>Tanggal Transaksi</th>
                                <th>Metode Pembayaran</th>
                                <th>Metode Pengiriman</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                                <th>Ubah Status</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
    ';

    echo '
                            <tbody>';
        while ($row = mysqli_fetch_assoc($query)) { 
        $id = $row["id_transaksi"];
        $pesanan = $row["id_pesanan"];
        $username = $row["userName"];
        $desc = $row["desc_pesanan"];
        $tanggal = $row["tgl_transaksi"];
        $pembayaran = $row["metode_transaksi"]; 
        $pengiriman = $row["pengiriman_transaksi"];
        $total = $row["total_transaksi"];
        $status = $row["status_transaksi"];
                            echo '
                              <tr>
                                <td>'.$id.'</td>
                                <td>'.$pesanan.'</td>
                                <td>'.$username.'</td>
                                <td>'.$desc.'</td>
                                <td>'.$tanggal.'</td>
                                <td>'.$pembayaran.'</td>
                                <td>'.$pengiriman.'</td>
                                <td>'.$total.'</td> ';
                                if($status == 1) {
                                    echo '<td><button class="btn btn-success btn-sm" disabled="">Verifikasi</button></td>'; 
                                } else if($status == 2) {
                                    echo '<td><button class="btn btn-warning btn-sm" disabled="">On Process</button></td>';
                                } else if($status == 3) {
                                    echo '<td><button class="btn btn-info btn-sm" disabled="">Delivered</button></td>';
                                }
                    echo'       <td>
                                <button id="statusDua" sdid="'.$id.'" class="btn btn-warning btn-sm">2 </button>
                                <button id="statusTiga" stid="'.$id.'" class="btn btn-info btn-sm">3</button>
                                </td>
                                <td>
                                <a class="btn btn-primary btn-sm" href="cetak-transaksi.php?id='.$id.'"
                                role="button"><i class="glyphicon glyphicon-print"></i></a>
                                <button id="hapusT" tid="'.$id.'" class="btn btn-danger btn-sm">
                                  <span class="glyphicon glyphicon-trash"></span> 
                                </button></td>
                              </tr>
                              ';


        }
        
        echo '                  </tbody>

    ';
echo '</table>';

    }

if(isset($_POST["hapusT"])) {
    $id = $_POST["Id"];

        $delete = mysqli_query($conn, "DELETE FROM transaksi WHERE id_transaksi = '$id' " );
        if ($delete) {
            echo 'data berhasil dihapus';
            }else{
                echo "data gagal dihapus";
            }   
}

if(isset($_POST["statusDua"])){

    $id = $_POST["Id"];

    $update = mysqli_query($conn,"UPDATE transaksi SET 
          status_transaksi = '2'

          WHERE id_transaksi = '$id'
        ");
    if($update){
        echo "data berhasil diubah";
    }else{
        echo "data tidak berhasil diubah";
    }

}

if(isset($_POST["statusTiga"])){

    $id = $_POST["Id"];

    $update = mysqli_query($conn,"UPDATE transaksi SET 
          status_transaksi = '3'

          WHERE id_transaksi = '$id'
        ");
    if($update){
        echo "data berhasil diubah";
    }else{
        echo "data tidak berhasil diubah";
    }

}

if (isset($_POST["pembayaran"])) {
    $query = mysqli_query($conn, "SELECT * FROM pembayaran" );
    
    echo' <table class="table table-striped table-bordered table-hover"> ';
    echo '                  <thead>
                              <tr>
                                <th>ID</th>
                                <th>ID Transaksi</th>  
                                <th>Jumlah Transfer</th>
                                <th>Tanggal Transfer</th>
                                <th>Bukti Transfer</th>
                                <th>Catatan</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
    ';

    echo '
                            <tbody>';
        while ($row = mysqli_fetch_assoc($query)) { 
        $id = $row["id_pembayaran"];
        $transaksi = $row["id_transaksi"];
        $jumlah = $row["jumlah_uang"];
        $tanggal = $row["tanggal_pembayaran"];
        $gambar = $row["gambar_pembayaran"];
        $catatan = $row["catatan_pembayaran"]; 
                            echo '
                              <tr>
                                <td>'.$id.'</td>
                                <td>'.$transaksi.'</td>
                                <td>'.$jumlah.'</td>
                                <td>'.$tanggal.'</td>
                                <td><a href="img/'.$gambar.'" download>Download</a></td>
                                <td>'.$catatan.'</td>
                                <td><a class="btn btn-primary btn-sm" href="cetak-pembayaran.php?id='.$id.'"
                                role="button"><i class="glyphicon glyphicon-print"></i></a>
                                <button id="hapusPP" ppid="'.$id.'" class="btn btn-danger btn-sm">
                                  <span class="glyphicon glyphicon-trash"></span> 
                                </button></td>
                                </td>
                              </tr>
                              ';


        }
        
        echo '                  </tbody>

    ';
echo '</table>';

    }

if(isset($_POST["hapusPP"])) {
    $id = $_POST["Id"];

        $delete = mysqli_query($conn, "DELETE FROM pembayaran WHERE id_pembayaran = '$id' " );
        if ($delete) {
            echo 'data berhasil dihapus';
            }else{
                echo "data gagal dihapus";
            }   
}


if (isset($_POST["produksi"])) {
    $query = mysqli_query($conn, "SELECT * FROM produksi" );
    
    echo' <table class="table table-striped table-bordered table-hover"> ';
    echo '                  <thead>
                              <tr>
                                <th>ID</th>
                                <th>No Pesanan</th>  
                                <th>Tanggal Produksi</th>
                                <th>Tanggal Selesai</th>
                                <th>Catatan Produksi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
    ';

    echo '
                            <tbody>';
        while ($row = mysqli_fetch_assoc($query)) { 
        $id = $row["id_produksi"];
        $pesanan = $row["no_pesanan"];
        $tanggal = $row["tanggal_produksi"];
        $tanggal1 = $row["tanggal_selesai"];
        $catatan = $row["catatan_produksi"];
        $status = $row["status_produksi"];
                            echo '
                              <tr>
                                <td>'.$id.'</td>
                                <td>'.$pesanan.'</td>
                                <td>'.$tanggal.'</td>
                                <td>'.$tanggal1.'</td>
                                <td>'.$catatan.'</td>';
                                if($status == 1) {
                                    echo '<td><button class="btn btn-success btn-sm" disabled="">Dikerjakan</button></td>'; 
                                } else if($status == 2) {
                                    echo '<td><button class="btn btn-info btn-sm" disabled=""> Selesai</button></td>';
                                }
                         echo'  <td>
                                <button id="statusSelesai" ssid="'.$id.'" class="btn btn-info btn-sm">2 </button>
                                </td>
                              </tr>
                              ';


        }
        
        echo '                  </tbody>

    ';
echo '</table>';

    }

if(isset($_POST["tambahProduksi"])){
    
    $id = $_POST["IdProduksi"];
    $pesanan = $_POST["IdPesanan"];
    $tanggal1 = $_POST["Tanggal1"];
    $tanggal2 = $_POST["Tanggal2"];
    $message = $_POST["Message"];
    $status = $_POST["Status"];

    $query = mysqli_query($conn, "SELECT * FROM produksi WHERE id_produksi = '$id' " );
    $count = mysqli_num_rows($query);
    if ($count == 1) {
        echo "data sudah ada";

    } else {
        $insert = mysqli_query($conn, "INSERT INTO produksi VALUES ('$id','$pesanan','$tanggal1','$tanggal2','$message','$status') " );
        if ($insert) {
            echo 'data berhasil ditambahkan';
            }
        }

}

if(isset($_POST["statusSelesai"])){

    $id = $_POST["Id"];

    $update = mysqli_query($conn,"UPDATE produksi SET 
          status_produksi = '2'

          WHERE id_produksi = '$id'
        ");
    if($update){
        echo "data berhasil diubah";
    }else{
        echo "data tidak berhasil diubah";
    }

}

?>
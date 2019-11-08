<?php 
require "db.php";
session_start();


if(isset($_POST["hapusPrint"])) {
    $id = $_POST["Id"];

        $delete = mysqli_query($conn, "DELETE FROM print WHERE id_print = '$id' " );
        if ($delete) {
            echo 'data berhasil dihapus';
            }else{
                echo "data gagal dihapus";
            }   
}



?>
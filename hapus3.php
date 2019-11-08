<?php
require "function3.php";

$id = $_GET["id"];

if(hapusBanner($id) > 0){
      echo " <script>
              alert('Data Berhasil Dihapus');
              document.location.href = 'index.php';
            </script> " ;
      }
      else{
         echo " <script>
              alert('Data Gagal Dihapus');
              document.location.href = 'index.php';
            </script> " ;
      }


?>
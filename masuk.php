<?php
require "db.php";
session_start();

if(isset($_POST["masuk"])){
  
    $username = mysqli_escape_string($conn,$_POST["Username"]);
    $password = $_POST["Password"];
    $sql = "SELECT * FROM user WHERE userName = '$username'";
    $run_query = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($run_query);
    if($count == 1){
     $row = mysqli_fetch_assoc($run_query);
     if($row["userGroup"] == 1){
         if($row["userPass"] == $password){
             echo 1;
             $_SESSION["admin"] = $row["userName"];
             }

             else {
                 echo '<div class="alert alert-danger">
                          <p>Password Salah</p>
                    </div>';
             }
         }else if($row["userGroup"] == 2){
            if($row["userPass"] == $password){
             echo 2;
             $_SESSION["user"] = $row["userName"];
            }

             else {
                 echo '<div class="alert alert-danger">
                          <p>Password Salah</p>
                    </div>';
            }
         }
    
     

    }else {
        echo '<div class="alert alert-danger">
          <p>User Tidak Ditemukan</p>
        </div>';
    }
  
}



?>
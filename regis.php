<?php
require "db.php";

if(isset($_POST["regis"])) {


  $username = htmlspecialchars($_POST["Username"]);
  $password = htmlspecialchars($_POST["Password"]);
  $password1 = htmlspecialchars($_POST["Password1"]);
  $nama = htmlspecialchars($_POST["Nama"]);
  $alamat = htmlspecialchars($_POST["Alamat"]);
  $email = htmlspecialchars($_POST["Email"]);
  $nohp = htmlspecialchars($_POST["Nohp"]);
  $group = htmlspecialchars($_POST["Group"]);
  

  $emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";



if($username == "" || $password == "" || $password1 == "" || $nama == "" || $alamat == "" || $email == "" || $nohp == ""){
  echo "
      <div class='alert alert-danger'>
    <a href='' class='close' data-dismiss = 'alert' aria-label='close'>&times;</a><b>Ada Field Yang Kosong</b>
    </div>

  ";
  exit(); 
}

if(!preg_match($emailValidation,$email)){
  echo "
      <div class='alert alert-danger' >
    <a href='' class='close' data-dismiss = 'alert' aria-label='close'>&times;</a><b>Alamat Email Tidak Cocok dengan Alamat Email pada umumnya</b>
    </div>

  ";
  exit();
}

if(strlen($password) < 6){
  echo "
      <div class='alert alert-danger' >
    <a href='' class='close' data-dismiss = 'alert' aria-label='close'>&times;</a><b>Password Weak</b>
    </div>

  ";
  exit();
}

if(strlen($password1) < 6){
  echo "
      <div class='alert alert-danger' >
    <a href='' class='close' data-dismiss = 'alert' aria-label='close'>&times;</a><b>Password Weak</b>
    </div>

  ";
  exit();
}

if($password != $password1){
  echo "
      <div class='alert alert-danger' >
    <a href='' class='close' data-dismiss = 'alert' aria-label='close'>&times;</a><b>Password Tidak  Cocok</b>
    </div>

  ";
  exit();
}

// cek email & cek username
   $query = mysqli_query($conn,"SELECT * FROM user WHERE userEmail = '$email'");
   $count = mysqli_num_rows($query);
   $query2 = mysqli_query($conn,"SELECT * FROM user WHERE userName = '$username'");
   $count2 = mysqli_num_rows($query2);
   if($count > 0){
        echo " <div class='alert alert-danger' >
    <a href='' class='close' data-dismiss = 'alert' aria-label='close'>&times;</a><b>Alamat Email Sudah Ada</b>
     </div>";

     exit();
   }else if($count2 > 0){
      echo " <div class='alert alert-danger' >
    <a href='' class='close' data-dismiss = 'alert' aria-label='close'>&times;</a><b>Username Sudah Ada</b>
     </div>";

     exit();
   }
   else{
     // $password_hash  = password_hash($password,PASSWORD_DEFAULT);
     $insert = mysqli_query($conn,"INSERT INTO `user` (`userId`, `userName`, `userPass`, `userNama`, `userAlamat`, `userEmail`, `userHp`, `userGroup`) VALUES (NULL, '$username', '$password', '$nama', '$alamat', '$alamat', '$nohp', '$group')");
    if($insert){

    echo " <div class='alert alert-success'>
      <a href='' class='close' data-dismiss = 'alert' aria-label='close'>&times;</a><b>Selamat Akun Anda Sudah Terdaftar </b>
       </div>";
      }

   }

}

?>
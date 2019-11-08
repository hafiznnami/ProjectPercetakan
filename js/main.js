$(document).ready(function() {


	$("body").delegate("#daftar","click",function(event){
		event.preventDefault();
		var username = $("#inputUsername").val();
		var password = $("#inputPassword").val();
		var nama = $("#inputNama").val();
		var alamat = $("#inputAlamat").val();
		var email = $("#inputEmail").val();
		var nohp = $("#inputHp").val();
		var group = $("#inputGroup").val();
		$.ajax({
         url    : "regis.php",
         method : "POST",
         data   : {regis:1,Username:username,Password:password,Nama:nama,Alamat:alamat,Email:email,Nohp:nohp,Group:group}, 
         success : function(data){
              $("#pesanRegis").html(data);         
          }
         })
	})

	$("body").delegate("#login","click",function(event){
		event.preventDefault();
		var username = $("#inputUsername1").val();
		var password = $("#inputPassword1").val();
		$.ajax({
         url    : "masuk.php",
         method : "POST",
         data   : {masuk:1,Username:username,Password:password}, 
         success : function(data){
              if(data == 1) {
				 window.location.href = "admin/index.php";
				} else if(data == 2){
				 window.location.href = "index.php";
				}
				 else {
				 alert('password anda salah');
				 }         
          }
         })
	})

	$("#buttonpanel1").click(function(){

  	})


})
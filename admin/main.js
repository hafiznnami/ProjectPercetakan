$(document).ready(function(){

user();
function user() {
	$.ajax ({
		url : "action.php",
		method : "POST",
		data : {user:1},
		success : function(data) {
			$("#user").html(data);
		}
	})
}

banner();
function banner() {
	$.ajax ({
		url : "action.php",
		method : "POST",
		data : {banner:1},
		success : function(data) {
			$("#banner").html(data);
		}
	})
}

kertas();
function kertas() {
	$.ajax ({
		url : "action.php",
		method : "POST",
		data : {kertas:1},
		success : function(data) {
			$("#kertas").html(data);
		}
	})
}

kertas_print();
function kertas_print() {
	$.ajax ({
		url : "action.php",
		method : "POST",
		data : {kertas_print:1},
		success : function(data) {
			$("#kertas_print").html(data);
		}
	})
}

$("body").delegate("#hapusU","click",function(event){
		event.preventDefault();
		var id = $(this).attr("uid");
		if(confirm('kamu yakin ingin menghapus ini?')){
			$.ajax ({
			url : "action.php",
			method : "POST",
			data : {hapusU:1, Id:id},
			success : function(data) {
				 window.location.href = "";
			}
		})
		}
	})

$("body").delegate("#hapusKP","click",function(event){
		event.preventDefault();
		var id = $(this).attr("kpid");
		if(confirm('kamu yakin ingin menghapus ini?')){
			$.ajax ({
			url : "action.php",
			method : "POST",
			data : {hapusKP:1, Id:id},
			success : function(data) {
				 window.location.href = "";
			}
		})
		}
	})

$("body").delegate("#ubahPrint","click",function(event){
	event.preventDefault();
	var printId = $("#printId").val();
	var produkId = $("#produkId").val();
	var printUkuran = $("#printUkuran").val();
	var printWarna = $("#printWarna").val();
	var printHarga = $("#printHarga").val();
		$.ajax ({
		url : "action.php",
		method : "POST",
		data : {ubahPrint:1, PrintId:printId, ProdukId:produkId, 
			PrintUkuran:printUkuran, PrintWarna:printWarna, PrintHarga:printHarga},
		success : function(data) {
		// $("#ubah").html(data);
		alert(data);
		}
	})

})

("body").delegate("#tambahPrint","click",function(event){
	event.preventDefault();
	var idPrint = $("#idPrint").val();
	var idProduk = $("#idProduk").val();
	var ukuranPrint = $("#ukuranPrint").val();
	var warnaPrint = $("#warnaPrint").val();
	var hargaPrint = $("#hargaPrint").val();
		$.ajax ({
		url : "action.php",
		method : "POST",
		data : {tambahPrint:1, IdPrint:idPrint, IdProduk:idProduk, 
			UkuranPrint:ukuranPrint, WarnaPrint:warnaPrint, HargaPrint:hargaPrint},
		success : function(data) {
		alert(data);
		}
	})

})

$("body").delegate("#hapusK","click",function(event){
		event.preventDefault();
		var id = $(this).attr("kid");
		if(confirm('kamu yakin ingin menghapus ini?')){
			$.ajax ({
			url : "action.php",
			method : "POST",
			data : {hapusK:1, Id:id},
			success : function(data) {
				 window.location.href = "";
			}
		})
		}
	})

$("body").delegate("#ubahKertas","click",function(event){
	event.preventDefault();
	var kertasId = $("#kertasId").val();
	var produkId = $("#produkId").val();
	var kertasUkuran = $("#kertasUkuran").val();
	var kertasJenis = $("#kertasJenis").val();
	var kertasHarga = $("#kertasHarga").val();
		$.ajax ({
		url : "action.php",
		method : "POST",
		data : {ubahKertas:1, KertasId:kertasId, ProdukId:produkId, 
				KertasUkuran:kertasUkuran, KertasJenis:kertasJenis, KertasHarga:kertasHarga},
		success : function(data) {
		// $("#ubah").html(data);
		alert(data);
		}
	})

})

$("body").delegate("#tambahKertas","click",function(event){
	event.preventDefault();
	var idKertas = $("#idKertas").val();
	var idProduk = $("#idProduk").val();
	var ukuranKertas = $("#ukuranKertas").val();
	var jenisKertas = $("#jenisKertas").val();
	var hargaKertas = $("#hargaKertas").val();
		$.ajax ({
		url : "action.php",
		method : "POST",
		data : {tambahKertas:1, IdKertas:idKertas, IdProduk:idProduk, 
				UkuranKertas:ukuranKertas, JenisKertas:jenisKertas, HargaKertas:hargaKertas},
		success : function(data) {
		alert(data);
		}
	})
})

$("body").delegate("#hapusB","click",function(event){
		event.preventDefault();
		var id = $(this).attr("bid");
		if(confirm('kamu yakin ingin menghapus ini?')){
			$.ajax ({
			url : "action.php",
			method : "POST",
			data : {hapusB:1, Id:id},
			success : function(data) {
				 window.location.href = "";
			}
		})
		}
	})

$("body").delegate("#ubahBanner","click",function(event){
	event.preventDefault();
	var bannerId = $("#bannerId").val();
	var produkId = $("#produkId").val();
	var bannerBahan = $("#bannerBahan").val();
	var bannerUkuran = $("#bannerUkuran").val();
	var bannerHarga = $("#bannerHarga").val();
		$.ajax ({
		url : "action.php",
		method : "POST",
		data : {ubahBanner:1, BannerId:bannerId, ProdukId:produkId, 
				BannerBahan:bannerBahan, BannerUkuran:bannerUkuran, BannerHarga:bannerHarga},
		success : function(data) {
		// $("#ubah").html(data);
		alert(data);
		}
	})

})

$("body").delegate("#tambahBanner","click",function(event){
	event.preventDefault();
	var idBanner = $("#idBanner").val();
	var idProduk = $("#idProduk").val();
	var bahanBanner = $("#bahanBanner").val();
	var ukuranBanner = $("#ukuranBanner").val();
	var hargaBanner = $("#hargaBanner").val();
		$.ajax ({
		url : "action.php",
		method : "POST",
		data : {tambahBanner:1, IdBanner:idBanner, IdProduk:idProduk, 
				BahanBanner:bahanBanner, UkuranBanner:ukuranBanner, HargaBanner:hargaBanner},
		success : function(data) {
		alert(data);
		}
	})
})


})


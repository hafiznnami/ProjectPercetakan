$(document).ready(function(){

print();
function print() {
	$.ajax ({
		url : "action2.php",
		method : "POST",
		data : {print:1},
		success : function(data) {
			$("#print").html(data);
		}
	})
}

brosur();
function brosur() {
	$.ajax ({
		url : "action2.php",
		method : "POST",
		data : {brosur:1},
		success : function(data) {
			$("#brosur").html(data);
		}
	})
}

cetakertas();
function cetakertas() {
	$.ajax ({
		url : "action2.php",
		method : "POST",
		data : {cetakertas:1},
		success : function(data) {
			$("#cetakertas").html(data);
		}
	})
}

cetakbanner();
function cetakbanner() {
	$.ajax ({
		url : "action2.php",
		method : "POST",
		data : {cetakbanner:1},
		success : function(data) {
			$("#cetakbanner").html(data);
		}
	})
}

transaksi();
function transaksi() {
	$.ajax ({
		url : "action2.php",
		method : "POST",
		data : {transaksi:1},
		success : function(data) {
			$("#transaksi").html(data);
		}
	})
}

pembayaran();
function pembayaran() {
	$.ajax ({
		url : "action2.php",
		method : "POST",
		data : {pembayaran:1},
		success : function(data) {
			$("#pembayaran").html(data);
		}
	})
}

produksi();
function produksi() {
	$.ajax ({
		url : "action2.php",
		method : "POST",
		data : {produksi:1},
		success : function(data) {
			$("#produksi").html(data);
		}
	})
}

$("body").delegate("#hapusP","click",function(event){
		event.preventDefault();
		var id = $(this).attr("pid");
		if(confirm('kamu yakin ingin menghapus ini?')){
			$.ajax ({
			url : "action2.php",
			method : "POST",
			data : {hapusP:1, Id:id},
			success : function(data) {
				 window.location.href = "";
			}
		})
		}
	})

$("body").delegate("#hapusB","click",function(event){
		event.preventDefault();
		var id = $(this).attr("bid");
		if(confirm('kamu yakin ingin menghapus ini?')){
			$.ajax ({
			url : "action2.php",
			method : "POST",
			data : {hapusB:1, Id:id},
			success : function(data) {
				 window.location.href = "";
			}
		})
		}
	})

$("body").delegate("#hapusCK","click",function(event){
		event.preventDefault();
		var id = $(this).attr("ckid");
		if(confirm('kamu yakin ingin menghapus ini?')){
			$.ajax ({
			url : "action2.php",
			method : "POST",
			data : {hapusCK:1, Id:id},
			success : function(data) {
				 window.location.href = "";
			}
		})
		}
	})

$("body").delegate("#hapusCB","click",function(event){
		event.preventDefault();
		var id = $(this).attr("cbid");
		if(confirm('kamu yakin ingin menghapus ini?')){
			$.ajax ({
			url : "action2.php",
			method : "POST",
			data : {hapusCB:1, Id:id},
			success : function(data) {
				 window.location.href = "";
			}
		})
		}
	})

$("body").delegate("#hapusT","click",function(event){
		event.preventDefault();
		var id = $(this).attr("tid");
		if(confirm('kamu yakin ingin menghapus ini?')){
			$.ajax ({
			url : "action2.php",
			method : "POST",
			data : {hapusT:1, Id:id},
			success : function(data) {
				 window.location.href = "";
			}
		})
		}
	})

$("body").delegate("#hapusPP","click",function(event){
		event.preventDefault();
		var id = $(this).attr("ppid");
		if(confirm('kamu yakin ingin menghapus ini?')){
			$.ajax ({
			url : "action2.php",
			method : "POST",
			data : {hapusPP:1, Id:id},
			success : function(data) {
				 window.location.href = "";
			}
		})
		}
	})

$("body").delegate("#statusDua","click",function(event){
		event.preventDefault();
		var id = $(this).attr("sdid");
		if(confirm('kamu yakin ingin mengubah statusnya?')){
			$.ajax ({
			url : "action2.php",
			method : "POST",
			data : {statusDua:1, Id:id},
			success : function(data) {
				 window.location.href = "";
			}
		})
		}
	})

$("body").delegate("#statusTiga","click",function(event){
		event.preventDefault();
		var id = $(this).attr("stid");
		if(confirm('kamu yakin ingin mengubah statusnya?')){
			$.ajax ({
			url : "action2.php",
			method : "POST",
			data : {statusTiga:1, Id:id},
			success : function(data) {
				 window.location.href = "";
			}
		})
		}
	})

$("body").delegate("#statusSelesai","click",function(event){
		event.preventDefault();
		var id = $(this).attr("ssid");
		if(confirm('kamu yakin ingin mengubah statusnya?')){
			$.ajax ({
			url : "action2.php",
			method : "POST",
			data : {statusSelesai:1, Id:id},
			success : function(data) {
				 window.location.href = "";
			}
		})
		}
	})

$("body").delegate("#tambahProduksi","click",function(event){
	event.preventDefault();
	var idProduksi = $("#inputProduksi").val();
	var idPesanan = $("#inputPesanan").val();
	var tanggal1 = $("#tanggal1").val();
	var tanggal2 = $("#tanggal2").val();
	var message = $("#inputPesan").val();
	var status = $("#status").val();
		$.ajax ({
		url : "action2.php",
		method : "POST",
		data : {tambahProduksi:1, IdProduksi:idProduksi, IdPesanan:idPesanan, Tanggal1:tanggal1,
			Tanggal2:tanggal2, Message:message, Status:status},
		success : function(data) {
		alert(data);
		}
	})
})

})
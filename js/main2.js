$(document).ready(function(){

	$("body").delegate("#cekTotal","click",function(event){
		event.preventDefault();
		var hargaKertasA4 = $("#kertasA4").val();
		var hargaKertasA3= $("#kertasA3").val();
		var color = $("#inputColor").val();
        var jilid = $("#inputJilid").val();
		var bw = $("#inputBw").val();
		var sisi = $("#inputPrintSide").val();
		var total = $("#inputHarga").val();

			 if(hargaKertasA4 == 250){
			 	if(sisi == 1){
			 		if(bw > 0 ){
			 			hasilColor = 500 * color;
			 			hasilBw = 250 * bw;
			 			 jumlah = hasilBw + hasilColor;
			 			 hitung = parseInt(jumlah) + parseInt(jilid);
			 		}else if(color > 0){
			 			hasilBw = 250 * bw;
			 			hasilColor = 500 * color;
			 			 jumlah = hasilColor + hasilBw;
			 			 hitung = parseInt(jumlah) + parseInt(jilid);
			 		}
			 }else if(sisi == 2){
					if(bw > 0){
					 	hasilColor = 1000 * color;
					 	hasilBw = 500 * bw;
					 	 jumlah = hasilBw + hasilColor;
			 			 hitung = parseInt(jumlah) + parseInt(jilid);
					}else if(color > 0){
					 	hasilBw = 500 * bw;
					 	hasilColor = 1000 * color;
					 	 jumlah = hasilColor + hasilBw;
			 			 hitung = parseInt(jumlah) + parseInt(jilid);
					 }
			}else if(hargaKertasA3 == 2000){
				if(sisi == 1){
					if(bw > 0){
						hasilColor = 3000 * color;
					 	hasilBw = 2000 * bw;
					 	 jumlah = hasilBw + hasilColor;
			 			 hitung = parseInt(jumlah) + parseInt(jilid);
					}else if(color > 0){
						hasilBw = 2000 * bw;
					 	hasilColor = 3000 * color;
					 	 jumlah = hasilColor + hasilBw;
			 			 hitung = parseInt(jumlah) + parseInt(jilid);
					}
				}else if(sisi == 2){
					if(bw > 0){
					 	hasilColor = 5000 * color;
					 	hasilBw = 3000 * bw;
					 	 jumlah = hasilBw + hasilColor;
			 			 hitung = parseInt(jumlah) + parseInt(jilid);
					}else if(color > 0){
					 	hasilBw = 3000 * bw;
					 	hasilColor = 5000 * color;
					 	 jumlah = hasilColor + hasilBw;
			 			 hitung = parseInt(jumlah) + parseInt(jilid);
					 }
				}	 	
			}
		}
		 	
           
           $("#inputHarga").val(hitung);
        
		  // var pid = $(this).attr("pid");
		   // var qty = $("#qty-"+pid).val();
		   // var price = $("#price-"+pid).val();
		   // var total = qty * price;
		   // 	$("#total-"+pid).val(total);
	})


	$("body").delegate("#cekHarga","click",function(event){
		event.preventDefault(event);
		var ukurankertas = $("#inputUkuran").val();
        var jenisUkuranKertas = $("#inputJenisKertas").val();
        var inputJumlahSisi = $("#inputJumlahSisi").val();
        var inputJumlahLipatan = $("#inputLipatan").val();
        var inputJumlah = $("#inputJumlah").val();
  
			 if(ukurankertas == 'Kertas A4'){
			       if(jenisUkuranKertas == 'Art Paper 120 GSM'){
			       	 if(inputJumlahSisi == 1){
                          hitung = 4000 * inputJumlah;
			       	 }else if(inputJumlahSisi == 2){
                          hitung = 4500 * inputJumlah;
                         
			       	 }        
			       }else if(jenisUkuranKertas == 'Art Paper 150 GSM'){
                      if(inputJumlahSisi == 1){
                          hitung = 4250 * inputJumlah;
			       	 }else if(inputJumlahSisi == 2){
                          hitung = 5000 * inputJumlah;
                         
			       	 }
			       }
			 	}else if(ukurankertas == 'Kertas A3'){
                    if(jenisUkuranKertas == 'Art Paper 120 GSM'){
			       	 if(inputJumlahSisi == 1){
                          hitung = 6000 * inputJumlah;
			       	 }else if(inputJumlahSisi == 2){
                          hitung = 7000 * inputJumlah;
                         
			       	 }        
			       }else if(jenisUkuranKertas == 'Art Paper 150 GSM'){
                      if(inputJumlahSisi == 1){
                          hitung = 7000 * inputJumlah;
			       	 }else if(inputJumlahSisi == 2){
                          hitung = 8000 * inputJumlah;
                         
			       	 }
			       }
			 	}
           $("#inputHarga").val(hitung);
	})

	$("body").delegate("#cekHarga1","click",function(event){
		event.preventDefault(event);
		var ukurankertas = $("#inputUkuran").val();
        var jenisUkuranKertas = $("#inputJenisKertas").val();
        var inputJumlahSisi = $("#inputJumlahSisi").val();
        var inputJumlah = $("#inputJumlah").val();
  
			 if(ukurankertas == 'Kertas A4'){
			       if(jenisUkuranKertas == 'Art Paper 120 GSM'){
			       	 if(inputJumlahSisi == 1){
                          hitung = 4000 * inputJumlah;
			       	 }else if(inputJumlahSisi == 2){
                          hitung = 4500 * inputJumlah;
                         
			       	 }        
			       }else if(jenisUkuranKertas == 'Art Paper 150 GSM'){
                      if(inputJumlahSisi == 1){
                          hitung = 4250 * inputJumlah;
			       	 }else if(inputJumlahSisi == 2){
                          hitung = 4750 * inputJumlah;
                         
			       	 }
			       }
			 	}else if(ukurankertas == 'Kertas A5'){
                    if(jenisUkuranKertas == 'Art Paper 120 GSM'){
			       	 if(inputJumlahSisi == 1){
                          hitung = 2400 * inputJumlah;
			       	 }else if(inputJumlahSisi == 2){
                          hitung = 2700 * inputJumlah;
                         
			       	 }        
			       }else if(jenisUkuranKertas == 'Art Paper 150 GSM'){
                      if(inputJumlahSisi == 1){
                          hitung = 2750 * inputJumlah;
			       	 }else if(inputJumlahSisi == 2){
                          hitung = 3000 * inputJumlah;
                         
			       	 }
			       }
			 	}else if(ukurankertas == 'Kertas A6'){
                    if(jenisUkuranKertas == 'Art Paper 120 GSM'){
			       	 if(inputJumlahSisi == 1){
                          hitung = 1700 * inputJumlah;
			       	 }else if(inputJumlahSisi == 2){
                          hitung = 1900 * inputJumlah;
                         
			       	 }        
			       }else if(jenisUkuranKertas == 'Art Paper 150 GSM'){
                      if(inputJumlahSisi == 1){
                          hitung = 2000 * inputJumlah;
			       	 }else if(inputJumlahSisi == 2){
                          hitung = 2200 * inputJumlah;
                         
			       	 }
			       }
			 	}
           $("#inputHarga").val(hitung);

	})

	$("body").delegate("#cekHarga2","click",function(event){
		event.preventDefault(event);
		var ukurankertas = $("#inputUkuran").val();
        var jenisUkuranKertas = $("#inputJenisKertas").val();
        var inputJumlahSisi = $("#inputJumlahSisi").val();
        var inputJumlah = $("#inputJumlah").val();
  
			 if(ukurankertas == 'Kertas A4'){
			       if(jenisUkuranKertas == 'Art Paper 150 GSM'){
			       	 if(inputJumlahSisi == 1){
                          hitung = 4250 * inputJumlah;
			       	 }else if(inputJumlahSisi == 2){
                          hitung = 5000 * inputJumlah;
                         
			       	 }        
			       }else if(jenisUkuranKertas == 'Art Cartoon 260 GSM'){
                      if(inputJumlahSisi == 1){
                          hitung = 5000 * inputJumlah;
			       	 }else if(inputJumlahSisi == 2){
                          hitung = 5750 * inputJumlah;
                         
			       	 }
			       }
			 	}else if(ukurankertas == 'Kertas A3'){
                    if(jenisUkuranKertas == 'Art Paper 150 GSM'){
			       	 if(inputJumlahSisi == 1){
                          hitung = 6500 * inputJumlah;
			       	 }else if(inputJumlahSisi == 2){
                          hitung = 7500 * inputJumlah;
                         
			       	 }        
			       }else if(jenisUkuranKertas == 'Art Cartoon 260 GSM'){
                      if(inputJumlahSisi == 1){
                          hitung = 7500 * inputJumlah;
			       	 }else if(inputJumlahSisi == 2){
                          hitung = 8500 * inputJumlah;
                         
			       	 }
			       }
			 	}
           $("#inputHarga").val(hitung);
	})

	$("body").delegate("#cekHarga4","click",function(event){
		event.preventDefault(event);
		var ukuranBanner = $("#inputUkuran").val();
        var inputJumlah = $("#inputJumlah").val();

        	if(ukuranBanner == 16500) {
        		hitung = ukuranBanner * inputJumlah;
        	}else if(ukuranBanner == 24750) {
        		hitung = ukuranBanner * inputJumlah; 
        	}else if(ukuranBanner == 33000) {
        		hitung = ukuranBanner * inputJumlah;
        	}else if(ukuranBanner == 49500) {
        		hitung = ukuranBanner * inputJumlah;
        	}else if(ukuranBanner == 66000) {
        		hitung = ukuranBanner * inputJumlah;
        	}else if(ukuranBanner == 82500) {
        		hitung = ukuranBanner * inputJumlah;
        	}

           $("#inputHarga").val(hitung);
	})

		$("body").delegate("#cekHarga5","click",function(event){
		event.preventDefault(event);
		var ukuranBanner = $("#inputUkuran").val();
        var inputJumlah = $("#inputJumlah").val();
  
        	if(ukuranBanner == 75000) {
        		hitung = ukuranBanner * inputJumlah;
        	}else if(ukuranBanner == 100000) {
        		hitung = ukuranBanner * inputJumlah; 
        	}

           $("#inputHarga").val(hitung);
	})


})
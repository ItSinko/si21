<?php 
$con = mysqli_connect("localhost","root","","kontrol_db");

$nolkppacc_on = $_GET['nolkppacc_on'];
$data = mysqli_query($con,"SELECT   * ,harga_on * jumlah_on as total
		
								   ,(harga_on * jumlah_on) * diskonacc_on / 100 as disfakturbeli							   
								   ,(harga_on * jumlah_on) - ((harga_on * jumlah_on) * diskonacc_on / 100)  as totalfaktur
								   ,((harga_on * jumlah_on) - ((harga_on * jumlah_on) * diskonacc_on / 100)) / 1.1 as dppfaktur
								   ,(((harga_on * jumlah_on) - ((harga_on * jumlah_on) * diskonacc_on / 100)) / 1.1) * 0.1 as ppnfaktur
								   ,SUM(nilai) as kirim
								    ,((harga_on * jumlah_on) - ((harga_on * jumlah_on) * diskonacc_on / 100)) + SUM(nilai) + biayapeti_on as totpiu
									
								FROM acc_on											
      											INNER JOIN gudang_on ON gudang_on.nolkppgdg_on = acc_on.nolkppacc_on
												INNER JOIN spa_on ON spa_on.nolkpp_on = acc_on.nolkppacc_on
												INNER JOIN ongkirdb_on ON ongkirdb_on.nolkppkirfk_on = acc_on.nolkppacc_on
												INNER JOIN distributor ON distributor.iddsb = acc_on.pabrikacc_on
												INNER JOIN produk_master ON produk_master.id_prod = acc_on.idprodacc_on           
											
											 WHERE nolkppacc_on='$nolkppacc_on' ");
											 
while ($accspa = mysqli_fetch_array($data)) {

?>

<!DOCTYPE html>
<html>
<head>
<title>Ubah Data</title>
</head>
<style>

													
.ab{

	position: absolute;
	top: 370px;
    left: 192px;
	}


					/*Untuk form 9 */
input[id=nolkpp]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 90px;
    left: 190px;
	}
	
						/*Untuk form 9 */
input[id=noaks]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 140px;
    left: 190px;
	}
	
		
						/*Untuk form 9 */
input[id=nosj]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 190px;
    left: 190px;
	}
	
							/*Untuk form 9 */
input[id=ref]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 90px;
    left: 600px;
	}


									/*Untuk form 9 */
input[id=noinv]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 440px;
    left: 190px;
	}
										/*Untuk form 9 */
textarea[id=nama]{
    width: 15.8%;
	height: 6.5%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 290px;
    left: 190px;
	}
											/*Untuk form 9 */
input[id=harga]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  340px;
    left: 190px;
	}
	
												/*Untuk form 9 */
input[id=jumlah]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  390px;
    left:190px;
	}
	
		
												/*Untuk form 9 */
input[id=total]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  440px;
    left: 190px;
	}
													/*Untuk form 9 */
textarea[id=dsb]{
    width: 15.8%;
	height: 6.5%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  230px;
    left:600px;
	}
	
														/*Untuk form 9 */
input[id=tarif]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  280px;
    left: 600px;
	}
	
															/*Untuk form 9 */
input[id=diskon]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  330px;
    left:600px;
	}
		
															/*Untuk form 9 */
input[id=totalfp]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  420px;
    left:600px;
	}
	
																/*Untuk form 9 */
input[id=dppfp]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  470px;
    left: 600px;
	}
																/*Untuk form 9 */
input[id=ppnfp]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  520px;
    left: 600px;
	}
																/*Untuk form 9 */
input[id=eks]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  90px;
    left: 1000px;
	}
	
																	/*Untuk form 9 */
input[id=peti]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  140px;
    left: 1000px;
	}
	
																		/*Untuk form 9 */
input[id=piutang]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  230px;
    left: 1000px;
	}
		
																		/*Untuk form 9 */
input[id=term]{
    width: 5.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  280px;
    left: 1000px;
	}

		
																			/*Untuk form 9 */
select[id=kas]{
    width: 10.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  415px;
    left: 1000px;
	}
	
	 .nolkpp{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 110px;
    left:90px;
   }  
   
    .noaks{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 160px;
    left:90px;
   } 

 .nosj{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 210px;
    left:90px;
   }   
    .noref{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 110px;
    left:490px;
   }   
   
    .noefak{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 160px;
    left:490px;
   } 

   
       .nambrg{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 310px;
    left:90px;
   } 
   
          .hargabrg{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 360px;
    left:90px;
   } 
   
      .jumlah{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 410px;
    left:90px;
   
   } 
   
   
      .totalhrg{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 460px;
    left:90px;
   } 
   
   
      .dsb{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 255px;
    left:480px;
   } 
   
     .tarif {
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 300px;
    left:480px;
   } 
   
     .diskon{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 350px;
    left:480px;
   } 
   
   
   .fp{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 440px;
    left:490px;
   } 
   
    .dppfp{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 490px;
    left:490px;
   } 
    .ppnfp{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 540px;
    left:490px;
   } 
   
   .biayaeks{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 100px;
    left:900px;
   }
    .biayapeti{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 160px;
    left:900px;
   }
   
      .totalpiu{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 240px;
    left:900px;
   }
     .term{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 290px;
    left:900px;
   }
    
    .kas{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 440px;
    left:900px;
   }
   
   
       .tgllunas{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 350px;
    left:900px;
   }
   
   
      
       .ket{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 540px;
    left:900px;
	
   }
   
   
   
   
   
   
   .form-style-4 fieldset{
	border-radius: 10px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	margin: 0px 0px 10px 0px;
	border: 1px solid #FFD2D2;

	width:24%;
	height:25%;
	position: absolute;
	top: 80px;
    left:70px;
	background: #FFF4F4;
	box-shadow: inset 0px 0px 15px #FFE5E5;
	-moz-box-shadow: inset 0px 0px 15px #FFE5E5;
	-webkit-box-shadow: inset 0px 0px 15px #FFE5E5;
}

.form-style-4 fieldset legend{
	color: #00000;
	border-top: 1px solid #FFD2D2;
	border-left: 1px solid #FFD2D2;
	border-right: 1px solid #FFD2D2;
	border-radius: 5px 5px 0px 0px;
	-webkit-border-radius: 5px 5px 0px 0px;
	-moz-border-radius: 5px 5px 0px 0px;
	background: #FFF4F4;
	padding: 0px 8px 3px 8px;
	box-shadow: -0px -1px 2px #F1F1F1;
	-moz-box-shadow:-0px -1px 2px #F1F1F1;
	-webkit-box-shadow:-0px -1px 2px #F1F1F1;
	font-weight: normal;
	font-size: 12px;
}


 
   .form-style-5 fieldset{
	border-radius: 10px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	margin: 0px 0px 10px 0px;
	border: 1px solid #FFD2D2;

	width:24%;
	height:33%;
	position: absolute;
	top: 280px;
    left:70px;
	background: #FFF4F4;
	box-shadow: inset 0px 0px 15px #FFE5E5;
	-moz-box-shadow: inset 0px 0px 15px #FFE5E5;
	-webkit-box-shadow: inset 0px 0px 15px #FFE5E5;
}

.form-style-5 fieldset legend{
	color: #00000;
	border-top: 1px solid #FFD2D2;
	border-left: 1px solid #FFD2D2;
	border-right: 1px solid #FFD2D2;
	border-radius: 5px 5px 0px 0px;
	-webkit-border-radius: 5px 5px 0px 0px;
	-moz-border-radius: 5px 5px 0px 0px;
	background: #FFF4F4;
	padding: 0px 8px 3px 8px;
	box-shadow: -0px -1px 2px #F1F1F1;
	-moz-box-shadow:-0px -1px 2px #F1F1F1;
	-webkit-box-shadow:-0px -1px 2px #F1F1F1;
	font-weight: normal;
	font-size: 12px;
}



   .form-style-6 fieldset{
	border-radius: 10px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	margin: 0px 0px 10px 0px;
	border: 1px solid #FFD2D2;

	width:26%;
	height:17%;
	position: absolute;
	top: 80px;
    left:460px;
	background: #FFF4F4;
	box-shadow: inset 0px 0px 15px #FFE5E5;
	-moz-box-shadow: inset 0px 0px 15px #FFE5E5;
	-webkit-box-shadow: inset 0px 0px 15px #FFE5E5;
}

.form-style-6 fieldset legend{
	color: #00000;
	border-top: 1px solid #FFD2D2;
	border-left: 1px solid #FFD2D2;
	border-right: 1px solid #FFD2D2;
	border-radius: 5px 5px 0px 0px;
	-webkit-border-radius: 5px 5px 0px 0px;
	-moz-border-radius: 5px 5px 0px 0px;
	background: #FFF4F4;
	padding: 0px 8px 3px 8px;
	box-shadow: -0px -1px 2px #F1F1F1;
	-moz-box-shadow:-0px -1px 2px #F1F1F1;
	-webkit-box-shadow:-0px -1px 2px #F1F1F1;
	font-weight: normal;
	font-size: 12px;
}


   .form-style-7 fieldset{
	border-radius: 10px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	margin: 0px 0px 10px 0px;
	border: 1px solid #FFD2D2;

	width:26%;
	height:25%;
	position: absolute;
	top: 220px;
    left:460px;
	background: #FFF4F4;
	box-shadow: inset 0px 0px 15px #FFE5E5;
	-moz-box-shadow: inset 0px 0px 15px #FFE5E5;
	-webkit-box-shadow: inset 0px 0px 15px #FFE5E5;
}

.form-style-7 fieldset legend{
	color: #00000;
	border-top: 1px solid #FFD2D2;
	border-left: 1px solid #FFD2D2;
	border-right: 1px solid #FFD2D2;
	border-radius: 5px 5px 0px 0px;
	-webkit-border-radius: 5px 5px 0px 0px;
	-moz-border-radius: 5px 5px 0px 0px;
	background: #FFF4F4;
	padding: 0px 8px 3px 8px;
	box-shadow: -0px -1px 2px #F1F1F1;
	-moz-box-shadow:-0px -1px 2px #F1F1F1;
	-webkit-box-shadow:-0px -1px 2px #F1F1F1;
	font-weight: normal;
	font-size: 12px;
}


   .form-style-8 fieldset{
	border-radius: 10px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	margin: 0px 0px 10px 0px;
	border: 1px solid #FFD2D2;

	width:26%;
	height:25%;
	position: absolute;
	top: 410px;
    left:460px;
	background: #FFF4F4;
	box-shadow: inset 0px 0px 15px #FFE5E5;
	-moz-box-shadow: inset 0px 0px 15px #FFE5E5;
	-webkit-box-shadow: inset 0px 0px 15px #FFE5E5;
}

.form-style-8 fieldset legend{
	color: #00000;
	border-top: 1px solid #FFD2D2;
	border-left: 1px solid #FFD2D2;
	border-right: 1px solid #FFD2D2;
	border-radius: 5px 5px 0px 0px;
	-webkit-border-radius: 5px 5px 0px 0px;
	-moz-border-radius: 5px 5px 0px 0px;
	background: #FFF4F4;
	padding: 0px 8px 3px 8px;
	box-shadow: -0px -1px 2px #F1F1F1;
	-moz-box-shadow:-0px -1px 2px #F1F1F1;
	-webkit-box-shadow:-0px -1px 2px #F1F1F1;
	font-weight: normal;
	font-size: 12px;
}



   .form-style-9 fieldset{
	border-radius: 10px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	margin: 0px 0px 10px 0px;
	border: 1px solid #FFD2D2;

	width:26%;
	height:16%;
	position: absolute;
	top: 80px;
    left:880px;
	background: #FFF4F4;
	box-shadow: inset 0px 0px 15px #FFE5E5;
	-moz-box-shadow: inset 0px 0px 15px #FFE5E5;
	-webkit-box-shadow: inset 0px 0px 15px #FFE5E5;
}

.form-style-9 fieldset legend{
	color: #00000;
	border-top: 1px solid #FFD2D2;
	border-left: 1px solid #FFD2D2;
	border-right: 1px solid #FFD2D2;
	border-radius: 5px 5px 0px 0px;
	-webkit-border-radius: 5px 5px 0px 0px;
	-moz-border-radius: 5px 5px 0px 0px;
	background: #FFF4F4;
	padding: 0px 8px 3px 8px;
	box-shadow: -0px -1px 2px #F1F1F1;
	-moz-box-shadow:-0px -1px 2px #F1F1F1;
	-webkit-box-shadow:-0px -1px 2px #F1F1F1;
	font-weight: normal;
	font-size: 12px;
}


   .form-style-10 fieldset{
	border-radius: 10px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	margin: 0px 0px 10px 0px;
	border: 1px solid #FFD2D2;

	width:26%;
	height:23%;
	position: absolute;
	top: 220px;
    left:880px;
	background: #FFF4F4;
	box-shadow: inset 0px 0px 15px #FFE5E5;
	-moz-box-shadow: inset 0px 0px 15px #FFE5E5;
	-webkit-box-shadow: inset 0px 0px 15px #FFE5E5;
}

.form-style-10 fieldset legend{
	color: #00000;
	border-top: 1px solid #FFD2D2;
	border-left: 1px solid #FFD2D2;
	border-right: 1px solid #FFD2D2;
	border-radius: 5px 5px 0px 0px;
	-webkit-border-radius: 5px 5px 0px 0px;
	-moz-border-radius: 5px 5px 0px 0px;
	background: #FFF4F4;
	padding: 0px 8px 3px 8px;
	box-shadow: -0px -1px 2px #F1F1F1;
	-moz-box-shadow:-0px -1px 2px #F1F1F1;
	-webkit-box-shadow:-0px -1px 2px #F1F1F1;
	font-weight: normal;
	font-size: 12px;
}


  .form-style-11 fieldset{
	border-radius: 10px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	margin: 0px 0px 10px 0px;
	border: 1px solid #FFD2D2;

	width:20%;
	height:10%;
	position: absolute;
	top: 400px;
    left:880px;
	background: #FFF4F4;
	box-shadow: inset 0px 0px 15px #FFE5E5;
	-moz-box-shadow: inset 0px 0px 15px #FFE5E5;
	-webkit-box-shadow: inset 0px 0px 15px #FFE5E5;
}

.form-style-11 fieldset legend{
	color: #00000;
	border-top: 1px solid #FFD2D2;
	border-left: 1px solid #FFD2D2;
	border-right: 1px solid #FFD2D2;
	border-radius: 5px 5px 0px 0px;
	-webkit-border-radius: 5px 5px 0px 0px;
	-moz-border-radius: 5px 5px 0px 0px;
	background: #FFF4F4;
	padding: 0px 8px 3px 8px;
	box-shadow: -0px -1px 2px #F1F1F1;
	-moz-box-shadow:-0px -1px 2px #F1F1F1;
	-webkit-box-shadow:-0px -1px 2px #F1F1F1;
	font-weight: normal;
	font-size: 12px;
}



  .form-style-12 fieldset{
	border-radius: 10px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	margin: 0px 0px 10px 0px;
	border: 1px solid #FFD2D2;

	width:26%;
	height:10%;
	position: absolute;
	top: 500px;
    left:880px;
	background: #FFF4F4;
	box-shadow: inset 0px 0px 15px #FFE5E5;
	-moz-box-shadow: inset 0px 0px 15px #FFE5E5;
	-webkit-box-shadow: inset 0px 0px 15px #FFE5E5;
}

.form-style-12 fieldset legend{
	color: #00000;
	border-top: 1px solid #FFD2D2;
	border-left: 1px solid #FFD2D2;
	border-right: 1px solid #FFD2D2;
	border-radius: 5px 5px 0px 0px;
	-webkit-border-radius: 5px 5px 0px 0px;
	-moz-border-radius: 5px 5px 0px 0px;
	background: #FFF4F4;
	padding: 0px 8px 3px 8px;
	box-shadow: -0px -1px 2px #F1F1F1;
	-moz-box-shadow:-0px -1px 2px #F1F1F1;
	-webkit-box-shadow:-0px -1px 2px #F1F1F1;
	font-weight: normal;
	font-size: 12px;
}


[class^="cus-"],
[class*=" cus-"] {
  display: inline-block;
  width: 17px;
  height: 16px;
  *margin-right: .3em;
  line-height: 14px;
  vertical-align: text-top;
  background-image: url("spritesheet.png");
  background-position: 14px 14px;
  background-repeat: no-repeat;
}
[class^="cus-"]:last-child,
[class*=" cus-"]:last-child {
  *margin-left: 0;
}


.cus-exclamation {
    width: 16px;
    height: 16px;
    background-position: -525px -317px;
}


							/*Untuk form 9 */
input[id=noefak]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 140px;
    left: 600px;
	}
	
	
								/*Untuk form 9 */
input[id=tgllunas]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 330px;
    left: 1000px;
	}
	
	
									/*Untuk form 9 */
textarea[id=ketacc]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 510px;
    left: 1000px;
	}
	

	/*Untuk tombol Submit */
button[type=submit] {
    width: 8%;
    background-color: #191970;
    color: white;
    padding: 10px 10px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	position: absolute;
	top: 598px;
    left: 500px;
	}

/*Untuk tombol Batal */
button[type=batal] {
    width: 8%;
    background-color: #FF0000;
    color: white;
    padding: 10px 10px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
 	position: absolute;
	top: 598px;
    left: 750px;
}



</style>
<body onload="uang();">
<div class="form-style-4">
<fieldset>
<legend>Info LKPP</legend>
</fieldset>
<div class="form-style-5">
<fieldset>
<legend>Info E-Faktur</legend>
</fieldset>

<div class="form-style-6">
<fieldset>
<legend>Info Produk</legend>
</fieldset>

<div class="form-style-7">
<fieldset>
<legend>Faktur Pajak</legend>
</fieldset>

<div class="form-style-8">
<fieldset>
<legend>Ekspedisi</legend>
</fieldset>


<div class="form-style-9">
<fieldset>
<legend>Total Piutang</legend>
</fieldset>

<div class="form-style-10">
<fieldset>
<legend>Term-in</legend>
</fieldset>

<div class="form-style-11">
<fieldset>
<legend>Bank</legend>
</fieldset>


<div class="form-style-12">
<fieldset>
<legend>Bank</legend>
</fieldset>

<form action="proses_ubah.php"  name="tambah" method="post" onchange="uang();">

<input type="text" name="nolkppacc_on" id="nolkpp" value="<?php echo $accspa['nolkppacc_on']; ?>" readonly>
<input type="text" name="aksacc" id="noaks" value="<?php echo $accspa['noaks_on']; ?>" readonly>
<input type="text" name="nosjacc" id="nosj"  value="<?php echo $accspa['nosj_on']; ?>"readonly>
<input name="noref_on" type="text" id="ref" placeholder="noref" value="<?php echo $accspa['noref_on']; ?>" readonly>

<textarea type="text" name="namaprodukacc" id="nama" placeholder="Blood Pressure Monitor" readonly>
<?php echo $accspa['nam_prod']; ?>
</textarea>

<input type="text" name="hargaprd" id="harga" onkeyup="uang();hitung();"  class="hargaprd " readonly value="<?php echo $accspa['harga_on']; ?>">
<input type="text" name="jumlahprdacc" id="jumlah" placeholder="0" class="jumlahprd" onkeyup="hitung();"  readonly value="<?php echo $accspa['jumlah_on']; ?>">		
<input type="text" name="totalacc" id="total" placeholder="0" onclick="uang();" class="totalprd"  readonly value="<?php echo $accspa['total']; ?>" >


<textarea type="text" name="distributor" id="dsb" placeholder="PT. Sinko Prima Alloy" readonly>
<?php echo $accspa['pabrik']; ?>
</textarea>

<input type="text" name="diskonacc_on" id="tarif" placeholder="0" class="tarifdiskon" class="tarifdiskon" onkeyup="hitung();"  value="<?php echo $accspa['diskonacc_on']; ?>">	
<input type="text" name="diskonfp" id="diskon" placeholder="0" onkeyup="uang();"  class="diskonfaktur" value="<?php echo number_format($accspa['disfakturbeli']); ?>" readonly>
<input type="text" name="totalfak" id="totalfp" placeholder="0" onkeyup="uang();" class="totalfaktur" value="<?php echo number_format($accspa['totalfaktur']); ?>"readonly>		
<input type="text" name="dppfak" id="dppfp" placeholder="0" onkeyup="uang();" class="dppfaktur" value="<?php echo number_format($accspa['dppfaktur']); ?>"readonly>	
<input type="text" name="ppnfak" id="ppnfp" placeholder="0" onkeyup="uang();" class="ppnfaktur" value="<?php echo number_format($accspa['ppnfaktur']); ?>"readonly>	
<input type="text" name="biayakir" id="eks"  placeholder="0"    onkeyup="uang();hitung();" value="<?php echo number_format($accspa['kirim']); ?>" class="biayakir" readonly>
<input type="text" name="biayapeti_on" id="peti"  placeholder="0"  onkeyup="uang();hitung();" value="<?php echo $accspa['biayapeti_on']; ?>" class="biayapeti"  >
<input type="text" name="totalpiu" id="piutang"  placeholder="0"  onkeyup="uang();" value="<?php echo number_format($accspa['totpiu']); ?>" class="totalpiu" readonly>
<input type="text" name="temphariacc_on" id="term"  placeholder="0"  value="<?php echo $accspa['temphariacc_on']; ?>">

<select type="text" name="kas_on" id="kas"  placeholder="1" required>
<option value="<?php echo $accspa['kas_on']; ?>"><?php echo $accspa['kas_on']; ?></option>
<option value="BCA SPA">BCA SPA</option>
<option value="OCBC SPA">OCBC SPA</option>
</select>

<label class="nolkpp">No LKPP</label>
<label class="noaks">No AKS</label>
<label class="nosj">No SJ</label>
<label class="noref">No Referensi</label>
<label class="noefak">No E-Faktur</label>
<label class="nambrg">Nama</label>
<label class="hargabrg">Harga</label>
<label class="jumlah">Jumlah</label>
<label class="totalhrg">Total Harga</label>
<label class="dsb">Distributor</label>
<label class="tarif">Tarif Diskon (%)</label>
<label class="diskon">Diskon FP</label>
<label class="fp">Total FP</label>
<label class="dppfp">DPP FP</label>
<label class="ppnfp">PPN FP</label>
<label class="biayaeks">Biaya <br>Ekspedisi</label>
<label class="biayapeti">Biaya Peti</label>
<label class="totalpiu">Total <br>Piutang</label>
<label class="term">Batas <br>Pembayaran</label>
<label class="kas">Kas / Bank</label>
<label class="tgllunas">Tgl Lunas</label>
<label class="ket">Keterangan</label>




<input type="text" name="noefak_on" id="noefak" placeholder="noefak" value="<?php echo $accspa['noefak_on']; ?>" readonly>		

<!--Hidden Input---->
<input type="hidden" name="diskonujiacc_on" id="diskonuji" placeholder="diskonuji" value="<?php echo $accspa['diskonujiacc_on']; ?>"> 
<input type="hidden" name="nofakju_on" id="tglsj" placeholder="tglsj" value= "<?= $accspa["nofakju_on"]; ?>">

<input type="date" name="tgllunas_on" id="tgllunas" value= "<?= $accspa["tgllunas_on"]; ?>" required>

<textarea type="text" name="ketacc_on" id="ketacc" >
<?= $accspa["ketacc_on"]; ?>
</textarea>

<button type="submit" name="submit" onclick="return confirm('Yakin Ubah Data ?');">Ubah</button>
<button type="batal" name="batal" formnovalidate onclick="return confirm('Yakin Batal ?');">Batal</button>


<!--hidden input foreign key-->
<input type="hidden" id="idprod_on" name="idprodacc_on" placeholder="total" value= "<?= $accspa["idprodacc_on"]; ?>">
<input type="hidden" id="pabrik_on" name="pabrikacc_on" placeholder="total" value= "<?= $accspa["pabrikacc_on"]; ?>">

</form>


<script>
function hitung() {
     var jumlahprd 		= $(".jumlahprd").val();
	var hargaprd 		= $(".hargaprd").val();
	var tarifdiskon		= $(".tarifdiskon").val();
    var totalprd 		= $(".totalprd").val();
	var diskonfaktur 	= $(".diskonfaktur").val();
	var dppfaktur 		= $(".dppfaktur").val();
	var totalfaktur 	= $(".totalfaktur").val();
	var biayakir 		= $(".biayakir").val();
	var biayapeti		= $(".biayapeti").val();
	var totalpiu		= $(".totalpiu").val();
	var ppnfaktur		= $(".ppnfaktur").val();
	var diskon 			= 100;
	var koma 			= 1.1;
	var nolkoma 		= 0.1;
	
	 hargaprd   = hargaprd.split('Rp ').join('');
     hargaprd   = hargaprd.split('.').join('');
      
	
	 totalprd   = totalprd.split('Rp ').join('');
     totalprd   = totalprd.split('.').join('');
	 
	 diskonfaktur   = diskonfaktur.split('Rp ').join('');
     diskonfaktur   = diskonfaktur.split('.').join('');
	 
	  totalfaktur   = totalfaktur.split('Rp ').join('');
     totalfaktur   = totalfaktur.split('.').join('');
	 
	 	  dppfaktur   = dppfaktur.split('Rp ').join('');
     dppfaktur   = dppfaktur.split('.').join('');
	 
	 	 	  ppnfaktur   = ppnfaktur.split('Rp ').join('');
     ppnfaktur   = ppnfaktur.split('.').join('');
	 
	   biayakir   = biayakir.split('Rp ').join('');
     biayakir   = biayakir.split('.').join('');
	 
	 biayapeti   = biayapeti.split('Rp ').join('');
     biayapeti   = biayapeti.split('.').join('');
	 
	 biayapeti   = biayapeti.split('Rp ').join('');
     biayapeti   = biayapeti.split('.').join('');
	 
	  	totalpiu   = totalpiu.split('Rp ').join('');
		totalpiu   = totalpiu.split('.').join('');
	 	 
     totalprd = Math.round(jumlahprd * hargaprd); 
    $(".totalprd").val(totalprd);
	
  	diskonfaktur = Math.round(totalprd * tarifdiskon / diskon); 
    $(".diskonfaktur").val(diskonfaktur);
			
		totalfaktur = (totalprd - diskonfaktur); 
    $(".totalfaktur").val(totalfaktur);	
	
		dppfaktur = Math.round(totalfaktur / koma);
	$(".dppfaktur").val(dppfaktur);
		
		ppnfaktur = Math.round(dppfaktur * nolkoma);
	$(".ppnfaktur").val(ppnfaktur);
	
		biayakir = Math.round(biayakir);
	$(".biayakir").val(biayakir);
	
	biayapeti = Math.round(biayapeti);
	$(".biayapeti").val(biayapeti);
	
	totalpiu = Math.round(totalfaktur+biayakir+biayapeti);
	$(".totalpiu").val(totalpiu);
		
}
</script>
<script>
  function uang() {
		  
		  $('#harga').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });


			  $('#total').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });

			  $('#diskon').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });

			  $('#totalfp').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });

			  $('#dppfp').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });

			  $('#ppnfp').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });

			  $('#eks').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });

			  $('#peti').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });

			  $('#piutang').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
}
	  
</script>


<script type="text/javascript">    
    <?php echo $jsArray; ?>  
    
	function changeValue(nolkpp){  
 
	document.getElementById('noaks').value = dtMhs[nolkpp].noaks;  
	document.getElementById('nama').value = dtMhs[nolkpp].nama;
	document.getElementById('harga').value = dtMhs[nolkpp].harga;
	document.getElementById('jumlah').value = dtMhs[nolkpp].jumlah;
	document.getElementById('nosj').value = dtMhs[nolkpp].nosj;
	document.getElementById('dsb').value = dtMhs[nolkpp].distributor;
	document.getElementById('tarif').value = dtMhs[nolkpp].diskon;
	document.getElementById('term').value = dtMhs[nolkpp].expdate;
	document.getElementById('tglsj').value = dtMhs[nolkpp].tglsj;
	document.getElementById('diskonuji').value = dtMhs[nolkpp].diskonuji;
	
	};
	</script>

<script src="jquery.min.js"></script>
<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery.price_format.2.0.js"></script>
<script>
		    $("#ref").change(function(){
        		// variabel dari nilai combo box Fakultas
       			var id_fakultas = $("#ref").val();
        		// mengirim dan mengambil data
        		$.ajax({
            		type: "POST",
            		dataType: "html",
            		url: "efaktur.php",
            		data: "efak="+id_fakultas,
            		success: function(msg){
                		// jika tidak ada data
                		if(msg == ''){
                		    alert('Nomer E- Faktur Sudah Habis !');
                		}
                		// jika dapat mengambil data,, tampilkan di combo box jurusan
                		else{
                    		$("#noefak").html(msg);
                		}
            		}
        		});
    		});
		</script>
		

	<?php 
}
?>	
	
		
</body>
</html>
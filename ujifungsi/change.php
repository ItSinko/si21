<?php
require 'functions.php';

$lkppuji = $_GET["lkppuji"];
$acc= query("SELECT * FROM ujifungsi INNER JOIN accspa ON accspa.nolkppacc=ujifungsi.lkppuji WHERE lkppuji= '$lkppuji'")[0];

if( isset($_POST["submit"]) ) {
//mencoba bisa apatidak

//cek data tambah
if( ubah($_POST) > 0 ) {
	echo "
		<script>
			alert('DATA ANDA BERHASIL DIUBAH');
			document.location.href = 'akunting.php';
		</script>
		";
}    else {
		echo "
			<script>
			alert('DATA ANDA TIDAK MEMILIKI PERUBAHAN');
			document.location.href = 'akunting.php';
			</script>
			";
}
	   

}

if (isset($_POST["batal"]) ) {
	echo " 
	<script>
	   alert('DATA BERHASIL DIBATALKAN');
	   document.location.href= 'akunting.php';
	 </script>
	 ";
	   
}


?>

<html>
<head>
<title>Tambah UjiFungsi</title>
</head>
<style>
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
	top:  100px;
    left:190px;
	}
	
													
input[id=noaks]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  150px;
    left:190px;
	}
	
		
															
input[id=noefaktur]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  200px;
    left:190px;
	}
	
	input[id=tgllunas]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 250px;
    left:190px;
	}
	
	
		textarea[id=namabarang]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  340px;
    left:190px;
	}
	
			input[id=hargabarang]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  405px;

    left:190px;
	}
	
			input[id=total]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  455px;
    left:190px;
	}
	
				input[id=invoice]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  100px;
    left:570px;
	}
	
			input[id=tgluji]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  150px;
    left:570px;
	}
	
		textarea[id=distributor]{
    width: 15.8%;
	height:7%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  200px;
    left:570px;
	}
		

		input[id=tarifuji]{
    width: 6%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  295px;
    left:570px;
	}	


	input[id=nilaiuji]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  345px;
    left:570px;
	}		
	
		input[id=dppuji]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  395px;
    left:570px;
	}		
	
			input[id=ppnuji]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  445px;
    left:570px;
	}		
	

		
			input[id=pphuji]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  495px;
    left:570px;
	
     }		
	
				input[id=totalbayar]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  100px;
    left:990px;
	}		
	
						input[id=tglbayar]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  150px;
    left:990px;
	}		
	
	
					select[id=kas]{
    width: 15.8%;
    padding: 12px ;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:  200px;
    left:990px;
	}		
	
	
	
     .nolkpp{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 115px;
    left:80px;
   } 
	
		
     .noaks{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 165px;
    left:80px;
   } 
   
       .noefak{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 215px;
    left:80px;
   }

      .tgllunas{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 265px;
    left:80px;
   }   
     .nama{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 365px;
    left:80px;
   }     
   
      .unit{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 425px;
    left:80px;
   }  
   
   
    .total{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 475px;
    left:80px;
   } 
   
      .invoice{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 115px;
    left:485px;
   } 
   
      .tgluji{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 170px;
    left:485px;
   } 
   
      .dsb{
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 220px;
    left:485px;
		   } 
   
         .tarif{
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 310px;
    left:485px;
		   } 
            .nilaiuji{
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 360px;
    left:485px;
		   } 
   
              .dppuji{
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 415px;
    left:485px;
		   } 
   
                 .ppnuji{
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 465px;
    left:485px;
		   } 
   
			.pphuji{
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 515px;
    left:485px;
		   } 
   
                     .totalbyr{
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 115px;
    left:880px;
		   }

                     .tglbyr{
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 165px;
    left:880px;
		   } 
                     .kas {
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:14px;
   	position: absolute;
	top: 215px;
    left:880px;
		   
		   } 
   		   		   
   
   
  .form-style-4 fieldset{
	border-radius: 10px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	margin: 0px 0px 10px 0px;
	border: 1px solid #FFD2D2;

	width:24%;
	height:33%;
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
	height:28%;
	position: absolute;
	top: 320px;
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

	width:22.5%;
	height:25%;
	position: absolute;
	top: 80px;
    left:470px;
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

	width:22.5%;
	height:42%;
	
	position: absolute;
	top: 270px;
    left:470px;
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

	width:24%;
	height:25%;
	
	position: absolute;
	top: 80px;
    left:870px;
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

<body>
<div class="form-style-4">
<fieldset>
<legend>Info LKPP</legend>
</fieldset>
</div>

<div class="form-style-5">
<fieldset>
<legend>Nama</legend>
</fieldset>
</div>

<div class="form-style-6">
<fieldset>
<legend>Invoice</legend>
</fieldset>
</div>

<div class="form-style-7">
<fieldset>
<legend>Uji Fungsi</legend>
</fieldset>
</div>


<div class="form-style-8">
<fieldset>
<legend>Total</legend>
</fieldset>
</div>
<form action="proses_ubah.php" method="post"> 
<input type="text" id="nolkpp" placeholder="nolkpp" value= "<?= $acc["lkppuji"]; ?>"  name="lkppuji" onchange="changeValue(this.value)" onclick="hitung();">
  


<input type="text" id="noaks" placeholder="noaks" value= "<?= $acc["aksacc"]; ?>">
<input type="text" id="noefaktur" placeholder="noefaktur" value= "<?= $acc["nofakju"]; ?>" readonly>
<input type="text" id="tgllunas" placeholder="tgllunas" readonly value= "<?= $acc["tgllunas"]; ?>">
<textarea type="text" id="namabarang" placeholder="namabarang" readonly>
<?php echo $acc["namaprodukacc"]; ?>
</textarea>
<input type="text" id="hargabarang" value= "<?= $acc["hargaprd"]; ?>" placeholder="hargabarang" >
<input type="text" id="total" placeholder="total"  value= "<?= $acc["totalacc"]; ?>"onkeyup="hitung();" class="total" readonly>


<input type="text" id="invoice" name="noinv" value= "<?= $acc["noinv"]; ?>"placeholder="invoice" required> 


<input type="date" id="tgluji" name="tgluji" value= "<?= $acc["tgluji"]; ?>"placeholder="tgluji" required>


<textarea type="text" id="distributor" placeholder="distributor" readonly>


<?php echo $acc["distributor"]; ?></textarea>
<input type="text" id="tarifuji" value= "<?= $acc["diskonuji"]; ?>" name="diskonuji" placeholder="tarifuji"  onkeyup="hitung();"  class="diskon">
<input type="text" id="nilaiuji" value= "<?= $acc["nilaiuji"]; ?>" name="nilaiuji" placeholder="nilaiuji"  class="nilaiuji" >
<input type="text" id="dppuji" value= "<?= $acc["dppuji"]; ?>" name="dppuji" placeholder="dppuji"  class="dppuji" >
<input type="text" id="ppnuji" value= "<?= $acc["ppnuji"]; ?>" name="ppnuji" placeholder="ppnuji"  class="ppnuji" >
<input type="text" id="pphuji" value= "<?= $acc["pphuji"]; ?> "name="pphuji" placeholder="pphuji" class="pphuji" >


<input type="text" id="totalbayar" value= "<?= $acc["totaluji"]; ?>" name="totaluji" placeholder="totalbayar" class="totaldibayar" readonly>
<input type="date" id="tglbayar" value= "<?= $acc["tglbayar"]; ?>" name="tglbayar" placeholder="tglbayar" required>
<select type="text" id="kas" placeholder="kas" name="kasuji" required>

<option value="<?= $acc["kasuji"]; ?>" >
<?php echo $acc["kasuji"]; ?>
</option>

<option value="BCA">BCA</option>
<option value="OCBC">OCBC</option>

</select>


<label class="nolkpp">No LKPP *</label>
<label class="noaks">No AKS</label>
<label class="noefak">No E-Faktur</label>
<label class="tgllunas">Tgl Lunas</label>


<label class="nama">Nama Barang</label>
<label class="unit">Harga / Unit</label>
<label class="total">Total</label>


<label class="invoice">No Invoice *</label>
<label class="tgluji">Tgl Uji *</label>
<label class="dsb">Distributor</label>


<label class="tarif">Tarif Uji</label>
<label class="nilaiuji">Nilai Uji</label>
<label class="dppuji">DPP Uji</label>
<label class="ppnuji">PPN Uji</label>
<label class="pphuji">PPH Uji</label>

<label class="totalbyr">Total Bayar</label>
<label class="tglbyr">Tgl Bayar *</label>
<label class="kas">Kas *</label>


<button type="submit" name="submit">Tambah</button>
<button type="batal" name="batal">Batal</button>
</form>

<script src="jquery-3.2.1.min.js"></script>
<script src="my.js"></script>
<script type="text/javascript">    
    <?php echo $jsArray; ?>  
    function changeValue(nolkppacc){  
	document.getElementById('noaks').value = dtMhs[nolkppacc].aksacc;  
	document.getElementById('noefaktur').value = dtMhs[nolkppacc].nofakju;
	document.getElementById('tgllunas').value = dtMhs[nolkppacc].tgllunas;
	document.getElementById('namabarang').value = dtMhs[nolkppacc].namaprodukacc;
	document.getElementById('hargabarang').value = dtMhs[nolkppacc].hargaprd;
	document.getElementById('total').value = dtMhs[nolkppacc].totalacc;
	document.getElementById('distributor').value = dtMhs[nolkppacc].distributor;
	document.getElementById('tarifuji').value = dtMhs[nolkppacc].diskonujiacc;
	
	};
	</script>

<script>
function hitung() {
    var nilaiuji  = $(".nilaiuji").val();
	var total = $(".total").val();
    var diskon = $(".diskon").val();
    var persen = 100;
	var koma   = 1.1;
    var nolkoma = 0.1;
	var noldua = 0.02;
	var dppuji  = $(".dppuji").val();
	var pphuji  = $(".pphuji").val();
	
	
	nilaiuji = Math.round(total * diskon / persen); 
    $(".nilaiuji").val(nilaiuji);
    	
	dppuji = Math.round(nilaiuji / koma); 
    $(".dppuji").val(dppuji);

	ppnuji = Math.round(dppuji * nolkoma); 
    $(".ppnuji").val(ppnuji);
	
    pphuji = Math.round(dppuji * noldua); 
    $(".pphuji").val(pphuji);
	
	totaldibayar= (nilaiuji - pphuji);
	 $(".totaldibayar").val(totaldibayar);
	
	}
	
</script>


</body>
<html>


</html>
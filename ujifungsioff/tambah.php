
<?php
//koneksi ke database
require 'functions.php';


//cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
//mencoba bisa apatidak
//var_dump($_POST);

//cek data tambah
if( tambah($_POST) > 0 ) {
	echo "
		<script>
			alert('DATA ANDA BERHASIL DITAMBAHKAN');
			document.location.href = 'ujifungsi.php';
		</script>
		";
		}    
else
		{
	echo "
			<script>
			alert('DATA ANDA GAGAL DITAMBAHKAN');
			document.location.href = 'ujifungsi.php';
			</script>
			";
		}

}



if (isset($_POST["batal"]) ) {
	echo " 
	<script>
	   alert('DATA BERHASIL DIBATALKAN');
	   document.location.href= 'ujifungsi.php';
	 </script>
	 ";
	   
}


?>










<!DOCTYPE html>
<html>
<head>
<title> Tambah Data </title>
<style>


	/*Untuk form harga */
input[id=tarifuji]{
    width: 5.5%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 314px;
    left: 320px;
	}

	
	
	/*Untuk form harga */
input[id=tglinv]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 265px;
    left: 320px;
	}


/*Untuk form harga */
select[id=nolkpp]{
    width: 8%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 87px;
    left: 320px;
	}

	
	/*Untuk form harga */
input[id=noinv]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 215px;
    left: 320px;
	}

	
	
	

	
	

	
	/*Untuk form harga */
input[id=totalharga]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 140px;
    left: 320px;
	}

		/*Untuk form harga */
input[id=nilaiuji]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 364px;
    left: 320px;
	}
	

		/*Untuk form harga */
input[id=dppuji]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 87px;
    left: 830px;
	}
	
	
		/*Untuk form harga */
input[id=ppnuji]{ 
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 140px;
    left: 830px;
	}
	
		/*Untuk form harga */
input[id=pphuji]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 193px;
    left: 830px;
	}
	
			/*Untuk form harga */
input[id=totaluji]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 240px;
    left: 830px;
	}
		
				/*Untuk form harga */
input[id=tglbayar]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 287px;
    left: 830px;
	}
		
	
				/*Untuk form harga */
select[id=kasbank]{
    width: 10%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 337px;
    left: 830px;
	}
		
	
	
	
/*Untuk label 1 */
.nolkpp{


 	position: absolute;
	top: 108px;
    left: 160px;  
}




/*Untuk label 1 */
.totalharga{


 	position: absolute;
	top: 158px;
    left: 160px;  
}


/*Untuk label 1 */
.noinv{


 	position: absolute;
	top: 235px;
    left: 160px;  
}

/*Untuk label 1 */
.ujifungsi{


 	position: absolute;
	top: 205px;
    left: 400px;  
	font-size: 12px;
}

/*Untuk label 1 */
.tglniv{


 	position: absolute;
	top: 285px;
    left: 160px;  
	
}

/*Untuk label 1 */
.tarifuji{


 	position: absolute;
	top: 335px;
    left: 160px;  
	
}

/*Untuk label 1 */
.nilaiuji{


 	position: absolute;
	top: 384px;
    left: 160px;  
	
}

/*Untuk label 1 */
.dppuji{


 	position: absolute;
	top: 108px;
    left: 700px;  
	
}

/*Untuk label 1 */
.ppnuji{


 	position: absolute;
	top: 158px;
    left: 700px;  
	
}

/*Untuk label 1 */
.pphuji{


 	position: absolute;
	top: 208px;
    left: 700px;  
	
}

/*Untuk label 1 */
.totaluji{


 	position: absolute;
	top: 258px;
    left: 700px;  
	
}
/*Untuk label 1 */
.tglbayar{


 	position: absolute;
	top: 308px;
    left: 700px;  
	
}

/*Untuk label 1 */
.kasbank{


 	position: absolute;
	top: 358px;
    left: 700px;  
	
}

/*Untuk tombol Submit */
button[type=submit] {
    width: 9%;
    background-color: #191970;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    position: absolute;
	top: 580px;
   left: 480px;
	
	}




/*Untuk tombol Batal */
button[type=batal] {
    width: 8%;
    background-color: #FF0000;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    position: absolute;
	top: 580px;
   left: 680px;
	}



   
   /* Tooltips */


.home {
    position: relative;
    display: inline-block;
    
}

.home .tooltips1 {
    visibility: hidden;
    width: 180px;
    background-color: #FEF9FD;
    color: #010101;
    
    text-align: center;
    
    padding: 5px 0;
border:solid 1px black;
    /* Position the home */
    position: absolute;
    z-index: 1;
}

.home:hover .tooltips1 {
    visibility: visible;
}

.tooltips1 {
	
	left:89px;
font-size: 12px
	
	}
	
	
	/*Untuk tombol Batal */
.home{
    width: 8%;
    background-color: #FF0000;
    color: white;
    padding: 10px 10px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
 	position: absolute;
	top: 20px;
    left: 20px;
}




/*Untuk label 1 */
.dis{


 	position: absolute;
	top: 338px;
    left: 405px;  
	
}

</style>




<!--Script Untuk Format Rupiah-->
<script type="text/javascript" src="my.js">
</script>




</head>
<body>
<h1><center>Tambah data</center> </h1>


<div class="container">

<form action="proses_tambah.php" method="post">
	
	<div class="form-group">
	<label for="sing_prod" class="nolkpp" >NO LKPP</label>
	<select type="text" name="lkppuji" id="nolkpp"  maxlength="80"  onchange="changeValue(this.value)"   placeholder="Contoh:3578" >
	
	<option value="">-Pilih-</option>
        <?php 
    $result = mysqli_query($con,"select * from accspa");    
    $jsArray = "var dtMhs = new Array();\n";        
    while ($row = mysqli_fetch_array($result)) {    
        echo '<option value="' . $row['nolkppacc'] . '">' . $row['nolkppacc'] . '</option>';    
        $jsArray .= "dtMhs['" . $row['nolkppacc'] . "'] = {total:'" . addslashes($row['totalacc']) . "',
														diskonuji:'" . addslashes($row['diskonujiacc']) . "',
													
															};\n";
	}   
    ?> 
	
	</select>
	</div>	
	
	<div class="form-group">
	<label for="sing_prod" class="totalharga" >Total Harga</label>
	<input type="text" name="totaluji" id="totalharga"      maxlength="80"   placeholder="Rp.10,0000"   onkeyup="hitung();" class="total"    >
	</div>	
	
	<div class="form-group">
	<label for="sing_prod" class="noinv" >No INV </label>
	<input type="text" name="noinv" id="noinv"  maxlength="80" onkeyup="this.value = this.value.toUpperCase()"  placeholder="F-0017" required  >
	</div>	
	
		<label for="sing_prod" class="ujifungsi" >- UJI FUNGSI -</label>
		
		<div class="form-group">
	<label for="sing_prod" class="tglniv" > Tgl INV </label>	
			<input type="date" name="tglinv" id="tglinv"    maxlength="80"  placeholder="Rp.10,0000"  required>
		</div>
		
		<div class="form-group">
			<label for="sing_prod" class="tarifuji" > Tarif Uji </label>
				<input type="text" name="diskonuji" id="tarifuji"     maxlength="80"  placeholder="10%"  required onkeyup="hitung();" class="diskon" >
		</div>
		
		<div class="form-group">
			<label for="sing_prod" class="nilaiuji" >Nilai Uji </label>
		<input type="text" name="nilaiuji" id="nilaiuji"  maxlength="80"    placeholder="Rp.10,0000"  class="nilaiuji">	
		</div>
		
		
		<div class="form-group">
	    <label for="sing_prod" class="dppuji" >DPP Uji </label>
		<input type="text" name="dppuji" id="dppuji"  maxlength="80"  placeholder="Rp.10,0000"     class="dppuji" >
		
		</div>
		
		
		<div class="form-group">
	    <label for="sing_prod" class="ppnuji" >PPN Uji </label>
		<input type="text" name="ppnuji" id="ppnuji"  maxlength="80"  placeholder="Rp.10,0000"   class="ppnuji" >
		</div>
		
		<div class="form-group">
		<label for="sing_prod" class="pphuji" >PPH Uji </label>
		<input type="text" name="pphuji" id="pphuji"  maxlength="80"  placeholder="Rp.10,0000"  class="pphuji" >
		</div>
				
				
				<div class="form-group">
		<label for="sing_prod" class="totaluji" >Total Uji </label>
		<input type="text" name="totalujibayar" id="totaluji"  maxlength="80"  placeholder="Rp.10,0000"  class="totaldibayar">
		</div>
		
		<div class="form-group">
		<label for="sing_prod" class="tglbayar" >Tgl Bayar</label>
		<input type="date" name="tglbayar" id="tglbayar"  maxlength="80"  placeholder="ABPM507"  required>
		</div>
		
		
		<button type="submit" name="submit"   onclick="return confirm('Data Akan Ditambahkan?');">Tambah data </button>
<br>  



<button type="batal" name="batal"   onclick="return confirm('Inputan Akan dibatalkan ?');" target="">Batal </button>

<div class="form-group">
		<label for="sing_prod" class="kasbank" >Kas Bank</label>
				<select type="text" name="kasuji" id="kasbank"  maxlength="80"  placeholder="BCA,OCBC" required   >
			<option value=""> Pilih Kas</option>
			<option value="BCA">BCA</option>
			<option value="OCBC">OCBC</option>
			<option value="Tidak ada">Tidak Ada</option> 
			</select>
		</div>

		
	<button class="home" onclick="location.href='ujifungsi.php'" type="button" target="">
 <span class="tooltips1">Kembali ke halaman Uji Fungsi!</span><i class="cus-house"></i>Tabel Uji Fungsi</button>		
		
<label class="dis">%</label>
		
		</form>

</div>
                               
<br>

<script src="my.js"></script>
<script src="jquery-3.2.1.min.js"></script>
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

<script type="text/javascript">    
    <?php echo $jsArray; 
	
	
	
	?>  
    
	function changeValue(nolkppacc){  
    document.getElementById('totalharga').value = dtMhs[nolkppacc].total;    
	document.getElementById('tarifuji').value = dtMhs[nolkppacc].diskonuji;  
 
	};  
    </script> 
        </script>
<script type="text/javascript">
  
  $(".chosen").chosen();

  </script>
</body>
</html>
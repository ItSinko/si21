
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
			document.location.href = 'qc.php';
		</script>
		";
}    else {
		echo "
			<script>
			alert('DATA ANDA GAGAL DITAMBAHKAN');
			document.location.href = 'qc.php';
			</script
			";
	
	
	
	
}
	   

}

if (isset($_POST["batal"]) ) {
	echo " 
	<script>
	   alert('DATA BERHASIL DIBATALKAN');
	   document.location.href= 'qc.php';
	 </script>
	 ";
	   
}	
	
	
	
	

	
	
	
	
	



?>












<!DOCTYPE html>
<html>
<head>
<title> Tambah Data </title>
<style>



/*Untuk form lkpp */
select[id=nolkpp]{
    width: 10%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 100px;
    left: 120px;
	}

/*Untuk form aks */
input[id=noaks]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 165px;
    left: 120px;
	}


	
/*Untuk labelpo */
.labelpo{
        font-size:12px;
   	position: absolute;
	top: 235px;
    left: 120px;

   }	

/*Untuk form No pO */
input[id=nopo]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 250px;
    left: 120px;
	}
	
/*Untuk form Tgl pO */
input[id=tglpo]{
    width: 15%;
    padding: 12px 20px;qc
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 355px;
    left: 120px;
	}
	
	
	/*Untuk labeldo */
.labeldo{
    font-size:12px;
   	position: absolute;
	top: 330px;
    left: 120px;

   }	
/*Untuk form no dO */
input[id=nodo]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 385px;
    left: 120px;
	}
	
/*Untuk form tgl dO */
input[id=tgldo]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 435px;
    left: 120px;
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
	top: 500px;
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
	top: 500px;
    left: 750px;
}



	/*Untuk label samping */
.lkpp{
    font-size:15px;
   	position: absolute;
	top: 120px;
    left: 35px;

   }
	/*Untuk label samping */
.noaks{
    font-size:15px;
   	position: absolute;
	top: 180px;
    left: 35px;

   }

	/*Untuk label samping */
.nopo{
    font-size:15px;
   	position: absolute;
	top: 273px;
    left: 35px;

   }

	/*Untuk label samping */
.tglpo{
    font-size:15px;
   	position: absolute;
	top: 360px;
    left: 35px;

   }
   
	/*Untuk label samping */
.nodo{
    font-size:15px;
   	position: absolute;
	top: 400px;
    left: 35px;

   }
   
 	/*Untuk label samping */
.tgldo{
    font-size:15px;
   	position: absolute;
	top: 450px;
    left: 35px;

   }

    	/*Untuk label samping */
.labelpreview{
    font-size:15px;
   	position: absolute;
	top: 80px;
    left:960px;

   }
 
     	/*Untuk label samping */
.labeldistrib{
    font-size:15px;
   	position: absolute;
	top: 134px;
    left:700px;

   }
      	/*Untuk label samping */
.labeljenis{
    font-size:15px;
   	position: absolute;
	top: 188px;
    left:700px;

   }
        	/*Untuk label samping */
.labeljumlah{
    font-size:15px;
   	position: absolute;
	top: 239px;
    left:700px;

   }
   
         	/*Untuk label samping */
.labelprod{
    font-size:15px;
   	position: absolute;
	top: 295px;
    left:700px;

   }
   
   
/*Untuk form preview */
input[id=distributor]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 110px;
    left: 810px;
	}
		
/*Untuk form preview */
input[id=jenpaket]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 165px;
    left: 810px;
	}   
   
   
 /*Untuk form preview */
input[id=jumlahspa]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 220px;
    left: 810px;
	}   
     
    /*Untuk form preview */
input[id=namprod]{
    width: 35%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 275px;
    left: 810px;
	}   
   
   
   
   
   
   	/*Untuk label samping */
.noaks2{
    font-size:15px;
   	position: absolute;
	top: 185px;
    left: 35px;

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
	<label for="sing_prod" class="lkpp">No LKPP</label>
	<select type="text" name="nolkppqc" id="nolkpp"   onchange="changeValue(this.value)" placeholder="LKPP" >
    <option value=0>-Pilih LKPP-</option>
        <?php 
    $result = mysqli_query($con,"select * from tabel_spa");    
    $jsArray = "var dtMhs = new Array();\n";        
    while ($row = mysqli_fetch_array($result)) {    
        echo '<option value="' . $row['nolkpp'] . '">' . $row['nolkpp'] . '</option>';    
        $jsArray .= "dtMhs['" . $row['nolkpp'] . "'] = {noaks:'" . addslashes($row['noaks']) . "',
														 jenpaket:'" . addslashes($row['jenpaket']) . "',
														namprod:'" . addslashes($row['namprod']) . "',
														jumlahspa:'" . addslashes($row['jumlahspa']) . "',	
									
															};\n";
	}   
    ?>    
	</select>
	</div>	
	
	
	<div class="form-group">
	<label for="noaks" class="noaks2" >Nomer AKS </label>
	<input type="text" name="noaksqc" id="noaks" maxlength="150"  placeholder="AKS"  readonly value="" required >
	</div>
	 
	 <div class="form-group">
	<label for="noakd" class="nopo" >Tanggal </label>
	<input type="date" name="tglterima" id="nopo" placeholder="NOMER PO"  placeholder="TANGGAL TERIMA DARI GUDANG" required>
	</div>
	
	<div class="form-group">
	<label for="harga" class="tglpo">Tanggal  </label>
	<input type="date" name="tglserah" id="tglpo"  onkeyup="hitung();" class="a" placeholder="TANGGAL SERAH DARI GUDANG" required>
	</div> 
	
	

<!--PREVIEW-->

<input type="text" name="jenpaket" id="jenpaket" placeholder="Jenis Paket" disabled value="">	

 <input type="text" name="jumlahspa" id="jumlahspa" placeholder="Jenis Paket" disabled value="">	
<input type="text" name="namprod" id="namprod" placeholder="Nama Produk" disabled value="">	

	
		<label for="harga" class="labelpo">TERIMA DARI GUDANG  </label>
		<label for="harga" class="labeldo">MENYERAHKAN KE GUDANG </label>
				<label for="harga" class="labelpreview">PREVIEW DATA</label>

				<label for="harga" class="labeljenis">Jenis</label>
			<label for="harga" class="labeljumlah">Jumlah</label>
			<label for="harga" class="labelprod">Nama Produk</label>
		<button type="submit" name="submit">Tambah data </button>
<br>  <button type="batal" name="batal" onclick="location.href='qc.php'" target="">Batal </button>
<button class="home" onclick="location.href='qc.php'" type="button" target="">
 <span class="tooltips1">Kembali ke halaman QC!</span><i class="cus-house"></i>Tabel QC</button>

</form>
</div>

<br>
<script src="my.js"></script>
<script src="jquery-3.2.1.min.js"></script>


<!--script untuk combo-->
<!--untuk script combo-->
<script type="text/javascript">    
    <?php echo $jsArray; 
	
	
	
	?>  
    function changeValue(nolkpp){  
    document.getElementById('noaks').value = dtMhs[nolkpp].noaks;  
	  document.getElementById('jenpaket').value = dtMhs[nolkpp].jenpaket;  
		  document.getElementById('namprod').value = dtMhs[nolkpp].namprod;
			  document.getElementById('jumlahspa').value = dtMhs[nolkpp].jumlahspa;

	};  
    </script> 
</body>
</html>
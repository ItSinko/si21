<?php 
//koneksi ke database
require 'functions.php';


//ambil data di URL
$nolkppqc = $_GET["nolkppqc"];
//var_dump($id);
//query mahasiswa berdasarkan id
$mhs = query("SELECT * FROM qc WHERE nolkppqc = $nolkppqc")[0];
	


//cek apakah tombol submit sudah diubah atau belum
if( isset($_POST["submit"]) ) {
//mencoba bisa apatidak
//var_dump($_POST);

//cek data tambah
if( ubah($_POST) > 0 ) {
	echo "
		<script>
			alert('DATA ANDA BERHASIL DIUBAH');
			document.location.href = 'qc.php';
		</script>
		";
}    else {
		echo "
			<script>
			alert('DATA ANDA TIDAK MEMILIKI PERUBAHAN');
			document.location.href = 'qc.php';
			</script>
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
input[id=nolkpp]{
    width: 10%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 100px;
    left: 620px;
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
    left: 620px;
	}


	
/*Untuk labelpo */
.labelpo{
        font-size:12px;
   	position: absolute;
	top: 235px;
    left: 620px;

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
    left: 620px;
	}
	
/*Untuk form Tgl pO */
input[id=tglpo]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 340px;
    left: 620px;
	}
	
	
	/*Untuk labeldo */
.labeldo{
    font-size:12px;
   	position: absolute;
	top: 330px;
    left: 620px;

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
    left: 620px;
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
    left: 620px;
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
    left: 510px;

   }
	/*Untuk label samping */
.noaks{
    font-size:15px;
   	position: absolute;
	top: 180px;
    left: 510px;

   }

	/*Untuk label samping */
.nopo{
    font-size:15px;
   	position: absolute;
	top: 273px;
    left: 535px;

   }

	/*Untuk label samping */
.tglpo{
    font-size:15px;
   	position: absolute;
	top: 360px;
    left: 535px;

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
   
   
   
</style>








</head>
<body>
<h1><center>Ubah data</center> </h1>


<div class="container">
<form action="" method="post">
	
	<div class="form-group">
	<label for="singprod" class="lkpp" >Nomer LKPP</label>
	<input type="text" name="nolkppqc" id="nolkpp" maxlength="150"  placeholder="AKS" autocomplete="off"  readonly value="<?=$mhs["nolkppqc"]; ?>">
	</div>
	 
	
	<div class="form-group">
	<input type="text" name="noaksqc" id="noaks" maxlength="150"  placeholder="AKS" autocomplete="off" readonly value="<?=$mhs["noaksqc"]; ?>">
	</div>
	 
	 <div class="form-group">
	<label for="noakd" class="nopo" >Tanggal </label>
	<input type="date" name="tglterima" id="nopo" placeholder="NOMER PO" autocomplete="off" placeholder="TANGGAL TERIMA DARI GUDANG" value="<?=$mhs["tglterima"]; ?>">
	</div>
	
	<div class="form-group">
	<label for="harga" class="tglpo">Tanggal  </label>
	<input type="date" name="tglserah" id="tglpo"  onkeyup="hitung();" class="a" placeholder="TANGGAL SERAH DARI GUDANG" autocomplete="off" value="<?=$mhs["tglserah"]; ?>" >
	</div> 
	
	

	
		<label for="harga" class="labelpo">TERIMA DARI GUDANG  </label>
		<label for="harga" class="labeldo">MENYERAHKAN KE GUDANG </label>


			
		<button type="submit" name="submit">Tambah data </button>
<br>  <button type="batal" name="batal" onclick="location.href='qc.php'" target="">Batal </button>


</form>
</div>

<br>

















</body>
</html>
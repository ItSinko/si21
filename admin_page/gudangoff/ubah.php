<?php

require 'functions.php' ;

//ambil data di URL
$idseri = $_GET["idseri"];
//var_dump($id);
//query mahasiswa berdasarkan id
$mhs = query("SELECT * FROM tbl_gdg WHERE idseri = $idseri")[0];




if( isset($_POST["submit"]) ) {
//mencoba bisa apatidak
//var_dump($_POST);

//cek data tambah
if( ubah($_POST) > 0 ) {
	echo "
		<script>
			alert('DATA ANDA BERHASIL DIUBAH');
			document.location.href = 'gudang.php';
		</script>
		";
}    else {
		echo "
			<script>
			alert('DATA ANDA TIDAK MEMILIKI PERUBAHAN');
			document.location.href = 'gudang.php';
			</script>
			";
}
	   

}



if (isset($_POST["batal"]) ) {
	echo " 
	<script>
	   alert('DATA BERHASIL DIBATALKAN');
	   document.location.href= 'gudang.php';
	 </script>
	 ";
	   
}







?>











<html>
<head>
<style>

	/*Untuk label samping */
.lkpp{
    font-size:15px;
   	position: absolute;
	top: 70px;
    left: 400px;

   }
   
   	/*Untuk label samping */
.nosjgdg{
    font-size:15px;
   	position: absolute;
	top: 120px;
    left: 400px;

   }

   	/*Untuk label samping */
.tglsjgdg{
    font-size:15px;
   	position: absolute;
	top: 170px;
    left: 400px;

   }
   
   	/*Untuk label samping */
.noefak{
    font-size:15px;
   	position: absolute;
	top: 275px;
    left: 400px;

   }
   
   	/*Untuk label samping */
.statusgdg{
    font-size:15px;
   	position: absolute;
	top: 225px;
    left: 400px;

   }
      
	  
   	/*Untuk label samping */
.divHobi{
   	position: absolute;
	top: 355px;
    left: 200px;

   }
/*Untuk form Tgl pO */
input[id=nolkpp]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 49px;
    left: 550px;
	}


/*Untuk form Tgl pO */
input[id=nosjgdg]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 100px;
    left: 550px;
	}


/*Untuk form Tgl pO */
input[id=tglsjgdg]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 150px;
    left: 550px;
	}

/*Untuk form Tgl pO */
select[id=status]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 205px;
    left: 550px;
	}

/*Untuk form Tgl pO */
input[id=noefakgdg]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 255px;
    left: 550px;
	}
/*Untuk form Tgl pO */
input[id=id1]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 555px;
    left: 550px;
	}
/*Untuk form Tgl pO */
input[type=text]{
    width: 15%;
    padding: 12px 20px;

    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;

	}

	
	/*Untuk form Tgl pO */
input[id=distrib]{
    width: 26%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
position: absolute;
	top: 100px;
    left: 960px;
	}

		/*Untuk form Tgl pO */
input[id=nmprdgdg]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
position: absolute;
	top: 160px;
    left: 960px;
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
	top: 315px;
    left: 450px;
}	

/*Untuk tombol Batal */
button[type=submit] {
    width: 8%;
    background-color: #000000;
    color: white;
    padding: 10px 10px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
 	position: absolute;
	top: 315px;
    left: 650px;
}	




</style>


<title>Input Nomer Seri</title>

<body>
<div id="container">

					

<form method="post" action="">
		<input type ="hidden" name="idseri" value="<?=$mhs["idseri"]; ?>"  />

	<label for="sing_prod" class="lkpp" >No LKPP</label>	
	<input name="nolkppgdg" type="text" id="nolkpp" value="<?=$mhs["nolkppgdg"]; ?>"> 
	
	
		<label for="sing_prod" class="nosjgdg" >No Surat Jalan</label>	
        <input name="nosjgdg" type="text" id="nosjgdg" placeholder="sjgdg"  value="<?=$mhs["nosjgdg"]; ?>" > 
	
		<label for="sing_prod" class="tglsjgdg" >Tgl Surat Jalan</label>	
	<input name="tglsjgdg" type="date" id="tglsjgdg" size="40"  value="<?=$mhs["tglsjgdg"]; ?>"> </p>
		
				<label for="sing_prod" class="statusgdg" >Status</label>	
			<label for="sing_prod" class="noefak" >No e-fak</label>	
		<select name="statusgdg" type="text" id="status" > 

	<option value="<?=$mhs["statusgdg"]; ?>" > <?=$mhs["statusgdg"]; ?></option>
	<option value="open">open</option>
	<option value="close">close</option>
	</select>
		
	
			
		<input name="noefakgdg"  type="number" id="noefakgdg"   value="<?=$mhs["noefakgdg"]; ?>"> 

     
	<button type="batal" name="batal" >Batal</button>
	<button type="submit" name="submit">Submit</button>

	</form>
</div>

	

</head>
</body>
</html>
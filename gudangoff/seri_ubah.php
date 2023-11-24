<?php 
$con = mysqli_connect("localhost","root","","kontrol_db");

$idseri_off = $_GET['idseri_off'];

$data = mysqli_query($con,"SELECT * FROM seri_off WHERE idseri_off='$idseri_off' ");

while ($noseri = mysqli_fetch_array($data)) {

?> 


<html>
<head>
<title>Seri</title>
</head>
<style>
/*Untuk form No SJ */
input[id=nolkpp]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 120px;
    left: 598px;
	}
		
		input[id=noseri]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 180px;
    left: 598px;
	}
	
	/*Untuk label samping */
    .nolkpp{
	font-size:15px;
   	position: absolute;
	top: 145px;
    left:490px;
   }
	
	/*Untuk label samping */
    .seri{
	font-size:15px;
   	position: absolute;
	top: 200px;
    left:490px;
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
	top: 412px;
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
	top: 412px;
    left: 750px;
}


</style>
<body>

<form action="proses_ubah_seri.php" method="post">
<input type="hidden" name="id" value= "<?= $noseri["idseri_off"]; ?>" >
<input type="text" id="nolkpp"   value= "<?= $noseri["idorderfk_off"]; ?>" name="lkppfk" readonly>
<input type="text" name="noseri" id="noseri"  value= "<?= $noseri["noseri_off"]; ?>"  required >
<label for="harga" class="nolkpp"> No LKPP </label>
<label for="harga" class="seri"> No Seri </label>


<button type="submit" name="submit" onclick="return confirm('Yakin Ubah Data ?');">Ubah data </button>
<button type="batal" name="batal"  target="" formnovalidate onclick="return confirm('Yakin Batal ?');">Batal </button>
</form>
   
   <?php
}
   ?>
   
   
   </body>
</html>
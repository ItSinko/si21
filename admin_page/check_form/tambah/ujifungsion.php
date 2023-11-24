<?php 
require '../../koneksi.php';


$nolkpp = $_POST['nolkpp'];
$invuji = $_POST['invuji'];
$tarifuji = $_POST['tarifuji'];
$tglbayar = $_POST['tglbayar'];
$kasuji = $_POST['kasuji'];
$ketuji = $_POST['ketuji'];
$iddsb = $_POST['iddsb'];
$id_prod = $_POST['id_prod'];
$tgluji = $_POST['tgluji'];


 //pengecekan nomer efaktur
$cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM piutang_on WHERE nolkppuji_on='$nolkpp' "));	

if ($cek > 0) {	
		
print "Maaf, No LKPP Sudah Pernah di Input !!"; 
			  
			  }		  
else
              
			  {				  
mysqli_query($con, "INSERT INTO piutang_on values('$nolkpp','$invuji','$tgluji','$tarifuji','$tglbayar','$kasuji','$ketuji','$iddsb','$id_prod') ");					
			print "Data Berhasil Di input!"; 
			  }

			  ?>





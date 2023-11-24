<?php 
require '../../koneksi.php';

$idorder = $_POST['idorder'];
$tgllunas = $_POST['tgllunas'];
$kas = $_POST['kas'];
$ket = $_POST['ket'];
$idprod = $_POST['idprod'];


//potong harga
	$diskonfp = $_POST['diskonfp'];
	$potongdiskonacc = substr ($diskonfp,3);
	$disfp = str_replace('.', '', $potongdiskonacc);
	

	
 //pengecekan nomer efaktur
$cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM acc_spb WHERE noacc_spb='$idorder' "));	

if ($cek > 0) {	
		
print "Maaf,ID Order Sudah Pernah di Input !!"; 
			  }
			  
else
              {
				  
	  
mysqli_query($con, "INSERT INTO acc_spb values('$idorder','$disfp','$tgllunas','$kas','$ket'
											  ,'$idprod') ");
									
			print "Data Berhasil Di input!"; 

			  }
?>





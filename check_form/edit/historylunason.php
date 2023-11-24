<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");

	$idlunas = $_POST['idlunas'];
	$nolkpp = $_POST['nolkpp'];
	$tgllunas = $_POST['tgllunas'];
	$ket = $_POST['ket'];
	
	
		
		//potong harga
	$nilai = $_POST['nilai'];
	$potongnilai = substr ($nilai,3);
	$nilai_uji = str_replace('.', '', $potongnilai);
	
	
	
 
$update =   "UPDATE history_lunas_on SET 
			
			tgl_pelunasan = '$tgllunas',
			nilai_lunas = '$nilai_uji',
			ket_hs = '$ket',
			nolkppahs_fk = '$nolkpp'
			WHERE idlunas_on = '$idlunas' ";
		  
$result	= mysqli_query($con, $update);

print "Data Berhasil Di Update!"; 


?>




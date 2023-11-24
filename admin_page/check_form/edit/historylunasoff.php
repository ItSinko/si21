<?php 
require '../../koneksi.php';


	$idlunas = $_POST['idlunas'];
	$idorder = $_POST['idorder'];
	$tgllunas = $_POST['tgllunas'];
	$ket = $_POST['ket'];
	
	
		
		//potong harga
	$nilai = $_POST['nilai'];
	$potongnilai = substr ($nilai,3);
	$nilai_uji = str_replace('.', '', $potongnilai);
	
	
	
 
$update =   "UPDATE history_lunas_off SET 
			
			tgl_pelunasan = '$tgllunas',
			nilai_lunas = '$nilai_uji',
			ket_hs = '$ket',
			idorderahs_fk = '$idorder'
			WHERE idlunas_off = '$idlunas' ";
		  
$result	= mysqli_query($con, $update);

print "Data Berhasil Di Update!"; 


?>




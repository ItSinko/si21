	<?php 
   require '../../koneksi.php';


	$nolkpp = $_POST['nolkpp'];
	$tgllunas = $_POST['tgllunas'];
	$ket = $_POST['ket'];
	
	//potong harga
	$nilai = $_POST['nilai'];
	$potongnilai = substr ($nilai,3);
	$nilai_uji = str_replace('.', '', $potongnilai);
	
	
	
	
	
	
	
	
	mysqli_query($con, "INSERT INTO history_lunas_on VALUES('','$tgllunas','$nilai_uji','$ket','$nolkpp') ");
	
	print "Data Berhasil Di input!"; 
	

		
?>
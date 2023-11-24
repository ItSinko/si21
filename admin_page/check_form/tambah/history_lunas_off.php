	<?php 
   require '../../koneksi.php';



	$idorder = $_POST['idorder'];
	$tgllunas = $_POST['tgllunas'];
	$ket = $_POST['ket'];
	
	//potong harga
	$nilai = $_POST['nilai'];
	$potongnilai = substr ($nilai,3);
	$nilai_uji = str_replace('.', '', $potongnilai);
	
	
	
	
	
	
	
	
	mysqli_query($con, "INSERT INTO history_lunas_off VALUES('','$tgllunas','$nilai_uji','$ket','$idorder') ");
	
	print "Data Berhasil Di input!"; 
	

		
?>
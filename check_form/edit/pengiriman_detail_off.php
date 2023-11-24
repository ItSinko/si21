<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");

$ideksoff = $_POST['ideksoff'];
$idordereks = $_POST['idordereks'];
$tglrealisasioff = $_POST['tglrealisasioff'];
$jumlahkirimoff = $_POST['jumlahkirimoff'];
$noresioff = $_POST['noresioff'];
$keteksoff = $_POST['keteksoff'];
$nilaioff = $_POST['nilaioff'];
$jasafk_off = $_POST['jasafk_off'];
	
	//proses harga
	$nilaioff = $_REQUEST["nilaioff"];
	$potongnilai= substr ($nilaioff,3);
	$nilai_kirim = str_replace('.', '', $potongnilai);

$update=  "UPDATE ekspedisi2_off SET idordereks_fk='$idordereks',tglkirim_off='$tglrealisasioff',jumlaheks_off='$jumlahkirimoff',noresi_off='$noresioff',nilai_off='$nilai_kirim',jasafk_off='$jasafk_off',keteks2_off='$keteksoff' WHERE ideks_off= '$ideksoff'";
		  		  
		  
$sql_1 = mysqli_num_rows(mysqli_query($con,"SELECT * FROM ongkirdb_off WHERE idorderfk_off ='$idordereks' "));	

$sql_2 = mysqli_query($con,"SELECT * FROM ongkirdb_off WHERE idorderfk_off ='$idordereks' ");	
			  
			  


			  
			  
			  if ($sql_1 > 0) {
while($row = mysqli_fetch_array($sql_2)){		
$idongkir =  $row['idongkir_off']; 
}

$ongkir= "UPDATE ongkirdb_off SET   		nilai='$nilai_kirim'
									   WHERE idongkir_off = '$idongkir' ";
		  

$result		= mysqli_query($con, $update);

$result2	= mysqli_query($con, $ongkir);

print "Data Berhasil Di Update !"; 

 		  
}
else  {

$result		= mysqli_query($con, $update);

print "Data Berhasil Di Update !!"; 
	
}

	

?>














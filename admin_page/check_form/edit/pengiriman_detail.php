<?php 
require '../../koneksi.php';


$ideks = $_POST['ideks'];
$nolkpp = $_POST['nolkpp'];
$tglreal = $_POST['tglreal'];
$dikirim = $_POST['dikirim'];
$noresi = $_POST['noresi'];
$ket = $_POST['ket'];
	
	//proses harga
	$nilai = $_REQUEST["nilai"];
	$potongnilai= substr ($nilai,3);
	$nilai_kirim = str_replace('.', '', $potongnilai);


$jasafk_on = $_POST['jasafk_on'];

$update=  "UPDATE ekspedisi2_on SET nolkppeksfk_on='$nolkpp',tglkirim_on='$tglreal',jumlaheks_on='$dikirim',noresi_on='$noresi',nilai_on='$nilai_kirim',jasafk_on='$jasafk_on',keteks2_on='$ket' WHERE ideks_on= '$ideks'";
		  		  
		  
$sql_1 = mysqli_num_rows(mysqli_query($con,"SELECT * FROM ongkirdb_on WHERE nolkppkirfk_on ='$nolkpp' "));	

$sql_2 = mysqli_query($con,"SELECT * FROM ongkirdb_on WHERE nolkppkirfk_on ='$nolkpp' ");	
			  
			  
if ($sql_1 > 0) {
while($row = mysqli_fetch_array($sql_2)){		
$idongkir =  $row['idongkir_on']; 
}

$ongkir= "UPDATE ongkirdb_on SET   		nilai='$nilai_kirim',
									   nolkppkirfk_on='$nolkpp' 
									   WHERE idongkir_on = '$idongkir'";
		  

$result		= mysqli_query($con, $update);

$result2	= mysqli_query($con, $ongkir);

print "Data Berhasil Di Update !"; 

 		  
}
else  {
	
	
	
$result		= mysqli_query($con, $update);

	
}
		  
		
?>














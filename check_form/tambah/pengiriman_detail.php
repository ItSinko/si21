<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");

$nolkpp = $_POST['nolkpp'];
$tglreal = $_POST['tglreal'];
$dikirim = $_POST['dikirim'];
$noresi = $_POST['noresi'];
$ket = $_POST['ket'];
$jasafk_on = $_POST['jasafk_on'];

	//proses harga
	$nilai = $_REQUEST["nilai"];
	$potongnilai= substr ($nilai,3);
	$nilai_kirim = str_replace('.', '', $potongnilai);



$query= "INSERT INTO ekspedisi2_on (ideks_on,nolkppeksfk_on,tglkirim_on,jumlaheks_on,noresi_on,nilai_on,jasafk_on,keteks2_on ) VALUES ('','$nolkpp','$tglreal','$dikirim','$noresi','$nilai_kirim','$jasafk_on','$ket')";


$sql_1 = mysqli_query($con,"SELECT * FROM spa_on WHERE nolkpp_on ='$nolkpp' ");	
		  
	
		//memasukkan ongkos 	
$ongkir = "INSERT INTO ongkirdb_on (idongkir_on,nilai,nolkppkirfk_on) VALUES  ('', '$nilai_kirim', '$nolkpp')";
	
	
	
while($row = mysqli_fetch_array($sql_1)){		

$dsb =  $row['pabrik_on']; 

} 
	

if ($dsb=='SPA')  

	{ 
	mysqli_query($con, $query);
	print "Data Berhasil Di input !! "; 
	}  

	else 
		
	{
	mysqli_query($con, $query);	
	mysqli_query($con, $ongkir);	
    print "Data Berhasil Di input ! "; 	
	}

?>






<?php 
require '../../koneksi.php';


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



$query= "INSERT INTO ekspedisi2_off (ideks_off,idordereks_fk, tglkirim_off ,jumlaheks_off ,noresi_off,nilai_off,jasafk_off,keteks2_off ) VALUES ('','$idordereks','$tglrealisasioff','$jumlahkirimoff','$noresioff','$nilai_kirim','$jasafk_off','$keteksoff')";

$sql_1 = mysqli_query($con,"SELECT * FROM spa_off WHERE idorder_off ='$idordereks' ");	
		  
	
		//memasukkan ongkos 	
$ongkir = "INSERT INTO ongkirdb_off (idongkir_off,nilai,idorderfk_off) VALUES  ('', '$nilai_kirim', '$idordereks')";
	
	
while($row = mysqli_fetch_array($sql_1)){		

$dsb =  $row['pabrik_off']; 

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






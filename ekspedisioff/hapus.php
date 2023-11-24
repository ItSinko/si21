<?php
$con=mysqli_connect("localhost","root","","kontrol_db");

$idordereks_off= $_REQUEST["idordereks_off"];

$sql="SELECT * FROM ekspedisi_off INNER JOIN spa_off ON spa_off.idorder_off = ekspedisi_off.idordereks_fk WHERE idordereks_off='$idordereks_off'";
$sql2="SELECT * FROM ekspedisi_off INNER JOIN ekspedisi2_off ON ekspedisi2_off.idordereks_fk = ekspedisi_off.idordereks_off WHERE idordereks_off='$idordereks_off'";
$query = mysqli_query($con, $sql);
$query2 = mysqli_query($con, $sql2);
while ($rows = mysqli_fetch_array($query)) {
	
	  //nama distributor
  $distributor =  $rows['pabrikeks_off'];
	

}
if($distributor == "SPA"){

	$hapusa = "DELETE  ekspedisi_off, ekspedisi2_off 
				FROM ekspedisi_off INNER JOIN ekspedisi2_off 
				ON ekspedisi_off.idordereks_off=ekspedisi2_off.idordereks_fk WHERE idordereks_off = '$idordereks_off' ";
										
	$result	= mysqli_query($con, $hapusa);
	echo" 
		<script>
			alert('data berhasil hapus!');
			document.location.href = './index.php?hlm=eksoff';
		</script>
	";
}else if($distributor != "SPA" && mysqli_num_rows($query2) > 0){
	$hapusb = "DELETE  ekspedisi_off, ekspedisi2_off 
				FROM ekspedisi_off INNER JOIN ekspedisi2_off 
				ON ekspedisi_off.idordereks_off=ekspedisi2_off.idordereks_fk WHERE idordereks_off = '$idordereks_off' ";
	$hapusc = "DELETE FROM ongkirdb_off WHERE idorderfk_off='$idordereks_off' ";									
	$resulta	= mysqli_query($con, $hapusb);
	$resultb	= mysqli_query($con, $hapusc);
	
	echo" 
		<script>
			alert('data berhasil hapus! spa');
			document.location.href = './index.php?hlm=eksoff';
		</script>
	";
}else{
	$hapusd = "DELETE FROM ekspedisi_off WHERE idordereks_off='$idordereks_off'";
	$resultd = mysqli_query($con,$hapusd);
	
	echo" 
		<script>
			alert('data berhasil hapus!');
			document.location.href = './index.php?hlm=eksoff';
		</script>
	";
}
?>
	
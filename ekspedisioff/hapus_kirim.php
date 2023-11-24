<?php
$con = mysqli_connect("localhost","root","","kontrol_db");
$ideks_off= $_REQUEST["ideks_off"];

//1. mengambil data nolkpp dan harga 
$data = mysqli_query($con,"SELECT * FROM ekspedisi2_off WHERE ideks_off='$ideks_off' ");
while ($kirim = mysqli_fetch_array($data)) {

//parameter untuk nolkpp
$parameter_nolkpp=$kirim["idordereks_fk"]; 

//parameter untuk nilai 
$parameter_nilai=$kirim["nilai_off"]; 


}


$hapusa = "DELETE FROM ongkirdb_off WHERE idorderfk_off='$parameter_nolkpp' AND nilai=$parameter_nilai ";

$hapus =  "DELETE FROM ekspedisi2_off WHERE ideks_off='$ideks_off'";


$resultb	= mysqli_query($con, $hapus);
$resulta	= mysqli_query($con, $hapusa);	
	
	
	echo" 
		<script>
			alert('data berhasil hapus!');
			document.location.href = './index.php?hlm=eksoff&aksi=more&idordereks_off=$idordereks_off';
		</script>
	";
	
	
	
	?>
	
	
	
	
	
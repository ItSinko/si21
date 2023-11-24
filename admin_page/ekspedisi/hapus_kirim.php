<?php
require '../../koneksi.php';


$ideks_on= $_REQUEST["ideks_on"];

//1. mengambil data nolkpp dan harga 
$data = mysqli_query($con,"SELECT * FROM ekspedisi2_on WHERE ideks_on='$ideks_on' ");
while ($kirim = mysqli_fetch_array($data)) {

//parameter untuk nolkpp
$parameter_nolkpp=$kirim["nolkppeksfk_on"]; 

//parameter untuk nilai 
$parameter_nilai=$kirim["nilai_on"]; 


}



$hapusa = "DELETE FROM ongkirdb_on WHERE nolkppkirfk_on='$parameter_nolkpp' AND nilai=$parameter_nilai ";
$hapus =  "DELETE FROM ekspedisi2_on WHERE ideks_on='$ideks_on'";



$resultb	= mysqli_query($con, $hapus);
	$resulta	= mysqli_query($con, $hapusa);	
	
	
	echo" 
		<script>
			alert('data berhasil hapus!');
			document.location.href = './index.php?hlm=ekson&aksi=more&nolkppeks_on=$nolkppeks_on';
		</script>
	";
	
	?>
	?>
	
	
	
	
<?php
$con = mysqli_connect("localhost","root","","kontrol_db");
$ideks_spb= $_REQUEST["ideks_spb"];


$hapus =  "DELETE FROM ekspedisi2_spb WHERE ideks_spb='$ideks_spb'";


$resultb	= mysqli_query($con, $hapus);

	
	
	echo" 
		<script>
			alert('data berhasil hapus!');
			document.location.href = 'ekspedisi.php';
		</script>
	";
	
	
	
	?>
	
	
	
	
	
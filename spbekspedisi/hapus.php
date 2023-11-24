<?php

$con=mysqli_connect("localhost","root","","kontrol_db");

$noeks_spb= $_REQUEST["noeks_spb"];

$cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM ekspedisi2_spb WHERE noeksfk_spb='$noeks_spb'"));

$hapus_a = "DELETE ekspedisi_spb, ekspedisi2_spb FROM ekspedisi_spb INNER JOIN ekspedisi2_spb ON ekspedisi_spb.noeks_spb=ekspedisi2_spb.noeksfk_spb WHERE noeks_spb=$noeks_spb";
$hapus_b = "DELETE FROM ekspedisi_spb  WHERE noeks_spb=$noeks_spb";

if ($cek > 0)
{
mysqli_query($con, $hapus_a);	
}
else 
{
mysqli_query($con, $hapus_b);	
	
}





echo" 
		<script>
			alert('Data berhasil dihapus!');
			document.location.href = './index.php?hlm=eksspb';
		</script>
	";
	
?>
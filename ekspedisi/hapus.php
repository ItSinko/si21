<?php
$con=mysqli_connect("localhost","root","","kontrol_db");

$nolkppeks_on= $_REQUEST["nolkppeks_on"];

$cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM ekspedisi2_on WHERE nolkppeksfk_on='$nolkppeks_on'"));
$hapus_a = "DELETE ekspedisi_on, ekspedisi2_on FROM ekspedisi_on INNER JOIN ekspedisi2_on ON ekspedisi_on.nolkppeks_on=ekspedisi2_on.nolkppeksfk_on  WHERE nolkppeks_on='$nolkppeks_on'";
$hapus_b = "DELETE FROM ekspedisi_on  WHERE nolkppeks_on='$nolkppeks_on'";


if($cek > 0) {
 mysqli_query($con, $hapus_a);
}
else
{
 mysqli_query($con, $hapus_b);
	
}
	echo" 
		<script>
			alert('data berhasil hapus!');
			document.location.href = './index.php?hlm=ekson';
		</script>
		
	";
	?>
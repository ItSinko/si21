<?php
require '../../koneksi.php';


$nocoo_on= $_REQUEST["nocoo_on"];

$hapus = "DELETE FROM detailcoo_on WHERE nocoo_on='$nocoo_on'";

$resultb	= mysqli_query($con, $hapus);
		
	echo" 
		<script>
			alert('data berhasil hapus!');
			document.location.href = 'detailcoo.php';
		</script>
	
	";
	

	?>
	<?php

require 'koneksi.php';

$ideks_spb = $_REQUEST["ideks_spb"];


	$hapus =  "DELETE FROM ekspedisi2_spb WHERE ideks_spb='$ideks_spb'";

	$resultb	= mysqli_query($con, $hapus);
		
	echo"
		<script>
			alert('data berhasil hapus!');
			document.location.href = './index.php?hlm=gudangspb&aksi=more&nogdg_spb=$nogdg_spb';
		</script>
		 
		 ";

	?>
	
	
	
	
	
	
	
	
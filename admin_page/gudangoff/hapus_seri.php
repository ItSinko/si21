<?php
require 'koneksi.php';


$idseri_off= $_REQUEST["idseri_off"];
$idordergdg_off= $_REQUEST["idordergdg_off"];

$hapus = "DELETE FROM seri_off WHERE idseri_off='$idseri_off'";

$resultb	= mysqli_query($con, $hapus);
		
	echo" 
		<script>
			alert('data berhasil hapus!');
			document.location.href = './index.php?hlm=gudangoff&aksi=more&idordergdg_off=$idordergdg_off';
		</script>
	";
	

	?>
	
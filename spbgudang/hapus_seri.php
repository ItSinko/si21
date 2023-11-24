<?php
$con=mysqli_connect("localhost","root","","kontrol_db");

$idseri_spb= $_REQUEST["idseri_spb"];

$hapus = "DELETE  FROM seri_spb WHERE idseri_spb='$idseri_spb'";

$resultb	= mysqli_query($con, $hapus);
		
	echo" 
		<script>
			alert('data berhasil hapus!');
			document.location.href = './index.php?hlm=gudangspb&aksi=more&nogdg_spb=$nogdg_spb';
		</script>
	";
	

	?>
	
<?php
//$con=mysqli_connect("localhost","root","","kontrol_db");

$idrate2= $_REQUEST["idrate2"];

$hapus = "DELETE FROM diskon_master WHERE idrate2='$idrate2'";

$resultb	= mysqli_query($con, $hapus);
		
	echo" 
		<script>
			alert('Data berhasil dihapus !');
			document.location.href = './index.php?hlm=diskon';
		</script>
	";
	

	?>
	
	
	
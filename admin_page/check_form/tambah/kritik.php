<?php

require '../../koneksi.php';


if (isset($_POST['submit'])) {
    $kritik = $_POST['kritik'];
    $pelapor = $_POST['pelapor'];
    $url = $_POST['url'];
   
 
 
	$tgl_aksi  = date("Y-m-d");
	ini_set('date.timezone', 'Asia/Jakarta');

 
 mysqli_query($con, "INSERT INTO kritik values('','$kritik','$pelapor','$tgl_aksi') ");




echo" 
		<script>
			alert('Terima Kasih, Kritik Berhasil di kirim !');
			document.location.href = '$url';
		</script>
	";



}
?>
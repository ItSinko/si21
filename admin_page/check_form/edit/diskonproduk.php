<?php 
require '../../koneksi.php';


$idrate2 = $_POST['idrate2'];
$iddsb = $_POST['iddsb'];
$diskonnota = $_POST['diskonnota'];
$tarifuji = $_POST['tarifuji'];
$temp = $_POST['temp'];
$ket = $_POST['ket'];


$update=  "UPDATE diskon_master SET  diskonnota='$diskonnota',diskonuji='$tarifuji',
		  temphari='$temp',ket='$ket'		  
		  WHERE idrate2= '$idrate2'";
		  
$result	= mysqli_query($con, $update);


print "Data Berhasil Di Update!"; 


?>






<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");

$iddsb = $_POST['iddsb'];
$distributor = $_POST['distributor'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$diskonnota = $_POST['diskonnota'];
$diskonuji = $_POST['diskonuji'];
$temp = $_POST['temp'];
$ket = $_POST['ket'];

 
 
$cek = mysqli_num_rows(mysqli_query($con,"SELECT * from distributor WHERE  iddsb='$iddsb' "));
if ($cek > 0 ) {
	
		
print "Maaf, ID Distributor Sudah Pernah di Input !!"; 
		
}
 
 
 else {
 
mysqli_query($con, "INSERT INTO distributor VALUES('$iddsb','$distributor','$telepon','$alamat','$diskonnota','$diskonuji','$temp','$ket') ");
	
print "Data Berhasil Di input!"; 


 }
?>






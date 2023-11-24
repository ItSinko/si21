<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");

$nolkpp = $_POST['nolkpp'];
$ket = $_POST['ket'];
$idprod_on = $_POST['idprod_on'];
$pabrik_on = $_POST['pabrik_on'];

$cek = mysqli_num_rows(mysqli_query($con,"SELECT * from ekspedisi_on WHERE  nolkppeks_on='$nolkpp' "));
if ($cek > 0 ) {
	
		
print "Maaf, No LKPP Sudah Pernah di Input !!"; 
		
}



 else {

mysqli_query($con, "INSERT INTO ekspedisi_on VALUES('$nolkpp','$ket','$pabrik_on','$idprod_on') ");

print "Data Berhasil Di input!"; 


 }
?>






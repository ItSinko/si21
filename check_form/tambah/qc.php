<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");

$nolkpp = $_POST['nolkpp'];
$tglserah = $_POST['tglserah'];
$tglterima = $_POST['tglterima'];
$idprod_on = $_POST['idprod_on'];
$idpabrik_on = $_POST['idpabrik_on'];
$ket = $_POST['ket'];


$cek = mysqli_num_rows(mysqli_query($con,"SELECT * from qc_on WHERE  nolkppqc_on='$nolkpp' "));
if ($cek > 0 ) {
	
		
print "Maaf, No LKPP Sudah Pernah di Input !!"; 
		
}
 
 
 else {
 
 

mysqli_query($con, "INSERT INTO qc_on VALUES('$nolkpp','$tglterima','$tglserah','$ket','$idpabrik_on','$idprod_on') ");
	
print "Data Berhasil Di input!"; 


 }
?>






<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");

$nolkpp = $_POST['nolkpp'];
$nosj = $_POST['nosj'];
$tglsj = $_POST['tglsj'];
$pabrik_on = $_POST['pabrik_on'];
$idprod_on = $_POST['idprod_on'];
$ket = $_POST['ket'];
 
$cek = mysqli_num_rows(mysqli_query($con,"SELECT * from gudang_on WHERE nolkppgdg_on='$nolkpp'"));

if ($cek > 0 ) {
print "Maaf, No LKPP Sudah Pernah di Input !!"; 
}
 
 else {
mysqli_query($con, "INSERT INTO gudang_on VALUES('$nolkpp','$nosj','$tglsj','$ket','$pabrik_on',
											  '$idprod_on') ");
print "Data Berhasil Di input!"; 


 }
?>






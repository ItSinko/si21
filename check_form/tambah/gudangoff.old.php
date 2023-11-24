<?php 
$con=mysqli_connect("localhost","root","","kontrol_db");

$idorder = $_POST['idorder'];
$nosj_off = $_POST['nosj_off'];
$tglsj_off = $_POST['tglsj_off'];
$ketgdg_off = $_POST['ketgdg_off'];
$pabrikgdg_off = $_POST['pabrikgdg_off'];
$idprodgdg_off = $_POST['idprodgdg_off'];
 
 
 
 
$cek = mysqli_num_rows(mysqli_query($con,"SELECT * from gudang_off WHERE idordergdg_off='$idorder'"));
if ($cek > 0 ) {
	
		
print "Maaf, ID Order Sudah Pernah di Input !!"; 
		
}
 
 else {
 
mysqli_query($con, "INSERT INTO gudang_off VALUES('$idorder','$nosj_off','$tglsj_off','$ketgdg_off','$pabrikgdg_off',
											  '$idprodgdg_off') ");
	
print "Data Berhasil Di input!"; 


 }
?>






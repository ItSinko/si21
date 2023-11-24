<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");

$idorder = $_POST['idorder'];
$nopo_off = $_POST['nopo_off'];
$tglpo_off = $_POST['tglpo_off'];
$nodo_off = $_POST['nodo_off'];
$tgldo_off = $_POST['tgldo_off'];
$ketadm_off = $_POST['ketadm_off'];
$iddsb = $_POST['iddsb'];
$id_prod = $_POST['id_prod'];


 
 
 
 
$cek = mysqli_num_rows(mysqli_query($con,"SELECT * from admjual_off WHERE  idorderadm_off='$idorder' "));
if ($cek > 0 ) {
	
		
print "Maaf, ID Order Sudah Pernah di Input !!"; 
		
}
 
 
 else {
 
 
 
 
 
 
 
 
 
 
mysqli_query($con, "INSERT INTO admjual_off VALUES('$idorder','$nopo_off','$tglpo_off','$nodo_off','$tgldo_off',
											  '$ketadm_off','$iddsb','$id_prod') ");
	
print "Data Berhasil Di input!"; 


 }
?>






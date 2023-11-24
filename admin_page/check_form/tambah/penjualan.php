<?php 
require '../../koneksi.php';


$nolkpp = $_POST['nolkpp'];
$nopo = $_POST['nopo'];
$tglpo = $_POST['tglpo'];
$nodo = $_POST['nodo'];
$tgldo = $_POST['tgldo'];
$idprod_on = $_POST['idprod_on'];
$pabrik_on = $_POST['pabrik_on'];
$ket = $_POST['ket'];

 
$cek = mysqli_num_rows(mysqli_query($con,"SELECT * from admjual_on WHERE  nolkppadm_on='$nolkpp' "));
if ($cek > 0 ) {
	
		
print "Maaf,No LKPP Sudah Pernah di Input !!"; 
		
}
 
 
 else {


mysqli_query($con, "INSERT INTO admjual_on values('$nolkpp','$nopo','$tglpo','$nodo','$tgldo','$ket',
											  '$pabrik_on','$idprod_on') ");
									
									
//Update Status 					
//$update=  "UPDATE spa_on  SET    status_on='Sepakat'  WHERE nolkpp_on= '$nolkpp'";
//$result	= mysqli_query($con, $update);
									
print "Data Berhasil Di input!"; 


 }

?>
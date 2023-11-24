<?php 
require '../../koneksi.php';

$nomorgudang_spb = $_POST['nomorgudang_spb'];
$nosjgdg_spb = $_POST['nosjgdg_spb'];
$tglsjgdg_spb = $_POST['tglsjgdg_spb'];
$ketgdg_spb = $_POST['ketgdg_spb'];
$idprodgdg_spb = $_POST['idprodgdg_spb'];


 
$cek = mysqli_num_rows(mysqli_query($con,"SELECT * from gudang_spb WHERE nogdg_spb='$nomorgudang_spb' "));
if ($cek > 0 ) {
	
		
print "Maaf, No Order Sudah Pernah di Input !!"; 
		
}
 
 
 else {
mysqli_query($con, "INSERT INTO gudang_spb VALUES('$nomorgudang_spb','$nosjgdg_spb','$tglsjgdg_spb','$ketgdg_spb','$idprodgdg_spb') ");
print "Data Berhasil Di input!"; 

}

?>



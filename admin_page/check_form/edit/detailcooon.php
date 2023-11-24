<?php 
require '../../koneksi.php';


$tandacoo = $_POST['tandacoo'];
$tglkirim = $_POST['tglkirim'];
$nocoo = $_POST['nocoo'];
$nolkpp = $_POST['nolkpp'];

$update=  "UPDATE detailcoo_on SET tglkirimcooon = '$tglkirim', tandacooon='$tandacoo' 
		  WHERE nocoo_on= $nocoo OR nolkppcoo_on = $nolkpp ";
		  
$result	= mysqli_query($con, $update);
	
	

print "Data Berhasil Di Update!"; 

?>




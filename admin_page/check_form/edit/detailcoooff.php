<?php 
require '../../koneksi.php';


$tandacoo = $_POST['tandacoo'];
$tglkirim = $_POST['tglkirim'];
$nocoo = $_POST['nocoo'];
$nolkpp = $_POST['nolkpp'];

$update=  "UPDATE detailcoo_off SET tglkirimcoo_off = '$tglkirim', tandaterima_off='$tandacoo' 
		  WHERE nocoo_off = '$nocoo' OR idordercoo_off = '$nolkpp' ";
		  
$result	= mysqli_query($con, $update);
	
	

print "Data Berhasil Di Update!"; 

?>




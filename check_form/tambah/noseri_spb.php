<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");

$idseri = $_POST['idseri'];
$noseri = $_POST['noseri'];

	
$cek = mysqli_num_rows(mysqli_query($con,"SELECT * from seri_spb WHERE  noseri_spb='$noseri' "));

if ($cek > 0 ) {	
print "Maaf, No Seri Sudah Pernah di Input !!"; 		
}
  
else {
mysqli_query($con, "INSERT INTO seri_spb values('','$noseri','$idseri',1) ");
print "Data Berhasil Di input!"; 


}

?>
<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");

$idorder = $_POST['idorder'];
$tglterima_off = $_POST['tglterima_off'];
$tglserah_off = $_POST['tglserah_off'];
$ketqc_off = $_POST['ketqc_off'];
$iddsbqc = $_POST['iddsbqc'];
$id_prodqc = $_POST['id_prodqc'];


 
$cek = mysqli_num_rows(mysqli_query($con,"SELECT * from qc_off WHERE  idorderqc_off='$idorder' "));
if ($cek > 0 ) {
	
		
print "Maaf, ID Order Sudah Pernah di Input !!"; 
		
}
 
 
 else {
 
 
 
 
 
 
 
 
 
 
mysqli_query($con, "INSERT INTO qc_off VALUES('$idorder','$tglterima_off','$tglserah_off','$ketqc_off','$iddsbqc',
											  '$id_prodqc') ");
	
print "Data Berhasil Di input!"; 


 }
?>






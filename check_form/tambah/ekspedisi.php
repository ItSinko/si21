<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");

$ekspedisi = $_POST['ekspedisi'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];
$via = $_POST['via'];
$jurusan = $_POST['jurusan'];
$ket = $_POST['ket'];

 
$cek = mysqli_num_rows(mysqli_query($con,"SELECT * from jasaeks WHERE  nama_eks='$ekspedisi' "));
if ($cek > 0 ) {
	
		
print "Maaf, ID Distributor Sudah Pernah di Input !!"; 
		
}
 
 
 else {

mysqli_query($con, "INSERT INTO jasaeks VALUES('','$ekspedisi','$telp','$alamat','$via','$jurusan','$ket') ");
	
print "Data Berhasil Di input!"; 


 }
?>






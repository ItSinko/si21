<?php 
$con=mysqli_connect("localhost","root","","kontrol_db");

$pk_seri = $_POST['pk_seri'];
$nocoo = $_POST['nocoo'];
$noseri = $_POST['noseri'];
$nolkpp = $_POST['nolkpp'];
$bulan = $_POST['bulan'];

$pabrik_on = $_POST['pabrik_on'];
$idprod_on = $_POST['idprod_on'];


 //pengecekan nomer efaktur
$cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM detailcoo_on WHERE nosericooon='$noseri' "));	

if ($cek > 0) {
print "Maaf,No LKPP Sudah Pernah di Input !!"; 
			  
			  }
else
              {
mysqli_query($con, "INSERT INTO detailcoo_on values('$nocoo','$nolkpp','$bulan','$noseri','-','$pabrik_on','$pk_seri','123','-','-') ");						
			print "Data Berhasil Di input!"; 

			
			
			  }
?>





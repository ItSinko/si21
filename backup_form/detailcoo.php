<?php 
$con=mysqli_connect("localhost","root","","kontrol_db");


$pk_seri = $_POST['pk_seri'];

$noseri = $_POST['noseri'];
$nolkpp = $_POST['nolkpp'];
$bulan = $_POST['bulan'];
$pabrik_on = $_POST['pabrik_on'];
$idprod_on = $_POST['idprod_on'];






 //pengecekan nomer efaktur
$cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM detailcoo_on WHERE idserifk_on='$pk_seri' "));	

if ($cek > 0) {
print "Maaf,No Seri Sudah Pernah di Input !!"; 
			  
			  }
else
	















              {
				  $que= "SELECT max(nocoo_on + 0) as macoo FROM detailcoo_on";
$hasilnya = mysqli_query($con,$que);
$data = mysqli_fetch_array($hasilnya);
$nomercoo = $data['macoo'];
//convert to int
$nourut = (int)($nomercoo);
//plus
$nourut++;
//format string
$newID = sprintf("%01s",$nourut);

mysqli_query($con, "INSERT INTO detailcoo_on values('$newID','$nolkpp','$bulan','$noseri','-','$pabrik_on',$idprod_on,$pk_seri,'-','-') ");						
			print "Data Berhasil Di input!"; 

			
			
			  }
?>





<?php 
require '../../koneksi.php';


$pk_seri = $_POST['pk_seri'];

$noseri = $_POST['noseri'];
$nolkpp = $_POST['nolkpp'];
$bulan = $_POST['bulan'];
$pabrikcoo_off = $_POST['pabrikcoo_off'];
$idprodcoo_off = $_POST['idprodcoo_off'];






 //pengecekan nomer efaktur
$cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM detailcoo_off WHERE idserifk_off='$pk_seri' "));	

if ($cek > 0) {
print "Maaf,No Seri Sudah Pernah di Input !!"; 

}
else{

	$que= "SELECT max(nocoo_off + 0) as macoo FROM detailcoo_off";
	$hasilnya = mysqli_query($con,$que);
	$data = mysqli_fetch_array($hasilnya);
	$nomercoo = $data['macoo'];
	//convert to int
	$nourut = (int)($nomercoo);
	//plus
	$nourut++;
	//format string
	$newID = sprintf("%01s",$nourut);

	mysqli_query($con, "INSERT INTO detailcoo_off values('$newID','$nolkpp','$bulan','$noseri','-','$pabrikcoo_off',$idprodcoo_off,$pk_seri,'-','-') ");						
	print "Data Berhasil Di input!"; 
			
}
?>





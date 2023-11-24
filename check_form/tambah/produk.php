<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");

$kode = $_POST['kode'];
$merk = $_POST['merk'];
$type = $_POST['type'];
$namaprd = $_POST['namaprd'];
$satuan = $_POST['satuan'];
$kategori = $_POST['kategori'];
$noakd = $_POST['noakd'];
$jatuhakd = $_POST['jatuhakd'];

$harga = $_POST['harga'];
$potongharga = substr ($harga,3);
$hrg = str_replace('.', '', $potongharga);


$hargadpp = $_POST['hargadpp'];
$potongdpp = substr ($hargadpp,3);
$hrgdpp = str_replace('.', '', $potongdpp);


$namacoo = $_POST['namacoo'];
$ket = $_POST['ket'];
 
 
 
 
$cek = mysqli_num_rows(mysqli_query($con,"SELECT * from produk_master WHERE  sing_prod='$type' "));
if ($cek > 0 ) {
	
		
print "Maaf, Type Produk Sudah Pernah di Input !!"; 
		
}
 
 
 else {
 
 
 
 
 
 
 
 
 
 
mysqli_query($con, "INSERT INTO produk_master VALUES('','$merk','$type','$namaprd','$satuan','$hrg','$hrgdpp',
											  '$noakd','$namacoo','$ket','$jatuhakd','$kategori',
											   '$kode') ");
	
print "Data Berhasil Di input!"; 


 }
?>






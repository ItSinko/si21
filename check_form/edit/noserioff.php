
<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");

$idseri = $_POST['idseri'];
$noseri = $_POST['noseri'];
$idorderfk =  $_POST['idorderfk'];
$ket_log =  $_POST['ket_log'];

$cek = mysqli_num_rows(mysqli_query($con,"SELECT * from seri_off WHERE noseri_off='$noseri' "));
if ($cek > 0 ) {
	
print "Maaf, No Seri Sudah Pernah di Input !!"; 		
}
  
else {

mysqli_query($con, "UPDATE seri_off SET 
			noseri_off = '$noseri',
			idorderfk_off = '$idorderfk'
			WHERE idseri_off = '$idseri' ");
 

}


	//USER LOG
$user_aksi = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$tgl_aksi  = date("Y-m-d");
ini_set('date.timezone', 'Asia/Jakarta');
$jam_aksi  =  date('H:i:s');


$get_log = "INSERT INTO userlog VALUES('','$noseri','$user_aksi','Ubah','Nomer Seri (Offline)','$tgl_aksi','$jam_aksi','$ket_log')";	

	

//LOG
$user_log	= mysqli_query($con, $get_log);	


print "Data Berhasil Di Update!";
 
?>
<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");

$nolkpp = $_POST['nolkpp'];
$tglserah = $_POST['tglserah'];
$tglterima = $_POST['tglterima'];
$idprod_on = $_POST['idprod_on'];
$idpabrik_on = $_POST['idpabrik_on'];
$ket = $_POST['ket'];
$ket_log = $_POST['ket_log'];
 
$update =   "UPDATE qc_on SET 
			tglterima_on = '$tglterima',
			tglserah_on = '$tglserah',
			ketqc_on = '$ket',
			pabrikqc_on = '$idpabrik_on',
			idprodqc_on = '$idprod_on' WHERE nolkppqc_on = '$nolkpp' ";
		  
$result	= mysqli_query($con, $update);


	//USER LOG
$user_aksi = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$tgl_aksi  = date("Y-m-d");
ini_set('date.timezone', 'Asia/Jakarta');
$jam_aksi  =  date('H:i:s');


$get_log = "INSERT INTO userlog VALUES('','LKPP $nolkpp','$user_aksi','Ubah','QC (Online)','$tgl_aksi','$jam_aksi','$ket_log')";	

	

//LOG
$user_log	= mysqli_query($con, $get_log);	



print "Data Berhasil Di Update!"; 



?>




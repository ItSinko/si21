<?php 
require '../../koneksi.php';


$ideks = $_POST['ideks'];
$ekspedisi = $_POST['ekspedisi'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];
$via = $_POST['via'];
$jurusan = $_POST['jurusan'];
$ket = $_POST['ket'];
$ket_log = $_POST['ket_log'];


$update=  "UPDATE jasaeks SET nama_eks = '$ekspedisi',nomer_eks='$telp',alamat_eks='$alamat',via='$via',jurusan='$jurusan',ket_eks='$ket' WHERE id_eks= '$ideks'";
		  
$result	= mysqli_query($con, $update);




//USER LOG
$user_aksi = $_POST['username'];
$tgl_aksi  = date("Y-m-d");
ini_set('date.timezone', 'Asia/Jakarta');
$jam_aksi  =  date('H:i:s');


$get_log = "INSERT INTO userlog VALUES('','$ekspedisi','$user_aksi','Ubah','Nama Ekspedisi','$tgl_aksi','$jam_aksi','$ket_log')";	
$user_log	= mysqli_query($con, $get_log);	
	
	







	
print "Data Berhasil Di Update!";
 
?>
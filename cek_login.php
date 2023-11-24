<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($con,"select * from user where BINARY username ='$username' and BINARY password ='$password'");
 
 //update data 
$update ="UPDATE user SET status = 1 WHERE username = '$username' ";
		  
		   
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	
	$result	= mysqli_query($con, $update);
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:admin_page/index.php");

}else{
	
	header("location:index.php?pesan=gagal");

}
?>
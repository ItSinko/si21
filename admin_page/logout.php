<?php 
// mengaktifkan session
session_start();

require 'koneksi.php';

 //update data 
$username = $_SESSION['username']; 
$update ="UPDATE user SET status = 0 WHERE username = '$username' ";
$result	= mysqli_query($con, $update);		  
 
// menghapus semua session

session_destroy();

 
 
// mengalihkan halaman sambil mengirim pesan logout
header("location:../index.php?pesan=logout");
?>
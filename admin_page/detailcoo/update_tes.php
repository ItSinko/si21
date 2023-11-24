<?php
//$con=mysqli_connect("localhost","root","","kontrol_db");

if(isset($_POST)){
	$sql = "UPDATE detailcoo_on SET ".$_POST['name']."='".$_POST['value']."' WHERE nocoo_on=".$_POST['pk'];
	mysqli_query($con,$query);
	echo 'Update Data Berhasil.';
}





?>
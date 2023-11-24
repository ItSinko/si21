<form action="" method="post">
<input type="text" name="nosericooon">


<button name="proses">Proses</button>
</form>

<?php

//$con=mysqli_connect("localhost","root","","kontrol_db");

if (isset($_REQUEST['proses'])) {

	
$nosericooon = $_REQUEST["nosericooon"];


	$update= "UPDATE detailcoo_on SET bulan_on='$nosericooon'
								   
		                      WHERE nosericooon = 'FR' ";
	
	$result	= mysqli_query($con, $update);
	
 }
 
 ?>
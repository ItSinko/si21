
<?php

$con= mysqli_connect("localhost","root","","kontrol_db");

$field = $_POST['field'];
$value = $_POST['value'];
$editid = $_POST['id'];

$query = "UPDATE acc_on SET ".$field."='".$value."' WHERE nolkppacc_on=".$editid;
mysqli_query($con,$query);

echo 1;


?>
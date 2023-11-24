<?php

$con= mysqli_connect("localhost","root","","tutorial");

$field = $_POST['field'];
$value = $_POST['value'];
$editid = $_POST['id'];

$query = "UPDATE users SET ".$field."='".$value."' WHERE nocoo_on=".$editid;
mysqli_query($con,$query);

echo 1;
?>
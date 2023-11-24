<?php  

$connect = mysqli_connect("localhost", "root", "", "kontrol_db"); 
if(isset($_POST["type"]))
{
 
 $type = mysqli_real_escape_string($connect, $_POST["type"]);
 $query = "SELECT * FROM produk_master WHERE sing_prod = '".$type."'";
 $result = mysqli_query($connect, $query);
 echo mysqli_num_rows($result);

 }
 
?>
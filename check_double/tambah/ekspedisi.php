<?php  
//check.php  
$connect = mysqli_connect("localhost", "root", "", "kontrol_db"); 
if(isset($_POST["ekspedisi"]))
{
 
 $ekspedisi = mysqli_real_escape_string($connect, $_POST["ekspedisi"]);
 $query = "SELECT * FROM jasaeks WHERE nama_eks = '".$ekspedisi."'";
 $result = mysqli_query($connect, $query);
 echo mysqli_num_rows($result);

 }
?>
<?php  
//check.php  
$connect = mysqli_connect("localhost", "root", "", "kontrol_db"); 
if(isset($_POST["nolkpp"]))
{
 
 $nolkpp = mysqli_real_escape_string($connect, $_POST["nolkpp"]);
 $query = "SELECT * FROM spa_on WHERE nolkpp_on = '".$nolkpp."'";
 $result = mysqli_query($connect, $query);
 echo mysqli_num_rows($result);

 }
?>
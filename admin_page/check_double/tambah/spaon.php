<?php  
require '../../koneksi.php';


if(isset($_POST["nolkpp"]))
{
 
 $nolkpp = mysqli_real_escape_string($con, $_POST["nolkpp"]);
 $query = "SELECT * FROM spa_on WHERE nolkpp_on = '$nolkpp'";
 $result = mysqli_query($con, $query);
 echo mysqli_num_rows($result);

 }
?>
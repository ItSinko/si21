<?php 
$iddsb = $_POST['iddsb'];
$kategori = $_POST['kategori'];
$diskonnota = $_POST['diskonnota'];
$diskonuji = $_POST['diskonuji'];
$temp = $_POST['temp'];
$ket = $_POST['ket'];


///$con=mysqli_connect("localhost","root","","kontrol_db");
$sql_1 = mysqli_query($con,"SELECT * FROM produk_master WHERE kategori ='$kategori' ");


$cek = mysqli_num_rows(mysqli_query($con,"SELECT * from diskon_master WHERE pabrikfk ='$iddsb' AND kategori_diskon = '$kategori' "));


if ($cek > 0 ) {
print "Maaf, Kategori dan Distributor Sudah Pernah Di input"; 
			   }
			   
 
else {
while($row = mysqli_fetch_array($sql_1)){		

 $idprod =  $row['id_prod']; 
 

 $query ="INSERT INTO diskon_master (idrate2, diskonnota, diskonuji, temphari, pabrikfk, idprodfk, ket, kategori_diskon) VALUES ( '','$diskonnota','$diskonuji',$temp,'$iddsb','$idprod','$ket','$kategori')";
        mysqli_query($con, $query);
	
	}
	
	
print "Data Berhasil Di input!"; 
	 
	 }

?>































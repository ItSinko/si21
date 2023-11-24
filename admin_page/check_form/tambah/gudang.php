	<?php 
   require '../../koneksi.php';


   
   if(isset($_POST["tambah"]))  
    { 

	$a = $_POST['nolkpp'];
	$nosj = $_POST['nosj'];
	$tglsj = $_POST['tglsj'];

	$ket = $_POST['ket'];
	$pabrik_on = $_POST['pabrik_on'];
	
	
	
	//Pemberian Koma
	$in = '(' . implode(',', $a) .')';
 
	$sql = 'SELECT * FROM spa_on WHERE nolkpp_on IN ' . $in;

	$query=mysqli_query($con,$sql);
	   
	while ($row = mysqli_fetch_array($query)) {

	$j[] =  $row['idprod_on'];
	$k[] =  $row['nolkpp_on'];

	}	
	
	

foreach(array_combine($j, $k) as $idprod => $nolkpp)

{
	 $query = "INSERT INTO gudang_on VALUES('$nolkpp','SPA-$nosj','$tglsj','$ket','$pabrik_on',
											  '$idprod') ";
	
			 mysqli_query($con, $query);
}
	
	
echo
		  "<script>
	      alert('Data Berhasil Ditambahkan !');
	      document.location.href= '../../index.php?hlm=gudangon';
		  </script>";
	
	
	}
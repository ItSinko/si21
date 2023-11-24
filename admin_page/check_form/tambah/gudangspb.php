

	<?php 
  require '../../koneksi.php';


  
  
  
    if(isset($_POST["tambah"]))  
    { 

$nosjgdg_spb = $_POST['nosjgdg_spb'];
$tglsjgdg_spb = $_POST['tglsjgdg_spb'];
$ketgdg_spb = $_POST['ketgdg_spb'];
$idprodgdg_spb = $_POST['idprodgdg_spb'];
$nomorgudang_spb = $_POST['nomorgudang_spb'];
$nomorgudang_spb = $_POST['nomorgudang_spb'];


	//Pemberian Koma
	$in = '(' . implode(',', $nomorgudang_spb) .')';
	
	$sql = 'SELECT * FROM spb WHERE nospb IN ' . $in;
	


	$query=mysqli_query($con,$sql);
	   
	while ($row = mysqli_fetch_array($query)) {

	$j[] =  $row['idprod_spb'];
	$k[] =  $row['nospb'];

	}	

foreach(array_combine($j, $k) as $idprod => $idorderspb)

{
	 
	
	$query = "INSERT INTO gudang_spb VALUES('$idorderspb','B.$nosjgdg_spb','$tglsjgdg_spb','$ketgdg_spb','$idprod') ";
	
			 mysqli_query($con, $query);
}

	

echo
		  "<script>
	      alert('Data Berhasil Ditambahkan !');
	      document.location.href= '../../index.php?hlm=gudangspb';
		  </script>";
	


	
	}
?>



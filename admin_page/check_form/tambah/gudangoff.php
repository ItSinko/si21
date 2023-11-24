	<?php 
	require '../../koneksi.php';

	 //$con= mysqli_connect("localhost", "root","","kontrol_db");
    // Check if form is submitted successfully 
    if(isset($_POST["tambah"]))  
    { 

	$idorder = $_POST['idorder'];
	$nosj_off = $_POST['nosj_off'];
	$tglsj_off = $_POST['tglsj_off'];
	$pabrikgdg_off = $_POST['pabrikgdg_off'];
	$ketgdg_off = $_POST['ketgdg_off'];
	
	
	
	
	
	
	
	//Pemberian Koma
	$in = '("' . implode('","', $idorder) .'")';
 
	$sql = 'SELECT * FROM spa_off WHERE idorder_off IN ' . $in;

	$query=mysqli_query($con,$sql);
	
	while ($row = mysqli_fetch_array($query)) {

	 $j[] =  $row['idprod_off'];
	 $k[] =  $row['idorder_off'];


	
	}	

	   


foreach(array_combine($j, $k) as $idprod => $idorder_off)

{
	 $query = "INSERT INTO gudang_off VALUES('$idorder_off','SPA-$nosj_off','$tglsj_off','$ketgdg_off','$pabrikgdg_off',
											  '$idprod') ";
	
			 mysqli_query($con, $query);
}
	
	
	echo
		  "<script>
	      alert('Data Berhasil Ditambahkan !');
	      document.location.href= '../../index.php?hlm=gudangoff';
		  </script>";
	


	}
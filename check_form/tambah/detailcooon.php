	<?php 
      //$con= mysqli_connect("localhost", "root","","kontrol_db");
    // Check if form is submitted successfully 
    if(isset($_POST["submit"]))  
    { 
	$nolkpp = $_POST['nolkpp'];
	$tglsj = $_POST['tglsj'];
	$pabrik_on = $_POST['pabrik_on'];
	$idprod_on = $_POST['idprod_on'];

	$date=date_create($tglsj);
	$date2 =  date_format($date,"m");
	
	if(isset($_POST["noseri"]))      
		{ 
		  // Retrieving each selected option 
            foreach ($_POST['noseri'] as $noseri) { 
                $query ="INSERT INTO detailcoo_on (nocoo_on, nolkppcoo_on,bulan_on,tglprintcoo_on,pabrikcoo_on,idprdcoo_on,idserifk_on,tglkirimcooon,tandacooon) VALUES ( '','$nolkpp','$date2','','$pabrik_on','$idprod_on',$noseri,'','')";
				
				//stok seri	
			$updatestatus= "UPDATE seri_on SET statusseri=0 WHERE idseri_on = '$noseri' ";	
			mysqli_query($con, $query);		
			mysqli_query($con, $updatestatus);
			}
        }	
		else
		echo "Select an option first !!";	
		} 
		
		echo
		  "<script>
	      alert('Data Berhasil Ditambahkan !');
	      document.location.href= '../../index.php?hlm=deton';
		  </script>";
?>
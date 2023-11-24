	<?php 
    require '../../koneksi.php';

    if(isset($_POST["submit"]))  
    { 
	$id_order = $_POST['id_order'];
	$tglsj = $_POST['tglsj'];
	$pabrikcoo_off = $_POST['pabrikcoo_off'];
	$idprodcoo_off = $_POST['idprodcoo_off'];
	
	$date=date_create($tglsj);
	$date2 =  date_format($date,"m");
	
	if(isset($_POST["noseri"]))  
        { 
            // Retrieving each selected option 
            foreach ($_POST['noseri'] as $noseri) { 
                $query ="INSERT INTO detailcoo_off (nocoo_off, idordercoo_off,bulan_off,tglprintcoo_off,pabrikcoo_off,idprodcoo_off,idserifk_off,tglkirimcoo_off,tandaterima_off) VALUES ( '','$id_order','$date2','','$pabrikcoo_off','$idprodcoo_off',$noseri,'','')";
				
				//stok seri	
			$updatestatus= "UPDATE seri_off SET statusserioff=0 WHERE idseri_off = '$noseri' ";	
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
	      document.location.href= '../../index.php?hlm=detoff';
		  </script>";
	
	
		
?>




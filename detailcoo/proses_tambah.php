	<?php 
      $con= mysqli_connect("localhost", "root","","kontrol_db");
    // Check if form is submitted successfully 
    if(isset($_POST["submit"]))  
    { 
	$nolkpp = $_POST['nolkpp'];
	$bulan = $_POST['bulan'];
	$pabrik_on = $_POST['pabrik_on'];
	$idprod_on = $_POST['idprod_on'];
	
	if(isset($_POST["noseri"]))  
        { 
            // Retrieving each selected option 
            foreach ($_POST['noseri'] as $noseri) { 
                $query ="INSERT INTO detailcoo_on (nocoo_on, nolkppcoo_on,bulan_on,tglprintcoo_on,pabrikcoo_on,idprdcoo_on,idserifk_on,tglkirimcooon,tandacooon) VALUES ( '','$nolkpp','$bulan','','$pabrik_on','$idprod_on',$noseri,'','')";
				
		mysqli_query($con, $query);		
			}
        } 
	else
		echo "Select an option first !!";	
		} 
?>
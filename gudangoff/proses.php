<?php
		$con=mysqli_connect("localhost","root","","tutorial");
		
		$nolkppgdg =$_POST['nolkppgdg'];
		$nosjgdg   =$_POST['nosjgdg'];
		$tglsjgdg  = $_POST['tglsjgdg'];	
		$statusgdg  = $_POST['statusgdg'];
		$noefakgdg  = $_POST['noefakgdg'];
		
		function proses_hoby($idseri)
			{
				if(isset($_POST["noseri"]))
					{
						$hoby=$_POST["noseri"];
						reset($hoby);
						while (list($key, $value) = each($hoby)) 
							{
								$noseri	=$_POST["noseri"][$key];
								$nolkpp		=$_POST["nolkpp"][$key];
								$sql_hoby	="INSERT INTO tbl_seri2(noseri,nolkpp,idseri)
											  VALUES('$noseri','$nolkpp','$idseri')";  
								global $con;
								
								$hasil_hoby	=mysqli_query($con,$sql_hoby);	
							}
						}		
			}
		
		$sql="INSERT INTO tbl_gdg(nolkppgdg,nosjgdg,tglsjgdg,statusgdg,noefakgdg)
     	  			  VALUES('$nolkppgdg','$nosjgdg','$tglsjgdg','$statusgdg','$noefakgdg')";		
		
		
		
		$hasil=mysqli_query($con,$sql);
		$idseri=mysqli_insert_id($con);	
		if($hasil)
			{ 
				proses_hoby($idseri);
				echo "
		<script>
			alert('DATA ANDA BERHASIL DITAMBAHKAN');
			document.location.href = 'gudang.php';
		</script>
		";
			}

		else
			{
				echo "Data Gagal diinput";	
			}	
		

		
?>
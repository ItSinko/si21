
<?php
//$con=mysqli_connect("localhost","root","","kontrol_db");



$nofak1 =$_REQUEST['nofak1'];
$nofak2=$_REQUEST['nofak2'];
$noref=$_REQUEST['noref'];
$tglbuat=$_REQUEST['tglbuat'];
$ket=$_REQUEST['ket'];

$cek = mysqli_num_rows(mysqli_query($con,"SELECT norefinfo FROM infofaktur WHERE norefinfo='$noref'"));
if ($cek > 0) {

			
print "Maaf, No Referensi Sudah Pernah di Input !!"; 

    }
	
	else {
		
		foreach(range($nofak1,$nofak2) as $arrayid => $noefak) {
				$noreffk=$_REQUEST['noref'];
				
				$query = "INSERT INTO efaktur (noefak,noref,stok) VALUES
							($noefak,$noreffk,'1') ";
								$result = mysqli_query($con,$query);  }

			
    			$sql="INSERT INTO infofaktur(norefinfo,tglbuat,ket) VALUES
						('$noref','$tglbuat','$ket')";
						$recall= mysqli_query($con,$sql);
		print "Nomer E-Faktur Berhasil Diinput !"; 
		
	
	  }
 


?>

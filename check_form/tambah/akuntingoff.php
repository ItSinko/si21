<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");


$idorder = $_POST['idorder'];
$noref = $_POST['noref'];
$efaktur = $_POST['efaktur'];
$tarif = $_POST['tarif'];

//potong harga
	$realisasiacc = $_REQUEST["realisasiacc"];
	$potongrealisasiacc = substr ($realisasiacc,3);
	$realacc = str_replace('.', '', $potongrealisasiacc);
	
	
$term = $_POST['term'];
$tglbayaracc = $_POST['tglbayaracc'];
$kas = $_POST['kas'];
$ket = $_POST['ket'];
$idprodacc_off = $_POST['idprodacc_off'];
$pabrikacc_off = $_POST['pabrikacc_off'];
$diskonujiacc_off = $_POST['diskonujiacc_off'];
$nosjgdg = $_POST['nosjgdg'];
	
//pembuatan efaktur
$potong = substr ($nosjgdg,4);
$nofakju_off = $potong.'/'.$efaktur;

	

 //pengecekan nomer efaktur
$cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM acc_off WHERE idorderacc_off='$idorder' "));	

if ($cek > 0) {	
		
print "Maaf, No LKPP atau Nomer E-faktur Sudah Pernah di Input !!"; 
			  }
			  
else
              {
				  
//pengurangan stok pada faktur ketika digunakan !				  
	$ambilefak= "UPDATE efaktur
     SET stok=0 WHERE noefak = '$efaktur'";		  
	$reset	= mysqli_query($con, $ambilefak);
				  	  
mysqli_query($con, "INSERT INTO history_lunas_off values('','$tglbayaracc','$realacc','$ket','$idorder') ");

mysqli_query($con, "INSERT INTO acc_off values('$idorder','$noref','$efaktur','$nofakju_off','$tarif','$term','$tglbayaracc','$kas','$ket','$pabrikacc_off','$idprodacc_off','$diskonujiacc_off') ");
									
			print "Data Berhasil Di input!"; 

			  }
?>





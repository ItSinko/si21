<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");


$nolkpp = $_POST['nolkpp'];
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
$idprod_on = $_POST['idprod_on'];
$pabrik_on = $_POST['pabrik_on'];
$diskonuji = $_POST['diskonuji'];
$nosjgdg = $_POST['nosjgdg'];
	
//pembuatan efaktur
$potong = substr ($nosjgdg,4);
$nofakju_on = $potong.'/'.$efaktur;

 //pengecekan nomer efaktur
$cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM acc_on WHERE nolkppacc_on='$nolkpp' "));	

if ($cek > 0) {	
		
print "Maaf, No LKPP atau Nomer E-faktur Sudah Pernah di Input !!"; 
			  }
			  
else
              {
//pengurangan stok pada faktur ketika digunakan !				  
	$ambilefak= "UPDATE efaktur
     SET stok=0 WHERE noefak = '$efaktur'";		  
	$reset	= mysqli_query($con, $ambilefak);
				  
				  
											mysqli_query($con, "INSERT INTO acc_on values('$nolkpp','$noref','$efaktur','$nofakju_on','$tarif'
											  ,'$term','$tglbayaracc','$kas','$ket','$pabrik_on','$idprod_on','$diskonuji') ");
											  
											  mysqli_query($con, "INSERT INTO history_lunas_on values('','$tglbayaracc','$realacc','$ket','$nolkpp') ");
											 print "Data Berhasil Di input!"; 
			  }
			  
?>





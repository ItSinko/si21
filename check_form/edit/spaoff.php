<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");



$no_off = $_POST['no_off'];
$distributor = $_POST['distributor'];
$idorderoff = $_POST['idorderoff'];
$pemesan = $_POST['pemesan'];
$status = $_POST['status'];
$tglbuat = $_POST['tglbuat'];
$tgledit = $_POST['tgledit'];
$ket = $_POST['ket'];
$jumlah = $_POST['jumlah'];
$diskonspa = $_POST['diskonspa'];
$diskonujispa = $_POST['diskonujispa'];
$expdates = $_POST['expdates'];
$idprod_on = $_POST['idprod_on'];
$pabrik_on = $_POST['pabrik_on'];
$ket_log = $_POST['ket_log'];



//potong harga
	$harga = $_POST['harga'];
	$potonghargaprd = substr ($harga,3);
	$hargaprd = str_replace('.', '', $potonghargaprd);
	
 //potong harga
	$ongkir  = $_POST['ongkir'];
	$potongongkirprd = substr ($ongkir,3);
	$ongkirprd = str_replace('.', '', $potongongkirprd);
	



	//USER LOG
$user_aksi = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$tgl_aksi  = date("Y-m-d");
ini_set('date.timezone', 'Asia/Jakarta');
$jam_aksi  =  date('H:i:s');


$get_log = "INSERT INTO userlog VALUES('','ID OFF-$idorderoff','$user_aksi','Ubah','SPA (Offline)','$tgl_aksi','$jam_aksi','$ket_log')";	

	


	
$update=  "UPDATE spa_off SET 
								pemesan_off= '$pemesan', 
								status_off='$status',
								tgl_buat_off='$tglbuat',
								tgl_edit_off='$tgledit',
								jumlah_off='$jumlah',
								harga_off='$hargaprd',
								ongkos_off='$ongkirprd',
								diskon_nota_off = '$diskonspa',
								diskon_uji_off = '$diskonujispa',
								temphari_off = '$expdates',
								ket_off= '$ket', 
								pabrik_off = '$pabrik_on'
								WHERE idorder_off= '$idorderoff'";
								
//Update masing masing ID distributor untuk merubah nilai(valuenya)
						  
$updatedsb_adm =  "UPDATE admjual_off  SET 
								   pabrikadm_off='$pabrik_on'
								   WHERE idorderadm_off = 'OFF-$idorderoff'";
		
$updatedsb_qc =  "UPDATE qc_off  SET 
								   pabrikqc_off='$pabrik_on'
								   WHERE idorderqc_off= 'OFF-$idorderoff'";
		
$updatedsb_gdg =  "UPDATE gudang_off  SET 
								   pabrikgdg_off='$pabrik_on'
								   WHERE idordergdg_off= 'OFF-$idorderoff'";

$updatedsb_eks =  "UPDATE ekspedisi_off  SET 
								   pabrikeks_off='$pabrik_on'
								   WHERE idordereks_off= 'OFF-$idorderoff'";
		
$updatedsb_acc =  "UPDATE acc_off  SET 
								   pabrikacc_off ='$pabrik_on'
								   WHERE idorderacc_off= 'OFF-$idorderoff'";
		

$updatedsb_piu =  "UPDATE piutang_off  SET 
								   idpabrikuji_off ='$pabrik_on'
								   WHERE idorderuji_off= 'OFF-$idorderoff'";
		

$updatedsb_coo =  "UPDATE detailcoo_off  SET 
								   pabrikcoo_off='$pabrik_on'
								   WHERE idordercoo_off= 'OFF-$idorderoff'";
		  
		  
		  
		  
$sql_1 = mysqli_num_rows(mysqli_query($con,"SELECT * FROM ongkirdb_off WHERE idorderfk_off ='OFF-$idorderoff' "));	
$sql_2 = mysqli_query($con,"SELECT * FROM ongkirdb_off WHERE idorderfk_off ='OFF-$idorderoff' ");	
		  
		  

		  
if ($sql_1 > 0 ) {
while($row = mysqli_fetch_array($sql_2)){		


 $idongkir =  $row['idongkir_off']; 
} 
		  
		  
		  	$ongkir= "UPDATE ongkirdb_off SET   nilai='$ongkirprd',
									   idorderfk_off='OFF-$idorderoff' 
									   WHERE idongkir_off = '$idongkir'";
		  

$result		= mysqli_query($con, $update);

$result3		= mysqli_query($con, $get_log);
$result2	= mysqli_query($con, $ongkir);


//update ID distributor                        
$result3	= mysqli_query($con, $updatedsb_adm);
$result4	= mysqli_query($con, $updatedsb_qc);
$result5	= mysqli_query($con, $updatedsb_gdg);
$result6	= mysqli_query($con, $updatedsb_eks);
$result7	= mysqli_query($con, $updatedsb_acc);
$result8	= mysqli_query($con, $updatedsb_piu);
$result9	= mysqli_query($con, $updatedsb_coo);


print "Data Berhasil Di Update !"; 


			   }
		  
		  			   else {
			
$result		= mysqli_query($con, $update);
$result3		= mysqli_query($con, $get_log);
//update ID distributor                        
$result3	= mysqli_query($con, $updatedsb_adm);
$result4	= mysqli_query($con, $updatedsb_qc);
$result5	= mysqli_query($con, $updatedsb_gdg);
$result6	= mysqli_query($con, $updatedsb_eks);
$result7	= mysqli_query($con, $updatedsb_acc);
$result8	= mysqli_query($con, $updatedsb_piu);
$result9	= mysqli_query($con, $updatedsb_coo);

print "Data Berhasil Di Update !!"; 

			   }
		  
		  

?>







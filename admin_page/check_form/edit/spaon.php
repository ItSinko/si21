<?php
require '../../koneksi.php';


$no = $_POST['no'];
$nolkpp = $_POST['nolkpp'];
$noaks = $_POST['noaks'];

//potong harga
$harga = $_POST['harga'];
$potonghargaprd = substr($harga, 3);
$hargaprd = str_replace('.', '', $potonghargaprd);

//potong harga
$ongkir = $_POST['ongkir'];
$potongongkir = substr($ongkir, 3);
$ongkirprd = str_replace('.', '', $potongongkir);

$jumlah = $_POST['jumlah'];
$deskripsi = $_POST['deskripsi'];
$instansi = $_POST['instansi'];
$satuan = $_POST['satuan'];
$status = $_POST['status'];
$tglbuat = $_POST['tglbuat'];
$tgledit = $_POST['tgledit'];
$tglkontrak = $_POST['tglkontrak'];
$ket = $_POST['ket'];
$diskonspa = $_POST['diskonspa'];
$diskonujispa = $_POST['diskonujispa'];
$expdates = $_POST['expdates'];
$idprod_on = $_POST['idprod_on'];
$pabrik_on = $_POST['pabrik_on'];
$ket_log = $_POST['ket_log'];

//USER LOG
$user_aksi = $_POST['username'];
$tgl_aksi  = date("Y-m-d");
ini_set('date.timezone', 'Asia/Jakarta');
$jam_aksi  =  date('H:i:s');


$get_log = "INSERT INTO userlog VALUES('','LKPP $nolkpp','$user_aksi','Ubah','SPA (Online)','$tgl_aksi','$jam_aksi','$ket_log')";


$update =  "UPDATE spa_on  SET 
								   noaks_on='AK1-P$noaks',
								   despaket_on='$deskripsi',
								   instansi_on='$instansi',
								   satuan_on='$satuan',
								   status_on='$status',
								   tgl_buat_on='$tglbuat',
								   tgl_edit_on='$tgledit',
								   tgl_kontrak='$tglkontrak',
								   jumlah_on='$jumlah',
								   harga_on='$hargaprd',
								   ongkos_on='$ongkirprd',
								   diskon_nota_on='$diskonspa',
								   diskon_uji_on='$diskonujispa',
								   pabrik_on='$pabrik_on',
								   temphari_on='$expdates',
								   ongkos_on='$ongkirprd',
								   ket_on='$ket'
								   WHERE nolkpp_on= '$nolkpp'";

//Update masing masing ID distributor untuk merubah nilai(valuenya)

$updatedsb_adm =  "UPDATE admjual_on  SET 
								   pabrikadm_on='$pabrik_on'
								   WHERE nolkppadm_on= '$nolkpp'";

$updatedsb_qc =  "UPDATE qc_on  SET 
								   pabrikqc_on='$pabrik_on'
								   WHERE nolkppqc_on= '$nolkpp'";

$updatedsb_gdg =  "UPDATE gudang_on  SET 
								   pabrikgdg_on='$pabrik_on'
								   WHERE nolkppgdg_on= '$nolkpp'";

$updatedsb_eks =  "UPDATE ekspedisi_on  SET 
								   pabrikeks_on='$pabrik_on'
								   WHERE nolkppeks_on= '$nolkpp'";

$updatedsb_acc =  "UPDATE acc_on  SET 
								   pabrikacc_on='$pabrik_on'
								   WHERE nolkppacc_on= '$nolkpp'";


$updatedsb_piu =  "UPDATE piutang_on  SET 
								   idpabrikuji_on ='$pabrik_on'
								   WHERE nolkppuji_on= '$nolkpp'";



$updatedsb_coo =  "UPDATE detailcoo_on  SET 
								   pabrikcoo_on='$pabrik_on'
								   WHERE nolkppcoo_on= '$nolkpp'";

$sql_1 = mysqli_num_rows(mysqli_query($con, "SELECT * FROM ongkirdb_on WHERE nolkppkirfk_on ='$nolkpp' "));

$sql_2 = mysqli_query($con, "SELECT * FROM ongkirdb_on WHERE nolkppkirfk_on ='$nolkpp' ");




if ($sql_1 > 0) {

	while ($row = mysqli_fetch_array($sql_2)) {


		$idongkir =  $row['idongkir_on'];
	}

	$ongkir = "UPDATE ongkirdb_on SET   nilai='$ongkirprd',
								   nolkppkirfk_on='$nolkpp' 
								   WHERE idongkir_on = '$idongkir'";


	$result		= mysqli_query($con, $update);

	$result2	= mysqli_query($con, $ongkir);

	//LOG
	$user_log	= mysqli_query($con, $get_log);


	//update ID distributor                        
	$result3	= mysqli_query($con, $updatedsb_adm);
	$result4	= mysqli_query($con, $updatedsb_qc);
	$result5	= mysqli_query($con, $updatedsb_gdg);
	$result6	= mysqli_query($con, $updatedsb_eks);
	$result7	= mysqli_query($con, $updatedsb_acc);
	$result8	= mysqli_query($con, $updatedsb_piu);
	$result9	= mysqli_query($con, $updatedsb_coo);


	print "Data Berhasil Di Update!";
} else {

	$result		= mysqli_query($con, $update);

	//LOG
	$user_log	= mysqli_query($con, $get_log);




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

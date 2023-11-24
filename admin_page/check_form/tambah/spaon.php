<?php
require '../../koneksi.php';

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
$distributor = $_POST['distributor'];





$cek = mysqli_num_rows(mysqli_query($con, "SELECT * FROM spa_on WHERE nolkpp_on ='$nolkpp' "));
if ($cek > 0) {

	print "Maaf,No LKPP Sudah Pernah di Input !!";
} else {


	$que = "SELECT max(no_on + 0) as no_spa FROM spa_on";
	$hasilnya = mysqli_query($con, $que);
	$data = mysqli_fetch_array($hasilnya);
	$nomercoo = $data['no_spa'];
	//convert to int
	$nourut = (int)($nomercoo);
	//plus
	$nourut++;
	//format string
	$newID = sprintf("%01s", $nourut);


	//memasukan data
	$query = "INSERT INTO spa_on (no_on, nolkpp_on, noaks_on, despaket_on, instansi_on, satuan_on,status_on,tgl_buat_on,tgl_edit_on,tgl_kontrak,jumlah_on,harga_on,ongkos_on,diskon_nota_on,diskon_uji_on,temphari_on,ket_on,idprod_on,pabrik_on) VALUES ('$newID','$nolkpp','AK1-P$noaks','$deskripsi','$instansi','$satuan','$status','$tglbuat','$tgledit','$tglkontrak','$jumlah','$hargaprd','$ongkirprd','$diskonspa','$diskonujispa','$expdates','$ket','$idprod_on','$pabrik_on')";


	//memasukkan ongkos 	
	$ongkir = "INSERT INTO ongkirdb_on (idongkir_on,nilai,nolkppkirfk_on) VALUES  ('', '$ongkirprd', '$nolkpp')";


	//pengkondisian nilai yang diterima :

	if ($distributor == 'SINKO PRIMA ALLOY PT') {


		mysqli_query($con, $query);
		mysqli_query($con, $ongkir);
		print "Data Berhasil Di input ! ";
	} else {

		mysqli_query($con, $query);
		print "Data Berhasil Di input !! ";
	}
}

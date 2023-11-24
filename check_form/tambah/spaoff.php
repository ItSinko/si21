<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");

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



//potong harga
	$harga = $_POST['harga'];
	$potonghargaprd = substr ($harga,3);
	$hargaprd = str_replace('.', '', $potonghargaprd);
	
 //potong harga
	$ongkir  = $_POST['ongkir'];
	$potongongkirprd = substr ($ongkir,3);
	$ongkirprd = str_replace('.', '', $potongongkirprd);
	

 $cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM spa_off WHERE idorder_off ='$idorderoff' "));
if ($cek > 0) {

	print "Maaf,ID Order Sudah Pernah di Input !!"; 
	
    }

else 
	
	{
 
$que= "SELECT max(no_off + 0) as no_spaoff FROM spa_off";
$hasilnya = mysqli_query($con,$que);
$data = mysqli_fetch_array($hasilnya);
$nomercoo = $data['no_spaoff'];
//convert to int
$nourut = (int)($nomercoo);
//plus
$nourut++;
//format string
$newID = sprintf("%01s",$nourut);
 
//memasukan data
$query= "INSERT INTO spa_off (no_off,idorder_off,pemesan_off,status_off,tgl_buat_off,tgl_edit_off,jumlah_off,harga_off,ongkos_off,diskon_nota_off,diskon_uji_off,temphari_off,ket_off,idprod_off,pabrik_off) VALUES ('$newID','$idorderoff','$pemesan','$status','$tglbuat','$tgledit','$jumlah','$hargaprd','$ongkirprd','$diskonspa','$diskonujispa','$expdates','$ket','$idprod_on','$pabrik_on')";  

		//memasukkan ongkos 	
$ongkir = "INSERT INTO ongkirdb_off (idongkir_off,nilai,idorderfk_off) VALUES  ('', '$ongkirprd', '$idorderoff')";

//pengkondisian nilai yang diterima :
if ($distributor=='SINKO PRIMA ALLOY PT')  { 

	mysqli_query($con, $query);
    mysqli_query($con, $ongkir);
    print "Data Berhasil Di input ! ";  }  
	else 
	{ mysqli_query($con, $query);			
    print "Data Berhasil Di input !! "; }
	
	
	}
?>


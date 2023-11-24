<?php
$con = mysqli_connect("localhost","root","","tutorial");


//mengambil data dari tabel
function query($query) {
	global $con;
	$result = mysqli_query($con, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


//mengambil fungsi tambah
function tambah($data) {

	global $con;
//ambil data dari tiap elemen dalam form 
	$nomer = htmlspecialchars($data["nomer"]);
		$nolkpp = htmlspecialchars($data["nolkpp"]);
	$distributor = htmlspecialchars($data["distributor"]);
		$noaks = htmlspecialchars($data["noaks"]);
	$despaket = htmlspecialchars($data ["despaket"]);
		$jenpaket = htmlspecialchars($data["jenpaket"]);
	$instansi = htmlspecialchars($data ["instansi"]);
		$satuan = htmlspecialchars($data ["satuan"]);  
	$statnego = htmlspecialchars($data ["statnego"]);
		$tglbuat = htmlspecialchars($data ["tglbuat"]);
	$tgledit = htmlspecialchars($data ["tgledit"]);
		$jumlahspa = htmlspecialchars($data ["jumlahspa"]);
	$alias = htmlspecialchars($data ["alias"]);
		$namprod = htmlspecialchars($data ["namprod"]);
	$hargaspa = htmlspecialchars($data ["hargaspa"]);
		$ongkosspa = htmlspecialchars($data ["ongkosspa"]);
	$totalspa = htmlspecialchars($data ["totalspa"]);	
		$diskonnotaspa = htmlspecialchars($data ["diskonnotaspa"]);		
	$diskonujispa = htmlspecialchars($data ["diskonujispa"]);		
		$expdate = htmlspecialchars($data ["expdate"]);	
	$noakd = htmlspecialchars($data ["noakd"]);	
	$namacoo = htmlspecialchars($data ["namacoo"]);	
	
$query = "INSERT INTO tabel_spa 
          VALUES
		  ('$nomer','$nolkpp','$distributor',
		  '$noaks','$despaket','$jenpaket','$instansi','$satuan','$statnego','$tglbuat','$tgledit','$jumlahspa','$alias','$namprod','$hargaspa'
		  ,'$ongkosspa','$totalspa','$diskonnotaspa','$diskonujispa','$expdate','$noakd','$namacoo')";
		  
mysqli_query($con,$query);

return mysqli_affected_rows($con);

}

//4.ini fungsi untuk menghapus data
function hapus ($nolkpp) {
	global $con;
	mysqli_query($con, "DELETE FROM tabel_spa WHERE nolkpp = $nolkpp");
    return mysqli_affected_rows ($con);
}
//5.ini fungsi untuk mengubah atau mengedit data 
function ubah ($data) {
	global $con;

// ambil data dari tiap elemen dalam form
	$nomer = htmlspecialchars($data["nomer"]);
	$nolkpp = htmlspecialchars($data["nolkpp"]);
	$distributor = htmlspecialchars($data["distributor"]);
	$noaks = htmlspecialchars($data["noaks"]);
	$despaket = htmlspecialchars($data ["despaket"]);
	$jenpaket = htmlspecialchars($data["jenpaket"]);
	$instansi = htmlspecialchars($data ["instansi"]);
	$satuan = htmlspecialchars($data ["satuan"]);  
	$statnego = htmlspecialchars($data ["statnego"]);
	$tglbuat = htmlspecialchars($data ["tglbuat"]);
	$tgledit = htmlspecialchars($data ["tgledit"]);
	$jumlahspa = htmlspecialchars($data ["jumlahspa"]);
	$alias = htmlspecialchars($data ["alias"]);
	$namprod = htmlspecialchars($data ["namprod"]);
	$hargaspa = htmlspecialchars($data ["hargaspa"]);
	$ongkosspa = htmlspecialchars($data ["ongkosspa"]);
	$totalspa = htmlspecialchars($data ["totalspa"]);	
	 $diskonnotaspa = htmlspecialchars($data ["diskonnotaspa"]);		
	 $diskonujispa = htmlspecialchars($data ["diskonujispa"]);		
	$expdate = htmlspecialchars($data ["expdate"]);		
	$noakd = htmlspecialchars($data ["noakd"]);	
	$namacoo = htmlspecialchars($data ["namacoo"]);	
	   
$query = "UPDATE tabel_spa SET
        nomer = '$nomer',
		distributor = '$distributor',
		noaks = 	'$noaks',
		despaket = 	'$despaket',
		jenpaket = 	'$jenpaket',
		instansi = 	'$instansi',
		satuan = 	'$satuan',
		statnego = 	'$statnego',
		tglbuat = 	'$tglbuat',
		tgledit = 	'$tgledit',
		jumlahspa =	'$jumlahspa',
		alias= 		'$alias',
		namprod = 	'$namprod',
		hargaspa = 	'$hargaspa',
		ongkosspa = '$ongkosspa',
		totalspa= 	'$totalspa',		
	    diskonnotaspa = '$diskonnotaspa',
		diskonujispa = '$diskonujispa',
		expdate = 	'$expdate',
		noakd = 	'$noakd',
		namacoo = 	'$namacoo'
		WHERE nolkpp = $nolkpp		  ";
		  
mysqli_query($con,$query);

return mysqli_affected_rows($con);

}	

//6.ini fungsi untuk mencari data
function cari($keyword) {
$query = "SELECT * FROM tabel_spa WHERE 
				
		nolkpp LIKE '%$keyword%' OR 
			nomer LIKE '%$keyword%' OR
		noaks LIKE '%$keyword%'
			";
	
return query($query); 

}
function tanggal_indo($tanggal)
{
	$bulan = array (1 =>   'Jan',
				'Feb',
				'Mar',
				'Apr',
				'Mei',
				'Jun',
				'Jul',
				'Agu',
				'Sep',
				'Okt',
				'Nov',
				'Des'
			);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}

//7.Untuk Koma Rupiah
function rupiah($angka){
	
	$hasil_rupiah = number_format($angka,0,',','.');
	return $hasil_rupiah;
 }

 ?>
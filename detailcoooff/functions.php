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

// ambil data dari tiap elemen dalam form 
		$nocoo = htmlspecialchars($data["nocoo"]);
		$nolkppcoo = htmlspecialchars($data["nolkppcoo"]);
			$bulancoo = htmlspecialchars($data["bulancoo"]);
		$jumlahcoo = htmlspecialchars($data["jumlahcoo"]);
			$typecoo = htmlspecialchars($data ["typecoo"]);
		$namaprodukcoo = htmlspecialchars($data["namaprodukcoo"]);
			$noakdcoo = htmlspecialchars($data ["noakdcoo"]);
		$nosericoo = htmlspecialchars($data ["nosericoo"]);  
			$noidcoo = htmlspecialchars($data ["noidcoo"]);
	$kepadacoo = htmlspecialchars($data ["kepadacoo"]);
	$namapaketcoo = htmlspecialchars($data ["namapaketcoo"]);
	$tglsjcoo = htmlspecialchars($data ["tglsjcoo"]);
	$distributorcoo = htmlspecialchars($data ["distributorcoo"]);
		$namacoo = htmlspecialchars($data ["namacoo"]);
		
$query = "INSERT INTO detailcoo 
          VALUES
		  ('$nocoo','$nolkppcoo','$bulancoo',
		  '$jumlahcoo','$typecoo','$namaprodukcoo','$noakdcoo','$nosericoo','$noidcoo','$kepadacoo','$namapaketcoo','$tglsjcoo','$distributorcoo','$namacoo')";
		  
mysqli_query($con,$query);

return mysqli_affected_rows($con);

}



//4.ini fungsi untuk menghapus data
function hapus ($nocoo) {
	global $con;
	mysqli_query($con, "DELETE FROM detailcoo WHERE nocoo = $nocoo");
    return mysqli_affected_rows ($con);
}






//5.ini fungsi untuk mengubah atau mengedit data 
function ubah ($data) {
	global $con;

// ambil data dari tiap elemen dalam form
			$nocoo = $data["nocoo"]; 
		$nolkppcoo = htmlspecialchars($data["nolkppcoo"]);
			$bulancoo = htmlspecialchars($data["bulancoo"]);
			$jumlahcoo = htmlspecialchars($data["jumlahcoo"]);
		$typecoo = htmlspecialchars($data["typecoo"]);
			$namaprodukcoo = htmlspecialchars($data ["namaprodukcoo"]);
		$noakdcoo = htmlspecialchars($data["noakdcoo"]);
			$nosericoo = htmlspecialchars($data ["nosericoo"]);
		$noidcoo = htmlspecialchars($data ["noidcoo"]);  
			$kepadacoo = htmlspecialchars($data ["kepadacoo"]);
			$namapaketcoo = htmlspecialchars($data ["namapaketcoo"]);
	$tglsjcoo = htmlspecialchars($data ["tglsjcoo"]);
	$distributorcoo = htmlspecialchars($data ["distributorcoo"]);
		$namacoo = htmlspecialchars($data ["namacoo"]);

	    
$query = "UPDATE detailcoo SET
		nolkppcoo = '$nolkppcoo',
		bulancoo = '$bulancoo',
		jumlahcoo = 	'$jumlahcoo',
		typecoo = 	'$typecoo',
		namaprodukcoo = 	'$namaprodukcoo',
		noakdcoo = 	'$noakdcoo',
		nosericoo = 	'$nosericoo',
		noidcoo = 	'$noidcoo',
		kepadacoo = 	'$kepadacoo',
		namapaketcoo = 	'$namapaketcoo',
		tglsjcoo = 	'$tglsjcoo',
		distributorcoo = 	'$distributorcoo',
		namacoo = 	'$namacoo'
		
	WHERE nocoo = $nocoo
		  
		  ";
		  
mysqli_query($con,$query);

return mysqli_affected_rows($con);

}	

//6.ini fungsi untuk mencari data
function cari($keyword) {
$query = "SELECT * FROM detailcoo WHERE 
				
		nolkppcoo LIKE '%$keyword%' OR 
			nosericoo LIKE '%$keyword%' OR
		distributorcoo LIKE '%$keyword%'
			";
	
return query($query); 

}

//7.Untuk Koma Rupiah
function rupiah($angka){
	
	$hasil_rupiah = number_format($angka,2,',','.');
	return $hasil_rupiah;
 
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






?>
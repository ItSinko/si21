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
	$lkppuji = htmlspecialchars($data["lkppuji"]);
			$totaluji = htmlspecialchars($data["totaluji"]);
			$tglinv = htmlspecialchars($data["tglinv"]);
		$noinv = htmlspecialchars($data["noinv"]);
			$diskonuji = htmlspecialchars($data ["diskonuji"]);
		$nilaiuji = htmlspecialchars($data["nilaiuji"]);
			$dppuji = htmlspecialchars($data ["dppuji"]);
		$ppnuji = htmlspecialchars($data ["ppnuji"]);  
			$pphuji = htmlspecialchars($data ["pphuji"]);
			$totalujibayar = htmlspecialchars($data ["totalujibayar"]);
	$tglbayar = htmlspecialchars($data ["tglbayar"]);
	$kasuji = htmlspecialchars($data ["kasuji"]);
	

$query = "INSERT INTO ujifungsi 
          VALUES
		  ('$lkppuji','$totaluji','$tglinv',
		  '$noinv','$diskonuji','$nilaiuji','$dppuji','$ppnuji','$pphuji','$totalujibayar','$tglbayar','$kasuji' )";
		  
mysqli_query($con,$query);

return mysqli_affected_rows($con);

}


//4.ini fungsi untuk menghapus data
function hapus ($lkppuji) {
	global $con;
	mysqli_query($con, "DELETE FROM ujifungsi WHERE lkppuji = $lkppuji");
    return mysqli_affected_rows ($con);
}



//5.ini fungsi untuk mengubah atau mengedit data 
function ubah ($data) {
	global $con;

// ambil data dari tiap elemen dalam form
		$lkppuji = htmlspecialchars($data["lkppuji"]);
			$totaluji = htmlspecialchars($data["totaluji"]);
			$tglinv = htmlspecialchars($data["tglinv"]);
		$noinv = htmlspecialchars($data["noinv"]);
			$diskonuji = htmlspecialchars($data ["diskonuji"]);
		$nilaiuji = htmlspecialchars($data["nilaiuji"]);
			$dppuji = htmlspecialchars($data ["dppuji"]);
		$ppnuji = htmlspecialchars($data ["ppnuji"]);  
			$pphuji = htmlspecialchars($data ["pphuji"]);
			$totalujibayar = htmlspecialchars($data ["totalujibayar"]);
	$tglbayar = htmlspecialchars($data ["tglbayar"]);
	$kasuji = htmlspecialchars($data ["kasuji"]);
		
	    
$query = "UPDATE ujifungsi SET
		
		totaluji = '$totaluji',
		tglinv = '$tglinv',
		noinv = 	'$noinv',
		diskonuji = 	'$diskonuji',
		nilaiuji = 	'$nilaiuji',
		dppuji = 	'$dppuji',
		ppnuji = 	'$ppnuji',
		pphuji = 	'$pphuji',
		totalujibayar = 	'$totalujibayar',
		tglbayar = 	'$tglbayar',
		kasuji = 	'$kasuji'
		
		 
	WHERE lkppuji = $lkppuji
		  
		  ";
		  
mysqli_query($con,$query);

return mysqli_affected_rows($con);

}	

//6.ini fungsi untuk mencari data
function cari($keyword) {
$query = "SELECT * FROM ujifungsi WHERE 
				
		lkppuji LIKE '%$keyword%' 
			
			";
	
return query($query); 

}

//7.Untuk Koma Rupiah
function rupiah($angka){
	
	$hasil_rupiah = number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}


//8.Untuk Tgl
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
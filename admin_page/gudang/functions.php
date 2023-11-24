<?php
//$con = mysqli_connect("localhost","root","","kontrol_db");
//1.mengambil data dari tabel
function query($query) {
	global $con;
	$result = mysqli_query($con, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


//2.mengambil fungsi tambah
function tambah($data) {

	global $con;

// ambil data dari tiap elemen dalam form 
		$nolkppgdg = htmlspecialchars($data["nolkppgdg"]);
		$nosjgdg = htmlspecialchars($data["nosjgdg"]);
		$tglsjgdg = htmlspecialchars($data["tglsjgdg"]);
		$statusgdg = htmlspecialchars($data["statusgdg"]);
		$noefakgdg = htmlspecialchars($data["noefakgdg"]);
		
$query = "INSERT INTO tbl_gdg
          VALUES
		  ('','$nolkppgdg','$nosjgdg','$tglsjgdg','$statusgdg','$noefakgdg')";
		  
mysqli_query($con,$query);

return mysqli_affected_rows($con);

}



//4.ini fungsi untuk menghapus data
function hapus ($nolkppgdg) {
	global $con;
	mysqli_query($con, "DELETE  gudang_on, seri_on 
										FROM gudang_on INNER JOIN seri_on 
										ON gudang_on.nolkppgdg_on=seri_on.lkppfk_on WHERE nolkppgdg_on = $nolkppgdg_on ");
    return mysqli_affected_rows ($con);

	}

//5.ini fungsi untuk mengubah atau mengedit data 
function ubah ($data) {
	global $con;

// ambil data dari tiap elemen dalam form
		
		
		$idseri = htmlspecialchars($data["idseri"]);	
		$nolkppgdg = htmlspecialchars($data["nolkppgdg"]);
		$nosjgdg = htmlspecialchars($data["nosjgdg"]);
		$tglsjgdg = htmlspecialchars($data["tglsjgdg"]);
		$statusgdg = htmlspecialchars($data["statusgdg"]);
		$noefakgdg = htmlspecialchars($data["noefakgdg"]);

	    
$query = "UPDATE tbl_gdg SET
		
		nolkppgdg    ='$nolkppgdg',
		nosjgdg      ='$nosjgdg',
		tglsjgdg     ='$tglsjgdg',
		statusgdg    ='$statusgdg',
		noefakgdg    ='$noefakgdg'
		
	WHERE idseri = $idseri
		  
		  ";
		  
mysqli_query($con,$query);

return mysqli_affected_rows($con);

}	

//6.ini fungsi untuk mencari data
function cari($keyword) {
$query = "SELECT * FROM tbl_gdg WHERE 

		nosjgdg LIKE '%$keyword%' OR
		statusgdg LIKE '%keyword%'
		
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
?>





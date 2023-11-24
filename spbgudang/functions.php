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


//4.ini fungsi untuk menghapus data
function hapus ($no) {
	global $con;
	mysqli_query($con, "DELETE FROM gdgspb WHERE no = $no");
    return mysqli_affected_rows ($con);
}


//6.ini fungsi untuk mencari data
function cari($keyword) {
$query = "SELECT * FROM spb WHERE 
				
		no LIKE '%$keyword%' OR 
			pelanggan LIKE '%$keyword%' OR
		alias LIKE '%$keyword%'
			";
	
return query($query); 

}

//tambah data
function rupiah($angka){
	$hasil_rupiah = number_format($angka,0,',','.');
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
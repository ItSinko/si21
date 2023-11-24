<?php
//$con = mysqli_connect("localhost","root","","tutorial");
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
function hapus ($nolkppx) {
	global $con;
	mysqli_query($con, "DELETE
            FROM ekspedisi WHERE nolkppx = $nolkppx ");
    return mysqli_affected_rows ($con);

	}


?>





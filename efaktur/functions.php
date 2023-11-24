<?php
//1.ini koneksi ke database
$con = mysqli_connect("localhost", "root", "", "kontrol_db");


//2.ini fungsi untuk mengambil data dari tabel
function query($query) {
	global $con;
	$result = mysqli_query($con, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}






//3.ini fungsi untuk form tambah
function tambah($data) {

	global $con;

// ambil data dari tiap elemen dalam form 
		$sing_prod = htmlspecialchars($data["sing_prod"]);
		$nam_prod = htmlspecialchars($data["nam_prod"]);
		$harga = htmlspecialchars($data["harga"]);
		$hargadpp = htmlspecialchars($data["hargadpp"]);
		$noakd = htmlspecialchars($data["noakd"]);
		$namacoo = htmlspecialchars($data["namacoo"]);
		
$query = "INSERT INTO tab_prod 
          VALUES
		  ('','$sing_prod','$nam_prod','$harga','$hargadpp',
		  '$noakd','$namacoo')";
		  
		  
		  
		  
mysqli_query($con,$query);

return mysqli_affected_rows($con);


}

//4.ini fungsi untuk menghapus data
function hapus ($id) {
	global $con;
	mysqli_query($con, "DELETE FROM tab_prod WHERE id = $id");
    return mysqli_affected_rows ($con);


}

//5.ini fungsi untuk mengubah atau mengedit data 
function ubah ($data) {
	global $con;

// ambil data dari tiap elemen dalam form
			$id = $data["id"]; 
			$merk = htmlspecialchars($data["merk"]);
			$sing_prod = htmlspecialchars($data["sing_prod"]);
		    $nam_prod = htmlspecialchars($data["nam_prod"]);
			$harga = htmlspecialchars($data["harga"]);
			$hargadpp = htmlspecialchars($data["hargadpp"]);
			$noakd = htmlspecialchars($data["noakd"]);
			$namacoo = htmlspecialchars($data["namacoo"]);
			
	    
$query = "UPDATE tab_prod SET
		merk = '$merk',
        sing_prod = '$sing_prod',	
		nam_prod = '$nam_prod',
		harga = '$harga',
		hargadpp = '$hargadpp',
		noakd = '$noakd',
		namacoo = '$namacoo'
		
		
		  
		WHERE id = $id
		  
		  ";
		  
		  
		  
		  
mysqli_query($con,$query);

return mysqli_affected_rows($con);



}	

//6.ini fungsi untuk mencari data
function cari($keyword) {
$query = "SELECT * FROM tab_prod WHERE 
		sing_prod LIKE '%$keyword%' OR 
		nam_prod LIKE '%$keyword%' OR
		noakd LIKE '%$keyword%'
			
			";
	
return query($query); 

}


//tambah data
function rupiah($angka){
	
	$hasil_rupiah = number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}

































?>
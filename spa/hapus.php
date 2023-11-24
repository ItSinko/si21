
	
	<?php 
		
	
		$nolkpp_on= $_GET["nolkpp_on"];
		$ket_log = $_GET['ket_log'];

        
		//query dulu dari ongkirdbnya !!
		$result=mysqli_query($con,"SELECT * FROM spa_on WHERE nolkpp_on = '$nolkpp_on' ");		
		
			//mengambil data dari ongkir, apa data > 0 ? 
			while($row = mysqli_fetch_array($result)){
			
			$dsb = $row['pabrik_on'];
			
			}
			
		
			//logika, jika data > 0 ongkir dan data penjualan akan dihapus
			if ($dsb == "SPA"  )  { 
			
			$hapus= "DELETE  spa_on, ongkirdb_on 
									FROM spa_on INNER JOIN ongkirdb_on 
									ON ongkirdb_on.nolkppkirfk_on=spa_on.nolkpp_on WHERE nolkpp_on = $nolkpp_on";

			$result	= mysqli_query($con, $hapus);
			
			
			
			//USER LOG
	$user_aksi = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	$tgl_aksi  = date("Y-m-d");
	ini_set('date.timezone', 'Asia/Jakarta');
	$jam_aksi  =  date('H:i:s');



	$get_log = "INSERT INTO userlog VALUES('','LKPP $nolkpp_on','$user_aksi','Hapus','SPA (Online)','$tgl_aksi','$jam_aksi','$ket_log')";	
	$user_log	= mysqli_query($con, $get_log);	


			
			echo" 
		<script>
			alert('Data Berhasil Dihapus !');
			document.location.href = '../index.php?hlm=spa';
		</script>
	";
	
			              }  				
				

				//logika, jika data < 0  data penjualan akan dihapus				
				else {
	
	        $hapus= "DELETE FROM spa_on WHERE nolkpp_on = $nolkpp_on";

			$result	= mysqli_query($con, $hapus);


//USER LOG
	$user_aksi = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	$tgl_aksi  = date("Y-m-d");
	ini_set('date.timezone', 'Asia/Jakarta');
	$jam_aksi  =  date('H:i:s');



	$get_log = "INSERT INTO userlog VALUES('','LKPP $nolkpp_on','$user_aksi','Hapus','SPA (Online)','$tgl_aksi','$jam_aksi','$ket_log')";	
	$user_log	= mysqli_query($con, $get_log);	

	
	echo" 
		<script>
			alert('Data berhasil Dihapus !!');
			document.location.href = '../index.php?hlm=spa';
		</script>
	";
	
				     }
					 
			 
	?>
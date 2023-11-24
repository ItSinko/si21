
	<?php 
		$con=mysqli_connect("localhost","root","","kontrol_db");
	
		$idorder_off= $_GET["idorder_off"];
		
		$ket_log = $_GET["ket_log"];
        
		
		//USER LOG
	$user_aksi = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	$tgl_aksi  = date("Y-m-d");
	ini_set('date.timezone', 'Asia/Jakarta');
	$jam_aksi  =  date('H:i:s');
	
	$get_log = "INSERT INTO userlog VALUES('','ID OFF-$idorder_off','$user_aksi','Hapus','SPA (Offline)','$tgl_aksi','$jam_aksi','$ket_log')";	
	
		
		
		
		//query dulu dari ongkirdbnya !!
		$result=mysqli_query($con,"SELECT * FROM spa_off WHERE idorder_off = '$idorder_off' ");		
		
			//mengambil data dari ongkir, apa data > 0 ? 
			while($row = mysqli_fetch_array($result)){
				$dsb = $row['pabrik_off'];
													 }
		
			//logika, jika data > 0 ongkir dan data penjualan akan dihapus				
			if ($dsb == "SPA" )  { 
			
			$hapus= "DELETE  spa_off, ongkirdb_off 
									FROM spa_off INNER JOIN ongkirdb_off 
									ON ongkirdb_off.idorderfk_off=spa_off.idorder_off WHERE idorder_off = '$idorder_off'";

									
			$result	= mysqli_query($con, $hapus);
			$user_log	= mysqli_query($con, $get_log);	
		

			
			echo" 
		<script>
			alert('Data Berhasil Dihapus !');
			document.location.href = '../index.php?hlm=spaoff';
		</script>
	";
	
			              }  				
				

				//logika, jika data < 0  data penjualan akan dihapus				
				else {
	
	
	        $hapus= "DELETE FROM spa_off WHERE idorder_off = '$idorder_off'";
			$result	= mysqli_query($con, $hapus);
			$user_log	= mysqli_query($con, $get_log);	
		

	
	echo" 
		<script>
			alert('Data Berhasil Dihapus !!');
			document.location.href = '../index.php?hlm=spaoff';
		</script>
	";
	
				     }
					 
			 
	?>	
	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
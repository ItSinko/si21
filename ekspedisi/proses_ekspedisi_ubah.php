<style>
table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
	font-family:'Lucida Fax','Calibri',sans-serif;
	font-size:12px;
	
	}

table th {
  padding: 5px 35px;
  border-left:1px solid #e0e0e0;
  border-bottom: 1px solid #e0e0e0;
  background: #ededed;

  }
	
th, td {
    text-align: center;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}


tr td:hover { background: #666; color: #FFF; }  
/* Hover cell effect! */

.a {
position: absolute;
	top: 500px;
   left: 0px;
}

#tampil_modal {
    padding-top: 10em;
    background-color: rgba(0,0,0,0.8);
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 10;
    display: block;
  }
  #modal{
    padding: 15px;
    font-size: 16px;
    background: #e74c3c;
    color: #fff;
    width: 480px;
    border-radius: 15px;
    margin: 0 auto;
    margin-bottom: 20px;
    padding-bottom: 50px;
    z-index: 9;
  }
  #modal_atas{
    width: 100%;
    background:#c0392b;
    padding: 15px;
    margin-left: -15px;
    font-size: 18px;
    margin-top: -15px;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
  }
  #oke {
    background:#c0392b;
    border:none;
    float:right;
    width:80px;
    height:auto;
    color: #fff;
    margin-right: 5px;
    cursor: pointer;
  }
  
  
  /*Untuk tombol Batal */
button[type=pesan] {
    width: 10%;
    background-color: #2F4F4F;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
      position: absolute;
	top: 350px;
   left: 498px;

	}
	
	
  /*Untuk tombol Batal */
button[type=pesan2] {
    width: 10%;
    background-color:#008B8B;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
      position: absolute;
	top: 350px;
   left: 698px;

	}
	
	
	/*PEMBATAS TOOLTIPS ! */


.tips2 {
    position: relative;
    display: inline-block;
    
}

.tips2 .tooltips2 {
    visibility: hidden;
    width: 180px;
    background-color: #FEF9FD;
    color: #010101;
    
    text-align: center;
    
    padding: 5px 0;
border:solid 1px black;
    /* Position the tips2 */
    position: absolute;
    z-index: 1;
}

.tips2:hover .tooltips2 {
    visibility: visible;
}

.tooltips2 {
	top:50px;
	
font-size: 12px
	
	}

	
	
		
	/*PEMBATAS TOOLTIPS ! */


.tips3 {
    position: relative;
    display: inline-block;
    
}

.tips3 .tooltips3 {
    visibility: hidden;
    width: 180px;
    background-color: #FEF9FD;
    color: #010101;
    
    text-align: center;
    
    padding: 5px 0;
border:solid 1px black;
    /* Position the tips2 */
    position: absolute;
    z-index: 1;
}

.tips3:hover .tooltips3 {
    visibility: visible;
}

.tooltips3 {
	top:50px;
	
font-size: 12px
	
	}
	
</style>


<?php  
$con=mysqli_connect("localhost","root","","kontrol_db");



//proses
if (isset($_REQUEST['submit'])) {

$id = $_REQUEST["id"];
$nolkppeksfk_on = $_REQUEST["nolkppeksfk_on"];
$tglreal = $_REQUEST["tglreal"];
$jumlah = $_REQUEST["jumlah"];
$jasafk_on = $_REQUEST["jasafk_on"];

$koli_on = $_REQUEST["koli_on"];
$keteks2_on = $_REQUEST["keteks2_on"];
  

//pemotongan harga
$nilai = $_REQUEST["nilai"];
$potongnilai = substr ($nilai,3);
$nilaiharga = str_replace('.', '', $potongnilai);

	
	
	

$noresi = $_REQUEST["noresi"];



	//pemotongan harga
	$nilai = $_REQUEST["nilai"];
	$potongnilai = substr ($nilai,3);
	$nilaiharga = str_replace('.', '', $potongnilai);


//penarikan parameter stok sekarang

//1.mengambil inputan dari tabel penjualan	
	$con= mysqli_connect("localhost","root","","kontrol_db");
			
			
			$sql1 = mysqli_query($con, "SELECT jumlah_on FROM spa_on 
							WHERE nolkpp_on ='$nolkppeksfk_on' ");

		while($row = mysqli_fetch_array($sql1)){
 
$a=$row["jumlah_on"];


		}
			
			
			
			
			
			
			
//2. menghitung jumlah barang yang sudah diinput 			
				$sql = mysqli_query($con, "SELECT COALESCE(SUM(jumlaheks_on),0) as yo FROM ekspedisi2_on 
							WHERE nolkppeksfk_on ='$nolkppeksfk_on' ");

		while($row = mysqli_fetch_array($sql)){
 
$b=$row["yo"];


		}
		
//3.mengurangi jumlah penjualan dengan jumlah yang sudah diinput
$n=$a - $b;

			 //parameter stok sebelumnya
$parameter = $_REQUEST["parameter"];


//pemrosesan update stok
$proses = $parameter - $jumlah + $n;





//4. Proses penarikan parameter pabrik / distributor
$result2=mysqli_query($con,"SELECT * FROM  spa_on INNER JOIN distributor ON distributor.iddsb=spa_on.pabrik_on 
WHERE nolkpp_on='$nolkppeksfk_on'");


  while($row = mysqli_fetch_array($result2)){
			 $pabrik=$row['pabrik'];  
											}

											
$mysql2= "UPDATE ekspedisi2_on SET 
			nolkppeksfk_on = '$nolkppeksfk_on',
			tglkirim_on= '$tglreal',
			jumlaheks_on = '$jumlah',
			koli_on = '$koli_on',
			noresi_on = '$noresi',
			nilai_on = '$nilaiharga',
			jasafk_on = '$jasafk_on',
			keteks2_on = '$keteks2_on'
			WHERE ideks_on = '$id' ";

	
	

if ($pabrik=='SINKO PRIMA ALLOY PT')  { 
	

//pengkondisian nilai yang diterima :
if ($proses < 0)  { 
	
echo " 
	<script>
	   alert('Persediaan Barang Negatif');
	   	   document.location.href= window.history.go(-1);
	 </script>
	 ";
	
}  else  {
	
$result2	= mysqli_query($con, $mysql2);
echo '<div id="tampil_modal">
	  <div id="modal">
      <div id="modal_atas">Pesan</div>
      <p>Data Berhasil Diubah</p>';
	
}


}


else {



//pengkondisian nilai yang diterima :
if ($proses < 0)  { 
	
echo " 
	<script>
	   alert('Persediaan Barang Negatif');
	   	   document.location.href= window.history.go(-1);
	 </script>
	 ";
	
}  else  {
	
	$idongkir = $_REQUEST["idongkir"];
	
	$ongkir= "UPDATE ongkirdb_on SET   nilai='$nilaiharga',nolkppkirfk_on='$nolkppeksfk_on' WHERE idongkir_on = '$idongkir'";
	
$result2	= mysqli_query($con, $mysql2);
$result3	= mysqli_query($con, $ongkir);
echo '<div id="tampil_modal">
	  <div id="modal">
      <div id="modal_atas">Pesan</div>
      <p>Data Berhasil Diubah</p>';
	
}



}


}



if (isset($_REQUEST["batal"]) ) {
	echo " 
	<script>
	   alert('DATA BERHASIL DIBATALKAN');
	   document.location.href= window.history.go(-2);
	 </script>
	 ";

	 
}	



?>








	
<button class="tips2" type="pesan" onclick="goBack()"> <span class="tooltips2" > Ke form tambah sebelumnya</span>Input Lagi ?</button>
<button class="tips3" type="pesan2" onclick="location.href='ekspedisi.php'" ><span class="tooltips3" > ke halaman produk</span>Home</button>

<script>
function goBack() {
    window.history.back();
}
</script>
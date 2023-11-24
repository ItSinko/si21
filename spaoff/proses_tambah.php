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
if(isset($_REQUEST['submit'])) {
	
	
$no_off= $_REQUEST["no_off"];
$idorder_off = $_REQUEST["idorder_off"];
$pemesan_off = $_REQUEST["pemesan_off"];
$status_off = $_REQUEST["status_off"];
$jumlah_off = $_REQUEST["jumlah_off"];
$tgl_buat_off = $_REQUEST["tgl_buat_off"];



//pemotongan harga
$harga_off = $_REQUEST["harga_off"];
$potongharga = substr ($harga_off,3);
$hrg = str_replace('.', '', $potongharga);

//pemotongan ongkos
$ongkos_off = $_REQUEST["ongkos_off"];
$potongongkos = substr ($ongkos_off,3);
$oks = str_replace('.', '', $potongongkos);


$diskon_nota_off = $_REQUEST["diskon_nota_off"];
$diskon_uji_off = $_REQUEST["diskon_uji_off"];
$temphari_off = $_REQUEST["temphari_off"];
$ket_off = $_REQUEST["ket_off"];


$idprod_off = $_REQUEST["idprod_off"];
$idrate2_off = $_REQUEST["idrate2_off"];
$pabrik_off = $_REQUEST["pabrik_off"];

$distributor= $_REQUEST["pabrik"];

$cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM spa_off WHERE idorder_off ='OFF-$idorder_off' "));
if ($cek > 0) {

	echo "<script>window.alert('ID Order Sudah Pernah Dimasukan !')
    window.history.back()</script>";
    }	
	
else 

	{

//kondisi satu 	
$mysqli = "INSERT INTO spa_off VALUES  ('$no_off', 'OFF-$idorder_off', '$pemesan_off', '$status_off', '$tgl_buat_off', 
									   '', '$jumlah_off', '$hrg', '$oks','$diskon_nota_off', '$diskon_uji_off', '$temphari_off', '$ket_off','$idprod_off',
									   '$idrate2_off','$pabrik_off')";
									   
									   
								   
		//memasukkan ongkos 	
$ongkir = "INSERT INTO ongkirdb_off VALUES  ('', '$oks', 'OFF-$idorder_off')";
									   
										   
				



//pengkondisian nilai yang diterima :

if ($distributor=='SINKO PRIMA ALLOY PT')  { 
	$result	= mysqli_query($con, $mysqli);
	
	$results	= mysqli_query($con, $ongkir);

echo '<div id="tampil_modal">
    <div id="modal">
      <div id="modal_atas">Pesan</div>
      <p>Data Berhasil Ditambahkan</p>
	  
	 *Kondisi Satu	 	  
	  ';

	}  

		else 
		
		{
							
$result	= mysqli_query($con, $mysqli);

echo '<div id="tampil_modal">
    <div id="modal">
      <div id="modal_atas">Pesan</div>
      <p>Data Berhasil Ditambahkan</p>
	  
*Kondisi Dua	  
	  ';


	  
		}
	

		}
								}
								
								
								
									
	if (isset($_REQUEST["batal"]) ) {
	echo " 
	<script>
	   alert('DATA BERHASIL DIBATALKAN');
	   document.location.href= 'spa.php';
	 </script>
	 ";
	   
}




	?>
	


<button class="tips2" type="pesan" onclick="goBack()"> <span class="tooltips2" > Ke form tambah sebelumnya</span>Input Lagi ?</button>
<button class="tips3" type="pesan2" onclick="location.href='spa.php'" ><span class="tooltips3" > ke halaman produk</span>Home</button>
<script>
function goBack() {
    window.history.back();
}
</script>




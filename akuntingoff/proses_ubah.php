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

$idorderacc_off = $_REQUEST["idorderacc_off"];
$noref_off = $_REQUEST["noref_off"];
$noefak_off = $_REQUEST["noefak_off"];
$nofakju_off = $_REQUEST["nofakju_off"];
$diskonacc_off = $_REQUEST["diskonacc_off"];
$idprodacc_off = $_REQUEST["idprodacc_off"];
$pabrikacc_off = $_REQUEST["pabrikacc_off"];

	//potong harga
	$realisasiacc = $_REQUEST["realisasiacc"];
	$potongrealisasiacc = substr ($realisasiacc,3);
	$realacc = str_replace('.', '', $potongrealisasiacc);
	
$tgllunas_off = $_REQUEST["tgllunas_off"];

$diskonujiacc_off = $_REQUEST["diskonujiacc_off"];
$kas_off = $_REQUEST["kas_off"];
$ketacc_off = $_REQUEST["ketacc_off"];

$temphariacc_off = $_REQUEST["temphariacc_off"];


//Query 2 Kondisi	

	//1.Kondisi Satu
	$update= "UPDATE acc_off
          SET noref_off='$noref_off', noefak_off='$noefak_off', nofakju_off='$nofakju_off'
		, diskonacc_off='$diskonacc_off', realisasiaccoff='$realacc', temphariacc_off='$temphariacc_off' 
		,  tgllunas_off='$tgllunas_off',kas_off='$kas_off',ketaccoff='$ketacc_off',pabrikacc_off='$pabrikacc_off',idprodacc_off='$idprodacc_off'
		,  diskonujiacc_off='$diskonujiacc_off'
		, kas_off = '$kas_off' 
		  WHERE idorderacc_off = '$idorderacc_off'";
	
	$result	= mysqli_query($con, $update);
	
	echo '<div id="tampil_modal">
		  <div id="modal">
		  <div id="modal_atas">Pesan</div>
          <p>Data Berhasil Ditambahkan</p>';
	


}
	
	


	
	if (isset($_REQUEST["batal"]) ) {
	echo " 
	<script>
	   alert('DATA BERHASIL DIBATALKAN');
	   document.location.href= 'akunting.php';
	 </script>
	 ";
	   
}	

	?>


	
	
	
<button class="tips2" type="pesan" onclick="goBack()"> <span class="tooltips2" > Ke form tambah sebelumnya</span>Input Lagi ?</button>
<button class="tips3" type="pesan2" onclick="location.href='akunting.php'" ><span class="tooltips3" > ke halaman akunting</span>Home</button>
<script>
function goBack() {
    window.history.back();
}
</script>
















































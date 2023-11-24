
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
	
font-size: 12px	}

	/*PEMBATAS TOOLTIPS ! */
.tips3 {
    position: relative;
    display: inline-block; }

.tips3 .tooltips3 {
    visibility: hidden;
    width: 180px;
    background-color: #FEF9FD;
    color: #010101;
    text-align: center;
    padding: 5px 0;
     border:solid 1px black;
    /
	
	* Position the tips2 */
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

if (isset($_POST['submit'])){

$nofak1 =$_REQUEST['nofak1'];
$nofak2=$_REQUEST['nofak2'];
$noref=$_REQUEST['noref'];
$tglbuat=$_REQUEST['tglbuat'];
$ket=$_REQUEST['ket'];
$stok=$_REQUEST['stok'];

$cek = mysqli_num_rows(mysqli_query($con,"SELECT norefinfo FROM infofaktur WHERE norefinfo='$noref'"));
if ($cek > 0) {

	echo "<script>window.alert('Nomer Referensi Telah Dimasukan')
    window.history.back()</script>";
    }
	

	else {

foreach(range($nofak1,$nofak2) as $arrayid => $noefak) {
				$noreffk=$_REQUEST['noref'];
				
				$query = "INSERT INTO efaktur (noefak,noref,stok) VALUES
							($noefak,$noreffk,$stok) ";
								$result = mysqli_query($con,$query);  }

			
    			$sql="INSERT INTO infofaktur(norefinfo,tglbuat,ket) VALUES
						('$noref','$tglbuat','$ket')";
						$recall= mysqli_query($con,$sql);
			
	  echo '<div id="tampil_modal">
	  <div id="modal">
      <div id="modal_atas">Pesan</div>
      <p>Data Berhasil Ditambahkan</p>';
	 }
	}
	
	
	if (isset($_REQUEST["batal"]) ) {
	echo " 
	<script>
	   alert('DATA BERHASIL DIBATALKAN');
	   document.location.href= 'efaktur.php';
	 </script>
	 ";
	}
?>


	<button class="tips2" type="pesan" onclick="goBack()"> <span class="tooltips2" > Ke form tambah sebelumnya</span>Input Lagi ?</button>
	<button class="tips3" type="pesan2" onclick="location.href='efaktur.php'" ><span class="tooltips3" > ke halaman produk</span>Home</button>
		
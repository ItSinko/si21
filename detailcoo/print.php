<?php 

$nocoo_on=$_GET['nocoo_on'];
$con=mysqli_connect("localhost","root","","kontrol_db");

$result = mysqli_query($con,"SELECT * FROM detailcoo_on
													INNER JOIN spa_on ON detailcoo_on.nolkppcoo_on=spa_on.nolkpp_on
													INNER JOIN gudang_on ON gudang_on.nolkppgdg_on=detailcoo_on.nolkppcoo_on
													INNER JOIN distributor ON distributor.iddsb=spa_on.pabrik_on
													INNER JOIN produk_master ON produk_master.id_prod=spa_on.idprod_on
													INNER JOIN seri_on ON seri_on.idseri_on=detailcoo_on.idserifk_on 
													 WHERE nocoo_on='$nocoo_on'");
$detail = mysqli_fetch_assoc($result);

//untuk romawi bulancoo
$array_bulan = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");


//untuk tanggal

function tanggal_indo($tanggal)
{
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}


?>

<html>
<head>
<title>Coo</title>
<style>

  #back{
				width:810px;
				height:1142px;
				background:url(coo_background.jpg);
				 background-size: 816px 1150px;

				background-repeat: no-repeat;
				
				position: absolute;
				top: 1px;
				left: 1px;
			}
 #noref{
				width:294px;
				height:32px;
				background:#F5F5F5;
				border:solid 2px black;
				position: absolute;
				top: 78px;
				left: 432px;
				text-align:center;
			}


 #kotakinstansi{
				width:618px;
				height:32px;
				
				position: absolute;
				top: 568px;
				left: 110px;
						
			text-align:center
			}

 #kotakid{
				width:520px;
				height:32px;
				
				position: absolute;
				top: 653px;
				left: 156px;
				text-align:center;
			}


 #kotakdeskripsi{
				width:605px;
				height:70px;
				
				position: absolute;
				top: 689px;
				left: 110px;
				text-align:center;
			
			}
			
			
	/*Untuk labelreff */
.ref{
     font: 18px Times New Roman,Times,serif;
	font-weight: bold;
   	position: absolute;
	top: 5px;
    left:18px;

   }		
			
	/*Untuk labelreff */
.judul{
     font: 28px Times New Roman,Times,serif;
	font-weight: bold;
   	position: absolute;
	top: 180px;
    left:230px;
 text-decoration: underline;
   }			
			
			
			
	/*Untuk labelreff */
.isi1{
     font: 20px Cambria;
	
   	position: absolute;
	top: 250px;
    left:250px;

   }			
				
				
	/*Untuk labelreff */
.isi2{
     font: 20px Cambria;
		font-weight: bold;
   	position: absolute;
	top: 275px;
    left:110px;

   }		
			
		
	/*Untuk labelreff */
.isi3{
     font: 20px Cambria;
	
   	position: absolute;
	top: 345px;
    left:110px;

   }		
		
	
	/*Untuk labelreff */
.isi4{
     font: 20px Cambria;
	font-weight: bold;
   	position: absolute;
	top: 388px;
    left:110px;
	}	

.isi5{
     font: 20px Cambria;
	font-weight: bold;
   	position: absolute;
	top: 430px;
    left:110px;
    }

.isi6{
     font: 20px Cambria;
	font-weight: bold;
   	position: absolute;
	top: 470px;
    left:110px;

   }	   
		   
.isi7{
     font: 20px Cambria;
	font-weight: bold;
   	position: absolute;
	top: 512px;
    left:110px;

   }

	/*Untuk labelreff */
.namaproduk{
     font: 20px Cambria;

   	position: absolute;
	top: 388px;
    left:263px;
 }	

 
 
	/*Untuk labelreff */
.type{
     font: 20px Cambria;

   	position: absolute;
	top: 430px;
    left:263px;
}

	/*Untuk labelreff */
.noseri{
     font: 20px Cambria;

   	position: absolute;
	top: 470px;
    left:263px;
}

   
  .merk{
     font: 20px Cambria;

   	position: absolute;
	top: 512px;
    left:263px; 
	}
	
 .kepada{
    font: 20px Cambria;
	position: absolute;
	top: 540px;
    left:387px;
		} 

		
		
  .for  {
    font: 20px Cambria;
	position: absolute;
	top: 625px;
    left:315px;
		} 

  .penutup{
    font: 20px Cambria;
	font-weight: bold;
   	position: absolute;
	top: 785px;
    left:228px;
		  } 
   
  .tgl{
    font: 20px Cambria;
	position: absolute;
	top: 864px;
    left:505px;
	  } 
   
   
.pabrik{
    font: 20px Cambria;
	position: absolute;
	top: 898px;
    left:500px;
		}    
   
   
.namaorang{
    font: 20px Cambria;
	font-weight: bold;
   	position: absolute;
	top: 1005px;
    left:505px;
	text-decoration: underline;
   }    
  

.jabatan{
    font: 20px Cambria;
	position: absolute;
	top: 1040px;
    left:552px;
		}    
     
 	 
	 
	 p.a{
		 
	font: 20px Cambria;
	font-weight: bold;
		}

 p.b {
		 
	font: 20px Cambria;
	font-weight: bold;
	margin: 5px;
	 
	 }	 
	 
	  p.c{
	font: 20px Cambria;
	font-weight: bold;
	margin: 5px;
	
	 }

	 
/*Untuk tombol Submit */
button[type=cetak] {
    width: 15%;
   	background: #EB3B88;
    box-shadow: inset -1px -1px 3px #FF62A7;
	-moz-box-shadow: inset -1px -1px 3px #FF62A7;
	-webkit-box-shadow: inset -1px -1px 3px #FF62A7;
		border-radius: 3px;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	color: white;
    padding: 10px 10px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	position: relative;
	top: 80px;
    left: 850px;
	}
	
	
	@media print {
   #masterContent {position:relative; padding:0; height:0px; overflow:visible;}
   
   #back {position:absolute; width:100%; top:0; padding:0; margin:-1px;}
}
	
</style>

<form action="" method="post">
<button onclick="myFunction()"  type="cetak"  id="btnPrint" name="submit" title="Dilanjutkan ke proses cetak">Cetak Dokumen</button>
<?php  
  date_default_timezone_set("Asia/Jakarta");  
  //Function untuk menset waktu ke waktu asia/jakarta  
  ?>
<input type="hidden" id="tgl" name="tgl" value="<?php echo date('Y-m-d H:i:s') ?>" readonly>

<input type="hidden" id="tgl" name="nocoofk" value="<?php echo $detail['nocoo_on']; ?>" readonly>
</form>



<div id="masterContent"> 
<div id="back" class="back">
<div id="noref" class="noref">



<?php $bulan = $array_bulan[date(''.$detail["bulan_on"].'')]; 	?>
<label  class="ref"><?php echo $detail['nocoo_on']; ?> / SKA / &nbsp; <?php echo $bulan ?>  &nbsp; / SPA / <?php echo (substr($detail['tglsj_on'],0,4)); ?></label>
</div>



<?php
$con=mysqli_connect("localhost","root","","kontrol_db");

if(isset($_REQUEST['submit'])) {

date_default_timezone_set("Asia/Jakarta");  
  
$tglmaster = $_REQUEST["tgl"];
$parameter_coo = $_REQUEST["nocoo_on"];


$mysqli = "INSERT INTO tglprintcoo_on VALUES ('','$tglmaster','$parameter_coo')";
$result	= mysqli_query($con, $mysqli);	

}
?>

<label  class="judul">CERTIFICATE OF ORIGIN</label>
<label class="isi1">Berdasarkan ijin edar/produksi dari</label>
<label class="isi2">Kementrian Kesehatan Nomor : KEMENKES RI AKD 20403710512</label>
<label class="isi3">PT. SINKO PRIMA ALLOY (penyedia),menyerahkan hasil produksi:</label>
<label class="isi4">Nama produk &nbsp; &nbsp;: </label>
<label class="isi5">Type &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
</label>
<label class="isi6">Nomer seri&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
<label class="isi7">Merk Produk&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
<label class="namaproduk"><?php echo $detail['namacoo']; ?></label>
<label class="type"><?php echo $detail['sing_prod']; ?></label>
<label class="noseri"><?php echo $detail['noseri_on']; ?></label>
<label class="merk">ELITECH</label>
<label class="kepada">Kepada :</label>
<label class="for">untuk ID & Nama Paket :</label>
<label class="penutup">Dalam kondisi baru, baik dan lengkap.</label>

<label class="tgl">Surabaya, <?php echo tanggal_indo ($detail["tglsj_on"]); ?></label>
<label class="pabrik">PT. SINKO PRIMA ALLOY</label>

<label class="namaorang">Kusmardiana Rahayu</label>
<label class="jabatan">Q.A Manager</label>



<div id="kotakinstansi" class="kotakinstansi">
<p class="a"><?php echo $detail['instansi_on']; ?></p>
</div>



<div id="kotakid" class="kotakid">
<p class="b"><?php echo $detail['noaks_on']; ?></p>
</div>



<div id="kotakdeskripsi" class="kotakdeskripsi">
<p class="c"><?php echo $detail['despaket_on']; ?></p>


</div>
</div>
</div>

</body>
</html>





<script src="jquery.min.js"></script>
<script src="printPreview.js"></script>
<script type="text/javascript">
        $(function(){
           $("#btnPrint").printPreview({
                obj2print: "#masterContent",
			width:'810'
            });
        });
    </script>




















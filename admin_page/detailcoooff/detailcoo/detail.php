<?php


$nolkppcoo_on=$_GET['nolkppcoo_on'];
$con=mysqli_connect("localhost","root","","kontrol_db");

$result = mysqli_query($con,"SELECT * FROM detailcoo_on
													INNER JOIN spa_on ON detailcoo_on.nolkppcoo_on=spa_on.nolkpp_on
													INNER JOIN gudang_on ON gudang_on.nolkppgdg_on=detailcoo_on.nolkppcoo_on
													INNER JOIN distributor ON distributor.iddsb=spa_on.pabrik_on
													INNER JOIN produk_master ON produk_master.id_prod=spa_on.idprod_on
													INNER JOIN seri_on ON seri_on.idseri_on=detailcoo_on.idserifk_on 
													WHERE  nolkppcoo_on='$nolkppcoo_on'	");
																										
$detail = mysqli_fetch_assoc($result);
//untuk romawi bulancoo
$array_bulan = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
?>
<html>
<head>
 <title>Detail</title> 
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





   
[class^="cus-"],
[class*=" cus-"] {
  display: inline-block;
  width: 17px;
  height: 16px;
  *margin-right: .3em;
  line-height: 14px;
  vertical-align: text-top;
  background-image: url("spritesheet.png");
  background-position: 14px 14px;
  background-repeat: no-repeat;
}
[class^="cus-"]:last-child,
[class*=" cus-"]:last-child {
  *margin-left: 0;
}


.cus-cross {
    width: 16px;
    height: 16px;
    background-position: -369px -239px;
}

.cus-application_form_edit {
    width: 16px;
    height: 16px;
    background-position: -343px -5px;
}

.cus-add {
    width: 16px;
    height: 16px;
    background-position: -31px -5px;
}


.cus-house {
    width: 16px;
    height: 16px;
    background-position: -187px -395px;
}
.cus-zoom {
    width: 16px;
    height: 16px;
    background-position: -135px -811px;
}

.cus-exclamation {
    width: 16px;
    height: 16px;
    background-position: -525px -317px;
}

 .cus-arrow_right {
    width: 16px;
    height: 16px;
    background-position: -551px -31px;
}
  
.cus-page {
    width: 16px;
    height: 16px;
    background-position: -473px -499px;
}

		
	/*PEMBATAS TOOLTIPS ! */
	

.cus-application_form_edit {
    position: relative;
    display: inline-block;
    
}

.cus-application_form_edit .tooltips4 {
    visibility: hidden;
    width: 180px;
    background-color: #FEF9FD;
    color: #010101;
 
    text-align: center;
    
    padding: 5px 0;
border:solid 1px black;
    /* Position the button */
    position: absolute;
    z-index: 1;
}

.cus-application_form_edit:hover .tooltips4 {
    visibility: visible;
}

.tooltips4 {
	position: absolute;
	right:1px;
font-size: 10px
	
	}
	
	
	/*PEMBATAS TOOLTIPS ! */
.cus-cross {
    position: relative;
    display: inline-block;
    }

.cus-cross .tooltips3 {
    visibility: hidden;
    width: 180px;
    background-color: purple;
    color: white;
	text-align: center;
    padding: 5px 0;
	border:solid 1px black;
    /* Position the button */
    position: absolute;
    z-index: 1;
}

.cus-cross:hover .tooltips3 {
 visibility: visible;
}

.tooltips3 {
	position: absolute;
	right:1px;
font-size: 10px
			}	
	
		/*PEMBATAS TOOLTIPS ! */
.cus-page{
    position: relative;
    display: inline-block;
    
}

.cus-page .tooltips5 {
    visibility: hidden;
    width: 180px;
    background-color: #FEF9FD;
    color: #010101;
 
    text-align: center;
    
    padding: 5px 0;
border:solid 1px black;
    /* Position the button */
    position: absolute;
    z-index: 1;
}

.cus-page:hover .tooltips5 {
    visibility: visible;
}

.tooltips5 {
	position: absolute;
	right:1px;
font-size: 10px
	
	}	

	
	
.typecoo { text-align: left; }	
.noid { text-align: left; }	
.nmprd { text-align: left; }	
</style>
<head>
<body>

<table>
           <tr>
			<th width="1%">No</th>
			<th width="3%">No Coo</th>
		    <th width="5%">No Seri</th>
		    <th width="5%">Type</th>
		    <th width="8%">Nama Produk</th>
		    <th width="5%">No AKD</th>
			<th width="5%">Bulan</th>
			<th width="5%">No LKPP</th>
			<th width="5%">Tgl SJ</th>
			<th width="5%">Tgl Print</th>
			<th width="5%">Tombol</th>
			</tr>
<?php $a=1; ?>			
<?php foreach( $result as $detail): ?>			
<?php		
 $bulan = $array_bulan[date(''.$detail["bulan_on"].'')]; 	

 echo		
 '<tr>	
 
			<td>'.$a++.'</td>
			<td>'.$detail["nocoo_on"].'</td>
			<td>'.$detail["noseri_on"].'</td>
			<td class="typecoo">'.$detail["sing_prod"].' Unit</td>
			<td class="nmprd">'.$detail["nam_prod"].'</td>
			<td>'.$detail["noakd"].'</td>
			
			<td>'.$bulan.'</td>
			<td >'.$detail["nolkppcoo_on"].'</td>';
			
			$sources = $detail["tglsj_on"];

								if ($sources=='-')  { 
									echo '<td>-</td>';
	
												}

								else {
									$tglsjcoo_def = date_create($sources);

									
								  $tglsjcoo = date_format($tglsjcoo_def,"d/m/Y");
									echo '<td>'.$tglsjcoo.'</td>';
												}	
?>		

	<td>
	
    <a href="dataprint.php?nocoo_on=<?= $detail["nocoo_on"]; ?>"  
    onclick="window.open('dataprint.php?nocoo_on=<?= $detail["nocoo_on"]; ?>', 
                         'newwindow', 
                         'width=300,height=250'); 
              return false;"  title="Hapus Data Ini">Riwayat</a> 
			</td>
					

					
						   
		<td>         <a  href="print.php?nocoo_on=<?= $detail["nocoo_on"]; ?>"  title="Cetak Dokumen" onclick="return confirm('Yakin Ingin Cetak Sertifikat COO?');" class="cus-page"></a> |      
						<a href="hapus.php?nocoo_on=<?= $detail["nocoo_on"]; ?>
						  "onclick="return confirm('Apakah Yakin Akan Dihapus ?');" class="cus-cross" title="Hapus Data Ini"></a> 	
						  </td>
						  </tr>
<?php endforeach; ?>
</table>



















	</body>
	</html>
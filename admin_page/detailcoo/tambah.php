
<html>
<head>
<title>SPA Tambah</title>
</head>
<style>
 .cd:hover { background: #0000; color: #000; }  
/* Hover cell effect! */



   
	.field_form{
		border: 1px solid #ddd !important;
		margin: 0;
		xmin-width: 0;
		padding: 10px;       
		position: relative;
		border-radius:4px;
		background-color:#f5f5f5;
		padding-left:10px!important;
	}	
	
		.legend_form
		{
			font-size:12px;
			font-weight:bold;
			margin-bottom: 0px; 
			width: 35%; 
			border: 1px solid #ddd;
			border-radius: 4px; 
			padding: 5px 5px 5px 10px; 
			background-color: #ffffff;
		}
		
		 form-control-inline {
    height: 10%;

}

				   
				   input[id=idprod_on]{
display: none;
	               }
				   input[id=pabrik_on]{
display: none;
	               }
</style>

<body>

<div class="container-fluid" >


 <table class="table" >
<form   method="post" action="check_form/tambah/detailcooon.php">

<fieldset>
<legend>Tambah Data</legend>
<p id="error_message" class="font-weight-bold text-danger"></p>
<p id="success_message" class="font-weight-bold text-success"></p>
</fieldset>
 
<tr>
 
 <td class="cd" colspan="1">  
 <fieldset class="field_form">
 <legend class="legend_form">Info Produk</legend>


	<input id="idprod_on" placeholder="" name="idprod_on">
	<input type="text" id="pabrik_on" name="pabrik_on">
	 
	<div class="form-group row">
     <label  class="col-sm-3 col-form-label">No LKPP  *</label>
     <div class="col-sm-4 ">
     <select  class="form-control form-control-inline" style=" height:28px;"   id="nolkpp"   onchange="changeValue(this.value)" required name="nolkpp">
	 
	 
	 <option value="">-Pilih LKPP-</option>
	 
	 <?php 
     $result = mysqli_query($con, "SELECT * FROM spa_on INNER JOIN gudang_on ON gudang_on.nolkppgdg_on = spa_on.nolkpp_on
													   INNER JOIN distributor ON distributor.iddsb= gudang_on.pabrikgdg_on
													   INNER JOIN produk_master ON produk_master.id_prod= spa_on.idprod_on
													   LEFT JOIN seri_on ON seri_on.lkppfk_on = spa_on.nolkpp_on
													   WHERE statusseri = 1
													   GROUP BY nolkpp_on
													   ORDER BY nolkpp_on + 0 DESC 
													   ");    	
    $jsArray = "var dtMhs = new Array();\n";        
    while ($row = mysqli_fetch_array($result)) {  

		$date=date_create($row['tglsj_on']);
		
		$date2 =  date_format($date,"F");
	
	 		
        echo '<option value="' . $row['nolkpp_on'] . '">' . $row['nolkpp_on'] . '</option>';    
        $jsArray .= "dtMhs['" . $row['nolkpp_on'] . "'] = {
														 distributor:'" . addslashes($row['pabrik']) . "',
														 jumlah:'" . addslashes($row['jumlah_on']) . "',
														 alias:'" . addslashes($row['sing_prod']) . "',														 
														 namaprd:'" . addslashes($row['nam_prod']) . "',
														 noakd:'" . addslashes($row['noakd']) . "',												
														 noid:'" . addslashes($row['noaks_on']) . "',
														 kepada:'" . addslashes($row['instansi_on']) . "',
														 despaket:'" . addslashes($row['despaket_on']) . "',
														 tglsj:'" . addslashes($row['tglsj_on']) . "',
														 bulan:'" . addslashes($date2) . "',
														 namacoo:'" . addslashes($row['namacoo']) . "',
														 idprod_on:'" .addslashes($row['id_prod'])."',
														 pabrik_on:'" .addslashes($row['iddsb'])."',	
														 satuan_prod:'" .addslashes($row['satuan_prod'])."',	
															};\n";
	}   
    ?>
      </select>
    </div>
  </div>
	  
	  	 	     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">No AKD</label>
     <div class="col-sm-6">
     <input type="text" class="form-control harga"  id="noakd"  placeholder="No AKD" readonly >
     </div>
     </div> 
  
  
	 	     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Type Produk</label>
     <div class="col-sm-6">
     <input type="text" class="form-control harga"  id="type"  placeholder="Type Produk" readonly>
     </div>
     </div> 


       <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Nama Produk </label>
     <div class="col-sm-8">
     <textarea class="form-control" rows="2" placeholder="Nama Produk" id="nmprd" readonly ></textarea>
     </div>
     </div>
 
  	 <div class="form-group row">
     <label class="col-sm-3 col-form-label" >Jumlah</label>
     <div class="col-sm-2">
     <div class="input-group-prepend">
     <input class="form-control tarifdiskon"  type="text"  style="height:28px; width:70px;"  id="jumlah" placeholder="99" readonly>
	<input id="satuan_prod" class="input-group-text " readonly style="height:28px; width:90px; text-align:left;">
  
     </div>
     </div>
     </div> 
 
	 	 
  <div class="form-group row">
    <label  class="col-sm-3 col-form-label">No Seri *</label>
    <div class="col-sm-1 ">
      <select   id="noseri"  onchange="changeSeri(this.value)" name="noseri[]"  placeholder="tes" size=6 multiple selected required>
 
        <?php 
		
	
    $results = mysqli_query($con, "SELECT * FROM spa_on 
								  INNER JOIN seri_on ON spa_on.nolkpp_on=seri_on.lkppfk_on WHERE statusseri = '1'");    
	
    $jsarrays = "var dtseri = new Array();\n";        
    while ($row = mysqli_fetch_array($results)) {    
        echo '<option    class="' . $row['nolkpp_on'] . '" value="' . $row['idseri_on'] . '">' . $row['noseri_on'] . '</option>';    
        $jsarrays .= "dtseri['" . $row['noseri_on'] . "'] = {
														 pk_seri:'" . addslashes($row['idseri_on']) . "',
												
															};\n";
	}   
    ?>
      </select>
    </div>
  </div>
     </fieldset>
     </td>

     <td class="cd" colspan="1">   
	 <fieldset class="field_form">
     <legend class="legend_form">Info COO</legend>

	 <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Distributor </label>
     <div class="col-sm-8">
     <textarea class="form-control" rows="1" placeholder="Distributor" id="dsb"  readonly ></textarea>
     </div>
     </div>
  
  <div class="form-group row">
     <label  class="col-sm-3 col-form-label">No ID</label>
     <div class="col-sm-6">
     <input type="text" class="form-control harga"  id="noaks"  placeholder="No AKS" readonly>
     </div>
     </div> 
	 
       <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Kepada </label>
     <div class="col-sm-8">
     <textarea class="form-control" rows="1" placeholder="Kepada" id="kepada"  readonly ></textarea>
     </div>
     </div> 
  
       <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Nama Paket </label>
     <div class="col-sm-8">
     <textarea class="form-control" rows="1" placeholder="Nama Paket" id="nmpkt" readonly ></textarea>
     </div>
     </div>
	 
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Tgl Surat Jalan</label>
     <div class="col-sm-6">
     <input type="text" class="form-control harga"  id="tglsj"  placeholder="No Surat Jalan" name="tglsj" readonly>
     </div>
     </div> 
	 
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Bulan *</label>
   
	<div class="col-sm-4 ">
    <input type="text" class="form-control"  id="bulan"  placeholder="No Surat Jalan" readonly>
    </div>
	</div>
	</fieldset>
    
	</td>
     </tr>	
     </table>
	
	<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Tambah Data ?');" id="register" name="submit" >Tambah Data</button>
	
	<a href="./index.php?hlm=deton" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>
	</div>
	</form>	
	
	 <script type="text/javascript">       
	 <?php echo $jsArray; ?>  
     function changeValue(nolkpp){  
    
	 document.getElementById('pabrik_on').value = dtMhs[nolkpp].pabrik_on;	
 	 document.getElementById('dsb').value = dtMhs[nolkpp].distributor;
	 document.getElementById('jumlah').value = dtMhs[nolkpp].jumlah;
	 document.getElementById('idprod_on').value = dtMhs[nolkpp].idprod_on;	
	 document.getElementById('type').value = dtMhs[nolkpp].alias;
	 document.getElementById('nmprd').value = dtMhs[nolkpp].namaprd;
	 document.getElementById('noakd').value = dtMhs[nolkpp].noakd;
	 document.getElementById('noaks').value = dtMhs[nolkpp].noid;
	 document.getElementById('kepada').value = dtMhs[nolkpp].kepada;
	 document.getElementById('bulan').value = dtMhs[nolkpp].bulan;
	 document.getElementById('nmpkt').value = dtMhs[nolkpp].despaket;
	 document.getElementById('tglsj').value = dtMhs[nolkpp].tglsj;
	 document.getElementById('satuan_prod').value = dtMhs[nolkpp].satuan_prod;
	 document.getElementById('namacoo').value = dtMhs[nolkpp].namacoo;
	 };  
	 </script> 

	 

     <script src="jquery.chained.min.js"></script>
	 
	 <script>
     $("#noseri").chained("#nolkpp");
     </script>
	 
	 </body>
	 </html>
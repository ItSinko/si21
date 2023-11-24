
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

input[id=pk_seri]{
display: none;
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
 
<form method="post" action="t.php" >

<fieldset>
<legend>Tambah Data</legend>
<p id="error_message" class="font-weight-bold text-danger"></p>
<p id="success_message" class="font-weight-bold text-success"></p>
</fieldset>
 
<tr>
 
 <td class="cd" colspan="1">  
 <fieldset class="field_form">
 <legend class="legend_form">Info Produk</legend>

	<input type="text" id="pk_seri">
	<input id="idprod_on" placeholder="">
	<input type="text" id="pabrik_on">
	 
	<div class="form-group row">
     <label  class="col-sm-3 col-form-label">No LKPP  *</label>
     <div class="col-sm-4 ">
     <select  class="form-control form-control-inline" style=" height:28px;"   id="nolkpp"   onchange="changeValue(this.value)" required>
	 <option value="">-Pilih LKPP-</option>
     
	 <?php 
	 $con = mysqli_connect("localhost","root","","kontrol_db");
     $result = mysqli_query($con, "SELECT * FROM spa_on INNER JOIN gudang_on ON gudang_on.nolkppgdg_on = spa_on.nolkpp_on
													   INNER JOIN distributor ON distributor.iddsb= gudang_on.pabrikgdg_on
													   INNER JOIN produk_master ON produk_master.id_prod= spa_on.idprod_on
													   ORDER BY nolkpp_on DESC
													   ");    	
    $jsArray = "var dtMhs = new Array();\n";        
	
    while ($row = mysqli_fetch_array($result)) {    
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
														 namacoo:'" . addslashes($row['namacoo']) . "',
														 idprod_on:'" .addslashes($row['id_prod'])."',
														 pabrik_on:'" .addslashes($row['iddsb'])."',	
															};\n";
	}   
    ?>
      </select>
    </div>
  </div>
	  
	  	 	     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">No AKD</label>
     <div class="col-sm-6">
     <input type="text" class="form-control harga"  id="noakd"  placeholder="No AKD" readonly>
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
	 <div class="input-group-text" style="height:28px;">
	 Unit
     </div>
     </div>
     </div>
     </div> 
 
	 	 
  <div class="form-group row">
    <label  class="col-sm-3 col-form-label">No Seri *</label>
    <div class="col-sm-1 ">
      <select   style=" height:50px;"   data-width="250px" id="noseri"  onchange="changeSeri(this.value)" name="noseri" multiple placeholder="tes" >
 
        <?php 
	$con = mysqli_connect("localhost","root","","kontrol_db");
    $results = mysqli_query($con, "SELECT * FROM spa_on 
								  INNER JOIN seri_on ON spa_on.nolkpp_on=seri_on.lkppfk_on");    
	
    $jsarrays = "var dtseri = new Array();\n";        
    while ($row = mysqli_fetch_array($results)) {    
        echo '<option    class="' . $row['nolkpp_on'] . '" value="' . $row['noseri_on'] . '">' . $row['noseri_on'] . '</option>';    
        $jsarrays .= "dtseri['" . $row['noseri_on'] . "'] = {
														 pk_seri:'" . addslashes($row['idseri_on']) . "',
												
															};\n";
	}   
    ?>
      </select>
    </div>
  </div>
 
 
	<input type="button" id="select_all"  value="Pilih Semua" class="btn btn-danger">
 
 
 
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
     <input type="text" class="form-control harga"  id="tglsj"  placeholder="No Surat Jalan" readonly>
     </div>
     </div> 

	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Bulan *</label>
    
	<div class="col-sm-4 ">
    <select  class="form-control form-control-inline" style=" height:28px;"   id="bulan"  >
	<option value="">-Pilih Bulan-</option>
	<option value="1">Januari</option>
	<option value="2">Februari</option>
	<option value="3">Maret</option>
	<option value="4">April</option>
	<option value="5">Mei</option>
	<option value="6">Juni</option>
	<option value="7">Juli</option>
	<option value="8">Agustus</option>
	<option value="9">September</option>
	<option value="10">Oktober</option>
	<option value="11">November</option>
	<option value="12">Desember</option>
    </select>
    </div>
	</div>
	</fieldset>
    
	</td>
     </tr>	
     </table>
	
	<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Tambah Data ?');" id="register" name="tambah" >Tambah Data</button>
	
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
	 document.getElementById('nmpkt').value = dtMhs[nolkpp].despaket;
	 document.getElementById('tglsj').value = dtMhs[nolkpp].tglsj;
	 document.getElementById('namacoo').value = dtMhs[nolkpp].namacoo;
	 };  
	 </script> 

	 <script type="text/javascript">    
	 <?php echo $jsarrays; ?>  
     function changeSeri(noseri_on){  
 	 document.getElementById('pk_seri').value = dtseri[noseri_on].pk_seri;
	 };  
     </script> 
	 
	 <script>
    $('#select_all').click( function() {
    $('#noseri option').prop('selected', true);
	});
	 </script>
     <script src="jquery.chained.min.js"></script>
	 
	 <script>
     $("#noseri").chained("#nolkpp");
     </script>
	 
	 </body>
	 </html>
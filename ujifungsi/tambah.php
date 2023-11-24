

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
</style>

<body   onclick="uang();" >

<div class="container-fluid" >




 <table class="table" >

 <form  onchange="uang();" method="post" id="check">

<fieldset >
 
<legend>Tambah Data</legend>
 
<p id="error_message" class="font-weight-bold text-danger"></p>
<p id="success_message" class="font-weight-bold text-success"></p>

 </fieldset>
 
<tr>
 
 <td class="cd" colspan="1">  
 <fieldset class="field_form">
 <legend class="legend_form">Info Produk</legend>
  <div class="form-group row">
    <label  class="col-sm-3 col-form-label">No LKPP *</label>
    <div class="col-sm-6 ">
      <select  class="form-control form-control-inline" style=" height:38px;"   onchange="changeValue(this.value)"  onclick="uang();hitung();" id="nolkpp"  required>
	<option value="" >-Pilih No LKPP-</option>
        
			<?php 
	$con = mysqli_connect("localhost","root","","kontrol_db");
    $result = mysqli_query($con,"SELECT * ,   harga_on * jumlah_on as total         
													  FROM acc_on INNER JOIN spa_on ON acc_on.nolkppacc_on = spa_on.nolkpp_on   
													  INNER JOIN distributor ON distributor.iddsb=acc_on.pabrikacc_on
													  INNER JOIN produk_master ON produk_master.id_prod=acc_on.idprodacc_on
													  ");  
													  
													  
    $jsArray = "var dtMhs = new Array();\n";        
    while ($row = mysqli_fetch_array($result)) {    
    echo '<option value="' . $row['nolkppacc_on'] . '">' . $row['nolkppacc_on'] . '</option>';    
    $jsArray .= "dtMhs['" . $row['nolkppacc_on'] . "'] = {	
														aksacc:'" . addslashes($row['noaks_on']) . "',
														nofakju:'" . addslashes($row['nofakju_on']) . "',
														tgllunas:'" . addslashes($row['tgllunas_on']) . "',
														namaprodukacc:'" . addslashes($row['nam_prod']) . "',
														hargaprd:'".addslashes($row['harga_on']). "',
														totalacc:'".addslashes($row['total']). "',
														distributor:'".addslashes($row['pabrik']). "',
														diskonujiacc:'".addslashes($row['diskonujiacc_on'])."',		
														id_prod:'".addslashes($row['id_prod'])."',		
														iddsb:'".addslashes($row['iddsb'])."',	
      													};\n";
													}													
														?>  
    </select>
    </div>
    </div>
 
 <div class="form-group row">
    <label  class="col-sm-3 col-form-label">No AKN</label>
    <div class="col-sm-6">
      <input type="text" class="form-control "  id="noaks"  placeholder="AKN-999-999" readonly>
    </div>
  </div> 
  
   <div class="form-group row">
    <label  class="col-sm-3 col-form-label">No E-Faktur</label>
    <div class="col-sm-6">
      <input type="text" class="form-control "   placeholder="SPA-111" id="noefaktur"  readonly>
    </div>
  </div> 
  
   
  
       <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Nama Produk </label>
     <div class="col-sm-8">
     <textarea class="form-control" rows="2" placeholder="Nama Produk" id="namabarang" readonly ></textarea>
     </div>
     </div>
  
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Harga</label>
     <div class="col-sm-6">
     <input type="text" class="form-control "  id="hargabarang" readonly placeholder="Harga Produk"   >
     </div>
     </div> 
	 
	 	     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Total</label>
     <div class="col-sm-6">
     <input type="text" class="form-control total"  id="total"  placeholder="Total Harga"  onkeyup="hitung();" readonly>
     </div>
     </div> 
     </fieldset>
     </td>

     <td class="cd" colspan="1">  
     <fieldset class="field_form">
     <legend class="legend_form">Penghitungan Piutang</legend>
     <div class="form-group row">
     <label class="col-sm-3 col-form-label" >Tarif Uji *</label>
     <div class="col-sm-2">
     <div class="input-group-prepend">
     <input class="form-control diskon"  type="text"  style="height:28px; width:70px;" onkeyup="uang();hitung();" id="tarifuji"placeholder="99" >
	 <div class="input-group-text" style="height:28px;">
	 %
     
	 </div>
     </div>
     </div>
     </div> 
  

    <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Nilai Uji</label>
     <div class="col-sm-6">
      <input type="text" class="form-control nilaiuji"   placeholder="Nilai Uji" id="nilaiuji"  onclick="uang();" readonly>
     </div>
     </div>
  
	    <div class="form-group row">
     <label  class="col-sm-3 col-form-label">DPP Uji</label>
     <div class="col-sm-6">
      <input type="text" class="form-control dppuji"   placeholder="DPP Uji" id="dppuji"  readonly>
     </div>
     </div>
  
  	    <div class="form-group row">
     <label  class="col-sm-3 col-form-label">PPN Uji</label>
     <div class="col-sm-6">
      <input type="text" class="form-control ppnuji"   placeholder="PPN Uji" id="ppnuji" readonly>
     </div>
     </div>
	 
	   	    <div class="form-group row">
     <label  class="col-sm-3 col-form-label">PPH Uji</label>
     <div class="col-sm-6">
      <input type="text" class="form-control pphuji"   placeholder="PPH Uji" id="pphuji" readonly>
     </div>
     </div>
  
    	    <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Total Bayar</label>
     <div class="col-sm-6">
      <input type="text" class="form-control totaldibayar"   placeholder="Total Bayar Piutang" id="totalbayar"  readonly >
     </div>
     </div>
	 
     </fieldset>
     </td>
	 
	<td  class="cd" colspan="1">  
	<fieldset class="field_form">
	<legend class="legend_form">Invoice</legend>
   
   
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Distributor </label>
     <div class="col-sm-8">
     <textarea class="form-control" rows="1" placeholder="Distributor"  id="distributor" readonly>
	 </textarea>
     </div>
     </div>
   
   
	    	    <div class="form-group row">
     <label  class="col-sm-3 col-form-label">No Invoice *</label>
     <div class="col-sm-6">
      <input type="text" class="form-control"   placeholder="No Invoice" id="invuji"   >
     </div>
     </div>
  
  
	    	    <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Tgl Invoice  </label>
     <div class="col-sm-6">
      <input type="date" class="form-control" id="tgluji"  >
     </div>
     </div>
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Tgl Bayar Uji  </label>
    <div class="col-sm-6">
    <input type="date" class="form-control " id="tglbayar" >
    </div>
	</div>
  
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Kas / Bank *</label>
    <div class="col-sm-6 ">
    <select  class="form-control form-control-inline" style=" height:38px;"   id="kasuji" >
	<option value="">Pilih Kas / Bank</option>
	<option value="BCA SPA">BCA SPA</option>
	<option value="OCBC SPA">OCBC SPA</option>
	<option value="Tunai / Cash">Tunai / Cash</option>
	
    </select>
    </div>
    </div>

  <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Keterangan </label>
     <div class="col-sm-8">
     <textarea class="form-control" rows="2" placeholder="Keterangan"  id="ketuji"></textarea>
     </div>
     </div>
     </fieldset>
  
  </td>
     </tr>	
     </table> 
	 
<input id="id_prod" type="hidden">
<input id="iddsb" type="hidden">
	 
<button type="submit" class="btn btn-success" style="position:absolute; right:55%;"  onclick="return confirm('Yakin Tambah Data ?');" id="tambah" name="tambah">Tambah Data  </button>	

<a href="./index.php?hlm=piuon" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a> 


</div>
</form>	

	<script type="text/javascript">    
    <?php echo $jsArray; ?>  
    function changeValue(nolkppacc){  
	document.getElementById('noaks').value = dtMhs[nolkppacc].aksacc;  
	document.getElementById('noefaktur').value = dtMhs[nolkppacc].nofakju;
	document.getElementById('namabarang').value = dtMhs[nolkppacc].namaprodukacc;
	document.getElementById('hargabarang').value = dtMhs[nolkppacc].hargaprd;
	document.getElementById('total').value = dtMhs[nolkppacc].totalacc;
	document.getElementById('distributor').value = dtMhs[nolkppacc].distributor;
	document.getElementById('tarifuji').value = dtMhs[nolkppacc].diskonujiacc;
	document.getElementById('id_prod').value = dtMhs[nolkppacc].id_prod;
	document.getElementById('iddsb').value = dtMhs[nolkppacc].iddsb;
	};
</script>
 
 
 
 <script>
function hitung() {
    var nilaiuji  = $(".nilaiuji").val();
	var total = $(".total").val();
    var diskon = $(".diskon").val();
    var persen = 100;
	var koma   = 1.1;
    var nolkoma = 0.1;
	var noldua = 0.02;
	var dppuji  = $(".dppuji").val();
	var pphuji  = $(".pphuji").val();
	
	 nilaiuji   = nilaiuji.split('Rp ').join('');
     nilaiuji   = nilaiuji.split('.').join('');
      	  	
	 total   = total.split('Rp ').join('');
     total   = total.split('.').join('');
      
	 dppuji   = dppuji.split('Rp ').join('');
     dppuji   = dppuji.split('.').join('');

		
	nilaiuji = Math.round(total * diskon / persen); 
    $(".nilaiuji").val(nilaiuji);
    	
	dppuji = Math.round(nilaiuji / koma); 
    $(".dppuji").val(dppuji);

	ppnuji = Math.round(dppuji * nolkoma); 
    $(".ppnuji").val(ppnuji);
	
    pphuji = Math.round(dppuji * noldua); 
    $(".pphuji").val(pphuji);
	
	totaldibayar= (nilaiuji - pphuji);
	 $(".totaldibayar").val(totaldibayar);
	
	}	
</script>

 
 <script>
  function uang() {
		  
		  $('#hargabarang').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			
						
			$('#total').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			
			$('#nilaiuji').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			
				$('#dppuji').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			
				$('#ppnuji').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			
				$('#pphuji').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			
				$('#totalbayar').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });	
	}
	
	</script>

  <script src="jquery-1.10.2.min.js"></script>
  
	     <!--  JS nya Jquery Price Format  -->
        <script type="text/javascript" src="jquery.price_format.2.0.js"></script>

 	 	<script>
	$("#check").submit(function(e) {
	e.preventDefault();
	var nolkpp = $("#nolkpp").val();	
	var invuji = $("#invuji").val();	
	var tgluji = $("#tgluji").val();	
	var tarifuji = $("#tarifuji").val();	
	var tglbayar = $("#tglbayar").val();	
	var kasuji = $("#kasuji").val();	
	var ketuji = $("#ketuji").val();	
	var iddsb = $("#iddsb").val();	
	var id_prod = $("#id_prod").val();	
	
	if(nolkpp== "" || invuji== "" || kasuji== "") {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
		} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/tambah/ujifungsion.php",
			data: "nolkpp="+nolkpp+"&invuji="+invuji+"&tgluji="+tgluji+"&tarifuji="+tarifuji+"&tglbayar="+tglbayar+"&kasuji="+kasuji+"&ketuji="+ketuji+"&iddsb="+iddsb+"&id_prod="+id_prod,
         
			success: function(data){
				$('#success_message').fadeIn().html(data);
				setTimeout(function() {
					$('#success_message').fadeOut("slow");
				}, 2000 );

				}
			});
		}
	})
</script> 


</body>
</html>
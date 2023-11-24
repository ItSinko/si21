<?php 
$con = mysqli_connect("localhost","root","","kontrol_db");

$idorderacc_off = $_GET['idorderacc_off'];
$data = mysqli_query($con,"SELECT   * ,harga_off * jumlah_off as total
								,(harga_off * jumlah_off) * diskonacc_off / 100 as disfakturbeli	
								,(harga_off * jumlah_off) - ((harga_off * jumlah_off) * diskonacc_off / 100)  as totaljual
								,((harga_off * jumlah_off) - ((harga_off * jumlah_off) * diskonacc_off / 100)) / 1.1 as dppfaktur
								,(((harga_off * jumlah_off) - ((harga_off * jumlah_off) * diskonacc_off / 100)) / 1.1) * 0.1 as ppnfaktur
                 				,IF(iddsb='SPA',
								(0/ 1.1),
								((((harga_off * jumlah_off) - ((harga_off * jumlah_off) * diskonacc_off / 100)) / 1.1) * 0.1)*1)AS ppn
								,IF(iddsb='SPA',
								(0/ 1.1)*0.015,
								((((harga_off * jumlah_off) - ((harga_off * jumlah_off) * diskonacc_off / 100)) / 1.1) * 0.1)*0)AS pph
								
								,IF(iddsb='SPA',
								((((harga_off * jumlah_off) - ((harga_off * jumlah_off) * diskonacc_off / 100)) + 0)/1.1) * 0.985,
								(harga_off * jumlah_off) - ((harga_off * jumlah_off) * diskonacc_off / 100) +0 ) AS nilaiterima
								
								,IF(iddsb='SPA',
								(((((harga_off * jumlah_off) - ((harga_off * jumlah_off) * diskonacc_off / 100)) + 0)/1.1) * 0.985) - SUM(DISTINCT nilai_lunas)  ,
								((harga_off * jumlah_off) - ((harga_off * jumlah_off) * diskonacc_off / 100) + 0) - SUM(DISTINCT nilai_lunas)  ) AS selisihharga
								
								 ,SUM(DISTINCT nilai_lunas) as total_lunas
								
								,((harga_off * jumlah_off) - ((harga_off * jumlah_off) * diskonacc_off / 100)) + 0  as totpiu
								FROM acc_off											
      							INNER JOIN gudang_off ON gudang_off.idordergdg_off = acc_off.idorderacc_off
								INNER JOIN spa_off ON spa_off.idorder_off = acc_off.idorderacc_off
								
								INNER JOIN distributor ON distributor.iddsb = acc_off.pabrikacc_off
								INNER JOIN produk_master ON produk_master.id_prod = acc_off.idprodacc_off
								INNER JOIN history_lunas_off ON history_lunas_off.idorderahs_fk = acc_off.idorderacc_off
											
												WHERE idorderacc_off='$idorderacc_off' 
												                                                   ");
while ($accoff = mysqli_fetch_array($data)) {

?>

<!DOCTYPE html>
<html>
<head>
<title> Tambah Data </title>
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
	
	
	
	input[id=pabrikacc_off]{
display: none;
	               }
				   
input[id=idprodacc_off]{
display: none;
	               }
				   
input[id=diskonujiacc_off]{
display: none;
}
</style>

<body onload="uang();"  onchange="uang();">

<div class="container-fluid" >
<table class="table" >


<form id="check" method="post">
<fieldset>
 
<p id="error_message" class="font-weight-bold text-danger"></p>
<p  id="success_message" class="font-weight-bold text-success"></p>
<legend>Ubah Data</legend>
</fieldset>
 
<tr> 
 <td class="cd" colspan="1">  
 <fieldset class="field_form">
 <legend class="legend_form">Info Produk</legend>



	  <div class="form-group row">
     <label  class="col-sm-3 col-form-label">No SJ</label>
     <div class="col-sm-6">
     <input type="text" class="form-control harga"  id="nosjgdg" placeholder="SPA-111" value="<?= $accoff["nosj_off"]; ?>" readonly>
     </div>
     </div> 
	 

     <div class="form-group row">
	<label class="col-sm-3 col-form-label" >ID Order *</label>
	<div class="col-sm-4">
	<div class="input-group-prepend ">
   	<div class="input-group-text" style="height:`28px;">
	OFF-
    </div>
    <input class="form-control" type="text" placeholder="99" id="idorder" name="idorderoff" value= "<?= $accoff["idorderacc_off"]; ?>" readonly>
	 <span id="availability"></span>
	</div>
	</div>
	</div> 


	 <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Distributor </label>
     <div class="col-sm-8">
     <textarea class="form-control" rows="1" placeholder="Distributor" id="dsb" readonly><?= $accoff["pabrik"]; ?></textarea>
     </div>
     </div>

     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Nama Produk </label>
     <div class="col-sm-8">
     <textarea class="form-control" rows="2" placeholder="Nama Produk" id="nama"  readonly ><?= $accoff["nam_prod"]; ?></textarea>
     </div>
     </div>


     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Harga</label>
     <div class="col-sm-6">
     <input type="text" class="form-control hargaprd"  id="harga" onkeyup="uang();hitung();" value="<?= $accoff["harga_off"]; ?>" placeholder="Harga Produk" readonly>
     </div>
     </div> 
	 
	 
	 <div class="form-group row">
     <label class="col-sm-3 col-form-label" >Jumlah</label>
     <div class="col-sm-2">
     <div class="input-group-prepend">
     <input class="form-control jumlahprd"  type="text"  style="height:28px; width:70px;" onkeyup="hitung();" id="jumlah"placeholder="99" value="<?= $accoff["jumlah_off"]; ?>" readonly>
	 	 <input  value="<?= $accoff["satuan_prod"]; ?>" class="input-group-text " readonly style="height:28px; width:60px;">
     </div>
     </div>
     </div>
     </div> 
 
	 <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Total</label>
     <div class="col-sm-6">
     <input type="text" class="form-control totalprd"  id="total"   onkeyup="uang();hitung();" value="<?= $accoff["total"]; ?>" placeholder="Total Harga" readonly >
     </div>
     </div>
	 
	 </fieldset>
     </td>
	
     <td class="cd" colspan="1">  
     <fieldset class="field_form">
     <legend class="legend_form">Penghitungan Harga</legend> 
	 <div class="form-group row">
     <label class="col-sm-3 col-form-label" >Diskon *</label>
     <div class="col-sm-2">
     <div class="input-group-prepend">
     <input class="form-control tarifdiskon"  type="text"  style="height:28px; width:70px;"  id="tarifdiskon" onkeyup="uang(); hitung();" value="<?= $accoff["diskonacc_off"]; ?>">
	 <div class="input-group-text" style="height:28px;">
	 %
     </div>
     </div>
     </div>
     </div> 
	 
	 
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Diskon FP</label>
     <div class="col-sm-6">
      <input type="text" class="form-control diskonfaktur"  id="diskonfp" onkeyup="uang(); hitung();" value="<?php echo number_format($accoff['dppfaktur']); ?>" readonly >
     </div>
     </div>

     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Total Jual Barang</label>
     <div class="col-sm-6">
      <input type="text" class="form-control totaljual"  id="totaljual"  onkeyup="uang(); hitung();"  value="<?php echo number_format($accoff['totaljual']); ?>" readonly>
     </div>
     </div>
	 
	 <div class="form-group row">
     <label  class="col-sm-3 col-form-label">DPP FP</label>
     <div class="col-sm-6">
      <input type="text" class="form-control dppfaktur"  id="dppfp" onkeyup="uang(); hitung();"  value="<?php echo number_format($accoff['dppfaktur']); ?>" readonly >
     </div>
     </div>

	   	    <div class="form-group row">
     <label  class="col-sm-3 col-form-label">PPN FP</label>
     <div class="col-sm-6">
      <input type="text" class="form-control ppnfaktur"  id="ppnfp" onkeyup="uang(); hitung();"  value="<?php echo number_format($accoff['ppnfaktur']); ?>" readonly  >
     </div>
     </div>



	 
	 <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Total Faktur Jual</label>
     <div class="col-sm-6">
      <input type="text" class="form-control totalfaktur" id="totalfp" onkeyup="uang(); hitung();" value="<?php echo number_format($accoff['totpiu']); ?>" readonly>
     </div>
     </div>
	 </fieldset>
     </td>


	<td class="cd" colspan="1">
	
<fieldset class="field_form">

<legend class="legend_form">Info Faktur</legend>
	
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">No Referensi</label>
    <div class="col-sm-6">
    <input type="text" class="form-control"	id="noref_off" value="<?php echo $accoff['noref_off']; ?>" readonly>
    </div>
    </div>
	
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">E-Faktur</label>
    <div class="col-sm-6">
    <input type="text" class="form-control"	id="noefak_off" value="<?php echo $accoff['noefak_off']; ?>" readonly>
    </div>
    </div>
	</fieldset>
	
	<fieldset class="field_form">
    <legend class="legend_form">Lain Lain</legend>
	<div class="form-group row">
    <label class="col-sm-3 col-form-label" >Batas</label>
    <div class="col-sm-2">
    <div class="input-group-prepend">
    <input class="form-control jumlah" type="text" style="height:28px; width:70px;" id="term" value="<?php echo $accoff['temphariacc_off']; ?>" readonly>
	<div class="input-group-text" style="height:28px;">Hari
	</div>
	</div>
	</div>
	</div> 
	
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Realisasi *</label>
    <div class="col-sm-6">
    <input type="text" class="form-control realisasiacc"  id="realisasiacc" onkeyup="uang();hitung();" value="<?php echo number_format($accoff['total_lunas']); ?>" readonly>
    </div>
    </div>

	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Selisih Bayar</label>
    <div class="col-sm-6">
      <input type="text" class="form-control selisihbayar"  id="selisihbayar" value="<?php echo number_format($accoff['selisihharga']); ?>" onclick="uang();" readonly>
    </div>
  </div>

  
  <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Kas / Bank *</label>
    <div class="col-sm-6 ">
     <select  class="form-control form-control-inline" style=" height:38px;" id="kas">
	<option value="<?php echo $accoff['kas_off']; ?>"><?php echo $accoff['kas_off']; ?></option>
	<option value="BCA SPA">BCA SPA</option>
	<option value="OCBC SPA">OCBC SPA</option>
	<option value="Tunai / Cash">Tunai / Cash</option>
	  </select>
    </div>
  </div>
  
  <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Keterangan *</label>
    <div class="col-sm-6 ">
     <textarea rows="2" id="ket"class="form-control" placeholder="Keterangan"><?php echo $accoff["ketaccoff"]; ?></textarea>
    </div>
  </div>
  
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label"><span style=" color: Red;"><i class="fa fa-exclamation-circle" ></i></span> Alasan data diubah </label>
    <div class="col-sm-6">
    <textarea class="form-control" rows="1" minlength="5" placeholder="Minimal isi 5 karakter..." id="ket_log" ></textarea>
    </div>
    </div>	
   </fieldset>

    <input type="ext" class="form-control "  id="idprodacc_off" placeholder="Selisih Pembayaran" >
	  <input type="text" class="form-control "  id="pabrikacc_off" placeholder="Selisih Pembayaran" >
	  <input type="text" class="form-control "  id="diskonujiacc_off" placeholder="Selisih Pembayaran" >
	 
</td>
</tr>
</table>


<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Update Data ?');" id="tambah" name="tambah" >Update Data</button>	
<a href="./index.php?hlm=accoff" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a> 
</form>

<script type="text/javascript">    
<?php echo $jsArray; ?>  
function changeValue(nolkpp){  
	
	document.getElementById('nosjgdg').value = dtMhs[nolkpp].nosj;
	document.getElementById('idprodacc_off').value = dtMhs[nolkpp].idprodacc_off;	
	document.getElementById('pabrikacc_off').value = dtMhs[nolkpp].pabrikacc_off;	
	
	document.getElementById('diskonujiacc_off').value = dtMhs[nolkpp].diskonujiacc_off;	
	document.getElementById('nama').value = dtMhs[nolkpp].nama;
	document.getElementById('harga').value = dtMhs[nolkpp].harga;
	
	document.getElementById('jumlah').value = dtMhs[nolkpp].jumlah;
	document.getElementById('dsb').value = dtMhs[nolkpp].distributor;
	document.getElementById('tarif').value = dtMhs[nolkpp].diskon;
	
	document.getElementById('term').value = dtMhs[nolkpp].expdate;
	document.getElementById('tglsj').value = dtMhs[nolkpp].tglsj;
   
	};

	</script>

<script type="text/javascript" src="jquery.price_format.2.0.js"></script>


<script>
  function uang() {
			$('#harga').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			$('#total').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });		
			$('#diskonfp').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			$('#totaljual').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			$('#dppfp').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });	
			$('#ppnfp').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			
			$('#totalfp').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			$('#realisasiacc').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			$('#selisihbayar').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });			
  }
</script>

<script>
function hitung() {
    
	
//penetapan variabel	
	var jumlahprd 		= $(".jumlahprd").val();
	var hargaprd 		= $(".hargaprd").val();
    var totalprd 		= $(".totalprd").val();
	var tarifdiskon		= $(".tarifdiskon").val();
	var totaljual 	    = $(".totaljual").val();
	
	var dppfaktur 	    = $(".dppfaktur").val();
	var ppnfaktur 	    = $(".ppnfaktur").val();
	var totalfaktur 	    = $(".totalfaktur").val();
	var realisasiacc 	    = $(".realisasiacc").val();
	var selisihbayar 	    = $(".selisihbayar").val();
	var diskon 			= 100;
	var koma 			= 1.1;
	var nolkoma 		= 0.1;
	
//split label rp
	hargaprd   = hargaprd.split('Rp ').join('');
    hargaprd   = hargaprd.split('.').join('');
    
	totalprd   = totalprd.split('Rp ').join('');
    totalprd   = totalprd.split('.').join('');
	
	totaljual   = totaljual.split('Rp ').join('');
    totaljual   = totaljual.split('.').join(''); 
	
	dppfaktur   = dppfaktur.split('Rp ').join('');
    dppfaktur   = dppfaktur.split('.').join('');
	
	ppnfaktur   = ppnfaktur.split('Rp ').join('');
    ppnfaktur   = ppnfaktur.split('.').join('');
	
	totalfaktur   = totalfaktur.split('Rp ').join('');
    totalfaktur   = totalfaktur.split('.').join('');
	
	
	
	realisasiacc   = realisasiacc.split('Rp ').join('');
    realisasiacc   = realisasiacc.split('.').join('');
	
	selisihbayar   = selisihbayar.split('Rp ').join('');
    selisihbayar   = selisihbayar.split('.').join('');

	//fungsi penjumlahan	  
    totalprd = Math.round(jumlahprd * hargaprd); 
    $(".totalprd").val(totalprd);
	
	diskonfaktur = Math.round(totalprd * tarifdiskon / diskon); 
    $(".diskonfaktur").val(diskonfaktur);
	
	totaljual = Math.round(totalprd - diskonfaktur); 
    $(".totaljual").val(totaljual);	
	
	dppfaktur = Math.round(totaljual / koma);
	$(".dppfaktur").val(dppfaktur);

	ppnfaktur = Math.round(dppfaktur * nolkoma);
	$(".ppnfaktur").val(ppnfaktur);
	
	totalfaktur = (totaljual*1 + 0 *1); 
    $(".totalfaktur").val(totalfaktur);	
	
	selisihbayar = (realisasiacc - totalfaktur); 
    $(".selisihbayar").val(selisihbayar);		
}
</script>
	
<script src="jquery.chained.min.js"></script> 
<script>
    $("#efaktur").chained("#noref");
</script>

	
<script>
$("#check").submit(function(e) {
	e.preventDefault();
	var idorder = $("#idorder").val();	
	var noref_off = $("#noref_off").val();	
	var noefak_off = $("#noefak_off	").val();	
	var tarifdiskon = $("#tarifdiskon").val();	
	var realisasiacc = $("#realisasiacc").val();	
	var term = $("#term").val();	
	
	var kas = $("#kas").val();	
	var ket = $("#ket").val();	
	var idprodacc_off = $("#idprodacc_off").val();	
	var pabrikacc_off = $("#pabrikacc_off").val();	
	var diskonujiacc_off = $("#diskonujiacc_off").val();	
	var nosjgdg = $("#nosjgdg").val();	
	var ket_log = $("#ket_log").val();	
	
	if(idorder== "" || ket_log== "") {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
		} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/edit/akuntingoff.php",
			data: "idorder="+idorder+"&noref_off="+noref_off+"&noefak_off="+noefak_off+"&tarifdiskon="+tarifdiskon+"&realisasiacc="+realisasiacc+"&term="+term+"&kas="+kas+"&ket="+ket+"&idprodacc_off="+idprodacc_off+"&pabrikacc_off="+pabrikacc_off+"&diskonujiacc_off="+diskonujiacc_off+"&nosjgdg="+nosjgdg+"&ket_log="+ket_log,
         
		 
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
<?php
}
?>
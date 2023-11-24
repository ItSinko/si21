
<html>
<head>
<title>SPA Tambah</title>
</head>
<style>



   
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


 .cd:hover { background: #0000; color: #000; }  
/* Hover cell effect! */


input[id=pabrik_on]{
display: none;
}
				   
</style>

<body>

<div class="container-fluid" >

<table class="table" >
<form method="post"  action="check_form/tambah/gudang.php">
 <fieldset >
 
<legend>Tambah Data</legend>

<p id="error_message" class="font-weight-bold text-danger"></p>
<p  id="success_message" class="font-weight-bold text-success"></p>

</fieldset>
 
<tr>

<td class="cd" colspan="1">
   
<fieldset class="field_form">
<legend class="legend_form">Info Produk</legend>


    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">No PO</label>
<div class="col-sm-1 ">
	<select type="text"  class="selectpicker"  data-live-search="true" style="width: 213px;"  id="nopo" required> 
	         <option value="disabled">Pilih No Purchasing Order</option>
			<?php
				$con= mysqli_connect("localhost","root","","kontrol_db");
                $query = mysqli_query($con,"SELECT nopo_on, nolkppadm_on FROM admjual_on WHERE NOT EXISTS ( SELECT 1 FROM gudang_on WHERE gudang_on.nolkppgdg_on = admjual_on.nolkppadm_on ) GROUP BY nopo_on ");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['nopo_on']; ?>"><?php echo $row['nopo_on']; ?></option>
                <?php
                }
                ?>
	</select>
</div>
</div>
 
  <div class="form-group row">
    <label  class="col-sm-3 col-form-label">No LKPP</label>
    <div class="col-sm-3 ">
      <select  class="form-control " style=" height:52px;" onchange="changeValue(this.value)" id="nolkpp" name="nolkpp[]" multiple selected required>
		
       <?php 

    $result = mysqli_query($con,"SELECT * FROM admjual_on 
							INNER JOIN spa_on ON spa_on.nolkpp_on = admjual_on.nolkppadm_on
							INNER JOIN distributor ON distributor.iddsb= admjual_on.pabrikadm_on
							INNER JOIN produk_master ON produk_master.id_prod= admjual_on.idprodadm_on 
							WHERE
											
											NOT EXISTS (
												SELECT
													1
												FROM
													gudang_on
												WHERE
													gudang_on.nolkppgdg_on = admjual_on.nolkppadm_on
											)
								");    
	
	
    $jsArray = "var dtMhs = new Array();\n";        
    while ($row = mysqli_fetch_array($result)) {    
        echo '<option  class="'.$row['nopo_on'].'" value="' . $row['nolkppadm_on'] . '">' . $row['nolkppadm_on'] . '</option>';    
        $jsArray .= "dtMhs['" . $row['nolkppadm_on'] . "'] = {
														 distributor:'" . addslashes($row['pabrik']) . "',
														instansi:'" . addslashes($row['instansi_on']) . "',
														type:'" . addslashes($row['sing_prod']) . "',	
														nama:'" . addslashes($row['nam_prod']) . "',	
														jumlah:'" . addslashes($row['jumlah_on']) . "',	
														noaks:'" . addslashes($row['noaks_on']) . "',	
														
														pabrik_on:'" .addslashes($row['iddsb'])."',	
														satuan_prod:'" .addslashes($row['satuan_prod'])."',	
															};\n";
	}   
    ?>
     
	 </select>
     </div>
     </div>

     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Distributor</label>
     <div class="col-sm-5">
     <textarea class="form-control" rows="1" placeholder="Nama Distributor" id="distributor"readonly></textarea>
     </div>
     </div>
  
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Instansi</label>
     <div class="col-sm-8">
     <input class="form-control" rows="2" placeholder="Nama Instansi" id="instansi"  readonly>
     </div>
     </div>
 
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Type </label>
     <div class="col-sm-4">
     <input class="form-control" rows="2" placeholder="Type Produk" id="type" readonly>
     </div>
     </div>
 
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Nama Produk</label>
     <div class="col-sm-8">
     <textarea class="form-control" rows="2" placeholder="Nama Produk"  id="nama" readonly></textarea>
     </div>
     </div>


     <div class="form-group row">
     <label class="col-sm-3 col-form-label" >Jumlah</label>
     <div class="col-sm-2">
     <div class="input-group-prepend">
     <input class="form-control jumlah"  type="text"  style="height:28px; width:70px;" onkeyup="rp();count();"  id="jumlah"placeholder="99" readonly>
	 <input id="satuan_prod" class="input-group-text " readonly style="height:28px; width:90px; text-align:left;">
     </div>
     </div>
     </div>
	 </div> 
	 </td>

     <td class="cd" colspan="1">  
     <fieldset class="field_form">
     <legend class="legend_form">Data Gudang</legend>
    
	 <div class="form-group row">
     <label  class="col-sm-3 col-form-label">No Surat Jalan *</label>
      <div class="input-group-prepend col-sm-6 " >
   	 <div class="input-group-text  " style="height:`28px;">SPA-</div>
     <input type="text" class="form-control harga"  id="nosj" placeholder="Masukkan No. SJ" name="nosj" required >
     </div>
     </div>
	 
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Tanggal Surat Jalan *</label>
     <div class="col-sm-6">
     <input type="date" class="form-control harga"  id="tglsj" placeholder="XXXX/XX/XXXX/2019"  name="tglsj" required>
     </div>
     </div>
  
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Keterangan </label>
     <div class="col-sm-8">
     <textarea class="form-control" rows="2" placeholder="Keterangan"  id="ket" name="ket" ></textarea>
     </div>
     </div>
     </fieldset>   
     </td>
     </tr>	
     </table>


	
	 <input type="text" id="pabrik_on" name="pabrik_on">

	<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Tambah Data ?');" id="tambah" name="tambah" >Tambah Data</button>	
	<a href="./index.php?hlm=gudangon" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>
 
 
 </div>

 </form>	


     <script type="text/javascript">    
     <?php echo $jsArray; 
	
	 ?>  
     function changeValue(nolkpp){  
	 document.getElementById('distributor').value = dtMhs[nolkpp].distributor;  
	 document.getElementById('instansi').value = dtMhs[nolkpp].instansi;
	 document.getElementById('type').value = dtMhs[nolkpp].type;
	 document.getElementById('nama').value = dtMhs[nolkpp].nama;
	 document.getElementById('pabrik_on').value = dtMhs[nolkpp].pabrik_on;		
	 document.getElementById('jumlah').value = dtMhs[nolkpp].jumlah;			
	 document.getElementById('satuan_prod').value = dtMhs[nolkpp].satuan_prod;
	 };
     </script>
  
	 <script src="jquery-1.10.2.min.js"></script>
     <script src="jquery.chained.min.js"></script>
     
	 <script>
     $("#nolkpp").chained("#nopo");
     </script>
  

</body>
</html>
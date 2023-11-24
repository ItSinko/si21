<?php
require '../koneksi.php';
?>
<html>
<head>
<title>Export Data</title>
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


	input[id=idprod_on]{
display: none;
	               }	
				  
	input[id=pabrik_on]{
display: none;
	               }
				   
</style>



 <!-- Bootstrap -->
	 		<link rel="stylesheet" href="../bootstrap.min.css" >
			<script src="../bootstrap.bundle.min.js"></script>
			<script src="../jquery-3.2.1.slim.min.js"></script>
			<script src="../jquery.chained.min.js"></script>
            <script src="../popper.min.js" ></script>
            <script src="../bootstrap.min.js" ></script>
			<link rel="stylesheet" href="../bootstrap-select.css">
			<link rel="stylesheet" href="../all.css" >
			<link href="../jquerysctipttop.css" rel="stylesheet" type="text/css">
			<link href="../bootstrap-4-navbar.css" rel="stylesheet">
			<script src="../js/bootstrap-4-navbar.js"></script>
			<script src="../js/bootstrap-select.js"></script>
			<script type="text/javascript" src="../jquery.price_format.2.0.js"></script>
			<script src="../jquery-1.10.2.min.js"></script>
	<!-- end -->	
<body>

<div class="container-fluid" >

<table class="table" >
<form method="post"  action="../check_form/export/lapjualon.php">
 <fieldset >
 
<legend>Export Data</legend>

<p id="error_message" class="font-weight-bold text-danger"></p>
<p  id="success_message" class="font-weight-bold text-success"></p>

</fieldset>
 
<tr>

<td class="cd" colspan="1">
   
<fieldset class="field_form">
<legend class="legend_form">Filter</legend>


    
  <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Distributor</label>
    <div class="col-sm-3 ">
      <select  class="form-control "  style="width: 213px;"  name="distributor" required>
		<option value="">Pilih Distributor</option>
		<option value="Semua">Semua Distributor</option>
	 

     		 <?php 
	
    $results = mysqli_query($con,"SELECT  pabrik,iddsb from spa_on  JOIN distributor ON spa_on.pabrik_on = distributor.iddsb GROUP BY iddsb");        
    while ($row = mysqli_fetch_array($results)) {    
        echo '<option value="' . $row['iddsb'] . '">' . $row['pabrik'] . '</option>';    
       
                                                }  
			?>
			
			
			
     </select>
     </div>
     </div>


      
  <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Urutan Nomer Seri</label>
    <div class="col-sm-3 ">
      <select  class="form-control "  style="width: 213px;"  name="urutan" >
		<option value="kebawah">Kebawah</option>
		<option value="menyamping">Menyamping</option>
     </select>
     </div>
     </div>
    


	 </div> 
	 </td>

     </tr>	
     </table>


	<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Export Data ?');" id="tambah" name="export" >Export Data</button>	
	
 
 </div>

 </form>	


  
  
	 <script src="jquery-1.10.2.min.js"></script>
     

  

</body>
</html>
<html>
<head>
<style>
</style>
</head>
<?php
$con = mysqli_connect("localhost", "root", "", "kontrol_db");
  $nolkppgdg_on=$_GET['nolkppgdg_on'];

if( isset( $_REQUEST['aksiseri'] )){
		$aksiseri = $_REQUEST['aksiseri'];
		switch($aksiseri){
			case 'tambah':
				include 'gudang/tambah_seri.php';
				break;
			
			case 'edit':
				include 'gudang/ubah_seri.php';
				break;
		
		}
	
	} else {
	?>	
		
	<div id="demo" class="horizon_disable" style="margin: 20px 0 50px 0">
		<p class="h5">Nomer Seri</p>
	<hr class="my-2">
	

<body>  

		
   
    <div class="container">
       
 <div class="row">
    <div class="col-sm">
       
		<a href="?hlm=gudangon&aksi=aksiseri&nolkppgdg_on=<?=$row["nolkppgdg_on"]; ?>" class="btn btn-primary" >Tambah Data</a>   
   </div>
    <div class="col-sm">
   
    </div>
    <div class="col-sm">
  <div class="row">
 <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
            <form class="form-horizontal" action="" method="post"
                name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
                <div class="input-row">
                    <label class="col-md-4 control-label">Pilih CSV
                        File</label> <input type="file" name="file"
                        id="file" accept=".csv">
                    <button type="submit" id="submit" name="import"
                        class="btn btn-success" >Upload Nomer Seri</button>
                    <br />
					
                </div>
            </form>	
        </div>
    </div>
  </div>

















	
<?php		
		
	}
?> 
</body>

</html>
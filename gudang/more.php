<?php






//$con = mysqli_conect("localhost", "root", "", "kontrol_db");

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
				
			case 'delete':
				include 'gudang/hapus_seri.php';
				break;
		}
		
	} else {
		
		




if (isset($_POST["import"])) {    
    $fileName = $_FILES["file"]["tmp_name"];
    if ($_FILES["file"]["size"] > 0) {
        $file = fopen($fileName, "r");
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $sqlInsert = "INSERT into seri_on (idseri_on,noseri_on,lkppfk_on,statusseri)
                   values ('','" . $column[1] . "','" . $column[2] . "',1)";
            $result = mysqli_query($con, $sqlInsert);
            
            if (! empty($result)) {
                $type = "success";
                $message = "Data berhasil ditambahkan";
			} else {
                $type = "error";
                $message = "Masalah dalam Mengimpor Data CSV";
            }
        }
    }
}
?>

<html>


<head>

<style>

.success {
    background: #70fff3;
    border: #70fff3 1px solid;
}
</style>
	<p class="h5">Nomer Seri</p>
	<hr class="my-2">

<script type="text/javascript">
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function () {
    $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
        	    $("#response").addClass("error");
        	    $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
    });
});
</script>
</head>

<body>  

		
   
    <div class="container">
       
 <div class="row">
    
   
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
			Template Untuk Upload&nbsp;<a href="download/Template_Nomer_Seri.csv" download >di sini</a>
        </div>
    </div>
  </div>
  
 
  
  <?php 
  //mengambil jumlah
  $sql="SELECT * FROM spa_on INNER JOIN seri_on ON spa_on.nolkpp_on=seri_on.lkppfk_on WHERE nolkpp_on='$nolkppgdg_on'";
  
  $query = mysqli_query($con, $sql);
  
  	if(mysqli_num_rows($query) > 0){
		
		
    while ($rows = mysqli_fetch_array($query)) {
   //jumlah dipesan
  $jumlah =  $rows['jumlah_on'];
  
  //jumlah noseri
  $jumlahinput = mysqli_num_rows($query);
	}

  echo'   
    
	<b>Dibutukan </b>: '.$jumlah.'.00
  / <b>Diinput </b>: '.$jumlahinput.'.00'; 
  
  if ($jumlahinput == $jumlah): 
  
   echo '
     <script>
    var lnk = document.getElementById("tambah");

    if (window.addEventListener) {
        document.addEventListener("click", function (e) {
            if (e.target.id === lnk.id) {
                e.preventDefault();         // Comment this line to enable the link tag again.
            }
        });
    }
	</script>
	
	
   <script>
   document.getElementById("submit").disabled = true;
   </script>


	<b class=text-success>Nomer Seri Sudah Lengkap</b>';
elseif ($jumlahinput > $jumlah):
	echo '  
	<script>
    var lnk = document.getElementById("tambah");

    if (window.addEventListener) {
        document.addEventListener("click", function (e) {
            if (e.target.id === lnk.id) {
                e.preventDefault();         // Comment this line to enable the link tag again.
            }
        });
    }
	</script>
	
	
	<script >
    document.getElementById("submit").disabled = true;
    </script>
	<b class=text-danger>Kesalahan ! Jumlah No Seri Melebihi Dibutuhkan</b>';
else:
	echo ' <b class=text-warning>Nomer Seri Kurang</b>';
endif;

	}
else {
	
	
	$sql2="SELECT * FROM spa_on WHERE nolkpp_on='$nolkppgdg_on'";
	$query2 = mysqli_query($con, $sql2);
	 while ($rows2 = mysqli_fetch_array($query2)) {
   //jumlah dipesan
  $dibutuhkan =  $rows2['jumlah_on'];
  
	 }
	
	
	
	
	echo '

	
	 <b>Dibutukan </b>: '.$dibutuhkan.'.00
  / <b>Diinput </b>: 0.00
  
 <b class=text-warning>Nomer Seri Kurang</b>';

	
	
}
	?>
  
  <table id='userTable' class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Seri</th>
					 <th>Tombol</th>
                </tr>
            </thead>

               <?php
			   
				$sqlSelect = "SELECT * FROM seri_on WHERE lkppfk_on='$nolkppgdg_on' ";
            
   
            $result = mysqli_query($con, $sqlSelect);

$a=1;
            if (mysqli_num_rows($result) > 0) {
                ?>
				
				
			
			<?php		
                
				while ($row = mysqli_fetch_array($result)) {
                   
			echo'			
				<tbody>
                <tr>
                    <td width=1%">'. $a++ .'</td>
                    <td>'.$row['noseri_on'].'</td>				
					<td><a href="?hlm=gudangon&aksi=more&nolkppgdg_on='.$row["lkppfk_on"].'&aksiseri=edit&idseri_on='.$row["idseri_on"].'" class="cus-application_form_edit"></a>
					| <a href="?hlm=gudangon&aksi=more&nolkppgdg_on='.$row["lkppfk_on"].'&aksiseri=delete&idseri_on='.$row["idseri_on"].'" onclick="return confirm(\'Yakin Hapus Data ?\');" class="cus-cross"></a></td>
				'; }
                ?>		
                </tbody>
				</table>
    
			<?php } 
		
		else  
			
		echo '<td colspan="8"><p align=left >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				 Maaf, Nomer Seri belum di input !
				 </u> </p></center></td></tr>';
				}
			?>
     </div>

	

</body>

</html>
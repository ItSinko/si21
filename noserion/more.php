<?php








  $nolkppgdg_on=$_GET['nolkppadm_on'];





if( isset( $_REQUEST['aksiseri'] )){
		$aksiseri = $_REQUEST['aksiseri'];
		switch($aksiseri){
			
			case 'tambah':
				include 'noserion/tambah_seri.php';
				break;
				
			case 'edit':
				include 'noserion/ubah_seri.php';
				break;
				
			case 'delete':
				include 'noserion/hapus_seri.php';
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
					';
					?>
					
							
            <div class="modal fade" id="myModal<?php echo $row["idseri_on"]; ?>" role="dialog"  tabindex="-1" >
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
				   <h4 class="modal-title">Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="noserion\hapus_seri.php" method="get">

                        <?php
                        $idseri_on = $row["idseri_on"]; 
                        $query_edit = mysqli_query($con,"SELECT * FROM seri_on WHERE idseri_on='$idseri_on'");
                        //$result = mysqli_query($con, $query);
                        while ($rows = mysqli_fetch_array($query_edit)) {  
                        ?>

                         <input type="hidden" name="idseri_on" value="<?php echo $rows["idseri_on"] ?>" >
                         <input type="hidden" name="lkppfk_on" value="<?php echo $rows["lkppfk_on"] ?>" >
                         <input type="hidden" name="noseri" value="<?php echo $rows["noseri_on"] ?>" >
                     

                         <div class="form-group">
						 <label for="message-text" class="col-form-label">Alasan No Seri <b><?php echo $rows["noseri_on"] ?></b> dihapus ?</label>
					     <textarea class="form-control" id="message-text" placeholder="Wajib mengisi keterangan  " name="ket_log" minlength="5" required></textarea>
						 </div>

                               
                         <div class="modal-footer">  
                         <button type="submit" class="btn btn-success">Hapus</button>
                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         </div>

                        <?php 
                        }
                     
                        ?>        
                      </form>
                  </div>
                </div>
                
              </div>
            </div>		
					
					<?php
				 }
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
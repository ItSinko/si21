<?php






//$conn = mysqli_connect("localhost", "root", "", "kontrol_db");

  $idordereks_off=$_GET['idordereks_off'];





if( isset( $_REQUEST['aksikirim'] )){
		$aksikirim = $_REQUEST['aksikirim'];
		switch($aksikirim){
			
			case 'tambah':
				include 'ekspedisioff/kirim.php';
				break;
				
			case 'edit':
				include 'ekspedisioff/kirim_ubah.php';
				break;
			
			case 'delete':
				include 'ekspedisioff/hapus_kirim.php';
				break;
		}
		
	} else {
		
		



?>

<html>


<head>

<style>

.success {
    background: #70fff3;
    border: #70fff3 1px solid;
}
</style>
	<p class="h5">Pengiriman</p>
	<hr class="my-2">

</head>

<body>  

		
   
    <div class="container-fluid">
       
 <a class="btn btn-primary"  href="?hlm=eksoff&aksi=more&idordereks_off=<?php echo $idordereks_off?>&aksikirim=tambah">Tambah Data</a>

            <table id='userTable' class="table">
            <thead>
                <tr>	
                    <th>No</th>
                    <th>No LKPP</th>
					 <th>Ekspedisi</th>
					 <th>Tgl Realisasi</th>
					 <th>Jumlah Terkirim</th>
					 <th>No Resi</th>
					 <th>Nilai</th>
					 <th>Ket</th>
					 <th>Tombol</th> 
                </tr>
            </thead>

               <?php
			$sqlSelect = "SELECT * FROM ekspedisi_off INNER JOIN ekspedisi2_off ON ekspedisi_off.idordereks_off=ekspedisi2_off.idordereks_fk 
																   INNER JOIN jasaeks ON ekspedisi2_off.jasafk_off=jasaeks.id_eks  WHERE idordereks_fk='$idordereks_off' ";
																   
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
                    <td>'.$row['idordereks_off'].'</td>				
                    <td>'.$row['nama_eks'].'</td>				
                    <td>'.$row['tglkirim_off'].'</td>				
                    <td>'.$row['jumlaheks_off'].' Unit</td>				                   			
                    <td>'.$row['noresi_off'].'</td>				
                    <td>'.number_format($row['nilai_off']).' </td>				
                    <td>'.$row['keteks2_off'].'</td>			
					<td><a href="?hlm=eksoff&aksi=more&idordereks_off='.$row["idordereks_off"].'&aksikirim=edit&ideks_off='.$row["ideks_off"].'" class="cus-application_form_edit"></a>
					<a href="?hlm=eksoff&aksi=more&idordereks_off='.$row["idordereks_off"].'&aksikirim=delete&ideks_off='.$row["ideks_off"].'" onclick="return confirm(\'Yakin Hapus Data ?\');" class="cus-cross"></a></td> ';             
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
				 Maaf, Belum ada data yang di input !
				 </u> </p></center></td></tr>';
	}
	?>
     </div>
</body>
</html>
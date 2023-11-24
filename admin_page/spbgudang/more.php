<?php
//$con = mysqli_conect("localhost", "root", "","kontrol_db");

$nogdg_spb=$_GET['nogdg_spb'];

if( isset( $_REQUEST['aksikirim'] )){
		$aksikirim = $_REQUEST['aksikirim'];
		switch($aksikirim){
			
			case 'tambah':
				include 'spbgudang/kirim.php';
				break;
				
				case 'ubah':
				include 'spbgudang/kirim_ubah.php';
				break;
					
				case 'delete':
				include 'spbgudang/hapus_kirim.php';
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
 <a class="btn btn-primary"  href="?hlm=gudangspb&aksi=more&nogdg_spb=<?php echo $nogdg_spb?>&aksikirim=tambah">Tambah Data</a>

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
			$sqlSelect = " SELECT * FROM gudang_spb
										INNER JOIN ekspedisi2_spb ON gudang_spb.nogdg_spb=ekspedisi2_spb.noeksfk_spb 
										INNER JOIN jasaeks ON ekspedisi2_spb.jasafk_spb=jasaeks.id_eks 	
										WHERE noeksfk_spb ='$nogdg_spb' ";
																   
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
                    <td>'.$row['nogdg_spb'].'</td>				
                    <td>'.$row['nama_eks'].'</td>				
                    <td>'.$row['tglkirim_spb'].'</td>				
                    <td>'.$row['jumlaheks_spb'].' Unit</td>				                   			
                    <td>'.$row['noresi_spb'].'</td>				
                    <td>'.number_format($row['nilai_spb']).' </td>				
                    <td>'.$row['keteks2_spb'].'</td>			
					<td><a href="?hlm=gudangspb&aksi=more&nogdg_spb='.$row["nogdg_spb"].'&aksikirim=ubah&ideks_spb='.$row["ideks_spb"].'" class="cus-application_form_edit"></a>
					| <a href="?hlm=gudangspb&aksi=more&nogdg_spb='.$row["nogdg_spb"].'&aksikirim=delete&ideks_spb='.$row["ideks_spb"].'" onclick="return confirm(\'Yakin Hapus Data ?\');" class="cus-cross"></a>
					
					
					</td> ';
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
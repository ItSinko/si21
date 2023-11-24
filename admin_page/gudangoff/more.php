<?php







  $idordergdg_off=$_GET['idordergdg_off'];





if( isset( $_REQUEST['aksikirim'] )){
		$aksikirim = $_REQUEST['aksikirim'];
		switch($aksikirim){
			
			case 'tambah':
				include 'gudangoff/kirim.php';
				break;
				
			case 'edit':
				include 'gudangoff/kirim_ubah.php';
				break;
			
			case 'delete':
				include 'gudangoff/hapus_kirim.php';
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
       
 <a class="btn btn-primary"  href="?hlm=gudangoff&aksi=more&idordergdg_off=<?php echo $idordergdg_off?>&aksikirim=tambah">Tambah Data</a>

            <table id='userTable' class="table">
            <thead>
                <tr>	
                    <th>No</th>
                    <th>ID Order</th>
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
			   
			$sqlSelect = "SELECT * FROM gudang_off INNER JOIN ekspedisi2_off ON gudang_off.idordergdg_off=ekspedisi2_off.idordereks_fk 
																   INNER JOIN jasaeks ON ekspedisi2_off.jasafk_off=jasaeks.id_eks  WHERE idordereks_fk='$idordergdg_off' 
																   ORDER BY  idordergdg_off + 0 DESC
																	";
																   
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
                    <td>OFF-'.$row['idordergdg_off'].'</td>				
                    <td>'.$row['nama_eks'].'</td>				
                    <td>'.$row['tglkirim_off'].'</td>				
                    <td>'.$row['jumlaheks_off'].' Unit</td>				                   			
                    <td>'.$row['noresi_off'].'</td>				
                    <td>'.number_format($row['nilai_off']).' </td>				
                    <td>'.$row['keteks2_off'].'</td>			
					<td><a href="?hlm=gudangoff&aksi=more&idordergdg_off='.$row["idordergdg_off"].'&aksikirim=edit&ideks_off='.$row["ideks_off"].'" class="cus-application_form_edit"></a>
					<a href="?hlm=gudangoff&aksi=more&idordergdg_off='.$row["idordergdg_off"].'&aksikirim=delete&ideks_off='.$row["ideks_off"].'" onclick="return confirm(\'Yakin Hapus Data ?\');" class="cus-cross"></a></td> ';             
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
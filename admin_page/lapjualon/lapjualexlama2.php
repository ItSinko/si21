<html>
<head>
<title>
Laporan Penjualan (Online)
</title>
</head>

<style>

table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
	font-family:'Lucida Fax','Calibri',sans-serif;
	font-size:12px;
	

	}

table th {
	
  padding: 0;
  border-left:1px solid #e0e0e0;
  border-bottom: 1px solid #e0e0e0;
  text-align: center; 
 background: #ededed;

 }
	table td {
 text-align: center; 
}


th, td {
    text-align: center;
    padding: 0;
  vertical-align: middle;
  height:45px;
	}
 
tr:nth-child(even){background-color: #f2f2f2}


tr td:hover { background: #666; color: #FFF; }  
/* Hover cell effect! */



hover {opacity: 1}

th, td {
    text-align: left;
    padding: 8px;
}

		input[id=nmprd-filter]{
    width: 20%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 110px;
    left: 180px;
	}

		
		input[id=noaks-filter]{
    width: 20%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 110px;
    left: 470px;
	}

	input[id=dsb-filter]{
    width: 20%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 110px;
    left: 760px;
	
	}
	
	
   	input[id=nopo-filter]{
    width: 20%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 110px;
    left: 1050px;
	
	}
	
	 	input[id=noseri-filter]{
    width: 20%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 110px;
    left: 1350px;
	
	}
	

	 

    .nmprd-fltr{
	font-size:14px;
   		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	position: absolute;
	top: 99px;
    left: 190px;
   }
   	 

	    .aks-fltr{
	font-size:14px;
   		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	position: absolute;
	top: 99px;
    left: 480px;
   }
   	    .dsb-fltr{
	font-size:14px;
   		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	position: absolute;
	top: 99px;
    left: 770px;
   }
   	 
	   .nopo-fltr{
	font-size:14px;
   		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	position: absolute;
	top: 99px;
    left: 1060px;
   }
   	 
	  	 
	   .noseri-fltr{
	font-size:14px;
   		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	position: absolute;
	top: 99px;
    left: 1350px;
   }
   	 
	    .status-fltr{
	font-size:14px;
   		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	position: absolute;
	top: 99px;
    left: 30px;
   }
   	 
	 
	 
  
   		   /*Untuk tombol Submit */
button[type=find] {
    width: 6%;
   	background:#cc3333;
    box-shadow: inset -1px -1px 3px #FF62A7;
	-moz-box-shadow: inset -1px -1px 3px #FF62A7;
	-webkit-box-shadow: inset -1px -1px 3px #FF62A7;
		border-radius: 3px;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	color: white;
    padding: 10px 10px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	position: absolute;
	top: 55px;
    left: 530px;
	
	}
		   /*Untuk tombol Submit */
button[type=home] {
    width: 6%;
   	background:#cc3333;
    box-shadow: inset -1px -1px 3px #FF62A7;
	-moz-box-shadow: inset -1px -1px 3px #FF62A7;
	-webkit-box-shadow: inset -1px -1px 3px #FF62A7;
		border-radius: 3px;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	color: white;
    padding: 10px 10px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	position: absolute;
	top: 50px;
    left: 30px;
	}
	
	
		   /*Untuk tombol Submit */
button[type=tambah] {
    width: 7%;
   	background:#ff8080;
    box-shadow: inset -1px -1px 3px #FF62A7;
	-moz-box-shadow: inset -1px -1px 3px #FF62A7;
	-webkit-box-shadow: inset -1px -1px 3px #FF62A7;
		border-radius: 3px;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	color: white;
    padding: 10px 10px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	position: absolute;
	top: 50px;
    left: 120px;
	}
	
	
	
[class^="cus-"],
[class*=" cus-"] {
  display: inline-block;
  width: 17px;
  height: 16px;
  *margin-right: .3em;
  line-height: 14px;
  vertical-align: text-top;
  background-image: url("spritesheet.png");
  background-position: 14px 14px;
  background-repeat: no-repeat;
}
[class^="cus-"]:last-child,
[class*=" cus-"]:last-child {
  *margin-left: 0;
}

.cus-date_add {
    width: 16px;
    height: 16px;
    background-position: -395px -265px;
}


.cus-date_edit {
    width: 16px;
    height: 16px;
    background-position: -447px -265px;
}




.cus-cross {
    width: 16px;
    height: 16px;
    background-position: -369px -239px;
}

.cus-application_form_edit {
    width: 16px;
    height: 16px;
    background-position: -343px -5px;
}


.cus-add {
    width: 16px;
    height: 16px;
    background-position: -31px -5px;
}


.cus-house {
    width: 16px;
    height: 16px;
    background-position: -187px -395px;
}
.cus-zoom {
    width: 16px;
    height: 16px;
    background-position: -135px -811px;
}

.cus-exclamation {
    width: 16px;
    height: 16px;
    background-position: -525px -317px;
}

 .cus-arrow_right {
    width: 16px;
    height: 16px;
    background-position: -551px -31px;
}
.cus-accept {
    width: 16px;
    height: 16px;
    background-position: -5px -5px;
}

.cus-error {
    width: 16px;
    height: 16px;
    background-position: -421px -317px;
}

.cus-cancel {
    width: 16px;
    height: 16px;
    background-position: -577px -135px;
}

.cus-page {
    width: 16px;
    height: 16px;
    background-position: -473px -499px;
}
	
	
	/*STYLE UNTUK HORIZONTAL ! */
.horizon {
  width: 4000px;
  height: 5000px;
  

}


	
	input[id=cari]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top:50px;
    left: 300px;
	}
	


	.cus-flag_blue {
    width: 16px;
    height: 16px;
    background-position: -317px -343px;
}




.cus-arrow_down {
    width: 16px;
    height: 16px;
    background-position: -291px -31px;
}

			   /*Untuk tombol Submit */

	
		select[id=status-filter]{
    width: 10%;
    padding: 11px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 110px;
    left: 30px;
	}
	
.kanan{ text-align: right; }	
.kiri{ text-align: left; }	
			   /*Untuk tombol Submit */
button[type=export] {
    width: 6%;
   	background:	#145e25;
    box-shadow: inset -1px -1px 3px #FF62A7;
	-moz-box-shadow: inset -1px -1px 3px #FF62A7;
	-webkit-box-shadow: inset -1px -1px 3px #FF62A7;
		border-radius: 3px;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	color: white;
    padding: 10px 10px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	position: absolute;
	top: 50px;
    left: 120px;
	}
	

</style>
<body>

<h3 style="margin-bottom: -20px;">Laporan Penjualan (Online)</h3>	

				
<button class="btn btn-primary" type="export" id="tombolExport"><i class="cus-arrow_down"></i>Export</button>
				<br/><hr/><br><br><br><br><br><br>
			


   <label class="status-fltr">Status:</label>  

	<select  id="status-filter" title="Filter Data Berdasarkan Status Paket">
			   
			   <option value="Semua">Semua</option>
                <option value="Batal">Batal</option>
				 <option value="Sepakat">Sepakat</option>
				  <option value="Masih Negosiasi">Proses</option>
		</select>



		
	    <label class="nmprd-fltr">Nama Produk :</label>  
                 <input list="daftar-nmprd"  id="nmprd-filter" type="search" title="Filter Data Berdasarkan Nama Produk">
				<datalist id="daftar-nmprd">
				 <option value="Semua"></option>
                            <?php
				$con= mysqli_connect("localhost","root","","kontrol_db");
                $query = mysqli_query($con,"SELECT nam_prod FROM spa_on INNER JOIN  admjual_on ON spa_on.nolkpp_on=admjual_on.nolkppadm_on
												INNER JOIN qc_on ON admjual_on.nolkppadm_on = qc_on.nolkppqc_on
												INNER JOIN  gudang_on ON qc_on.nolkppqc_on = gudang_on.nolkppgdg_on
												INNER JOIN  produk_master ON produk_master.id_prod = spa_on.idprod_on
												INNER JOIN  distributor ON distributor.iddsb = spa_on.pabrik_on
												INNER JOIN ekspedisi2_on ON ekspedisi2_on.nolkppeksfk_on = spa_on.nolkpp_on
												 INNER JOIN jasaeks ON jasaeks.id_eks = ekspedisi2_on.jasafk_on
												LEFT JOIN  seri_on ON gudang_on.nolkppgdg_on = seri_on.lkppfk_on
												 GROUP by nam_prod");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['nam_prod']; ?>"></option>
                <?php
                }
                ?>
              </datalist>

		
		      <label class="aks-fltr">Nomer AKS :</label>  
            	<input list="daftar-aks"  id="noaks-filter"   type="search"  title="Filter Data Berdasarkan Nomer AKS">
				<datalist id="daftar-aks">
					<option value="Semua"></option>
                            <?php

                $query = mysqli_query($con,"SELECT noaks_on FROM spa_on INNER JOIN  admjual_on ON spa_on.nolkpp_on=admjual_on.nolkppadm_on
												INNER JOIN qc_on ON admjual_on.nolkppadm_on = qc_on.nolkppqc_on
												INNER JOIN  gudang_on ON qc_on.nolkppqc_on = gudang_on.nolkppgdg_on
												INNER JOIN  produk_master ON produk_master.id_prod = spa_on.idprod_on
												INNER JOIN  distributor ON distributor.iddsb = spa_on.pabrik_on
												INNER JOIN ekspedisi2_on ON ekspedisi2_on.nolkppeksfk_on = spa_on.nolkpp_on
												 INNER JOIN jasaeks ON jasaeks.id_eks = ekspedisi2_on.jasafk_on
												LEFT JOIN  seri_on ON gudang_on.nolkppgdg_on = seri_on.lkppfk_on
												  GROUP by noaks_on");		
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['noaks_on']; ?>"></option>
                <?php
                }
                ?>
              </datalist>


			     <label class="dsb-fltr">Distributor :</label>  
			    <input list="daftar-dsb"  id="dsb-filter"  type="search" title="Filter Data Berdasarkan Distributor">
				<datalist id="daftar-dsb">
				
				<option value="Semua"></option>
                <?php
				
                $query = mysqli_query($con,"SELECT pabrik FROM spa_on INNER JOIN  admjual_on ON spa_on.nolkpp_on=admjual_on.nolkppadm_on
												INNER JOIN qc_on ON admjual_on.nolkppadm_on = qc_on.nolkppqc_on
												INNER JOIN  gudang_on ON qc_on.nolkppqc_on = gudang_on.nolkppgdg_on
												INNER JOIN  produk_master ON produk_master.id_prod = spa_on.idprod_on
												INNER JOIN  distributor ON distributor.iddsb = spa_on.pabrik_on
												INNER JOIN ekspedisi2_on ON ekspedisi2_on.nolkppeksfk_on = spa_on.nolkpp_on
												 INNER JOIN jasaeks ON jasaeks.id_eks = ekspedisi2_on.jasafk_on
												LEFT JOIN  seri_on ON gudang_on.nolkppgdg_on = seri_on.lkppfk_on
												 GROUP by pabrik");
                while ($row = mysqli_fetch_array($query)) {
                ?>			
                    <option value="<?php echo $row['pabrik']; ?>"></option>
                <?php
                }
                ?>
              </datalist>
			  
			       <label class="nopo-fltr">No PO :</label>  
			  <input list="daftar-nopo"  id="nopo-filter"   type="search" title="Filter Data Berdasarkan Distributor">
			  <datalist id="daftar-nopo">
				
				<option value="Semua"></option>
                <?php
		
                $query = mysqli_query($con,"SELECT *,nopo_on FROM spa_on INNER JOIN  admjual_on ON spa_on.nolkpp_on=admjual_on.nolkppadm_on
												INNER JOIN qc_on ON admjual_on.nolkppadm_on = qc_on.nolkppqc_on
												INNER JOIN  gudang_on ON qc_on.nolkppqc_on = gudang_on.nolkppgdg_on
												INNER JOIN  produk_master ON produk_master.id_prod = spa_on.idprod_on
												INNER JOIN  distributor ON distributor.iddsb = spa_on.pabrik_on
												INNER JOIN ekspedisi2_on ON ekspedisi2_on.nolkppeksfk_on = spa_on.nolkpp_on
												 INNER JOIN jasaeks ON jasaeks.id_eks = ekspedisi2_on.jasafk_on
												LEFT JOIN  seri_on ON gudang_on.nolkppgdg_on = seri_on.lkppfk_on
												 GROUP by nopo_on");
                while ($row = mysqli_fetch_array($query)) {
                ?>			
                    <option value="<?php echo $row['nopo_on']; ?>"></option>
                <?php
                }
                ?>
              </datalist>
			  

			  	     <label class="noseri-fltr">Noseri </label>    
			  <input list="daftar-noseri"  id="noseri-filter" type="search"  title="Filter Data Berdasarkan Distributor">
			  <datalist id="daftar-noseri">
				
				<option value="Semua"></option>
                <?php
	
                $query = mysqli_query($con,"SELECT noseri_on FROM spa_on INNER JOIN  admjual_on ON spa_on.nolkpp_on=admjual_on.nolkppadm_on
												INNER JOIN qc_on ON admjual_on.nolkppadm_on = qc_on.nolkppqc_on
												INNER JOIN  gudang_on ON qc_on.nolkppqc_on = gudang_on.nolkppgdg_on
												INNER JOIN  produk_master ON produk_master.id_prod = spa_on.idprod_on
												INNER JOIN  distributor ON distributor.iddsb = spa_on.pabrik_on
												INNER JOIN ekspedisi2_on ON ekspedisi2_on.nolkppeksfk_on = spa_on.nolkpp_on
												 INNER JOIN jasaeks ON jasaeks.id_eks = ekspedisi2_on.jasafk_on
												LEFT JOIN  seri_on ON gudang_on.nolkppgdg_on = seri_on.lkppfk_on
												 GROUP by noseri_on ");
                while ($row = mysqli_fetch_array($query)) {
                ?>			
                    <option value="<?php echo $row['noseri_on']; ?>"></option>
                <?php
                }
                ?>
              </datalist>
	
	
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<br>
	<div class="horizon">
      <table class="tes" id="tabelExport">
        <thead>
        <tr>
	<th width=1% class="text-center" bgcolor="#ffe0ad">No</th>
	<th width=1% class="text-center" bgcolor="#ffe0ad">Status</th>
	<th width=1% bgcolor="#ffe0ad">No LKPP</th>
	<th width=3% bgcolor="#ffe0ad">Distributor</th>
	<th width=2% bgcolor="#ffe0ad">No AKS</th>
	<th width=1% bgcolor="#ffe0ad">Jumlah</th>
	<th width=4% bgcolor="#ffe0ad">Nama Produk</th>
	<th width=2% bgcolor="#ffe0ad">Alias</th>
	<!-- Pembatas -->
	<th width=2% bgcolor="#f44242">No Seri</th>
	<th width=1% bgcolor="#ffe0ad">Harga Produk</th>
	<th width=1% bgcolor="#ffe0ad">Ongkir Produk</th>
	<th width=1% bgcolor="#ffe0ad">Total Harga</th>
	<th width=3% bgcolor="#ffe0ad">Deskripsi Paket</th>
	<th width=3% bgcolor="#ffe0ad">Instansi</th>
	<th width=3% bgcolor="#ffe0ad">Satuan</th>
	<!-- Pembatas -->
	<th width=2% bgcolor="#f3ffe5">No PO</th>
	<th width=2% bgcolor="#f3ffe5">Tgl PO</th>
	<!-- Pembatas -->
	<th width=2% bgcolor="#f96534">Tgl Terima</th>
	<th width=2% bgcolor="#f96534">Tgl Serah</th>
	<!-- Pembatas -->
	<th width=1% bgcolor="#34f937">No SJ</th>
	<th width=1% bgcolor="#34f937">Tgl SJ</th>
<!-- Pembatas -->
	<th width=1% bgcolor="##7c7bc4">Ekspedisi</th>
	<th width=2% bgcolor="##7c7bc4">No Resi</th>
	<th width=1% bgcolor="##7c7bc4">Tgl Kirim</th>
	<th width=1% bgcolor="##7c7bc4">Biaya </th>
	</tr>
       </thead>
		<tbody>


		
<?php 
$con=mysqli_connect("localhost","root","","kontrol_db");
$a= 1;
$result=mysqli_query($con,"SELECT *,harga_on * jumlah_on as total FROM spa_on INNER JOIN  admjual_on ON spa_on.nolkpp_on=admjual_on.nolkppadm_on
												INNER JOIN qc_on ON admjual_on.nolkppadm_on = qc_on.nolkppqc_on
												INNER JOIN  gudang_on ON qc_on.nolkppqc_on = gudang_on.nolkppgdg_on
												INNER JOIN  produk_master ON produk_master.id_prod = spa_on.idprod_on
												INNER JOIN  distributor ON distributor.iddsb = spa_on.pabrik_on
												INNER JOIN ekspedisi2_on ON ekspedisi2_on.nolkppeksfk_on = spa_on.nolkpp_on
												 INNER JOIN jasaeks ON jasaeks.id_eks = ekspedisi2_on.jasafk_on
												LEFT JOIN  seri_on ON gudang_on.nolkppgdg_on = seri_on.lkppfk_on
												
												GROUP by noseri_on

												
												ORDER BY nolkpp_on DESC
								
												   ");		
		
		 while($row = mysqli_fetch_array($result)){
		
        echo'<tr class="task-list-row"
		
		 data-dsb="'.$row['pabrik'].'"
		 data-nmprd="'.$row['nam_prod'].'"
		     data-noaks="'.$row['noaks_on'].'"
			  data-nopo="'.$row['nopo_on'].'"
		 data-noseri="'.$row['noseri_on'].'"
		     data-status="'.$row['status_on'].'"
	>
	
	
			
			<td>'. $a++ .'</td> ';	
		
		$angka = $row['status_on'];
switch ($angka) {
	case "Masih Negosiasi":
		echo '<td><i class="cus-error" title="Masih Negoisasi"></i><br> '.$row['status_on'].'</td>';
		break;
	
	case "Batal":
		echo '<td><i class="cus-cancel"></i title="Batal"> '.$row['status_on'].'</td>';
		break;
	
	case"Sepakat":
		echo '<td><i class="cus-accept" title="Sepakat"></i> '.$row['status_on'].'</td>';
		break;
	
	default:
		echo "<td>-</td>";
		break;
}
		
		echo'
			<td>'. $row["nolkpp_on"].'</td>
			<td class=kiri>'. $row["pabrik"].'</td>
			<td>'. $row["noaks_on"].'</td>
			<td>'. $row["jumlah_on"].' Unit</td>
			<td class=kiri>'. $row["nam_prod"].'</td>
			<td>'. $row["sing_prod"].'</td>
			<td>'. $row["noseri_on"].'</td>
			<td class=kanan>'. number_format($row["harga_on"]).'</td>
			<td class=kanan>'. number_format($row["ongkos_on"]).'</td>
			<td class=kanan>'. number_format($row["total"]).'</td>
			<td>'. $row["despaket_on"].'</td>
			<td>'. $row["instansi_on"].'</td>
			<td>'. $row["satuan_on"].'</td>
			<td>'. $row["nopo_on"].'</td>		
			<td>'. $row["tglpo_on"].'</td>
			<td>'. $row["tglterima_on"].'</td>
			<td>'. $row["tglserah_on"].'</td>
			<td>'. $row["nosj_on"].'</td>
			<td>'. $row["tglsj_on"].'</td>
			<td>'. $row["nama_eks"].'</td>
			<td>'. $row["noresi_on"].'</td>
			<td>'. $row["tglkirim_on"].'</td>

			<td class=kanan>'. number_format($row["nilai_on"]).'</td>
			</tr>';     
			}
			?>	  
			
	</tbody>
    </table>
    </div>

<script>
(function () {
  var
       filters = {  
       noseri: null,
	   nmprd: null,
	   noaks: null,
	   dsb: null,
	   nopo: null,
	
	   status: null,
  };
	
  function updateFilters() {
    $('.task-list-row').hide().filter(function () {
      var
        self = $(this),
        result = true; // not guilty until proven guilty

      Object.keys(filters).forEach(function (filter) {
        if (filters[filter] && (filters[filter] != 'Semua') && (filters[filter] != 'Semua')) {
          result = result && filters[filter] === self.data(filter);
        }
      });

      return result;
    }).show();
  }

  function bindDropdownFilters() {
    Object.keys(filters).forEach(function (filterName) {
      $('#' + filterName + '-filter').on('change', function () {
        filters[filterName] = this.value;
        updateFilters();
      });
    });
  }

  bindDropdownFilters();
})();
</script>

<script src="js/jquery.base64.js"></script>
        <script src="js/jquery.btechco.excelexport.js"></script>
	<script>
            $(document).ready(function () {
                $("#tombolExport").click(function () {
                    $("#tabelExport").btechco_excelexport({
                        containerid: "tabelExport"
                       , datatype: $datatype.Table
                    });
                });
            });
	</script>

<script>
!function(a){function b(a,b,c){if(8==g){var d=j.width(),e=f.debounce(function(){var a=j.width();d!=a&&(d=a,c())},a);j.on(b,e)}else j.on(b,f.debounce(c,a))}function c(a){window.console&&window.console&&window.console.log&&window.console.log(a)}function d(){var b=a('<div style="width:50px;height:50px;overflow-y:scroll;position:absolute;top:-200px;left:-200px;"><div style="height:100px;width:100%"></div>');a("body").append(b);var c=b.innerWidth(),d=a("div",b).innerWidth();return b.remove(),c-d}function e(a){if(a.dataTableSettings)for(var b=0;b<a.dataTableSettings.length;b++){var c=a.dataTableSettings[b].nTable;if(a[0]==c)return!0}return!1}a.floatThead=a.floatThead||{},a.floatThead.defaults={cellTag:null,headerCellSelector:"tr:first>th:visible",zIndex:1001,debounceResizeMs:10,useAbsolutePositioning:!0,scrollingTop:0,scrollingBottom:0,scrollContainer:function(){return a([])},getSizingRow:function(a){return a.find("tbody tr:visible:first>*")},floatTableClass:"floatThead-table",floatWrapperClass:"floatThead-wrapper",floatContainerClass:"floatThead-container",copyTableClass:!0,debug:!1};var f=window._,g=function(){for(var a=3,b=document.createElement("b"),c=b.all||[];a=1+a,b.innerHTML="<!--[if gt IE "+a+"]><i><![endif]-->",c[0];);return a>4?a:document.documentMode}(),h=null,i=function(){if(g)return!1;var b=a("<table><colgroup><col></colgroup><tbody><tr><td style='width:10px'></td></tbody></table>");a("body").append(b);var c=b.find("col").width();return b.remove(),0==c},j=a(window),k=0;a.fn.floatThead=function(l){if(l=l||{},!f&&(f=window._||a.floatThead._,!f))throw new Error("jquery.floatThead-slim.js requires underscore. You should use the non-lite version since you do not have underscore.");if(8>g)return this;if(null==h&&(h=i(),h&&(document.createElement("fthtr"),document.createElement("fthtd"),document.createElement("fthfoot"))),f.isString(l)){var m=l,n=this;return this.filter("table").each(function(){var b=a(this).data("floatThead-attached");if(b&&f.isFunction(b[m])){var c=b[m]();"undefined"!=typeof c&&(n=c)}}),n}var o=a.extend({},a.floatThead.defaults||{},l);return a.each(l,function(b){b in a.floatThead.defaults||!o.debug||c("jQuery.floatThead: used ["+b+"] key to init plugin, but that param is not an option for the plugin. Valid options are: "+f.keys(a.floatThead.defaults).join(", "))}),this.filter(":not(."+o.floatTableClass+")").each(function(){function c(a){return a+".fth-"+y+".floatTHead"}function i(){var b=0;A.find("tr:visible").each(function(){b+=a(this).outerHeight(!0)}),Z.outerHeight(b),$.outerHeight(b)}function l(){var a=z.outerWidth(),b=I.width()||a;if(X.width(b-F.vertical),O){var c=100*a/(b-F.vertical);S.css("width",c+"%")}else S.outerWidth(a)}function m(){C=(f.isFunction(o.scrollingTop)?o.scrollingTop(z):o.scrollingTop)||0,D=(f.isFunction(o.scrollingBottom)?o.scrollingBottom(z):o.scrollingBottom)||0}function n(){var b,c;if(V)b=U.find("col").length;else{var d;d=null==o.cellTag&&o.headerCellSelector?o.headerCellSelector:"tr:first>"+o.cellTag,c=A.find(d),b=0,c.each(function(){b+=parseInt(a(this).attr("colspan")||1,10)})}if(b!=H){H=b;for(var e=[],f=[],g=[],i=0;b>i;i++)e.push('<th class="floatThead-col"/>'),f.push("<col/>"),g.push("<fthtd style='display:table-cell;height:0;width:auto;'/>");f=f.join(""),e=e.join(""),h&&(g=g.join(""),W.html(g),bb=W.find("fthtd")),Z.html(e),$=Z.find("th"),V||U.html(f),_=U.find("col"),T.html(f),ab=T.find("col")}return b}function p(){if(!E){if(E=!0,J){var a=z.width(),b=Q.width();a>b&&z.css("minWidth",a)}z.css(db),S.css(db),S.append(A),B.before(Y),i()}}function q(){E&&(E=!1,J&&z.width(fb),Y.detach(),z.prepend(A),z.css(eb),S.css(eb))}function r(a){J!=a&&(J=a,X.css({position:J?"absolute":"fixed"}))}function s(a,b,c,d){return h?c:d?o.getSizingRow(a,b,c):b}function t(){var a,b=n();return function(){var c=s(z,_,bb,g);if(c.length==b&&b>0){if(!V)for(a=0;b>a;a++)_.eq(a).css("width","");q();var d=[];for(a=0;b>a;a++)d[a]=c.get(a).offsetWidth;for(a=0;b>a;a++)ab.eq(a).width(d[a]),_.eq(a).width(d[a]);p()}else S.append(A),z.css(eb),S.css(eb),i()}}function u(a){var b=I.css("border-"+a+"-width"),c=0;return b&&~b.indexOf("px")&&(c=parseInt(b,10)),c}function v(){var a,b=I.scrollTop(),c=0,d=L?K.outerHeight(!0):0,e=M?d:-d,f=X.height(),g=z.offset(),i=0;if(O){var k=I.offset();c=g.top-k.top+b,L&&M&&(c+=d),c-=u("top"),i=u("left")}else a=g.top-C-f+D+F.horizontal;var l=j.scrollTop(),m=j.scrollLeft(),n=I.scrollLeft();return b=I.scrollTop(),function(k){if("windowScroll"==k?(l=j.scrollTop(),m=j.scrollLeft()):"containerScroll"==k?(b=I.scrollTop(),n=I.scrollLeft()):"init"!=k&&(l=j.scrollTop(),m=j.scrollLeft(),b=I.scrollTop(),n=I.scrollLeft()),!h||!(0>l||0>m)){if(R)r("windowScrollDone"==k?!0:!1);else if("windowScrollDone"==k)return null;g=z.offset(),L&&M&&(g.top+=d);var o,s,t=z.outerHeight();if(O&&J){if(c>=b){var u=c-b;o=u>0?u:0}else o=P?0:b;s=i}else!O&&J?(l>a+t+e?o=t-f+e:g.top>l+C?(o=0,q()):(o=C+l-g.top+c+(M?d:0),p()),s=0):O&&!J?(c>b||b-c>t?(o=g.top-l,q()):(o=g.top+b-l-c,p()),s=g.left+n-m):O||J||(l>a+t+e?o=t+C-l+a+e:g.top>l+C?(o=g.top-l,p()):o=C,s=g.left-m);return{top:o,left:s}}}}function w(){var a=null,b=null,c=null;return function(d,e,f){null==d||a==d.top&&b==d.left||(X.css({top:d.top,left:d.left}),a=d.top,b=d.left),e&&l(),f&&i();var g=I.scrollLeft();J&&c==g||(X.scrollLeft(g),c=g)}}function x(){if(I.length){var a=I.width(),b=I.height(),c=z.height(),d=z.width(),e=d>a?G:0,f=c>b?G:0;F.horizontal=d>a-f?G:0,F.vertical=c>b-e?G:0}}var y=k,z=a(this);if(z.data("floatThead-attached"))return!0;if(!z.is("table"))throw new Error('jQuery.floatThead must be run on a table element. ex: $("table").floatThead();');var A=z.find("thead:first"),B=z.find("tbody:first");if(0==A.length)throw new Error("jQuery.floatThead must be run on a table that contains a <thead> element");var C,D,E=!1,F={vertical:0,horizontal:0},G=d(),H=0,I=o.scrollContainer(z)||a([]),J=o.useAbsolutePositioning;null==J&&(J=o.scrollContainer(z).length);var K=z.find("caption"),L=1==K.length;if(L)var M="top"===(K.css("caption-side")||K.attr("align")||"top");var N=a('<fthfoot style="display:table-footer-group;"/>'),O=I.length>0,P=!1,Q=a([]),R=9>=g&&!O&&J,S=a("<table/>"),T=a("<colgroup/>"),U=z.find("colgroup:first"),V=!0;0==U.length&&(U=a("<colgroup/>"),V=!1);var W=a('<fthrow style="display:table-row;height:0;"/>'),X=a('<div style="overflow: hidden;"></div>'),Y=a("<thead/>"),Z=a('<tr class="size-row"/>'),$=a([]),_=a([]),ab=a([]),bb=a([]);if(Y.append(Z),z.prepend(U),h&&(N.append(W),z.append(N)),S.append(T),X.append(S),o.copyTableClass&&S.attr("class",z.attr("class")),S.attr({cellpadding:z.attr("cellpadding"),cellspacing:z.attr("cellspacing"),border:z.attr("border")}),S.css({borderCollapse:z.css("borderCollapse"),border:z.css("border")}),S.addClass(o.floatTableClass).css("margin",0),J){var cb=function(a,b){var c=a.css("position"),d="relative"==c||"absolute"==c;if(!d||b){var e={paddingLeft:a.css("paddingLeft"),paddingRight:a.css("paddingRight")};X.css(e),a=a.wrap("<div class='"+o.floatWrapperClass+"' style='position: relative; clear:both;'></div>").parent(),P=!0}return a};O?(Q=cb(I,!0),Q.append(X)):(Q=cb(z),z.after(X))}else z.after(X);X.css({position:J?"absolute":"fixed",marginTop:0,top:J?0:"auto",zIndex:o.zIndex}),X.addClass(o.floatContainerClass),m();var db={"table-layout":"fixed"},eb={"table-layout":z.css("tableLayout")||"auto"},fb=z[0].style.width||"";x();var gb,hb=function(){(gb=t())()};hb();var ib=v(),jb=w();jb(ib("init"),!0);var kb=f.debounce(function(){jb(ib("windowScrollDone"),!1)},300),lb=function(){jb(ib("windowScroll"),!1),kb()},mb=function(){jb(ib("containerScroll"),!1)},nb=function(){m(),x(),hb(),ib=v(),(jb=w())(ib("resize"),!0,!0)},ob=f.debounce(function(){x(),m(),hb(),ib=v(),jb(ib("reflow"),!0)},1);O?J?I.on(c("scroll"),mb):(I.on(c("scroll"),mb),j.on(c("scroll"),lb)):j.on(c("scroll"),lb),j.on(c("load"),ob),b(o.debounceResizeMs,c("resize"),nb),z.on("reflow",ob),e(z)&&z.on("filter",ob).on("sort",ob).on("page",ob),z.data("floatThead-attached",{destroy:function(){var a=".fth-"+y;q(),z.css(eb),U.remove(),h&&N.remove(),Y.parent().length&&Y.replaceWith(A),z.off("reflow"),I.off(a),P&&(I.length?I.unwrap():z.unwrap()),J&&z.css("minWidth",""),X.remove(),z.data("floatThead-attached",!1),j.off(a)},reflow:function(){ob()},setHeaderHeight:function(){i()},getFloatContainer:function(){return X},getRowGroups:function(){return E?X.find("thead").add(z.find("tbody,tfoot")):z.find("thead,tbody,tfoot")}}),k++}),this}}(jQuery),function(a){a.floatThead=a.floatThead||{},a.floatThead._=window._||function(){var b={},c=Object.prototype.hasOwnProperty,d=["Arguments","Function","String","Number","Date","RegExp"];return b.has=function(a,b){return c.call(a,b)},b.keys=function(a){if(a!==Object(a))throw new TypeError("Invalid object");var c=[];for(var d in a)b.has(a,d)&&c.push(d);return c},a.each(d,function(){var a=this;b["is"+a]=function(b){return Object.prototype.toString.call(b)=="[object "+a+"]"}}),b.debounce=function(a,b,c){var d,e,f,g,h;return function(){f=this,e=arguments,g=new Date;var i=function(){var j=new Date-g;b>j?d=setTimeout(i,b-j):(d=null,c||(h=a.apply(f,e)))},j=c&&!d;return d||(d=setTimeout(i,b)),j&&(h=a.apply(f,e)),h}},b}()}(jQuery);

$(document).ready(function(){

$(".tes").floatThead({scrollingTop:1});

});
</script> 


 <button class="home" type="home" target=""  onclick="location.href='../index.php'"  title="Kembali Ke Halaman Utama Index !"> 
 <i class="cus-house"></i>Home </button> 	
 </body>
  </html>





<?php 

$nocoo_off=$_GET['nocoo_off'];
$con=mysqli_connect("localhost","root","sinko95","db_21");
$result = mysqli_query($con,"SELECT * FROM detailcoo_off
													INNER JOIN spa_off ON detailcoo_off.idordercoo_off=spa_off.idorder_off
													INNER JOIN gudang_off ON gudang_off.idordergdg_off =detailcoo_off.idordercoo_off
													INNER JOIN distributor ON distributor.iddsb=spa_off.pabrik_off
													INNER JOIN produk_master ON produk_master.id_prod=spa_off.idprod_off
													INNER JOIN seri_off ON seri_off.idseri_off=detailcoo_off.idserifk_off 
													 WHERE nocoo_off='$nocoo_off'");

while($row = mysqli_fetch_array($result)){		
			
			
//untuk romawi bulancoo
$array_bulan = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");

//untuk tanggal

function tanggal_indo($tanggal)
{
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}




 $bulan = $array_bulan[date(''.$row["bulan_off"].'')];

$namacoo = $row['namacoo'];
$nomerseri =  $row['noseri_off'];
$type =  $row['sing_prod'];
$noaks =  'noaks';
$noakd=  $row['noakd'];
$deskripsi =  'despakest';
$kepada=  $row['pemesan_off'];
$nocoo=  $row['nocoo_off'];
$tglsj = tanggal_indo ($row["tglsj_off"]);
$tes = 'Kementrian Kesehatan Nomor : KEMENKES RI AKD 20403710512 Kementrian ';


require('fpdf/fpdf.php');
$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();
$pdf->AddFont('Cambria','','cambria.php');
$pdf->AddFont('Cambria-Bold','','cambria-bold.php');
$pdf->AddFont('Cambria-Italic','','cambria-italic.php');

//COO
$pdf->Image('no_background_coo.jpg',0,0,210);
$pdf->SetFont('Times','BU',22);
$pdf->SetY( 40 );
$pdf->SetX( 55 );
$pdf->Write('10','CERTIFICATE OF ORIGIN');

//No COO
$pdf->SetY( 21 );
$pdf->SetX( 115 );
$pdf->SetFont('Times','B',15);
$pdf->Write('10',''.$nocoo.'  / SKA / '.$bulan.' / SPA / 2020');

//Ijin
$pdf->SetY( 58 );
$pdf->SetX( 63 );
$pdf->SetFont('Cambria','',14);
$pdf->Write('10','Berdasarkan ijin edar/produksi dari');

//Kemenkes
$pdf->SetFont('Cambria-Bold','',14);
$pdf->SetY( 62 );
$pdf->SetX( 28 );
$pdf->Write('15','Kementrian Kesehatan Nomor : KEMENKES RI AKD '.$noakd.'');

//PT. SINKO PRIMA ALLOY
$pdf->SetFont('Cambria','',14);
$pdf->SetY( 80 );
$pdf->SetX( 28 );
$pdf->Write('15','PT SINKO PRIMA ALLOY (penyedia),menyerahkan hasil produksi:');

//Nama
$pdf->SetFont('Cambria-Bold','',14);
$pdf->SetY( 92 );
$pdf->SetX( 28 );
$pdf->Write('15','Nama Produk  :' );

//Isi Nama
$pdf->SetFont('Cambria-Bold','',14);
$pdf->SetY( 96 );
$pdf->SetX( 64 );
$pdf->MultiCell(125,7,''.$namacoo.'',0,'L');


//Type
$pdf->SetY( 105 );
$pdf->SetX( 28 );
$pdf->Write('15','Type                    :');
 
 
 //Isi Type
$pdf->SetFont('Cambria-Bold','',14);
$pdf->SetY( 109 );
$pdf->SetX( 64 );
$pdf->MultiCell(125,7,''.$type.'',0,'L');

 
 
 
//No Seri
$pdf->SetY( 118 );
$pdf->SetX( 28 );
$pdf->Write('15','Nomer Seri       :');

 
 //Isi No Seri
$pdf->SetFont('Cambria-Bold','',14);
$pdf->SetY( 122 );
$pdf->SetX( 64 );
$pdf->MultiCell(125,7,''.$nomerseri.'',0,'L');

 
 

//Merk
$pdf->SetY(132);
$pdf->SetX( 28 );
$pdf->Write('15','Merk Produk   : Elitech');

//Kepada
$pdf->SetFont('Cambria','',14);
$pdf->SetY( 143 );
$pdf->SetX( 97 );
$pdf->Write('15','Kepada :');


//Isi Kepada
$pdf->SetFont('Cambria-Bold','',14);
$pdf->SetY( 155 );
$pdf->SetX( 29 );
$pdf->MultiCell(157,8,''.$kepada.'',0,'C');





//ID dan Nama
$pdf->SetFont('Cambria','',14);
$pdf->SetY( 168 );
$pdf->SetX( 80 );
$pdf->Write('15','untuk ID & Nama Paket :');


//Isi AKS
$pdf->SetFont('Cambria-Bold','',14);
$pdf->SetY( 180 );
$pdf->SetX( 29 );
$pdf->MultiCell(157,8,''.$noaks.'',0,'C');


//Deskripsi
$pdf->SetFont('Cambria-Bold','',14);
$pdf->SetY( 187 );
$pdf->SetX( 29 );
$pdf->MultiCell(157,8,''.$deskripsi.'',0,'C');




//Dalam Kondisi baru
$pdf->SetFont('Cambria-Italic','',14);
$pdf->SetY( 199 );
$pdf->SetX( 65 );
$pdf->Write('15','Dalam kondisi baru, baik dan lengkap.');


//Tanggal
$pdf->SetFont('Cambria','',14);
$pdf->SetY( 219 );
$pdf->SetX( 125 );
$pdf->Write('15','Surabaya, '.$tglsj.'');

//PT
$pdf->SetFont('Cambria','',14);
$pdf->SetY( 230 );
$pdf->SetX( 127 );
$pdf->Write('15','PT SINKO PRIMA ALLOY');

//Nama
$pdf->SetFont('Cambria-Bold','U',14);
$pdf->SetY( 269 );
$pdf->SetX( 129 );
$pdf->Write('0','Kusmardiana Rahayu');

//Nama
$pdf->SetFont('Cambria','',14);
$pdf->SetY( 275 );
$pdf->SetX( 140 );
$pdf->Write('0','Q.A Manager');
$pdf->Output('','Detail Coo | '.$nomerseri.' | '.$noaks.'');

}


?>   
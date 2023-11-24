<?php 
require '../../koneksi.php';
$nocoo_on=$_GET['nocoo_on'];
//$con=mysqli_connect("localhost","root","","kontrol_db");
$result = mysqli_query($con,"SELECT * FROM detailcoo_on
													INNER JOIN spa_on ON detailcoo_on.nolkppcoo_on=spa_on.nolkpp_on
													INNER JOIN gudang_on ON gudang_on.nolkppgdg_on=detailcoo_on.nolkppcoo_on
													INNER JOIN distributor ON distributor.iddsb=spa_on.pabrik_on
													INNER JOIN produk_master ON produk_master.id_prod=spa_on.idprod_on
													INNER JOIN seri_on ON seri_on.idseri_on=detailcoo_on.idserifk_on 
													 WHERE nocoo_on='$nocoo_on'");

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




 $bulan = $array_bulan[date(''.$row["bulan_on"].'')];

$namacoo =  $row['namacoo'];
$nomerseri =  $row['noseri_on'];
$type =  $row['sing_prod'];
$noaks =  $row['noaks_on'];
$deskripsi =  $row['despaket_on'];
$kepada=  $row['instansi_on'];
$noakd= $row['noakd'];
$nocoo=  $row['nocoo_on'];
$tglsj = tanggal_indo ($row["tglsj_on"]);
$tes = 'Kementrian Kesehatan Nomor : KEMENKES RI AKD 20403710512 Kementrian ';
$dsb =  $row['iddsb'];

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
$pdf->SetX( 110 );
$pdf->SetFont('Times','B',15);
$pdf->Write('10',''.$nocoo.'  / SKA / '.$bulan.' / SPA / 2021');

//Ijin
$pdf->SetY( 58 );
$pdf->SetX( 63 );
$pdf->SetFont('Cambria','',14);
$pdf->Write('10','Berdasarkan ijin edar/produksi dari');

//Kemenkes
$pdf->SetFont('Cambria-Bold','',14);
$pdf->SetY( 68 );
$pdf->SetX( 19 );
$pdf->MultiCell(160,8,'Kementrian Kesehatan Nomor : KEMENKES RI AKD '.$noakd.'',0,'C');

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

$pdf->SetFont('Cambria','',14);
$pdf->SetY( 225 );
$pdf->SetX( 127 );
$pdf->Write('15','PT SINKO PRIMA ALLOY');

if ($dsb != "EJB"){
	$pdf->SetFont('Cambria-Bold','U',14);
	$pdf->SetY( 263 );
	$pdf->SetX( 129 );
	$pdf->Write('0','Kusmardiana Rahayu');
	
	$pdf->SetFont('Cambria','',14);
	$pdf->SetY( 268 );
	$pdf->SetX( 140 );
	$pdf->Write('0','Q.A Manager');
	}
	else if($dsb == "EJB")
	{
	$pdf->SetFont('Cambria-Bold','U',14);
	$pdf->SetY( 263 );
	$pdf->SetX( 129 );
	$pdf->Write('0','Bambang Hendro M BE');
	
	$pdf->SetFont('Cambria','',14);
	$pdf->SetY( 268 );
	$pdf->SetX( 140 );
	$pdf->Write('0','Q.A Departement');
	}

$pdf->Output('','Detail Coo | '.$nomerseri.' | '.$noaks.'');

}


?>   
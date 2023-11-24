<?php$nocoo_on=$_GET['nocoo_on'];
$con=mysqli_connect("localhost","root","","kontrol_db");

$result = mysqli_query($con,"SELECT * FROM detailcoo_on
													INNER JOIN spa_on ON detailcoo_on.nolkppcoo_on=spa_on.nolkpp_on
													INNER JOIN gudang_on ON gudang_on.nolkppgdg_on=detailcoo_on.nolkppcoo_on
													INNER JOIN distributor ON distributor.iddsb=spa_on.pabrik_on
													INNER JOIN produk_master ON produk_master.id_prod=spa_on.idprod_on
													INNER JOIN seri_on ON seri_on.idseri_on=detailcoo_on.idserifk_on 
													 WHERE nocoo_on='$nocoo_on'");
	
	
// Koneksi library FPDF
require('fpdf/fpdf.php');
// Setting halaman PDF
$pdf = new FPDF('l','mm','A5');
// Menambah halaman baru
$pdf->AddPage();
// Setting jenis font
$pdf->SetFont('Arial','B',16);
// Membuat string
$pdf->Cell(190,7,'Daftar Harga Motor Dealer Maju Motor',0,1,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(190,7,'Jl. Abece No. 80 Kodamar, jakarta Utara.',0,1,'C');
// Setting spasi kebawah supaya tidak rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'NO',1,0);
$pdf->Cell(50,6,'NAMA MOTOR',1,0);
$pdf->Cell(35,6,'WARNA',1,0);
$pdf->Cell(30,6,'BRAND',1,0);
$pdf->Cell(25,6,'HARGA',1,0);
$pdf->Cell(25,6,'CICILAN',1,1);
 
$pdf->SetFont('Arial','',10);

    $pdf->Cell(10,6,1,1,0);
    $pdf->Cell(10,6,1,1,0);
    $pdf->Cell(10,6,1,1,0);
    $pdf->Cell(10,6,1,1,0);
    $pdf->Cell(10,6,1,1,0);
    $pdf->Cell(10,6,1,1,0);
    


$pdf->Output();
?>

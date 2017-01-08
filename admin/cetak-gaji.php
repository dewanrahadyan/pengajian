<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
require('../fpdf17/fpdf.php');
require('../conn.php');


//Select the Products you want to show in your PDF file
//$result=mysql_query("SELECT * FROM daily_bbri where date like '%$periode%' ");
$kode = $_GET['kd'];
                    
$result = mysqli_query($koneksi, "SELECT *             
                                  FROM gajian inner join gajian on gajian.nik = karyawan.nik 
                                  WHERE  gajian.kd_gaji='$_GET[kd]'");
            

//Initialize the 3 columns and the total
$column_gaji = "";
$column_tunjangan = "";
$column_uang_makan = "";
$column_uang_transport = "";
$column_thr = "";
$column_total = "";

//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
	$nik = $row['nik'];
    $nama = $row['nama'];
    $departemen = $row['departemen'];
    $jabatan = $row['jabatan'];
    $status = $row['status'];
    $gaji_bulan = $row['gaji_bulan'];
    $gaji_tahun = $row['gaji_tahun'];
    $tgl_transfer = $row['tgl_transfer'];
    $absensi = $row['absensi'];
    $sakit = $row['sakit'];
    $cuti = $row['cuti'];
    $gaji = number_format($row['gaji'],2,",",".");
    $tunjangan = number_format($row['tunjangan'],2,",",".");
    $uang_makan = number_format($row['uang_makan'],2,",",".");
    $uang_transport = number_format($row['uang_transport'],2,",",".");
    $thr = number_format($row['thr'],2,",",".");
    $total = number_format($row['total'],2,",",".");

	$column_gaji = $column_gaji.$gaji."\n";
	$column_tunjangan = $column_tunjangan.$tunjangan."\n";
	$column_uang_makan = $column_uang_makan.$uang_makan."\n";
	$column_uang_transport = $column_uang_transport.$uang_transport."\n";
	$column_thr = $column_thr.$thr."\n";
    $column_total = $column_total.$total."\n";	


//mysql_close();

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

//$pdf->Image('../foto/logo.png',10,10,-175);
//$pdf->Image('../images/BBRI.png',190,10,-200);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(68);
$pdf->Image('../img/logo.png');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,5,'SLIP GAJI KARYAWAN',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,5,'Private & Confidential',0,0,'C');
$pdf->Ln();

//Fields Name position
$Y_Fields_Name_position = 40;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Nik : '.$nik,0,0,'L',1);
$pdf->SetX(45);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Periode : '.$periode,0,0,'R',1);
$pdf->Ln();

//Field Name Position
$Y_Fields_Name_position = 48;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Nama : '.$nama,0,0,'L',1);
$pdf->SetX(45);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Periode : '.$periode,0,0,'R',1);
$pdf->Ln();

//Field Name Position
$Y_Fields_Name_position = 56;
$pdf->SetFillColor(255,255,255);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Departement : '.$departemen,0,0,'L',1);
$pdf->SetX(100);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Periode : '.$periode,0,0,'R',1);
$pdf->Ln();

$Y_Fields_Name_position = 64;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Jabatan : '.$jabatan,0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Status : '.$status,0,0,'R',1);
$pdf->Ln();

$Y_Fields_Name_position = 72;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Status : '.$status,0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Status : '.$status,0,0,'R',1);
$pdf->Ln();

$Y_Fields_Name_position = 80;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Bulan : '.$gaji_bulan,0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Tahun : '.$gaji_tahun,0,0,'L',1);
$pdf->Ln();

$Y_Fields_Name_position = 88;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Tahun : '.$gaji_tahun,0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Tahun : '.$gaji_tahun,0,0,'L',1);
$pdf->Ln();

$Y_Fields_Name_position = 96;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Tanggal Transfer : '.$tgl_transfer,0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Status : '.$status,0,0,'R',1);
$pdf->Ln();

$Y_Fields_Name_position = 104;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Absensi : '.$absensi,0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
$pdf->Ln();
$Y_Fields_Name_position = 112;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Sakit : '.$sakit,0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
$pdf->Ln();

$Y_Fields_Name_position = 120;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Cuti : '.$cuti,0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
$pdf->Ln();
}
//Fields Name position
$Y_Fields_Name_position = 128;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(35,8,'Gaji Pokok',1,0,'C',1);
$pdf->SetX(40);
$pdf->Cell(30,8,'Tunjangan',1,0,'C',1);
$pdf->SetX(70);
$pdf->Cell(30,8,'Uang Makan',1,0,'C',1);
$pdf->SetX(100);
$pdf->Cell(35,8,'Transport',1,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(35,8,'THR',1,0,'C',1);
$pdf->SetX(170);
$pdf->Cell(35,8,'Total Gaji',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 136;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(35,6,$gaji,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(40);
$pdf->MultiCell(30,6,$tunjangan,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(70);
$pdf->MultiCell(30,6,$uang_makan,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(100);
$pdf->MultiCell(35,6,$uang_transport,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(135);
$pdf->MultiCell(35,6,$thr,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(170);
$pdf->MultiCell(35,6,$total,1,'C');

//Footer Table
$pdf->SetFillColor(110,180,230);
$pdf->SetFont('Arial','B',12);
$pdf->SetX(5);
$pdf->Cell(65,8,'Take Home Pay',1,0,'C',1);
$pdf->SetX(70);
$pdf->Cell(135,8,'Rp.'.$total.'',1,0,'R',1);
$pdf->Ln();
$pdf->SetFillColor(110,180,230);
$pdf->Ln(10);

//After Footer

$Y_Fields_Name_position = 160;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Manajer Keuangan,',0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Order : '.$tgl,0,0,'R',1);
$pdf->Ln();

$Y_Fields_Name_position = 180;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'(...............................)',0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Order : '.$tgl,0,0,'R',1);
$pdf->Ln();

/**$pdf->SetY(-55);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10);
$pdf->Cell(30,10,'PT. BBG',0,0,'C');
$pdf->Cell(105);
$pdf->Cell(30,10,'PT. BBRI',0,0,'C');
$pdf->Ln(20);
$pdf->Cell(10);
$pdf->Cell(30,10,'( ............................................................)',0,0,'C');
$pdf->Cell(107);
$pdf->Cell(30,10,'( ............................................................)',0,0,'C');
**/
$pdf->Output();
}
?>

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

$result=mysqli_query($koneksi, "SELECT * FROM departemen ORDER BY kd_dept ASC") or die(mysql_error());

//Initialize the 3 columns and the total
$column_kd_dept = "";
$column_nik = "";
$column_departemen = "";
$column_jabatan = "";
$column_gaji_pokok = "";
$column_tunjangan = "";


//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
	$kd_dept = $row["kd_dept"];
    $nik = $row["nik"];
    $departemen = $row["departemen"];
    $jabatan = $row["jabatan"];
    $gaji_pokok = number_format($row['gaji_pokok'],2,",",".");
    $tunjangan = number_format($row['tunjangan'],2,",",".");
    

	$column_kd_dept = $column_kd_dept.$kd_dept."\n";
    $column_nik = $column_nik.$nik."\n";
    $column_departemen = $column_departemen.$departemen."\n";
    $column_jabatan = $column_jabatan.$jabatan."\n";
    $column_gaji_pokok = $column_gaji_pokok.$gaji_pokok."\n";
    $column_tunjangan = $column_tunjangan.$tunjangan."\n";

			
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
$pdf->Cell(30,7,'DATA DEPARTEMENT',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,7,'List Data Daftar Departemen Karyawan',0,0,'C');
$pdf->Ln();

}
//Fields Name position
$Y_Fields_Name_position = 42;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(25,8,'Kode Dept',1,0,'C',1);
$pdf->SetX(30);
$pdf->Cell(40,8,'NIk',1,0,'C',1);
$pdf->SetX(70);
$pdf->Cell(40,8,'Departement',1,0,'C',1);
$pdf->SetX(110);
$pdf->Cell(35,8,'Jabatan',1,0,'C',1);
$pdf->SetX(145);
$pdf->Cell(30,8,'Gaji Pokok',1,0,'C',1);
$pdf->SetX(175);
$pdf->Cell(30,8,'Tunjangan',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 50;

//Now show the columns
$pdf->SetFont('Arial','',9);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(25,6,$column_kd_dept,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(30);
$pdf->MultiCell(40,6,$column_nik,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(70);
$pdf->MultiCell(40,6,$column_departemen,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(110);
$pdf->MultiCell(35,6,$column_jabatan,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(145);
$pdf->MultiCell(30,6,$column_gaji_pokok,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(175);
$pdf->MultiCell(30,6,$column_tunjangan,1,'C');

$pdf->Output();
}
?>

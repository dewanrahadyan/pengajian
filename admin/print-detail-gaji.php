
<?php

// $query1="select * from karyawan ";
// $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
 
$nama = "dewan";
$alamat = "bandung";
$gaji = "seratur triliun dolar";
$potongan = "tidak ada";
 
require('../dompdf/dompdf_config.inc.php');//memanggil file dompdf_config.inc.php
 
//yang akan ditampilkan
//$html =
//  '<html><body>'.
//  '<h1>Slip Gaji</h1>'.
//  '<table><tr><td>Nama</td><td> : </td><td>'.$nama.'</td></tr>'.
//  '<tr><td>alamat</td><td> : </td><td>'.$alamat.'</td></tr>'.
// '<tr><td>Gaji</td><td> : </td><td>'.$gaji.'</td></tr>'.
//  '<tr><td>potongan</td><td> : </td><td>'.$potongan.'</td></tr>'.
//  '</table></body></html>';





//this will be something like: http://www.yourapp.com/templates/log.php



$context = stream_context_create(
    array(
        'http' => array(
            'follow_location' => false
        )
    )
);



$url= "http://" . $_SERVER['SERVER_NAME'] ; 
$content = file_get_contents($url.'/pengajian/admin/pdf-detail-gaji.php?hal=edit&kd='.$_GET['kd'].'&kd_gaji='.$_GET['kd_gaji'], false, $context);


//$fileUrl = "http://localhost/pengajian/admin/karyawan.php";


//die();

//get file content after the script is server-side interpreted
//$html = file_get_contents( $fileUrl ) ;
include "../conn.php";


 $query1="SELECT * FROM gajian inner join karyawan on gajian.nik = karyawan.nik WHERE kd_gaji = ".$_GET['kd_gaji']; 


                  
                      $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                      $data  = mysqli_fetch_array($tampil);
//echo $data["nama"];

 
$dompdf = new DOMPDF();
$dompdf->load_html($content);

$dompdf->set_paper("A4", "portrait");
$dompdf->render();

$dompdf->stream('Payroll_'.$data["nama"].'.pdf');
die();
 
?>
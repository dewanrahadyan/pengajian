<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";}
?>


<?php
 
$nama = "dewan";
$alamat = "bandung";
$gaji = "seratur triliun dolar";
$potongan = "tidak ada";
 
require('../dompdf/dompdf_config.inc.php');//memanggil file dompdf_config.inc.php
 
//yang akan ditampilkan
$html =
  '<html><body>'.
  '<h1>Slip Gaji</h1>'.
  '<table><tr><td>Nama</td><td> : </td><td>'.$nama.'</td></tr>'.
  '<tr><td>alamat</td><td> : </td><td>'.$alamat.'</td></tr>'.
  '<tr><td>Gaji</td><td> : </td><td>'.$gaji.'</td></tr>'.
  '<tr><td>potongan</td><td> : </td><td>'.$potongan.'</td></tr>'.
  '</table></body></html>';
 
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream('laporan_'.$nama.'.pdf');
 
?>
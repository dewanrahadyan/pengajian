<?php 
 include "../conn.php";

   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Laporan Detail Gaji Karyawan</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

          

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body  >
        <!-- header logo: style can be found in header.less -->
        

 
                                <!-- Menu Body -->
                                
            
        </header>

<img align="center" src="../img/logo.png" >



                  <?php
            $query = mysqli_query($koneksi, "SELECT *                                           
                                             FROM gajian inner join karyawan on gajian.nik = karyawan.nik
                                             WHERE kd_gaji='$_GET[kd_gaji]'");
            $data  = mysqli_fetch_array($query);
            ?>
                      <table border="0" style=" line-height: 9px;" >
                      <tr>
                      <td ><B><font size ="1" >BUKTI KAS KELUAR</font></B></td>
                      <td ></td>
                      </tr>
                      <tr>
                      <td><font size ="1">Dari</font></td>
                      <td><font size ="1">PT. AARTI JAYA</font></td>
                      </tr>

                      <tr>
                      <td><font size ="1">Untuk</font></td>
                      <td ><font size ="1"><?php echo $data['nama']; ?></font></td>
                      </tr>
                      
                      
                      
                      <tr>
                      <td></td>
                      <td><font size ="1">Gaji Bulan <?php echo $data['gaji_bulan']; ?> - <?php echo $data['gaji_tahun']; ?></font></td>
                      </tr>
                    
                      <tr>
                      <td><b><font size ="1">Perhitungan Gaji : </font></b></td>
                      <td></td>
                      </tr>

                      
                     
                      
                      <tr>
                      <td><font size ="1">Gaji Pokok</font></td>
                      <td><font size ="1">Rp. <?php echo number_format($data['gaji_pokok'],2,",",".");?></font></td>
                      </tr>

                       <tr>
                      <td><font size ="1">Tunjangan Jabatan </font></td>
                      <td><font size ="1">Rp. <?php echo number_format($data['tunjangan'],2,",",".");?></font></td>
                      </tr>

                      <tr>
                      <td><font size ="1">Premi Hadir </font></td>
                      <td><font size ="1">Rp. <?php echo number_format($data['premi_hadir'],2,",",".");?></font></td>
                      </tr>
                      
                      <tr>
                      <td><font size ="1">Tunjangan Konsumsi  </font></td>
                      <td><font size ="1">Rp. <?php echo number_format($data['tunjangan_konsumsi'],2,",",".");?></font></td>
                      </tr>

                      <tr>
                      <td><font size ="1">Komisi Penjualan  </font></td>
                      <td><font size ="1">Rp. <?php echo number_format($data['komisi_penjualan'],2,",",".");?></font></td>
                      </tr>

                      <tr>
                      <td><font size ="1">Komisi BSC  </font></td>
                      <td><font size ="1">Rp. <?php echo number_format($data['komisi_bsc'],2,",",".");?></font></td>
                      </tr>

                      <tr>
                      <td><font size ="1">Barang Berkomisi  </font></td>
                      <td><font size ="1">Rp. <?php echo number_format($data['barang_berkomisi'],2,",",".");?></font></td>
                      </tr>

                      <tr>
                      <td width="57%"><font size ="1">Tunjangan Jamsostek Tenaga Kerja     </font></td>
                      <td><font size ="1">Rp. <?php echo number_format($data['tunjangan_jamsostek'],2,",",".");?></font></td>
                      </tr>

                      <tr>
                      <td><font size ="1">Uang Lembur </font></td>
                      <td><font size ="1">Rp. <?php echo number_format($data['uang_lembur'],2,",",".");?></font></td>
                      </tr>

                      <tr>
                      <td> </td>
                      <td><font size ="1">-----------------------------------</font></td>
                      </tr>

                      <tr>
                      <td><font size ="1">Gaji Bruto </font></td>
                      <td><font size ="1">Rp. <?php echo number_format($data['gaji_bruto'],2,",",".");?></font></td>
                      </tr>

                      <tr>
                      <td><font size ="1">Setor ke Jamsostek Tenaga Kerja </font></td>
                      <td><font size ="1">Rp. <?php echo number_format($data['setor_jamsostek'],2,",",".");?></font></td>
                      </tr>
                      <tr>
                      <td><font size ="1">Potongan Jamsostek Tenaga Kerja </font></td>
                      <td><font size ="1">Rp. <?php echo number_format($data['pot_jamsostek'],2,",",".");?></font></td>
                      </tr>

                      <tr>
                      <td> </td>
                      <td><font size ="1">-----------------------------------</font></td>
                      </tr>

                      <tr>
                      <td><font size ="1">Gaji Netto </font></td>
                      <td><font size ="1">Rp. <?php echo number_format($data['gaji_netto'],2,",",".");?></font></td>
                      </tr>
                      <tr>
                      <td><font size ="1">Potongan Telat </font></td>
                      <td><font size ="1">Rp. <?php echo number_format($data['pot_telat'],2,",",".");?></font></td>
                      </tr>
                      <tr>
                      <td><font size ="1">Potongan Tidak Hadir </font></td>
                      <td><font size ="1">Rp. <?php echo number_format($data['pot_tidak_hadir'],2,",",".");?></font></td>
                      </tr>
                      <tr>
                      <td><font size ="1">Potongan Premi Hadir </font></td>
                      <td><font size ="1">Rp. <?php echo number_format($data['pot_premi_hadir'],2,",",".");?></font></td>
                      </tr>
                      <tr>
                      <td><font size ="1">Potongan ITU </font></td>
                      <td><font size ="1">Rp. <?php echo number_format($data['pot_itu'],2,",",".");?></font></td>
                      </tr>
                      <tr>
                      <td><font size ="1">Potongan Iuran Wajib </font></td>
                      <td><font size ="1">Rp. <?php echo number_format($data['pot_iuran_wajib'],2,",",".");?></font></td>
                      </tr>
                      <tr>
                      <td><font size ="1">Potongan Iuran Sukarela </font></td>
                      <td><font size ="1">Rp. <?php echo number_format($data['pot_iuran_sukarela'],2,",",".");?></font></td>
                      </tr>
                      <tr>
                      <td><font size ="1">Potongan Iuran Koperasi</font></td>
                      <td><font size ="1">Rp. <?php echo number_format($data['pot_iuran_koperasi'],2,",",".");?></font></td>
                      </tr>
                      <tr>
                      <td><font size ="1">Biaya Administrasi </font></td>
                      <td><font size ="1">Rp. <?php echo number_format($data['biaya_adm'],2,",",".");?></font></td>
                      </tr>
                      

                      <tr>
                      <td> </td>
                      <td><font size ="1">-----------------------------------</font></td>
                      </tr>
                      
                      <tr>
                      <td></td>
                      <td><font size ="1">Rp. <?php echo number_format($data['take_home_pay'],2,",",".");?></font></td>
                      </tr>

                      </table>
                      <br>
                      <table id="example" class="table table-hover table-bordered" style="font-size: 8">
                      <tr>
                      <td></td>
                      <td></td>
                      <td><font size ="1">Tanggal <?php echo date('d F Y'); ?></font></td>
                      </tr>
                          <tr>
                            <td ><font size ="1">Mengetahui</font></td>
                            <td ><font size ="1">Membuat</font></td>
                            <td ><font size ="1">Tanda Tangan Penerima Uang</font></td> 
                            </tr>
                          <tr>
                            <td><font size ="1">Ketua</font></td>
                            <td><font size ="1">Admin</font></td>
                            <td></td>                            
                          </tr>

                          <tr>
                            <td><br><br><font size ="1">_____________ </font></td>
                            <td><br><br><font size ="1">_____________ </font></td>
                            <td><br><br><font size ="1">_____________ </font></td>                            
                          </tr>

                          <tr>
                            <td><font size ="1">Yuhana N</font></td>
                            <td><font size ="1"><?php //echo $_SESSION['fullname']; ?></font></td>
                            <td><font size ="1"><?php echo $data['nama']; ?></font></td>  
                          </tr>
                        

                      </table>
                      
                
        
    </body>
</html>



<script>
window.print();
</script>
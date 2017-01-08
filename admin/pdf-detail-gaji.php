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
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        

 
                                <!-- Menu Body -->
                                
            
        </header>

<img align="center" src="../img/logo.png">

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside >
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1 align="center">
                        Laporan
                        <small align="center">Detail Gaji Karyawan</small>
                    </h1>
            
                     
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">


                    
              <div class="col-lg-4">
              
          
           
            </div>
              </div>
           <!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-lg-12">

                        
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Detail Gaji Karyawan</h3> 
                        </div>
                        <div class="panel-body">


                  <?php
            $query = mysqli_query($koneksi, "SELECT *                                           
                                             FROM gajian inner join karyawan on gajian.nik = karyawan.nik
                                             WHERE kd_gaji='$_GET[kd_gaji]'");
            $data  = mysqli_fetch_array($query);
            ?>
                      <table id="example" class="table table-hover table-bordered">
                      <tr>
                      <td width="250">Nik</td>
                      <td width="565"><?php echo $data['nik']; ?></td>
                      </tr>
                      <tr>
                      <td >Nama</td>
                      <td ><?php echo $data['nama']; ?></td>
                      </tr>
                      <tr>
                      <td>Departemen</td>
                      <td><?php echo $data['departemen']; ?></td>
                      </tr>
                      
                      <tr>
                      <td>Status</td>
                      <td><?php
                            if($data['status'] == 'tetap'){
                echo '<span class="label label-success">Tetap</span>';
              }
                            else if ($data['status'] == 'kontrak' ){
                echo '<span class="label label-primary">Kontrak</span>';
              }
                            else if ($data['status'] == 'magang' ){
                echo '<span class="label label-info">Magang</span>';
              }
                            else if ($data['status'] == 'outsource' ){
                echo '<span class="label label-warning">Outsourcing</span>';
              }
                    
                    ?></td>
                      </tr>
                      <tr>
                      <td>Gaji Bulan</td>
                      <td><?php echo $data['gaji_bulan']; ?> - <?php echo $data['gaji_tahun']; ?></td>
                      </tr>
                    
                      <tr>
                      <td>Hadir</td>
                      <td><?php echo $data['hadir']; ?> </td>
                      </tr>
                      <tr>
                      <td>Telat</td>
                      <td><?php echo $data['telat']; ?> </td>
                      </tr>
                      <tr>
                      <td>Tidak Hadir</td>
                      <td><?php echo $data['tidak_hadir']; ?> </td>
                      </tr>
                     
                      
                      <tr>
                      <td>Gaji Pokok</td>
                      <td>Rp. <?php echo number_format($data['gaji_pokok'],2,",",".");?></td>
                      </tr>

                       <tr>
                      <td>Tunjangan Jabatan </td>
                      <td>Rp. <?php echo number_format($data['tunjangan'],2,",",".");?></td>
                      </tr>

                      <tr>
                      <td>Premi Hadir </td>
                      <td>Rp. <?php echo number_format($data['premi_hadir'],2,",",".");?></td>
                      </tr>
                      
                      <tr>
                      <td>Tunjangan Konsumsi  </td>
                      <td>Rp. <?php echo number_format($data['tunjangan_konsumsi'],2,",",".");?></td>
                      </tr>

                      <tr>
                      <td>Komisi Penjualan  </td>
                      <td>Rp. <?php echo number_format($data['komisi_penjualan'],2,",",".");?></td>
                      </tr>

                      <tr>
                      <td>Komisi BSC  </td>
                      <td>Rp. <?php echo number_format($data['komisi_bsc'],2,",",".");?></td>
                      </tr>

                      <tr>
                      <td>Barang Berkomisi  </td>
                      <td>Rp. <?php echo number_format($data['barang_berkomisi'],2,",",".");?></td>
                      </tr>

                      <tr>
                      <td>Tunjangan Jamsostek Tenaga Kerja  </td>
                      <td>Rp. <?php echo number_format($data['tunjangan_jamsostek'],2,",",".");?></td>
                      </tr>

                      <tr>
                      <td>Uang Lembur </td>
                      <td>Rp. <?php echo number_format($data['uang_lembur'],2,",",".");?></td>
                      </tr>

                      <tr>
                      <td>Gaji Bruto </td>
                      <td>Rp. <?php echo number_format($data['gaji_bruto'],2,",",".");?></td>
                      </tr>

                      <tr>
                      <td>Setor ke Jamsostek Tenaga Kerja </td>
                      <td>Rp. <?php echo number_format($data['setor_jamsostek'],2,",",".");?></td>
                      </tr>
                      <tr>
                      <td>Potongan Jamsostek Tenaga Kerja </td>
                      <td>Rp. <?php echo number_format($data['pot_jamsostek'],2,",",".");?></td>
                      </tr>
                      <tr>
                      <td>Gaji Netto </td>
                      <td>Rp. <?php echo number_format($data['gaji_netto'],2,",",".");?></td>
                      </tr>
                      <tr>
                      <td>Potongan Telat </td>
                      <td>Rp. <?php echo number_format($data['pot_telat'],2,",",".");?></td>
                      </tr>
                      <tr>
                      <td>Potongan Tidak Hadir </td>
                      <td>Rp. <?php echo number_format($data['pot_tidak_hadir'],2,",",".");?></td>
                      </tr>
                      <tr>
                      <td>Potongan Premi Hadir </td>
                      <td>Rp. <?php echo number_format($data['pot_premi_hadir'],2,",",".");?></td>
                      </tr>
                      <tr>
                      <td>Potongan ITU </td>
                      <td>Rp. <?php echo number_format($data['pot_itu'],2,",",".");?></td>
                      </tr>
                      <tr>
                      <td>Potongan Iuran Wajib </td>
                      <td>Rp. <?php echo number_format($data['pot_iuran_wajib'],2,",",".");?></td>
                      </tr>
                      <tr>
                      <td>Potongan Iuran Sukarela </td>
                      <td>Rp. <?php echo number_format($data['pot_iuran_sukarela'],2,",",".");?></td>
                      </tr>
                      <tr>
                      <td>Potongan Iuran Koperasi</td>
                      <td>Rp. <?php echo number_format($data['pot_iuran_koperasi'],2,",",".");?></td>
                      </tr>
                      <tr>
                      <td>Biaya Administrasi </td>
                      <td>Rp. <?php echo number_format($data['biaya_adm'],2,",",".");?></td>
                      </tr>
                      <tr>
                      <td>Take Home Pay</td>
                      <td>Rp. <?php echo number_format($data['take_home_pay'],2,",",".");?></td>
                      </tr>

                      </table>
                      <br>
                      <table>
                          <tr>
                            <td width="200">Mengetahui</td>
                            <td width="200">Membuat</td>
                            <td width="200">Menerima</td> 
                            </tr>
                          <tr>
                            <td>Ketua</td>
                            <td>Admin</td>
                            <td></td>                            
                          </tr>
                          <tr>
                            <td>Yuhana N</td>
                            <td><?php //echo $_SESSION['fullname']; ?></td>
                            <td><?php echo $data['nama']; ?></td>  
                          </tr>
                        

                      </table>
                      
                  </div> 
              </div>
            </div><!-- col-lg-12--> 
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->



            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        
    </body>
</html>



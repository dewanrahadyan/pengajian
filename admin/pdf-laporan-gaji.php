<?php 
 include "../conn.php";
   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Laporan Gaji Karyawan</title>
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
                        <small align="center">Gaji Karyawan</small>
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
                        <h3 class="panel-title"><i class="fa fa-user"></i> Data Karyawan Warehouse</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                  <?php
                   
              

                     $query1="select * from gajian inner join karyawan on gajian.nik = karyawan.nik where karyawan.departemen = 'Warehouse'" ;
                  

                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
               
                    ?>

  
               
              
                



                 <table id="example" border="1">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nik </i></center></th>
                        <th><center>Nama </center></th>
                        <th><center>Gaji Bulan </center></th>
                        <th><center>Hadir </center></th>
                        <th><center>Telat </center></th>
                        <th><center>Tidak Hadir </center></th>
                        
                        
                        <th><center>Gaji Pokok </center></th>
                        <th><center>Tunjangan Jabatan </center></th>

                         <th><center>Premi Hadir </center></th>
                        
                        
                        <th><center>Tunjangan Konsumsi </center></th>
                        <th><center>Komisi Penjualan </center></th>
                        <th><center>Komisi BSC </center></th>
                        <th><center>Barang Berkomisi </center></th>
                        <th><center>Tunjangan Jamsostek Tenaga Kerja</center></th> 
                        <th><center>Uang Lembur</center></th>
                        <th><center>Gaji Bruto</center></th>
                        <th><center>Setor ke Jamsostek Tenaga Kerja </center></th>
                        <th><center>Potongan Jamsostek Tenaga Kerja </center></th>
                        <th><center>Gaji Netto  </center></th>
                        <th><center>Potongan Telat</center></th>
                        <th><center>Potongan Tidak Hadir</center></th>
                        <th><center>Potongan Premi Hadir</center></th>
                        <th><center>Potongan ITU</center></th>
                        <th><center>Potongan Iuran Wajib</center></th>
                        <th><center>Potongan Iuran Sukarela</center></th>
                        <th><center>Potongan Iuran Koperasi</center></th>
                        <th><center>Biaya Administrasi</center></th>
                        <th><center>Take Home Pay</center></th>
               
                        
                         
                        
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
                    <tbody>
                    <tr>
                    <td><center><?php echo $no; ?></center></td>
                    <td><center><?php echo $data['nik'];?></center></td>
                    <td></span> <?php echo $data['nama'];?></td>
                    <td><center><?php echo $data['gaji_bulan'];?> - <?php echo $data['gaji_tahun'];?></center></td>
                     <td><center><?php echo $data['hadir'];?></center></td>
                  <td><center><?php echo $data['telat'];?></center></td>
                  <td><center><?php echo $data['tidak_hadir'];?></center></td>
                    
                                        
                    <td><center><?php echo $data['gaji_pokok'];?></center></td>
                    <td><center><?php echo $data['tunjangan'];?></center></td>
                    
                
                 
                
                <td><center><?php echo $data['premi_hadir'];?></center></td>
                <td><center><?php echo $data['tunjangan_konsumsi'];?></center></td>
                <td><center><?php echo $data['komisi_penjualan'];?></center></td>
                <td><center><?php echo $data['komisi_bsc'];?></center></td>
                <td><center><?php echo $data['barang_berkomisi'];?></center></td>
                <td><center><?php echo $data['tunjangan_jamsostek'];?></center></td>
                <td><center><?php echo $data['uang_lembur'];?></center></td>
                <td><center><?php echo $data['gaji_bruto'];?></center></td>
                <td><center><?php echo $data['setor_jamsostek'];?></center></td>
                <td><center><?php echo $data['pot_jamsostek'];?></center></td>
                <td><center><?php echo $data['gaji_netto'];?></center></td>
                <td><center><?php echo $data['pot_telat'];?></center></td>
                <td><center><?php echo $data['pot_tidak_hadir'];?></center></td>
                <td><center><?php echo $data['pot_premi_hadir'];?></center></td>
                <td><center><?php echo $data['pot_itu'];?></center></td>
                <td><center><?php echo $data['pot_iuran_wajib'];?></center></td>
                <td><center><?php echo $data['pot_iuran_sukarela'];?></center></td>
                <td><center><?php echo $data['pot_iuran_koperasi'];?></center></td>
                <td><center><?php echo $data['biaya_adm'];?></center></td>
                <td><center><?php echo $data['take_home_pay'];?></center></td>
                   

                   </tr></div>
                 <?php   
              }


              ?>
                   </tbody>
                   </table>
                  <!-- </div>-->
               
              </div> 
              </div>
            </div><!-- col-lg-12--> 
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->

<!-------------------------------------------------------------------------------------------------------->


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
                        <h3 class="panel-title"><i class="fa fa-user"></i> Data Karyawan Purchasing</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                  <?php
                   
             

                     $query1="select * from gajian inner join karyawan on gajian.nik = karyawan.nik where karyawan.departemen ='Purchasing' " ;
                  

                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>


                  <table id="example" border="1">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nik </i></center></th>
                        <th><center>Nama </center></th>
                        <th><center>Gaji Bulan </center></th>
                        <th><center>Hadir </center></th>
                        <th><center>Telat </center></th>
                        <th><center>Tidak Hadir </center></th>
                        
                        
                        <th><center>Gaji Pokok </center></th>
                        <th><center>Tunjangan Jabatan </center></th>

                         <th><center>Premi Hadir </center></th>
                        
                        
                        <th><center>Tunjangan Konsumsi </center></th>
                        <th><center>Komisi Penjualan </center></th>
                        <th><center>Komisi BSC </center></th>
                        <th><center>Barang Berkomisi </center></th>
                        <th><center>Tunjangan Jamsostek Tenaga Kerja</center></th> 
                        <th><center>Uang Lembur</center></th>
                        <th><center>Gaji Bruto</center></th>
                        <th><center>Setor ke Jamsostek Tenaga Kerja </center></th>
                        <th><center>Potongan Jamsostek Tenaga Kerja </center></th>
                        <th><center>Gaji Netto  </center></th>
                        <th><center>Potongan Telat</center></th>
                        <th><center>Potongan Tidak Hadir</center></th>
                        <th><center>Potongan Premi Hadir</center></th>
                        <th><center>Potongan ITU</center></th>
                        <th><center>Potongan Iuran Wajib</center></th>
                        <th><center>Potongan Iuran Sukarela</center></th>
                        <th><center>Potongan Iuran Koperasi</center></th>
                        <th><center>Biaya Administrasi</center></th>
                        <th><center>Take Home Pay</center></th>
               
                        
                         
                        
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
                    <tbody>
                    <tr>
                    <td><center><?php echo $no; ?></center></td>
                    <td><center><?php echo $data['nik'];?></center></td>
                    <td></span> <?php echo $data['nama'];?></td>
                    <td><center><?php echo $data['gaji_bulan'];?> - <?php echo $data['gaji_tahun'];?></center></td>
                     <td><center><?php echo $data['hadir'];?></center></td>
                  <td><center><?php echo $data['telat'];?></center></td>
                  <td><center><?php echo $data['tidak_hadir'];?></center></td>
                    
                                        
                    <td><center><?php echo $data['gaji_pokok'];?></center></td>
                    <td><center><?php echo $data['tunjangan'];?></center></td>
                    
                
                 
                
                <td><center><?php echo $data['premi_hadir'];?></center></td>
                <td><center><?php echo $data['tunjangan_konsumsi'];?></center></td>
                <td><center><?php echo $data['komisi_penjualan'];?></center></td>
                <td><center><?php echo $data['komisi_bsc'];?></center></td>
                <td><center><?php echo $data['barang_berkomisi'];?></center></td>
                <td><center><?php echo $data['tunjangan_jamsostek'];?></center></td>
                <td><center><?php echo $data['uang_lembur'];?></center></td>
                <td><center><?php echo $data['gaji_bruto'];?></center></td>
                <td><center><?php echo $data['setor_jamsostek'];?></center></td>
                <td><center><?php echo $data['pot_jamsostek'];?></center></td>
                <td><center><?php echo $data['gaji_netto'];?></center></td>
                <td><center><?php echo $data['pot_telat'];?></center></td>
                <td><center><?php echo $data['pot_tidak_hadir'];?></center></td>
                <td><center><?php echo $data['pot_premi_hadir'];?></center></td>
                <td><center><?php echo $data['pot_itu'];?></center></td>
                <td><center><?php echo $data['pot_iuran_wajib'];?></center></td>
                <td><center><?php echo $data['pot_iuran_sukarela'];?></center></td>
                <td><center><?php echo $data['pot_iuran_koperasi'];?></center></td>
                <td><center><?php echo $data['biaya_adm'];?></center></td>
                <td><center><?php echo $data['take_home_pay'];?></center></td>
                   

                   </tr></div>
                 <?php   
              }


              ?>
                   </tbody>
                   </table>
                  <!-- </div>-->
               
              </div> 
              </div>
            </div><!-- col-lg-12--> 
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->


<!-------------------------------------------------------------------------------------------------------->


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
                        <h3 class="panel-title"><i class="fa fa-user"></i> Data Karyawan Accounting</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                  <?php
                   
                  


                     $query1="select * from gajian inner join karyawan on gajian.nik = karyawan.nik where karyawan.departemen ='Accounting' " ;
                  

                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>


                  <table id="example" border="1">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nik </i></center></th>
                        <th><center>Nama </center></th>
                        <th><center>Gaji Bulan </center></th>
                        <th><center>Hadir </center></th>
                        <th><center>Telat </center></th>
                        <th><center>Tidak Hadir </center></th>
                        
                        
                        <th><center>Gaji Pokok </center></th>
                        <th><center>Tunjangan Jabatan </center></th>

                         <th><center>Premi Hadir </center></th>
                        
                        
                        <th><center>Tunjangan Konsumsi </center></th>
                        <th><center>Komisi Penjualan </center></th>
                        <th><center>Komisi BSC </center></th>
                        <th><center>Barang Berkomisi </center></th>
                        <th><center>Tunjangan Jamsostek Tenaga Kerja</center></th> 
                        <th><center>Uang Lembur</center></th>
                        <th><center>Gaji Bruto</center></th>
                        <th><center>Setor ke Jamsostek Tenaga Kerja </center></th>
                        <th><center>Potongan Jamsostek Tenaga Kerja </center></th>
                        <th><center>Gaji Netto  </center></th>
                        <th><center>Potongan Telat</center></th>
                        <th><center>Potongan Tidak Hadir</center></th>
                        <th><center>Potongan Premi Hadir</center></th>
                        <th><center>Potongan ITU</center></th>
                        <th><center>Potongan Iuran Wajib</center></th>
                        <th><center>Potongan Iuran Sukarela</center></th>
                        <th><center>Potongan Iuran Koperasi</center></th>
                        <th><center>Biaya Administrasi</center></th>
                        <th><center>Take Home Pay</center></th>
               
                        
                         
                        
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
                    <tbody>
                    <tr>
                    <td><center><?php echo $no; ?></center></td>
                    <td><center><?php echo $data['nik'];?></center></td>
                    <td></span> <?php echo $data['nama'];?></td>
                    <td><center><?php echo $data['gaji_bulan'];?> - <?php echo $data['gaji_tahun'];?></center></td>
                     <td><center><?php echo $data['hadir'];?></center></td>
                  <td><center><?php echo $data['telat'];?></center></td>
                  <td><center><?php echo $data['tidak_hadir'];?></center></td>
                    
                                        
                    <td><center><?php echo $data['gaji_pokok'];?></center></td>
                    <td><center><?php echo $data['tunjangan'];?></center></td>
                    
                
                 
                
                <td><center><?php echo $data['premi_hadir'];?></center></td>
                <td><center><?php echo $data['tunjangan_konsumsi'];?></center></td>
                <td><center><?php echo $data['komisi_penjualan'];?></center></td>
                <td><center><?php echo $data['komisi_bsc'];?></center></td>
                <td><center><?php echo $data['barang_berkomisi'];?></center></td>
                <td><center><?php echo $data['tunjangan_jamsostek'];?></center></td>
                <td><center><?php echo $data['uang_lembur'];?></center></td>
                <td><center><?php echo $data['gaji_bruto'];?></center></td>
                <td><center><?php echo $data['setor_jamsostek'];?></center></td>
                <td><center><?php echo $data['pot_jamsostek'];?></center></td>
                <td><center><?php echo $data['gaji_netto'];?></center></td>
                <td><center><?php echo $data['pot_telat'];?></center></td>
                <td><center><?php echo $data['pot_tidak_hadir'];?></center></td>
                <td><center><?php echo $data['pot_premi_hadir'];?></center></td>
                <td><center><?php echo $data['pot_itu'];?></center></td>
                <td><center><?php echo $data['pot_iuran_wajib'];?></center></td>
                <td><center><?php echo $data['pot_iuran_sukarela'];?></center></td>
                <td><center><?php echo $data['pot_iuran_koperasi'];?></center></td>
                <td><center><?php echo $data['biaya_adm'];?></center></td>
                <td><center><?php echo $data['take_home_pay'];?></center></td>
                   

                   </tr></div>
                 <?php   
              }


              ?>
                   </tbody>
                   </table>
                  <!-- </div>-->
               
              </div> 
              </div>
            </div><!-- col-lg-12--> 
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->


<!-------------------------------------------------------------------------------------------------------->


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
                        <h3 class="panel-title"><i class="fa fa-user"></i> Data Karyawan IT</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                  <?php
                   
                  


                     $query1="select * from gajian inner join karyawan on gajian.nik = karyawan.nik where karyawan.departemen ='IT' " ;
                  

                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>


                 <table id="example" border="1">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nik </i></center></th>
                        <th><center>Nama </center></th>
                        <th><center>Gaji Bulan </center></th>
                        <th><center>Hadir </center></th>
                        <th><center>Telat </center></th>
                        <th><center>Tidak Hadir </center></th>
                        
                        
                        <th><center>Gaji Pokok </center></th>
                        <th><center>Tunjangan Jabatan </center></th>

                         <th><center>Premi Hadir </center></th>
                        
                        
                        <th><center>Tunjangan Konsumsi </center></th>
                        <th><center>Komisi Penjualan </center></th>
                        <th><center>Komisi BSC </center></th>
                        <th><center>Barang Berkomisi </center></th>
                        <th><center>Tunjangan Jamsostek Tenaga Kerja</center></th> 
                        <th><center>Uang Lembur</center></th>
                        <th><center>Gaji Bruto</center></th>
                        <th><center>Setor ke Jamsostek Tenaga Kerja </center></th>
                        <th><center>Potongan Jamsostek Tenaga Kerja </center></th>
                        <th><center>Gaji Netto  </center></th>
                        <th><center>Potongan Telat</center></th>
                        <th><center>Potongan Tidak Hadir</center></th>
                        <th><center>Potongan Premi Hadir</center></th>
                        <th><center>Potongan ITU</center></th>
                        <th><center>Potongan Iuran Wajib</center></th>
                        <th><center>Potongan Iuran Sukarela</center></th>
                        <th><center>Potongan Iuran Koperasi</center></th>
                        <th><center>Biaya Administrasi</center></th>
                        <th><center>Take Home Pay</center></th>
               
                        
                         
                        
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
                    <tbody>
                    <tr>
                    <td><center><?php echo $no; ?></center></td>
                    <td><center><?php echo $data['nik'];?></center></td>
                    <td></span> <?php echo $data['nama'];?></td>
                    <td><center><?php echo $data['gaji_bulan'];?> - <?php echo $data['gaji_tahun'];?></center></td>
                     <td><center><?php echo $data['hadir'];?></center></td>
                  <td><center><?php echo $data['telat'];?></center></td>
                  <td><center><?php echo $data['tidak_hadir'];?></center></td>
                    
                                        
                    <td><center><?php echo $data['gaji_pokok'];?></center></td>
                    <td><center><?php echo $data['tunjangan'];?></center></td>
                    
                
                 
                
                <td><center><?php echo $data['premi_hadir'];?></center></td>
                <td><center><?php echo $data['tunjangan_konsumsi'];?></center></td>
                <td><center><?php echo $data['komisi_penjualan'];?></center></td>
                <td><center><?php echo $data['komisi_bsc'];?></center></td>
                <td><center><?php echo $data['barang_berkomisi'];?></center></td>
                <td><center><?php echo $data['tunjangan_jamsostek'];?></center></td>
                <td><center><?php echo $data['uang_lembur'];?></center></td>
                <td><center><?php echo $data['gaji_bruto'];?></center></td>
                <td><center><?php echo $data['setor_jamsostek'];?></center></td>
                <td><center><?php echo $data['pot_jamsostek'];?></center></td>
                <td><center><?php echo $data['gaji_netto'];?></center></td>
                <td><center><?php echo $data['pot_telat'];?></center></td>
                <td><center><?php echo $data['pot_tidak_hadir'];?></center></td>
                <td><center><?php echo $data['pot_premi_hadir'];?></center></td>
                <td><center><?php echo $data['pot_itu'];?></center></td>
                <td><center><?php echo $data['pot_iuran_wajib'];?></center></td>
                <td><center><?php echo $data['pot_iuran_sukarela'];?></center></td>
                <td><center><?php echo $data['pot_iuran_koperasi'];?></center></td>
                <td><center><?php echo $data['biaya_adm'];?></center></td>
                <td><center><?php echo $data['take_home_pay'];?></center></td>
                   

                   </tr></div>
                 <?php   
              }


              ?>
                   </tbody>
                   </table>
                  <!-- </div>-->
               
              </div> 
              </div>
            </div><!-- col-lg-12--> 
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->     


<!-------------------------------------------------------------------------------------------------------->


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
                        <h3 class="panel-title"><i class="fa fa-user"></i> Data Karyawan Production</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                  <?php
                   
                  


                     $query1="select * from gajian inner join karyawan on gajian.nik = karyawan.nik where karyawan.departemen ='Production' " ;
                  

                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>


                 <table id="example" border="1">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nik </i></center></th>
                        <th><center>Nama </center></th>
                        <th><center>Gaji Bulan </center></th>
                        <th><center>Hadir </center></th>
                        <th><center>Telat </center></th>
                        <th><center>Tidak Hadir </center></th>
                        
                        
                        <th><center>Gaji Pokok </center></th>
                        <th><center>Tunjangan Jabatan </center></th>

                         <th><center>Premi Hadir </center></th>
                        
                        
                        <th><center>Tunjangan Konsumsi </center></th>
                        <th><center>Komisi Penjualan </center></th>
                        <th><center>Komisi BSC </center></th>
                        <th><center>Barang Berkomisi </center></th>
                        <th><center>Tunjangan Jamsostek Tenaga Kerja</center></th> 
                        <th><center>Uang Lembur</center></th>
                        <th><center>Gaji Bruto</center></th>
                        <th><center>Setor ke Jamsostek Tenaga Kerja </center></th>
                        <th><center>Potongan Jamsostek Tenaga Kerja </center></th>
                        <th><center>Gaji Netto  </center></th>
                        <th><center>Potongan Telat</center></th>
                        <th><center>Potongan Tidak Hadir</center></th>
                        <th><center>Potongan Premi Hadir</center></th>
                        <th><center>Potongan ITU</center></th>
                        <th><center>Potongan Iuran Wajib</center></th>
                        <th><center>Potongan Iuran Sukarela</center></th>
                        <th><center>Potongan Iuran Koperasi</center></th>
                        <th><center>Biaya Administrasi</center></th>
                        <th><center>Take Home Pay</center></th>
               
                        
                         
                        
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
                    <tbody>
                    <tr>
                    <td><center><?php echo $no; ?></center></td>
                    <td><center><?php echo $data['nik'];?></center></td>
                    <td></span> <?php echo $data['nama'];?></td>
                    <td><center><?php echo $data['gaji_bulan'];?> - <?php echo $data['gaji_tahun'];?></center></td>
                     <td><center><?php echo $data['hadir'];?></center></td>
                  <td><center><?php echo $data['telat'];?></center></td>
                  <td><center><?php echo $data['tidak_hadir'];?></center></td>
                    
                                        
                    <td><center><?php echo $data['gaji_pokok'];?></center></td>
                    <td><center><?php echo $data['tunjangan'];?></center></td>
                    
                
                 
                
                <td><center><?php echo $data['premi_hadir'];?></center></td>
                <td><center><?php echo $data['tunjangan_konsumsi'];?></center></td>
                <td><center><?php echo $data['komisi_penjualan'];?></center></td>
                <td><center><?php echo $data['komisi_bsc'];?></center></td>
                <td><center><?php echo $data['barang_berkomisi'];?></center></td>
                <td><center><?php echo $data['tunjangan_jamsostek'];?></center></td>
                <td><center><?php echo $data['uang_lembur'];?></center></td>
                <td><center><?php echo $data['gaji_bruto'];?></center></td>
                <td><center><?php echo $data['setor_jamsostek'];?></center></td>
                <td><center><?php echo $data['pot_jamsostek'];?></center></td>
                <td><center><?php echo $data['gaji_netto'];?></center></td>
                <td><center><?php echo $data['pot_telat'];?></center></td>
                <td><center><?php echo $data['pot_tidak_hadir'];?></center></td>
                <td><center><?php echo $data['pot_premi_hadir'];?></center></td>
                <td><center><?php echo $data['pot_itu'];?></center></td>
                <td><center><?php echo $data['pot_iuran_wajib'];?></center></td>
                <td><center><?php echo $data['pot_iuran_sukarela'];?></center></td>
                <td><center><?php echo $data['pot_iuran_koperasi'];?></center></td>
                <td><center><?php echo $data['biaya_adm'];?></center></td>
                <td><center><?php echo $data['take_home_pay'];?></center></td>
                   

                   </tr></div>
                 <?php   
              }


              ?>
                   </tbody>
                   </table>
                  <!-- </div>-->
               
              </div> 
              </div>
            </div><!-- col-lg-12--> 
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->                           


<!-------------------------------------------------------------------------------------------------------->


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
                        <h3 class="panel-title"><i class="fa fa-user"></i> Data Karyawan PPIC</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                  <?php
                   
                  


                     $query1="select * from gajian inner join karyawan on gajian.nik = karyawan.nik where karyawan.departemen ='PPIC' " ;
                  

                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>


                  <table id="example" border="1">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nik </i></center></th>
                        <th><center>Nama </center></th>
                        <th><center>Gaji Bulan </center></th>
                        <th><center>Hadir </center></th>
                        <th><center>Telat </center></th>
                        <th><center>Tidak Hadir </center></th>
                        
                        
                        <th><center>Gaji Pokok </center></th>
                        <th><center>Tunjangan Jabatan </center></th>

                         <th><center>Premi Hadir </center></th>
                        
                        
                        <th><center>Tunjangan Konsumsi </center></th>
                        <th><center>Komisi Penjualan </center></th>
                        <th><center>Komisi BSC </center></th>
                        <th><center>Barang Berkomisi </center></th>
                        <th><center>Tunjangan Jamsostek Tenaga Kerja</center></th> 
                        <th><center>Uang Lembur</center></th>
                        <th><center>Gaji Bruto</center></th>
                        <th><center>Setor ke Jamsostek Tenaga Kerja </center></th>
                        <th><center>Potongan Jamsostek Tenaga Kerja </center></th>
                        <th><center>Gaji Netto  </center></th>
                        <th><center>Potongan Telat</center></th>
                        <th><center>Potongan Tidak Hadir</center></th>
                        <th><center>Potongan Premi Hadir</center></th>
                        <th><center>Potongan ITU</center></th>
                        <th><center>Potongan Iuran Wajib</center></th>
                        <th><center>Potongan Iuran Sukarela</center></th>
                        <th><center>Potongan Iuran Koperasi</center></th>
                        <th><center>Biaya Administrasi</center></th>
                        <th><center>Take Home Pay</center></th>
               
                        
                         
                        
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
                    <tbody>
                    <tr>
                    <td><center><?php echo $no; ?></center></td>
                    <td><center><?php echo $data['nik'];?></center></td>
                    <td></span> <?php echo $data['nama'];?></td>
                    <td><center><?php echo $data['gaji_bulan'];?> - <?php echo $data['gaji_tahun'];?></center></td>
                     <td><center><?php echo $data['hadir'];?></center></td>
                  <td><center><?php echo $data['telat'];?></center></td>
                  <td><center><?php echo $data['tidak_hadir'];?></center></td>
                    
                                        
                    <td><center><?php echo $data['gaji_pokok'];?></center></td>
                    <td><center><?php echo $data['tunjangan'];?></center></td>
                    
                
                 
                
                <td><center><?php echo $data['premi_hadir'];?></center></td>
                <td><center><?php echo $data['tunjangan_konsumsi'];?></center></td>
                <td><center><?php echo $data['komisi_penjualan'];?></center></td>
                <td><center><?php echo $data['komisi_bsc'];?></center></td>
                <td><center><?php echo $data['barang_berkomisi'];?></center></td>
                <td><center><?php echo $data['tunjangan_jamsostek'];?></center></td>
                <td><center><?php echo $data['uang_lembur'];?></center></td>
                <td><center><?php echo $data['gaji_bruto'];?></center></td>
                <td><center><?php echo $data['setor_jamsostek'];?></center></td>
                <td><center><?php echo $data['pot_jamsostek'];?></center></td>
                <td><center><?php echo $data['gaji_netto'];?></center></td>
                <td><center><?php echo $data['pot_telat'];?></center></td>
                <td><center><?php echo $data['pot_tidak_hadir'];?></center></td>
                <td><center><?php echo $data['pot_premi_hadir'];?></center></td>
                <td><center><?php echo $data['pot_itu'];?></center></td>
                <td><center><?php echo $data['pot_iuran_wajib'];?></center></td>
                <td><center><?php echo $data['pot_iuran_sukarela'];?></center></td>
                <td><center><?php echo $data['pot_iuran_koperasi'];?></center></td>
                <td><center><?php echo $data['biaya_adm'];?></center></td>
                <td><center><?php echo $data['take_home_pay'];?></center></td>
                   

                   </tr></div>
                 <?php   
              }


              ?>
                   </tbody>
                   </table>
                  <!-- </div>-->
               
              </div> 
              </div>
            </div><!-- col-lg-12--> 
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->


<!-------------------------------------------------------------------------------------------------------->


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
                        <h3 class="panel-title"><i class="fa fa-user"></i> Data Karyawan QC</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                  <?php
                   
                  


                     $query1="select * from gajian inner join karyawan on gajian.nik = karyawan.nik where karyawan.departemen ='QC' " ;
                  

                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>


                  <table id="example" border="1">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nik </i></center></th>
                        <th><center>Nama </center></th>
                        <th><center>Gaji Bulan </center></th>
                        <th><center>Hadir </center></th>
                        <th><center>Telat </center></th>
                        <th><center>Tidak Hadir </center></th>
                        
                        
                        <th><center>Gaji Pokok </center></th>
                        <th><center>Tunjangan Jabatan </center></th>

                         <th><center>Premi Hadir </center></th>
                        
                        
                        <th><center>Tunjangan Konsumsi </center></th>
                        <th><center>Komisi Penjualan </center></th>
                        <th><center>Komisi BSC </center></th>
                        <th><center>Barang Berkomisi </center></th>
                        <th><center>Tunjangan Jamsostek Tenaga Kerja</center></th> 
                        <th><center>Uang Lembur</center></th>
                        <th><center>Gaji Bruto</center></th>
                        <th><center>Setor ke Jamsostek Tenaga Kerja </center></th>
                        <th><center>Potongan Jamsostek Tenaga Kerja </center></th>
                        <th><center>Gaji Netto  </center></th>
                        <th><center>Potongan Telat</center></th>
                        <th><center>Potongan Tidak Hadir</center></th>
                        <th><center>Potongan Premi Hadir</center></th>
                        <th><center>Potongan ITU</center></th>
                        <th><center>Potongan Iuran Wajib</center></th>
                        <th><center>Potongan Iuran Sukarela</center></th>
                        <th><center>Potongan Iuran Koperasi</center></th>
                        <th><center>Biaya Administrasi</center></th>
                        <th><center>Take Home Pay</center></th>
               
                        
                         
                        
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
                    <tbody>
                    <tr>
                    <td><center><?php echo $no; ?></center></td>
                    <td><center><?php echo $data['nik'];?></center></td>
                    <td></span> <?php echo $data['nama'];?></td>
                    <td><center><?php echo $data['gaji_bulan'];?> - <?php echo $data['gaji_tahun'];?></center></td>
                     <td><center><?php echo $data['hadir'];?></center></td>
                  <td><center><?php echo $data['telat'];?></center></td>
                  <td><center><?php echo $data['tidak_hadir'];?></center></td>
                    
                                        
                    <td><center><?php echo $data['gaji_pokok'];?></center></td>
                    <td><center><?php echo $data['tunjangan'];?></center></td>
                    
                
                 
                
                <td><center><?php echo $data['premi_hadir'];?></center></td>
                <td><center><?php echo $data['tunjangan_konsumsi'];?></center></td>
                <td><center><?php echo $data['komisi_penjualan'];?></center></td>
                <td><center><?php echo $data['komisi_bsc'];?></center></td>
                <td><center><?php echo $data['barang_berkomisi'];?></center></td>
                <td><center><?php echo $data['tunjangan_jamsostek'];?></center></td>
                <td><center><?php echo $data['uang_lembur'];?></center></td>
                <td><center><?php echo $data['gaji_bruto'];?></center></td>
                <td><center><?php echo $data['setor_jamsostek'];?></center></td>
                <td><center><?php echo $data['pot_jamsostek'];?></center></td>
                <td><center><?php echo $data['gaji_netto'];?></center></td>
                <td><center><?php echo $data['pot_telat'];?></center></td>
                <td><center><?php echo $data['pot_tidak_hadir'];?></center></td>
                <td><center><?php echo $data['pot_premi_hadir'];?></center></td>
                <td><center><?php echo $data['pot_itu'];?></center></td>
                <td><center><?php echo $data['pot_iuran_wajib'];?></center></td>
                <td><center><?php echo $data['pot_iuran_sukarela'];?></center></td>
                <td><center><?php echo $data['pot_iuran_koperasi'];?></center></td>
                <td><center><?php echo $data['biaya_adm'];?></center></td>
                <td><center><?php echo $data['take_home_pay'];?></center></td>
                   

                   </tr></div>
                 <?php   
              }


              ?>
                   </tbody>
                   </table>
                  <!-- </div>-->
               
              </div> 
              </div>
            </div><!-- col-lg-12--> 
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->                


<!-------------------------------------------------------------------------------------------------------->


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
                        <h3 class="panel-title"><i class="fa fa-user"></i> Data Karyawan QA</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                  <?php
                   
                  


                     $query1="select * from gajian inner join karyawan on gajian.nik = karyawan.nik where karyawan.departemen ='QA' " ;
                  

                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>


                  <table id="example" border="1">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nik </i></center></th>
                        <th><center>Nama </center></th>
                        <th><center>Gaji Bulan </center></th>
                        <th><center>Hadir </center></th>
                        <th><center>Telat </center></th>
                        <th><center>Tidak Hadir </center></th>
                        
                        
                        <th><center>Gaji Pokok </center></th>
                        <th><center>Tunjangan Jabatan </center></th>

                         <th><center>Premi Hadir </center></th>
                        
                        
                        <th><center>Tunjangan Konsumsi </center></th>
                        <th><center>Komisi Penjualan </center></th>
                        <th><center>Komisi BSC </center></th>
                        <th><center>Barang Berkomisi </center></th>
                        <th><center>Tunjangan Jamsostek Tenaga Kerja</center></th> 
                        <th><center>Uang Lembur</center></th>
                        <th><center>Gaji Bruto</center></th>
                        <th><center>Setor ke Jamsostek Tenaga Kerja </center></th>
                        <th><center>Potongan Jamsostek Tenaga Kerja </center></th>
                        <th><center>Gaji Netto  </center></th>
                        <th><center>Potongan Telat</center></th>
                        <th><center>Potongan Tidak Hadir</center></th>
                        <th><center>Potongan Premi Hadir</center></th>
                        <th><center>Potongan ITU</center></th>
                        <th><center>Potongan Iuran Wajib</center></th>
                        <th><center>Potongan Iuran Sukarela</center></th>
                        <th><center>Potongan Iuran Koperasi</center></th>
                        <th><center>Biaya Administrasi</center></th>
                        <th><center>Take Home Pay</center></th>
               
                        
                         
                        
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
                    <tbody>
                    <tr>
                    <td><center><?php echo $no; ?></center></td>
                    <td><center><?php echo $data['nik'];?></center></td>
                    <td></span> <?php echo $data['nama'];?></td>
                    <td><center><?php echo $data['gaji_bulan'];?> - <?php echo $data['gaji_tahun'];?></center></td>
                     <td><center><?php echo $data['hadir'];?></center></td>
                  <td><center><?php echo $data['telat'];?></center></td>
                  <td><center><?php echo $data['tidak_hadir'];?></center></td>
                    
                                        
                    <td><center><?php echo $data['gaji_pokok'];?></center></td>
                    <td><center><?php echo $data['tunjangan'];?></center></td>
                    
                
                 
                
                <td><center><?php echo $data['premi_hadir'];?></center></td>
                <td><center><?php echo $data['tunjangan_konsumsi'];?></center></td>
                <td><center><?php echo $data['komisi_penjualan'];?></center></td>
                <td><center><?php echo $data['komisi_bsc'];?></center></td>
                <td><center><?php echo $data['barang_berkomisi'];?></center></td>
                <td><center><?php echo $data['tunjangan_jamsostek'];?></center></td>
                <td><center><?php echo $data['uang_lembur'];?></center></td>
                <td><center><?php echo $data['gaji_bruto'];?></center></td>
                <td><center><?php echo $data['setor_jamsostek'];?></center></td>
                <td><center><?php echo $data['pot_jamsostek'];?></center></td>
                <td><center><?php echo $data['gaji_netto'];?></center></td>
                <td><center><?php echo $data['pot_telat'];?></center></td>
                <td><center><?php echo $data['pot_tidak_hadir'];?></center></td>
                <td><center><?php echo $data['pot_premi_hadir'];?></center></td>
                <td><center><?php echo $data['pot_itu'];?></center></td>
                <td><center><?php echo $data['pot_iuran_wajib'];?></center></td>
                <td><center><?php echo $data['pot_iuran_sukarela'];?></center></td>
                <td><center><?php echo $data['pot_iuran_koperasi'];?></center></td>
                <td><center><?php echo $data['biaya_adm'];?></center></td>
                <td><center><?php echo $data['take_home_pay'];?></center></td>
                   

                   </tr></div>
                 <?php   
              }


              ?>
                   </tbody>
                   </table>
                  <!-- </div>-->
               
              </div> 
              </div>
            </div><!-- col-lg-12--> 
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->


<!-------------------------------------------------------------------------------------------------------->


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
                        <h3 class="panel-title"><i class="fa fa-user"></i> Data Karyawan Exim</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                  <?php
                   
                  


                     $query1="select * from gajian inner join karyawan on gajian.nik = karyawan.nik where karyawan.departemen ='Exim' " ;
                  

                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>


                  <table id="example" border="1">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nik </i></center></th>
                        <th><center>Nama </center></th>
                        <th><center>Gaji Bulan </center></th>
                        <th><center>Hadir </center></th>
                        <th><center>Telat </center></th>
                        <th><center>Tidak Hadir </center></th>
                        
                        
                        <th><center>Gaji Pokok </center></th>
                        <th><center>Tunjangan Jabatan </center></th>

                         <th><center>Premi Hadir </center></th>
                        
                        
                        <th><center>Tunjangan Konsumsi </center></th>
                        <th><center>Komisi Penjualan </center></th>
                        <th><center>Komisi BSC </center></th>
                        <th><center>Barang Berkomisi </center></th>
                        <th><center>Tunjangan Jamsostek Tenaga Kerja</center></th> 
                        <th><center>Uang Lembur</center></th>
                        <th><center>Gaji Bruto</center></th>
                        <th><center>Setor ke Jamsostek Tenaga Kerja </center></th>
                        <th><center>Potongan Jamsostek Tenaga Kerja </center></th>
                        <th><center>Gaji Netto  </center></th>
                        <th><center>Potongan Telat</center></th>
                        <th><center>Potongan Tidak Hadir</center></th>
                        <th><center>Potongan Premi Hadir</center></th>
                        <th><center>Potongan ITU</center></th>
                        <th><center>Potongan Iuran Wajib</center></th>
                        <th><center>Potongan Iuran Sukarela</center></th>
                        <th><center>Potongan Iuran Koperasi</center></th>
                        <th><center>Biaya Administrasi</center></th>
                        <th><center>Take Home Pay</center></th>
               
                        
                         
                        
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
                    <tbody>
                    <tr>
                    <td><center><?php echo $no; ?></center></td>
                    <td><center><?php echo $data['nik'];?></center></td>
                    <td></span> <?php echo $data['nama'];?></td>
                    <td><center><?php echo $data['gaji_bulan'];?> - <?php echo $data['gaji_tahun'];?></center></td>
                     <td><center><?php echo $data['hadir'];?></center></td>
                  <td><center><?php echo $data['telat'];?></center></td>
                  <td><center><?php echo $data['tidak_hadir'];?></center></td>
                    
                                        
                    <td><center><?php echo $data['gaji_pokok'];?></center></td>
                    <td><center><?php echo $data['tunjangan'];?></center></td>
                    
                
                 
                
                <td><center><?php echo $data['premi_hadir'];?></center></td>
                <td><center><?php echo $data['tunjangan_konsumsi'];?></center></td>
                <td><center><?php echo $data['komisi_penjualan'];?></center></td>
                <td><center><?php echo $data['komisi_bsc'];?></center></td>
                <td><center><?php echo $data['barang_berkomisi'];?></center></td>
                <td><center><?php echo $data['tunjangan_jamsostek'];?></center></td>
                <td><center><?php echo $data['uang_lembur'];?></center></td>
                <td><center><?php echo $data['gaji_bruto'];?></center></td>
                <td><center><?php echo $data['setor_jamsostek'];?></center></td>
                <td><center><?php echo $data['pot_jamsostek'];?></center></td>
                <td><center><?php echo $data['gaji_netto'];?></center></td>
                <td><center><?php echo $data['pot_telat'];?></center></td>
                <td><center><?php echo $data['pot_tidak_hadir'];?></center></td>
                <td><center><?php echo $data['pot_premi_hadir'];?></center></td>
                <td><center><?php echo $data['pot_itu'];?></center></td>
                <td><center><?php echo $data['pot_iuran_wajib'];?></center></td>
                <td><center><?php echo $data['pot_iuran_sukarela'];?></center></td>
                <td><center><?php echo $data['pot_iuran_koperasi'];?></center></td>
                <td><center><?php echo $data['biaya_adm'];?></center></td>
                <td><center><?php echo $data['take_home_pay'];?></center></td>
                   

                   </tr></div>
                 <?php   
              }


              ?>
                   </tbody>
                   </table>
                  <!-- </div>-->
               
              </div> 
              </div>
            </div><!-- col-lg-12--> 
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->



<!-------------------------------------------------------------------------------------------------------->


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
                        <h3 class="panel-title"><i class="fa fa-user"></i> Data Karyawan HRD</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                  <?php
                   
                  


                     $query1="select * from gajian inner join karyawan on gajian.nik = karyawan.nik where karyawan.departemen ='HRD' " ;
                  

                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>


                  <table id="example" border="1">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nik </i></center></th>
                        <th><center>Nama </center></th>
                        <th><center>Gaji Bulan </center></th>
                        <th><center>Hadir </center></th>
                        <th><center>Telat </center></th>
                        <th><center>Tidak Hadir </center></th>
                        
                        
                        <th><center>Gaji Pokok </center></th>
                        <th><center>Tunjangan Jabatan </center></th>

                         <th><center>Premi Hadir </center></th>
                        
                        
                        <th><center>Tunjangan Konsumsi </center></th>
                        <th><center>Komisi Penjualan </center></th>
                        <th><center>Komisi BSC </center></th>
                        <th><center>Barang Berkomisi </center></th>
                        <th><center>Tunjangan Jamsostek Tenaga Kerja</center></th> 
                        <th><center>Uang Lembur</center></th>
                        <th><center>Gaji Bruto</center></th>
                        <th><center>Setor ke Jamsostek Tenaga Kerja </center></th>
                        <th><center>Potongan Jamsostek Tenaga Kerja </center></th>
                        <th><center>Gaji Netto  </center></th>
                        <th><center>Potongan Telat</center></th>
                        <th><center>Potongan Tidak Hadir</center></th>
                        <th><center>Potongan Premi Hadir</center></th>
                        <th><center>Potongan ITU</center></th>
                        <th><center>Potongan Iuran Wajib</center></th>
                        <th><center>Potongan Iuran Sukarela</center></th>
                        <th><center>Potongan Iuran Koperasi</center></th>
                        <th><center>Biaya Administrasi</center></th>
                        <th><center>Take Home Pay</center></th>
               
                        
                         
                        
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
                    <tbody>
                    <tr>
                    <td><center><?php echo $no; ?></center></td>
                    <td><center><?php echo $data['nik'];?></center></td>
                    <td></span> <?php echo $data['nama'];?></td>
                    <td><center><?php echo $data['gaji_bulan'];?> - <?php echo $data['gaji_tahun'];?></center></td>
                     <td><center><?php echo $data['hadir'];?></center></td>
                  <td><center><?php echo $data['telat'];?></center></td>
                  <td><center><?php echo $data['tidak_hadir'];?></center></td>
                    
                                        
                    <td><center><?php echo $data['gaji_pokok'];?></center></td>
                    <td><center><?php echo $data['tunjangan'];?></center></td>
                    
                
                 
                
                <td><center><?php echo $data['premi_hadir'];?></center></td>
                <td><center><?php echo $data['tunjangan_konsumsi'];?></center></td>
                <td><center><?php echo $data['komisi_penjualan'];?></center></td>
                <td><center><?php echo $data['komisi_bsc'];?></center></td>
                <td><center><?php echo $data['barang_berkomisi'];?></center></td>
                <td><center><?php echo $data['tunjangan_jamsostek'];?></center></td>
                <td><center><?php echo $data['uang_lembur'];?></center></td>
                <td><center><?php echo $data['gaji_bruto'];?></center></td>
                <td><center><?php echo $data['setor_jamsostek'];?></center></td>
                <td><center><?php echo $data['pot_jamsostek'];?></center></td>
                <td><center><?php echo $data['gaji_netto'];?></center></td>
                <td><center><?php echo $data['pot_telat'];?></center></td>
                <td><center><?php echo $data['pot_tidak_hadir'];?></center></td>
                <td><center><?php echo $data['pot_premi_hadir'];?></center></td>
                <td><center><?php echo $data['pot_itu'];?></center></td>
                <td><center><?php echo $data['pot_iuran_wajib'];?></center></td>
                <td><center><?php echo $data['pot_iuran_sukarela'];?></center></td>
                <td><center><?php echo $data['pot_iuran_koperasi'];?></center></td>
                <td><center><?php echo $data['biaya_adm'];?></center></td>
                <td><center><?php echo $data['take_home_pay'];?></center></td>
                   

                   </tr></div>
                 <?php   
              }


              ?>
                   </tbody>
                   </table>
                  <!-- </div>-->
               
              </div> 
              </div>
            </div><!-- col-lg-12--> 
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->



<!-------------------------------------------------------------------------------------------------------->


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
                        <h3 class="panel-title"><i class="fa fa-user"></i> Data Karyawan Marketing</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                  <?php
                   
                  


                     $query1="select * from gajian inner join karyawan on gajian.nik = karyawan.nik where karyawan.departemen ='Marketing' " ;
                  

                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>


                  <table id="example" border="1">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nik </i></center></th>
                        <th><center>Nama </center></th>
                        <th><center>Gaji Bulan </center></th>
                        <th><center>Hadir </center></th>
                        <th><center>Telat </center></th>
                        <th><center>Tidak Hadir </center></th>
                        
                        
                        <th><center>Gaji Pokok </center></th>
                        <th><center>Tunjangan Jabatan </center></th>

                         <th><center>Premi Hadir </center></th>
                        
                        
                        <th><center>Tunjangan Konsumsi </center></th>
                        <th><center>Komisi Penjualan </center></th>
                        <th><center>Komisi BSC </center></th>
                        <th><center>Barang Berkomisi </center></th>
                        <th><center>Tunjangan Jamsostek Tenaga Kerja</center></th> 
                        <th><center>Uang Lembur</center></th>
                        <th><center>Gaji Bruto</center></th>
                        <th><center>Setor ke Jamsostek Tenaga Kerja </center></th>
                        <th><center>Potongan Jamsostek Tenaga Kerja </center></th>
                        <th><center>Gaji Netto  </center></th>
                        <th><center>Potongan Telat</center></th>
                        <th><center>Potongan Tidak Hadir</center></th>
                        <th><center>Potongan Premi Hadir</center></th>
                        <th><center>Potongan ITU</center></th>
                        <th><center>Potongan Iuran Wajib</center></th>
                        <th><center>Potongan Iuran Sukarela</center></th>
                        <th><center>Potongan Iuran Koperasi</center></th>
                        <th><center>Biaya Administrasi</center></th>
                        <th><center>Take Home Pay</center></th>
               
                        
                         
                        
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
                    <tbody>
                    <tr>
                    <td><center><?php echo $no; ?></center></td>
                    <td><center><?php echo $data['nik'];?></center></td>
                    <td></span> <?php echo $data['nama'];?></td>
                    <td><center><?php echo $data['gaji_bulan'];?> - <?php echo $data['gaji_tahun'];?></center></td>
                     <td><center><?php echo $data['hadir'];?></center></td>
                  <td><center><?php echo $data['telat'];?></center></td>
                  <td><center><?php echo $data['tidak_hadir'];?></center></td>
                    
                                        
                    <td><center><?php echo $data['gaji_pokok'];?></center></td>
                    <td><center><?php echo $data['tunjangan'];?></center></td>
                    
                
                 
                
                <td><center><?php echo $data['premi_hadir'];?></center></td>
                <td><center><?php echo $data['tunjangan_konsumsi'];?></center></td>
                <td><center><?php echo $data['komisi_penjualan'];?></center></td>
                <td><center><?php echo $data['komisi_bsc'];?></center></td>
                <td><center><?php echo $data['barang_berkomisi'];?></center></td>
                <td><center><?php echo $data['tunjangan_jamsostek'];?></center></td>
                <td><center><?php echo $data['uang_lembur'];?></center></td>
                <td><center><?php echo $data['gaji_bruto'];?></center></td>
                <td><center><?php echo $data['setor_jamsostek'];?></center></td>
                <td><center><?php echo $data['pot_jamsostek'];?></center></td>
                <td><center><?php echo $data['gaji_netto'];?></center></td>
                <td><center><?php echo $data['pot_telat'];?></center></td>
                <td><center><?php echo $data['pot_tidak_hadir'];?></center></td>
                <td><center><?php echo $data['pot_premi_hadir'];?></center></td>
                <td><center><?php echo $data['pot_itu'];?></center></td>
                <td><center><?php echo $data['pot_iuran_wajib'];?></center></td>
                <td><center><?php echo $data['pot_iuran_sukarela'];?></center></td>
                <td><center><?php echo $data['pot_iuran_koperasi'];?></center></td>
                <td><center><?php echo $data['biaya_adm'];?></center></td>
                <td><center><?php echo $data['take_home_pay'];?></center></td>
                   

                   </tr></div>
                 <?php   
              }


              ?>
                   </tbody>
                   </table>
                  <!-- </div>-->
               
              </div> 
              </div>
            </div><!-- col-lg-12--> 
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->



            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        
    </body>
</html>



<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Aplikasi Penggajian Karyawan</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="../dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="../css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="../css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="../css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="../css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- Data Tables -->
        <link rel="stylesheet" href="datatables/dataTables.bootstrap.css"/>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        
                                <?php include "header.php";
$timeout = 10; // Set timeout minutes
$logout_redirect_url = "../index.php"; // Set logout URL

$timeout = $timeout * 60; // Converts minutes to seconds
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
    }
}
$_SESSION['start_time'] = time();
?>
<?php } ?>
                                <!-- Menu Body -->
                                <?php include "menu1.php"; ?>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="detail-admin.php?hal=edit&kd=<?php echo $_SESSION['user_id'];?>" class="btn btn-default btn-flat">Profil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../logout.php" class="btn btn-default btn-flat" onclick="return confirm ('Apakah Anda Akan Keluar.?');"> Keluar </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include "sidebar.php"; ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manajemen Penggajian
                        <small>Aplikasi Penggajian Karyawan</small>
                    </h1>
             <?php
             if(isset($_GET['hal']) == 'hapus'){
				$nik = $_GET['kd'];
        $kd_gaji = $_GET['kd_gaji'];
        echo $kd_gaji;

				$cek = mysqli_query($koneksi, "SELECT * FROM gajian WHERE kd_gaji='$kd_gaji' ");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM gajian WHERE kd_gaji='$kd_gaji'");
					if($delete){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
					}
				}
			}
			?>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Manajemen Penggajian</a></li>
                        <li class="active">Data Gaji Karyawan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                    
              <div class="col-lg-4">
              <form action='manajemen-gaji-karyawan.php' method="GET">


              <div class="row">
                          <div class="col-lg-6">

                              <select name="qBulan" class="form-control" >
              <option value=NULL> -- Gaji Bulan -- </option>
              <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
              
                </select>
                </div>
                   <div class="col-lg-6">
               
                            <select name="qTahun" class="form-control" >
              <option value=NULL> -- Gaji Tahun -- </option>
              <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2024</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                </select>
                        
                          </div>
                 </div>
<BR>
<input type="hidden" name="kd" value="<?php echo $_GET['kd']?>">
            <input type='submit' value='Cari Data' class="btn btn-sm btn-primary" /> <a href='manajemen-gaji-karyawan.php?&kd=<?php echo $_GET['kd'];?>' class="btn btn-sm btn-success" >

           Refresh</i></a>
          
	     
          	</div>
              </div>
           <!-- /.row -->
           <div class="text-right">
           <a href="input-gaji-karyawan.php?&kd=<?php echo $_GET['kd'];?>"  class="btn btn-sm btn-warning"> 
                  Tambah Gaji  <i class="fa fa-arrow-circle-right"></i></a>

                  <a href="manajemen-gaji-karyawan.php" class="btn btn-sm btn-danger">Kembali </a>
              
                </div>
                    <br />
                    <!-- Main row -->



                    <div class="row">
                        <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Data Gaji  </h3> 
                        </div>


                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                  
                  <?php
                  $cariBulan=NULL;
                   $cariTahun=NULL;
                    if((!empty($_GET["qBulan"])) or (!empty($_GET["qTahun"]))  )
                    {
                        $whereis=" where ";
                        $qBulan=  $_GET['qBulan'];
                        $qTahun= $_GET['qTahun'];
                        
                      

                           if(!empty($_GET["qBulan"]) )
                             {

                              $cariBulan = "and gajian.gaji_bulan like '%$qBulan%'";
                            
                             }
                           if(!empty($_GET["qTahun"]) )
                             {
                                  $hubung1 = "";
                                  if(!empty($_GET["qBulan"]) )
                                      {$hubung1 = "or";}

                                  $cariTahun = " ".$hubung1." gajian.gaji_tahun like '%$qTahun%'";   
                                    
                             }
                            

                    }
               
                    
                      $query1="SELECT * FROM gajian INNER JOIN karyawan ON gajian.nik = karyawan.nik WHERE gajian.nik = ".$_GET['kd']." ".$cariBulan." ".$cariTahun."  order by kd_gaji asc"; 


                  
                      $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                  ?>

                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>



                  <th><center>Kode Gaji</center></th>
                  <th><center>Gaji Bulan</center></th>


                  <th><center>Gaji Pokok</center></th>
                  <th><center>Tunjangan Jabatan</center></th>
                  <th><center>Premi Hadir</center></th>
                  <th><center>Tunjangan Konsumsi</center></th>

                  <th><center>Tunjangan Jamsostek Tenaga Kerja</center></th>
                  <th><center>Uang Lembur</center></th>

                  <th><center>Take Home Pay</center></th>




                   
                        <th><center>Tools</center></th>
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
                    <tbody>
                    <tr>
                      
                      <td><center><?php echo $data['kd_gaji']; ?></center></td>
                      <td><center>
                      <B>
                      
                      <a title="Detail Gaji" href="
                       detail-gaji.php?hal=show&kd=<?php echo $_GET['kd'];?>&kd_gaji=<?php echo $data['kd_gaji'];?>">
                      <?php echo $data['gaji_bulan']." - ".$data['gaji_tahun']; ?>
                      </a>
                      
                      </B>
                      </center></td>
                      <td><center>Rp. <?php echo number_format($data['gaji_pokok'],2,",",".");?></center></td>
                      
                      <td><center>Rp. <?php echo number_format($data['tunjangan'],2,",",".");?></center></td>
                      <td><center>Rp. <?php echo number_format($data['premi_hadir'],2,",",".");?></center></td>
                      <td><center>Rp. <?php echo number_format($data['tunjangan_konsumsi'],2,",",".");?></center></td>
                      <td><center>Rp. <?php echo number_format($data['tunjangan_jamsostek'],2,",",".");?></center></td>
                      <td><center>Rp. <?php echo number_format($data['uang_lembur'],2,",",".");?></center></td>
                      <td><center>Rp. <?php echo number_format($data['take_home_pay'],2,",",".");?></center></td>
                      <td><center>

                      <div id="thanks">
                      <a class="btn btn-sm btn-success" data-placement="bottom" data-toggle="tooltip" title="Detail Gaji" href="
                       detail-gaji.php?hal=show&kd=<?php echo $_GET['kd'];?>&kd_gaji=<?php echo $data['kd_gaji'];?>"><span class="glyphicon glyphicon-folder-open"></span></a>  

                      <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Gaji" href="edit-gaji-karyawan.php?&kd=<?php echo $_GET['kd'];?>&kd_gaji=<?php echo $data['kd_gaji'];?>"><span class="glyphicon glyphicon-edit"></span></a>  


                      <a onclick="return confirm ('Yakin hapus data?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Gaji" href="manajemen-gaji-karyawan.php?hal=hapus&kd=<?php echo $_GET['kd'];?>&kd_gaji=<?php echo 
                      $data['kd_gaji'];?>"><span class="glyphicon glyphicon-trash"></a></center></td></tr></div>


                    
                      
                    
                    </tr>
                    </div>
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


        <script src="../dist/jquery.js"></script>
        <script src="../dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/jquery-ui.core.js" type="text/javascript"></script>
        
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="../js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="../js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="../js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="../js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="../js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="../js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="../js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="../js/AdminLTE/dashboard.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="../js/AdminLTE/demo.js" type="text/javascript"></script>
        
    </body>
</html>

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
        <header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <img src="../img/logo.png" style="margin-top:5px">

            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        
                        <li class="dropdown user user-menu">
                            
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            
                                <i class="glyphicon glyphicon-user"></i>

                                <span><?php echo $_SESSION['fullname']; ?> <i class="caret"></i></span>
                            </a>

                            <ul class="dropdown-menu">
                                <!-- User image -->
                                
                                <li class="user-header bg-black">
                                    <img src="<?php echo $_SESSION['gambar']; ?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $_SESSION['fullname']; ?>
                                    
                                    </p>
                                </li>
                                <?php
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
                                <!-- Small Menu -->
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
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                           <br>
                            <img src="<?php echo $_SESSION['gambar']; ?>" class="img-circle" alt="User Image" style="border: 2px solid #3C8DBC;" />
                        </div>
                        <div class="pull-left info">
                        <br>
                            <p>Selamat Datang,<br /><?php echo $_SESSION['fullname']; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <?php include "menu.php"; ?>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Gaji
                        <small>Aplikasi Penggajian Karyawan</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Gaji</a></li>
                        <li class="active">Detail Gaji</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

           <!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <?php
            $query = mysqli_query($koneksi, "SELECT *                                           
                                             FROM gajian inner join karyawan on gajian.nik = karyawan.nik
                                             WHERE kd_gaji='$_GET[kd_gaji]'");
            $data  = mysqli_fetch_array($query);
            ?>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Detail Gaji Karyawan </h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
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
                      <td>Status</td></td>
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
                      <div class="text-right">
                   <a class="btn btn-sm btn-warning" data-placement="bottom" data-toggle="tooltip" title="Save Gaji as PDF" href="print-detail-gaji.php?hal=edit&kd=<?php echo $data['nik'];?>&kd_gaji=<?php echo $data['kd_gaji'];?>"><span class="glyphicon glyphicon-floppy-disk"></span></a> 

                   <a class="btn btn-sm btn-warning" data-placement="bottom" data-toggle="tooltip" title="Print Gaji" href="perintah-print-detail-gaji.php?hal=edit&kd=<?php echo $data['nik'];?>&kd_gaji=<?php echo $data['kd_gaji'];?>"><span class="glyphicon glyphicon-print"></span></a> 

<a href="manajemen-gaji-karyawan.php?kd=<?php echo $_GET['kd']; ?>" class="btn btn-sm btn-warning">
                  Kembali <i class="fa fa-arrow-circle-right"></i></a>
              
                </div>
                  </div>
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

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
                Admin APeK
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
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo $_SESSION['gambar']; ?>" class="img-circle" alt="User Image" style="border: 2px solid #3C8DBC;" />
                        </div>
                        <div class="pull-left info">
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
                        <li class="active">Input Gaji</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<?php
			if(isset($_POST['input'])){
				$kd_gaji	    = $_POST['kd_gaji'];
				$nik		    = $_POST['nik'];
				$gaji_bulan	    = $_POST['gaji_bulan'];
				$gaji_tahun     = $_POST['gaji_tahun'];
                $tgl_transfer   = $_POST['tgl_transfer'];
                $absensi        = $_POST['absensi'];
                $sakit          = $_POST['sakit'];
                $cuti           = $_POST['cuti'];
                $no_rek         = $_POST['no_rek'];
                $gaji           = $_POST['gaji'];
                $tunjangan      = $_POST['tunjangan'];
                $uang_makan     = $_POST['uang_makan'];
                $uang_transport = $_POST['uang_transport'];
                $thr            = $_POST['thr'];
                $total          = $_POST['total'];
				
				$cek = mysqli_query($koneksi, "SELECT * FROM gajian WHERE kd_gaji='$kd_gaji'");
				if(mysqli_num_rows($cek) == 0){
						$insert = mysqli_query($koneksi, "INSERT INTO gajian (kd_gaji, nik, gaji_bulan, gaji_tahun, tgl_transfer, absensi, sakit, cuti, no_rek, gaji, tunjangan, uang_makan, uang_transport, thr, total)
															              VALUES('$kd_gaji', '$nik', '$gaji_bulan', '$gaji_tahun', '$tgl_transfer', '$absensi', '$sakit', '$cuti', '$no_rek', '$gaji', '$tunjangan', '$uang_makan', '$uang_transport', '$thr', '$total')") or die(mysqli_error());
						if($insert){
							echo "<script>alert('Data Gaji Karyawan Berhasil dimasukan!'); window.location = 'gaji.php'</script>";
						}else{ 
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gaji Gagal Di simpan !</div>';
						}
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Kode Sudah Ada..!</div>';
				}
			}
			?>
           <!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Input Data Departement </h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="input-gaji.php" method="post" enctype="multipart/form-data" name="transfer" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kode Gaji</label>
                              <div class="col-sm-8">
                                  <input name="kd_gaji" type="text" id="kd_gaji" class="form-control" autocomplete="off" placeholder="Tidak Perlu Di Isi" readonly="readonly" />
                              </div>
                          </div>
                          <?php
                          $kode = $_GET['kode'];
                    $query1="select * from karyawan where nik='$kode'";
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    while($data=mysqli_fetch_array($tampil))
                    {
                    ?>
                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nik</label>
                              <div class="col-sm-8">
                                  <input name="nik" type="text" id="nik" value="<?php echo $data['nik']; ?>" class="form-control" autocomplete="off" readonly="readonly" />
                              </div>
                          </div> 
                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                              <div class="col-sm-8">
                                  <input name="" type="text" id="" value="<?php echo $data['nama']; ?>" class="form-control" autocomplete="off" readonly="readonly" />
                              </div>
                          </div> <?php } ?>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Gaji Bulan</label>
                              <div class="col-sm-3">
                            <select name="gaji_bulan" class="form-control" required>
							<option value=""> -- Gaji Bulan -- </option>
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
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Gaji Tahun</label>
                              <div class="col-sm-3">
                            <select name="gaji_tahun" class="form-control" required>
							<option value=""> -- Gaji Tahun -- </option>
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
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Transfer</label>
                              <div class="col-sm-10">
                                  <input name="tgl_transfer" id="tgl_transfer" class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" type="text" placeholder="Tanggal Transfer" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Absensi</label>
                              <div class="col-sm-8">
                                  <input name="absensi" type="text" id="absensi" class="form-control" autocomplete="off" autofocus="on" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" placeholder="Masukkan Jumlah Hari Hadir" required="required"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Sakit</label>
                              <div class="col-sm-8">
                                  <input name="sakit" type="text" id="sakit" class="form-control" autocomplete="off" placeholder="Masukkan 0 bila tidak ada izin sakit" required="required"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Cuti</label>
                              <div class="col-sm-8">
                                  <input name="cuti" type="text" id="cuti" class="form-control" autocomplete="off" placeholder="Masukkan 0 bila tidak ada cuti" required="required"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No Rek</label>
                              <div class="col-sm-8">
                                  <input name="no_rek" type="text" id="no_rek" class="form-control" autocomplete="off" placeholder="Nomor Rekening Karyawan" required="required"/>
                              </div>
                          </div>
                          <?php
                    $query2="select * from departemen where nik='$_GET[kode]'";
                    $tampil1=mysqli_query($koneksi, $query2) or die(mysqli_error());
                    while($data1=mysqli_fetch_array($tampil1))
                    {
                    ?>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Gaji Pokok</label>
                              <div class="col-sm-3">
                            <input name="gaji" type="text" id="gaji" class="form-control" value="<?php echo $data1['gaji_pokok']; ?>" autocomplete="off" placeholder="Gaji Pokok" autocomplete="off" required />
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tunjangan</label>
                              <div class="col-sm-3">
                            <input name="tunjangan" type="text" id="tunjangan" class="form-control" value="<?php echo $data1['tunjangan']; ?>" placeholder="Tunjangan" autocomplete="off" required />
                            </div>
                          </div>
                          <?php } ?>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Uang Makan</label>
                              <div class="col-sm-3">
                            <input name="uang_makan" type="text" id="uang_makan" class="form-control" autocomplete="off" required />
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Uang Transport</label>
                              <div class="col-sm-3">
                            <input name="uang_transport" type="text" id="uang_transport" class="form-control" autocomplete="off" required />
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">THR</label>
                              <div class="col-sm-3">
                            <input name="thr" type="text" id="thr" class="form-control" autocomplete="off" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" placeholder="THR" required />
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Take Home Pay</label>
                              <div class="col-sm-3">
                            <input name="total" type="text" id="total" class="form-control" autocomplete="off" required />
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="input" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="input-gaji1.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                      </form>
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
        <script>
	//options method for call datepicker
	$(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
	
    </script>
    
    <script type="text/javascript">
    function hitung_gaji() {
var absensi = document.transfer.absensi.value;
var gaji = document.transfer.gaji.value;
var tunjangan = document.transfer.tunjangan.value;
var uang_makan = document.transfer.uang_makan.value;
var uang_transport = document.transfer.uang_transport.value;
var thr = document.transfer.thr.value;
var total = document.transfer.total.value;

uang_makan = 10000 * absensi;
document.transfer.uang_makan.value = Math.floor( uang_makan );

uang_transport = 15000 * absensi;
document.transfer.uang_transport.value = Math.floor( uang_transport );

total =  ((gaji - tunjangan ) + (2 * tunjangan)) + (uang_makan + uang_transport) + ((thr - thr) + (1 * thr));
document.transfer.total.value = Math.floor( total);

}
</script>
        
    </body>
</html>

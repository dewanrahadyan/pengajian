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
            $kd_gaji = $_GET['kd_gaji'];
            $sql = mysqli_query($koneksi, "SELECT * FROM gajian WHERE kd_gaji='$kd_gaji'");
            if(mysqli_num_rows($sql) == 0){
                //header("Location: edit-gaji-karyawan.php");
            }else{
                $row = mysqli_fetch_assoc($sql);
            }
            if(isset($_POST['update'])){
                
                $nik= $_POST['nik'];
                $kd_gaji= $_POST['kd_gaji'];
                $gaji_bulan= $_POST['gaji_bulan'];
                $gaji_tahun= $_POST['gaji_tahun'];
                $hadir= $_POST['hadir'];
                $telat= $_POST['telat'];
                $tidak_hadir= $_POST['tidak_hadir'];
                $premi_hadir= $_POST['premi_hadir'];
                $tunjangan_konsumsi= $_POST['tunjangan_konsumsi'];
                $komisi_penjualan= $_POST['komisi_penjualan'];
                $komisi_bsc= $_POST['komisi_bsc'];
                $barang_berkomisi= $_POST['barang_berkomisi'];
                $tunjangan_jamsostek= $_POST['tunjangan_jamsostek'];
                $uang_lembur= $_POST['uang_lembur'];
                $gaji_bruto= $_POST['gaji_bruto'];
                $setor_jamsostek= $_POST['setor_jamsostek'];
                $pot_jamsostek= $_POST['pot_jamsostek'];
                $gaji_netto= $_POST['gaji_netto'];
                $pot_telat= $_POST['pot_telat'];
                $pot_tidak_hadir= $_POST['pot_tidak_hadir'];
                $pot_premi_hadir= $_POST['pot_premi_hadir'];
                $pot_itu= $_POST['pot_itu'];
                $pot_iuran_wajib= $_POST['pot_iuran_wajib'];
                $pot_iuran_sukarela= $_POST['pot_iuran_sukarela'];
                $pot_iuran_koperasi= $_POST['pot_iuran_koperasi'];
                $biaya_adm= $_POST['biaya_adm'];
                $take_home_pay= $_POST['take_home_pay'];
                
                $update = mysqli_query($koneksi, 
                    "UPDATE gajian SET 
                        gaji_bulan='$gaji_bulan', 
                        gaji_tahun='$gaji_tahun',
                        hadir='$hadir',
                        telat='$telat', 
                        tidak_hadir='$tidak_hadir',
                        premi_hadir='$'premi_hadir,
                        tunjangan_konsumsi='$'tunjangan_konsumsi,
                        komisi_penjualan='$'komisi_penjualan,
                        komisi_bsc='$'komisi_bsc,
                        barang_berkomisi='$barang_berkomisi', 
                        tunjangan_jamsostek='$tunjangan_jamsostek', 
                        uang_lembur='$uang_lembur',
                        gaji_bruto='$gaji_bruto',
                        setor_jamsostek='$setor_jamsostek',
                        pot_jamsostek='$pot_jamsostek', 
                        gaji_netto='$gaji_netto', 
                        pot_telat='$'pot_telat, 
                        pot_tidak_hadir='$pot_tidak_hadir',
                        pot_premi_hadir='$pot_premi_hadir', 
                        pot_itu='$pot_itu', 
                        pot_iuran_wajib='$pot_iuran_wajib',
                        pot_iuran_sukarela='$pot_iuran_sukarela', 
                        pot_iuran_koperasi='$pot_iuran_koperasi',
                        biaya_adm='$biaya_adm', 
                        take_home_pay='$take_home_pay'
                    WHERE kd_gaji='$kd_gaji'") or die(mysqli_error());

        echo $update;
                if($update){
                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
                }else{
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
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
                      <form class="form-horizontal style-form" action="update-gaji-karyawan.php" method="post" enctype="multipart/form-data" name="transfer" id="form1">
                          

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kode Gaji</label>
                                <div class="col-sm-3">
                                  <input name="kd_gaji" type="text" id="kd_gaji" value="<?php echo $row['kd_gaji']; ?>"class="form-control" autocomplete="off" placeholder="Tidak Perlu Di Isi" readonly="readonly" />
                                </div>
                          </div>
                          <?php
                              $kode = $_GET['kd'];

                              $query1="select * from karyawan where nik='$kode'";
                              $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                              $data=mysqli_fetch_array($tampil);
                              
                              ?>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nik</label>
                                <div class="col-sm-3">
                                  <input name="nik" type="text" id="nik" value="<?php echo $data['nik']; ?>" class="form-control" autocomplete="off" readonly="readonly" />
                                </div>
                          </div> 
                        
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                                <div class="col-sm-3">
                                  <input name="" type="text" id="" value="<?php echo $data['nama']; ?>" class="form-control" autocomplete="off" readonly="readonly" />
                                </div>
                          </div> 
                          

                          
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
                              <label class="col-sm-2 col-sm-2 control-label">Hadir</label>
                                <div class="col-sm-3">
                                  <input name="hadir" type="number" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" id="hadir" value="<?php echo $row['hadir']; ?>"class="form-control" autocomplete="off" placeholder="Masukkan jumlah hari hadir" required="required"/>
                                </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Telat</label>
                                <div class="col-sm-3">
                                  <input name="telat" type="number" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" id="telat" value="<?php echo $row['telat']; ?>" class="form-control" autocomplete="off" placeholder="Masukkan jumlah hari telat" required="required"/>
                                </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tidak Hadir</label>
                                <div class="col-sm-3">
                                  <input name="tidak_hadir" type="number" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" id="tidak_hadir" value="<?php echo $row['tidak_hadir']; ?>" class="form-control" autocomplete="off" placeholder="Masukkan jumlah hari tidak hadir" required="required"/>
                                </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Gaji Pokok</label>
                                <div class="col-sm-3">
                                  <input name="gaji_pokok" type="number" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" id="" value="<?php echo $data['gaji_pokok']; ?>" class="form-control" autocomplete="off" readonly="readonly" />
                                 
                                </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tunjangan Jabatan</label>
                                <div class="col-sm-3">
                                  <input name="tunjangan_jabatan" type="number" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" id="tunjangan_jabatan" value="<?php echo $data['tunjangan']; ?>" class="form-control" autocomplete="off" readonly="readonly" />
                                  
                                </div>

                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Premi Hadir</label>
                                <div class="col-sm-3">
                                  <input name="premi_hadir" type="number" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" id="premi_hadir" value="<?php echo $row['premi_hadir']; ?>" class="form-control" autocomplete="off" placeholder="" required="required"/>
                                </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tunjangan Konsumsi</label>
                                <div class="col-sm-3">
                                  <input name="tunjangan_konsumsi" type="number" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" id="tunjangan_konsumsi" value="<?php echo $row['tunjangan_konsumsi']; ?>" class="form-control" autocomplete="off" placeholder="" required="required"/>
                                </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Komisi Penjualan</label>
                                <div class="col-sm-3">
                                  <input name="komisi_penjualan" type="number" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" id="komisi_penjualan" value="<?php echo $row['komisi_penjualan']; ?>" class="form-control" autocomplete="off" placeholder="" required="required"/>
                                </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Komisi BSC</label>
                                <div class="col-sm-3">
                                  <input name="komisi_bsc" type="number" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" id="komisi_bsc" value="<?php echo $row['komisi_bsc']; ?>" class="form-control" autocomplete="off" placeholder="" required="required"/>
                                </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Barang Berkomisi</label>
                                <div class="col-sm-3">
                                  <input name="barang_berkomisi" type="number" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" id="barang_berkomisi" value="<?php echo $row['barang_berkomisi']; ?>" class="form-control" autocomplete="off" placeholder="" required="required"/>
                                </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tunjangan Jamsostek Tenaga Kerja</label>
                                <div class="col-sm-3">
                                  <input name="tunjangan_jamsostek" type="number" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" id="tunjangan_jamsostek" value="<?php echo $row['tunjangan_jamsostek']; ?>" class="form-control" autocomplete="off" placeholder="" required="required"/>
                                </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Uang Lembur</label>
                                <div class="col-sm-3">
                                  <input name="uang_lembur" type="number" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" id="uang_lembur" value="<?php echo $row['uang_lembur']; ?>" class="form-control" autocomplete="off" placeholder="" required="required"/>
                                </div>
                          </div>

                          <div style="width:1000px; height:2px; background-color:#FF0000;"></div><br>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Gaji Bruto</label>
                                <div class="col-sm-3">
                                  <input name="gaji_bruto" type="number" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" id="gaji_bruto" value="<?php echo $row['gaji_bruto']; ?>" class="form-control" autocomplete="off" placeholder="" readonly="true" required="required"/>
                                </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Setor ke Jamsostek Tenaga Kerja</label>
                                <div class="col-sm-3">
                                  <input name="setor_jamsostek" type="number" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" id="setor_jamsostek" value="<?php echo $row['setor_jamsostek']; ?>" class="form-control" autocomplete="off" placeholder="" required="required"/>
                                </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Potongan Jamsostek Tenaga Kerja</label>
                                <div class="col-sm-3">
                                  <input name="pot_jamsostek" type="number" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" id="pot_jamsostek" value="<?php echo $row['pot_jamsostek']; ?>" class="form-control" autocomplete="off" placeholder="" required="required"/>
                                </div>
                          </div>
                          
                          <div style="width:1000px; height:2px; background-color:#FF0000;"></div><br>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Gaji Netto</label>
                                <div class="col-sm-3">
                                  <input name="gaji_netto" type="number" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" id="gaji_netto" value="<?php echo $row['gaji_netto']; ?>" class="form-control" autocomplete="off" placeholder="" required="required" readonly="true"/>
                                </div>
                          </div>

                          

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Potongan Telat</label>
                                <div class="col-sm-3">
                                  <input name="pot_telat" type="number" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" id="pot_telat" value="<?php echo $row['pot_telat']; ?>" class="form-control" autocomplete="off" placeholder="" required="required" readonly="true"/>
                                </div>                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Potongan Tidak Hadir</label>
                                <div class="col-sm-3">
                                  <input name="pot_tidak_hadir" type="number" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" id="pot_tidak_hadir" value="<?php echo $row['pot_tidak_hadir']; ?>" class="form-control" autocomplete="off" placeholder="" required="required" readonly="true"/>
                                </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Potongan Premi Hadir</label>
                                <div class="col-sm-3">
                                  <input name="pot_premi_hadir" type="number" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" id="pot_premi_hadir" value="<?php echo $row['pot_premi_hadir']; ?>" class="form-control" autocomplete="off" placeholder="" required="required" />
                                </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Potongan ITU</label>
                                <div class="col-sm-3">
                                  <input name="pot_itu" type="number" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" id="pot_itu" value="<?php echo $row['pot_itu']; ?>" class="form-control" autocomplete="off" placeholder="" required="required"/>
                                </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Potongan Iuran Wajib</label>
                                <div class="col-sm-3">
                                  <input name="pot_iuran_wajib" type="number" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" id="pot_iuran_wajib" value="<?php echo $row['pot_iuran_wajib']; ?>" class="form-control" autocomplete="off" placeholder="" required="required"/>
                                </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Potongan Iuran Sukarela</label>
                                <div class="col-sm-3">
                                  <input name="pot_iuran_sukarela" type="number" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" id="pot_iuran_sukarela" value="<?php echo $row['pot_iuran_sukarela']; ?>" class="form-control" autocomplete="off" placeholder="" required="required"/>
                                </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Potongan Iuran Koperasi</label>
                                <div class="col-sm-3">
                                  <input name="pot_iuran_koperasi" type="number" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" id="pot_iuran_koperasi" value="<?php echo $row['pot_iuran_koperasi']; ?>" class="form-control" autocomplete="off" placeholder="" required="required"/>
                                </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Biaya Administrasi Payroll</label>
                                <div class="col-sm-3">
                                  <input name="biaya_adm" type="number" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" id="biaya_adm" value="<?php echo $row['biaya_adm']; ?>" class="form-control" autocomplete="off" placeholder="" required="required"/>
                                </div>
                          </div>

                          <div style="width:1000px; height:2px; background-color:#FF0000;"></div><br>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Take Home Pay</label>
                                <div class="col-sm-3">
                                  <input name="take_home_pay" type="number" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" id="take_home_pay" value="<?php echo $row['take_home_pay']; ?>" class="form-control" autocomplete="off" placeholder="" required="required" readonly="true"/>
                                </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="input" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="manajemen-gaji-karyawan.php?&kd=<?php echo $_GET['kd'];?>" class="btn btn-sm btn-danger">Batal </a>
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
      
var hadir =  document.transfer.hadir.value;


var gaji_pokok = document.transfer.gaji_pokok.value;
var tunjangan_jabatan = document.transfer.tunjangan_jabatan.value;
var tunjangan_konsumsi = document.transfer.tunjangan_konsumsi.value;
var premi_hadir = document.transfer.premi_hadir.value;

var komisi_penjualan = document.transfer.komisi_penjualan.value;
var komisi_bsc = document.transfer.komisi_bsc.value;
var barang_berkomisi = document.transfer.barang_berkomisi.value;
var tunjangan_jamsostek = document.transfer.tunjangan_jamsostek.value;
var uang_lembur = document.transfer.uang_lembur.value;

var gaji_bruto = parseInt(gaji_pokok) + parseInt(tunjangan_jabatan) + parseInt(tunjangan_konsumsi) + parseInt(premi_hadir) + parseInt(komisi_penjualan) + parseInt(komisi_bsc) + parseInt(barang_berkomisi) + parseInt(tunjangan_jamsostek) + parseInt(uang_lembur);
//var gaji_bruto = parseInt(gaji_pokok) + parseInt(tunjangan_jabatan)
document.transfer.gaji_bruto.value =  Math.floor( gaji_bruto );


var pot_jamsostek = document.transfer.pot_jamsostek.value;
var setor_jamsostek = document.transfer.setor_jamsostek.value;

var gaji_netto =  parseInt(gaji_bruto) - parseInt(setor_jamsostek) - parseInt(pot_jamsostek);
document.transfer.gaji_netto.value =  Math.floor( gaji_netto );




var telat = document.transfer.telat.value;
var tidak_hadir = document.transfer.tidak_hadir.value;

var pot_telat = telat * 7500;
document.transfer.pot_telat.value = Math.floor( pot_telat );


var pot_tidak_hadir = tidak_hadir * 107500
document.transfer.pot_tidak_hadir.value = Math.floor( pot_tidak_hadir );


//var thr = document.transfer.thr.value;
//var total = document.transfer.total.value;

tunjangan_konsumsi = 10000 * hadir;
document.transfer.tunjangan_konsumsi.value = Math.floor( tunjangan_konsumsi );

premi_hadir = 15000 * hadir;
document.transfer.premi_hadir.value = Math.floor( premi_hadir );



var pot_premi_hadir= document.transfer.pot_premi_hadir.value; 
var pot_itu= document.transfer.pot_itu.value; 
var pot_iuran_wajib= document.transfer.pot_iuran_wajib.value;
var pot_iuran_sukarela= document.transfer.pot_iuran_sukarela.value;
var pot_iuran_koperasi= document.transfer.pot_iuran_koperasi.value;
var biaya_adm= document.transfer.biaya_adm.value;

var take_home_pay = parseInt(gaji_netto) -  parseInt(pot_telat) - parseInt(pot_tidak_hadir) -parseInt(pot_premi_hadir) -parseInt(pot_itu) -parseInt(pot_iuran_wajib) -parseInt(pot_iuran_sukarela) -parseInt(pot_iuran_koperasi) -parseInt(biaya_adm);

document.transfer.take_home_pay.value = Math.floor( take_home_pay);







//alert(premi_hadir);
//total =  ((gaji_pokok - tunjangan_jabatan ) + (2 * tunjangan_jabatan)) + (uang_makan + uang_transport) + ((thr - thr) + (1 * thr));
//document.transfer.total.value = Math.floor( total);

}
</script>
        
    </body>
</html>

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
        
                                <?php
                                include "header.php";
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
                        Gaji
                        <small>Aplikasi Penggajian Karyawan</small>
                    </h1>
             <?php
             if(isset($_GET['hal']) == 'hapus'){
				$kd_gaji = $_GET['kd'];
				$cek = mysqli_query($koneksi, "SELECT * FROM gajian WHERE kd_gaji='$kd_gaji'");
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
                        <li><a href="#"><i class="fa fa-dashboard"></i> Gaji</a></li>
                        <li class="active">Data Gaji</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                    
              <div class="col-lg-4">
              <form action='gaji.php' method="POST">
          
	       <input type='text' class="form-control" style="margin-bottom: 4px;" name='qcari' placeholder='Cari berdasarkan Nama & NIK' required /> 
          
           <select name="qDepartemen" class="form-control" style="margin-bottom: 4px;">
              <option value=""> -- Pilih Departement -- </option>
              <option value="Warehouse">Warehouse</option>
              <option value="Purchasing">Purchasing</option>
              <option value="Accounting">Accounting</option>
              <option value="IT">IT</option>
              <option value="Production">Production</option>
              <option value="PPIC">PPIC</option>
              <option value="QC">QC</option>
              <option value="QA">QA</option>
              <option value="Exim">Exim</option>
              <option value="HRD / GA"> HRD / GA</option>
              <option value="Marketing">Marketing</option>
              <option value="Lainnya">Lainnya</option>
            </select>

            
                              <!--label class="col-sm-2 col-sm-2 control-label">Tanggal Transfer</label-->
                              
                                  <input name="tgl_transfer" id="tgl_transfer" class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" type="text" placeholder="Tanggal Transfer" required />
                              
            


            
            <input type='submit' value='Cari Data' class="btn btn-sm btn-primary" /> 
           
           <a href='gaji.php' class="btn btn-sm btn-success" >Refresh</i></a>
          	</div>
              </div>
           <!-- /.row -->
                    <br />
                    <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Klik NIP untuk lihat detail gaji.!!
          </div>
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Data Gaji Karyawan </h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                    <?php
                    $query1="select * from gajian inner join karyawan on gajian.nik = karyawan.nik limit 40";
                    
                    if(isset($_POST['qcari'])){
	               $qcari=$_POST['qcari'];
                   $qDepartemen=$_POST['qDepartemen'];
	               $query1="SELECT * FROM  gajian 

                   INNER JOIN karyawan on gajian.nik = karyawan.nik 
                   INNER JOIN departement on karyawan.nik = departement.nik 
                   
                   where gajian.nik like '%$qcari%' 
	               
                   or karyawan.nama like '%$qcari%'  

                   or departement.departement like '%$qDepartemen%'  

                   ";
                    
                    }
                    
                    $tampil=mysqli_query($koneksi, $query1) or die (mysqli_error());
                    ?>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nik </i></center></th>
                        <th><center>Nama</i></center></th>
                        <th><center>Bulan </center></th>
                        <th><center>Tahun </center></th>
                        <th><center>Transfer </center></th>
                        <th><center>Total Gaji</center></th>
                        <th><center>Tools</center></th>
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
                    <tbody>
                    <tr>
                    <td><center><?php echo $no; ?></center></td>
                    <td><center><a href="detail-gaji.php?hal=edit&kd=<?php echo $data['nik'];?>"><span class="glyphicon glyphicon-user"></span> <?php echo $data['nik'];?></center></td>
                    <td><center><?php echo $data['nama']; ?></center></td>
                    <td><center><?php echo $data['gaji_bulan']; ?></center></td>
                    <td><center><?php echo $data['gaji_tahun']; ?></center></td>
                    <td><center><?php echo $data['tgl_transfer']; ?></center></td>
                    <td><center>Rp. <?php echo number_format($data['total'],2,",",".");?></center></td>
                    <td><center><div id="thanks"><a class="btn btn-sm btn-warning" data-placement="bottom" data-toggle="tooltip" title="Cetak Gaji" href="cetak-gaji.php?hal=edit&kd=<?php echo $data['nik'];?>"><span class="glyphicon glyphicon-print"></span></a>  
                    <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Gaji" href="edit-gaji.php?hal=edit&kd_gaji=<?php echo $data['kd_gaji'];?>"><span class="glyphicon glyphicon-edit"></span></a>  
                    <a onclick="return confirm ('Yakin hapus <?php echo $data['nik'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Gaji" href="gaji.php?hal=hapus&kd=<?php echo $data['kd_gaji'];?>"><span class="glyphicon glyphicon-trash"></a></center></td></tr></div>
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>
                  <!-- </div>-->
                <div class="text-right">
                  <a href="input-gaji1.php" class="btn btn-sm btn-info">Input Gaji Karyawan &raquo;</a>
              
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
        
        <!-- daterangepicker -->
        <script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="../js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>

          <script>
    //options method for call datepicker
    $(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
    
    </script>


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

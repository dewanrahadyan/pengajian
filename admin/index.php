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
        <link href="../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <?php include "header.php";?>
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
        <div class="wrapper row-offcanvas row-offcanvas-left" >
            <!-- Left side column. contains the logo and sidebar -->
            <?php include "sidebar.php" ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Aplikasi Penggajian Karyawan</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-4 col-xs-6">
                            <!-- small box -->
                            <?php $tampil=mysqli_query($koneksi, "select * from karyawan order by nik desc");
                        $total=mysqli_num_rows($tampil);
                    ?>
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php echo "$total"; ?>
                                    </h3>
                                    <p>
                                       Jumlah Karyawan
                                    </p>
                                </div>
                                <div class="icon">
                                    <span class="glyphicon glyphicon-user"></span>
                                </div>
                                <a href="karyawan.php" class="small-box-footer">
                                    Lihat Detail Karyawan <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <!--div class="col-lg-3 col-xs-6">
                            
                            <?php $tampil1=mysqli_query($koneksi, "select * from departemen order by kd_dept desc");
                        $dept=mysqli_num_rows($tampil1);
                    ?>
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <?php echo "$dept"; ?> 
                                    </h3>
                                    <p>
                                        Departement
                                    </p>
                                </div>
                                <div class="icon">
                                    <span class="glyphicon glyphicon-home"></span>
                                </div>
                                <a href="department.php" class="small-box-footer">
                                    Lihat Detail Departement <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div-->
                        <div class="col-lg-4 col-xs-6">
                            <!-- small box -->
                            <?php $tampil2=mysqli_query($koneksi, "select * from gajian order by kd_gaji desc");
                        $pel=mysqli_num_rows($tampil2);
                    ?>
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <?php echo "$pel"; ?> 
                                    </h3>
                                    <p>
                                        Gaji
                                    </p>
                                </div>
                                <div class="icon">
                                    <span class="glyphicon glyphicon-list"></span>
                                </div>
                                <a href="gaji.php" class="small-box-footer">
                                    Lihat Detail Gaji <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-4 col-xs-6">
                        <?php $tampil3=mysqli_query($koneksi, "select * from user order by user_id desc");
                        $user=mysqli_num_rows($tampil3);
                    ?>
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                       <?php echo "$user"; ?>
                                    </h3>
                                    <p>
                                        Admin
                                    </p>
                                </div>
                                <div class="icon">
                                    <span class="glyphicon glyphicon-dashboard"></span>
                                </div>
                                <a href="admin.php" class="small-box-footer">
                                    Lihat Detail Admin <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->
<br /><br />
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-7 connectedSortable">                            


                            <div class="panel panel-default">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Data Karyawan </h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                    <?php
                    $query1="select * from karyawan order by nik DESC limit 5";
                    $hasil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nik </center></th>
                        <th><center>Nama</i></center></th>
                        <th><center>No Hp </center></th>
                        <th><center>Status </center></th>
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($hasil))
                    { $no++; ?>
                    <tbody>
                    <td><center><?php echo $no; ?></center></td>
                    <td><center><?php echo $data['nik'];?></center></td>
                    <td><a href="detail-karyawan.php?hal=edit&kd=<?php echo $data['nik'];?>"><span class="glyphicon glyphicon-user"></span> <?php echo $data['nama'];?></td>
                    <td><center><?php echo $data['no_hp']; ?></center></td>
                    <td><center><?php
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
                    
                    ?></center></td>
                    </tr></div>
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>
                  <!-- </div>-->
                <div class="text-right">
                  <a href="karyawan.php" class="btn btn-sm btn-primary">Menu Karyawan<i class="fa fa-arrow-circle-right"></i></a>
              
                </div>
              </div> 
              </div>


                        </section><!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-5 connectedSortable"> 
                        <?php
                                                $tampil=mysqli_query($koneksi, "select * from karyawan order by nik desc limit 1");
                                                while($data2=mysqli_fetch_array($tampil)){
                                                ?>
                                                    <div class="alert alert-block alert-danger">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <strong><?php echo $data2['nama'];?></strong>, Merupakan Karyawan Terbaru di perusahaan.
                                                    </div>
                                                    <?php } ?>
                                                    
                                                     <?php
                                                $tampil1=mysqli_query($koneksi, "select * from user order by user_id desc limit 1");
                                                while($data3=mysqli_fetch_array($tampil1)){
                                                ?>
                                                    <div class="alert alert-block alert-success">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <strong><?php echo $data3['fullname'];?></strong>, Merupakan Admin Aplikasi yang baru.
                                                    </div>
                                                    <?php } ?>
                                                    
                                                    <?php
                                                $tampil2=mysqli_query($koneksi, "select * from departemen order by kd_dept desc limit 1");
                                                while($data4=mysqli_fetch_array($tampil2)){
                                                ?>
                                                    <div class="alert alert-block alert-info">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <strong>Nik <?php echo $data4['nik'];?></strong>, Merupakan bagian dari departement <strong><?php echo $data4['departemen'];?></strong>
                                                    </div>
                                                    <?php } ?>
                                                    
                                                    <?php
                                                $tampil3=mysqli_query($koneksi, "select * from gajian order by kd_gaji desc limit 1");
                                                while($data5=mysqli_fetch_array($tampil3)){
                                                ?>
                                                    <div class="alert alert-block alert-warning">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        Gaji Bulan <strong><?php echo $data5['gaji_bulan'];?></strong>, Telah di transfer tanggal <strong><?php echo $data5['tgl_transfer'];?></strong>
                                                    </div>
                                                    <?php } ?>
                                                    
                     <!--   <div class="panel panel-default">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Data Admin </h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                    <?php
                    //$query2="select * from user order by user_id desc limit 5";
                    //$hasil1=mysqli_query($koneksi, $query2) or die(mysqli_error());
                    ?>
                  <!-- <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Fullname </center></th>
                        <th><center>level </center></th>
                      </tr>
                  </thead>
                     <?php 
                    // $no=0;
                     //while($data1=mysqli_fetch_array($hasil1))
                    //{ $no++; ?>
                    <tbody>
                    <tr>
                    <td><center><?php //echo $no; ?></center></td>
                    <td><center><a href="detail-admin.php?hal=edit&kd=<?php //echo $data1['user_id'];?>"><span class="glyphicon glyphicon-user"></span> <?php echo $data1['fullname']; ?></a></center></td>
                    <td><center><?php 
                           /** if($data1['level'] == 'admin'){
								echo '<span class="label label-success">Admin</span>';
							}
                            else if ($data1['level'] == 'superuser' ){
								echo '<span class="label label-primary">Super User</span>';
							}
                            else if ($data1['level'] == 'user' ){
								echo '<span class="label label-info">User</span>';
							} **/
                             ?></center></td>
                    </tr></div>
                 <?php   
              //} 
              ?>
                   </tbody>
                   </table>
                  <!-- </div>-->
               <!-- <div class="text-right">
                  <a href="admin.php" class="btn btn-sm btn-info">Menu Admin <i class="fa fa-arrow-circle-right"></i></a>
              
                </div>
              </div> -->
                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


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

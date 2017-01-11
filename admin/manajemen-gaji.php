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

				$cek = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nik='$nik' ");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM karyawan WHERE nik='$nik'");
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
              <form action='manajemen-gaji.php' method="GET">
          
	       <input type='text' class="form-control" style="margin-bottom: 4px;" name='qNik' placeholder='Cari berdasarkan Nik '  /> 
           <input type='text' class="form-control" style="margin-bottom: 4px;" name='qNama' placeholder='Cari  Nama '  />
           
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
            <input type='submit' value='Cari Data' class="btn btn-sm btn-primary" /> <a href='manajemen-gaji.php' class="btn btn-sm btn-success" >

           Refresh</i></a>
          	</div>
              </div>
           <!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Data Karyawan </h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                  
                  <?php
                   
                   $cariNIK=NULL;
                   $cariNama=NULL;
                   $cariDepartemen=NULL;
                   $cariBulan=NULL;
                   $cariTahun=NULL;
                   $whereis=NULL;

                   
                    
                    if((!empty($_GET["qNik"])) or (!empty($_GET["qNama"])) or (!empty($_GET["qDepartemen"]))     )
                    {
                        $whereis=" where ";
                        $qNik=  $_GET['qNik'];
                        $qNama= $_GET['qNama'];
                        $qDepartemen= $_GET['qDepartemen'];
                      

                           if(!empty($_GET["qNik"]) )
                             {

                              $cariNIK = "nik = '$qNik'";
                             }
                           if(!empty($_GET["qNama"]) )
                             {
                                  $hubung1 = "";
                                  if(!empty($_GET["qNik"]) )
                                      {$hubung1 = "or";}

                                  $cariNama = " ".$hubung1." nama like '%$qNama%'";     
                             }
                           if(!empty($_GET["qDepartemen"]) )
                             {
                                  $hubung2 = "";
                                  if((!empty($_GET["qNik"]) )or(!empty($_GET["qNama"]) ))
                                      {$hubung2 = "or";}
                                  $cariDepartemen = " ".$hubung2." departemen like '%$qDepartemen%'";     
                             }
                          if(!empty($_GET["qBulan"]) )
                             {
                                  $hubung3 = "";
                                  if((!empty($_GET["qNik"]) )or(!empty($_GET["qNama"]) ) or(!empty($_GET["qDepartemen"]) ))
                                      {$hubung3 = "or";}
                                  $cariBulan = " ".$hubung3." bulan like '%$qDepartemen%'";     
                             }  

                    }

                 //  $caridepartemen = $_GET['caridepartemen'];
	               //$query1="SELECT * FROM karyawan 
	               //where nik like '%$qcari%'
	               //or nama like '%$qcari%'  ";
                    
                      $query1="select * from karyawan   ".$whereis."  ".$cariNIK."  ".$cariNama." ".$cariDepartemen;
                  
                      $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                  ?>

                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nik </i></center></th>
                        <th><center>Nama </center></th>
                        <th><center>Departemen </center></th>                       
                        <th><center>Input Gaji Terakhir</center></th>
                        <th><center>Tools</center></th>
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
                    <tbody>
                    <?php 

                     

                      $input_terakhir="select gaji_bulan,gaji_tahun from gajian where nik = ".$data['nik']." order by kd_gaji desc";
                      $tampil2=mysqli_query($koneksi, $input_terakhir) or die(mysqli_error());
                      $data2=mysqli_fetch_array($tampil2);

                      if((!empty($_GET["qBulan"])) or (!empty($_GET["qTahun"]))      )
                      { 


                          if( ($_GET["qBulan"] == $data2['gaji_bulan']) or ( $_GET["qTahun"] == $data2['gaji_tahun']  ))
                        {
                    ?>
                    <tr>
                      <td><center><?php echo $no; ?></center></td>
                      <td><center><?php echo $data['nik'];?></center></td>

                      <td><a href="detail-karyawan.php?hal=edit&kd=<?php echo $data['nik'];?>"><span class="glyphicon glyphicon-user"></span> <?php echo $data['nama'];?></td>
                      <td><center><?php echo $data['departemen']; ?></center></td>
                      <td><center> <?php echo $data2['gaji_bulan']." ".$data2['gaji_tahun']; ?> </center></td>
                       
                      <td><center>
                      <div id="thanks">
                      <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Manajemen Gaji Karyawan <?php echo $data['nama'];?>" href="manajemen-gaji-karyawan.php?&kd=<?php echo $data['nik'];?>">Show <span class="glyphicon glyphicon-edit"></span></a>

                      </center>
                      </td>
                    </tr>
                    
                    <?php 
                    }
                    else
                    {}
                    //penutup search tanggal tahun ke1 if((!empty($_GET["qBulan"])) or (!empty($_GET["qTahun"]))      )

                    }//penutup search tanggal tahun ke2  if( ($data2['gaji_bulan'] == $_GET["qBulan"])or ($data2['gaji_tahun'] == $_GET["qTulan"]) )
                    else

                    {?>

<tr>
                      <td><center><?php echo $no; ?></center></td>
                      <td><center><?php echo $data['nik'];?></center></td>

                      <td><a href="detail-karyawan.php?hal=edit&kd=<?php echo $data['nik'];?>"><span class="glyphicon glyphicon-user"></span> <?php echo $data['nama'];?></td>
                      <td><center><?php echo $data['departemen']; ?></center></td>
                      <td><center> <?php echo $data2['gaji_bulan']." ".$data2['gaji_tahun']; ?> </center></td>
                       
                      <td><center>
                      <div id="thanks">
                      <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Manajemen Gaji Karyawan <?php echo $data['nama'];?>" href="manajemen-gaji-karyawan.php?&kd=<?php echo $data['nik'];?>">Show <span class="glyphicon glyphicon-edit"></span></a>

                      </center>
                      </td>
                    </tr>
<?php
                    }
                    }
                    ?>
                    </div>
            
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

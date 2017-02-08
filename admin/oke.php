<?php 
 include "../conn.php";
   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Laporan Data Karyawan</title>
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
                        <small align="center">Data Karyawan</small>
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
                   
                   $cariNIK=NULL;
                   $cariNama=NULL;
                   $cariDepartemen=NULL;
                   $whereis=NULL;


                     $query1="select * from karyawan where departemen = 'Warehouse' " ;
                  

                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>


                  <table id="example" class="table table-hover table-bordered" border="1">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nik </i></center></th>
                        <th><center>Nama </center></th>
                        <th><center>Alamat </center></th>
                        <th><center>Gender </center></th>
                        <th><center>No HP </center></th>
                        <th><center>Departemen </center></th>
                        <th><center>Status </center></th>
                        <th><center>Gaji Pokok </center></th>
                        <th><center>Tunjangan Jabatan </center></th>

                        
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
                    <td><?php echo $data['alamat']; ?></td>
                    <td><center><?php if($data['gender']==0){echo "Laki-laki";}else{echo "Perempuan";} ?></center></td>
                    <td><center><?php echo $data['no_hp']; ?></center></td>
                    <td><center><?php echo $data['departemen']; ?></center></td>
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
                    <td><center><?php echo $data['gaji_pokok'];?></center></td>
                    <td><center><?php echo $data['tunjangan'];?></center></td>
                   

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
                   
                   $cariNIK=NULL;
                   $cariNama=NULL;
                   $cariDepartemen=NULL;
                   $whereis=NULL;


                     $query1="select * from karyawan where departemen = 'Purchasing' " ;
                  

                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>


                  <table id="example" class="table table-hover table-bordered" border="1">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nik </i></center></th>
                        <th><center>Nama </center></th>
                        <th><center>Alamat </center></th>
                        <th><center>Gender </center></th>
                        <th><center>No HP </center></th>
                        <th><center>Departemen </center></th>
                        <th><center>Status </center></th>
                        <th><center>Gaji Pokok </center></th>
                        <th><center>Tunjangan Jabatan </center></th>

                        
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
                    <td><?php echo $data['alamat']; ?></td>
                    <td><center><?php if($data['gender']==0){echo "Laki-laki";}else{echo "Perempuan";} ?></center></td>
                    <td><center><?php echo $data['no_hp']; ?></center></td>
                    <td><center><?php echo $data['departemen']; ?></center></td>
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
                    <td><center><?php echo $data['gaji_pokok'];?></center></td>
                    <td><center><?php echo $data['tunjangan'];?></center></td>
                   

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
                   
                   $cariNIK=NULL;
                   $cariNama=NULL;
                   $cariDepartemen=NULL;
                   $whereis=NULL;


                     $query1="select * from karyawan where departemen = 'Accounting' " ;
                  

                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>


                  <table id="example" class="table table-hover table-bordered" border="1">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nik </i></center></th>
                        <th><center>Nama </center></th>
                        <th><center>Alamat </center></th>
                        <th><center>Gender </center></th>
                        <th><center>No HP </center></th>
                        <th><center>Departemen </center></th>
                        <th><center>Status </center></th>
                        <th><center>Gaji Pokok </center></th>
                        <th><center>Tunjangan Jabatan </center></th>

                        
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
                    <td><?php echo $data['alamat']; ?></td>
                    <td><center><?php if($data['gender']==0){echo "Laki-laki";}else{echo "Perempuan";} ?></center></td>
                    <td><center><?php echo $data['no_hp']; ?></center></td>
                    <td><center><?php echo $data['departemen']; ?></center></td>
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
                    <td><center><?php echo $data['gaji_pokok'];?></center></td>
                    <td><center><?php echo $data['tunjangan'];?></center></td>
                   

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
                   
                   $cariNIK=NULL;
                   $cariNama=NULL;
                   $cariDepartemen=NULL;
                   $whereis=NULL;


                     $query1="select * from karyawan where departemen = 'IT' " ;
                  

                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>


                  <table id="example" class="table table-hover table-bordered" border="1">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nik </i></center></th>
                        <th><center>Nama </center></th>
                        <th><center>Alamat </center></th>
                        <th><center>Gender </center></th>
                        <th><center>No HP </center></th>
                        <th><center>Departemen </center></th>
                        <th><center>Status </center></th>
                        <th><center>Gaji Pokok </center></th>
                        <th><center>Tunjangan Jabatan </center></th>

                        
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
                    <td><?php echo $data['alamat']; ?></td>
                    <td><center><?php if($data['gender']==0){echo "Laki-laki";}else{echo "Perempuan";} ?></center></td>
                    <td><center><?php echo $data['no_hp']; ?></center></td>
                    <td><center><?php echo $data['departemen']; ?></center></td>
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
                    <td><center><?php echo $data['gaji_pokok'];?></center></td>
                    <td><center><?php echo $data['tunjangan'];?></center></td>
                   

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
                   
                   $cariNIK=NULL;
                   $cariNama=NULL;
                   $cariDepartemen=NULL;
                   $whereis=NULL;


                     $query1="select * from karyawan where departemen = 'Production' " ;
                  

                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>


                  <table id="example" class="table table-hover table-bordered" border="1">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nik </i></center></th>
                        <th><center>Nama </center></th>
                        <th><center>Alamat </center></th>
                        <th><center>Gender </center></th>
                        <th><center>No HP </center></th>
                        <th><center>Departemen </center></th>
                        <th><center>Status </center></th>
                        <th><center>Gaji Pokok </center></th>
                        <th><center>Tunjangan Jabatan </center></th>

                        
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
                    <td><?php echo $data['alamat']; ?></td>
                    <td><center><?php if($data['gender']==0){echo "Laki-laki";}else{echo "Perempuan";} ?></center></td>
                    <td><center><?php echo $data['no_hp']; ?></center></td>
                    <td><center><?php echo $data['departemen']; ?></center></td>
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
                    <td><center><?php echo $data['gaji_pokok'];?></center></td>
                    <td><center><?php echo $data['tunjangan'];?></center></td>
                   

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
                   
                   $cariNIK=NULL;
                   $cariNama=NULL;
                   $cariDepartemen=NULL;
                   $whereis=NULL;


                     $query1="select * from karyawan where departemen = 'PPIC' " ;
                  

                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>


                  <table id="example" class="table table-hover table-bordered" border="1">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nik </i></center></th>
                        <th><center>Nama </center></th>
                        <th><center>Alamat </center></th>
                        <th><center>Gender </center></th>
                        <th><center>No HP </center></th>
                        <th><center>Departemen </center></th>
                        <th><center>Status </center></th>
                        <th><center>Gaji Pokok </center></th>
                        <th><center>Tunjangan Jabatan </center></th>

                        
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
                    <td><?php echo $data['alamat']; ?></td>
                    <td><center><?php if($data['gender']==0){echo "Laki-laki";}else{echo "Perempuan";} ?></center></td>
                    <td><center><?php echo $data['no_hp']; ?></center></td>
                    <td><center><?php echo $data['departemen']; ?></center></td>
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
                    <td><center><?php echo $data['gaji_pokok'];?></center></td>
                    <td><center><?php echo $data['tunjangan'];?></center></td>
                   

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
                   
                   $cariNIK=NULL;
                   $cariNama=NULL;
                   $cariDepartemen=NULL;
                   $whereis=NULL;


                     $query1="select * from karyawan where departemen = 'QC' " ;
                  

                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>


                  <table id="example" class="table table-hover table-bordered" border="1">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nik </i></center></th>
                        <th><center>Nama </center></th>
                        <th><center>Alamat </center></th>
                        <th><center>Gender </center></th>
                        <th><center>No HP </center></th>
                        <th><center>Departemen </center></th>
                        <th><center>Status </center></th>
                        <th><center>Gaji Pokok </center></th>
                        <th><center>Tunjangan Jabatan </center></th>

                        
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
                    <td><?php echo $data['alamat']; ?></td>
                    <td><center><?php if($data['gender']==0){echo "Laki-laki";}else{echo "Perempuan";} ?></center></td>
                    <td><center><?php echo $data['no_hp']; ?></center></td>
                    <td><center><?php echo $data['departemen']; ?></center></td>
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
                    <td><center><?php echo $data['gaji_pokok'];?></center></td>
                    <td><center><?php echo $data['tunjangan'];?></center></td>
                   

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
                   
                   $cariNIK=NULL;
                   $cariNama=NULL;
                   $cariDepartemen=NULL;
                   $whereis=NULL;


                     $query1="select * from karyawan where departemen = 'QA' " ;
                  

                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>


                  <table id="example" class="table table-hover table-bordered" border="1">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nik </i></center></th>
                        <th><center>Nama </center></th>
                        <th><center>Alamat </center></th>
                        <th><center>Gender </center></th>
                        <th><center>No HP </center></th>
                        <th><center>Departemen </center></th>
                        <th><center>Status </center></th>
                        <th><center>Gaji Pokok </center></th>
                        <th><center>Tunjangan Jabatan </center></th>

                        
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
                    <td><?php echo $data['alamat']; ?></td>
                    <td><center><?php if($data['gender']==0){echo "Laki-laki";}else{echo "Perempuan";} ?></center></td>
                    <td><center><?php echo $data['no_hp']; ?></center></td>
                    <td><center><?php echo $data['departemen']; ?></center></td>
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
                    <td><center><?php echo $data['gaji_pokok'];?></center></td>
                    <td><center><?php echo $data['tunjangan'];?></center></td>
                   

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
                   
                   $cariNIK=NULL;
                   $cariNama=NULL;
                   $cariDepartemen=NULL;
                   $whereis=NULL;


                     $query1="select * from karyawan where departemen = 'Exim' " ;
                  

                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>


                  <table id="example" class="table table-hover table-bordered" border="1">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nik </i></center></th>
                        <th><center>Nama </center></th>
                        <th><center>Alamat </center></th>
                        <th><center>Gender </center></th>
                        <th><center>No HP </center></th>
                        <th><center>Departemen </center></th>
                        <th><center>Status </center></th>
                        <th><center>Gaji Pokok </center></th>
                        <th><center>Tunjangan Jabatan </center></th>

                        
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
                    <td><?php echo $data['alamat']; ?></td>
                    <td><center><?php if($data['gender']==0){echo "Laki-laki";}else{echo "Perempuan";} ?></center></td>
                    <td><center><?php echo $data['no_hp']; ?></center></td>
                    <td><center><?php echo $data['departemen']; ?></center></td>
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
                    <td><center><?php echo $data['gaji_pokok'];?></center></td>
                    <td><center><?php echo $data['tunjangan'];?></center></td>
                   

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
                   
                   $cariNIK=NULL;
                   $cariNama=NULL;
                   $cariDepartemen=NULL;
                   $whereis=NULL;


                     $query1="select * from karyawan where departemen = 'HRD' " ;
                  

                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>


                  <table id="example" class="table table-hover table-bordered" border="1">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nik </i></center></th>
                        <th><center>Nama </center></th>
                        <th><center>Alamat </center></th>
                        <th><center>Gender </center></th>
                        <th><center>No HP </center></th>
                        <th><center>Departemen </center></th>
                        <th><center>Status </center></th>
                        <th><center>Gaji Pokok </center></th>
                        <th><center>Tunjangan Jabatan </center></th>

                        
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
                    <td><?php echo $data['alamat']; ?></td>
                    <td><center><?php if($data['gender']==0){echo "Laki-laki";}else{echo "Perempuan";} ?></center></td>
                    <td><center><?php echo $data['no_hp']; ?></center></td>
                    <td><center><?php echo $data['departemen']; ?></center></td>
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
                    <td><center><?php echo $data['gaji_pokok'];?></center></td>
                    <td><center><?php echo $data['tunjangan'];?></center></td>
                   

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
                   
                   $cariNIK=NULL;
                   $cariNama=NULL;
                   $cariDepartemen=NULL;
                   $whereis=NULL;


                     $query1="select * from karyawan where departemen = 'Marketing' " ;
                  

                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>


                  <table id="example" class="table table-hover table-bordered" border="1">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nik </i></center></th>
                        <th><center>Nama </center></th>
                        <th><center>Alamat </center></th>
                        <th><center>Gender </center></th>
                        <th><center>No HP </center></th>
                        <th><center>Departemen </center></th>
                        <th><center>Status </center></th>
                        <th><center>Gaji Pokok </center></th>
                        <th><center>Tunjangan Jabatan </center></th>

                        
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
                    <td><?php echo $data['alamat']; ?></td>
                    <td><center><?php if($data['gender']==0){echo "Laki-laki";}else{echo "Perempuan";} ?></center></td>
                    <td><center><?php echo $data['no_hp']; ?></center></td>
                    <td><center><?php echo $data['departemen']; ?></center></td>
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
                    <td><center><?php echo $data['gaji_pokok'];?></center></td>
                    <td><center><?php echo $data['tunjangan'];?></center></td>
                   

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



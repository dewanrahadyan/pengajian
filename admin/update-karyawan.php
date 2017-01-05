<?php
include "../conn.php";
$nik	    = $_POST['nik'];
$nama	    = $_POST['nama'];
$alamat	    = $_POST['alamat'];
$gender     = $_POST['gender']; 
$no_hp	    = $_POST['no_hp'];
$departemen = $_POST['departemen'];
$status	    = $_POST['status'];
$gaji_pokok = $_POST['gaji_pokok'];
$tunjangan  = $_POST['tunjangan'];

$update = mysqli_query($koneksi, "UPDATE karyawan SET nama='$nama', alamat='$alamat', gender='$gender', no_hp='$no_hp', departemen='$departemen', status='$status', gaji_pokok='$gaji_pokok', tunjangan='$tunjangan' WHERE nik='$nik'") or die(mysqli_error());

echo"<script>alert('Data Telah Diperbaharui')</script>";
echo"<script>location.href='karyawan.php'</script>";
?>
<?php
include "../conn.php";
$user_id       = $_POST['user_id'];
$username      = $_POST['username'];
$password      = $_POST['password'];
$fullname      = $_POST['fullname'];
$no_hp         = $_POST['no_hp'];
$level         = $_POST['level'];

$query = mysqli_query($koneksi, "UPDATE user SET username='$username', password='$password', fullname='$fullname', no_hp='$no_hp', level='$level' WHERE user_id='$user_id'")or die(mysql_error());
if ($query){
header('location:admin.php');	
} else {
	echo "gagal";
    }
?>
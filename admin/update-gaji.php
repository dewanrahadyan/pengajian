<?php
                include "../conn.php";
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
				
				$update = mysqli_query($koneksi, "UPDATE gajian SET nik='$nik', gaji_bulan='$gaji_bulan', gaji_tahun='$gaji_tahun',
                                                 tgl_transfer='$tgl_transfer', absensi='$absensi', sakit='$sakit', cuti='$cuti',
                                                 no_rek='$no_rek', gaji='$gaji', tunjangan='$tunjangan', uang_makan='$uang_makan',
                                                 uang_transport='$uang_transport', thr='$thr', total='$total' WHERE kd_gaji='$kd_gaji'") or die(mysqli_error());
				if($update){
					echo "<script>alert('Data Gaji Berhasil dimasukan!'); window.location = 'gaji.php'</script>";
				}else{
					echo "<script>alert('Data Gaji Gagal diupdate!'); window.location = 'gaji.php'</script>";
				}
?>
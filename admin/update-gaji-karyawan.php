<?php
include "../conn.php";

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
                        premi_hadir='$premi_hadir',
                        tunjangan_konsumsi='$tunjangan_konsumsi',
                        komisi_penjualan='$komisi_penjualan',
                        komisi_bsc='$komisi_bsc',
                        barang_berkomisi='$barang_berkomisi', 
                        tunjangan_jamsostek='$tunjangan_jamsostek', 
                        uang_lembur='$uang_lembur',
                        gaji_bruto='$gaji_bruto',
                        setor_jamsostek='$setor_jamsostek',
                        pot_jamsostek='$pot_jamsostek', 
                        gaji_netto='$gaji_netto', 
                        pot_telat='$pot_telat', 
                        pot_tidak_hadir='$pot_tidak_hadir',
                        pot_premi_hadir='$pot_premi_hadir', 
                        pot_itu='$pot_itu', 
                        pot_iuran_wajib='$pot_iuran_wajib',
                        pot_iuran_sukarela='$pot_iuran_sukarela', 
                        pot_iuran_koperasi='$pot_iuran_koperasi',
                        biaya_adm='$biaya_adm', 
                        take_home_pay='$take_home_pay'
                    
                    WHERE 
                    kd_gaji='$kd_gaji'") or die(mysqli_error());

echo"<script>alert('Data Telah Diperbaharui')</script>";
echo"<script>location.href='manajemen-gaji-karyawan.php?kd=".$_POST['nik']."'</script>";
?>
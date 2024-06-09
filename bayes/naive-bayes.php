<?php

error_reporting(0);
include "koneksi.php";

$sqlJumlahKasusTotal = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah_total FROM data_latih");
$rowJumlahKasusTotal = mysqli_fetch_array($sqlJumlahKasusTotal);
$getJumlahKasusTotal = $rowJumlahKasusTotal['jumlah_total'];


if ($rowJumlahKasusTotal['jumlah_total'] == 0) {
    echo "<script type='text/javascript'>
                        setTimeout(function () {  
                        swal.fire
                        ({
                            title: 'Gagal',
                            text:  'Data Latih Kosong',
                            type: 'warning',
                            timer: 3000,
                            footer: 'Tunggu Beberapa Saat ...',
                            showConfirmButton: false
                        });  
                        },10); 
                        window.setTimeout(function(){ 
                        window.location.replace('konten.php?page=training-data');
                        } ,3000);
                </script>
                ";
} else {
    $hapus1 = mysqli_query($koneksi, "TRUNCATE hasil_hitung");
    $hapus2 = mysqli_query($koneksi, "TRUNCATE data_hitung");

    $A = 'Puas';
    $B = 'Tidak Puas';

    // HItung Jumlah Data Latih
    $sqlJumlahKasusTotal = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah_total FROM data_latih");
    $rowJumlahKasusTotal = mysqli_fetch_array($sqlJumlahKasusTotal);
    $getJumlahKasusTotal = $rowJumlahKasusTotal['jumlah_total'];

    // hitung jumlah probabilitas masing-masing kelas;
    $sqlJumlahKasus1 = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah_p FROM data_latih WHERE kelas = '$A' ");
    $rowJumlahKasus1 = mysqli_fetch_array($sqlJumlahKasus1);
    $getJumlahKasus1 = $rowJumlahKasus1['jumlah_p'];

    $sqlJumlahKasus2 = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah_p FROM data_latih WHERE kelas = '$B' ");
    $rowJumlahKasus2 = mysqli_fetch_array($sqlJumlahKasus2);
    $getJumlahKasus2 = $rowJumlahKasus2['jumlah_p'];

    $pp_1 = $getJumlahKasus1 / $getJumlahKasusTotal;
    $pp_2 = $getJumlahKasus2 / $getJumlahKasusTotal;

    $p_1 = round($pp_1, 4);
    $p_2 = round($pp_2, 4);


    $result = "INSERT INTO data_hitung VALUES ('','P_Kelas','$p_1', '$p_2')";
    $query =  mysqli_query($koneksi, $result);


    // Hitung Mean Jumlah MK
    $avg_un = mysqli_query($koneksi, "SELECT DISTINCT AVG(jumlah_mk) as rata FROM data_latih where kelas ='$A' ");
    $row_avg_un = mysqli_fetch_array($avg_un);
    $getavg_un = $row_avg_un['rata'];
    $jumlah_mk = round($getavg_un, 2);

    $avg_un2 = mysqli_query($koneksi, "SELECT DISTINCT AVG(jumlah_mk) as rata FROM data_latih where kelas ='$B' ");
    $row_avg_un2 = mysqli_fetch_array($avg_un2);
    $getavg_un2 = $row_avg_un2['rata'];
    $jumlah_mk2 = round($getavg_un2, 2);

    //Hitung STDV Jumlah MK
    $stdv_un = mysqli_query($koneksi, "SELECT DISTINCT STDDEV_SAMP(jumlah_mk) as rata FROM data_latih where kelas ='$A' ");
    $row_stdv_un = mysqli_fetch_array($stdv_un);
    $getstdv_un = $row_stdv_un['rata'];
    $sun = round($getstdv_un, 2);

    $stdv_un2 = mysqli_query($koneksi, "SELECT DISTINCT STDDEV_SAMP(jumlah_mk) as rata FROM data_latih where kelas ='$B' ");
    $row_stdv_un2 = mysqli_fetch_array($stdv_un2);
    $getstdv_un2 = $row_stdv_un2['rata'];
    $sun2 = round($getstdv_un2, 2);

    $result1 = "INSERT INTO hasil_hitung VALUES ('','jumlah_mk','$jumlah_mk','$sun','$jumlah_mk2','$sun2') ";
    $simpan1 = mysqli_query($koneksi, $result1);

    // Hitung Mean Nilai Absensi
    $avg_absensi = mysqli_query($koneksi, "SELECT DISTINCT AVG(absensi) as rata FROM data_latih where kelas ='$A' ");
    $row_avg_absensi = mysqli_fetch_array($avg_absensi);
    $getavg_absensi = $row_avg_absensi['rata'];
    $absensi = round($getavg_absensi, 2);

    $avg_absensi2 = mysqli_query($koneksi, "SELECT DISTINCT AVG(absensi) as rata FROM data_latih where kelas ='$B' ");
    $row_avg_absensi2 = mysqli_fetch_array($avg_absensi2);
    $getavg_absensi2 = $row_avg_absensi2['rata'];
    $absensi2 = round($getavg_absensi2, 2);


    // Hitung STDV Absensi
    $stdv_absensi = mysqli_query($koneksi, "SELECT DISTINCT STDDEV_SAMP(absensi) as rata FROM data_latih where kelas ='$A' ");
    $row_stdv_absensi = mysqli_fetch_array($stdv_absensi);
    $getstdv_absensi = $row_stdv_absensi['rata'];
    $sabsensi = round($getstdv_absensi, 2);

    $stdv_absensi2 = mysqli_query($koneksi, "SELECT DISTINCT STDDEV_SAMP(absensi) as rata FROM data_latih where kelas ='$B' ");
    $row_stdv_absensi2 = mysqli_fetch_array($stdv_absensi2);
    $getstdv_absensi2 = $row_stdv_absensi2['rata'];
    $sabsensi2 = round($getstdv_absensi2, 2);

    $result2 = "INSERT INTO hasil_hitung VALUES ('','absensi','$absensi','$sabsensi','$absensi2','$sabsensi2') ";
    $simpan2 = mysqli_query($koneksi, $result2);

    // Hitung Mean Nilai sks_s1

    $avg_sks_s1 = mysqli_query($koneksi, "SELECT DISTINCT AVG(sks_s1) as rata FROM data_latih where kelas ='$A' ");
    $row_avg_sks_s1 = mysqli_fetch_array($avg_sks_s1);
    $getavg_sks_s1 = $row_avg_sks_s1['rata'];
    $sks_s1 = round($getavg_sks_s1, 2);

    $avg_sks_s12 = mysqli_query($koneksi, "SELECT DISTINCT AVG(sks_s1) as rata FROM data_latih where kelas ='$B' ");
    $row_avg_sks_s12 = mysqli_fetch_array($avg_sks_s12);
    $getavg_sks_s12 = $row_avg_sks_s12['rata'];
    $sks_s12 = round($getavg_sks_s12, 2);

    // Hitung STDV sks_s1

    $stdv_sks_s1 = mysqli_query($koneksi, "SELECT DISTINCT STDDEV_SAMP(sks_s1) as rata FROM data_latih where kelas ='$A' ");
    $row_stdv_sks_s1 = mysqli_fetch_array($stdv_sks_s1);
    $getstdv_sks_s1 = $row_stdv_sks_s1['rata'];
    $ssks_s1 = round($getstdv_sks_s1, 2);

    $stdv_sks_s12 = mysqli_query($koneksi, "SELECT DISTINCT STDDEV_SAMP(sks_s1) as rata FROM data_latih where kelas ='$B' ");
    $row_stdv_sks_s12 = mysqli_fetch_array($stdv_sks_s12);
    $getstdv_sks_s12 = $row_stdv_sks_s12['rata'];
    $ssks_s12 = round($getstdv_sks_s12, 2);

    $result3  = "INSERT INTO hasil_hitung VALUES ('','sks_s1','$sks_s1','$ssks_s1','$sks_s12','$ssks_s12') ";
    $simpan3  = mysqli_query($koneksi, $result3);

    /// Hitung Mean Nilai sks_s2

    $avg_sks_s2 = mysqli_query($koneksi, "SELECT DISTINCT AVG(sks_s2) as rata FROM data_latih where kelas ='$A' ");
    $row_avg_sks_s2 = mysqli_fetch_array($avg_sks_s2);
    $getavg_sks_s2 = $row_avg_sks_s2['rata'];
    $sks_s2 = round($getavg_sks_s2, 2);

    $avg_sks_s22 = mysqli_query($koneksi, "SELECT DISTINCT AVG(sks_s2) as rata FROM data_latih where kelas ='$B' ");
    $row_avg_sks_s22 = mysqli_fetch_array($avg_sks_s22);
    $getavg_sks_s22 = $row_avg_sks_s22['rata'];
    $sks_s22 = round($getavg_sks_s22, 2);

    // Hitung STDV sks_s2

    $stdv_sks_s2 = mysqli_query($koneksi, "SELECT DISTINCT STDDEV_SAMP(sks_s2) as rata FROM data_latih where kelas ='$A' ");
    $row_stdv_sks_s2 = mysqli_fetch_array($stdv_sks_s2);
    $getstdv_sks_s2 = $row_stdv_sks_s2['rata'];
    $ssks_s2 = round($getstdv_sks_s2, 2);

    $stdv_sks_s22 = mysqli_query($koneksi, "SELECT DISTINCT STDDEV_SAMP(sks_s2) as rata FROM data_latih where kelas ='$B' ");
    $row_stdv_sks_s22 = mysqli_fetch_array($stdv_sks_s22);
    $getstdv_sks_s22 = $row_stdv_sks_s22['rata'];
    $ssks_s22 = round($getstdv_sks_s22, 2);

    $result4    = "INSERT INTO hasil_hitung VALUES ('','sks_s2','$sks_s2','$ssks_s2','$sks_s22','$ssks_s22') ";
    $simpan4    = mysqli_query($koneksi, $result4);

    /// Hitung Mean Nilai sks_s3

    $avg_sks_s3 = mysqli_query($koneksi, "SELECT DISTINCT AVG(sks_s3) as rata FROM data_latih where kelas ='$A' ");
    $row_avg_sks_s3 = mysqli_fetch_array($avg_sks_s3);
    $getavg_sks_s3 = $row_avg_sks_s3['rata'];
    $sks_s3 = round($getavg_sks_s3, 2);

    $avg_sks_s32 = mysqli_query($koneksi, "SELECT DISTINCT AVG(sks_s3) as rata FROM data_latih where kelas ='$B' ");
    $row_avg_sks_s32 = mysqli_fetch_array($avg_sks_s32);
    $getavg_sks_s32 = $row_avg_sks_s32['rata'];
    $sks_s32 = round($getavg_sks_s32, 2);

    // Hitung STDV sks_s3

    $stdv_sks_s3 = mysqli_query($koneksi, "SELECT DISTINCT STDDEV_SAMP(sks_s3) as rata FROM data_latih where kelas ='$A' ");
    $row_stdv_sks_s3 = mysqli_fetch_array($stdv_sks_s3);
    $getstdv_sks_s3 = $row_stdv_sks_s3['rata'];
    $ssks_s3 = round($getstdv_sks_s3, 2);

    $stdv_sks_s32 = mysqli_query($koneksi, "SELECT DISTINCT STDDEV_SAMP(sks_s3) as rata FROM data_latih where kelas ='$B' ");
    $row_stdv_sks_s32 = mysqli_fetch_array($stdv_sks_s32);
    $getstdv_sks_s32 = $row_stdv_sks_s32['rata'];
    $ssks_s32 = round($getstdv_sks_s32, 2);

    $result5    = "INSERT INTO hasil_hitung VALUES ('','sks_s3','$sks_s3','$ssks_s3','$sks_s32','$ssks_s32') ";
    $simpan5    = mysqli_query($koneksi, $result5);

    /// Hitung Mean Nilai sks_s4

    $avg_sks_s4 = mysqli_query($koneksi, "SELECT DISTINCT AVG(sks_s4) as rata FROM data_latih where kelas ='$A' ");
    $row_avg_sks_s4 = mysqli_fetch_array($avg_sks_s4);
    $getavg_sks_s4 = $row_avg_sks_s4['rata'];
    $sks_s4 = round($getavg_sks_s4, 2);

    $avg_sks_s42 = mysqli_query($koneksi, "SELECT DISTINCT AVG(sks_s4) as rata FROM data_latih where kelas ='$B' ");
    $row_avg_sks_s42 = mysqli_fetch_array($avg_sks_s42);
    $getavg_sks_s42 = $row_avg_sks_s42['rata'];
    $sks_s42 = round($getavg_sks_s42, 2);

    // Hitung STDV sks_s4

    $stdv_sks_s4 = mysqli_query($koneksi, "SELECT DISTINCT STDDEV_SAMP(sks_s4) as rata FROM data_latih where kelas ='$A' ");
    $row_stdv_sks_s4 = mysqli_fetch_array($stdv_sks_s4);
    $getstdv_sks_s4 = $row_stdv_sks_s4['rata'];
    $ssks_s4 = round($getstdv_sks_s4, 2);

    $stdv_sks_s42 = mysqli_query($koneksi, "SELECT DISTINCT STDDEV_SAMP(sks_s4) as rata FROM data_latih where kelas ='$B' ");
    $row_stdv_sks_s42 = mysqli_fetch_array($stdv_sks_s42);
    $getstdv_sks_s42 = $row_stdv_sks_s42['rata'];
    $ssks_s42 = round($getstdv_sks_s42, 2);

    $result6    = "INSERT INTO hasil_hitung VALUES ('','sks_s4','$sks_s4','$ssks_s4','$sks_s42','$ssks_s42') ";
    $simpan6    = mysqli_query($koneksi, $result6);

    /// Hitung Mean Nilai ips_s1

    $avg_ips_s1 = mysqli_query($koneksi, "SELECT DISTINCT AVG(ips_s1) as rata FROM data_latih where kelas ='$A' ");
    $row_avg_ips_s1 = mysqli_fetch_array($avg_ips_s1);
    $getavg_ips_s1 = $row_avg_ips_s1['rata'];
    $ips_s1 = round($getavg_ips_s1, 2);

    $avg_ips_s12 = mysqli_query($koneksi, "SELECT DISTINCT AVG(ips_s1) as rata FROM data_latih where kelas ='$B' ");
    $row_avg_ips_s12 = mysqli_fetch_array($avg_ips_s12);
    $getavg_ips_s12 = $row_avg_ips_s12['rata'];
    $ips_s12 = round($getavg_ips_s12, 2);

    // Hitung STDV ips_s1

    $stdv_ips_s1 = mysqli_query($koneksi, "SELECT DISTINCT STDDEV_SAMP(ips_s1) as rata FROM data_latih where kelas ='$A' ");
    $row_stdv_ips_s1 = mysqli_fetch_array($stdv_ips_s1);
    $getstdv_ips_s1 = $row_stdv_ips_s1['rata'];
    $sips_s1 = round($getstdv_ips_s1, 2);

    $stdv_ips_s12 = mysqli_query($koneksi, "SELECT DISTINCT STDDEV_SAMP(ips_s1) as rata FROM data_latih where kelas ='$B' ");
    $row_stdv_ips_s12 = mysqli_fetch_array($stdv_ips_s12);
    $getstdv_ips_s12 = $row_stdv_ips_s12['rata'];
    $sips_s12 = round($getstdv_ips_s12, 2);

    $result7    = "INSERT INTO hasil_hitung VALUES ('','ips_s1','$ips_s1','$sips_s1','$ips_s12','$sips_s12') ";
    $simpan7    = mysqli_query($koneksi, $result7);

    /// Hitung Mean Nilai ips_s2

    $avg_ips_s2 = mysqli_query($koneksi, "SELECT DISTINCT AVG(ips_s2) as rata FROM data_latih where kelas ='$A' ");
    $row_avg_ips_s2 = mysqli_fetch_array($avg_ips_s2);
    $getavg_ips_s2 = $row_avg_ips_s2['rata'];
    $ips_s2 = round($getavg_ips_s2, 2);

    $avg_ips_s22 = mysqli_query($koneksi, "SELECT DISTINCT AVG(ips_s2) as rata FROM data_latih where kelas ='$B' ");
    $row_avg_ips_s22 = mysqli_fetch_array($avg_ips_s22);
    $getavg_ips_s22 = $row_avg_ips_s22['rata'];
    $ips_s22 = round($getavg_ips_s22, 2);

    // Hitung STDV ips_s2

    $stdv_ips_s2 = mysqli_query($koneksi, "SELECT DISTINCT STDDEV_SAMP(ips_s2) as rata FROM data_latih where kelas ='$A' ");
    $row_stdv_ips_s2 = mysqli_fetch_array($stdv_ips_s2);
    $getstdv_ips_s2 = $row_stdv_ips_s2['rata'];
    $sips_s2 = round($getstdv_ips_s2, 2);

    $stdv_ips_s22 = mysqli_query($koneksi, "SELECT DISTINCT STDDEV_SAMP(ips_s2) as rata FROM data_latih where kelas ='$B' ");
    $row_stdv_ips_s22 = mysqli_fetch_array($stdv_ips_s22);
    $getstdv_ips_s22 = $row_stdv_ips_s22['rata'];
    $sips_s22 = round($getstdv_ips_s22, 2);

    $result8    = "INSERT INTO hasil_hitung VALUES ('','ips_s2','$ips_s2','$sips_s2','$ips_s22','$sips_s22') ";
    $simpan8    = mysqli_query($koneksi, $result8);

    /// Hitung Mean Nilai ips_s3

    $avg_ips_s3 = mysqli_query($koneksi, "SELECT DISTINCT AVG(ips_s3) as rata FROM data_latih where kelas ='$A' ");
    $row_avg_ips_s3 = mysqli_fetch_array($avg_ips_s3);
    $getavg_ips_s3 = $row_avg_ips_s3['rata'];
    $ips_s3 = round($getavg_ips_s3, 2);

    $avg_ips_s32 = mysqli_query($koneksi, "SELECT DISTINCT AVG(ips_s3) as rata FROM data_latih where kelas ='$B' ");
    $row_avg_ips_s32 = mysqli_fetch_array($avg_ips_s32);
    $getavg_ips_s32 = $row_avg_ips_s32['rata'];
    $ips_s32 = round($getavg_ips_s32, 2);

    // Hitung STDV ips_s3

    $stdv_ips_s3 = mysqli_query($koneksi, "SELECT DISTINCT STDDEV_SAMP(ips_s3) as rata FROM data_latih where kelas ='$A' ");
    $row_stdv_ips_s3 = mysqli_fetch_array($stdv_ips_s3);
    $getstdv_ips_s3 = $row_stdv_ips_s3['rata'];
    $sips_s3 = round($getstdv_ips_s3, 2);

    $stdv_ips_s32 = mysqli_query($koneksi, "SELECT DISTINCT STDDEV_SAMP(ips_s3) as rata FROM data_latih where kelas ='$B' ");
    $row_stdv_ips_s32 = mysqli_fetch_array($stdv_ips_s32);
    $getstdv_ips_s32 = $row_stdv_ips_s32['rata'];
    $sips_s32 = round($getstdv_ips_s32, 2);

    $result9    = "INSERT INTO hasil_hitung VALUES ('','ips_s3','$ips_s3','$sips_s3','$ips_s32','$sips_s32') ";
    $simpan9    = mysqli_query($koneksi, $result9);

    // Hitung Mean Nilai ips_s4

    $avg_ips_s4 = mysqli_query($koneksi, "SELECT DISTINCT AVG(ips_s4) as rata FROM data_latih where kelas ='$A' ");
    $row_avg_ips_s4 = mysqli_fetch_array($avg_ips_s4);
    $getavg_ips_s4 = $row_avg_ips_s4['rata'];
    $ips_s4 = round($getavg_ips_s4, 2);

    $avg_ips_s42 = mysqli_query($koneksi, "SELECT DISTINCT AVG(ips_s4) as rata FROM data_latih where kelas ='$B' ");
    $row_avg_ips_s42 = mysqli_fetch_array($avg_ips_s42);
    $getavg_ips_s42 = $row_avg_ips_s42['rata'];
    $ips_s42 = round($getavg_ips_s42, 2);

    // Hitung STDV ips_s4

    $stdv_ips_s4 = mysqli_query($koneksi, "SELECT DISTINCT STDDEV_SAMP(ips_s4) as rata FROM data_latih where kelas ='$A' ");
    $row_stdv_ips_s4 = mysqli_fetch_array($stdv_ips_s4);
    $getstdv_ips_s4 = $row_stdv_ips_s4['rata'];
    $sips_s4 = round($getstdv_ips_s4, 2);

    $stdv_ips_s42 = mysqli_query($koneksi, "SELECT DISTINCT STDDEV_SAMP(ips_s4) as rata FROM data_latih where kelas ='$B' ");
    $row_stdv_ips_s42 = mysqli_fetch_array($stdv_ips_s42);
    $getstdv_ips_s42 = $row_stdv_ips_s42['rata'];
    $sips_s42 = round($getstdv_ips_s42, 2);

    $result10    = "INSERT INTO hasil_hitung VALUES ('','ips_s4','$ips_s4','$sips_s4','$ips_s42','$sips_s42') ";
    $simpan10    = mysqli_query($koneksi, $result10);

    echo "<script type='text/javascript'>
        setTimeout(function () {  
            swal.fire
            ({
                title: 'Sukses !',
                text:  'Proses Perhitungan Selesai',
                type: 'success',
                timer: 3000,
                footer: 'Tunggu Beberapa Saat ...',
                showConfirmButton: false
            });  
        },10); 
            window.setTimeout(function(){ 
            window.location.replace('konten.php?page=probability');
        } ,3000);
      </script>";
}

<?php

error_reporting(0);
        include "koneksi.php";

            $sql_uji             = mysqli_query($koneksi, "SELECT * FROM data_uji ORDER BY id DESC LIMIT 1");
            $array_uji           = mysqli_fetch_array($sql_uji);
            $data_id             = $array_uji['id'];

            $sqlJumlahKasusTotal = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah_total FROM data_uji");
            $rowJumlahKasusTotal = mysqli_fetch_array($sqlJumlahKasusTotal);
            $getJumlahKasusTotal = $rowJumlahKasusTotal['jumlah_total'];

            $data_hitung   = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM hasil_hitung");
            $rowdatahitung  = mysqli_fetch_array($data_hitung);
            $getdatahitung  = $rowdatahitung['total'];

    if($rowJumlahKasusTotal['jumlah_total'] == 0) {
            echo "<script type='text/javascript'>
                setTimeout(function () {  
                    swal.fire
                    ({
                        title: 'Gagal!',
                        text:  'Data Belum Ada',
                        type:  'warning',
                        timer: 3000,
                        footer: 'Silahkan Hub. Administrator ...',
                        showConfirmButton: false
                    });  
                },10); 
                    window.setTimeout(function(){ 
                    window.location.replace('user.php?page=form-prediction');
                } ,3000);
            </script>";
    
        }else if ($rowdatahitung['total'] == 0){
    
        $del	= mysqli_query($koneksi, "DELETE FROM data_uji where id='$data_id'");
    
            echo "<script type='text/javascript'>
                    setTimeout(function () {  
                        swal.fire
                        ({
                            title: 'Gagal!',
                            text:  'Klasifikasi Belum Dilakukan',
                            type:  'warning',
                            timer: 3000,
                            footer: 'Silahkan Hub. Administrator ...',
                            showConfirmButton: false
                        });  
                    },10); 
                        window.setTimeout(function(){ 
                        window.location.replace('user.php?page=form-prediction');
                    } ,3000);
                </script>";


    }else{ 

            $ambildata1 = mysqli_query($koneksi,"SELECT * FROM hasil_hitung WHERE atribut ='jumlah_mk' ");
            $data12       =mysqli_fetch_array($ambildata1);
            
            $ambildata2 = mysqli_query($koneksi,"SELECT * FROM hasil_hitung WHERE atribut ='absensi' ");
            $data2        =mysqli_fetch_array($ambildata2);
            
            $ambildata3 = mysqli_query($koneksi,"SELECT * FROM hasil_hitung WHERE atribut ='sks_s1' ");
            $data3        =mysqli_fetch_array($ambildata3);
            
            $ambildata4 = mysqli_query($koneksi,"SELECT * FROM hasil_hitung WHERE atribut ='sks_s2' ");
            $data4        =mysqli_fetch_array($ambildata4);
            
            $ambildata5 = mysqli_query($koneksi,"SELECT * FROM hasil_hitung WHERE atribut ='sks_s3' ");
            $data5        =mysqli_fetch_array($ambildata5);
            
            $ambildata6 = mysqli_query($koneksi,"SELECT * FROM hasil_hitung WHERE atribut ='sks_s4' ");
            $data6      =mysqli_fetch_array($ambildata6);
            
            $ambildata7 = mysqli_query($koneksi,"SELECT * FROM hasil_hitung WHERE atribut ='ips_s1' ");
            $data7      =mysqli_fetch_array($ambildata7);
            
            $ambildata8 = mysqli_query($koneksi,"SELECT * FROM hasil_hitung WHERE atribut ='ips_s2' ");
            $data8      =mysqli_fetch_array($ambildata8);
            
            $ambildata9 = mysqli_query($koneksi,"SELECT * FROM hasil_hitung WHERE atribut ='ips_s3' ");
            $data9      =mysqli_fetch_array($ambildata9);
            
            $ambildata10 = mysqli_query($koneksi,"SELECT * FROM hasil_hitung WHERE atribut ='ips_s4' ");
            $data10      =mysqli_fetch_array($ambildata10);
            
            $ambildata11 = mysqli_query($koneksi,"SELECT * FROM data_hitung WHERE atribut ='P_Kelas' ");
            $data11        =mysqli_fetch_array($ambildata11);

/////////////////////////////
$ambildata  = mysqli_query($koneksi, "SELECT * FROM data_uji ORDER BY id DESC LIMIT 1");
$data1  = mysqli_fetch_array($ambildata);
$id_uji = $data1['id'];

  # Fungsi Gaussian
///////////////////////////////

$jumlah_mk1 = 1/sqrt(2*3.14*$data12['s_tepat'])*exp(-((pow($data1['jumlah_mk']-$data12['m_tepat'], 2))/(2*(pow($data12['s_tepat'], 2)))));
$jumlah_mk2 = 1/sqrt(2*3.14*$data12['s_terlambat'])*exp(-((pow($data1['jumlah_mk']-$data12['m_terlambat'], 2))/(2*(pow($data12['s_terlambat'], 2)))));
///////////////////////////////

$absensi1 = 1/sqrt(2*3.14*$data2['s_tepat'])*exp(-((pow($data1['absensi']-$data2['m_tepat'], 2))/(2*(pow($data2['s_tepat'], 2)))));
$absensi2 = 1/sqrt(2*3.14*$data2['s_terlambat'])*exp(-((pow($data1['absensi']-$data2['m_terlambat'], 2))/(2*(pow($data2['s_terlambat'], 2)))));
///////////////////////////////

$sks_s11 = 1/sqrt(2*3.14*$data3['s_tepat'])*exp(-((pow($data1['sks_s1']-$data3['m_tepat'], 2))/(2*(pow($data3['s_tepat'], 2)))));
$sks_s12 = 1/sqrt(2*3.14*$data3['s_terlambat'])*exp(-((pow($data1['sks_s1']-$data3['m_terlambat'], 2))/(2*(pow($data3['s_terlambat'], 2)))));
///////////////////////////////

$sks_s21 = 1/sqrt(2*3.14*$data4['s_tepat'])*exp(-((pow($data1['sks_s2']-$data4['m_tepat'], 2))/(2*(pow($data4['s_tepat'], 2)))));
$sks_s22 = 1/sqrt(2*3.14*$data4['s_terlambat'])*exp(-((pow($data1['sks_s2']-$data4['m_terlambat'], 2))/(2*(pow($data4['s_terlambat'], 2)))));
///////////////////////////////

$sks_s31 = 1/sqrt(2*3.14*$data5['s_tepat'])*exp(-((pow($data1['sks_s3']-$data5['m_tepat'], 2))/(2*(pow($data5['s_tepat'], 2)))));
$sks_s32 = 1/sqrt(2*3.14*$data5['s_terlambat'])*exp(-((pow($data1['sks_s3']-$data5['m_terlambat'], 2))/(2*(pow($data5['s_terlambat'], 2)))));
///////////////////////////////

$sks_s41 = 1/sqrt(2*3.14*$data6['s_tepat'])*exp(-((pow($data1['sks_s4']-$data6['m_tepat'], 2))/(2*(pow($data6['s_tepat'], 2)))));
$sks_s42 = 1/sqrt(2*3.14*$data6['s_terlambat'])*exp(-((pow($data1['sks_s4']-$data6['m_terlambat'], 2))/(2*(pow($data6['s_terlambat'], 2)))));
///////////////////////////////

$ips_s11 = 1/sqrt(2*3.14*$data7['s_tepat'])*exp(-((pow($data1['ips_s1']-$data7['m_tepat'], 2))/(2*(pow($data7['s_tepat'], 2)))));
$ips_s12 = 1/sqrt(2*3.14*$data7['s_terlambat'])*exp(-((pow($data1['ips_s1']-$data7['m_terlambat'], 2))/(2*(pow($data7['s_terlambat'], 2)))));
///////////////////////////////

$ips_s21 = 1/sqrt(2*3.14*$data8['s_tepat'])*exp(-((pow($data1['ips_s2']-$data8['m_tepat'], 2))/(2*(pow($data8['s_tepat'], 2)))));
$ips_s22 = 1/sqrt(2*3.14*$data8['s_terlambat'])*exp(-((pow($data1['ips_s2']-$data8['m_terlambat'], 2))/(2*(pow($data8['s_terlambat'], 2)))));
//////////////////////////////

$ips_s31 = 1/sqrt(2*3.14*$data9['s_tepat'])*exp(-((pow($data1['ips_s3']-$data9['m_tepat'], 2))/(2*(pow($data9['s_tepat'], 2)))));
$ips_s32 = 1/sqrt(2*3.14*$data9['s_terlambat'])*exp(-((pow($data1['ips_s3']-$data9['m_terlambat'], 2))/(2*(pow($data9['s_terlambat'], 2)))));
//////////////////////////////

$ips_s41 = 1/sqrt(2*3.14*$data10['s_tepat'])*exp(-((pow($data1['ips_s4']-$data10['m_tepat'], 2))/(2*(pow($data10['s_tepat'], 2)))));
$ips_s42 = 1/sqrt(2*3.14*$data10['s_terlambat'])*exp(-((pow($data1['ips_s4']-$data10['m_terlambat'], 2))/(2*(pow($data10['s_terlambat'], 2)))));

$result = "INSERT INTO gausian VALUES 
('','$data1[id]','iterasi kelas Tepat','$jumlah_mk1','$absensi1','$sks_s11','$sks_s21','$sks_s31','$sks_s41','$ips_s11','$ips_s21','$ips_s31','$ips_s41'),
('','$data1[id]','iterasi kelas Terlambat','$jumlah_mk2','$absensi2','$sks_s12','$sks_s22','$sks_s32','$sks_s42','$ips_s12','$ips_s22','$ips_s32','$ips_s42')";
$simpan = mysqli_query($koneksi, $result);

/////// Kalika Semua Variabel

$kelas1		= $jumlah_mk1*$absensi1*$sks_s11*$sks_s21*$sks_s31*$sks_s41*$ips_s11*$ips_s21*$ips_s31*$ips_s41*$data11['p_tepat'];
$kelas2     = $jumlah_mk2*$absensi2*$sks_s12*$sks_s22*$sks_s32*$sks_s42*$ips_s12*$ips_s22*$ips_s32*$ips_s42*$data11['p_terlambat'];

$kelas1		=is_nan($kelas1)?0:$kelas1;
$kelas2		=is_nan($kelas2)?0:$kelas2;

$result1    = "INSERT INTO hitung_uji VALUES ('$id_uji', 'uji','$kelas1', '$kelas2')";
$simpan1    = mysqli_query($koneksi,$result1);

$ambildata10  = mysqli_query($koneksi, "SELECT * FROM hitung_uji ORDER BY id DESC LIMIT 1");
$data10= mysqli_fetch_array($ambildata10);
$id_data = $data10['id'];

if ($data10['p_tepat']>=$data10['p_terlambat']){
    $hasil_prediksi ='Tepat';

  $update1    = "UPDATE data_uji set kelas_prediksi = '$hasil_prediksi' where id = $id_data ";
  $que_update =mysqli_query($koneksi, $update1);
}
else{

    $hasil_prediksi ='Terlambat';
  
  $update2    = "UPDATE data_uji set kelas_prediksi = '$hasil_prediksi' where id = $id_data ";
  $que_update2 =mysqli_query($koneksi, $update2);
}
  

echo "<script type='text/javascript'>
   window.location.replace('user.php?page=prediction-result');
  </script>";
        
}
  
?>
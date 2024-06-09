<?php

include "koneksi.php";

$sqlJumlahKasusTotal = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah_total FROM hasil_hitung");
$rowJumlahKasusTotal = mysqli_fetch_array($sqlJumlahKasusTotal);
$getJumlahKasusTotal = $rowJumlahKasusTotal['jumlah_total'];

if ($rowJumlahKasusTotal['jumlah_total'] == 0) {
    echo "<script type='text/javascript'>
            setTimeout(function () {  
            swal.fire
            ({
                title: 'Opps',
                text:  'PERHITUNGAN BELUM DILAKUKAN',
                type: 'warning',
                timer: 3000,
                footer: 'Tunggu Beberapa Saat ...',
                showConfirmButton: false
            });  
        },10); 
            window.setTimeout(function(){ 
            window.location.replace('konten.php?page=training-data');
            } ,3000);</script>";
} else {

    $tampil     = mysqli_query($koneksi, "SELECT * FROM `data_hitung` where atribut = 'P_Kelas'");
    $get_tampil = mysqli_fetch_array($tampil);

    $tampil1     = mysqli_query($koneksi, "SELECT * FROM `hasil_hitung` where atribut = 'jumlah_mk'");
    $get_tampil1 = mysqli_fetch_array($tampil1);

    $tampil2     = mysqli_query($koneksi, "SELECT * FROM `hasil_hitung` where atribut = 'absensi'");
    $get_tampil2 = mysqli_fetch_array($tampil2);

    $tampil3     = mysqli_query($koneksi, "SELECT * FROM `hasil_hitung` where atribut = 'sks_s1'");
    $get_tampil3 = mysqli_fetch_array($tampil3);

    $tampil4     = mysqli_query($koneksi, "SELECT * FROM `hasil_hitung` where atribut = 'sks_s2'");
    $get_tampil4 = mysqli_fetch_array($tampil4);

    $tampil5     = mysqli_query($koneksi, "SELECT * FROM `hasil_hitung` where atribut = 'sks_s3'");
    $get_tampil5 = mysqli_fetch_array($tampil5);

    $tampil6     = mysqli_query($koneksi, "SELECT * FROM `hasil_hitung` where atribut = 'sks_s4'");
    $get_tampil6 = mysqli_fetch_array($tampil6);

    $tampil7     = mysqli_query($koneksi, "SELECT * FROM `hasil_hitung` where atribut = 'ips_s1'");
    $get_tampil7 = mysqli_fetch_array($tampil7);

    $tampil8     = mysqli_query($koneksi, "SELECT * FROM `hasil_hitung` where atribut = 'ips_s2'");
    $get_tampil8 = mysqli_fetch_array($tampil8);

    $tampil9     = mysqli_query($koneksi, "SELECT * FROM `hasil_hitung` where atribut = 'ips_s3'");
    $get_tampil9 = mysqli_fetch_array($tampil9);

    $tampil10     = mysqli_query($koneksi, "SELECT * FROM `hasil_hitung` where atribut = 'ips_s4'");
    $get_tampil10 = mysqli_fetch_array($tampil10);
}
?>
<!-- header -->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Result Probability</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="konten.php"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Probability</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
        </div>
    </div>
</div>
<!--row awal -->
<div class="row">
    <div class="col-xl-9 mx-auto">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Probabilitas Kelas</h5>
                <table class="table mb-0" style="text-align:center">
                    <thead class="table" style="background-color: #2c5364; color:white;">
                        <tr>
                            <th>Kelas</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Kelas Puas</td>
                            <td><?php echo $get_tampil['p_tepat']; ?></td>
                        </tr>
                        <tr>
                            <td>Kelas Tidak Puas</td>
                            <td><?php echo $get_tampil['p_terlambat']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- row akhir -->
<!--row awal -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Atribut (C1) Kesesuaian persyaratan pelayanan</h5>
                <table class="table table-sm mb-0" style="text-align:center">
                    <thead class="table" style="background-color: #2c5364; color:white;">
                        <tr>
                            <th>Kelas</th>
                            <th>Mean</th>
                            <th>Standar Deviasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Kelas Puas</td>
                            <td><?php echo $get_tampil1['m_tepat']; ?></td>
                            <td><?php echo $get_tampil1['s_tepat']; ?></td>
                        </tr>
                        <tr>
                            <td>Kelas Tidak Puas</td>
                            <td><?php echo $get_tampil1['m_terlambat']; ?></td>
                            <td><?php echo $get_tampil1['s_terlambat']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Atribut (C2) Kemudahan prosedur pelayanan</h5>
                <table class="table table-sm mb-0" style="text-align:center">
                    <thead class="table" style="background-color: #2c5364; color:white;">
                        <tr>
                            <th>Kelas</th>
                            <th>Mean</th>
                            <th>Standar Deviasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Kelas Puas</td>
                            <td><?php echo $get_tampil2['m_tepat']; ?></td>
                            <td><?php echo $get_tampil2['s_tepat']; ?></td>
                        </tr>
                        <tr>
                            <td>Kelas Tidak Puas</td>
                            <td><?php echo $get_tampil2['m_terlambat']; ?></td>
                            <td><?php echo $get_tampil2['s_terlambat']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- row akhir -->
<!--row awal -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Atribut (C3) Ketepatan penyelesaian layanan</h5>
                <table class="table table-sm mb-0" style="text-align:center">
                    <thead class="table" style="background-color: #2c5364; color:white;">
                        <tr>
                            <th>Kelas</th>
                            <th>Mean</th>
                            <th>Standar Deviasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Kelas Puas</td>
                            <td><?php echo $get_tampil3['m_tepat']; ?></td>
                            <td><?php echo $get_tampil3['s_tepat']; ?></td>
                        </tr>
                        <tr>
                            <td>Kelas Tidak Puas</td>
                            <td><?php echo $get_tampil3['m_terlambat']; ?></td>
                            <td><?php echo $get_tampil3['s_terlambat']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Atribut (C4) kenyamanan di lingkungan unit pelayanan </h5>
                <table class="table table-sm mb-0" style="text-align:center">
                    <thead class="table" style="background-color: #2c5364; color:white;">
                        <tr>
                            <th>Kelas</th>
                            <th>Mean</th>
                            <th>Standar Deviasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Kelas Puas</td>
                            <td><?php echo $get_tampil7['m_tepat']; ?></td>
                            <td><?php echo $get_tampil7['s_tepat']; ?></td>
                        </tr>
                        <tr>
                            <td>Kelas Tidak Puas</td>
                            <td><?php echo $get_tampil7['m_terlambat']; ?></td>
                            <td><?php echo $get_tampil7['s_terlambat']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- row akhir -->
<!--row awal -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Atribut (C5) Tanggung jawab petugas dalam pelayanan</h5>
                <table class="table table-sm mb-0" style="text-align:center">
                    <thead class="table" style="background-color: #2c5364; color:white;">
                        <tr>
                            <th>Kelas</th>
                            <th>Mean</th>
                            <th>Standar Deviasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Kelas Puas</td>
                            <td><?php echo $get_tampil4['m_tepat']; ?></td>
                            <td><?php echo $get_tampil4['s_tepat']; ?></td>
                        </tr>
                        <tr>
                            <td>Kelas Tidak Puas</td>
                            <td><?php echo $get_tampil4['m_terlambat']; ?></td>
                            <td><?php echo $get_tampil4['s_terlambat']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Atribut (C6) kesesuaian produk pelayanan</h5>
                <table class="table table-sm mb-0" style="text-align:center">
                    <thead class="table" style="background-color: #2c5364; color:white;">
                        <tr>
                            <th>Kelas</th>
                            <th>Mean</th>
                            <th>Standar Deviasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Kelas Puas</td>
                            <td><?php echo $get_tampil8['m_tepat']; ?></td>
                            <td><?php echo $get_tampil8['s_tepat']; ?></td>
                        </tr>
                        <tr>
                            <td>Kelas Tidak Puas</td>
                            <td><?php echo $get_tampil8['m_terlambat']; ?></td>
                            <td><?php echo $get_tampil8['s_terlambat']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- row akhir -->
<!--row awal -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Atribut (C7) Kemampuan petugas memberi pelayanan</h5>
                <table class="table table-sm mb-0" style="text-align:center">
                    <thead class="table" style="background-color: #2c5364; color:white;">
                        <tr>
                            <th>Kelas</th>
                            <th>Mean</th>
                            <th>Standar Deviasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Kelas Puas</td>
                            <td><?php echo $get_tampil5['m_tepat']; ?></td>
                            <td><?php echo $get_tampil5['s_tepat']; ?></td>
                        </tr>
                        <tr>
                            <td>Kelas Tidak Puas</td>
                            <td><?php echo $get_tampil5['m_terlambat']; ?></td>
                            <td><?php echo $get_tampil5['s_terlambat']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Atribut (C8) Kesopanan & keramahan petugas</h5>
                <table class="table table-sm mb-0" style="text-align:center">
                    <thead class="table" style="background-color: #2c5364; color:white;">
                        <tr>
                            <th>Kelas</th>
                            <th>Mean</th>
                            <th>Standar Deviasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Kelas Puas</td>
                            <td><?php echo $get_tampil9['m_tepat']; ?></td>
                            <td><?php echo $get_tampil9['s_tepat']; ?></td>
                        </tr>
                        <tr>
                            <td>Kelas Tidak Puas</td>
                            <td><?php echo $get_tampil9['m_terlambat']; ?></td>
                            <td><?php echo $get_tampil9['s_terlambat']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- row akhir -->
<!--row awal -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Atribut (C9) Sarana dan Prasarana</h5>
                <table class="table table-sm mb-0" style="text-align:center">
                    <thead class="table" style="background-color: #2c5364; color:white;">
                        <tr>
                            <th>Kelas</th>
                            <th>Mean</th>
                            <th>Standar Deviasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Kelas Puas</td>
                            <td><?php echo $get_tampil6['m_tepat']; ?></td>
                            <td><?php echo $get_tampil6['s_tepat']; ?></td>
                        </tr>
                        <tr>
                            <td>Kelas Tidak Puas</td>
                            <td><?php echo $get_tampil6['m_terlambat']; ?></td>
                            <td><?php echo $get_tampil6['s_terlambat']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Atribut (C10) Mekanisme sarana pengaduan pengguna layanan</h5>
                <table class="table table-sm mb-0" style="text-align:center">
                    <thead class="table" style="background-color: #2c5364; color:white;">
                        <tr>
                            <th>Kelas</th>
                            <th>Mean</th>
                            <th>Standar Deviasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Kelas Puas</td>
                            <td><?php echo $get_tampil10['m_tepat']; ?></td>
                            <td><?php echo $get_tampil10['s_tepat']; ?></td>
                        </tr>
                        <tr>
                            <td>Kelas Tidak Puas</td>
                            <td><?php echo $get_tampil10['m_terlambat']; ?></td>
                            <td><?php echo $get_tampil10['s_terlambat']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- row akhir -->
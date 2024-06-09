<!-- header -->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Form Prediction</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="user.php"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Prediction</li>
            </ol>
        </nav>
    </div>
</div>
<!-- row awal -->
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Form Layout</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">C1</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input required="" type="number" name="jumlah_mk" placeholder="Jumlah Mata Kuliah" class="form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">C2</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input required type="number" name="absensi" placeholder="Jumlah Absensi" class="form-control" step="0.01" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">C3</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input required type="number" name="sks_s1" placeholder="Jumlah SKS Semester 1" class="form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">C4</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input required type="number" name="sks_s2" placeholder="Jumlah SKS Semester 2" class="form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">C5</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input required type="number" name="sks_s3" placeholder="Jumlah SKS Semester 3" class="form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">C6</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input required type="number" name="sks_s4" placeholder="Jumlah SKS Semester 4" class="form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">C7</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input required type="number" name="ips_s1" placeholder="Jumlah IPS Semester 1" class="form-control" step="0.01" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">C8</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input required type="number" name="ips_s2" placeholder="Jumlah IPS Semester 2" class="form-control" step="0.01" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">C9</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input required type="number" name="ips_s3" placeholder="Jumlah IPS Semester 3" class="form-control" step="0.01" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">C10</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input required type="number" name="ips_s4" placeholder="Jumlah IPS Semester 4" class="form-control" step="0.01" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9 text-secondary">
                            <button name="submit" type="submit" value="submit" class="btn btn-primary px-4">Prediction</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php

include "koneksi.php";

if ($_POST['submit'] == "submit") {

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
                    footer: 'Silahkan Hub. Administrator ...',
                    showConfirmButton: false
                });  
            },10); 
            window.setTimeout(function(){ 
            window.location.replace('user.php?page=form-prediction');
            } ,3000);</script>";
    } else {

        $jumlah_mk   = $_POST['jumlah_mk'];
        $absensi     = $_POST['absensi'];
        $sks_s1      = $_POST['sks_s1'];
        $sks_s2      = $_POST['sks_s2'];
        $sks_s3      = $_POST['sks_s3'];
        $sks_s4      = $_POST['sks_s4'];
        $ips_s1      = $_POST['ips_s1'];
        $ips_s2      = $_POST['ips_s2'];
        $ips_s3      = $_POST['ips_s3'];
        $ips_s4      = $_POST['ips_s4'];

        $insert = "INSERT INTO data_uji (jumlah_mk,absensi, sks_s1, sks_s2, sks_s3, sks_s4, ips_s1, ips_s2, ips_s3, ips_s4, kelas, kelas_prediksi) VALUES 
                 ('$jumlah_mk','$absensi','$sks_s1', '$sks_s2', '$sks_s3', '$sks_s4','$ips_s1','$ips_s2','$ips_s3','$ips_s4','','')";
        $query = mysqli_query($koneksi, $insert);

        if ($query) {
            echo "<script>
                                window.location.href='user.php?page=prediction';
                        </script>";
        } else {
            echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
        }
    }
}
?>
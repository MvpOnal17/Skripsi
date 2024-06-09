<?php

include "koneksi.php";
$tampilUser = mysqli_query($koneksi, "SELECT * FROM data_uji ORDER BY id ");

?>

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Dataset</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="konten.php"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Test Data</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleDangerModal"><i class='bx bx-trash mr-1'></i>Delete Data</button>
            <!-- Modal -->
            <div class="modal fade" id="exampleDangerModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-danger">
                        <div class="modal-header">
                            <h5 class="modal-title text-white">WARNING !!!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-white">
                            <p>Tindakan ini akan menghapus semua Data Test, Jika anda yakin maka klik "Yes"</p>
                        </div>
                        <div class="modal-footer">
                            <form method="post" enctype="multipart/form-data" action="">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-dark" name="delete" type="delete">Yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- akhir modal -->
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row row-cols-auto g-3">
            <div class="col">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-import"><i class='bx bx-cloud-upload mr-1'></i>Import Data</button>
            </div>

            <div class="col">
                <a href="cetak/cetak-uji.php" class="btn btn-dark px-3 radius-30"><i class='bx bx-cloud-download mr-1'></i>Export Data</a>
            </div>
            <div class="w-100 border-top"></div>
            <div class="col">
                <a href="konten.php?page=test-classifier" class="btn btn-success px-3 radius-30"> <i class="bx bx-play mr-1"></i></i>Start Test</a>
            </div>

        </div>
    </div>
</div>
<!-- modal import -->
<div class="modal fade" id="modal-import" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Import Excel File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="konten.php?page=import-test-data">
                    <div class="row">
                        <div class="col-xl-9 mx-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="inputGroupFile02" name="userfile" accept=".xls">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                    <div class="input-group mb-3">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        &nbsp;
                                        <button name="submit" type="submit" class="btn btn-primary">Save
                                            changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="mb-0 text-uppercase">Untuk Menghindari Kegagalan Upload File, Silahkan Unduh File Template dibawah ini !!!</h6>
                                <hr />
                                <a href="cetak/template-excel.php" type="button" class="btn btn-warning px-3 radius-30"> <i class='bx bx-cloud-download mr-1'></i>Unduh Template</a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- akhir modal -->


<h6 class="mb-0 text-uppercase">Train Data Table</h6>
<hr />
<div class="card">
    <div class="card-body">
        <div class="col">
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-add"><i class='bx bx-plus mr-1'></i>Add Data</button>
        </div> <br>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" data-show-pagination-switch="true">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>C1</th>
                        <th>C2</th>
                        <th>C3</th>
                        <th>C4</th>
                        <th>C5</th>
                        <th>C6</th>
                        <th>C7</th>
                        <th>C8</th>
                        <th>C9</th>
                        <th>C10</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomer = 0;
                    while ($user = mysqli_fetch_array($tampilUser)) {
                        $nomer++;
                    ?>
                        <tr>
                            <td><?php echo $nomer; ?></td>
                            <td><?php echo $user['jumlah_mk']; ?></td>
                            <td><?php echo $user['absensi']; ?></td>
                            <td><?php echo $user['sks_s1']; ?></td>
                            <td><?php echo $user['sks_s2']; ?></td>
                            <td><?php echo $user['sks_s3']; ?></td>
                            <td><?php echo $user['sks_s4']; ?></td>
                            <td><?php echo $user['ips_s1']; ?></td>
                            <td><?php echo $user['ips_s2']; ?></td>
                            <td><?php echo $user['ips_s3']; ?></td>
                            <td><?php echo $user['ips_s4']; ?></td>
                            <td><?php echo $user['kelas']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-add" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title ">Form Add Test Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">C1</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input required="" type="number" name="jumlah_mk" placeholder="Kesesuaian persyaratan pelayanan" class="form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">C2</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input required type="number" name="absensi" placeholder="Kemudahan prosedur pelayanani" class="form-control" step="0.01" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">C3</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input required type="number" name="sks_s1" placeholder="Ketepatan penyelesaian layanan" class="form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">C4</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input required type="number" name="sks_s2" placeholder="Biaya" class="form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">C5</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input required type="number" name="sks_s3" placeholder="Tanggung jawab petugas dalam pelayanan" class="form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">C6</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input required type="number" name="sks_s4" placeholder="kesesuaian produk pelayanan yang tercantum dalam standar pelayanan" class="form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">C7</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input required type="number" name="ips_s1" placeholder="Kemampuan petugas memberi pelayanan" class="form-control" step="0.01" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">C8</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input required type="number" name="ips_s2" placeholder="Kesopanan & keramahan petugas" class="form-control" step="0.01" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">C9</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input required type="number" name="ips_s3" placeholder="Sarana dan Prasarana" class="form-control" step="0.01" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">C10</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input required type="number" name="ips_s4" placeholder="Mekanisme sarana pengaduan pengguna layanan" class="form-control" step="0.01" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Kelas</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input class="form-check-input" type="radio" name="kelas" id="flexRadioDefault1" value="Puas" required>
                            <label class="form-check-label" for="flexRadioDefault1">Puas</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input class="form-check-input" type="radio" name="kelas" id="flexRadioDefault2" value="Tidak Puas" required>
                            <label class="form-check-label" for="flexRadioDefault2">Tidak Puas</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9 text-secondary">
                            <button name="submit" type="submit" value="submit" class="btn btn-primary px-4">Add
                                Data</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- akhir modal -->

<div class="card">
    <div class="card-body">
        <ul class="nav nav-tabs nav-primary" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class='bx bx-pie-chart-alt font-18 me-1'></i>
                        </div>
                        <div class="tab-title">Keterangan</div>
                    </div>
                </a>
            </li>
        </ul>
        <div class="tab-content py-3">
            <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                <h3>Keterangan C1 - C10</h3>
                <h5>C1 ini adalah Bagaimana Pendapat saudara tentang kesesuaian persyaratan pelayanan dengan jenis
                    pelayanannya?</h5>
                <h5>C2 ini adalah Bagaimana pemahaman saudara tentang kemudahan prosedur pelayanan di unit ini?</h5>
                <h5>C3 ini adalah Bagaimana Pendapat Saudara tentang kecepatan waktu dalam memberikan pelayanan?</h5>
                <h5>C4 ini adalah Bagaimana pendapat Saudara tentang kenyamanan di lingkungan unit pelayanan?</h5>
                <h5>C5 ini adalah Bagaimana pendapat Anda tentang tanggung jawab petugas dalam memberikan pelayanan?
                </h5>
                <h5>C6 ini adalah Bagaimana pendapat saudara tentang kesesuaian produk pelayanan anatara yang tercantum
                    dalam standar pelayanan dengan hasil yang diberikan?</h5>
                <h5>C7 ini adalah Bagaimana pendapat saudara tentang Kompetensi/kemampuan petugas dalam pelayanan?
                </h5>
                <h5>C8 ini adalah Bagaimana pendapat saudara mengenai perilaku petugas dalam pelayanan terkait kesopanan
                    dan keramahan?</h5>
                <h5>C9 ini adalah Bagaimana pendapat saudara tentang kualitas sarana dan prasarana ?</h5>
                <h5>C10 ini adalah Bagaimana Pendapat saudara tentang penaganan pengaduan pengguna layanan?</h5>
            </div>
        </div>
    </div>
</div>

<?php

if (isset($_POST['delete'])) {
    $sql_del1 = mysqli_query($koneksi, "TRUNCATE data_uji");
    $sql_del2 = mysqli_query($koneksi, "TRUNCATE gausian");
    $sql_del3 = mysqli_query($koneksi, "TRUNCATE hitung_uji");

    if ($sql_del1) {
        echo "<script type='text/javascript'>
                setTimeout(function () {  
                Lobibox.notify('success', {
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    icon: 'bx bx-x-circle',
                    msg: 'Semua Data Training berhasil dihapus !!!'
                });
                },10); 
            window.setTimeout(function(){ 
            window.location.replace('konten.php?page=test-data');
            } ,3000);
        </script>";
    }
}

if ($_POST['submit'] == "submit") {
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
    $kelas       = $_POST['kelas'];

    include "koneksi.php";

    $insert = "INSERT INTO data_uji (jumlah_mk,absensi, sks_s1, sks_s2, sks_s3, sks_s4, ips_s1, ips_s2, ips_s3, ips_s4, kelas, kelas_prediksi) VALUES 
         ('$jumlah_mk','$absensi','$sks_s1', '$sks_s2', '$sks_s3', '$sks_s4','$ips_s1','$ips_s2','$ips_s3','$ips_s4','$kelas','')";
    $query = mysqli_query($koneksi, $insert);

    if ($query) {
        echo "<script type='text/javascript'>
                        setTimeout(function () {  
                            swal.fire
                            ({
                                title: 'Sukses !',
                                text:  'Data Berhasil Disimpan',
                                type: 'success',
                                timer: 3000,
                                footer: 'Tunggu Beberapa Saat ...',
                                showConfirmButton: false
                            });  
                        },10); 
                            window.setTimeout(function(){ 
                            window.location.replace('konten.php?page=test-data');
                        } ,3000);
                      </script>";
    } else {
        echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
    }
}


?>
<?php
include "koneksi.php";
include "grafik.php";

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
            window.location.replace('user.php');
            } ,3000);</script>";
} else {
    /*perhitungan akurasi*/
    $que = mysqli_query($koneksi, "SELECT * FROM data_uji");
    $jumlah_uji = mysqli_num_rows($que);
    $TP = $FP = $TN = $FN = 0;
    $kosong = 0;
    while ($row = mysqli_fetch_array($que)) {
        $asli = $row['kelas'];
        $prediksi = $row['kelas_prediksi'];
        if ($asli == 'Tepat' & $prediksi == 'Tepat') {
            $TP++;
        } else if ($asli == 'Tepat' & $prediksi == 'Terlambat') {
            $FP++;
        } else if ($asli == 'Terlambat' & $prediksi == 'Tepat') {
            $FN++;
        } else if ($asli == 'Terlambat' & $prediksi == 'Terlambat') {
            $TN++;
        } else if ($prediksi == '') {
            $kosong++;
        }
    }

    $tepat      = ($TP + $TN);
    $tidak_tepat = ($FP + $FN + $kosong);

    $F_Rate     = ($tidak_tepat / $jumlah_uji) * 100;
    $F_Rate     = round($F_Rate, 2);

    $akurasi    = ($tepat / $jumlah_uji) * 100;
    $akurasi    = round($akurasi, 2);

    $presisi    = ($TP / ($TP + $FP)) * 100;
    $presisi    = round($presisi, 2);

    $recall     = ($TP / ($TP + $FN)) * 100;
    $recall     = round($recall);

    $F1_score   = 2 * ($presisi * $recall) / ($presisi + $recall);
    $F1_score   = round($F1_score, 2);

    $spesi      = ($TN / ($TN + $FP));
    $spesi      = round($spesi, 2);

    $auc        = (($recall + $spesi) / 2);
    $auc        = round($auc, 2);
}
?>

<!-- header -->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Confusion Matrix</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="user.php"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Confusion Matrix</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <!-- Button trigger modal -->
        </div>
    </div>
</div>
<!-- row awal -->
<div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
    <div class="col"><!-- 
		<h6 class="mb-0 text-uppercase">Performance Vector</h6> -->
        <hr />
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-primary" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class='bx bx-pie-chart-alt font-18 me-1'></i>
                                </div>
                                <div class="tab-title">Performance Vector</div>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="tab-content py-3">
                    <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Variable</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><b>Accuracy</b></td>
                                        <td><span class="badge bg-primary"><?php echo $akurasi ?> %</span></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><b>Precission</b></td>
                                        <td><span class="badge bg-secondary"><?php echo $presisi ?> %</span> </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><b>Recall</b></td>
                                        <td><span class="badge bg-dark"><?php echo $recall ?> %</span> </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><b>F-Rate</b></td>
                                        <td><span class="badge bg-danger"><?php echo $F_Rate ?> %</span></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td><b>F1-Score</b></td>
                                        <td><span class="badge bg-warning text-dark"><?php echo $F1_score ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td><b>AUC(Area Under Curve)</b></td>
                                        <td><span class="badge bg-success"><?php echo $auc ?></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col"><!-- 
		<h6 class="mb-0 text-uppercase">Performance Vector</h6> -->
        <hr />
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-primary" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class='bx bx-pie-chart-alt font-18 me-1'></i>
                                </div>
                                <div class="tab-title">Confusion Matrix</div>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="tab-content py-3">
                    <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                        <div class="table-responsive p-5">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th>Total Test = <?php echo $jumlah_uji ?> Item</th>
                                    <th colspan="2">Prediksi <i class="lni lni-arrow-right"></i></th>

                                </tr>
                                <tr>
                                    <td><b>Aktual <i class="lni lni-arrow-down"></i></b></td>
                                    <td style="font-style: italic;">Puas</td>
                                    <td style="font-style: italic;">Tidak Puas</td>
                                </tr>
                                <tr>
                                    <td style="font-style: italic;">Puas</td>
                                    <td>
                                        <font color="blue"><b><?php echo $TP ?></b></font>
                                    </td>
                                    </td>
                                    <td><?php echo $FP ?></td>
                                </tr>
                                <tr>
                                    <td style="font-style: italic;">Tidak Puas</td>
                                    <td><?php echo $FN ?></td>
                                    <td>
                                        <font color="blue"><b><?php echo $TN ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <h6 class="mb-0 text-uppercase">Presentage Class For Test Data</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="chart-container1">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!--end row-->
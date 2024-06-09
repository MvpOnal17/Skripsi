<?php
error_reporting(0);
include "koneksi.php";
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
                footer: 'Silahkan Hub. Administrator ...',
                showConfirmButton: false
            });  
        },10); 
            window.setTimeout(function(){ 
            window.location.replace('user.php');
            } ,3000);</script>";
} else {
	$tampil_data  = mysqli_query($koneksi, "SELECT * FROM data_uji ORDER BY id DESC ");
	$total_uji	  = mysqli_num_rows($tampil_data);

	$tampilhitung = mysqli_query($koneksi, "SELECT * FROM hitung_uji ORDER BY id ");

	$gausian 	  = mysqli_query($koneksi, "SELECT A.*, (SELECT COUNT(id_uji) FROM gausian WHERE id_uji=A.id_uji) AS jumlah FROM gausian A");
}
?>

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Result Classification</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="user.php"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Result Classification</li>
			</ol>
		</nav>
	</div>
</div>
<!-- row awal -->
<div class="row">
	<div class="col">
		<h6 class="mb-0 text-uppercase">Result Classification <?php echo "$total_uji"; ?> Total Test Data</h6>
		<hr />
		<div class="card">
			<div class="card-body">
				<ul class="nav nav-tabs nav-primary" role="tablist">
					<li class="nav-item" role="presentation">
						<a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
							<div class="d-flex align-items-center">
								<div class="tab-icon"><i class='bx bx-pie-chart-alt font-18 me-1'></i>
								</div>
								<div class="tab-title">Result</div>
							</div>
						</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false">
							<div class="d-flex align-items-center">
								<div class="tab-icon"><i class='bx bx-bar-chart-square font-18 me-1'></i>
								</div>
								<div class="tab-title">Gaussian</div>
							</div>
						</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab" aria-selected="false">
							<div class="d-flex align-items-center">
								<div class="tab-icon"><i class='bx bx-bar-chart font-18 me-1'></i>
								</div>
								<div class="tab-title">Probability Class</div>
							</div>
						</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" href="user.php?page=confusion-matrix" role="tab" aria-selected="false">
							<div class="d-flex align-items-center">
								<div class="tab-icon"><i class='bx bx-trending-up font-18 me-1'></i>
								</div>
								<div class="tab-title">Confusion Matrix</div>
							</div>
						</a>
					</li>
				</ul>
				<div class="tab-content py-3">
					<div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered" data-show-pagination-switch="true">
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
										<th>Kelas</th>
										<th>Prediksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$nomer = 0;
									while ($test = mysqli_fetch_array($tampil_data)) {
										$nomer++;
									?>
										<tr>
											<td><?php echo $nomer; ?></td>
											<td><?php echo $test['jumlah_mk']; ?></td>
											<td><?php echo $test['absensi']; ?></td>
											<td><?php echo $test['sks_s1']; ?></td>
											<td><?php echo $test['sks_s2']; ?></td>
											<td><?php echo $test['sks_s3']; ?></td>
											<td><?php echo $test['sks_s4']; ?></td>
											<td><?php echo $test['ips_s1']; ?></td>
											<td><?php echo $test['ips_s2']; ?></td>
											<td><?php echo $test['ips_s3']; ?></td>
											<td><?php echo $test['ips_s4']; ?></td>
											<td><?php echo $test['kelas']; ?></td>
											<td><?php echo $test['kelas_prediksi']; ?></td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="tab-pane fade" id="primaryprofile" role="tabpanel">
						<div class="table-responsive">
							<table id="example4" class="table table-striped table-bordered" data-show-pagination-switch="true">
								<thead>
									<tr>
										<th>ID Test Data</th>
										<th>Kelas</th>
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
									</tr>
								</thead>
								<tbody>
									<?php
									$nomer = 0;
									while ($gaus = mysqli_fetch_array($gausian)) {
										$nomer++;
									?>
										<tr>
											<?php
											if ($jum <= 1) {
												echo '<td rowspan="' . $gaus['jumlah'] . '">' . $gaus['id_uji'] . '</td>';
												$jum = $gaus['jumlah'];
											} else {
												$jum = $jum - 1;
											}
											?>
											<td>&nbsp;<?php echo $gaus['iterasi']; ?></td>
											<td><?php echo $gaus['jumlah_mk']; ?></td>
											<td><?php echo $gaus['absensi']; ?></td>
											<td><?php echo $gaus['sks_s1']; ?></td>
											<td><?php echo $gaus['sks_s2']; ?></td>
											<td><?php echo $gaus['sks_s3']; ?></td>
											<td><?php echo $gaus['sks_s4']; ?></td>
											<td><?php echo $gaus['ips_s1']; ?></td>
											<td><?php echo $gaus['ips_s2']; ?></td>
											<td><?php echo $gaus['ips_s3']; ?></td>
											<td><?php echo $gaus['ips_s4']; ?></td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="tab-pane fade" id="primarycontact" role="tabpanel">
						<div class="table-responsive">
							<table id="example3" class="table table-striped table-bordered" data-show-pagination-switch="true">
								<thead>
									<tr>
										<th>Literasi</th>
										<th>Probabilitas Puas</th>
										<th>Probabilitas Tidak Puas</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$nomeri = 0;
									while ($pro = mysqli_fetch_array($tampilhitung)) {
										$nomeri++;
									?>
										<tr>
											<td>&nbsp; <?php echo $nomeri; ?></td>
											<td>&nbsp; <?php echo $pro['p_tepat']; ?></td>
											<td>&nbsp; <?php echo $pro['p_terlambat']; ?></td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!--end row-->
<?php

include "koneksi.php";

$tampil =mysqli_query($koneksi, "SELECT * FROM `data_uji` ORDER BY id DESC limit 1 ");
$get_tampil =mysqli_fetch_array($tampil) ;

$tampil2 =mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
$get_tampil2 =mysqli_fetch_array($tampil2) ;

$tampil3 =mysqli_query($koneksi, "SELECT * FROM `hitung_uji` ORDER BY id DESC limit 1 ");
$get_tampil3 =mysqli_fetch_array($tampil3) ;

if ($get_tampil['kelas'] == "") {
    mysqli_query($koneksi, "UPDATE data_uji set kelas = '$get_tampil[kelas_prediksi]' where id = '$get_tampil[id]'");

}

?>

<div class="row">
	<div class="col col-lg-9 mx-auto">
		<div class="card bg-transparent shadow-none">
			<div class="card-body">
				<h5 class="card-title">Hasil Prediksi</h5>
				<hr/>
				<div class="alert alert-primary border-0 bg-primary bg-gradient">
					<div class="d-flex align-items-center">
						<div class="font-35 text-white"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="ms-3">
							<h6 class="mb-0 text-white text-uppercase"><?php echo ($get_tampil[kelas_prediksi])?></h6>
							<div class="text-white">Hasil ini adalah hasil yang diperoleh menggunakan perhitungan algoritma Naive Bayes</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card bg-transparent shadow-none">
			<div class="card-body">
				<h5 class="card-title">Data Prediksi Yang Kamu Masukkan Adalah</h5>
				<hr/>
				<div class="alert border-0 border-start border-5 border-primary ">
					<div>Jumlah MK = <?php echo ($get_tampil[jumlah_mk])?></div>
				</div>
				<div class="alert border-0 border-start border-5 border-secondary ">
					<div class="">Absensi = <?php echo ($get_tampil[absensi])?> (%)</div>
				</div>
				<div class="alert border-0 border-start border-5 border-success ">
					<div>SKS S1 = <?php echo ($get_tampil[sks_s1])?></div>
					<div>SKS S2 = <?php echo ($get_tampil[sks_s2])?></div>
					<div>SKS S3 = <?php echo ($get_tampil[sks_s3])?></div>
					<div>SKS S4 = <?php echo ($get_tampil[sks_s4])?></div>
				</div>
				<div class="alert  border-0 border-start border-5 border-warning ">
					<div>IPS S1 = <?php echo ($get_tampil[ips_s1])?></div>
					<div>IPS S2 = <?php echo ($get_tampil[ips_s2])?></div>
					<div>IPS S3 = <?php echo ($get_tampil[ips_s3])?></div>
					<div>IPS S4 = <?php echo ($get_tampil[ips_s4])?></div>
				</div>
				<div class="alert border-0 border-start border-5 border-dark ">
					<div>Tekan tombol selesai jika sudah melakukan prediksi</div>
					<div>
						<form method="post" action="" enctype="multipart/form-data">
						<button name="delete" type="delete" class="btn btn-primary px-4"><i class='bx bx-check-square mr-1'></i>Selesai</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php

if (isset($_POST['delete'])) {
    $sql =  mysqli_query($koneksi, "DELETE FROM data_uji where id='$get_tampil[id]'");

if ($sql) {
    echo "<script type='text/javascript'>
        setTimeout(function () {  
            swal.fire
            ({
                title: 'Sukses !',
                text:  'Kamu telah menyelesaikan prediksi',
                type: 'success',
                timer: 3000,
                footer: 'Tunggu Beberapa Saat ...',
                showConfirmButton: false
            });  
        },10); 
            window.setTimeout(function(){ 
            window.location.replace('user.php?page=form-prediction');
        } ,3000);
    </script>";
    }
}
?>
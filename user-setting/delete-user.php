<?php
include "koneksi.php";
if (isset($_GET['username'])) {
	$username = $_GET['username'];
	$query   = "SELECT * FROM user WHERE username='$username'";
	$hasil   = mysqli_query($koneksi, $query);
	$data    = mysqli_fetch_array($hasil);
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	
	if (!empty($username) && $username != "") {
		$delete = "DELETE FROM user WHERE username='$username'";
		$sqldel = mysqli_query ($koneksi, $delete);		

	}
	mysqli_close($Open);

?>
    <script type='text/javascript'>
        setTimeout(function () {  
            swal.fire
            ({
                title: 'Sukses !',
                text:  'Akun Berhasil Dihapus',
                type: 'success',
                timer: 3000,
                footer: 'Tunggu Beberapa Saat ...',
                showConfirmButton: false
            });  
        },10); 
            window.setTimeout(function(){ 
            window.location.replace('konten.php?page=users-data');
        } ,3000);
    </script>


<?php	
	if ($_POST['submit'] == "submit") {
	$nama		=$_POST['nama'];
	$username	=$_POST['username'];
	$email		=$_POST['email'];
	$password	=$_POST['password'];
	$hak_akses	=$_POST['hak_akses'];
	$hashed_password = password_hash($password, PASSWORD_BCRYPT);
	
	
	include "koneksi.php";

	$cekuser	=mysqli_num_rows (mysqli_query($koneksi, "SELECT username FROM user WHERE username='$_POST[username]'"));
	$cekemail	=mysqli_num_rows (mysqli_query($koneksi, "SELECT email FROM user WHERE email='$_POST[email]'"));

	if (empty($_POST['username'])  || empty($_POST['password'])) {
		echo "	<script>
					alert('Pastikan Data Tidak Kosong');
						window.location.href='konten.php?page=users-data';
				</script>";
		}
		
		else if($cekuser > 0 OR $cekmail > 0) {
		echo "<script type='text/javascript'>
				        setTimeout(function () {  
				            swal.fire
				            ({
				                title: 'Gagal !',
				                text:  'Username Ganda !!!',
				                type: 'warning',
				                timer: 3000,
				                footer: 'Tunggu Beberapa Saat ...',
				                showConfirmButton: false
				            });  
				        },10); 
				            window.setTimeout(function(){ 
				            window.location.replace('konten.php?page=users-data');
				        } ,3000);
				      </script>";
		}

		else if($cekemail > 0) {
		echo "<script type='text/javascript'>
				        setTimeout(function () {  
				            swal.fire
				            ({
				                title: 'Gagal !',
				                text:  'Email Ganda !!!',
				                type: 'warning',
				                timer: 3000,
				                footer: 'Tunggu Beberapa Saat ...',
				                showConfirmButton: false
				            });  
				        },10); 
				            window.setTimeout(function(){ 
				            window.location.replace('konten.php?page=users-data');
				        } ,3000);
				      </script>";
		}
		
		else{

			$insert = "INSERT INTO user (username, nama, email, password, hak_akses, Aktif) VALUES ( '$username','$nama', '$email','$hashed_password', '$hak_akses','Tidak Aktif')";
			$query = mysqli_query ($koneksi, $insert);
			
			if($query){
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
				            window.location.replace('konten.php?page=users-data');
				        } ,3000);
				      </script>";
				}
				else {
					echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}

	}
?>
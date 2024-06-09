<?php

//memulai session
/*session_start();*/

/*   //jika ditemukan session, maka user akan otomatis dialihkan ke halaman admin
    if (isset($_SESSION['username'])) {
        header("Location: konten.php");
    }
*/
//include koneksi database
require_once "koneksi.php";

//jika tombol login ditekan, maka akan mengirimkan variabel yang berisi username dan password
if (isset($_POST['submit'])) {
  $username = mysqli_real_escape_string($koneksi, $_POST['username']);
  $userpass = mysqli_real_escape_string($koneksi, $_POST['password']); //password yang di inputkan oleh user lewat form login

  //query ke database
  $sql = mysqli_query($koneksi, "SELECT username, password, nama, hak_akses, aktif FROM user WHERE username = '$username'");
  $update = mysqli_query($koneksi, "UPDATE user SET last_login_time = CURRENT_TIMESTAMP  WHERE username='$username'");

  list($username, $password, $nama, $hak_akses, $aktif) = mysqli_fetch_array($sql);

  //jika data ditemukan dalam database, maka akan melakukan validasi dengan password_verify
  if (mysqli_num_rows($sql) > 0) {

    /*
            validasi login dengan password_verify
            $userpass -----> diambil dari password yang diinputkan user lewat form login
            $password -----> diambil dari password dalam database
            */
    if (password_verify($userpass, $password)) {

      //buat session baru
      session_start();
      $_SESSION['username'] = $username;
      $_SESSION['nama']     = $nama;
      $_SESSION['hak_akses'] = $hak_akses;
      $_SESSION['aktif']    = $aktif;

      //jika login berhasil, user akan diarahkan ke halaman admin
      if ($hak_akses == 'Admin') {
        echo "<script type='text/javascript'>
                       window.location.replace('konten.php');
                      </script>";
      } else if ($hak_akses == 'User') {
        echo "<script type='text/javascript'>
                       window.location.replace('user.php');
                      </script>";
      } else if ($aktif == 'Tidak Aktif') {
        echo "<script type='text/javascript'>
                          setTimeout(function () {  
                          swal.fire
                          ({
                          title: 'Opps',
                          text:  'Akun anda Tidak Aktif !!!',
                          type: 'danger',
                          timer: 10000,
                          showConfirmButton: false,
                          footer: 'Tunggu Beberapa Saat ...',
                          });  
                        },10); 
                            window.setTimeout(function(){ 
                          window.location.replace('index.php');
                          } ,3000);</script>";
      }
    } else {
      echo "<script type='text/javascript'>
                          setTimeout(function () {  
                          swal.fire
                          ({
                          title: 'Opps',
                          text:  'Password Salah !',
                          type: 'warning',
                          timer: 10000,
                          showConfirmButton: false,
                          footer: 'Tunggu Beberapa Saat ...',
                          });  
                        },10); 
                            window.setTimeout(function(){ 
                          window.location.replace('index.php');
                          } ,3000);</script>";
    }
  } else {
    //Jika password tidak cocok, maka user akan diarahkan ke form login dan menampilkan pesan error
    echo "<script type='text/javascript'>
                          setTimeout(function () {  
                          swal.fire
                          ({
                          title: 'Opps',
                          text:  'Username atau Password Salah !',
                          type: 'question',
                          timer: 10000,
                          showConfirmButton: false,
                          footer: 'Tunggu Beberapa Saat ...',
                          });  
                        },10); 
                            window.setTimeout(function(){ 
                          window.location.replace('index.php');
                          } ,3000);</script>";
  }
}

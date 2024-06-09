 <?php
     if (isset ($_SESSION['username'])){
    $username = $_SESSION['username'];
    }
    include "koneksi.php";
    $tampilPeg  = mysqli_query($koneksi, "SELECT * FROM user WHERE username='" . $_SESSION["username"] . "'");
    $hasil      = mysqli_fetch_array ($tampilPeg);

 if ($_POST['ganti'] == "ganti") {
        $password       =$_POST['password'];
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $update= mysqli_query ($koneksi, "UPDATE user SET password='$hashed_password' WHERE username='" . $_SESSION["username"] . "'");
                if($update){
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
                                    window.location.replace('aksi-login/logout.php');
                                } ,3000);
                              </script>";
                }
                else {
                    echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
                }
            }
        ?>
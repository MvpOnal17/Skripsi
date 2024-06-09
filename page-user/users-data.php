 <?php

 error_reporting(0);
    if (isset ($_SESSION['username'])){
    $username = $_SESSION['username'];
    }
    include "koneksi.php";
    $datauser=mysqli_query($koneksi, "SELECT * FROM user order by username ");

    $tampilPeg  = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
    $hasil  = mysqli_fetch_array ($tampilPeg);
    $old_pass   = $hasil['password'];
?>
<!-- header -->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">User Settings</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="user.php"><i class="bx bx-home-alt"></i></a>
                    </li>
                <li class="breadcrumb-item active" aria-current="page">User Settings</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <div class="mt-3">
                                <h4><?php echo $hasil['nama'];?></h4>
                                <p class="text-secondary mb-1"><?php echo $hasil['status'];?></p>
                                <p class="text-muted font-size-sm">Sistem Prediksi - Naive Bayes</p>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <h6 class="mb-0 text-capitalize text-info text-center">Informasi Tentang Administrator</h6>
                        <hr class="my-4" />
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                                <span class="text-secondary">https://pengalaman-edukasi.com</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github me-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                                <span class="text-secondary">Etc</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                                <span class="text-secondary">@muizyonk_hay</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                                <span class="text-secondary">Muiz Khalimy</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                                <span class="text-secondary">Muiz Khalimy</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <h6 class="mb-0 text-uppercase">Edit Data</h6>
                <hr/>
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input required type="text" name="nama" placeholder="Nama Lengkap" class="form-control" 
                                    value="<?php echo $hasil['nama'];?>" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">E-mail</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input required name="email" id="email" type="email" class="form-control" value="<?php echo $hasil['email'];?>"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <button name="edit" type="submit" value="edit" class="btn btn-primary px-4">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0 text-uppercase">Ganti Passord</h6>
                        <hr/>
                        <div class="card">
                            <div class="card-body">
                               <form action="user.php?page=ganti-sandi" method="POST" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">New Password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input required type="password" class="form-control" placeholder="password baru" name="password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <button name="ganti" type="submit" value="ganti" class="btn btn-primary px-4">Save Changes</button>
                                </div>
                            </div>
                        </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<?php
    if (isset ($_SESSION['username'])){
    $username = $_SESSION['username'];
    }
    include "koneksi.php";
    $tampilPeg  = mysqli_query($koneksi, "SELECT * FROM user WHERE username='" . $_SESSION["username"] . "'");
    $hasil      = mysqli_fetch_array ($tampilPeg);

                
    if ($_POST['edit'] == "edit") {
        $nama           =$_POST['nama'];
        $email          =$_POST['email'];

                $update= mysqli_query ($koneksi, "UPDATE user SET nama ='$nama', email='$email' WHERE username='" . $_SESSION["username"] . "'");
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
                                    window.location.replace('user.php?page=users-data');
                                } ,3000);
                              </script>";
                }
                else {
                    echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
                }
            }



?>
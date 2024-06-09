<?php
$koneksi = mysqli_connect("localhost", "root", "", "bayes_numerik");

//cek koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database mysqli gagal!!! : " . mysqli_connect_error();
}

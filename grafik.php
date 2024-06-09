<?php

   include "koneksi.php";

    $A ='Puas'; $B ='Tidak Puas';

    $tampilUser=mysqli_query($koneksi, "SELECT * FROM data_uji ORDER BY id");
    $getjumlah =mysqli_num_rows($tampilUser);

    $tampil1     = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah FROM data_latih WHERE kelas = '$A'");
    $row_tampil1 = mysqli_fetch_array($tampil1);
    $get_tampil1 = $row_tampil1['jumlah'];

    $tampil2     = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah FROM data_latih WHERE kelas = '$B'");
    $row_tampil2 = mysqli_fetch_array($tampil2);
    $get_tampil2 = $row_tampil2['jumlah'];


    $sqljumlahA = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah FROM data_uji WHERE kelas = '$A'");
    $rowjumlahA = mysqli_fetch_array($sqljumlahA);
    $getjumlahA = $rowjumlahA['jumlah'];

    $persenA = ($getjumlahA/$getjumlah)*100;
    $persenA = round($persenA,2);

    $sqljumlahB = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah FROM data_uji WHERE kelas = '$B'");
    $rowjumlahB = mysqli_fetch_array($sqljumlahB);
    $getjumlahB = $rowjumlahB['jumlah'];

    $persenB = ($getjumlahB/$getjumlah)*100;
    $persenB = round($persenB,2);

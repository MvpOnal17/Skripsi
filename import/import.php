 <?php
    // //koneksi ke database, username,password  dan namadatabase menyesuaikan 
    // mysql_connect('localhost', 'root', 'admuzi27');
    // mysql_select_db('datamin');

    //memanggil file excel_reader
    require "import/excel_reader2.php";

    //jika tombol import ditekan
    if (isset($_POST['submit'])) {

        $data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);

        // membaca jumlah baris dari data excel
        $baris = $data->rowcount($sheet_index = 0);

        // nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
        $sukses = 0;
        $gagal = 0;

        //    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
        for ($i = 2; $i <= $baris; $i++) {
            //       membaca data (kolom ke-1 sd terakhir)

            $jenis_kelamin    = $data->val($i, 1);
            $program          = $data->val($i, 2);
            $usia             = $data->val($i, 3);
            $asal_daerah      = $data->val($i, 4);
            $lulus_sma        = $data->val($i, 5);
            $asal_sma         = $data->val($i, 6);
            $status_sekolah   = $data->val($i, 7);
            $jurusan_sma      = $data->val($i, 8);
            $nikah            = $data->val($i, 9);
            $angkatan         = $data->val($i, 10);
            $cuti             = $data->val($i, 11);
            $jumlah_mk        = $data->val($i, 12);
            $absensi          = $data->val($i, 13);
            $sks_s1           = $data->val($i, 14);
            $sks_s2           = $data->val($i, 15);
            $sks_s3           = $data->val($i, 16);
            $sks_s4           = $data->val($i, 17);
            $sks_s5           = $data->val($i, 18);
            $sks_s6           = $data->val($i, 19);
            $sks_s7           = $data->val($i, 20);
            $sks_s8           = $data->val($i, 21);
            $sks_s9           = $data->val($i, 22);
            $sks_s10          = $data->val($i, 23);
            $ips_s1           = $data->val($i, 24);
            $ips_s2           = $data->val($i, 25);
            $ips_s3           = $data->val($i, 26);
            $ips_s4           = $data->val($i, 27);
            $ips_s5           = $data->val($i, 28);
            $ips_s6           = $data->val($i, 29);
            $ips_s7           = $data->val($i, 30);
            $ips_s8           = $data->val($i, 31);
            $ips_s9           = $data->val($i, 32);
            $ips_s10          = $data->val($i, 33);
            $kelas            = $data->val($i, 34);

            //konversi ke angka
            /*      $sks_s5 = empty($sks_s5) ? "'$sks_s5'" : "NULL";
      $sks_s6 = empty($sks_s6) ? "'$sks_s6'" : "NULL";
      $sks_s7 = empty($sks_s7) ? "'$sks_s7'" : "NULL";
      $sks_s8 = empty($sks_s8) ? "'$sks_s8'" : "NULL";
      $sks_s9 = empty($sks_s9) ? "'$sks_s9'" : "NULL";*/


            //setelah data dibaca, masukkan ke tabel pegawai sql
            $query = "INSERT INTO data_mahasiswa (jenis_kelamin, program, usia, asal_daerah, lulus_sma, asal_sma, status_sekolah, jurusan_sma, nikah, angkatan, cuti, jumlah_mk, absensi, sks_s1, sks_s2, sks_s3, sks_s4, sks_s5, sks_s6, sks_s7, sks_s8, sks_s9, sks_s10, ips_s1, ips_s2, ips_s3, ips_s4, ips_s5, ips_s6, ips_s7, ips_s8, ips_s9, ips_s10, kelas) VALUES 
         ('$jenis_kelamin', '$program', '$usia', '$asal_daerah', '$lulus_sma', '$asal_sma', '$status_sekolah', '$jurusan_sma', '$nikah', '$angkatan', '$cuti', '$jumlah_mk', '$absensi', '$sks_s1', '$sks_s2','$sks_s3','$sks_s4','$sks_s5','$sks_s6','$sks_s7','$sks_s8','$sks_s9','$sks_s10','$ips_s1','$ips_s2','$ips_s3','$ips_s4','$ips_s5','$ips_s6','$ips_s7','$ips_s8','$ips_s9','$ips_s10','$kelas')";

            $hasil = mysql_query($query);

            // jika proses insert data sukses, maka counter $sukses bertambah
            // jika gagal, maka counter $gagal yang bertambah
            if ($hasil) $sukses++;
            else $gagal++;
        }
    }

    // tampilan status sukses dan gagal
    echo '<center><br><div class="alert-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert-wrap1 shadow-reset wrap-alert-b">
                                <div class="alert-title">
                                    <h2>Proses Impor Data Selesai !!!</h2>
                                </div>
                                <div class="alert alert-success" role="alert">
                                    <strong> Jumlah Data yang berhasil di impor sebesar </strong>: ' . $sukses . '.
                                </div>
                                <div class="alert alert-danger alert-mg-b" role="alert">
                                    <strong> Jumlah Data yang gagal di impor sebesar </strong>: ' . $gagal . '.
                                </div>
                                <a href="konten.php?page=view-data-latih" type="button" class="btn btn-info"> Lihat Semua Data</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div></center>
<br>';

    ?>
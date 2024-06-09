 <?php

    error_reporting(0);
    //koneksi ke database, username,password  dan namadatabase menyesuaikan 
    include "koneksi.php";

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

            $jumlah_mk       = $data->val($i, 1);
            $absensi         = $data->val($i, 2);
            $sks_s1          = $data->val($i, 3);
            $sks_s2          = $data->val($i, 4);
            $sks_s3          = $data->val($i, 5);
            $sks_s4          = $data->val($i, 6);
            $ips_s1          = $data->val($i, 7);
            $ips_s2          = $data->val($i, 8);
            $ips_s3          = $data->val($i, 9);
            $ips_s4          = $data->val($i, 10);
            $kelas           = $data->val($i, 11);


            //setelah data dibaca, masukkan ke tabel pegawai sql
            $query = "INSERT INTO data_latih (jumlah_mk,absensi, sks_s1, sks_s2, sks_s3, sks_s4, ips_s1, ips_s2, ips_s3, ips_s4, kelas) VALUES 
         ('$jumlah_mk','$absensi','$sks_s1', '$sks_s2', '$sks_s3', '$sks_s4','$ips_s1','$ips_s2','$ips_s3','$ips_s4','$kelas')";

            $hasil = mysqli_query($koneksi, $query);

            // jika proses insert data sukses, maka counter $sukses bertambah
            // jika gagal, maka counter $gagal yang bertambah
            if ($hasil) $sukses++;
            else $gagal++;
        }
    }

    // tampilan status sukses dan gagal
    echo "<script type='text/javascript'>
            setTimeout(function () {  
                swal.fire
            ({
                title: 'Sukses',
                text:  'Data berhasil di simpan !',
                type: 'success',
                timer: 3000,
                footer: 'Tunggu Beberapa Saat ...',
                showConfirmButton: false
                });  
            },10); 
            window.setTimeout(function(){ 
                window.location.replace('konten.php?page=training-data');
        } ,3000);</script>"

    ?>

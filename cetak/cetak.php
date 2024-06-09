<?php


/** Include PHPExcel */
require_once dirname(__FILE__) . '../../PHPExcel/Classes/PHPExcel.php';

$file = new PHPExcel ();
    $file->getProperties ()->setCreator ( "Template" );
    $file->getProperties ()->setLastModifiedBy ( "Template" );
    $file->getProperties ()->setTitle ( "Data Latih" );
    $file->getProperties ()->setSubject ( "Data Latih" );
    $file->getProperties ()->setDescription ( "Data Latih" );
    $file->getProperties ()->setKeywords ( "Data Latih" );
    $file->getProperties ()->setCategory ( "Template Data Latih" );
/*end - BLOCK PROPERTIES FILE EXCEL*/

/*start - BLOCK SETUP SHEET*/
    $file->createSheet ( NULL,0);
    $file->setActiveSheetIndex ( 0 );
    $sheet = $file->getActiveSheet ( 0 );
    //memberikan title pada sheet
    $sheet->setTitle ( "Data Latih" );
/*end - BLOCK SETUP SHEET*/

$style_col = array(
    'font' => array('bold' => true), // Set font nya jadi bold
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
    ),
    'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
    )
);

// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
$style_row = array(
    'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
    ),
    'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
    )
);
/*start - BLOCK HEADER*/
    /* menambahkan baris khusus untuk Judul Header pada Sheet
     * melakukan Merge Cell untuk A1 sampai E1*/
    $file   ->setActiveSheetIndex(0);
    //$file   ->getActiveSheet()->mergeCells('A1:G1');
    $file   ->getActiveSheet()->getStyle('A1:K1')->getFont()->setBold(TRUE);
    $file   ->getActiveSheet()->getStyle('A1:K1')->getFont()->setSize(12);

    /* bagian sini diubah menjadi baris kedua 
     * karena baris pertama telah dipakai untuk judul
     * */
    $file       ->setActiveSheetIndex(0)->setCellValue ( 'A1', "Jumlah MK" );
    $file        ->setActiveSheetIndex(0)->setCellValue ( 'B1', "Absensi(%)" );
    $file        ->setActiveSheetIndex(0)->setCellValue ( 'C1', "SKS S1" );
    $file        ->setActiveSheetIndex(0)->setCellValue ( 'D1', "SKS S2" );
    $file        ->setActiveSheetIndex(0)->setCellValue ( 'E1', "SKS S3" );
    $file        ->setActiveSheetIndex(0)->setCellValue ( 'F1', "SKS S4" );
    $file        ->setActiveSheetIndex(0)->setCellValue ( 'G1', "IPS S1" );
    $file        ->setActiveSheetIndex(0)->setCellValue ( 'H1', "IPS S2" );
    $file        ->setActiveSheetIndex(0)->setCellValue ( 'I1', "IPS S3" );
    $file        ->setActiveSheetIndex(0)->setCellValue ( 'J1', "IPS S4" );
    $file        ->setActiveSheetIndex(0)->setCellValue ( 'K1', "Kelas (*)" );
/*end - BLOCK HEADER*/


/* start - BLOCK MEMASUKAN DATABASE*/
    //ganti dengan database anda
include "../koneksi.php";

    $result =mysqli_query($koneksi, "SELECT * FROM data_latih ORDER BY id ");
    $nomor=1; /*diganti menjadi dua karena baris pertama dipakai untuk header*/
    while($row=mysqli_fetch_array($result)){
        $nomor++;
        $sheet  
                ->setCellValue ( "A".$nomor, $row["jumlah_mk"] )
                ->setCellValue ( "B".$nomor, $row["absensi"] )
                ->setCellValue ( "C".$nomor, $row["sks_s1"] )
                ->setCellValue ( "D".$nomor, $row["sks_s2"] )
                ->setCellValue ( "E".$nomor, $row["sks_s3"] )
                ->setCellValue ( "F".$nomor, $row["sks_s4"] )
                ->setCellValue ( "G".$nomor, $row["ips_s1"] )
                ->setCellValue ( "H".$nomor, $row["ips_s2"] )
                ->setCellValue ( "I".$nomor, $row["ips_s3"] )
                ->setCellValue ( "J".$nomor, $row["ips_s4"] )
                ->setCellValue ( "K".$nomor, $row["kelas"] );
    }
/* end - BLOCK MEMASUKAN DATABASE*/


/*start - BLOK AUTOSIZE*/
    $sheet ->getColumnDimension ( "A" )->setAutoSize ( true );
    $sheet ->getColumnDimension ( "B" )->setAutoSize ( true );
    $sheet ->getColumnDimension ( "C" )->setAutoSize ( true );
    $sheet ->getColumnDimension ( "D" )->setAutoSize ( true );
    $sheet ->getColumnDimension ( "E" )->setAutoSize ( true );
    $sheet ->getColumnDimension ( "F" )->setAutoSize ( true );
    $sheet ->getColumnDimension ( "G" )->setAutoSize ( true );
    $sheet ->getColumnDimension ( "H" )->setAutoSize ( true );
    $sheet ->getColumnDimension ( "I" )->setAutoSize ( true );    
    $sheet ->getColumnDimension ( "J" )->setAutoSize ( true );
    $sheet ->getColumnDimension ( "K" )->setAutoSize ( true );
/*end - BLOG AUTOSIZE*/


/* start - BLOCK MEMBUAT LINK DOWNLOAD*/
    header ( 'Content-Type: application/vnd.ms-excel' );
    //namanya adalah keluarga.xls
    header ( 'Content-Disposition: attachment;filename="Data Training.xls"' ); 
    header ( 'Cache-Control: max-age=0' );
    $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
    $writer->save ( 'php://output' );
/* start - BLOCK MEMBUAT LINK DOWNLOAD*/

?>


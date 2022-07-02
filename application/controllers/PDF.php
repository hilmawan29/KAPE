<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporanpdf extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
    }
    function generate()
    {

        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $ids = $this->input->post("ids_patient");
        if(empty ($ids)) {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nothing to selected!</div>');
          redirect('admin/inputData');
        }else{
        $this->load->model('Patient_model', 'patient');
        $ids_text = implode(',', $ids); 

        $datas = $this->patient->select_all_by_ids($ids_text);
        $pdf = new FPDF('L', 'mm','Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,7,'DATA REKAM MEDIS KLINIK PT. YAKJIN JAYA INDONESIA 2',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(35,6,'Nama Pasien',1,0,'C');
        $pdf->Cell(40,6,'Departemen',1,0,'C');
        $pdf->Cell(25,6,'NIK',1,0,'C');
        $pdf->Cell(30,6,'Tanggal',1,0,'C');
        $pdf->Cell(50,6,'Diagnosa',1,0,'C');
        $pdf->Cell(30,6,'Obat',1,0,'C');
        $pdf->Cell(40,6,'Kesimpulan',1,0,'C');
        $pdf->SetFont('Arial','',10);
        $no=0;
        $pdf->ln(6);
        foreach ($datas as $data){

            $no++;
            $cellWidth=50; //lebar sel
            $cellHeight=5; //tinggi sel satu baris normal
            //periksa apakah teksnya melibihi kolom?
            if($pdf->GetStringWidth($data['diagnosis']) < $cellWidth){
                //jika tidak, maka tidak melakukan apa-apa
                $line=1;
            }else{
                //jika ya, maka hitung ketinggian yang dibutuhkan untuk sel akan dirapikan
                //dengan memisahkan teks agar sesuai dengan lebar sel
                //lalu hitung berapa banyak baris yang dibutuhkan agar teks pas dengan sel
                
                $textLength=strlen($data['diagnosis']);    //total panjang teks
                $errMargin=8;       //margin kesalahan lebar sel, untuk jaga-jaga
                $startChar=0;       //posisi awal karakter untuk setiap baris
                $maxChar=0;         //karakter maksimum dalam satu baris, yang akan ditambahkan nanti
                $textArray=array(); //untuk menampung data untuk setiap baris
                $tmpString="";      //untuk menampung teks untuk setiap baris (sementara)
                while($startChar < $textLength){ //perulangan sampai akhir teks
                    //perulangan sampai karakter maksimum tercapai
                    while( 
                    $pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) &&
                    ($startChar+$maxChar) < $textLength ) {
                        $maxChar++;
                        $tmpString=substr($data['diagnosis'],$startChar,$maxChar);
                    }
                    //pindahkan ke baris berikutnya
                    $startChar=$startChar+$maxChar;
                    //kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
                    array_push($textArray,$tmpString);
                    //reset variabel penampung
                    $maxChar=0;
                    $tmpString='';
                     
                }
                //dapatkan jumlah baris
                $line=count($textArray);
            }
            //tulis selnya
            $pdf->SetFillColor(255,255,255);
            $pdf->Cell(10,($line * $cellHeight),$no,1,0,'C',true); //sesuaikan ketinggian dengan jumlah garis
            $pdf->Cell(35,($line * $cellHeight),$data['name'],1,0,'C',true); //sesuaikan ketinggian dengan jumlah garis
            $pdf->Cell(40,($line * $cellHeight),$data['department'],1,0,'C',true); //sesuaikan ketinggian dengan jumlah garis
            $pdf->Cell(25,($line * $cellHeight),$data['nik'],1,0,'C',true); //sesuaikan ketinggian dengan jumlah garis
            $pdf->Cell(30,($line * $cellHeight),date('d-m-Y', strtotime($data['check_in'])),1,0,'C',true); //sesuaikan ketinggian dengan jumlah garis
            
            //memanfaatkan MultiCell sebagai ganti Cell
            //atur posisi xy untuk sel berikutnya menjadi di sebelahnya.
            //ingat posisi x dan y sebelum menulis MultiCell
            $xPos=$pdf->GetX();
            $yPos=$pdf->GetY();
            $pdf->MultiCell($cellWidth,$cellHeight,$data['diagnosis'],1);
            
            //kembalikan posisi untuk sel berikutnya di samping MultiCell 
              //dan offset x dengan lebar MultiCell
            $pdf->SetXY($xPos + $cellWidth , $yPos);
            $xPos=$pdf->GetX();
            $yPos=$pdf->GetY(); 
            // $pdf->Cell(30,($line * $cellHeight),"Test,1,0);//sesuaikan ketinggian dengan jumlah garis
            $data_anyar = utf8_decode(str_replace(", ",chr(10), $data['drugs']));
            // $pdf->SetXY($xPos, )
            $pdf->MultiCell(30, $cellHeight, $data_anyar, 1, "L");
            $pdf->SetXY($xPos + 30, 30);
            $xPos=$pdf->GetX();
            $yPos=$pdf->GetY(); 
            $pdf->Cell(40,($line * $cellHeight),$data['conclusion'],1,1,'C',true); //sesuaikan ketinggian dengan jumlah garis

        }
        $pdf->Output();
      }
    }
}
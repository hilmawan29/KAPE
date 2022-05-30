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
        foreach ($datas as $data){
            $no++;
            $pdf->Ln(6);
            $pdf->Cell(10,6,$no,1,0, 'C');
            $pdf->Cell(35,6,$data['name'],1,0);
            $pdf->Cell(40,6,$data['department'],1,0);
            $pdf->Cell(25,6,$data['nik'],1,0);
            $pdf->Cell(30,6,date('d-m-Y', strtotime($data['check_in'])),1,0);
            $xPos=$pdf->GetX();
            $yPos=$pdf->GetY();
            $pdf->MultiCell(50,6,$data['diagnosis'],1);
            $pdf->SetXY($xPos + 50 , $yPos);
            $pdf->Cell(30,6,$data['drugs'],1,0);
            $pdf->Cell(40,6,$data['conclusion'],1,0);
        }
        $pdf->Output();
	}
}
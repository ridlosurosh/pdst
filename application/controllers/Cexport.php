<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Cexport extends CI_Controller
{
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    function __construct()
    {
        parent::__construct();
        // $this->load->library('Pdf');
        $this->load->model('Mexport');
    }

    // public function coba()
    // {
    //     $spreadsheet = new Spreadsheet();
    //     $sheet = $spreadsheet->getActiveSheet();
    //     $sheet->setCellValue('A1', 'Hello World !');

    //     $writer = new Xlsx($spreadsheet);

    //     $filename = 'simple';

    //     header('Content-Type: application/vnd.ms-excel');
    //     header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
    //     header('Cache-Control: max-age=0');

    //     $writer->save('php://output');
    // }

    public function cek()
    {
        $prov = $this->input->post('id');
        $datanya = $this->Mexport->cek_santri($prov);
        if ($datanya > 0) {
            $i = "2";
        } else {
            $i = "1";
        }
        $p = array('i' => $i);
        echo json_encode($p);
    }

    // export PDF putra
    function pdf()
    {
        $id = $this->input->get('id');

        $pdf = new FPDF('L', 'mm', 'A3');

        $pdf->AddPage();


        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(50);
        $pdf->Cell(0, 7, 'DATA SANTRI PUTRA', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);

        $pdf->SetFont('Arial', '', 8);

        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(28, 6, 'NIUP', 1, 0, 'C');
        $pdf->Cell(55, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(123, 6, 'Alamat', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Desa', 1, 0, 'C');
        $pdf->Cell(37, 6, 'Kecamatan', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Kabupaten', 1, 0, 'C');
        $pdf->Cell(27, 6, 'Provinsi', 1, 0, 'C');
        $pdf->Cell(10, 6, 'Pos', 1, 1);


        $pdf->SetFont('Arial', '', 8);
        $santri = $this->Mexport->export_putra_pdf($id);
        $no = 1;
        foreach ($santri as $data) {
            $pdf->Cell(8, 6, $no, 1, 0, 'C');
            $pdf->Cell(28, 6, $data->niup, 1, 0);
            $pdf->Cell(55, 6, $data->nama, 1, 0);
            $pdf->Cell(123, 6, $data->alamat_lengkap, 1, 0);
            $pdf->Cell(40, 6, $data->nama_desa, 1, 0);
            $pdf->Cell(37, 6, $data->nama_kecamatan, 1, 0);
            $pdf->Cell(40, 6, $data->nama_kabupaten, 1, 0);
            $pdf->Cell(27, 6, $data->nama_provinsi, 1, 0);
            $pdf->Cell(10, 6, $data->pos, 1, 1);
            $no++;
        }
        $pdf->Output();
    }

    // export PDF putri
    function pdf_putri()
    {
        $pdf = new FPDF('L', 'mm', 'A3');

        $pdf->AddPage();


        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(50);
        $pdf->Cell(0, 7, 'DATA SANTRI PUTRI', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);

        $pdf->SetFont('Arial', '', 8);

        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(33, 6, 'NIUP', 1, 0, 'C');
        $pdf->Cell(66, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(123, 6, 'Alamat', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Desa', 1, 0, 'C');
        $pdf->Cell(37, 6, 'Kecamatan', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Kabupaten', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Provinsi', 1, 0, 'C');
        $pdf->Cell(10, 6, 'Pos', 1, 1);


        $pdf->SetFont('Arial', '', 8);
        $santri = $this->Mexport->export_putri_pdf();
        $no = 1;
        foreach ($santri as $data) {
            $pdf->Cell(8, 6, $no, 1, 0);
            $pdf->Cell(33, 6, $data->niup, 1, 0);
            $pdf->Cell(66, 6, $data->nama, 1, 0);
            $pdf->Cell(123, 6, $data->alamat_lengkap, 1, 0);
            $pdf->Cell(40, 6, $data->nama_desa, 1, 0);
            $pdf->Cell(37, 6, $data->nama_kecamatan, 1, 0);
            $pdf->Cell(40, 6, $data->nama_kabupaten, 1, 0);
            $pdf->Cell(35, 6, $data->nama_provinsi, 1, 0);
            $pdf->Cell(10, 6, $data->pos, 1, 1);
            $no++;
        }
        $pdf->Output();
    }

    // Export semua pengurus
    function semua_pengurus_pdf()
    {
        $pdf = new FPDF('L', 'mm', 'A3');

        $pdf->AddPage();


        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(50);
        $pdf->Cell(0, 7, 'DATA PENGURUS', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);

        $pdf->SetFont('Arial', '', 7);

        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(33, 6, 'NIUP', 1, 0, 'C');
        $pdf->Cell(66, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(18, 6, 'Gender', 1, 0, 'C');
        $pdf->Cell(100, 6, 'Alamat', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Desa', 1, 0, 'C');
        $pdf->Cell(37, 6, 'Kecamatan', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Kabupaten', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Provinsi', 1, 0, 'C');
        $pdf->Cell(10, 6, 'Pos', 1, 1);


        $pdf->SetFont('Arial', '', 7);
        $santri = $this->Mexport->export_pengurus_semuanya();
        $no = 1;
        foreach ($santri as $data) {
            $pdf->Cell(8, 6, $no, 1, 0);
            $pdf->Cell(33, 6, $data->niup, 1, 0);
            $pdf->Cell(66, 6, $data->nama, 1, 0);
            $pdf->Cell(18, 6, $data->jenis_kelamin, 1, 0);
            $pdf->Cell(100, 6, $data->alamat_lengkap, 1, 0);
            $pdf->Cell(40, 6, $data->nama_desa, 1, 0);
            $pdf->Cell(37, 6, $data->nama_kecamatan, 1, 0);
            $pdf->Cell(40, 6, $data->nama_kabupaten, 1, 0);
            $pdf->Cell(35, 6, $data->nama_provinsi, 1, 0);
            $pdf->Cell(10, 6, $data->pos, 1, 1);
            $no++;
        }
        $pdf->Output();
    }

    // export PDF pengurus putra
    function pdf_pengurus_putra()
    {
        $pdf = new FPDF('L', 'mm', 'A3');

        $pdf->AddPage();


        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(50);
        $pdf->Cell(0, 7, 'DATA PENGURUS PUTRA', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);

        $pdf->SetFont('Arial', '', 8);

        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(28, 6, 'NIUP', 1, 0, 'C');
        $pdf->Cell(55, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(123, 6, 'Alamat', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Desa', 1, 0, 'C');
        $pdf->Cell(37, 6, 'Kecamatan', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Kabupaten', 1, 0, 'C');
        $pdf->Cell(27, 6, 'Provinsi', 1, 0, 'C');
        $pdf->Cell(10, 6, 'Pos', 1, 1);


        $pdf->SetFont('Arial', '', 8);
        $santri = $this->Mexport->export_pengurus_putra_pdf();
        $no = 1;
        foreach ($santri as $data) {
            $pdf->Cell(8, 6, $no, 1, 0, 'C');
            $pdf->Cell(28, 6, $data->niup, 1, 0);
            $pdf->Cell(55, 6, $data->nama, 1, 0);
            $pdf->Cell(123, 6, $data->alamat_lengkap, 1, 0);
            $pdf->Cell(40, 6, $data->nama_desa, 1, 0);
            $pdf->Cell(37, 6, $data->nama_kecamatan, 1, 0);
            $pdf->Cell(40, 6, $data->nama_kabupaten, 1, 0);
            $pdf->Cell(27, 6, $data->nama_provinsi, 1, 0);
            $pdf->Cell(10, 6, $data->pos, 1, 1);
            $no++;
        }
        $pdf->Output();
    }

    // export PDF pengurus putri
    function pdf_pengurus_putri()
    {
        $pdf = new FPDF('L', 'mm', 'A3');

        $pdf->AddPage();


        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(50);
        $pdf->Cell(0, 7, 'DATA PENGURUS PUTRI', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);

        $pdf->SetFont('Arial', '', 8);

        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(33, 6, 'NIUP', 1, 0, 'C');
        $pdf->Cell(66, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(123, 6, 'Alamat', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Desa', 1, 0, 'C');
        $pdf->Cell(37, 6, 'Kecamatan', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Kabupaten', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Provinsi', 1, 0, 'C');
        $pdf->Cell(10, 6, 'Pos', 1, 1);


        $pdf->SetFont('Arial', '', 8);
        $santri = $this->Mexport->export_pengurus_putri_pdf();
        $no = 1;
        foreach ($santri as $data) {
            $pdf->Cell(8, 6, $no, 1, 0);
            $pdf->Cell(33, 6, $data->niup, 1, 0);
            $pdf->Cell(66, 6, $data->nama, 1, 0);
            $pdf->Cell(123, 6, $data->alamat_lengkap, 1, 0);
            $pdf->Cell(40, 6, $data->nama_desa, 1, 0);
            $pdf->Cell(37, 6, $data->nama_kecamatan, 1, 0);
            $pdf->Cell(40, 6, $data->nama_kabupaten, 1, 0);
            $pdf->Cell(35, 6, $data->nama_provinsi, 1, 0);
            $pdf->Cell(10, 6, $data->pos, 1, 1);
            $no++;
        }
        $pdf->Output();
    }

    function guru_nubdah_semua()
    {
        $pdf = new FPDF('L', 'mm', 'A3');

        $pdf->AddPage();


        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(50);
        $pdf->Cell(0, 7, 'DATA GURU NUBDZAH', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);

        $pdf->SetFont('Arial', '', 7);

        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(33, 6, 'NIUP', 1, 0, 'C');
        $pdf->Cell(66, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(18, 6, 'Gender', 1, 0, 'C');
        $pdf->Cell(100, 6, 'Alamat', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Desa', 1, 0, 'C');
        $pdf->Cell(37, 6, 'Kecamatan', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Kabupaten', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Provinsi', 1, 0, 'C');
        $pdf->Cell(10, 6, 'Pos', 1, 1);


        $pdf->SetFont('Arial', '', 7);
        $santri = $this->Mexport->guru_nubdah_semua();
        $no = 1;
        foreach ($santri as $data) {
            $pdf->Cell(8, 6, $no, 1, 0);
            $pdf->Cell(33, 6, $data->niup, 1, 0);
            $pdf->Cell(66, 6, $data->nama, 1, 0);
            $pdf->Cell(18, 6, $data->jenis_kelamin, 1, 0);
            $pdf->Cell(100, 6, $data->alamat_lengkap, 1, 0);
            $pdf->Cell(40, 6, $data->nama_desa, 1, 0);
            $pdf->Cell(37, 6, $data->nama_kecamatan, 1, 0);
            $pdf->Cell(40, 6, $data->nama_kabupaten, 1, 0);
            $pdf->Cell(35, 6, $data->nama_provinsi, 1, 0);
            $pdf->Cell(10, 6, $data->pos, 1, 1);
            $no++;
        }
        $pdf->Output();
    }

    function guru_nubdah_putra()
    {
        $pdf = new FPDF('L', 'mm', 'A3');

        $pdf->AddPage();


        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(50);
        $pdf->Cell(0, 7, 'DATA GURU NUBDZAH PUTRA', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);

        $pdf->SetFont('Arial', '', 7);

        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(33, 6, 'NIUP', 1, 0, 'C');
        $pdf->Cell(66, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(18, 6, 'Gender', 1, 0, 'C');
        $pdf->Cell(100, 6, 'Alamat', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Desa', 1, 0, 'C');
        $pdf->Cell(37, 6, 'Kecamatan', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Kabupaten', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Provinsi', 1, 0, 'C');
        $pdf->Cell(10, 6, 'Pos', 1, 1);


        $pdf->SetFont('Arial', '', 7);
        $santri = $this->Mexport->guru_nubdah_putra();
        $no = 1;
        foreach ($santri as $data) {
            $pdf->Cell(8, 6, $no, 1, 0);
            $pdf->Cell(33, 6, $data->niup, 1, 0);
            $pdf->Cell(66, 6, $data->nama, 1, 0);
            $pdf->Cell(18, 6, $data->jenis_kelamin, 1, 0);
            $pdf->Cell(100, 6, $data->alamat_lengkap, 1, 0);
            $pdf->Cell(40, 6, $data->nama_desa, 1, 0);
            $pdf->Cell(37, 6, $data->nama_kecamatan, 1, 0);
            $pdf->Cell(40, 6, $data->nama_kabupaten, 1, 0);
            $pdf->Cell(35, 6, $data->nama_provinsi, 1, 0);
            $pdf->Cell(10, 6, $data->pos, 1, 1);
            $no++;
        }
        $pdf->Output();
    }

    function guru_nubdah_putri()
    {
        $pdf = new FPDF('L', 'mm', 'A3');

        $pdf->AddPage();


        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(50);
        $pdf->Cell(0, 7, 'DATA GURU NUBDZAH PUTRI', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);

        $pdf->SetFont('Arial', '', 7);

        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(33, 6, 'NIUP', 1, 0, 'C');
        $pdf->Cell(66, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(18, 6, 'Gender', 1, 0, 'C');
        $pdf->Cell(100, 6, 'Alamat', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Desa', 1, 0, 'C');
        $pdf->Cell(37, 6, 'Kecamatan', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Kabupaten', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Provinsi', 1, 0, 'C');
        $pdf->Cell(10, 6, 'Pos', 1, 1);


        $pdf->SetFont('Arial', '', 7);
        $santri = $this->Mexport->guru_nubdah_putri();
        $no = 1;
        foreach ($santri as $data) {
            $pdf->Cell(8, 6, $no, 1, 0);
            $pdf->Cell(33, 6, $data->niup, 1, 0);
            $pdf->Cell(66, 6, $data->nama, 1, 0);
            $pdf->Cell(18, 6, $data->jenis_kelamin, 1, 0);
            $pdf->Cell(100, 6, $data->alamat_lengkap, 1, 0);
            $pdf->Cell(40, 6, $data->nama_desa, 1, 0);
            $pdf->Cell(37, 6, $data->nama_kecamatan, 1, 0);
            $pdf->Cell(40, 6, $data->nama_kabupaten, 1, 0);
            $pdf->Cell(35, 6, $data->nama_provinsi, 1, 0);
            $pdf->Cell(10, 6, $data->pos, 1, 1);
            $no++;
        }
        $pdf->Output();
    }

    function guru_diniyah_semua()
    {
        $pdf = new FPDF('L', 'mm', 'A3');

        $pdf->AddPage();


        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(50);
        $pdf->Cell(0, 7, 'DATA GURU DINIYAH', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);

        $pdf->SetFont('Arial', '', 7);

        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(33, 6, 'NIUP', 1, 0, 'C');
        $pdf->Cell(66, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(18, 6, 'Gender', 1, 0, 'C');
        $pdf->Cell(100, 6, 'Alamat', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Desa', 1, 0, 'C');
        $pdf->Cell(37, 6, 'Kecamatan', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Kabupaten', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Provinsi', 1, 0, 'C');
        $pdf->Cell(10, 6, 'Pos', 1, 1);


        $pdf->SetFont('Arial', '', 7);
        $santri = $this->Mexport->guru_diniyah_semua();
        $no = 1;
        foreach ($santri as $data) {
            $pdf->Cell(8, 6, $no, 1, 0);
            $pdf->Cell(33, 6, $data->niup, 1, 0);
            $pdf->Cell(66, 6, $data->nama, 1, 0);
            $pdf->Cell(18, 6, $data->jenis_kelamin, 1, 0);
            $pdf->Cell(100, 6, $data->alamat_lengkap, 1, 0);
            $pdf->Cell(40, 6, $data->nama_desa, 1, 0);
            $pdf->Cell(37, 6, $data->nama_kecamatan, 1, 0);
            $pdf->Cell(40, 6, $data->nama_kabupaten, 1, 0);
            $pdf->Cell(35, 6, $data->nama_provinsi, 1, 0);
            $pdf->Cell(10, 6, $data->pos, 1, 1);
            $no++;
        }
        $pdf->Output();
    }

    function guru_diniyah_putra()
    {
        $pdf = new FPDF('L', 'mm', 'A3');

        $pdf->AddPage();


        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(50);
        $pdf->Cell(0, 7, 'DATA GURU DINIYAH PUTRA', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);

        $pdf->SetFont('Arial', '', 7);

        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(33, 6, 'NIUP', 1, 0, 'C');
        $pdf->Cell(66, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(18, 6, 'Gender', 1, 0, 'C');
        $pdf->Cell(100, 6, 'Alamat', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Desa', 1, 0, 'C');
        $pdf->Cell(37, 6, 'Kecamatan', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Kabupaten', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Provinsi', 1, 0, 'C');
        $pdf->Cell(10, 6, 'Pos', 1, 1);


        $pdf->SetFont('Arial', '', 7);
        $santri = $this->Mexport->guru_diniyah_putra();
        $no = 1;
        foreach ($santri as $data) {
            $pdf->Cell(8, 6, $no, 1, 0);
            $pdf->Cell(33, 6, $data->niup, 1, 0);
            $pdf->Cell(66, 6, $data->nama, 1, 0);
            $pdf->Cell(18, 6, $data->jenis_kelamin, 1, 0);
            $pdf->Cell(100, 6, $data->alamat_lengkap, 1, 0);
            $pdf->Cell(40, 6, $data->nama_desa, 1, 0);
            $pdf->Cell(37, 6, $data->nama_kecamatan, 1, 0);
            $pdf->Cell(40, 6, $data->nama_kabupaten, 1, 0);
            $pdf->Cell(35, 6, $data->nama_provinsi, 1, 0);
            $pdf->Cell(10, 6, $data->pos, 1, 1);
            $no++;
        }
        $pdf->Output();
    }

    function guru_diniyah_putri()
    {
        $pdf = new FPDF('L', 'mm', 'A3');

        $pdf->AddPage();


        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(50);
        $pdf->Cell(0, 7, 'DATA GURU DINIYAH PUTRI', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);

        $pdf->SetFont('Arial', '', 7);

        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(33, 6, 'NIUP', 1, 0, 'C');
        $pdf->Cell(66, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(18, 6, 'Gender', 1, 0, 'C');
        $pdf->Cell(100, 6, 'Alamat', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Desa', 1, 0, 'C');
        $pdf->Cell(37, 6, 'Kecamatan', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Kabupaten', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Provinsi', 1, 0, 'C');
        $pdf->Cell(10, 6, 'Pos', 1, 1);


        $pdf->SetFont('Arial', '', 7);
        $santri = $this->Mexport->guru_diniyah_putri();
        $no = 1;
        foreach ($santri as $data) {
            $pdf->Cell(8, 6, $no, 1, 0);
            $pdf->Cell(33, 6, $data->niup, 1, 0);
            $pdf->Cell(66, 6, $data->nama, 1, 0);
            $pdf->Cell(18, 6, $data->jenis_kelamin, 1, 0);
            $pdf->Cell(100, 6, $data->alamat_lengkap, 1, 0);
            $pdf->Cell(40, 6, $data->nama_desa, 1, 0);
            $pdf->Cell(37, 6, $data->nama_kecamatan, 1, 0);
            $pdf->Cell(40, 6, $data->nama_kabupaten, 1, 0);
            $pdf->Cell(35, 6, $data->nama_provinsi, 1, 0);
            $pdf->Cell(10, 6, $data->pos, 1, 1);
            $no++;
        }
        $pdf->Output();
    }

    // Export Karyawan
    function karyawan_semua()
    {
        $pdf = new FPDF('L', 'mm', 'A3');

        $pdf->AddPage();


        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(50);
        $pdf->Cell(0, 7, 'DATA KARYAWAN', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);

        $pdf->SetFont('Arial', '', 7);

        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(33, 6, 'NIUP', 1, 0, 'C');
        $pdf->Cell(66, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(18, 6, 'Gender', 1, 0, 'C');
        $pdf->Cell(100, 6, 'Alamat', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Desa', 1, 0, 'C');
        $pdf->Cell(37, 6, 'Kecamatan', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Kabupaten', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Provinsi', 1, 0, 'C');
        $pdf->Cell(10, 6, 'Pos', 1, 1);


        $pdf->SetFont('Arial', '', 7);
        $santri = $this->Mexport->karyawan_semua();
        $no = 1;
        foreach ($santri as $data) {
            $pdf->Cell(8, 6, $no, 1, 0);
            $pdf->Cell(33, 6, $data->niup, 1, 0);
            $pdf->Cell(66, 6, $data->nama, 1, 0);
            $pdf->Cell(18, 6, $data->jenis_kelamin, 1, 0);
            $pdf->Cell(100, 6, $data->alamat_lengkap, 1, 0);
            $pdf->Cell(40, 6, $data->nama_desa, 1, 0);
            $pdf->Cell(37, 6, $data->nama_kecamatan, 1, 0);
            $pdf->Cell(40, 6, $data->nama_kabupaten, 1, 0);
            $pdf->Cell(35, 6, $data->nama_provinsi, 1, 0);
            $pdf->Cell(10, 6, $data->pos, 1, 1);
            $no++;
        }
        $pdf->Output();
    }

    function karyawan_putra()
    {
        $pdf = new FPDF('L', 'mm', 'A3');

        $pdf->AddPage();


        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(50);
        $pdf->Cell(0, 7, 'DATA KARYAWAN PUTRA', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);

        $pdf->SetFont('Arial', '', 7);

        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(33, 6, 'NIUP', 1, 0, 'C');
        $pdf->Cell(66, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(18, 6, 'Gender', 1, 0, 'C');
        $pdf->Cell(100, 6, 'Alamat', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Desa', 1, 0, 'C');
        $pdf->Cell(37, 6, 'Kecamatan', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Kabupaten', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Provinsi', 1, 0, 'C');
        $pdf->Cell(10, 6, 'Pos', 1, 1);


        $pdf->SetFont('Arial', '', 7);
        $santri = $this->Mexport->karyawan_putra();
        $no = 1;
        foreach ($santri as $data) {
            $pdf->Cell(8, 6, $no, 1, 0);
            $pdf->Cell(33, 6, $data->niup, 1, 0);
            $pdf->Cell(66, 6, $data->nama, 1, 0);
            $pdf->Cell(18, 6, $data->jenis_kelamin, 1, 0);
            $pdf->Cell(100, 6, $data->alamat_lengkap, 1, 0);
            $pdf->Cell(40, 6, $data->nama_desa, 1, 0);
            $pdf->Cell(37, 6, $data->nama_kecamatan, 1, 0);
            $pdf->Cell(40, 6, $data->nama_kabupaten, 1, 0);
            $pdf->Cell(35, 6, $data->nama_provinsi, 1, 0);
            $pdf->Cell(10, 6, $data->pos, 1, 1);
            $no++;
        }
        $pdf->Output();
    }

    function karyawan_putri()
    {
        $pdf = new FPDF('L', 'mm', 'A3');

        $pdf->AddPage();


        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(50);
        $pdf->Cell(0, 7, 'DATA KARYAWAN PUTRI', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);

        $pdf->SetFont('Arial', '', 7);

        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(33, 6, 'NIUP', 1, 0, 'C');
        $pdf->Cell(66, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(18, 6, 'Gender', 1, 0, 'C');
        $pdf->Cell(100, 6, 'Alamat', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Desa', 1, 0, 'C');
        $pdf->Cell(37, 6, 'Kecamatan', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Kabupaten', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Provinsi', 1, 0, 'C');
        $pdf->Cell(10, 6, 'Pos', 1, 1);


        $pdf->SetFont('Arial', '', 7);
        $santri = $this->Mexport->karyawan_putri();
        $no = 1;
        foreach ($santri as $data) {
            $pdf->Cell(8, 6, $no, 1, 0);
            $pdf->Cell(33, 6, $data->niup, 1, 0);
            $pdf->Cell(66, 6, $data->nama, 1, 0);
            $pdf->Cell(18, 6, $data->jenis_kelamin, 1, 0);
            $pdf->Cell(100, 6, $data->alamat_lengkap, 1, 0);
            $pdf->Cell(40, 6, $data->nama_desa, 1, 0);
            $pdf->Cell(37, 6, $data->nama_kecamatan, 1, 0);
            $pdf->Cell(40, 6, $data->nama_kabupaten, 1, 0);
            $pdf->Cell(35, 6, $data->nama_provinsi, 1, 0);
            $pdf->Cell(10, 6, $data->pos, 1, 1);
            $no++;
        }
        $pdf->Output();
    }


    // Export Alumni
    function alumni_semua()
    {
        $pdf = new FPDF('L', 'mm', 'A3');

        $pdf->AddPage();


        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(50);
        $pdf->Cell(0, 7, 'DATA ALUMNI', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);

        $pdf->SetFont('Arial', '', 7);

        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(33, 6, 'NIUP', 1, 0, 'C');
        $pdf->Cell(66, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(18, 6, 'Gender', 1, 0, 'C');
        $pdf->Cell(100, 6, 'Alamat', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Desa', 1, 0, 'C');
        $pdf->Cell(37, 6, 'Kecamatan', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Kabupaten', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Provinsi', 1, 0, 'C');
        $pdf->Cell(10, 6, 'Pos', 1, 1);


        $pdf->SetFont('Arial', '', 7);
        $santri = $this->Mexport->alumni_semua();
        $no = 1;
        foreach ($santri as $data) {
            $pdf->Cell(8, 6, $no, 1, 0);
            $pdf->Cell(33, 6, $data->niup, 1, 0);
            $pdf->Cell(66, 6, $data->nama, 1, 0);
            $pdf->Cell(18, 6, $data->jenis_kelamin, 1, 0);
            $pdf->Cell(100, 6, $data->alamat_lengkap, 1, 0);
            $pdf->Cell(40, 6, $data->nama_desa, 1, 0);
            $pdf->Cell(37, 6, $data->nama_kecamatan, 1, 0);
            $pdf->Cell(40, 6, $data->nama_kabupaten, 1, 0);
            $pdf->Cell(35, 6, $data->nama_provinsi, 1, 0);
            $pdf->Cell(10, 6, $data->pos, 1, 1);
            $no++;
        }
        $pdf->Output();
    }

    function alumni_putra()
    {
        $pdf = new FPDF('L', 'mm', 'A3');

        $pdf->AddPage();


        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(50);
        $pdf->Cell(0, 7, 'DATA ALUMNI PUTRA', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);

        $pdf->SetFont('Arial', '', 7);

        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(33, 6, 'NIUP', 1, 0, 'C');
        $pdf->Cell(66, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(18, 6, 'Gender', 1, 0, 'C');
        $pdf->Cell(100, 6, 'Alamat', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Desa', 1, 0, 'C');
        $pdf->Cell(37, 6, 'Kecamatan', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Kabupaten', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Provinsi', 1, 0, 'C');
        $pdf->Cell(10, 6, 'Pos', 1, 1);


        $pdf->SetFont('Arial', '', 7);
        $santri = $this->Mexport->alumni_putra();
        $no = 1;
        foreach ($santri as $data) {
            $pdf->Cell(8, 6, $no, 1, 0);
            $pdf->Cell(33, 6, $data->niup, 1, 0);
            $pdf->Cell(66, 6, $data->nama, 1, 0);
            $pdf->Cell(18, 6, $data->jenis_kelamin, 1, 0);
            $pdf->Cell(100, 6, $data->alamat_lengkap, 1, 0);
            $pdf->Cell(40, 6, $data->nama_desa, 1, 0);
            $pdf->Cell(37, 6, $data->nama_kecamatan, 1, 0);
            $pdf->Cell(40, 6, $data->nama_kabupaten, 1, 0);
            $pdf->Cell(35, 6, $data->nama_provinsi, 1, 0);
            $pdf->Cell(10, 6, $data->pos, 1, 1);
            $no++;
        }
        $pdf->Output();
    }

    function alumni_putri()
    {
        $pdf = new FPDF('L', 'mm', 'A3');

        $pdf->AddPage();


        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(50);
        $pdf->Cell(0, 7, 'DATA ALUMNI PUTRI', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);

        $pdf->SetFont('Arial', '', 7);

        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(33, 6, 'NIUP', 1, 0, 'C');
        $pdf->Cell(66, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(18, 6, 'Gender', 1, 0, 'C');
        $pdf->Cell(100, 6, 'Alamat', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Desa', 1, 0, 'C');
        $pdf->Cell(37, 6, 'Kecamatan', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Kabupaten', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Provinsi', 1, 0, 'C');
        $pdf->Cell(10, 6, 'Pos', 1, 1);


        $pdf->SetFont('Arial', '', 7);
        $santri = $this->Mexport->alumni_putri();
        $no = 1;
        foreach ($santri as $data) {
            $pdf->Cell(8, 6, $no, 1, 0);
            $pdf->Cell(33, 6, $data->niup, 1, 0);
            $pdf->Cell(66, 6, $data->nama, 1, 0);
            $pdf->Cell(18, 6, $data->jenis_kelamin, 1, 0);
            $pdf->Cell(100, 6, $data->alamat_lengkap, 1, 0);
            $pdf->Cell(40, 6, $data->nama_desa, 1, 0);
            $pdf->Cell(37, 6, $data->nama_kecamatan, 1, 0);
            $pdf->Cell(40, 6, $data->nama_kabupaten, 1, 0);
            $pdf->Cell(35, 6, $data->nama_provinsi, 1, 0);
            $pdf->Cell(10, 6, $data->pos, 1, 1);
            $no++;
        }
        $pdf->Output();
    }
}

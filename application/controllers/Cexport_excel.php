<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('plugin/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Cexport_excel extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mexport_excel');
    }
    public function cek_tahun()
    {
        $tahun = $this->input->post('tahun');
        $datanya = $this->Mexport_excel->cek_tahun($tahun);
        echo json_encode($datanya);
    }

    public function excel_tahun()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A4', 'NO');
        $sheet->setCellValue('B4', 'NIUP');
        $sheet->setCellValue('C4', 'NIK');
        $sheet->setCellValue('D4', 'NAMA');
        $sheet->setCellValue('E4', 'TEMPAT LAHIR');
        $sheet->setCellValue('F4', 'TANGGAL LAHIR');
        $sheet->setCellValue('G4', 'JENIS KELAMIN');
        $sheet->setCellValue('H4', 'STATUS DALAM KELUARGA');
        $sheet->setCellValue('I4', 'ANAK KE');
        $sheet->setCellValue('J4', 'JUMLAH SAUDARA');
        $sheet->setCellValue('K4', 'ALAMAT LENGKAP');
        $sheet->setCellValue('L4', 'DESA');
        $sheet->setCellValue('M4', 'KECAMATAN');
        $sheet->setCellValue('N4', 'KABUPATEN');
        $sheet->setCellValue('O4', 'PROVINSI');
        $sheet->setCellValue('P4', 'KODE POS');
        $sheet->setCellValue('Q4', 'NIK AYAH');
        $sheet->setCellValue('R4', 'NAMA AYAH');
        $sheet->setCellValue('S4', 'PENDIDIKAN AYAH');
        $sheet->setCellValue('T4', 'PEKERJAAN AYAH');
        $sheet->setCellValue('U4', 'NIK IBU');
        $sheet->setCellValue('V4', 'NAMA IBU');
        $sheet->setCellValue('W4', 'PENDIDIKAN IBU');
        $sheet->setCellValue('X4', 'PEKERJAAN IBU');
        $sheet->setCellValue('Y4', 'NAMA WALI');
        $sheet->setCellValue('Z4', 'PENDIDIKAN WALI');
        $sheet->setCellValue('AA4', 'PEKERJAAN WALI');
        $sheet->setCellValue('AB4', 'PENDAPATAN WALI');
        $sheet->setCellValue('AC4', 'ALAMAT WALI');
        $sheet->setCellValue('AD4', 'NO WA/ NO TELP WALI');
        $sheet->setCellValue('AE4', 'TANGGAL DAFTAR');

        $id = $this->input->get('id');
        $jenis = $this->input->get('jenis');
        $sheet->mergeCells("A2:AE2");
        $sheet->setCellValue('A2', 'DATA SANTRI ' . strtoupper($jenis) . " TAHUN ANGKATAN : " . $id);
        $styleArray_header = array(
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '00000000'),
                ),
            ),
            'font' => array(
                'bold' => true
            )
        );
        $styleArray_all = array(
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '00000000'),
                ),
            )
        );
        $sheet->getStyle('A4:AE4')->applyFromArray($styleArray_header);
        $santri = $this->Mexport_excel->excel_tahun($id, $jenis);
        $no = 0;
        $row = 4;
        foreach ($santri as $dt) {
            $desa_uy = $this->db->where('id', $dt->desa)
                ->get('desa')
                ->row();
            // ->num_rows();
            $camat_uy = $this->db->where('id', $dt->kec)
                ->get('kecamatan')
                ->row();
            $kabu_uy = $this->db->where('id', $dt->kab)
                ->get('kabupaten')
                ->row();
            $prov_uy = $this->db->where('id', $dt->prov)
                ->get('provinsi')
                ->row();
            $no++;
            $row++;
            $sheet->setCellValue('A' . $row, $no);
            $sheet->setCellValueExplicit('B' . $row, $dt->niup, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValueExplicit('C' . $row, $dt->nik, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('D' . $row, $dt->nama);
            $sheet->setCellValue('E' . $row, $dt->tempat_lahir);
            $sheet->setCellValue('F' . $row, $dt->tanggal_lahir);
            $sheet->setCellValue('G' . $row, $dt->jenis_kelamin);
            $sheet->setCellValue('H' . $row, $dt->dlm_klrg);
            $sheet->setCellValue('I' . $row, $dt->ank_ke);
            $sheet->setCellValue('J' . $row, $dt->sdr);
            $sheet->setCellValue('K' . $row, $dt->alamat_lengkap);
            $sheet->setCellValue('L' . $row, $desa_uy->name);
            $sheet->setCellValue('M' . $row, $camat_uy->name);
            $sheet->setCellValue('N' . $row, $kabu_uy->name);
            $sheet->setCellValue('O' . $row, $prov_uy->name);
            $sheet->setCellValue('P' . $row, $dt->pos);
            $sheet->setCellValueExplicit('Q' . $row, $dt->nik_a, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('R' . $row, $dt->nm_a);
            $sheet->setCellValue('S' . $row, $dt->pndkn_a);
            $sheet->setCellValue('T' . $row, $dt->pkrjn_a);
            $sheet->setCellValueExplicit('U' . $row, $dt->nik_i, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('V' . $row, $dt->nm_i);
            $sheet->setCellValue('W' . $row, $dt->pndkn_i);
            $sheet->setCellValue('X' . $row, $dt->pkrjn_i);
            $sheet->setCellValue('Y' . $row, $dt->nm_w);
            $sheet->setCellValue('Z' . $row, $dt->pndkn_w);
            $sheet->setCellValue('AA' . $row, $dt->pkrjn_w);
            $sheet->setCellValue('AB' . $row, $dt->pndptn_w);
            $sheet->setCellValue('AC' . $row, $dt->almt_w);
            $sheet->setCellValue('AD' . $row, $dt->hp_w . " - " . $dt->telp_w);
            $sheet->setCellValue('AE' . $row, date('d-m-Y', strtotime($dt->tgl_daftar)));
            $sheet->getStyle('A' . $row . ':AE' . $row)->applyFromArray($styleArray_all);
        }
        foreach ($sheet->getColumnIterator() as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }
        $writer = new Xlsx($spreadsheet);

        $filename = 'SANTRI ' . strtoupper($jenis) . ' TAHUN ANGKATAN  (' . $id . ')';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    // excel provinsi
    public function cek_prov()
    {
        $prov = $this->input->post('prov');
        $datanya = $this->Mexport_excel->cek_prov($prov);
        echo json_encode($datanya);
    }

    public function excel_provinsi()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A4', 'NO');
        $sheet->setCellValue('B4', 'NIUP');
        $sheet->setCellValue('C4', 'NIK');
        $sheet->setCellValue('D4', 'NAMA');
        $sheet->setCellValue('E4', 'TEMPAT LAHIR');
        $sheet->setCellValue('F4', 'TANGGAL LAHIR');
        $sheet->setCellValue('G4', 'JENIS KELAMIN');
        $sheet->setCellValue('H4', 'STATUS DALAM KELUARGA');
        $sheet->setCellValue('I4', 'ANAK KE');
        $sheet->setCellValue('J4', 'JUMLAH SAUDARA');
        $sheet->setCellValue('K4', 'ALAMAT LENGKAP');
        $sheet->setCellValue('L4', 'DESA');
        $sheet->setCellValue('M4', 'KECAMATAN');
        $sheet->setCellValue('N4', 'KABUPATEN');
        $sheet->setCellValue('O4', 'PROVINSI');
        $sheet->setCellValue('P4', 'KODE POS');
        $sheet->setCellValue('Q4', 'NIK AYAH');
        $sheet->setCellValue('R4', 'NAMA AYAH');
        $sheet->setCellValue('S4', 'PENDIDIKAN AYAH');
        $sheet->setCellValue('T4', 'PEKERJAAN AYAH');
        $sheet->setCellValue('U4', 'NIK IBU');
        $sheet->setCellValue('V4', 'NAMA IBU');
        $sheet->setCellValue('W4', 'PENDIDIKAN IBU');
        $sheet->setCellValue('X4', 'PEKERJAAN IBU');
        $sheet->setCellValue('Y4', 'NAMA WALI');
        $sheet->setCellValue('Z4', 'PENDIDIKAN WALI');
        $sheet->setCellValue('AA4', 'PEKERJAAN WALI');
        $sheet->setCellValue('AB4', 'PENDAPATAN WALI');
        $sheet->setCellValue('AC4', 'ALAMAT WALI');
        $sheet->setCellValue('AD4', 'NO WA/ NO TELP WALI');
        $sheet->setCellValue('AE4', 'TANGGAL DAFTAR');

        $id = $this->input->get('id');
        $jenis = $this->input->get('jenis');
        $prov = $this->db->where('id', $id)
            ->get('provinsi')
            ->row();

        $sheet->mergeCells("A2:AE2");
        $sheet->setCellValue('A2', 'DATA SANTRI ' . strtoupper($jenis) . " DARI PROVINSI : " . $prov->name);
        $styleArray_header = array(
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '00000000'),
                ),
            ),
            'font' => array(
                'bold' => true
            )
        );
        $styleArray_all = array(
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '00000000'),
                ),
            )
        );
        $sheet->getStyle('A4:AE4')->applyFromArray($styleArray_header);
        $santri = $this->Mexport_excel->excel_provinsi($id, $jenis);
        $no = 0;
        $row = 4;
        foreach ($santri as $dt) {
            $desa_uy = $this->db->where('id', $dt->desa)
                ->get('desa')
                ->row();
            // ->num_rows();
            $camat_uy = $this->db->where('id', $dt->kec)
                ->get('kecamatan')
                ->row();
            $kabu_uy = $this->db->where('id', $dt->kab)
                ->get('kabupaten')
                ->row();
            $prov_uy = $this->db->where('id', $dt->prov)
                ->get('provinsi')
                ->row();
            $no++;
            $row++;
            $sheet->setCellValue('A' . $row, $no);
            $sheet->setCellValueExplicit('B' . $row, $dt->niup, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValueExplicit('C' . $row, $dt->nik, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('D' . $row, $dt->nama);
            $sheet->setCellValue('E' . $row, $dt->tempat_lahir);
            $sheet->setCellValue('F' . $row, $dt->tanggal_lahir);
            $sheet->setCellValue('G' . $row, $dt->jenis_kelamin);
            $sheet->setCellValue('H' . $row, $dt->dlm_klrg);
            $sheet->setCellValue('I' . $row, $dt->ank_ke);
            $sheet->setCellValue('J' . $row, $dt->sdr);
            $sheet->setCellValue('K' . $row, $dt->alamat_lengkap);
            $sheet->setCellValue('L' . $row, $desa_uy->name);
            $sheet->setCellValue('M' . $row, $camat_uy->name);
            $sheet->setCellValue('N' . $row, $kabu_uy->name);
            $sheet->setCellValue('O' . $row, $prov_uy->name);
            $sheet->setCellValue('P' . $row, $dt->pos);
            $sheet->setCellValueExplicit('Q' . $row, $dt->nik_a, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('R' . $row, $dt->nm_a);
            $sheet->setCellValue('S' . $row, $dt->pndkn_a);
            $sheet->setCellValue('T' . $row, $dt->pkrjn_a);
            $sheet->setCellValueExplicit('U' . $row, $dt->nik_i, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('V' . $row, $dt->nm_i);
            $sheet->setCellValue('W' . $row, $dt->pndkn_i);
            $sheet->setCellValue('X' . $row, $dt->pkrjn_i);
            $sheet->setCellValue('Y' . $row, $dt->nm_w);
            $sheet->setCellValue('Z' . $row, $dt->pndkn_w);
            $sheet->setCellValue('AA' . $row, $dt->pkrjn_w);
            $sheet->setCellValue('AB' . $row, $dt->pndptn_w);
            $sheet->setCellValue('AC' . $row, $dt->almt_w);
            $sheet->setCellValue('AD' . $row, $dt->hp_w . " - " . $dt->telp_w);
            $sheet->setCellValue('AE' . $row, date('d-m-Y', strtotime($dt->tgl_daftar)));
            $sheet->getStyle('A' . $row . ':AE' . $row)->applyFromArray($styleArray_all);
        }
        foreach ($sheet->getColumnIterator() as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }
        $writer = new Xlsx($spreadsheet);

        $filename = 'SANTRI ' . strtoupper($jenis) . ' PROVINSI  (' . $prov->name . ')';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}

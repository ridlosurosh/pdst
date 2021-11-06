<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cgrafik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mgrafik');
    }

    public function menu_grafik()
    {
        $this->load->view('menu_grafik/grafik');
    }

    function grafik_tahun()
    {
        $data = $this->Mgrafik->grafik_tahun();
        if ($data == null) {
            $da[] = '0';
            $dat[] = 'Harap Di Isi Bos qqq Kunjungan Pertahun Lagi KOsong OK HEHE';
        } else {
            foreach ($data as $value) {
                $dat[] = $value->tahun;
                $da[] = $value->jml;
            }
        }
        echo json_encode(array('tahun' => $dat, 'jml' => $da));
    }

    // function grafik_filter_putra_putri()
    // {
    //     $bulan = $this->input->post('bulan');
    //     $tahun = $this->input->post('tahun');
    //     $data = $this->Mgrafik->grafik_filter_putra_putri($tahun, $bulan);
    //     if ($data == null) {
    //         $date[] = '0';
    //         $dat[] = 'harap di isi bos qqq Kunjungan PUtra Putri  Lagi KOsong OK';
    //     } else {
    //         foreach ($data as $value) {
    //             $dat[] = $value->nama_wilayah;
    //             $date[] = $value->jml;
    //         }
    //     }
    //     echo json_encode(array('wilayah' => $dat, 'jml' => $date));
    // }

    // function grafik_filter_putra_putri_pertahun()
    // {
    //     $tahun = $this->input->post('tahun');
    //     $data = $this->Mgrafik->grafik_filter_l($tahun, 'Laki-Laki');
    //     $da = $this->Mgrafik->grafik_filter_p($tahun, 'Perempuan');
    //     if ($data == null) {
    //         $date_lk[] = '0';
    //         $date_pr[] = '0';
    //         $dat[] = 'Harap Di Isi Bos qqq Kunjungan Pertahun Lagi KOsong OK HEHE';
    //     } else {
    //         foreach ($data as $value) {
    //             $dat[] = $value->bulan;
    //             $date_lk[] = $value->jml_lk;
    //         }
    //         foreach ($da as $value) {
    //             // $dat[] = $value->bulan;
    //             $date_pr[] = $value->jml_pr;
    //         }
    //     }
    //     echo json_encode(array('bulan' => $dat, 'jml_lk' => $date_lk, 'jml_pr' => $date_pr));
    // }
}

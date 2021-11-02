<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Claporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mlaporan');
        // $this->load->model('Mkamar');
    }

    public function santri_provinsi()
    {
        $output['provinsi'] = $this->Mlaporan->get_provinsi()->result();
        $this->load->view('laporan/santri_provinsi', $output);
    }

    // public function santri_kamar()
    // {
    //     $arrayName = array(
    //         'kamar' => $this->Mkamar->kamar_all(),
    //         'santrinya' => $this->Mlaporan->data_history()
    //     );

    //     $this->load->view('laporan/person_perkamar', $arrayName);
    // }


}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cuser extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Muser');
    }

    public function index()
    {
        $id = $this->Muser->profil($this->session->userdata['logged_in']['id_pengurus']);
        $output = array(
            'nama_user' => $id->nama,
        );
        $this->load->view('user/user_beranda', $output);
    }

    public function menu_halaman_utama()
    {
        $output = array(
            'santri' => $this->Muser->jum_santri(),
            'putra' => $this->Muser->jum_putra(),
            'putri' => $this->Muser->jum_putri(),
            'kamar' => $this->Muser->jumlah_santri_perblok(),
            'psb' => $this->Muser->psb_all(),

        );
        $this->load->view('user/halaman_utama', $output);
    }

    public function menu_grafik()
    {
        $output = array(
            'kamar' => $this->Muser->jumlah_santri_perkamar(),
        );
        $this->load->view('user/menu_grafik/grafik', $output);
    }
}

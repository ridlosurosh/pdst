<?php
class Cmembers extends CI_Controller 
{
    public function __construct() {
        parent :: __construct();
        $this->load->model('Mperson');
    }

    public function index()
    {
        $output = array(
            'nama_members' => $this->session->userdata['logged_in']['nama'],
            'jabatan' => $this->session->userdata['logged_in']['jabatan'],
        );
        $this->load->view('members/members_beranda', $output);
    }

    public function halaman_utama()
    {
        $date = date('Y');
        $santriBaru = $this->db->where('YEAR(tgl_daftar)', $date)->get('tb_person')->num_rows();
        $santriPsb = $this->db->where('YEAR(tgl_daftar)', $date)->where_not_in('no_regristrasi', '')->get('tb_psb')->num_rows();
        $santripsbPutra =  $this->db->where('YEAR(tgl_daftar)', $date)->where('jenis_kelamin', 'Laki-Laki')->get('tb_person')->num_rows();
        $santripsbPutri = $this->db->where('YEAR(tgl_daftar)', $date)->where('jenis_kelamin', 'Perempuan')->get('tb_person')->num_rows();

        $output = array(
            'santriBaru' => $santriBaru,
            'putra' => $santripsbPutra,
            'putri' => $santripsbPutri,
            'psb' => $santriPsb,
        );
        $this->load->view('members/halaman_utama', $output);

    }

    public function halaman_santri()
    {
        
    }



}

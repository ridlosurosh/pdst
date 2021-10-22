 <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Cjabatan extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Mjabatan');
        }

        public function menu_jabatan()
        {
            $output['jabatan'] = $this->Mjabatan->jabatan_all();
            $this->load->view('menu_jabatan/jabatan', $output);
        }

        public function tambah_jabatan()
        {
            $this->load->view('menu_jabatan/jabatan_tambah');
        }

        public function simpan_jabatan()
        {
            $data = array(
                'nm_jabatan' => $this->input->post('nama_jabatan'),
                'thn_dibuat' => $this->input->post('tahun_jabatan'),
                'status' => "Aktif"
            );
            $this->Mjabatan->simpan_jabatan($data);
            $pesan = "ya";
            $sukses = "Data Berhasil Disimpan";
            $output = array(
                'pesan' => $pesan,
                'sukses' => $sukses
            );
            echo json_encode($output);
        }

        public function form_edit_jabatan()
        {
            $id = $this->input->post('idjabatan');
            $data = $this->Mjabatan->jabatan_id($id);
            $this->load->view('menu_jabatan/jabatan_edit', $data);
        }

        public function edit_jabatan()
        {
            $id = $this->input->post('idjabatan');
            $data = array(
                'nm_jabatan' => $this->input->post('nama_jabatan'),
                'thn_dibuat' => $this->input->post('tahun_jabatan'),
            );
            $this->Mjabatan->edit_jabatan(array('id_jabatan' => $id), $data);
            $pesan = "ya";
            $sukses = "Data Berhasil Diedit";
            $output = array(
                'pesan' => $pesan,
                'sukses' => $sukses
            );
            echo json_encode($output);
        }
    }

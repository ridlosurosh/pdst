<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ckoordinator extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mkoordinator');
        $this->load->model('Mperson');
    }

    public function menu_koordinator()
    {
        $output['pengurus'] = $this->Mkoordinator->pengurus_all();
        $this->load->view('menu_koordinator/koordinator', $output);
    }

    public function tambah_koordinator()
    {
        $output = array(
            'jabatan' => $this->Mkoordinator->jabatan()
        );
        $this->load->view('menu_koordinator/koordinator_tambah', $output);
    }

    public function otomatis_santri()
    {
        $q = $this->Mkoordinator->otomatis_santri();
        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $k) {
                $data[] = [
                    'nama' => $k['nama'],
                    'id_person' => $k['id_person'],
                    'niup' => $k['niup']
                ];
            }
        } else {
            $data[] = [
                'nama' => "Tidak ada",
            ];
        }
        echo json_encode($data);
    }

    public function simpan_koordinator()
    {
        $angkat = $this->input->post('tanggal_diangkat');
        $berhenti = $this->input->post('tanggal_berhenti');
        $masa = $angkat . ' s/d ' . $berhenti;
        // $y = $this->input->post('masa_bakti');
        // $h = explode('/', $y);
        // $g = implode('-', $h);

        $data1 = array(
            'id_person' => $this->input->post('idperson'),
            'id_jabatan' => $this->input->post('jabatan'),
            'tanggal_diangkat' => $this->input->post('tanggal_diangkat'),
            'tanggal_berhenti' => $this->input->post('tanggal_berhenti'),
            'masa_bakti' => $masa,
            'status' => "aktif",
        );
        $last_id = $this->Mkoordinator->simpan_pengurus($data1);
        $data2 = array(
            'id_pengurus' => $last_id,
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('pass')
        );
        $this->Mkoordinator->simpan_akun($data2);
        $pesan = "ya";
        $sukses = "Data Berhasil Ditambahkan";
        $output = array(
            'pesan' => $pesan,
            'sukses' => $sukses
        );
        echo json_encode($output);
    }

    public function detail_koordinator()
    {
        $id = $this->input->post('idpengurus');
        $data = array(
            'pengurus' => $this->Mkoordinator->pengurus_id($id),
            'akun' => $this->Mkoordinator->login($id)
        );
        $this->load->view('menu_koordinator/koordinator_detail', $data);
    }

    public function form_edit_koordinator()
    {
        $id = $this->input->post('idpengurus');
        $data = array(
            'pengurus' => $this->Mkoordinator->pengurus_id($id),
            'jabatan' => $this->Mkoordinator->jabatan(),
            'akun' => $this->Mkoordinator->login($id)
        );
        $this->load->view('menu_koordinator/koordinator_edit', $data);
    }

    public function edit_koordinator()
    {

        $id = $this->input->post('id_pengurus');
        $angkat = $this->input->post('tanggal_diangkat');
        $berhenti = $this->input->post('tanggal_berhenti');
        $masa = $angkat . ' s/d ' . $berhenti;
        $data = array(
            'id_person' => $this->input->post('idperson'),
            'id_jabatan' => $this->input->post('jabatan'),
            'tanggal_diangkat' => $this->input->post('tanggal_diangkat'),
            'tanggal_berhenti' => $this->input->post('tanggal_berhenti'),
            'masa_bakti' => $masa,
        );
        $this->Mkoordinator->edit_pengurus(array('id_pengurus' => $id), $data);
        $idnya = $this->input->post('id_login');
        $data2 = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('pass')
        );
        $this->Mkoordinator->edit_akun(array('id_login' => $idnya), $data2);
        $pesan = "ya";
        $sukses = "Data Berhasil Diedit";
        $output = array(
            'pesan' => $pesan,
            'sukses' => $sukses
        );
        echo json_encode($output);
    }

    public function nonaktifkan_koordinator()
    {
        $id = $this->input->post('id');
        $tanggal = date('Y/m/d');
        $data = array(
            'status' => "tidak aktif",
            'tanggal_berhenti' => $tanggal
        );
        $this->Mkoordinator->edit_pengurus(array('id_pengurus' => $id), $data);
    }

    public function detail_santri()
    {
        $id = $this->input->post('idperson');
        $data = array(
            'data' => $this->Mkoordinator->santri_idx($id),
            'data_alamat' => $this->Mkoordinator->alamat_wali($id),
            'mahrom' => $this->Mkoordinator->data_mahrom($id),
            'domisili' => $this->Mkoordinator->data_domisili($id)
        );
        $this->load->view('menu_koordinator/detail_santri', $data);
    }
}

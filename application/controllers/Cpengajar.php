<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cpengajar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mpengajar');
    }

    public function pengajar()
    {
        $output['pengajar'] = $this->Mpengajar->pengajar();
        $this->load->view('menu_pengajar/pengajar', $output);
    }

    public function tambah_pengajar_nubdah()
    {
        $this->load->view('menu_pengajar/pengajar_tambah');
    }

    public function otomatis_pengajar_dari_dalam()
    {
        $q = $this->Mpengajar->otomatis_pengajar_dari_dalam();
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

    public function simpan_pengajar_nubdah()
    {
        $data = array(
            'id_person' => $this->input->post('id_person'),
            'status_guru_nubdah' => "Aktif"
        );
        $this->Mpengajar->simpan_pengajar_nubdah($data);
        $pesan = "ya";
        $sukses = "Data Berhasil Disimpan";
        $output = array(
            'pesan' => $pesan,
            'sukses' => $sukses
        );
        echo json_encode($output);
    }

    public function form_edit_pengajar()
    {
        $id = $this->input->post('idpengajar');
        $data = $this->Mpengajar->pengajar_id($id);
        $this->load->view('menu_pengajar/pengajar_edit', $data);
    }

    public function edit_pengajar()
    {
        $id = $this->input->post('idpengajar');
        $data = array('id_person' => $this->input->post('id_person'));
        $this->Mpengajar->edit_pengajar(array('id_guru_nubdah' => $id), $data);
        $pesan = "ya";
        $sukses = "Data Berhasil Diedit";
        $output = array(
            'pesan' => $pesan,
            'sukses' => $sukses
        );
        echo json_encode($output);
    }

    public function nonaktifkan_pengajar()
    {
        $id = $this->input->post('id');
        $data = array('status_guru_nubdah' => "Tidak Aktif");
        $this->Mpengajar->edit_pengajar(array('id_guru_nubdah' => $id), $data);
    }

    public function detail_santri()
    {
        $id = $this->input->post('idperson');
        $data = array(
            'data' => $this->Mpengajar->santri_idx($id),
            'data_alamat' => $this->Mpengajar->alamat_wali($id),
            'mahrom' => $this->Mpengajar->data_mahrom($id),
            'domisili' => $this->Mpengajar->data_domisili($id)
        );
        $this->load->view('menu_pengajar/detail_santri', $data);
    }
}

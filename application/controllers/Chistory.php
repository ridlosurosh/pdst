<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chistory extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mhistory');
        $this->load->model('Mkamar');
    }
    // Fitur data history
    public function menu_history()
    {
        $output['history'] = $this->Mhistory->history_all();
        $this->load->view('menu_history/history', $output);
    }

    // Fitur tambah history
    public function tambah_history()
    {
        $output = array(
            'history' => $this->Mhistory->santri_all(),
            'wilayah' => $this->Mhistory->get_wilayah()->result()
        );
        $this->load->view('menu_history/history_tambah', $output);
    }

    public function get_blok()
    {
        $id = $this->input->post('id', TRUE);
        $output = $this->Mhistory->get_blok($id)->result();
        echo json_encode($output);
    }

    public function get_kamar()
    {
        $id = $this->input->post('id', TRUE);
        $output = $this->Mhistory->get_kamar($id)->result();
        echo json_encode($output);
    }

    public function simpan_history()
    {
        $data = array(
            'id_person' => $this->input->post('id_person'),
            'id_kamar' => $this->input->post('id_kamar'),
            'tgl_penetapan' => $this->input->post('tgl_penetapan')
        );
        $this->Mhistory->simpan_history($data);
        $output = array(
            'pesan' => 'sukses'
        );
        echo json_encode($output);
    }

    // fitur edit history
    public function form_edit_history()
    {
        $id = $this->input->post('idhistory');
        $data = array(
            'wilayah' => $this->Mhistory->get_wilayah()->result(),
            'data_history' => $this->Mhistory->history_id($id),
        );
        $this->load->view('menu_history/history_edit', $data);
    }

    public function edit_history()
    {
        $id = $this->input->post('idhistory');
        $data1 = array(
            'id_person' => $this->input->post('nama_santri'),
            'aktif' => $this->input->post('aktif')
        );
        $this->Mhistory->edit_history(array('id_history' => $id), $data1);
        $data2 = array(
            'id_person' => $this->input->post('nama_santri'),
            'id_kamar' => $this->input->post('nama_kamar'),
            'tgl_penetapan' => $this->input->post('tgl_penetapan')
        );
        $this->Mhistory->simpan_history($data2);
        $output = array(
            'pesan' => 'sukses'
        );
        echo json_encode($output);
    }
}

    // public function otomatis_person()
    // {
    //     $q = $this->Mhistory->otomatis_person();
    //     if ($q->num_rows() > 0) {
    //         foreach ($q->result_array() as $k) {
    //             $data[] = [
    //                 'nama' => $k['nama'],
    //                 'id' => $k['id_person'],
    //                 'alamat' => $k['alamat_lengkap'],
    //                 'jenkel' => $k['jenis_kelamin']
    //             ];
    //         }
    //     } else {
    //         $data[] = [
    //             'nama' => "tidak ada",
    //         ];
    //     }
    //     echo json_encode($data);
    // }
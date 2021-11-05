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
        $output['priode'] = $this->Mkoordinator->priode();
        $this->load->view('menu_koordinator/koordinator', $output);
    }

    public function simpan_priode()
    {
        $periode = $this->input->post('tahun_pertama') . " - " . $this->input->post('tahun_kedua');
        $cek_priode = $this->db->select('periode')
            ->from('tb_periode')
            ->where('periode', $periode)
            ->get()
            ->num_rows();
        if ($cek_priode > 0) {
            $pesan = "tidak";
            $sukses = "Data Sudah Ada ";
        } elseif ($this->input->post('tahun_pertama') === $this->input->post('tahun_kedua')) {
            $pesan = "tidak";
            $sukses = "Tahun Awal Dan Tahun Akhir Tidak Boleh sama";
        } else {
            $data = array(
                'periode' => $periode
            );
            $this->Mkoordinator->simpan_priode($data);
            $pesan = "ya";
            $sukses = "Data Berhasil Ditambahkan";
        }
        $output = array(
            'pesan' => $pesan,
            'sukses' => $sukses
        );
        echo json_encode($output);
    }

    public function tambah_koordinator()
    {
        $output = array(
            'id_periode' => $this->input->post('id'),
            'periode' => $this->input->post('periode'),
            'jabatan' => $this->Mkoordinator->jabatan()
        );
        $this->load->view('menu_koordinator/koordinator_tambah', $output);
    }

    public function ui_nama_santri()
    {
        $id_pengurus_lawas = $this->db->select('id_person')
            ->from('tb_pengurus')
            ->where('status', 'Aktif')
            ->get();
        $id_guru_lawas = $this->db->select('id_person')
            ->from('tb_guru_nubdah')
            ->where('status_guru_nubdah', 'Aktif')
            ->get();
        $id_karyawan_lawas = $this->db->select('id_person')
            ->from('tb_karyawan')
            ->where('status', 'Aktif')
            ->get();
        if ($id_pengurus_lawas->num_rows() > 0 || $id_guru_lawas->num_rows() > 0 || $id_karyawan_lawas->num_rows() > 0) {
            foreach ($id_pengurus_lawas->result_array() as  $e) {
                $dat[] = $e['id_person'];
            }
            foreach ($id_guru_lawas->result_array() as  $ll) {
                $dat[] = $ll['id_person'];
            }
            foreach ($id_karyawan_lawas->result_array() as  $jj) {
                $dat[] = $jj['id_person'];
            }
        } else {
            $dat = ['0'];
        }
        $cari = $this->input->post('cari');
        $q = $this->db->from('tb_person')
            ->order_by('nama', 'ASC')
            ->group_start()
            ->like('nama', $cari, 'both')
            ->or_like('niup', $cari, 'both')
            ->group_end()
            ->where_not_in('id_person', $dat)
            ->where('status', 'aktif')
            ->get();
        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $k) {
                $data[] = [
                    'sukses' => true,
                    'nama' => $k['nama'],
                    'id_person' => $k['id_person'],
                    'niup' => $k['niup'],
                ];
            }
        } else {
            $data[] = [
                'sukses' => false,
                'nama' =>  '<span style="color:red">' . $cari . '</span> tidak ditemukan',
                'niup' =>  '<span style="color:red">' . $cari . '</span> tidak ditemukan',
            ];
        }
        echo json_encode($data);
    }

    public function simpan_koordinator()
    {
        $angkat = $this->input->post('tanggal_diangkat');
        $berhenti = $this->input->post('tanggal_berhenti');
        $masa = $angkat . ' s/d ' . $berhenti;
        $pass =  $this->input->post('pass');

        $ketum = $this->db->where('id_jabatan', '1')
            ->where('status', 'aktif')
            ->get('tb_pengurus')
            ->num_rows();
        $waka_ketum = $this->db->where('id_jabatan', '2')
            ->where('status', 'aktif')
            ->get('tb_pengurus')
            ->num_rows();
        if ($ketum > 0  && $this->input->post('jabatan') === "1") {
            $pesan = "tidak";
            $sukses = " ketum tidak boleh lebih dari satu ";
        } elseif ($waka_ketum > 0  && $this->input->post('jabatan') === "2") {
            $pesan = "tidak";
            $sukses = "wakil ketum tidak boleh lebih dari satu";
        } else {
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
                'password' => $pass
            );
            $this->Mkoordinator->simpan_akun($data2);
            $pesan = "ya";
            $sukses = "Data Berhasil Ditambahkan";
        }

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
            // 'jabatan' => $jabatan,
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

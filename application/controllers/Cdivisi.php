<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cdivisi extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Mdivisi');
    }

    public function nubdzah()
    {
        $this->load->view('menu_divisi/nubdzah/nubdzahAll');
    }

    public function madin()
    {
        $this->load->view('menu_divisi/madin/madinAll');
    }

    public function tahfidz()
    {
        $this->load->view('menu_divisi/tahfidz/tahfidzAll');
    }

    public function nubdzahAll() {
        $table = ' tb_divisinubdah';
        $tblJoin = 'tb_person';
        $tableJoin = "tb_person.id_person=tb_divisinubdah.id_person";
        $tableWhere = 'tb_divisinubdah.status';
        $column_order = array(null, 'niup','nama','alamat_lengkap'); 
		$column_search = array('niup','nama','alamat_lengkap'); 
		$order = array('id' => 'desc'); 
        $list = $this->Mdivisi->get_datatables($table, $tblJoin,$tableJoin,$column_search,$order,$tableWhere);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->niup;
			$row[] = $field->nama;
			$row[] = $field->alamat_lengkap;
			$row[] = $field->tgl_masuk;
            $row[] = '
                        <button type="button" id="bt-pindah" class="btn btn-sm rounded-circle btn-info" title="Detail" data="'.$field->id_person.'">
                            <i class="fas fa-arrow-right"></i>
                        </button>
                        <button type="button" id="bt-hapus" class="btn btn-sm rounded-circle btn-danger" title="Hapus" data="'.$field->id_person.'">
                            <i class="fas fa-trash"></i>
                        </button>';

			$data[] = $row;
		}

        $output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Mdivisi->count_all($table, $tblJoin,$tableJoin,$column_search,$order,$tableWhere),
			"recordsFiltered" => $this->Mdivisi->count_filtered($table, $tblJoin,$tableJoin,$column_search,$order,$tableWhere),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
    }

    public function madinAll() {
        $table = ' tb_divisimadin';
        $tblJoin = 'tb_person';
        $tableJoin = "tb_person.id_person=tb_divisimadin.id_person";
        $tableWhere = 'tb_divisimadin.status';
        $column_order = array(null, 'niup','nama','alamat_lengkap'); 
		$column_search = array('niup','nama','alamat_lengkap'); 
		$order = array('id' => 'desc'); 
        $list = $this->Mdivisi->get_datatables($table, $tblJoin,$tableJoin,$column_search,$order,$tableWhere);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->niup;
			$row[] = $field->nama;
			$row[] = $field->alamat_lengkap;
			$row[] = $field->tgl_masuk;
            $row[] = '
                        <button type="button" id="bt-pindah" class="btn btn-sm rounded-circle btn-info" title="Detail" data="'.$field->id_person.'">
                            <i class="fas fa-arrow-right"></i>
                        </button>
                        <button type="button" id="bt-hapus" class="btn btn-sm rounded-circle btn-danger" title="Hapus" data="'.$field->id_person.'">
                            <i class="fas fa-trash"></i>
                        </button>';

			$data[] = $row;
		}

        $output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Mdivisi->count_all($table, $tblJoin,$tableJoin,$column_search,$order,$tableWhere),
			"recordsFiltered" => $this->Mdivisi->count_filtered($table, $tblJoin,$tableJoin,$column_search,$order,$tableWhere),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
    }

    public function tahfidzAll() {
        $table = ' tb_divisitahfidz';
        $tblJoin = 'tb_person';
        $tableJoin = "tb_person.id_person=tb_divisitahfidz.id_person";
        $tableWhere = 'tb_divisitahfidz.status';
        $column_order = array(null, 'niup','nama','alamat_lengkap'); 
		$column_search = array('niup','nama','alamat_lengkap'); 
		$order = array('id' => 'desc'); 
        $list = $this->Mdivisi->get_datatables($table, $tblJoin,$tableJoin,$column_search,$order,$tableWhere);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->niup;
			$row[] = $field->nama;
			$row[] = $field->alamat_lengkap;
			$row[] = $field->tgl_masuk;
            $row[] = '
                        <button type="button" id="bt-pindah" class="btn btn-sm rounded-circle btn-info" title="Detail" data="'.$field->id_person.'">
                            <i class="fas fa-arrow-right"></i>
                        </button>
                        <button type="button" id="bt-hapus" class="btn btn-sm rounded-circle btn-danger" title="Hapus" data="'.$field->id_person.'">
                            <i class="fas fa-trash"></i>
                        </button>';

			$data[] = $row;
		}

        $output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Mdivisi->count_all($table, $tblJoin,$tableJoin,$column_search,$order,$tableWhere),
			"recordsFiltered" => $this->Mdivisi->count_filtered($table, $tblJoin,$tableJoin,$column_search,$order,$tableWhere),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
    }

    public function formSimpanNubdzah()
    {
        $this->load->view('menu_divisi/nubdzah/simpanN');
    }

    public function formSimpanMadin()
    {
        $this->load->view('menu_divisi/madin/simpanM');
    }

    public function formSimpanTahfidz()
    {
        $this->load->view('menu_divisi/tahfidz/simpanT');
    }

    public function ui_data()
    {
        $id_nubdzah = $this->db->select('id_person')
            ->from('tb_divisinubdah')
            ->where('status', 'Aktif')
            ->get();
        $id_madin = $this->db->select('id_person')
            ->from('tb_divisimadin')
            ->where('status', 'Aktif')
            ->get();
        $id_tahfidz = $this->db->select('id_person')
            ->from('tb_divisitahfidz')
            ->where('status', 'Aktif')
            ->get();
        if ($id_nubdzah->num_rows() > 0 || $id_madin->num_rows() > 0 || $id_tahfidz->num_rows() > 0) {
            foreach ($id_nubdzah->result_array() as  $e) {
                $dat[] = $e['id_person'];
            }
            foreach ($id_madin->result_array() as  $ll) {
                $dat[] = $ll['id_person'];
            }
            foreach ($id_tahfidz->result_array() as  $jj) {
                $dat[] = $jj['id_person'];
            }
        } else {
            $dat = ['0'];
        }
        $cari = $this->input->post('cari');
        $q = $this->Mdivisi->ui_data_santri($cari, $dat);
        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $k) {
                $data[] = [
                    'sukses' => true,
                    'nama' => $k['nama'],
                    'id_person' => $k['id_person'],
                    'niup' => $k['niup'],
                    'alamat' => $k['alamat_lengkap'],
                ];
            }
        } else {
            $data[] = [
                'sukses' => false,
                'nama' =>  '<span style="color:red">' . $cari . '</span> tidak ditemukan',
                'niup' =>  '<span style="color:red">' . $cari . '</span> tidak ditemukan',
                'alamat' =>  '<span style="color:red">' . $cari . '</span> tidak ditemukan',
            ];
        }
        echo json_encode($data);
    }

    public function simpan_data()
    {
        $jmlData = $this->input->post("nomor_urut_santri");
        $tb = $this->input->post("tb");
        $divisi = $this->input->post("divisi");
        if ($this->input->post("id_person") === null) {
            $output = array(
                'status' => 1,
                'pesan' => 'Silahkan Cari Santri',
            );
        } else {
                for ($i=0; $i < $jmlData; $i++) { 
                    if (trim($this->input->post('tgl_mulai[' . $i . ']') != null)) {
                        $idP = trim($this->input->post('id_person[' . $i . ']'));
                        $tgl = trim($this->input->post('tgl_mulai[' . $i . ']'));
                        $data = array(
                            'id_person' => $idP,
                            'tgl_masuk' => $tgl,
                            'tgl_keluar' => "",
                            'status' => "Aktif",
                        );
                        $this->Mdivisi->simpan_data($tb,$data);
                        $dataHistori = array(
                            'divisi' => $divisi,
                            'id_person' => $idP,
                            'tgl_masuk' => $tgl,
                            'tgl_berhenti' => "",
                            'status' => "Aktif",
                        );
                        $this->Mdivisi->simpan_data_histori($dataHistori);
                        $output = array(
                            'status' => 2,
                            'pesan' => '&nbsp;&nbsp;Data berhasil di simpan',
                        );
                    } else {
                        $output = array(
                            'status' => 3,
                            'pesan' => 'Silahkan di isi Tanggal Masuk',
                        );
                    }
                }
        }

        echo json_encode($output);
    }

    

    public function pindahDivisi()
    {
        $id = $this->input->post('id');
        $dvs = $this->input->post('divisi');
        $tb = $this->input->post('tb');
        $data = array(
            'tgl_keluar' => date('Y-m-d'),
            'status' => "Tidak"
        );
        $dataHistori = array(
            'tgl_berhenti' => date('Y-m-d'),
            'status' => "Tidak Aktif"
        );
        $this->Mdivisi->editDivisi($tb,$id,$data);
        $this->Mdivisi->editHistori('tb_history_divisi',$id,$dataHistori);

        //  Tambah data 
        $dataTambahDivisi = array( 
            'id_person' => $id,
            'tgl_masuk' => date('Y-m-d'),
            'tgl_keluar' => "",
            'status' => "Aktif"
        );
        if ($dvs == "1") {
            $divisi = "nubdzah";
            $table = "tb_divisinubdah";
        } elseif ($dvs == "2") {
            $divisi = "madin";
            $table = "tb_divisimadin";
        } elseif ($dvs == "3") {
            $divisi = "tahfidz";
            $table = "tb_divisitahfidz";
        } else {
            $divisi = "";
        }
        $dataTambahHistori = array(
            'id_person' => $id,
            'divisi' => $divisi,
            'tgl_masuk' => date('Y-m-d'),
            'tgl_berhenti' => "",
            'status' => "Aktif"
        );
        $this->Mdivisi->simpan_data($table,$dataTambahDivisi);
        $this->Mdivisi->simpan_data_histori($dataTambahHistori);

        $output = array(
            'status' => true,
            'pesan' => 'berhasil',
        );
        echo json_encode($output);
    }

    public function nonaktif(  )
    {
        $id = $this->input->post("id");
        $tb = $this->input->post("tb");
        $data = array(
            'tgl_keluar' => date('Y-m-d'),
            'status' => "Tidak"
        );
        $dataHistori = array(
            'tgl_berhenti' => date('Y-m-d'),
            'status' => "Tidak Aktif"
        );
        $this->Mdivisi->editDivisi($tb,$id,$data);
        $this->Mdivisi->editHistori('tb_history_divisi',$id,$dataHistori);
    }
}
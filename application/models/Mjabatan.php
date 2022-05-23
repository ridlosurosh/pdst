<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mjabatan extends CI_Model
{

    public function periode_all()
    {
        $this->db->from('tb_periode');
        $this->db->order_by('id_periode', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function tambah_periode($data)
    {
        return $this->db->insert('tb_periode', $data);
    }

    public function periode_id($id)
    {
        $this->db->where('id_periode', $id);
        $this->db->from('tb_periode');
        $query = $this->db->get();
        return $query->row();
    }

    public function hapus_periode($id)
    {
	    $this->db->delete('tb_periode', $id);
    }

    public function hapus_jabatan($id)
    {
	    $this->db->delete('tb_jabatan', $id);
    }

    public function jabatan_all($id)
    {
        $this->db->from('tb_jabatan');
        $this->db->where('id_periode', $id);
        $this->db->where('status', 'Aktif');
        $query = $this->db->get();
        return $query->result();
    }

    public function simpan_jabatan($data)
    {
        return $this->db->insert('tb_jabatan', $data);
    }

    public function jabatan_id($id)
    {
        $this->db->where('id_jabatan', $id);
        $this->db->from('tb_jabatan');
        $query = $this->db->get();
        return $query->row();
    }

    public function edit_jabatan($id, $data)
    {
        return $this->db->update('tb_jabatan', $data, $id);
    }

    public function detail($id)
    {
        $this->db->select('tb_person.niup,tb_person.nama,tb_person.alamat_lengkap,tb_jabatan.nm_jabatan,tb_pengurus.status as sts');
        $this->db->join('tb_person', 'tb_person.id_person=tb_pengurus.id_person');
        $this->db->join('tb_jabatan', 'tb_jabatan.id_jabatan=tb_pengurus.id_jabatan');
        $this->db->where('tb_pengurus.id_jabatan', $id);
        $this->db->order_by('sts', 'ASC');
        $this->db->from('tb_pengurus');
        return $this->db->get()->result();
    }
}

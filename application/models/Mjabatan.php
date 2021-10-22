<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mjabatan extends CI_Model
{

    public function jabatan_all()
    {
        $this->db->from('tb_jabatan');
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
}

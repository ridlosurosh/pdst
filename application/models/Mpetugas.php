<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mpetugas extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    #Login
    public function login($data)
    {

        $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('tb_login');
        $this->db->join('tb_pengurus', 'tb_pengurus.id_pengurus=tb_login.id_pengurus');
        $this->db->join('tb_jabatan', 'tb_jabatan.id_jabatan=tb_pengurus.id_jabatan');
        $this->db->where($condition);
        $this->db->where('tb_pengurus.status', 'aktif');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function read_user_information($username)
    {
        $condition = "username =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->join('tb_pengurus', 'tb_pengurus.id_pengurus=tb_login.id_pengurus');
        $this->db->join('tb_jabatan', 'tb_jabatan.id_jabatan=tb_pengurus.id_jabatan');
        $this->db->from('tb_login');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}

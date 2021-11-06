<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mmaster extends CI_Model
{

    public function profil($id)
    {
        $this->db->join('tb_pengurus', 'tb_pengurus.id_pengurus=tb_login.id_pengurus');
        $this->db->join('tb_jabatan', 'tb_jabatan.id_jabatan=tb_pengurus.id_jabatan');
        $this->db->join('tb_person', 'tb_person.id_person=tb_pengurus.id_person');
        $this->db->from('tb_login');
        $this->db->where('id_login', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function jum_santri()
    {
        return $this->db->count_all_results('tb_person');
    }

    public function jum_putra()
    {
        $this->db->where('jenis_kelamin', 'Laki-Laki');
        return $this->db->count_all_results('tb_person');
    }

    public function jum_putri()
    {
        $this->db->where('jenis_kelamin', 'Perempuan');
        return $this->db->count_all_results('tb_person');
    }

    public function jum_pengurus()
    {
        $this->db->where('tb_pengurus.status', 'aktif');
        return $this->db->count_all_results('tb_pengurus');
    }

    public function jum_karyawan()
    {
        $this->db->where('tb_karyawan.status', 'Aktif');
        return $this->db->count_all_results('tb_karyawan');
    }

    public function jum_pengajar()
    {
        $this->db->where('status_guru_nubdah', 'Aktif');
        return $this->db->count_all_results('tb_guru_nubdah');
    }

    public function jum_putri_semua()
    {
        $this->db->where('jenis_kelamin', 'Perempuan');
        return $this->db->count_all_results('tb_person');
    }

    public function jumlah_santri_perwilayah()
    {
        $query = $this->db->query("SELECT tb_wilayah.nama_wilayah,COUNT(tb_kamar.id_kamar) as jml from tb_history,tb_kamar,tb_wilayah,tb_blok where tb_history.id_kamar=tb_kamar.id_kamar AND tb_kamar.id_blok=tb_blok.id_blok AND tb_blok.id_wilayah=tb_wilayah.id_wilayah AND tb_history.aktif='ya' GROUP BY nama_wilayah ORDER BY jml desc LIMIT 10");
        return $query->result();
    }
}

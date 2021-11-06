<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mgrafik extends CI_Model
{
    public function grafik_tahun()
    {
        $query = $this->db->query("SELECT YEAR(tgl_daftar) as tahun, COUNT(id_person) as jml FROM tb_person GROUP BY YEAR(tgl_daftar)");
        return $query->result();
    }

    // public function grafik_filter($tahun)
    // {
    //     $this->db->where('YEAR(tanggal_kunjungan)', date($tahun));
    //     $this->db->select('monthname(tanggal_kunjungan) as bulan');
    //     $this->db->select("count(id_person) as jml");
    //     $this->db->group_by('month(tanggal_kunjungan)');
    //     return $this->db->from('tb_kunjungan_santri')->get()->result();
    // }

    // public function grafik_filter_l($tahun, $jenis)
    // {
    //     $this->db->join('tb_person', 'tb_person.id_person=tb_kunjungan_santri.id_person');
    //     $this->db->where('YEAR(tanggal_kunjungan)', date($tahun));
    //     $this->db->where('jenis_kelamin', $jenis);
    //     $this->db->select('monthname(tanggal_kunjungan) as bulan');
    //     $this->db->select("count(tb_kunjungan_santri.id_person) as jml_lk");
    //     $this->db->group_by('month(tanggal_kunjungan)');
    //     return $this->db->from('tb_kunjungan_santri')->get()->result();
    // }

    // public function grafik_filter_p($tahun, $jenis)
    // {
    //     $this->db->join('tb_person', 'tb_person.id_person=tb_kunjungan_santri.id_person');
    //     $this->db->where('YEAR(tanggal_kunjungan)', date($tahun));
    //     $this->db->where('jenis_kelamin', $jenis);
    //     $this->db->select('monthname(tanggal_kunjungan) as bulan');
    //     $this->db->select("count(tb_kunjungan_santri.id_person) as jml_pr");
    //     $this->db->group_by('month(tanggal_kunjungan)');
    //     return $this->db->from('tb_kunjungan_santri')->get()->result();
    // }
}

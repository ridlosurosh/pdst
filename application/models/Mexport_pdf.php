<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mexport_pdf extends CI_Model
{

	public function get_provinsi()
	{
		$query = $this->db->get('provinsi');
		return $query;
	}

	public function get_periode()
	{
		$query = $this->db->get('tb_periode');
		return $query;
	}

	// Pdf Tahun
	function cek_tahun($tahun)
	{
		$this->db->from('tb_person');
		// $this->db->where('tgl_daftar', $tahun);
		$this->db->where("(SUBSTRING(tgl_daftar, 1, 4) = '$tahun')");
		$query = $this->db->get();
		return $query->result();
	}

	public function pdf_tahun($id, $jenis)
	{
		$this->db->where('status', 'aktif');
		$this->db->from('tb_person');
		// $this->db->where('tgl_daftar', $id);
		$this->db->where("(SUBSTRING(tgl_daftar, 1, 4) = '$id')");
		$this->db->where('jenis_kelamin', $jenis);
		$query = $this->db->get();
		return $query->result();
	}

	// Pdf provinsi
	function cek_prov($prov)
	{
		$this->db->from('tb_person');
		$this->db->where('prov', $prov);
		$query = $this->db->get();
		return $query->result();
	}

	public function provinsi($id)
	{
		$this->db->from('provinsi');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function pdf_provinsi($provinsi, $jenis)
	{
		$this->db->where('status', 'aktif');
		$this->db->from('tb_person');
		$this->db->where('prov', $provinsi);
		$this->db->where('jenis_kelamin', $jenis);
		$query = $this->db->get();
		return $query->result();
	}

	// PDF kabupaten
	function cek_kab($kab)
	{
		$this->db->from('tb_person');
		$this->db->where('kab', $kab);
		$query = $this->db->get();
		return $query->result();
	}

	public function kabupaten($id)
	{
		$this->db->from('kabupaten');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function pdf_kabupaten($kabupaten, $jenis)
	{
		$this->db->where('status', 'aktif');
		$this->db->from('tb_person');
		$this->db->where('kab', $kabupaten);
		$this->db->where('jenis_kelamin', $jenis);
		$query = $this->db->get();
		return $query->result();
	}

	// PDF Kecamatan
	function cek_kec($kec)
	{
		$this->db->from('tb_person');
		$this->db->where('kec', $kec);
		$query = $this->db->get();
		return $query->result();
	}

	public function kecamatan($id)
	{
		$this->db->from('kecamatan');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function pdf_kecamatan($kecamatan, $jenis)
	{
		$this->db->where('status', 'aktif');
		$this->db->from('tb_person');
		$this->db->where('kec', $kecamatan);
		$this->db->where('jenis_kelamin', $jenis);
		$query = $this->db->get();
		return $query->result();
	}

	// PDF Kecamatan
	function cek_periode($per)
	{
		$this->db->from('tb_pengurus');
		$this->db->where('id_periode', $per);
		$query = $this->db->get();
		return $query->result();
	}

	public function periode($id)
	{
		$this->db->from('tb_periode');
		$this->db->where('id_periode', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function pdf_pengurus($periode, $jenis)
	{
		$this->db->join('tb_person', 'tb_person.id_person=tb_pengurus.id_person');
		$this->db->join('tb_jabatan', 'tb_jabatan.id_jabatan=tb_pengurus.id_jabatan');
		$this->db->from('tb_pengurus');
		$this->db->where('id_periode', $periode);
		$this->db->where('jenis_kelamin', $jenis);
		$query = $this->db->get();
		return $query->result();
	}

	// Pdf Pengajar
	function cek_tahun_angkat($tahun)
	{
		$this->db->join('tb_person', 'tb_person.id_person=tb_guru_nubdah.id_person');
		$this->db->from('tb_guru_nubdah');
		// $this->db->where('tgl_daftar', $tahun);
		$this->db->where("(SUBSTRING(tgl_diangkat, 0, 4) = '$tahun')");
		$query = $this->db->get();
		return $query->result();
	}

	public function pdf_pengajar($jenis)
	{
		$this->db->join('tb_person', 'tb_person.id_person=tb_guru_nubdah.id_person');
		$this->db->where('status_guru_nubdah', 'Aktif');
		// $this->db->where("(SUBSTRING(tgl_diangkat, 0, 4) = '$id')");
		$this->db->where('jenis_kelamin', $jenis);
		$this->db->from('tb_guru_nubdah');
		$query = $this->db->get();
		return $query->result();
	}

	// public function pengajar($jenis)
	// {
	// 	$this->db->join('tb_person', 'tb_person.id_person=tb_guru_nubdah.id_person');
	// 	$this->db->from('tb_guru_nubdah');

	// 	$query = $this->db->get();
	// 	return $query->result();
	// }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mexport extends CI_Model
{

	function cek_santri($prov)
	{
		$this->db->from('tb_person');
		$this->db->where('prov', $prov);
		$query = $this->db->get();
		return $query->result();
	}
	// Pdf Putra
	public function export_putra_pdf($id)
	{
		$this->db->join('desa', 'desa.id=tb_person.desa');
		$this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
		$this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
		$this->db->join('provinsi', 'provinsi.id=tb_person.prov');
		$this->db->select('niup, nama, jenis_kelamin, alamat_lengkap, nm_a, nm_i, pos, desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi, pos');
		$this->db->from('tb_person');
		$this->db->where('prov', $id);
		$query = $this->db->get();
		return $query->result();
	}

	// Pdf Putri
	public function export_putri_pdf()
	{
		$this->db->join('desa', 'desa.id=tb_person.desa');
		$this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
		$this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
		$this->db->join('provinsi', 'provinsi.id=tb_person.prov');
		$this->db->select('niup, nama, jenis_kelamin, alamat_lengkap, nm_a, nm_i, pos, desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi, pos');
		$this->db->where('status_dipesantren', 'Santri');
		$this->db->where_not_in('jenis_kelamin', 'Laki-Laki');
		$this->db->from('tb_person');
		$query = $this->db->get();
		return $query->result();
	}

	// Export pdf semua pengurus
	public function export_pengurus_semuanya()
	{
		$this->db->join('desa', 'desa.id=tb_person.desa');
		$this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
		$this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
		$this->db->join('provinsi', 'provinsi.id=tb_person.prov');
		$this->db->select('niup, nama, jenis_kelamin, alamat_lengkap,	jenis_kelamin, nm_a, nm_i, pos, desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi, pos');
		$this->db->where('status_dipesantren', 'Pengurus');
		$this->db->from('tb_person');
		$query = $this->db->get();
		return $query->result();
	}

	// Pdf pengurus Putra 
	public function export_pengurus_putra_pdf()
	{
		$this->db->join('desa', 'desa.id=tb_person.desa');
		$this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
		$this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
		$this->db->join('provinsi', 'provinsi.id=tb_person.prov');
		$this->db->select('niup, nama, jenis_kelamin, alamat_lengkap, nm_a, nm_i, pos, desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi, pos');
		$this->db->where('status_dipesantren', 'Pengurus');
		$this->db->where_not_in('jenis_kelamin', 'Perempuan');
		$this->db->from('tb_person');
		$query = $this->db->get();
		return $query->result();
	}

	// Pdf pengurus Putri
	public function export_pengurus_putri_pdf()
	{
		$this->db->join('desa', 'desa.id=tb_person.desa');
		$this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
		$this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
		$this->db->join('provinsi', 'provinsi.id=tb_person.prov');
		$this->db->select('niup, nama, jenis_kelamin, alamat_lengkap, nm_a, nm_i, pos, desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi, pos');
		$this->db->where('status_dipesantren', 'Pengurus');
		$this->db->where_not_in('jenis_kelamin', 'Laki-Laki');
		$this->db->from('tb_person');
		$query = $this->db->get();
		return $query->result();
	}

	public function guru_nubdah_semua()
	{
		$this->db->join('tb_person', 'tb_person.id_person=tb_guru_nubdah.id_person');
		$this->db->join('desa', 'desa.id=tb_person.desa');
		$this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
		$this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
		$this->db->join('provinsi', 'provinsi.id=tb_person.prov');
		$this->db->select('niup, nama, jenis_kelamin, alamat_lengkap, nm_a, nm_i, pos, desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi, pos');
		$this->db->where('tb_person.status', 'aktif');
		$this->db->from('tb_guru_nubdah');
		$query = $this->db->get();
		return $query->result();
	}

	public function guru_nubdah_putra()
	{
		$this->db->join('tb_person', 'tb_person.id_person=tb_guru_nubdah.id_person');
		$this->db->join('desa', 'desa.id=tb_person.desa');
		$this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
		$this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
		$this->db->join('provinsi', 'provinsi.id=tb_person.prov');
		$this->db->select('niup, nama, jenis_kelamin, alamat_lengkap, nm_a, nm_i, pos, desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi, pos');
		$this->db->where('tb_person.status', 'aktif');
		$this->db->where_not_in('tb_person.jenis_kelamin', 'Perempuan');
		$this->db->from('tb_guru_nubdah');
		$query = $this->db->get();
		return $query->result();
	}

	public function guru_nubdah_putri()
	{
		$this->db->join('tb_person', 'tb_person.id_person=tb_guru_nubdah.id_person');
		$this->db->join('desa', 'desa.id=tb_person.desa');
		$this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
		$this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
		$this->db->join('provinsi', 'provinsi.id=tb_person.prov');
		$this->db->select('niup, nama, jenis_kelamin, alamat_lengkap, nm_a, nm_i, pos, desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi, pos');
		$this->db->where('tb_person.status', 'aktif');
		$this->db->where_not_in('tb_person.jenis_kelamin', 'Laki-Laki');
		$this->db->from('tb_guru_nubdah');
		$query = $this->db->get();
		return $query->result();
	}

	public function guru_diniyah_semua()
	{
		$this->db->join('tb_person', 'tb_person.id_person=tb_guru_diniyah.id_person');
		$this->db->join('desa', 'desa.id=tb_person.desa');
		$this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
		$this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
		$this->db->join('provinsi', 'provinsi.id=tb_person.prov');
		$this->db->select('niup, nama, jenis_kelamin, alamat_lengkap, nm_a, nm_i, pos, desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi, pos');
		$this->db->from('tb_guru_diniyah');
		$query = $this->db->get();
		return $query->result();
	}

	public function guru_diniyah_putra()
	{
		$this->db->join('tb_person', 'tb_person.id_person=tb_guru_diniyah.id_person');
		$this->db->join('desa', 'desa.id=tb_person.desa');
		$this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
		$this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
		$this->db->join('provinsi', 'provinsi.id=tb_person.prov');
		$this->db->select('niup, nama, jenis_kelamin, alamat_lengkap, nm_a, nm_i, pos, desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi, pos');
		$this->db->where_not_in('tb_person.jenis_kelamin', 'Perempuan');
		$this->db->from('tb_guru_diniyah');
		$query = $this->db->get();
		return $query->result();
	}

	public function guru_diniyah_putri()
	{
		$this->db->join('tb_person', 'tb_person.id_person=tb_guru_diniyah.id_person');
		$this->db->join('desa', 'desa.id=tb_person.desa');
		$this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
		$this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
		$this->db->join('provinsi', 'provinsi.id=tb_person.prov');
		$this->db->select('niup, nama, jenis_kelamin, alamat_lengkap, nm_a, nm_i, pos, desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi, pos');
		$this->db->where_not_in('tb_person.jenis_kelamin', 'Laki-Laki');
		$this->db->from('tb_guru_diniyah');
		$query = $this->db->get();
		return $query->result();
	}

	// Karyawan
	public function karyawan_semua()
	{
		$this->db->join('desa', 'desa.id=tb_person.desa');
		$this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
		$this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
		$this->db->join('provinsi', 'provinsi.id=tb_person.prov');
		$this->db->select('niup, nama, jenis_kelamin, alamat_lengkap,	jenis_kelamin, nm_a, nm_i, pos, desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi, pos');
		$this->db->where('status_dipesantren', 'Karyawan');
		$this->db->from('tb_person');
		$query = $this->db->get();
		return $query->result();
	}

	public function karyawan_putra()
	{
		$this->db->join('desa', 'desa.id=tb_person.desa');
		$this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
		$this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
		$this->db->join('provinsi', 'provinsi.id=tb_person.prov');
		$this->db->select('niup, nama, jenis_kelamin, alamat_lengkap,	jenis_kelamin, nm_a, nm_i, pos, desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi, pos');
		$this->db->where_not_in('jenis_kelamin', 'Perempuan');
		$this->db->where('status_dipesantren', 'Karyawan');
		$this->db->from('tb_person');
		$query = $this->db->get();
		return $query->result();
	}

	public function karyawan_putri()
	{
		$this->db->join('desa', 'desa.id=tb_person.desa');
		$this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
		$this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
		$this->db->join('provinsi', 'provinsi.id=tb_person.prov');
		$this->db->select('niup, nama, jenis_kelamin, alamat_lengkap,	jenis_kelamin, nm_a, nm_i, pos, desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi, pos');
		$this->db->where_not_in('jenis_kelamin', 'Laki-Laki');
		$this->db->where('status_dipesantren', 'Karyawan');
		$this->db->from('tb_person');
		$query = $this->db->get();
		return $query->result();
	}

	// Alumni
	public function alumni_semua()
	{
		$this->db->join('desa', 'desa.id=tb_person.desa');
		$this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
		$this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
		$this->db->join('provinsi', 'provinsi.id=tb_person.prov');
		$this->db->select('niup, nama, jenis_kelamin, alamat_lengkap,	jenis_kelamin, nm_a, nm_i, pos, desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi, pos');
		$this->db->where('status_dipesantren', 'Alumni');
		$this->db->from('tb_person');
		$query = $this->db->get();
		return $query->result();
	}

	public function alumni_putra()
	{
		$this->db->join('desa', 'desa.id=tb_person.desa');
		$this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
		$this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
		$this->db->join('provinsi', 'provinsi.id=tb_person.prov');
		$this->db->select('niup, nama, jenis_kelamin, alamat_lengkap,	jenis_kelamin, nm_a, nm_i, pos, desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi, pos');
		$this->db->where_not_in('jenis_kelamin', 'Perempuan');
		$this->db->where('status_dipesantren', 'Alumni');
		$this->db->from('tb_person');
		$query = $this->db->get();
		return $query->result();
	}

	public function alumni_putri()
	{
		$this->db->join('desa', 'desa.id=tb_person.desa');
		$this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
		$this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
		$this->db->join('provinsi', 'provinsi.id=tb_person.prov');
		$this->db->select('niup, nama, jenis_kelamin, alamat_lengkap,	jenis_kelamin, nm_a, nm_i, pos, desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi, pos');
		$this->db->where_not_in('jenis_kelamin', 'Laki-Laki');
		$this->db->where('status_dipesantren', 'Alumni');
		$this->db->from('tb_person');
		$query = $this->db->get();
		return $query->result();
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cmaster extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mmaster');
	}

	public function index()
	{
		$id = $this->Mmaster->profil($this->session->userdata['logged_in']['id_user']);
		$output = array(
			'nama_user' => $id->nama,
			'alamat' => $id->alamat_lengkap,
			'jabatan' => $id->nm_jabatan,
			'foto' => $id->foto_warna_santri
		);
		$this->load->view('dashboard', $output);
	}

	public function menu_halaman_utama()
	{
		$data = array(
			'santri' => $this->Mmaster->jum_santri(),
			'putra' => $this->Mmaster->jum_putra(),
			'putri' => $this->Mmaster->jum_putri(),
			'pengurus' => $this->Mmaster->jum_pengurus(),
			'kamar' => $this->Mmaster->jumlah_santri_perwilayah(),
			'karyawan' => $this->Mmaster->jum_karyawan(),
			'pengajar' => $this->Mmaster->jum_pengajar()
		);
		$this->load->view('halaman_utama', $data);
	}
}

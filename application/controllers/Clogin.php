<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Clogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->load->model('Mpetugas');
    }

    public function index()
    {
        if (isset($this->session->userdata['logged_in'])) {
            if (($this->session->userdata['logged_in']['jabatan']) == 'Ketua Umum') {
                redirect(site_url('admin'));
            } else if (($this->session->userdata['logged_in']['jabatan']) == 'Sekretaris Pesantren') {
                redirect(site_url('user'));
            }
        } else {
            $this->load->view('login');
        }
    }

    public function verifikasi()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            redirect(site_url('log-in'));
        } else {
            $data_login = array(
                'username' => $this->input->post('username'),
                'password' => base64_encode($this->input->post('password'))
            );
            $result = $this->Mpetugas->login($data_login);
            if ($result == TRUE) {
                $username = $this->input->post('username');
                $result = $this->Mpetugas->read_user_information($username);
                if ($result != false) {
                    if (date('Y-d-m') >= $result[0]->tanggal_berhenti) {
                        $data = array(
                            'pesan' => "Akun Sudah Lewat Dari Masanya",
                        );
                        echo json_encode($data);
                    } else {
                        $session_data = array(
                            'id_user' => $result[0]->id_login,
                            'jabatan' => $result[0]->nm_jabatan,
                            'id_pengurus' => $result[0]->id_pengurus,
                            'tanggal_berhenti' => $result[0]->tanggal_berhenti,
                        );
                        $this->session->set_userdata('logged_in', $session_data);
                        $data = array(
                            'pesan' => "sukses",
                            'jabatan' => $result[0]->nm_jabatan,
                            'tanggal_berhenti' => $result[0]->tanggal_berhenti,
                        );
                        echo json_encode($data);
                    }
                }
            } else {
                $data = array(
                    'pesan' => "Username atau Paswword Salah",
                );
                echo json_encode($data);
            }
        }
    }
    public function logout()
    {
        $sess_array = array(
            'username' => '',
            'jabatan' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        redirect(site_url('log-in'));
    }
}

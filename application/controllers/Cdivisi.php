<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cdivisi extends CI_Controller
{
    public function menu_divisi()
    {
        $this->load->view('menu_divisi/divisi');
    }
}
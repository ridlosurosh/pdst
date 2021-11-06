<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cgrafik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mgrafik');
    }

    public function menu_grafik()
    {
        $this->load->view('menu_grafik/grafik');
    }
}

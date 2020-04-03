<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model');
        $this->load->library('form_validation');
        $this->load->helper("url");
    }

    public function index()
    {
        $datax['judul'] = 'Halaman User';
        $dari = $this->Pinjam_model->code_pinjam();
        $urut = substr($dari, 0);
        $codenow = $urut + 1;
        $data = array('id_pinjam' => $codenow);

        $this->load->view('include/header', $datax);
        $this->load->view('pinjam/index', $data);
        $this->load->view('include/footer');
    }
}

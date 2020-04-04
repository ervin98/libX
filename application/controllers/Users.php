<?php

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library('form_validation');
        $this->load->helper("url");
    }

    public function index()
    {
        $datax['judul'] = 'Halaman User';
        $dari = $this->Users_model->code_user();
        $urut = substr($dari, 0);
        $codenow = $urut + 1;
        $data = array('id_users' => $codenow);

        $this->load->view('include/header', $datax);
        $this->load->view('users/index', $data);
        $this->load->view('include/footer');
    }
    public function users_data()
    {
        $data = $this->Users_model->user_list();
        echo json_encode($data);
    }
}

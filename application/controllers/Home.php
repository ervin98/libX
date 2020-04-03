<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model');
        $this->load->model('Member_model');
    }

    public function index()
    {
        $data['judul'] = 'Selamat Datang!';
        $data['pj_barang'] = $this->Buku_model->product_list();

        $r_book = $this->Buku_model->product_list();
        $r_member = $this->Member_model->product_list();
        $count['c_book'] = count($r_book);
        $count['c_member'] = count($r_member);
        //Allowing akses to admin only
        if ($this->session->userdata('level') === '1') {
            $this->load->view('include/header', $data);
            $this->load->view('home/index', $count);
            $this->load->view('include/footer');
        } else {
            $this->load->view('include/header', $data);
            $this->load->view('buku/index');
            $this->load->view('include/footer');
        }

        /*print_r($data) to see the output*/
    }
}

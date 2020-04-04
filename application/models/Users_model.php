<?php
class Users_model extends CI_Model
{
    public function code_user()
    {
        $this->db->select_max('id', 'usrcode');
        $query = $this->db->get('pj_users');
        $hasil = $query->row();
        return $hasil->usrcode;
    }
    function user_list()
    {
        $hasil = $this->db->get('pj_users');
        return $hasil->result();
    }
}

<?php
class User_model extends CI_Model
{
    public function code_pinjam()
    {
        $this->db->select_max('id_pinjam', 'browcode');
        $query = $this->db->get('pj_pinjam');
        $hasil = $query->row();
        return $hasil->browcode;
    }
    function member_list()
    {
        $hasil = $this->db->get('pj_user');
        return $hasil->result();
    }
}

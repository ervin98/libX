<?php
class Pinjam_model extends CI_Model
{
    public function code_pinjam()
    {
        $this->db->select_max('id_pinjam', 'browcode');
        $query = $this->db->get('pj_pinjam');
        $hasil = $query->row();
        return $hasil->browcode;
    }
    function pinjam_list()
    {
        $this->db->select('*');
        $this->db->from('pj_pinjam, pj_barang,pj_member');
        $this->db->where('pj_pinjam.id_bk = pj_barang.id_bk');
        $this->db->where('pj_pinjam.id_mb = pj_member.id_mb');
        $query = $this->db->get();
        return $query->result();
        // $query = "SELECT * FROM pj_barang,pj_member WHERE pj_barang.id_bk = pj_member.id_mb";
        //$hasil = $query->row();
        // return $hasil->result();
    }
}

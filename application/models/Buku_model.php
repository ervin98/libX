<?php
class Buku_model extends CI_Model
{

    function product_list()
    {
        $hasil = $this->db->get('pj_barang');
        return $hasil->result();
    }

    function save_product()
    {
        $data = array(
            'id_bk' => $this->input->post('product_code'),
            'nama_bk' => $this->input->post('product_name'),
            'pengarang' => $this->input->post('pengarang'),
            'penerbit' => $this->input->post('penerbit'),
            'perolehan' => $this->input->post('perolehan'),
        );
        $result = $this->db->insert('pj_barang', $data);
        return $result;
    }
    public function code_product()
    {
        $this->db->select_max('id_bk', 'bookcode');
        $query = $this->db->get('pj_barang');
        $hasil = $query->row();
        return $hasil->bookcode;
    }
    function update_product()
    {
        $product_code = $this->input->post('product_code');
        $product_name = $this->input->post('product_name');
        $product_pengarang = $this->input->post('pengarang');
        $product_penerbit = $this->input->post('penerbit');

        $this->db->set('product_name', $product_name);
        $this->db->set('product_pengarang', $product_pengarang);
        $this->db->set('product_penerbit', $product_penerbit);
        $this->db->where('product_code', $product_code);
        $result = $this->db->update('pj_barang');
        return $result;
    }

    function delete_product()
    {
        $id_bk = $this->input->post('product_code');
        $this->db->where('id_bk', $id_bk);
        $result = $this->db->delete('pj_barang');
        return $result;
    }
    public function wish_product()
    {
        $this->db->select_max('wish_id', 'wishcode');
        $query = $this->db->get('pj_wish');
        $hasil = $query->row();
        return $hasil->wishcode;
    }
    function wish_list()
    {
        $hasil = $this->db->get('pj_wish');
        return $hasil->result();
    }
    function save_wish()
    {
        $data = array(
            'wish_id' => $this->input->post('wish_code'),
            'nama_wish' => $this->input->post('product_name'),
            'pengarang' => $this->input->post('pengarang'),
            'penerbit' => $this->input->post('penerbit'),
        );
        $result = $this->db->insert('pj_wish', $data);
        return $result;
    }
    function delete_wish()
    {
        $wish_id = $this->input->post('wish_code');
        $this->db->where('wish_id', $wish_id);
        $result = $this->db->delete('pj_wish');
        return $result;
    }
}

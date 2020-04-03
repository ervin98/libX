<?php
class Member_model extends CI_Model
{

    function product_list()
    {
        $hasil = $this->db->get('pj_member');
        return $hasil->result();
    }

    function save_product()
    {
        $data = array(
            'id_mb' => $this->input->post('product_code'),
            'nama_mb' => $this->input->post('product_name'),
            'tempat_lahir' => $this->input->post('kelahiran'),
            'ttl_lahir' => $this->input->post('tanggal'),
            'telepon' => $this->input->post('telepon'),
            'No_Identitas' => $this->input->post('ktp'),
            'alamat' => $this->input->post('alamat'),
            'jkelamin' => $this->input->post('jkelamin'),
            'janggota' => $this->input->post('janggota'),
            'stat_mb' => $this->input->post('stat_mb'),
        );
        $result = $this->db->insert('pj_member', $data);
        return $result;
    }
    public function code_product()
    {
        $this->db->select_max('id_mb', 'memcode');
        $query = $this->db->get('pj_member');
        $hasil = $query->row();
        return $hasil->memcode;
    }
    function update_product()
    {
        $product_code = $this->input->post('product_code');
        $product_num = $this->input->post('product_num');
        $product_name = $this->input->post('product_name');
        $product_alamat = $this->input->post('pengarang');
        $product_jkelamin = $this->input->post('jkelamin');

        $this->db->set('product_name', $product_name);
        $this->db->set('product_num', $product_num);
        $this->db->set('product_alamat', $product_alamat);
        $this->db->set('product_jkelamin', $product_jkelamin);
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
}

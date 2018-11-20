<?php

class Penjualan_model extends CI_Model 
{
	public function get_penjualans() {
		return $this->db->get('penjualan', $num)->result_array();
	}
	public function get_penjualan($id) {
		return $this->db->get_where('penjualan', array('id_penjualan' => $id))->result_array();
	}	
	public function insert_penjualan($data) {
        $this->db->insert('penjualan', $data);
        return $this->db->insert_id();
    }
    
    public function insert_penjualan_detail($id, $id_barang, $jumlah) {
        $this->db->set('id_penjualan', $id);
        $this->db->set('id_barang', $id_barang);
        $this->db->set('jumlah', $jumlah);
        $this->db->insert('penjualan_detail');
    }
}
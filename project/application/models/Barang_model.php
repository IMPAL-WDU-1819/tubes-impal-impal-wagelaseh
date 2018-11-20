<?php

class Barang_model extends CI_Model 
{
	public function get_barangs($num = 100) {
		$this->db->select('id_barang, nama_barang, stok_barang, harga_barang, tgl_kadaluarsa, barang.id_supplier, supplier.nama_supplier');
		$this->db->from('barang');
		$this->db->join('supplier', 'barang.id_supplier = supplier.id_supplier');
		return $this->db->get()->result_array();
	}

	public function get_barang($id) {
		return $this->db->get_where('barang', array('id_barang' => $id))->result_array();
	}

	public function delete_barang($id) {
		return $this->db->delete('barang', array('id_barang' => $id));
	}

	public function insert_barang($data) {
		return $this->db->insert('barang', $data);
	}
	public function update_barang($data, $id) {
		$this->db->where('id_barang', $id);
		return $this->db->update('barang', $data);
	}
	public function update_stok_barang($stok, $id) {
		$this->db->where('id_barang', $id);
		$this->db->set('stok_barang', $stok);
		return $this->db->update('barang');
	}


}
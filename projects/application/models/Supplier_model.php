<?php

class Supplier_model extends CI_Model 
{
	private $table_name = 'supplier';
	public function get_suppliers() {
		return $this->db->get($this->table_name)->result_array();
	}

	public function get_supplier($id) {
		return $this->db->get_where($this->table_name, array('id_supplier' => $id))->result_array();
	}

	public function delete_supplier($id) {
		return $this->db->delete($this->table_name, array('id_supplier' => $id));
	}

	public function insert_supplier($data) {
		return $this->db->insert($this->table_name, $data);
	}
	public function update_supplier($data, $id) {
		$this->db->where('id_supplier', $id);
		return $this->db->update($this->table_name, $data);
	}

}
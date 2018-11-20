<?php

class Karyawan_model extends CI_Model 
{
	private $table_name = 'karyawan';
	public function get_karyawans($num = 50) {
		return $this->db->get($this->table_name, $num)->result_array();
	}
	public function get_karyawan($id, $pwd) {
		return $this->db->get_where($this->table_name, array('id_karyawan' => $id, 'password' => $pwd))->result_array();
	}	
	public function get_karyawan_by_id($id) {
		return $this->db->get_where($this->table_name, array('id_karyawan' => $id))->result_array();
	}
	public function insert_karyawan($data) {
		return $this->db->insert($this->table_name, $data);
	}
	public function delete_karyawan($id) {
		return $this->db->delete($this->table_name, array('id_karyawan' => $id));
	}
	public function update_karyawan($data, $id) {
		$this->db->where('id_karyawan', $id);
		return $this->db->update($this->table_name, $data);
	}
}
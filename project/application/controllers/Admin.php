<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// f99aecef3d12e02dcbb6260bbdd35189c89e6e73

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('barang_model', '', TRUE);
		$this->load->model('supplier_model', '', TRUE);
		$this->load->model('karyawan_model', '', TRUE);
		if (!$this->session->userdata('id_karyawan') && $this->session->userdata('jabatan') !== "ADMIN") {
			redirect('login', 'location');
		}
	}

	public function index() {
		$this->lihat_barang();
	}

	// MODUL BARANG
	// ============
	public function lihat_barang() {
		$data['barangs'] = $this->barang_model->get_barangs();
		$this->load->view('barang_kelola', $data);
	}

	public function hapus_barang($id = NULL) {
		$this->session->set_flashdata('hapus_id', $id);
		if ($this->barang_model->get_barang($id)) {
			$this->barang_model->delete_barang($id);
			$this->session->set_flashdata('hapus_berhasil', TRUE);
		}
		redirect('admin', 'location');
	}

	public function tambah_barang() {
		if ($this->input->post()) {
			$data['id_barang'] = $this->input->post('id_barang');
			$data['nama_barang'] = $this->input->post('nama_barang');
			$data['stok_barang'] = 0;
			$data['harga_barang'] = $this->input->post('harga_barang');
			$data['tgl_kadaluarsa'] = $this->input->post('tgl_kadaluarsa');
			$data['id_supplier'] = $this->input->post('id_supplier');
			$this->session->set_flashdata('tambah_id', $data['id_barang']);

			$this->load->library('form_validation');
			$this->form_validation->set_rules('id_barang', 'ID Barang', 'is_unique[barang.id_barang]');
			if ($this->form_validation->run()) {
				$this->barang_model->insert_barang($data);
				redirect('admin/lihat_barang', 'location');
			} else {
				redirect('admin/tambah_barang', 'location');
			}

		}
		$data['suppliers'] = $this->supplier_model->get_suppliers();
		$this->load->view('barang_tambah', $data);	
	}

	public function edit_barang($id) {
		$data_cek['barang'] = $this->barang_model->get_barang($id);
		$data_cek['suppliers'] = $this->supplier_model->get_suppliers();
		$this->session->set_flashdata('edit_id', $id);

		if ($data_cek['barang']) {
			$this->load->view('barang_edit', $data_cek);
			if ($this->input->post()) {
				$id_barang = $this->session->flashdata('edit_id');
				$data['nama_barang'] = $this->input->post('nama_barang');
				$data['stok_barang'] = $this->input->post('stok_barang');
				$data['harga_barang'] = $this->input->post('harga_barang');
				$data['tgl_kadaluarsa'] = $this->input->post('tgl_kadaluarsa');
				$data['id_supplier'] = $this->input->post('id_supplier');
				
				$this->barang_model->update_barang($data, $id_barang);
				
				$this->session->keep_flashdata('edit_id');
				redirect('admin/lihat_barang', 'location');
			}
		} else {
			$this->session->keep_flashdata('edit_id');
			$this->session->set_flashdata('edit_gagal', TRUE);
			redirect('admin/lihat_barang', 'location');
		}
	}
	
	public function tambah_stok_barang($id = NULL) {
		$barang = $this->barang_model->get_barang($id);
		$this->session->set_flashdata('tambah_stok_id', $id);
		if ($barang) {
			$data['stok_barang'] = $barang[0]['stok_barang'] + $this->input->post('jumlah_barang');
			$this->barang_model->update_barang($data, $id);
			$this->session->set_flashdata('tambah_stok_berhasil', TRUE);
		}
		redirect('admin/lihat_barang', 'location');
	}

	public function cetak_laporan_barang(){
		$data['barangs'] = $this->barang_model->get_barangs();
		$this->load->view('barang_laporan', $data);
	}
	
	// MODUL SUPPLIER
	// ============
	public function lihat_supplier() {
		$data['suppliers'] = $this->supplier_model->get_suppliers();	
		$this->load->view('supplier_kelola', $data);
	}

	public function tambah_supplier() {
		if ($this->input->post()) {
			$data['nama_supplier'] = $this->input->post('nama_supplier');
			$data['alamat'] = $this->input->post('alamat');
			$data['no_telp'] = $this->input->post('no_telp');

			$this->supplier_model->insert_supplier($data);

			$this->session->set_flashdata('tambah_id', $data['id_supplier']);
			redirect('admin/lihat_supplier', 'location');
		}

		$this->load->view('supplier_tambah');
	}

	public function hapus_supplier($id = NULL) {
		$this->session->set_flashdata('hapus_id', $id);
		if ($this->supplier_model->get_supplier($id)) {
			$this->supplier_model->delete_supplier($id);
			$this->session->set_flashdata('hapus_berhasil', TRUE);
		}
		redirect('admin/lihat_supplier', 'location');
	}

	public function edit_supplier($id) {
		$data_cek['supplier'] = $this->supplier_model->get_supplier($id);
		$this->session->set_flashdata('edit_id', $id);

		if ($data_cek['supplier']) {
			$this->load->view('supplier_edit', $data_cek);
			if ($this->input->post()) {
				$id_supplier = $this->session->flashdata('edit_id');
				$data['nama_supplier'] = $this->input->post('nama_supplier');
				$data['alamat'] = $this->input->post('alamat');
				$data['no_telp'] = $this->input->post('no_telp');
	
				$this->supplier_model->update_supplier($data, $id_supplier);
				
				$this->session->keep_flashdata('edit_id');
				redirect('admin/lihat_supplier', 'location');
			}
		} else {
			$this->session->keep_flashdata('edit_id');
			$this->session->set_flashdata('edit_gagal', TRUE);
			redirect('admin/lihat_supplier', 'location');
		}
	}

	// MODUL KARYAWAN
	// ==============
	public function lihat_karyawan() {
		$data['karyawans'] = $this->karyawan_model->get_karyawans();	
		$this->load->view('karyawan_kelola', $data);
	}

	public function tambah_karyawan() {
		if ($this->input->post()) {
			$data['id_karyawan'] = $this->input->post('id_karyawan');
			$data['nama'] = $this->input->post('nama');
			$data['jenis_kelamin'] = strtoupper($this->input->post('jenis_kelamin'));
			$data['email'] = $this->input->post('email');
			$data['no_telp'] = $this->input->post('no_telp');
			$data['alamat'] = $this->input->post('alamat');
			$data['jabatan'] = strtoupper($this->input->post('jabatan'));
			$data['password'] = sha1($this->input->post('password'));

			$this->session->set_flashdata('tambah_id', $data['id_karyawan']);

			$this->load->library('form_validation');
			$this->form_validation->set_rules('id_karyawan', 'Password', 'is_unique[karyawan.id_karyawan]');
			if ($this->form_validation->run()) {
				$this->karyawan_model->insert_karyawan($data);
				redirect('admin/lihat_karyawan', 'location');
			} else {
				redirect('admin/tambah_karyawan', 'location');
			}
		}
		$this->load->view('karyawan_tambah');
	}

	public function hapus_karyawan($id = NULL) {
		$this->session->set_flashdata('hapus_id', $id);
		if ($karyawan = $this->karyawan_model->get_karyawan_by_id($id)) {
			if ($karyawan[0]['id_karyawan'] !== $this->session->userdata('id_karyawan')) {
				$this->karyawan_model->delete_karyawan($id);
				$this->session->set_flashdata('hapus_berhasil', TRUE);
			}
		}
		redirect('admin/lihat_karyawan', 'location');
	}

	public function edit_karyawan($id) {
		$data_cek['karyawan'] = $this->karyawan_model->get_karyawan_by_id($id);
		$this->session->set_flashdata('edit_id', $id);

		if ($data_cek['karyawan'] && $data_cek['karyawan'][0]['id_karyawan'] !== $this->session->userdata('id_karyawan')) {
			$this->load->view('karyawan_edit', $data_cek);
			if ($this->input->post()) {
				$id_karyawan = $this->session->flashdata('edit_id');
				$data['nama'] = $this->input->post('nama');
				$data['jenis_kelamin'] = strtoupper($this->input->post('jenis_kelamin'));
				$data['email'] = $this->input->post('email');
				$data['no_telp'] = $this->input->post('no_telp');
				$data['alamat'] = $this->input->post('alamat');
				$data['jabatan'] = strtoupper($this->input->post('jabatan'));
	
				$this->karyawan_model->update_karyawan($data, $id_karyawan);
				
				$this->session->keep_flashdata('edit_id');
				redirect('admin/lihat_karyawan', 'location');
			}
		} else {
			$this->session->keep_flashdata('edit_id');
			$this->session->set_flashdata('edit_gagal', TRUE);
			redirect('admin/lihat_karyawan', 'location');
		}
	}

	// MODUL PENJUALAN
	// ==============
	public function laporan_penjualan(){
		$data['penjualans'] = $this->barang_model->get_barang('001');
		$this->load->view('transaksi_penjualan_laporan', $data);
	}

}

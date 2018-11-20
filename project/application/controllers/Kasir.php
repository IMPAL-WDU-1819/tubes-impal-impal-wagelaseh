<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('barang_model', '', TRUE);
		$this->load->model('supplier_model', '', TRUE);
		$this->load->model('karyawan_model', '', TRUE);
		$this->load->model('penjualan_model', '', TRUE);
		if (!$this->session->userdata('id_karyawan') && $this->session->userdata('jabatan') !== "KASIR") {
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

	// MODUL KARYAWAN
	// ==============
	public function lihat_karyawan() {
		$data['karyawans'] = $this->karyawan_model->get_karyawans();	
		$this->load->view('karyawan_kelola', $data);
	}
	
	// MODUL PENJUALAN
	// ==============
	public function penjualan() {
		$this->load->view('transaksi_penjualan');
	}

	private function cari_di_keranjang($keranjang, $id) {
		$index_in_keranjang = -1;
		foreach ($keranjang as $key => $item) {
			if ($item['id_barang'] == $id) {
				$index_in_keranjang = $key;
				break;
			}
		}
		return $index_in_keranjang;
	}

	public function keranjang_update_jumlah($id) {
		$keranjang = ($this->session->userdata('keranjang')) ? $this->session->userdata('keranjang') : array();
		$index = $this->cari_di_keranjang($keranjang, $id);
		$jumlah = $this->input->get('jumlah');
		if ($index >= 0 && $jumlah > 0) {
			$keranjang[$index]['stok_temp'] = $keranjang[$index]['stok_barang'] - $jumlah; 
			if ($keranjang[$index]['stok_temp'] >= 0) {
				$keranjang[$index]['jumlah'] = $jumlah;
				$keranjang[$index]['total'] = $keranjang[$index]['jumlah'] * $keranjang[$index]['harga_barang']; 
				$this->session->set_userdata('keranjang', $keranjang);
				echo json_encode($this->session->userdata('keranjang'));
				// redirect('kasir/penjualan', 'location');
			} else {
				echo json_encode(array('error' => 'Stok barang tidak mencukupi'));
			}
		} else {
			echo json_encode(array('error' => 'Barang tidak ditemukan'));
		}
	}

	public function keranjang_tambah() {
		$id = $this->input->post('id_barang');
		$keranjang = ($this->session->userdata('keranjang')) ? $this->session->userdata('keranjang') : array();
		
		$index = $this->cari_di_keranjang($keranjang, $id); 	// cari barang di keranjang
		if ($index >= 0) {
			if ($keranjang[$index]['stok_temp'] > 0) {
				$keranjang[$index]['jumlah']++;
				$keranjang[$index]['total'] = $keranjang[$index]['jumlah'] * $keranjang[$index]['harga_barang']; 
				$keranjang[$index]['stok_temp']--; 
				$this->session->set_userdata('keranjang', $keranjang);
				echo json_encode($this->session->userdata('keranjang'));
			} else {
				echo json_encode(array('error' => 'Stok barang tidak mencukupi'));
			}
		} else {
			$data = $this->barang_model->get_barang($id);
			if ($data) {
				if ($data[0]['stok_barang'] > 0) {
					$baru = $data[0];
					$baru['jumlah'] = 1; 
					$baru['total'] = $baru['jumlah'] * $baru['harga_barang'];
					$baru['stok_temp'] = $baru['stok_barang'] - 1;
					array_push($keranjang, $baru);
					$this->session->set_userdata('keranjang', $keranjang);
					echo json_encode($this->session->userdata('keranjang'));
				} else {
					echo json_encode(array('error' => 'Stok barang tidak mencukupi'));
				}
			} else {
				echo json_encode(array('error' => 'Barang tidak ditemukan'));
			}
		}
		
	}

	public function keranjang_hapus($id = "") {
		$keranjang = ($this->session->userdata('keranjang')) ? $this->session->userdata('keranjang') : array();
		$index = $this->cari_di_keranjang($keranjang, $id);
		if ($index >= 0) {
			array_splice($keranjang, $index, 1);
			$this->session->set_userdata('keranjang', $keranjang);
			echo json_encode($this->session->userdata('keranjang'));
		} else {
			echo json_encode(array('error' => 'Barang tidak ditemukan'));
		}
	}

	public function tampilkan() {
		return json_encode($this->session->userdata('keranjang'));
	}

	public function keranjang_hapus_semua() {
		$this->session->unset_userdata('keranjang');
		redirect('kasir/penjualan', 'location');
	}

	public function keranjang_simpan() {
		$keranjang = ($this->session->userdata('keranjang')) ? $this->session->userdata('keranjang') : array();
		$data['bayar'] = $this->input->post('jumlah_bayar');
		if ($keranjang && $data['bayar'] >=  substr($this->input->post('harga_total'), 3, -2)) {
			$penjualan['id_karyawan'] = $this->session->userdata('id_karyawan');
			$id = $this->penjualan_model->insert_penjualan($penjualan);
			$data['penjualan_detail'] = array();
			foreach ($keranjang as $item) {
				array_push($data['penjualan_detail'], array(
					'id_penjualan' => $id,
					'id_barang' => $item['id_barang'],
					'nama_barang' => $item['nama_barang'],
					'harga_barang' => $item['harga_barang'],
					'jumlah' => $item['jumlah'],
					'total' => $item['total']
				));
				$this->penjualan_model->insert_penjualan_detail($id, $item['id_barang'],  $item['jumlah']);
				$this->barang_model->update_stok_barang($item['stok_temp'], $item['id_barang']);
			}
			$this->load->view('transaksi_penjualan_resi', $data);
		} else {
			$this->session->set_flashdata('simpan_error', TRUE);
			redirect('kasir/penjualan', 'location');
		}
		$this->session->unset_userdata('keranjang');
	}

}

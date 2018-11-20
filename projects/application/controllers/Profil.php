<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
    public function __construct() {
		parent::__construct();
		$this->load->model('karyawan_model', '', TRUE);
		if (!$this->session->userdata('id_karyawan')) {
			redirect('login', 'location');
		}
    }
    
    // PROFIL
	// ==============
	public function edit_profil() {
        $data_cek['profil'] = $this->karyawan_model->get_karyawan_by_id($this->session->userdata('id_karyawan'));
        
		if ($data_cek['profil']) {
			if ($this->input->post()) {
				$id_karyawan = $this->session->userdata('id_karyawan');
				$data['nama'] = $this->input->post('nama');
				$data['jenis_kelamin'] = strtoupper($this->input->post('jenis_kelamin'));
				$data['email'] = $this->input->post('email');
				$data['no_telp'] = $this->input->post('no_telp');
				$data['alamat'] = $this->input->post('alamat');
                
                $this->karyawan_model->update_karyawan($data, $id_karyawan);
                
                $this->session->set_flashdata('edit_berhasil', TRUE);

                redirect('/', 'location');
            }
			$this->load->view('profil_edit', $data_cek);
		} else {
			redirect(strtolower($this->session->userdata('jabatan'), 'location'));
		}
	}
}
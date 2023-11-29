<?php

class Toko extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_toko');
		$this->data['aktif'] = 'toko';
	}

	public function index()
	{
		$this->data['title'] = 'Profil Toko';
		$this->data['toko'] = $this->M_toko->getAll();
		$this->load->view('toko', $this->data);
	}

	public function proses_edit() 
	{
		$data = [
			'nama_toko' => $this->input->post('nama_toko'),
			'nama_pemilik' => $this->input->post('nama_pemilik'),
			'tlp_toko' => $this->input->post('tlp_toko'),
			'alamat_toko' => $this->input->post('alamat_toko'),
		];

		if ($this->M_toko->update($data)) {
			$this->session->set_flashdata('toko_success', 'Profil Toko Berhasil Diedit!');
			redirect('toko');
		} else {
			$this->session->set_flashdata('toko_error', 'Profil Toko Gagal Diedit!');
			redirect('toko');
		}
	}
}
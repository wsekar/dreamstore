<?php

class Kasir extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->login['role'] != 'kasir' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'kasir';
		$this->load->model('M_kasir');
	}

	public function index()
	{
		if ($this->session->login['role'] == 'kasir') {
			$this->session->set_flashdata('kasir_error', 'Manajemen kasir hanya untuk admin!');
			redirect('dashboard');
		}
		$this->data['title'] = 'Data Kasir'; 
		$this->data['all_kasir'] = $this->M_kasir->getAll(); 
		$this->data['no'] = 1;

		$this->load->view('kasir/index', $this->data);
	}

	public function tambah()
	{
		if ($this->session->login['role'] == 'kasir') { 
			$this->session->set_flashdata('kasir_error', 'Tambah data hanya untuk admin!');
			redirect('dashboard'); 
		}
		$this->data['title'] = 'Tambah Kasir';
		$this->load->view('kasir/tambah', $this->data);
	}

	public function proses_tambah()
	{
		if ($this->session->login['role'] == 'kasir') { 
			$this->session->set_flashdata('kasir_error', 'Tambah data hanya untuk admin!');
			redirect('dashboard'); 
		}

		$data = [ 
			'kode_kasir' => $this->input->post('kode_kasir'),
			'nama_kasir' => $this->input->post('nama_kasir'),
			'username_kasir' => $this->input->post('username_kasir'),
			'password_kasir' => $this->input->post('password_kasir'),
			'email_kasir' => $this->input->post('email_kasir'),
			'jenis_kelamin_kasir' => $this->input->post('jenis_kelamin_kasir'),
		];

		if ($this->M_kasir->insert($data)) {
			$this->session->set_flashdata('kasir_success', 'Data Kasir Berhasil Ditambahkan!');
			redirect('kasir');
		} else {
			$this->session->set_flashdata('kasir_error', 'Data Kasir Gagal Ditambahkan!');
			redirect('kasir');
		}
	}

	public function edit($id_kasir)
	{
		if ($this->session->login['role'] == 'kasir') {
			$this->session->set_flashdata('kasir_error', 'Edit data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Edit Kasir';
		$this->data['kasir'] = $this->M_kasir->getId($id_kasir);
		$this->load->view('kasir/edit', $this->data);
	}

	public function proses_edit($id_kasir)
	{
		if ($this->session->login['role'] == 'kasir') {
			$this->session->set_flashdata('kasir_error', 'Edit data hanya untuk admin!');
			redirect('dashboard');
		}

		$data = [
			'kode_kasir' => $this->input->post('kode_kasir'),
			'nama_kasir' => $this->input->post('nama_kasir'),
			'username_kasir' => $this->input->post('username_kasir'),
			'password_kasir' => $this->input->post('password_kasir'),
			'email_kasir' => $this->input->post('email_kasir'),
			'jenis_kelamin_kasir' => $this->input->post('jenis_kelamin_kasir'),
		];

		if ($this->M_kasir->update($data, $id_kasir)) {
			$this->session->set_flashdata('kasir_success', 'Data Kasir Berhasil Diedit!');
			redirect('kasir');
		} else {
			$this->session->set_flashdata('kasir_error', 'Data Kasir Gagal Diedit!');
			redirect('kasir');
		}
	}

	public function hapus($id)
	{
		if ($this->session->login['role'] == 'kasir') {
			$this->session->set_flashdata('kasir_error', 'Hapus data hanya untuk admin!');
			redirect('dashboard');
		}

		if ($this->M_kasir->delete($id)) {
			$this->session->set_flashdata('kasir_success', 'Data Kasir Berhasil Dihapus!');
			redirect('kasir');
		} else {
			$this->session->set_flashdata('kasir_error', 'Data Kasir Gagal Dihapus!');
			redirect('kasir');
		}
	}
}

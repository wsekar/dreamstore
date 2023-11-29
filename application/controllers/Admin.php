<?php

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->login['role'] != 'kasir' && $this->session->login['role'] != 'admin')
			redirect();
		$this->data['aktif'] = 'admin';
		$this->load->model('M_admin');
	}

	public function index()
	{
		if ($this->session->login['role'] == 'kasir') {
			$this->session->set_flashdata('admin_error', 'Manajemen admin hanya untuk admin!');
			redirect('dashboard');
		}
		$this->data['title'] = 'Data Admin';
		$this->data['all_admin'] = $this->M_admin->getAll();
		$this->data['no'] = 1;

		$this->load->view('admin/index', $this->data);
	}

	public function tambah()
	{
		if ($this->session->login['role'] == 'kasir') {
			$this->session->set_flashdata('admin_error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}
		$this->data['title'] = 'Tambah Admin';
		$this->load->view('admin/tambah', $this->data);
	}

	public function proses_tambah()
	{
		if ($this->session->login['role'] == 'kasir') {
			$this->session->set_flashdata('admin_error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}
		$data = [
			'kode_admin' => $this->input->post('kode_admin'),
			'nama_admin' => $this->input->post('nama_admin'),
			'username_admin' => $this->input->post('username_admin'),
			'password_admin' => $this->input->post('password_admin'),
			'email_admin' => $this->input->post('email_admin'),
			'jenis_kelamin_admin' => $this->input->post('jenis_kelamin_admin'),
		];

		if ($this->M_admin->insert($data)) {
			$this->session->set_flashdata('admin_success', 'Data Admin Berhasil Ditambahkan!');
			redirect('admin');
		} else {
			$this->session->set_flashdata('admin_error', 'Data Admin Gagal Ditambahkan!');
			redirect('admin');
		}
	}

	public function edit($id_admin)
	{
		if ($this->session->login['role'] == 'kasir') {
			$this->session->set_flashdata('admin_error', 'Edit data hanya untuk admin!');
			redirect('dashboard');
		}
		$this->data['title'] = 'Edit Admin';
		$this->data['admin'] = $this->M_admin->getId($id_admin);

		$this->load->view('admin/edit', $this->data);
	}

	public function proses_edit($id_admin)
	{
		if ($this->session->login['role'] == 'kasir') {
			$this->session->set_flashdata('admin_error', 'Edit data hanya untuk admin!');
			redirect('dashboard');
		}
		$data = [
			'kode_admin' => $this->input->post('kode_admin'),
			'nama_admin' => $this->input->post('nama_admin'),
			'username_admin' => $this->input->post('username_admin'),
			'password_admin' => $this->input->post('password_admin'),
			'email_admin' => $this->input->post('email_admin'),
			'jenis_kelamin_admin' => $this->input->post('jenis_kelamin_admin'),
		];

		if ($this->M_admin->update($data, $id_admin)) {
			$this->session->set_flashdata('admin_success', 'Data Admin Berhasil Diedit!');
			redirect('admin');
		} else {
			$this->session->set_flashdata('admin_error', 'Data Admin Gagal Diedit!');
			redirect('admin');
		}
	}

	public function hapus($id_admin)
	{
		if ($this->session->login['role'] == 'kasir') {
			$this->session->set_flashdata('admin_error', 'Hapus data hanya untuk admin!');
			redirect('dashboard');
		}
		if ($this->M_admin->delete($id_admin)) {
			$this->session->set_flashdata('admin_success', 'Data Admin Berhasil Dihapus!');
			redirect('admin');
		} else {
			$this->session->set_flashdata('admin_error', 'Data Admin Gagal Dihapus!');
			redirect('admin');
		}
	}
}
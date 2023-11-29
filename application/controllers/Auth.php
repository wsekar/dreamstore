<?php

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_kasir'); 
		$this->load->model('M_admin'); 
	}

	public function index()
	{
		if ($this->session->userdata('login')) {
			redirect('dashboard');
		}
		$this->load->view('login');
	}

	public function proses_login()
	{
		if ($this->input->post('role') === 'kasir')
			$this->_proses_login_kasir($this->input->post('username'));
		elseif ($this->input->post('role') === 'admin')
			$this->_proses_login_admin($this->input->post('username'));
		else {
			?>
			<script>
				alert('role tidak tersedia!') 
			</script>
			<?php
		}
	}

	protected function _proses_login_kasir($username)
	{ 

		$get_kasir = $this->M_kasir->lihat_username($username); 
		if ($get_kasir) {
			if ($get_kasir->password_kasir == $this->input->post('password')) { 
				$session = [
					'kode' => $get_kasir->kode_kasir,
					'nama' => $get_kasir->nama_kasir,
					'username' => $get_kasir->username_kasir,
					'password' => $get_kasir->password_kasir,
					'role' => $this->input->post('role'),
					'jam_masuk' => date('H:i:s')
				];

				$this->session->set_userdata('login', $session); 
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('login_error', 'Password Salah!');
				redirect();
			}
		} else {
			$this->session->set_flashdata('login_error', 'Username Salah!');
			redirect();
		}
	}

	protected function _proses_login_admin($username)
	{

		$get_admin = $this->M_admin->lihat_username($username);
		if ($get_admin) {
			if ($get_admin->password_admin == $this->input->post('password')) {
				$session = [
					'kode' => $get_admin->kode_admin,
					'nama' => $get_admin->nama_admin,
					'username' => $get_admin->username_admin,
					'password' => $get_admin->password_admin,
					'role' => $this->input->post('role'),
					'jam_masuk' => date('H:i:s')
				];
				$this->session->set_userdata('login', $session);
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('login_error', 'Password Salah!');
				redirect();
			}
		} else {
			$this->session->set_flashdata('login_error', 'Username Salah!');
			redirect();
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}
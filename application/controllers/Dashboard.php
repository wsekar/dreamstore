<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->login['role'] != 'kasir' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'dashboard'; 
		$this->load->model('M_barang');
		$this->load->model('M_kasir'); 
		$this->load->model('M_penjualan'); 
		$this->load->model('M_admin');
		$this->load->model('M_toko'); 
	}
	public function index()
	{
		$this->data['title'] = 'Halaman Dashboard'; 
		$this->data['jumlah_barang'] = $this->M_barang->jumlah(); 
		$this->data['jumlah_kasir'] = $this->M_kasir->jumlah(); 
		$this->data['jumlah_penjualan'] = $this->M_penjualan->jumlah(); 
		$this->data['jumlah_admin'] = $this->M_admin->jumlah(); 
		$this->data['toko'] = $this->M_toko->getAll();
		$this->data['graph'] = $this->M_barang->graph(); 
		$this->load->view('dashboard', $this->data); 
}
}

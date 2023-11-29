<?php

class Penjualan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->login['role'] != 'kasir' && $this->session->login['role'] != 'admin')
			redirect();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_barang');
		$this->load->model('M_penjualan');
		$this->load->model('M_detail_penjualan');
		$this->load->helper('tanggal');
		$this->data['aktif'] = 'penjualan';
	}

	public function index()
	{
		$this->data['title'] = 'Data Penjualan';
		$this->data['all_penjualan'] = $this->M_penjualan->lihat();
		$this->load->view('penjualan/index', $this->data);
	}

	public function tambah()
	{
		$this->data['title'] = 'Tambah Penjualan';
		$this->data['all_barang'] = $this->M_barang->lihat_stok();
		$this->load->view('penjualan/tambah', $this->data);
	}

	public function proses_tambah()
	{
		$data_penjualan = [
			'no_penjualan' => $this->input->post('no_penjualan'),
			'nama_kasir' => $this->input->post('nama_kasir'),
			'tgl_penjualan' => $this->input->post('tgl_penjualan'),
			'jam_penjualan' => $this->input->post('jam_penjualan'),
			'total' => $this->input->post('harga_total'),
		];

		$data_detail_penjualan = [];

		$id_barang = $this->input->post('id_barang');
		$harga_barang = $this->input->post('harga_barang');
		$jumlah_barang = $this->input->post('jumlah_barang');
		$satuan = $this->input->post('satuan');
		$sub_total = $this->input->post('sub_total');

		for ($i = 0; $i < count($id_barang); $i++) {
			$data_detail_penjualan[] = [
				'no_penjualan' => $this->input->post('no_penjualan'),
				'id_barang' => $id_barang[$i],
				'harga_barang' => $harga_barang[$i],
				'jumlah_barang' => $jumlah_barang[$i],
				'satuan' => $satuan[$i],
				'sub_total' => $sub_total[$i],
			];
		}

		if ($this->M_penjualan->insert($data_penjualan) && $this->M_detail_penjualan->insert_batch($data_detail_penjualan)) {
			for ($i = 0; $i < count($id_barang); $i++) {
				$this->M_barang->min_stok($jumlah_barang[$i], $id_barang[$i]) or die('gagal min stok');
			}
			$this->session->set_flashdata('success', 'Invoice Penjualan Berhasil Dibuat!');
			redirect('penjualan');
		} else {
			$this->session->set_flashdata('error', 'Gagal membuat invoice penjualan.');
			redirect('penjualan');
		}
	}

	public function detail($no_penjualan)
	{
		$this->data['title'] = 'Detail Penjualan';
		$this->data['penjualan'] = $this->M_penjualan->lihat_no_penjualan($no_penjualan);
		$this->data['all_detail_penjualan'] = $this->M_detail_penjualan->lihat_no_penjualan($no_penjualan);
		$this->data['no'] = 1;

		$this->load->view('penjualan/detail', $this->data);
	}

	public function hapus($no_penjualan)
	{
		if ($this->M_penjualan->delete($no_penjualan) && $this->M_detail_penjualan->delete($no_penjualan)) {
			$this->session->set_flashdata('success', 'Invoice Penjualan Berhasil Dihapus!');
			redirect('penjualan');
		} else {
			$this->session->set_flashdata('error', 'Invoice Penjualan Gagal Dihapus!');
			redirect('penjualan');
		}
	}

}

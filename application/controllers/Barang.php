<?php


class Barang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->login['role'] != 'kasir' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'barang';
		$this->load->model('M_barang');
		$this->load->model('M_satuan');
		$this->load->model('M_kategori');
		$this->load->library('upload');
		
	}

	public function index()
	{
		$this->data['title'] = 'Data Barang';
		$this->data['all_barang'] = $this->M_barang->getAll();
		$this->data['no'] = 1;

		$this->load->view('barang/index', $this->data);
	}

	public function tambah()
	{
		if ($this->session->login['role'] == 'kasir') {
			$this->session->set_flashdata('barang_error', 'Tambah data hanya untuk admin!');
			redirect('barang');
		}
		$this->data['title'] = 'Tambah Barang';
		$this->data['all_satuan'] = $this->M_satuan->getAll();
		$this->data['all_kategori'] = $this->M_kategori->getAll();
		$this->load->view('barang/tambah', $this->data);
	}

	public function proses_tambah()
	{
		if ($this->session->login['role'] == 'kasir') {
			$this->session->set_flashdata('barang_error', 'Tambah data hanya untuk admin!');
			redirect('barang');
		}
		if ($this->input->method() === 'post') {
			$id_kategori = $this->input->post('id_kategori', TRUE);
			$kode_barang = $this->input->post('kode_barang', TRUE);
			$nama_barang = $this->input->post('nama_barang', TRUE);
			$foto_barang = $this->input->post('foto_barang', TRUE);
			$harga_barang = $this->input->post('harga_barang', TRUE);
			$stok = $this->input->post('stok', TRUE);
			$id_satuan = $this->input->post('id_satuan', TRUE);
			$deskripsi = $this->input->post('deskripsi', TRUE);
			$config['upload_path']          = './assets/images/'; 
			$config['allowed_types']        = 'jpeg|jpg|png|PNG'; 
			$config['max_size']             = 10000; 
			$config['max_width']            = 10000; 
			$config['max_height']           = 10000; 
			$config['file_name'] = $_FILES['foto_barang']['name'];
			$this->upload->initialize($config);
			if (!empty($_FILES['foto_barang']['name'])) {
				if ($this->upload->do_upload('foto_barang')) {
					$foto_barang = $this->upload->data();
					$data = array(
						'foto_barang' => $foto_barang['file_name'],
						'id_kategori' => $id_kategori,
						'kode_barang' => $kode_barang,
						'nama_barang' => $nama_barang,
						'harga_barang' => $harga_barang,
						'stok' => $stok,
						'id_satuan' => $id_satuan,
						'deskripsi' => $deskripsi,
					);

					if ($this->M_barang->insert($data)) {
						$this->session->set_flashdata('barang_success', 'Data Barang Berhasil Ditambahkan!');
						redirect('barang');
					} else {
						$this->session->set_flashdata('barang_error', 'Data Barang Gagal Ditambahkan!');
						redirect('barang');
					}
				}
			}
		}
	}


	public function edit($id_barang)
	{
		if ($this->session->login['role'] == 'kasir') {
			$this->session->set_flashdata('barang_error', 'Edit data hanya untuk admin!');
			redirect('barang');
		}

		$this->data['title'] = 'Edit Barang';
		$this->data['barang'] = $this->M_barang->getId($id_barang);
		$this->data['all_satuan'] = $this->M_satuan->getAll();
		$this->data['all_kategori'] = $this->M_kategori->getAll();

		$this->load->view('barang/edit', $this->data);
	}

	public function proses_edit()
	{
		if ($this->session->login['role'] == 'kasir') {
			$this->session->set_flashdata('barang_error', 'Edit data hanya untuk admin!');
			redirect('barang');
		}

		$id_barang  = $this->input->post('id_barang');
		$id_kategori  = $this->input->post('id_kategori');
		$kode_barang  = $this->input->post('kode_barang');
		$nama_barang = $this->input->post('nama_barang');
		$harga_barang = $this->input->post('harga_barang');
		$stok = $this->input->post('stok');
		$id_satuan = $this->input->post('id_satuan');
		$deskripsi = $this->input->post('deskripsi');

		$path = './assets/images';

		$kondisi = array('id_barang' => $id_barang);
		
		$config['upload_path'] = './assets/images';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['max_size'] = '2048';  
		$config['max_width'] = '4480'; 
		$config['max_height'] = '4480';
		$config['file_name'] = $_FILES['foto_barang']['name'];

		$this->upload->initialize($config);
		if (!empty($_FILES['foto_barang']['name'])) {
			if ($this->upload->do_upload('foto_barang')) {
				$foto_barang = $this->upload->data();
				$data = array(
					'foto_barang' => $foto_barang['file_name'],
					'id_kategori' => $id_kategori,
					'kode_barang' => $kode_barang,
					'nama_barang' => $nama_barang,
					'harga_barang' => $harga_barang,
					'stok' => $stok,
					'id_satuan' => $id_satuan,
					'deskripsi' => $deskripsi,
				);
				@unlink($path . $this->input->post('foto_lama'));

				$this->M_barang->update($data, $kondisi);
				$this->session->set_flashdata('barang_success', 'Data Barang Berhasil Diedit!');
				redirect('barang');
			} else {
				$this->session->set_flashdata('barang_error', 'Data Barang Gagal Dihapus!');
				redirect('barang');
			}
		} else {
			$id_kategori = $this->input->post('id_kategori', TRUE);
			$kode_barang = $this->input->post('kode_barang', TRUE);
			$nama_barang = $this->input->post('nama_barang', TRUE);
			$harga_barang = $this->input->post('harga_barang', TRUE);
			$stok = $this->input->post('stok', TRUE);
			$id_satuan = $this->input->post('id_satuan', TRUE);
			$deskripsi = $this->input->post('deskripsi', TRUE);
			$data = array(
				'id_kategori' => $id_kategori,
				'kode_barang' => $kode_barang,
				'nama_barang' => $nama_barang,
				'harga_barang' => $harga_barang,
				'stok' => $stok,
				'id_satuan' => $id_satuan,
				'deskripsi' => $deskripsi,
			);
			@unlink($path . $this->input->post('foto_lama'));

			$this->M_barang->update($data, $kondisi);
			$this->session->set_flashdata('barang_success', 'Data Barang Berhasil Diedit!');
			redirect('barang');
		}
	}

	public function hapus($id_barang)
	{
		if ($this->session->login['role'] == 'kasir') {
			$this->session->set_flashdata('barang_error', 'Hapus data hanya untuk admin!');
			redirect('penjualan');
		}

		if ($this->M_barang->delete($id_barang)) {
			$this->session->set_flashdata('barang_success', 'Data Barang Berhasil Dihapus!');
			redirect('barang');
		} else {
			$this->session->set_flashdata('barang_error', 'Data Barang Gagal Dihapus!');
			redirect('barang');
		}
	}
	public function get_barang()
    {
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('id_barang');
			if ($id) {
				$barang = $this->M_barang->list_barang($id);
				if ($barang) {
					$response = [
						'nama_barang' => $barang->nama_barang,
						'harga_barang' => $barang->harga_barang,
						'satuan' => $barang->nama_satuan,
						'stok' => $barang->stok,
						'status' => 'success',
					];
					$this->output
						->set_content_type('application/json')
						->set_output(json_encode($response));
				} else {
					$response = [
						'status' => 'error',
						'message' => 'Barang not found'
					];
					$this->output
						->set_status_header(404)
						->set_content_type('application/json')
						->set_output(json_encode($response));
				}
			} else {
				$response = [
					'status' => 'error',
					'message' => 'Missing id_barang parameter'
				];
				$this->output
					->set_status_header(400)
					->set_content_type('application/json')
					->set_output(json_encode($response));
			}
		} else {
			show_404();
		}
    }

}

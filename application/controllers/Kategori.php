<?php

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->login['role'] != 'kasir' && $this->session->login['role'] != 'admin')
            redirect();
        $this->data['aktif'] = 'kategori';
        $this->load->model('M_kategori');
    }

    public function index()
    {
        $this->data['title'] = 'Data Kategori';
        $this->data['all_kategori'] = $this->M_kategori->getAll();
        $this->data['no'] = 1;
        $this->load->view('kategori/index', $this->data);
    }

    public function tambah()
    {
        if ($this->session->login['role'] == 'kasir') {
            $this->session->set_flashdata('kategori_error', 'Tambah data hanya untuk admin!');
            redirect('kategori');
        }
        $this->data['title'] = 'Tambah Kategori';
        $this->load->view('kategori/tambah', $this->data);
    }

    public function proses_tambah()
    {
        if ($this->session->login['role'] == 'kasir') {
            $this->session->set_flashdata('kategori_error', 'Tambah data hanya untuk admin!');
            redirect('kategori');
        }
        $data = [
            'kode_kategori' => $this->input->post('kode_kategori'),
            'nama_kategori' => $this->input->post('nama_kategori'),
        ];

        if ($this->M_kategori->insert($data)) {
            $this->session->set_flashdata('kategori_success', 'Data Kategori Berhasil Ditambahkan!');
        } else {
            $this->session->set_flashdata('kategori_error', 'Data Kategori Gagal Ditambahkan!');
        }
        redirect('kategori');
    }

    public function edit($id_kategori)
    {
        if ($this->session->login['role'] == 'kasir') {
            $this->session->set_flashdata('kategori_error', 'Edit data hanya untuk admin!');
            redirect('kategori');
        }

        $this->data['title'] = 'Edit Kategori';
        $this->data['kategori'] = $this->M_kategori->getId($id_kategori);
        $this->load->view('kategori/edit', $this->data);
    }

    public function proses_edit($id_kategori)
    {
        if ($this->session->login['role'] == 'kasir') {
            $this->session->set_flashdata('kategori_error', 'Edit data hanya untuk admin!');
            redirect('kstegori');
        }
        $data = [
            'kode_kategori' => $this->input->post('kode_kategori'),
            'nama_kategori' => $this->input->post('nama_kategori'),
        ];

        if ($this->M_kategori->update($data, $id_kategori)) {
            $this->session->set_flashdata('kategori_success', 'Data Kategori Berhasil Diedit!');
            redirect('kategori');
        } else {
            $this->session->set_flashdata('kategori_error', 'Data Kategori Gagal Diedit!');
            redirect('kategori');
        }
    }

    public function hapus($id_kategori)
    {
        if ($this->session->login['role'] == 'kasir') {
            $this->session->set_flashdata('kategori_error', 'Hapus data hanya untuk admin!');
            redirect('penjualan');
        }

        if ($this->M_kategori->delete($id_kategori)) {
            $this->session->set_flashdata('kategori_success', 'Data Kategori Berhasil Dihapus!');
            redirect('kategori');
        } else {
            $this->session->set_flashdata('kategori_error', 'Data Kategori Gagal Dihapus!');
            redirect('kategori');
        }
    }
}
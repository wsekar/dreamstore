<?php

class Satuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->login['role'] != 'kasir' && $this->session->login['role'] != 'admin')
            redirect();
        $this->data['aktif'] = 'satuan';
        $this->load->model('M_satuan'); 
    }

    public function index()
    {
        $this->data['title'] = 'Data Satuan';
        $this->data['all_satuan'] = $this->M_satuan->getAll();
        $this->data['no'] = 1;

        $this->load->view('satuan/index', $this->data);
    }

    public function tambah()
    {
        if ($this->session->login['role'] == 'kasir') {
            $this->session->set_flashdata('satuan_error', 'Tambah data hanya untuk admin!');
            redirect('satuan');
        }
        $this->data['title'] = 'Tambah Satuan';
        $this->load->view('satuan/tambah', $this->data);
    }

    public function proses_tambah()
    {
        if ($this->session->login['role'] == 'kasir') {
            $this->session->set_flashdata('satuan_error', 'Tambah data hanya untuk admin!');
            redirect('satuan');
        }
        $data = [
            'nama_satuan' => $this->input->post('nama_satuan'),
        ];
        if ($this->M_satuan->insert($data)) {
            $this->session->set_flashdata('satuan_success', 'Data Satuan Berhasil Ditambahkan!');
            redirect('satuan');
        } else {
            $this->session->set_flashdata('satuan_error', 'Data Satuan Gagal Ditambahkan!');
            redirect('satuan');
        }
    }

    public function edit($id_satuan)
    {
        if ($this->session->login['role'] == 'kasir') {
            $this->session->set_flashdata('satuan_error', 'Edit data hanya untuk admin!');
            redirect('satuan');
        }

        $this->data['title'] = 'Edit Satuan';
        $this->data['satuan'] = $this->M_satuan->getId($id_satuan);
        $this->load->view('satuan/edit', $this->data);
    }

    public function proses_edit($id_satuan)
    {
        if ($this->session->login['role'] == 'kasir') {
            $this->session->set_flashdata('satuan_error', 'Edit data hanya untuk admin!');
            redirect('satuan');
        }

        $data = [
            'nama_satuan' => $this->input->post('nama_satuan'),
        ];

        if ($this->M_satuan->update($data, $id_satuan)) {
            $this->session->set_flashdata('satuan_success', 'Data Satuan Berhasil Diedit!');
            redirect('satuan');
        } else {
            $this->session->set_flashdata('satuan_error', 'Data Satuan Gagal Diedit!');
            redirect('satuan');
        }
    }

    public function hapus($id_satuan)
    {
        if ($this->session->login['role'] == 'kasir') {
            $this->session->set_flashdata('satuan_error', 'Hapus data hanya untuk admin!');
            redirect('penjualan');
        }

        if ($this->M_satuan->delete($id_satuan)) {
            $this->session->set_flashdata('satuan_success', 'Satuan Berhasil Dihapus!');
            redirect('satuan');
        } else {
            $this->session->set_flashdata('satuan_error', 'Data Satuan Gagal Dihapus!');
            redirect('satuan');
        }
    }
}
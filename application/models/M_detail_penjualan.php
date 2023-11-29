<?php

class M_detail_penjualan extends CI_Model
{
	protected $_table = 'detail_penjualan'; //tabel detail_penjualan

	public function insert_batch($data)
	{
		return $this->db->insert_batch($this->_table, $data);
	}

	public function lihat_no_penjualan($no_penjualan)
	{
		$this->db->select('detail_penjualan.*, barang.*');
        $this->db->from('detail_penjualan');
        $this->db->join('barang', 'detail_penjualan.id_barang = barang.id_barang', 'left');
        $this->db->where('detail_penjualan.no_penjualan', $no_penjualan);
    
        return $this->db->get()->result();
	}

	public function delete($no_penjualan)
	{
		// delete/hapus data berdasarkan no penjualan
		return $this->db->delete($this->_table, ['no_penjualan' => $no_penjualan]);
	}
	// function jumlah_jual()
	// {
	// 	$this->db->group_by('nama_barang');
	// 	$this->db->select('nama_barang');
	// 	$this->db->select("count(*) as jumlah_barang");
	// 	return $this->db->from('detail_penjualan')
	// 		->get()
	// 		->result();
	// }
}

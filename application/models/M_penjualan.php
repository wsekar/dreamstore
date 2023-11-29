<?php

class M_penjualan extends CI_Model
{
	protected $_table = 'penjualan'; 

	public function lihat()
	{
		return $this->db->get($this->_table)->result();
	}

	public function jumlah()
	{
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_no_penjualan($no_penjualan) {
		return $this->db->get_where($this->_table, ['no_penjualan' => $no_penjualan])->row();
	}
	public function buatkode()
	{
		$this->db->select('RIGHT(penjualan.no_penjualan,6) as no_penjualan', FALSE);
		$this->db->order_by('no_penjualan', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('penjualan');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->no_penjualan) + 1;
		} else {
			$kode = 1;
		}
		$batas = str_pad($kode, 6, "0", STR_PAD_LEFT);
		$kodetampil = "PJ" . $batas;
		return $kodetampil;
	}
	public function insert($data) {
		return $this->db->insert($this->_table, $data);
	}

	public function delete($no_penjualan) {
		return $this->db->delete($this->_table, ['no_penjualan' => $no_penjualan]);
	}
}

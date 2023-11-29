<?php

class M_kasir extends CI_Model
{
	protected $_table = 'kasir'; 

	public function getAll()
	{
		$query = $this->db->get($this->_table);
		return $query->result();
	}
	public function getId($id_kasir)
	{
		$query = $this->db->get_where($this->_table, ['id_kasir' => $id_kasir]);
		return $query->row();
	}

	public function lihat_username($username_kasir)
	{
		$query = $this->db->get_where($this->_table, ['username_kasir' => $username_kasir]);
		return $query->row();
	}
	public function buatkode()
	{
		$this->db->select('RIGHT(kasir.kode_kasir,2) as kode_kasir', FALSE);
		$this->db->order_by('kode_kasir', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('kasir');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kode_kasir) + 1;
		} else {
			$kode = 1;
		}
		$batas = str_pad($kode, 2, "0", STR_PAD_LEFT);
		$kodetampil = "KASIR-" . $batas;
		return $kodetampil;
	}
	public function insert($data)
	{
		return $this->db->insert($this->_table, $data);
	}

	public function update($data, $id_kasir)
	{
		$query = $this->db->set($data); 
		$query = $this->db->where(['id_kasir' => $id_kasir]); 
		$query = $this->db->update($this->_table); 
		return $query;
	}

	public function delete($id_kasir)
	{
		return $this->db->delete($this->_table, ['id_kasir' => $id_kasir]);
	}
	public function jumlah()
	{
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}


}

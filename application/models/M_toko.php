<?php

class M_toko extends CI_Model
{
	protected $_table = 'toko'; 
	public function getAll() 
	{
		return $this->db->get_where($this->_table, ['id_toko' => 1])->row();
	}

	public function update($data) 
	{
		$query = $this->db->set($data); 
		$query = $this->db->where(['id_toko' => 1]); 
		$query = $this->db->update($this->_table); 
		return $query;
	}
}

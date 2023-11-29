<?php

class M_admin extends CI_Model
{
	protected $_table = 'admin'; 

	public function getAll()
	{
		$query = $this->db->get($this->_table);
		return $query->result();
	}
	public function getId($id_admin) 
	{
		$query = $this->db->get_where($this->_table, ['id_admin' => $id_admin]);
		return $query->row();
	}

	public function lihat_username($username_admin) 
	{
		$query = $this->db->get_where($this->_table, ['username_admin' => $username_admin]);
		return $query->row();
	}
	public function buatkode()
	{
		$this->db->select('RIGHT(admin.kode_admin,2) as kode_admin', FALSE);
		$this->db->order_by('kode_admin', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('admin');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kode_admin) + 1;
		} else {
			$kode = 1;
		}
		$batas = str_pad($kode, 2, "0", STR_PAD_LEFT);
		$kodetampil = "ADMIN-" . $batas;
		return $kodetampil;
	}
	public function insert($data)
	{
		return $this->db->insert($this->_table, $data);
	}
	public function update($data, $id_admin)
	{
		$query = $this->db->set($data); 
		$query = $this->db->where(['id_admin' => $id_admin]); 
		$query = $this->db->update($this->_table); 
		return $query;
	}
	public function delete($id_admin)
	{
		return $this->db->delete($this->_table, ['id_admin' => $id_admin]);
	}
	public function jumlah() 
	{
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}




}
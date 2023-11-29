<?php

class M_satuan extends CI_Model
{
    protected $_table = 'satuan'; 

    public function getAll()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function getId($id_satuan)
    {
        $query = $this->db->get_where($this->_table, ['id_satuan' => $id_satuan]);
        return $query->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->_table, $data);
    }
    public function update($data, $id_satuan)
    {
        $query = $this->db->set($data); 
        $query = $this->db->where(['id_satuan' => $id_satuan]); 
        $query = $this->db->update($this->_table);
        return $query;
    }

    public function delete($id_satuan)
    {
        return $this->db->delete($this->_table, ['id_satuan' => $id_satuan]);
    }
}

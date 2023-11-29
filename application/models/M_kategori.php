<?php

class M_kategori extends CI_Model
{
    protected $_table = 'kategori';

    public function getAll()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function getId($id_kategori)
    {
        $query = $this->db->get_where($this->_table, ['id_kategori' => $id_kategori]);
        return $query->row();
    }

    // public function lihat_nama_kategori($nama_kategori)
    // {
    //     $query = $this->db->select('*');
    //     $query = $this->db->where(['nama_kategori' => $nama_kategori]); 
    //     $query = $this->db->get($this->_table);
    //     return $query->row();
    // }
    public function buatkode()
    {
        $this->db->select('RIGHT(kategori.kode_kategori,6) as kode_kategori', FALSE);
        $this->db->order_by('kode_kategori', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('kategori');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_kategori) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 6, "0", STR_PAD_LEFT);
        $kodetampil = "KG" . $batas;
        return $kodetampil;
    }
    public function insert($data)
    {
        return $this->db->insert($this->_table, $data);
    }
    public function update($data, $id_kategori)
    {
        $query = $this->db->set($data); 
        $query = $this->db->where(['id_kategori' => $id_kategori]); 
        $query = $this->db->update($this->_table); 
        return $query;
    }

    public function delete($id_kategori)
    {
        return $this->db->delete($this->_table, ['id_kategori' => $id_kategori]);
    }
    public function jumlah()
    {
        $query = $this->db->get($this->_table);
        $query = $this->db->get($this->_table);
        return $query->num_rows();
    }

}

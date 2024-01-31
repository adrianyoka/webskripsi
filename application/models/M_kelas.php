<?php

class M_kelas extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('kelas');
        $query = $this->db->get();
        return $query;
    }

    public function delete_kelas($id)
    {
        $this->db->where(['id'=>$id]);
        $this->db->delete('kelas');
    }

    public function tampil_data_kelas($id)
    {
        $this->db->select('*');
        $query = $this->db->get_where('kelas',['id'=>$id]);
        return $query;
    }
}
<?php

class M_mapel extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('mapel');
        $query = $this->db->get();
        return $query;
    }

    public function detail_mapel($id)
    {
        $this->db->select('*');
        $query = $this->db->get_where('mapel', array('id' => $id));
        return $query;
    }

    public function delete_mapel($id)
    {
        $this->db->where(['id'=>$id]);
        $this->db->delete('mapel');
    }

    public function update_mapel($id, $data)
    {
        $this->db->where(['id'=>$id]);
        $this->db->update('mapel', $data);
    }
}

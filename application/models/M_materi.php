<?php

class M_materi extends CI_Model
{
    public function kelas()
    {
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->group_by('kelas');
        $query = $this->db->get();
        return $query;
    }

    public function mapel($kelas)
    {
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->where(array('kelas' => $kelas));
        $this->db->group_by('nama_mapel');
        $query = $this->db->get();
        return $query;
    }

    public function tampil_data()
    {
        return $this->db->get('materi');
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function update_materi($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function detail_materi($id = null)
    {
        $query = $this->db->get_where('materi', array('id' => $id))->row();
        return $query;
    }

    public function delete_materi($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function materi($kelas,$mapel)
    {
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }
    
    public function belajar($id = null)
    {
        $query = $this->db->get_where('materi', array('id' => $id))->row();
        return $query;
    }
}

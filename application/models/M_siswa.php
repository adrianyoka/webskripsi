<?php

class M_siswa extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('user', 'user.id = siswa.id_user');
        $query = $this->db->get();
        return $query;
    }

    public function detail_siswa($id = null)
    {
        $this->db->select('*');
        $this->db->join('user', 'user.id = siswa.id_user');
        $query = $this->db->get_where('siswa', array('id_user' => $id))->row();
        return $query;
    }

    public function delete_siswa($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_siswa($where, $table)
    {
        $this->db->select('*');
        $this->db->join('user', 'user.id = siswa.id_user');
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}

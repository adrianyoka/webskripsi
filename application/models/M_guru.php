<?php

class M_guru extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->join('user', 'user.id = guru.id_user');
        $query = $this->db->get();
        return $query;
    }

    public function detail_guru($id = null)
    {
        $this->db->select('*');
        $this->db->join('user', 'user.id = guru.id_user');
        $query = $this->db->get_where('guru', array('id_user' => $id))->row();
        return $query;
    }

    public function delete_guru($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_guru($where, $table)
    {
        $this->db->select('*');
        $this->db->join('user', 'user.id = guru.id_user');
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}

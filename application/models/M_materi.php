<?php

class M_materi extends CI_Model
{
    public function kelas()
    {
        $this->db->select('*');
        $this->db->from('kelas');
        $query = $this->db->get();
        return $query;
    }

    public function mapel()
    {
        $this->db->select('*');
        $this->db->from('mapel');
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

    public function materi($bab)
    {
        $this->db->select('materi.*,bab.judul_bab,bab.deskripsi,mapel.nama_mapel');
        $this->db->where('materi.bab_id', $bab);
        $this->db->join('bab', 'bab.id = materi.bab_id');
        $this->db->join('mapel', 'mapel.id = bab.mapel_id');
        // $this->db->group_by('bab.judul');
        return $this->db->get_where('materi', array('is_tampil' => '1'));
    }
    
    public function belajar($id = null)
    {
        $this->db->select('materi.*,bab.judul_bab,bab.deskripsi,mapel.nama_mapel,guru.nama_guru');
        $this->db->join('bab', 'bab.id = materi.bab_id');
        $this->db->join('guru', 'guru.nip = materi.guru_id');
        $this->db->join('mapel', 'mapel.id = bab.mapel_id');
        $query = $this->db->get_where('materi', array('materi.id' => $id))->row();
        return $query;
    }

    public function bab($kelas,$mapel)
    {
        $query = $this->db->get_where('bab', array('mapel_id' => $mapel,'kelas_id' => $kelas))->result();
        return $query;
    }
}

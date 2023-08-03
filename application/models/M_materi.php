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

    public function belajar($id = null)
    {
        $query = $this->db->get_where('materi', array('id' => $id))->row();
        return $query;
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

    public function update_materi($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function materi($kelas,$mapel)
    {
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    // public function matematika_xi()
    // {
    //     $mapel = 'Matematika';
    //     $kelas = '5';
    //     $this->db->where('kelas', $kelas);
    //     $this->db->where('nama_mapel', $mapel);
    //     return $this->db->get('materi');
    // }

    // public function matematika_xii()
    // {
    //     $mapel = 'Matematika';
    //     $kelas = '6';
    //     $this->db->where('kelas', $kelas);
    //     $this->db->where('nama_mapel', $mapel);
    //     return $this->db->get('materi');
    // }

    // public function ipa_x()
    // {
    //     $mapel = 'IPA';
    //     $kelas = '4';
    //     $this->db->where('kelas', $kelas);
    //     $this->db->where('nama_mapel', $mapel);
    //     return $this->db->get('materi');
    // }

    // public function ipa_xi()
    // {
    //     $mapel = 'IPA';
    //     $kelas = '5';
    //     $this->db->where('kelas', $kelas);
    //     $this->db->where('nama_mapel', $mapel);
    //     return $this->db->get('materi');
    // }

    // public function ipa_xii()
    // {
    //     $mapel = 'IPA';
    //     $kelas = '6';
    //     $this->db->where('kelas', $kelas);
    //     $this->db->where('nama_mapel', $mapel);
    //     return $this->db->get('materi');
    // }

    // public function indo_x()
    // {
    //     $mapel = 'Bahasa Indonesia';
    //     $kelas = '4';
    //     $this->db->where('kelas', $kelas);
    //     $this->db->where('nama_mapel', $mapel);
    //     return $this->db->get('materi');
    // }

    // public function indo_xi()
    // {
    //     $mapel = 'Bahasa Indonesia';
    //     $kelas = '5';
    //     $this->db->where('kelas', $kelas);
    //     $this->db->where('nama_mapel', $mapel);
    //     return $this->db->get('materi');
    // }

    // public function indo_xii()
    // {
    //     $mapel = 'Bahasa Indonesia';
    //     $kelas = '6';
    //     $this->db->where('kelas', $kelas);
    //     $this->db->where('nama_mapel', $mapel);
    //     return $this->db->get('materi');
    // }

    // public function inggris_x()
    // {
    //     $mapel = 'Bahasa Inggris';
    //     $kelas = '4';
    //     $this->db->where('kelas', $kelas);
    //     $this->db->where('nama_mapel', $mapel);
    //     return $this->db->get('materi');
    // }

    // public function inggris_xi()
    // {
    //     $mapel = 'Bahasa Inggris';
    //     $kelas = '5';
    //     $this->db->where('kelas', $kelas);
    //     $this->db->where('nama_mapel', $mapel);
    //     return $this->db->get('materi');
    // }

    // public function inggris_xii()
    // {
    //     $mapel = 'Bahasa Inggris';
    //     $kelas = '6';
    //     $this->db->where('kelas', $kelas);
    //     $this->db->where('nama_mapel', $mapel);
    //     return $this->db->get('materi');
    // }

    // public function agama_x()
    // {
    //     $mapel = 'Pendidikan Agama Islam';
    //     $kelas = '4';
    //     $this->db->where('kelas', $kelas);
    //     $this->db->where('nama_mapel', $mapel);
    //     return $this->db->get('materi');
    // }

    // public function agama_xi()
    // {
    //     $mapel = 'Pendidikan Agama Islam';
    //     $kelas = '5';
    //     $this->db->where('kelas', $kelas);
    //     $this->db->where('nama_mapel', $mapel);
    //     return $this->db->get('materi');
    // }

    // public function agama_xii()
    // {
    //     $mapel = 'Pendidikan Agama Islam';
    //     $kelas = '6';
    //     $this->db->where('kelas', $kelas);
    //     $this->db->where('nama_mapel', $mapel);
    //     return $this->db->get('materi');
    // }
}

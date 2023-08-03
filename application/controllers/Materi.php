<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Materi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id')) {
            $this->session->set_flashdata('not-login', 'Harap Login Terlebih Dahulu !');
            redirect('welcome');
        }
        $this->load->library('form_validation');
        $this->load->library('disqus');
        $this->load->model('m_materi');
    }

    function index($kelas,$mapel){

        $data['user'] = $this->db->get_where('siswa', ['id_user' =>
            $this->session->userdata('id')])->row_array();
        $mapel = str_replace("_"," ",$mapel);
        $data['materi'] = $this->m_materi->materi($kelas,$mapel)->result();
        $this->load->view('materi/materi', $data);
        $this->load->view('template/footer');
    }

    public function matematika_x()
    {
        $this->generateMateri('matematika_x');
    }

    public function belajar($id)
    {
        $where = array('id' => $id);
        $detail = $this->m_materi->belajar($id);
        $data['detail'] = $detail;
        $data['disqus'] = $this->disqus->get_html();
        $data['user'] = $this->db->get_where('siswa', ['id_user' =>
            $this->session->userdata('id')])->row_array();
        $this->load->view('materi/belajar', $data);
    }

}

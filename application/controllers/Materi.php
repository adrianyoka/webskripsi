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
        $this->load->model('m_siswa');
    }

    function index($kelas,$mapel){

        $data['user'] = $this->m_siswa->get_siswa($this->session->userdata('id'))->row_array();
        $data['topik']=$this->m_materi->bab($kelas,$mapel);
        foreach($data['topik'] as $bab){
            $data['topik'][array_search($bab,$data['topik'])]->materi = $this->m_materi->materi($bab->id)->result();
            if(count($data['topik'][array_search($bab,$data['topik'])]->materi) == 0){
                unset($data['topik'][array_search($bab,$data['topik'])]);
            }
        }
        if(count($data['topik'] == 0)){
            $object = new stdClass();
            $object->materi = $this->m_materi->mapel_detail($mapel)->result();
            array_push($data['topik'],$object);
        }
        $this->load->view('materi/materi', $data);
        $this->load->view('template/footer');
    }

    public function belajar($id)
    {
        $where = array('id' => $id);
        $detail = $this->m_materi->belajar($id);
        $data['detail'] = $detail;
        $data['disqus'] = $this->disqus->get_html();
        $data['user'] = $this->m_siswa->get_siswa($this->session->userdata('id'))->row_array();
        $this->load->view('materi/belajar', $data);
    }

}

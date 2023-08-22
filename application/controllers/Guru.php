<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        if (!$this->session->userdata('id')) {
            $this->session->set_flashdata('not-login', 'Harap Login Terlebih Dahulu !');
            redirect('welcome');
        }
    }

    function index(){
        $this->load->model('m_materi');
        $data['user'] = $this->db->join('user', 'user.id = guru.id_user')->join('kelas', 'kelas.id = guru.kelas_id')->get_where('guru', ['id_user' =>
                        $this->session->userdata('id')])->row_array();
        $data['user']['mata_pelajaran']=$this->m_materi->mapel()->result();
        // var_dump($data['topik']);exit();
        $this->load->view('guru/index', $data['user']);
        $this->load->view('template/footer');
    }
    // public function index()
    // {
    //     $this->load->model('m_materi');
    //     $data['user'] = $this->db->join('user', 'user.id = guru.id_user')->get_where('guru', ['id_user' =>
    //         $this->session->userdata('id')])->row_array();
    //     $data['user']['kelas']= $this->m_materi->kelas()->row_array();
    //     $data['page'] = 'dashboard';
    //     $this->load->view('admin/template/side_bar',$data);
    //     $this->load->view('admin/index',$data['user']);
    // }

    public function add_materi()
    {
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim|min_length[1]', [
            'required' => 'Harap isi kolom deskripsi.',
            'min_length' => 'deskripsi terlalu pendek.',
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('guru/add_materi');
        } else {
            $upload_video = $_FILES['video'];

            if ($upload_video) {
                $config['allowed_types'] = 'mp4|mkv';
                $config['max_size'] = '0';
                $config['upload_path'] = './assets/materi_video';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('video')) {
                    $video = $this->upload->data('file_name');
                } else {
                    $this->upload->display_errors();
                }
            }
            $data = [
                'nama_guru' => htmlspecialchars($this->input->post('nama_guru', true)),
                'nama_mapel' => htmlspecialchars($this->input->post('nama_mapel', true)),
                'video' => $video,
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
                'kelas' => htmlspecialchars($this->input->post('kelas', true)),
            ];

            $this->db->insert('materi', $data);
            $this->session->set_flashdata('success-reg', 'Berhasil!');
            redirect(base_url('guru'));
        }
    }

    private function _uploadImage()
    {
        $config['upload_path'] = './assets/materi_video';
        $config['allowed_types'] = 'mp4|mkv';
        $config['file_name'] = $this->product_id;
        $config['overwrite'] = true;
        $config['max_size'] = 0; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }

        return "default.mp4";
    }
}

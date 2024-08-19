<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('date');
        $this->load->model('m_materi');
        $this->load->model('m_siswa');
        $this->load->helper('url');
        if (!$this->session->userdata('id')) {
            $this->session->set_flashdata('not-login', 'Harap Login Terlebih Dahulu !');
            redirect('welcome');
        }
    }

    function index(){
        $absensi = $this->db->get_where('absensi_master',array('tanggal' => mdate('%Y,%m,%d',now())))->row_array();
        $data['user'] = $this->db->join('user', 'user.id = guru.id_user')->join('kelas', 'kelas.id = guru.kelas_id')->get_where('guru', ['id_user' =>
                        $this->session->userdata('id')])->row_array();
        $data['user']['mata_pelajaran']= $this->m_materi->mapel()->result();
        $data['user']['absen']= null !== $absensi ? 
                                $this->db->select('*,absensi_data.id as absensi_id')
                                ->join('siswa', 'siswa.nisn = absensi_data.siswa_id')
                                ->get_where('absensi_data',array('master_id' => $absensi['id']))->result() : 
                                $this->m_siswa->get_siswa_kelas($data['user']['kelas_id'])->result();
        $data['user']['rekap_absensi'] = $this->db->get('absensi_master')->result_array();
        for($i=0;$i<count($data['user']['rekap_absensi']);$i++){
            $data['user']['rekap_absensi'][$i]['data'] = $this->db->join('siswa', 'siswa.nisn = absensi_data.siswa_id')->select('*,absensi_data.id as absensi_id')
                                                            ->get_where('absensi_data',array('master_id' => $data['user']['rekap_absensi'][$i]['id']))->result_array();
        }
        $this->load->view('guru/index', $data['user']);
        $this->load->view('template/footer');
    }

    public function inputAbsensi()
    {   
        $master = [
            'tanggal' => htmlspecialchars($this->input->post('tanggal', true)),
            'kelas_id' => htmlspecialchars($this->input->post('kelas_id', true)),
        ];
        
        if($this->input->post('exist') == 1){
            $master = $this->db->select('id')->get_where('absensi_master',array('tanggal' => $master['tanggal']))->row_array();
            $master_id = $master['id'];
            // var_dump($master_id);exit();
        }else{
            $this->db->insert('absensi_master', $master);
            $master_id = $this->db->insert_id();


        }
        $data_absensi = $this->input->post('Data');
        foreach($data_absensi as $absensi){
            $data['siswa_id'] = $absensi['siswa_id'];
            $data['keterangan'] = $absensi['keterangan'];
            $data['master_id'] = $master_id;
            
            if(isset($absensi['absensi_id'])){
                $this->db->where('id', $absensi['absensi_id']);
                $this->db->update('absensi_data', $data);
            }else{
                $this->db->insert('absensi_data', $data);
            }
        }
        return redirect('guru');
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

    public function deletebab($id)
    {
        $this->load->model('m_materi');
        $where = array('id' => $id);
        $bab = $this->db->get_where('bab',array('id'=>$id))->result();
        $this->m_materi->delete_materi($where, 'bab');
        $this->session->set_flashdata('user-delete', 'berhasil');
        $this->session->set_flashdata('delete-bab', 'Berhasil!');
        redirect(base_url('guru/materiGuru/'.$bab[0]->kelas_id.'/'.$bab[0]->mapel_id));
    }

    public function add_materi($kelas, $mapel, $bab)
    {
        $this->form_validation->set_rules('judul_materi', 'Judul Materi', 'required|min_length[4]', [
            'required' => 'Harap isi kolom judul.',
            'min_length' => 'Judul terlalu pendek.',
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[4]', [
            'required' => 'Harap isi kolom deskripsi.',
            'min_length' => 'deskripsi terlalu pendek.',
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('guru/materiGuru/.');
        } else {
            $upload = $_FILES['attachment'];

            if ($upload) {
                $config['allowed_types'] = 'pdf|ppt|pptx|mp4|mkv';
                $config['max_size'] = '0';
                $config['upload_path'] = './assets/materi_attachment';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('attachment')) {
                    $attachment = $this->upload->data('file_name');
                } else {
                    $this->upload->display_errors();
                }
            }
            $data = [
                'judul_materi' => htmlspecialchars($this->input->post('judul', true)),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
                'tipe' => htmlspecialchars($this->input->post('tipe', true)),
                'attachment' => $attachment,
                'kelas' => htmlspecialchars($this->input->post('kelas', true)),
            ];

            $this->db->insert('materi', $data);
            $this->session->set_flashdata('success-reg', 'Berhasil!');
            redirect(base_url('guru'));
        }
    }
    
    public function changeTampil($id){
        $status = $this->db->select('is_tampil,mapel_id,kelas_id')->get_where('materi',array('id'=>$id))->row_array();
        $is_tampil = $status['is_tampil'];
        $data = [
            'is_tampil' => ($is_tampil == 0? '1':'0')
        ];
        $this->db->where('id', $id);
        $this->db->update('materi', $data);
        $mapel_id = $status['mapel_id'];
        $kelas_id = $status['kelas_id'];
        // $this->session->set_flashdata('update-bab', 'Berhasil!');
        redirect(base_url('guru/materiGuru/'.$kelas_id.'/'.$mapel_id));
    }

    function materiDashboard($kelas,$mapel){
        $data['user'] = $this->db->join('user', 'user.id = guru.id_user')->join('kelas', 'kelas.id = guru.kelas_id')->get_where('guru', ['id_user' =>
                        $this->session->userdata('id')])->row_array();
        $data['topik']=$this->m_materi->bab($kelas,$mapel);
        foreach($data['topik'] as $bab){
            $data['topik'][array_search($bab,$data['topik'])]->materi = $this->m_materi->materi($bab->id)->result();
            if(count($data['topik'][array_search($bab,$data['topik'])]->materi) == 0){
                unset($data['topik'][array_search($bab,$data['topik'])]);
            }
            
        }

        if($data['topik'] == null){
            $object = new stdClass();
            $object->materi = $this->m_materi->mapel_detail($mapel)->result();
            array_push($data['topik'],$object);
        }
        $this->load->view('guru/materi', $data);
        $this->load->view('template/footer');
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

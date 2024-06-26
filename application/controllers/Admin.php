<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->model('m_materi');
        $this->load->model('m_guru');
        $this->load->model('m_siswa');
        $this->load->model('m_kelas');
        $this->load->model('m_mapel');
        if (!$this->session->userdata('id')) {
            $this->session->set_flashdata('not-login', 'Harap Login Terlebih Dahulu !');
            redirect('welcome');
        }
    }

    public function index()
    {
        $this->load->model('m_materi');
        $data['kelas'] = $this->m_materi->kelas()->result();
        $data['user'] = $this->db->get_where('user', ['id' =>
            $this->session->userdata('id')])->row_array();
        $data['page'] = 'dashboard';
        $this->load->view('admin/template/side_bar',$data);
        $this->load->view('admin/index',$data);
    }

    public function monitoring()
    {
        $this->load->model('m_materi');
        $data['nama_kelas'] = array();
        $data['kelas'] = $this->m_kelas->tingkat_kelas(4)->result();
        $data['tingkat'] = $this->m_materi->tingkat()->result();
        // var_dump($data['tingkat']);exit();
        foreach ($data['kelas'] as $kelas){
            $nama_kelas = $kelas->tingkat.$kelas->rombel;
            array_push($data['nama_kelas'],$nama_kelas);
        }
        $data['mapel'] = $this->m_materi->mapel()->result();
        $data['user'] = $this->db->get_where('user', ['id' =>
            $this->session->userdata('id')])->row_array();
        $data['page'] = 'monitoring';
        $this->load->view('admin/template/side_bar',$data);
        $this->load->view('admin/monitoring',$data);
    }

    public function reset_password($id_user){
        $id = $id_user;
        $password= password_hash('123456', PASSWORD_DEFAULT);

        $data = array(
            'password' => $password,
        );

        $this->db->where('id',$id)->update('user', $data);
        $this->session->set_flashdata('success-reset', 'berhasil');
        redirect('admin/data_guru');
    }

    // Management Siswa

    public function data_siswa()
    {
        $this->load->model('m_siswa');
        $data['user'] = $this->db->get_where('user', ['id' =>
            $this->session->userdata('id')])->row_array();
        $data['page'] = 'siswa';
        $data['siswa'] = $this->m_siswa->tampil_data()->result();
        $this->load->view('admin/template/side_bar',$data);
        $this->load->view('admin/data_siswa', $data);
    }

    public function detail_siswa($id)
    {
        $this->load->model('m_siswa');
        $data['user'] = $this->db->get_where('user', ['id' =>
            $this->session->userdata('id')])->row_array();
        $data['page'] = 'siswa';
        $data['detail'] = $this->m_siswa->detail_siswa($id);
        //  = $detail;
        $this->load->view('admin/template/side_bar', $data);
        $this->load->view('admin/detail_siswa', $data);
    }

    public function update_siswa($id)
    {
        $this->load->model('m_siswa');
        $where = array('siswa.nisn' => $id);
        $data['user'] = $this->db->get_where('user', ['id' =>
            $this->session->userdata('id')])->row_array();
        $data['page'] = 'siswa';
        $data['update'] = $this->m_siswa->update_siswa($where, 'siswa')->result();
        $this->load->view('admin/template/side_bar', $data);
        $this->load->view('admin/update_siswa', $data);
    }

    public function user_edit()
    {
        $this->load->model('m_siswa');

        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $gambar = $_FILES['image']['name'];

        $data = array(
            'nama' => $nama,
        );

        $config['allowed_types'] = 'jpg|png|gif|jfif';
        $config['max_size'] = '4096';
        $config['upload_path'] = './assets/profile_picture';

        $this->load->library('upload', $config);
        //berhasil
        if ($this->upload->do_upload('image')) {
            $gambarLama = $data['user']['image'];
            if ($gambarLama != 'default.jpg') {
                unlink(FCPATH . '/assets/profile_picture/' . $gambarLama);
            }
            $gambarBaru = $this->upload->data('file_name');
            $this->db->set('image', $gambarBaru);
        } else {
            echo $this->upload->display_errors();
        }

        $where = array(
            'id_user' => $id,
        );

        $this->m_siswa->update_data($where, $data, 'siswa');
        $this->session->set_flashdata('success-edit', 'berhasil');
        redirect('admin/data_siswa');
    }

    public function delete_siswa($id)
    {
        $this->load->model('m_siswa');
        $where = array('siswa.id_user' => $id);
        $this->m_siswa->delete_siswa($where, 'siswa');
        $this->load->model('m_siswa');
        $where = array('id' => $id);
        $this->m_siswa->delete_siswa($where, 'user');
        $this->session->set_flashdata('user-delete', 'berhasil');
        redirect('admin/data_siswa');
    }
    
    // manajemen absensi

    public function data_absensi()
    {
        $this->load->model('M_kelas');
        $data['cetak'] = $this->m_kelas->tampil_data()->result_array();
        $data['kelas'] = $this->db->select('*,kelas.id as kelas_id')->join('absensi_master','kelas.id = absensi_master.kelas_id')->get('kelas')->result_array();
        $data['user'] = $this->db->get_where('user', ['id' =>
            $this->session->userdata('id')])->row_array();
        $data['page'] = 'absensi';
        $data['absensi'] = $this->db->select('*,absensi_master.id as master_id')->join('kelas','kelas.id = absensi_master.kelas_id')->get('absensi_master')->result_array();
        for($i=0;$i<count($data['absensi']);$i++){
            $data['absensi'][$i]['data'] = $this->db->join('siswa', 'siswa.nisn = absensi_data.siswa_id')->select('*,absensi_data.id as absensi_id')
            ->get_where('absensi_data',array('master_id' => $data['absensi'][$i]['master_id']))->result_array();
            $data['absensi'][$i]['total'] = count($data['absensi'][$i]['data']);
        }
        $this->load->view('admin/template/side_bar',$data);
        $this->load->view('admin/data_absensi', $data);
    }

    public function detail_absensi($id)
    {
        $data['user'] = $this->db->get_where('user', ['id' =>
            $this->session->userdata('id')])->row_array();
        $data['page'] = 'absensi';
        $data['absensi'] = $this->db->select('*,kelas.id as kelas_id')->join('siswa','siswa.nisn = absensi_data.siswa_id')->join('kelas','kelas.id = siswa.kelas_id')->get_where('absensi_data',array('absensi_data.master_id' => $id))->result_array();
        // var_dump($data['absensi']);exit();
        $this->load->view('admin/template/side_bar',$data);
        $this->load->view('admin/detail_absensi', $data);
    }

    public function cetak_absensi($id){
        $data['siswa'] = $this->m_siswa->get_siswa_kelas($id)->result_array();
        $data['kelas'] = $this->m_kelas->tampil_data_kelas($id)->row();
        foreach($data['siswa'] as $siswa){
            $data['absensi'][$siswa['nisn']] = [
                'nama' => $siswa['nama'],
                'hadir' => $this->db->select('*')->get_where('absensi_data', array('siswa_id' => $siswa['nisn'],'keterangan' => 'Hadir'))->num_rows(),
                'izin' => $this->db->select('*')->get_where('absensi_data', array('siswa_id' => $siswa['nisn'],'keterangan' => 'Izin'))->num_rows(),
                'sakit' => $this->db->select('*')->get_where('absensi_data', array('siswa_id' => $siswa['nisn'],'keterangan' => 'Sakit'))->num_rows(),
                'tKeterangan' => $this->db->select('*')->get_where('absensi_data', array('siswa_id' => $siswa['nisn'],'keterangan' => '-'))->num_rows()
            ];
        }
        // var_dump($data['absensi']);exit();
        $this->load->view('admin/cetak_absensi',$data);
    }
    
    // manajemen guru

    public function data_guru()
    {
        $this->load->model('m_guru');
        $data['user'] = $this->db->get_where('user', ['id' =>
            $this->session->userdata('id')])->row_array();
        $data['page'] = 'guru';
        $data['guru'] = $this->m_guru->tampil_data()->result();
        $this->load->view('admin/template/side_bar', $data);
        $this->load->view('admin/data_guru', $data);
    }

    public function detail_guru($id)
    {
        $this->load->model('m_guru');
        $data['user'] = $this->db->get_where('user', ['id' =>
            $this->session->userdata('id')])->row_array();
        $data['page'] = 'guru';
        $data['detail'] = $this->m_guru->detail_guru($id);
        $this->load->view('admin/template/side_bar', $data);
        $this->load->view('admin/detail_guru', $data);
    }

    public function update_guru($id)
    {
        $this->load->model('m_guru');
        $where = array('id_user' => $id);
        $data['user'] = $this->db->get_where('user', ['id' =>
            $this->session->userdata('id')])->row_array();
        $data['page'] = 'guru';
        $data['update'] = $this->m_guru->update_guru($where, 'guru')->result();
        $this->load->view('admin/template/side_bar', $data);
        $this->load->view('admin/update_guru', $data);
    }

    public function guru_edit()
    {
        $this->load->model('m_guru');
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');

        $data = array(
            'nama_guru' => $nama,
        );

        $where = array(
            'id_user' => $id,
        );

        $this->m_guru->update_data($where, $data, 'guru');
        $this->session->set_flashdata('success-edit', 'berhasil');
        redirect('admin/data_guru');
    }

    public function delete_guru($id)
    {
        $this->load->model('m_guru');
        $this->m_guru->delete_guru($id);
        $this->session->set_flashdata('user-delete', 'berhasil');
        redirect('admin/data_guru');
    }

    public function add_guru()
    {
        $this->form_validation->set_rules('nip', 'Nip', 'required|trim|min_length[4]', [
            'required' => 'Harap isi kolom NIP.',
            'min_length' => 'NIP terlalu pendek.',
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email ini telah digunakan!',
            'required' => 'Harap isi kolom email.',
            'valid_email' => 'Masukan email yang valid.',
        ]);

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[4]', [
            'required' => 'Harap isi kolom nama.',
            'min_length' => 'Nama terlalu pendek.',
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'required' => 'Harap isi kolom Password.',
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek',
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
            'matches' => 'Password tidak sama!',
        ]);

        $this->form_validation->set_rules('kelas', 'Kelas', 'required|is_unique[guru.kelas_id]', [
            'is_unique' => 'Kelas telah memiliki guru!',
        ]);
        if ($this->form_validation->run() == false) {
            $data['page'] = 'guru';
            $data['user'] = $this->db->get_where('user', ['id' =>
            $this->session->userdata('id')])->row_array();
            $this->load->model('m_materi');
            $data['kelas'] = $this->m_materi->tampil_seluruh_kelas()->result();
            $this->load->view('admin/template/side_bar',$data);
            $this->load->view('guru/registration',$data);
        } else {
            $email = $this->input->post('email', true);
            $user = [
                'username'=>htmlspecialchars(ltrim($this->input->post('nama', true)," ")),
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => '1'
            ];

            $this->db->insert('user', $user);
            $id_user = $this->db->insert_id();

            $guru = [
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'nama_guru' => htmlspecialchars($this->input->post('nama', true)),
                'kelas_id' => htmlspecialchars($this->input->post('kelas', true)),
                'id_user' => $id_user
            ];
            $this->db->insert('guru', $guru);

            $this->session->set_flashdata('success-reg', 'Berhasil!');
            redirect(base_url('admin/data_guru'));
        }
    }
    

    // manajemen kelas
    
    public function data_kelas()
    {
        $data['user'] = $this->db->get_where('user', ['id' =>
            $this->session->userdata('id')])->row_array();
        $data['page'] = 'kelas';
        $data['kelas'] = $this->m_materi->tampil_seluruh_kelas()->result();
        $this->load->view('admin/template/side_bar', $data);
        $this->load->view('admin/data_kelas', $data);
    }

    public function tambah_kelas()
    {
        $this->form_validation->set_rules('tingkat', 'Tingkat', 'required', [
            'required' => 'Harap isi kolom Tingkat.',
        ]);

        $this->form_validation->set_rules('rombel', 'Rombongan Belajar', 'required|alpha|trim', [
            'required' => 'Harap isi kolom Rombongan Belajar.',
            'alpha' => 'Rombongan Belajar harus berupa huruf.',
        ]);

        if ($this->form_validation->run() == false) {
            $data['page'] = 'kelas';

            $data['user'] = $this->db->get_where('user', ['id' =>
            $this->session->userdata('id')])->row_array();

            $this->load->view('admin/template/side_bar',$data);
            $this->load->view('admin/tambah_kelas',$data);
        } else {
            $kelas = [
                'tingkat' => $this->input->post('tingkat'),
                'rombel' => $this->input->post('rombel'),
            ];
            $this->db->insert('kelas', $kelas);
            $this->session->set_flashdata('kelas-add', 'Berhasil!');
            redirect(base_url('admin/data_kelas'));
        }
    }

    public function delete_kelas($id)
    {
        try{
            $this->m_kelas->delete_kelas($id);
            $this->session->set_flashdata('kelas-delete', 'berhasil');
        }catch(error){
            var_dump(error);exit();
        }
        redirect('admin/data_kelas');
    }

    // manajemen mata pelajaran

    public function data_mapel()
    {
        $data['user'] = $this->db->get_where('user', ['id' =>
        $this->session->userdata('id')])->row_array();
        $data['page'] = 'mapel';
        $data['mapel'] = $this->m_mapel->tampil_data()->result();
        $this->load->view('admin/template/side_bar', $data);
        $this->load->view('admin/data_mapel', $data);
    }

    public function tambah_mapel()
    {
        $this->form_validation->set_rules('nama_mapel', 'Nama Mata Pelajaran', 'required', [
            'required' => 'Harap isi kolom Nama Mata Pelajaran.',
            'alpha' => 'Rombongan Belajar harus berupa huruf.',
        ]);

        if ($this->form_validation->run() == false) {
            $data['page'] = 'mapel';

            $data['user'] = $this->db->get_where('user', ['id' =>
            $this->session->userdata('id')])->row_array();

            $this->load->view('admin/template/side_bar',$data);
            $this->load->view('admin/tambah_mapel',$data);
        } else {
            $upload = $_FILES['gambar'];
            if ($upload) {
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img';
                $config['overwrite'] = true;

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $gambar = $this->upload->data('file_name');
                    
                    $mapel = [
                        'nama_mapel' => $this->input->post('nama_mapel'),
                        'gambar' => $gambar,
                    ];
                    $this->db->insert('mapel', $mapel);
                    $this->session->set_flashdata('mapel-add', 'Berhasil!');
                    redirect(base_url('admin/data_mapel'));
                }else{
                    $data['page'] = 'mapel';

                    $data['user'] = $this->db->get_where('user', ['id' =>
                    $this->session->userdata('id')])->row_array();

                    $data['errors'] = array('error' => $this->upload->display_errors());
                    
                    $this->load->view('admin/template/side_bar',$data);
                    $this->load->view('admin/tambah_mapel',$data);
                }
            }
        }
    }

    public function delete_mapel($id)
    {
        $mapel = $this->m_mapel->detail_mapel($id)->row();
        $gambar = $mapel->gambar;
        $file = './assets/img/'.$gambar;
        unlink($file);
        $this->m_mapel->delete_mapel($id);
        $this->session->set_flashdata('mapel-delete', 'berhasil');
        redirect('admin/data_mapel');
    }

    public function update_mapel($id)
    {
        $this->form_validation->set_rules('nama_mapel', 'Nama Mata Pelajaran', 'required', [
            'required' => 'Harap isi kolom Nama Mata Pelajaran.',
            'alpha' => 'Rombongan Belajar harus berupa huruf.',
        ]);

        if ($this->form_validation->run() == false) {
            $data['page'] = 'mapel';

            $data['user'] = $this->db->get_where('user', ['id' =>
            $this->session->userdata('id')])->row_array();

            $data['mapel'] = $this->m_mapel->detail_mapel($id)->row();
            $this->load->view('admin/template/side_bar',$data);
            $this->load->view('admin/update_mapel',$data);
        } else {
            $upload = isset($_FILES['gambar'])?$_FILES['gambar']:false;
            if ($upload) {
                // var_dump($upload);exit();
                
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img';
                $config['overwrite'] = true;

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $gambar = $this->upload->data('file_name');
                    
                    $mapel = [
                        'nama_mapel' => $this->input->post('nama_mapel'),
                        'gambar' => $gambar,
                    ];
                    $this->m_mapel->update_mapel($id, $mapel);
                    $this->session->set_flashdata('mapel-edit', 'Berhasil!');
                    redirect(base_url('admin/data_mapel'));
                }else{
                    $data['page'] = 'mapel';

                    $data['user'] = $this->db->get_where('user', ['id' =>
                    $this->session->userdata('id')])->row_array();

                    $data['errors'] = array('error' => $this->upload->display_errors());
                    
                    $this->load->view('admin/template/side_bar',$data);
                    $this->load->view('admin/tambah_mapel',$data);
                }
            }else{
                // var_dump($upload);exit();
                $mapel = [
                    'nama_mapel' => $this->input->post('nama_mapel'),
                ];
                $this->m_mapel->update_mapel($id, $mapel);
                $this->session->set_flashdata('mapel-edit', 'Berhasil!');
                redirect(base_url('admin/data_mapel'));
            }
        }
    }

    // manajemen materi

    public function data_bab()
    {
        $data['user'] = $this->db->get_where('user', ['id' =>
            $this->session->userdata('id')])->row_array();
        $data['page'] = 'materi';
        $data['bab'] = $this->m_materi->get_all_bab()->result();

        foreach($data['bab'] as $bab){
            $materi = $this->m_materi->materi($bab->id_bab)->result();
            $bab->materi = $materi;
        }
        $this->load->view('admin/template/side_bar', $data);
        $this->load->view('admin/data_bab', $data);
    }

    public function detail_bab($bab_id)
    {
        $data['user'] = $this->db->get_where('user', ['id' =>
            $this->session->userdata('id')])->row_array();
        $data['page'] = 'materi';
        $data['bab'] = $this->m_materi->get_detail_bab($bab_id)->row();
        $materi = $this->m_materi->materi($data['bab']->id_bab)->result();
        $data['bab']->materi = $materi;
        
        $this->load->view('admin/template/side_bar', $data);
        $this->load->view('admin/detail_bab', $data);
    }

    public function tambah_bab()
    {
        $this->form_validation->set_rules('judul_bab', 'Judul Bab', 'required', [
            'required' => 'Harap isi kolom Judul Bab.',
        ]);
        
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Bab', 'required', [
            'required' => 'Harap isi kolom Deskripsi Bab.',
        ]);

        if ($this->form_validation->run() == false) {
            $data['page'] = 'materi';

            $data['user'] = $this->db->get_where('user', ['id' =>
            $this->session->userdata('id')])->row_array();

            $this->load->view('admin/template/side_bar',$data);
            $this->load->view('admin/tambah_bab',$data);
        } else {
            $kelas = $this->input->post('kelas_id');
            foreach($kelas as $k){
                $bab = [
                    'judul_bab' => $this->input->post('judul_bab'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'mapel_id' => $this->input->post('mapel_id'),
                    'kelas_id' => $k,
                ];
                $this->db->insert('bab', $bab);
            }
            
            $this->session->set_flashdata('bab-add', 'Berhasil!');
            redirect(base_url('admin/data_bab'));
                }
    }

    public function delete_bab($id)
    {
        $where = array('id' => $id);
        $delete = $this->m_materi->delete_bab($where, 'bab');
        $this->session->set_flashdata('bab-delete', 'berhasil');
        redirect('admin/data_bab');
    }

    public function data_materi($bab_id)
    {
        $this->load->model('m_materi');
        $data['user'] = $this->db->get_where('user', ['id' =>
            $this->session->userdata('id')])->row_array();
        $data['page'] = 'materi';
        $data['bab'] = $this->m_materi->get_detail_bab($bab_id)->row();
        $materi = $this->m_materi->materi($data['bab']->id_bab)->result();
        $data['materi'] = $materi;
        // var_dump($data['materi']);exit();
        $this->load->view('admin/template/side_bar', $data);
        $this->load->view('admin/data_materi', $data);
    }

    public function delete_materi($id)
    {
        try{
            $this->load->model('m_materi');
            $materi = $this->m_materi->update_materi($where, 'materi')->row();;
            $where = array('id' => $id);
            $this->m_materi->delete_materi($where, 'materi');
            $this->session->set_flashdata('user-delete', 'berhasil');
        }catch(error){
            var_dump(error);exit();
        }
        redirect('admin/data_materi/'.$materi->bab_id);
    }

    public function tambah_materi() 
    {
        $this->form_validation->set_rules('judul_materi', 'Judul Materi', 'required|min_length[4]', [
            'required' => 'Harap isi kolom judul.',
            'min_length' => 'Judul terlalu pendek.',
        ]);
        $this->form_validation->set_rules('deskripsi_materi', 'Deskripsi', 'required|min_length[4]', [
            'required' => 'Harap isi kolom deskripsi.',
            'min_length' => 'deskripsi terlalu pendek.',
        ]);
        if ($this->form_validation->run() == true) {
            $this->load->model('m_guru');
            $nip = $this->m_guru->get_nip($this->input->post('kelas_id', true))->nip;
            $tipe = true;
            if ($this->input->post('tipe', true)=="pdf"){
                $upload = $_FILES['attachment'];
                if ($upload) {
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '102400000';
                    $config['upload_path'] = './assets/materi_attachment';
                    $config['overwrite'] = true;
    
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('attachment')){
                        $attachment = $this->upload->data('file_name');
                        $tipe = true;
                    }
                    else{
                        $tipe = false;
                    }
                }
            }
            else if ($this->input->post('tipe', true)=="youtube"){
                $attachment = $this->input->post('attachment', true);
            }

            if ($tipe) { 
                $data = [
                    'judul' => htmlspecialchars($this->input->post('judul_materi', true)),
                    'deskripsi' => htmlspecialchars($this->input->post('deskripsi_materi', true)),
                    'tipe' => htmlspecialchars($this->input->post('tipe', true)),
                    'attachment' => $attachment,
                    'guru_id' => $nip,
                    'kelas_id' => htmlspecialchars($this->input->post('kelas_id', true)),
                    'mapel_id'=> htmlspecialchars($this->input->post('mapel_id', true)),
                    'bab_id'=> htmlspecialchars($this->input->post('bab_id', true)),
                    'is_tampil' => '1',
                ];
                $this->db->insert('materi', $data);
                $this->session->set_flashdata('success-reg', 'Berhasil!');
                redirect('admin/data_materi/'.$data['bab_id']);
            } else {
                var_dump($this->upload->display_errors());exit();
            }
        }
         else {
            $this->session->set_flashdata('form-error', 'Gagal');
            $this->load->model('m_materi');
            $data['user'] = $this->db->get_where('user', ['id' =>
            $this->session->userdata('id')])->row_array();
            $data['page'] = 'materi';
            $data['materi'] = $this->m_materi->tampil_data()->result();
            $this->load->view('admin/template/side_bar',$data);
            $this->load->view('admin/tambah_materi',$data);
        }
    }

    public function update_materi($id)
    {
        $this->load->model('m_materi');
        $where = array('id' => $id);
        $data['user'] = $this->db->get_where('user', ['id' =>
            $this->session->userdata('id')])->row_array();
        $data['page'] = 'materi';
        $data['materi'] = $this->m_materi->update_materi($where, 'materi')->row();
        // var_dump($data['materi']);exit();
        $this->load->view('admin/template/side_bar',$data);
        $this->load->view('admin/update_materi', $data);
    }

    public function materi_edit()
    {
        $this->load->model('m_materi');

        $id = $this->input->post('id');
        unset($_POST['id']);

        $where = array(
            'id' => $id,
        );
        $data= $_POST;
        $this->m_materi->update_data($where, $data, 'materi');
        $this->session->set_flashdata('success-edit', 'berhasil');
        redirect('admin/data_materi/'.$data['bab_id']);
    }

    #ajax

    public function get_mapel(){
        $id = isset($_GET['id'])?$_GET['id']:0;
        if($id == 0){
            $data= $this->m_mapel->tampil_data()->result();
            
            echo "<option disabled selected>Pilih Mata Pelajaran : </option>";
            
            foreach($data as $row){
                echo "<option value='".$row->id."'>".$row->nama_mapel."</option>";
            }
        }else{
            $data= $this->m_mapel->tampil_data()->result();
            $thisMapel= $this->m_materi->detail_materi($id);
            
            echo "<option disabled >Pilih Mata Pelajaran : </option>";
            
            foreach($data as $row){
                $selected = $thisMapel->kelas_id == $row->id?'selected':'';
                echo "<option value='".$row->id."' ".$selected." >".$row->nama_mapel."</option>";
            }
        }
    }
    public function get_kelas(){
        $id = isset($_GET['id'])?$_GET['id']:0;
        if($id==0){
            $multiple = $_GET['multiple'];
            $data=$this->m_materi->kelas()->result();
            if($multiple == 1){
                echo "<option disabled selected>Pilih Kelas : </option>";
            }else{
                echo "<option disabled selected>Pilih Kelas : </option>";
            }
            
            foreach($data as $row){
                echo "<option value='".$row->id."'>".$row->tingkat.$row->rombel."</option>";
            }
        }else{
            $multiple = $_GET['multiple'];
            $data=$this->m_materi->kelas()->result();
            $thisKelas= $this->m_materi->detail_materi($id);
            
            if($multiple == 1){
                echo "<option disabled >Pilih Kelas : (bisa lebih dari satu) </option>";
            }else{
                echo "<option disabled >Pilih Kelas : </option>";
            }
            
            foreach($data as $row){
                $selected = $thisKelas->kelas_id == $row->id?'selected':'';
                echo "<option value='".$row->id."' ".$selected." >".$row->tingkat.$row->rombel."</option>";
            }
        }
    }

    public function get_bab(){
        $id = isset($_GET['id'])?$_GET['id']:0;
        if($id == 0){
            $kelas = $_GET['kelas'];
            $mapel = $_GET['mapel'];
            $data=$this->m_materi->bab($kelas,$mapel);

            if(count($data) == 0 && $mapel != 0 ){
                echo "<option selected value = '0' >Belum Ada Bab  </option>";
            }else{
                echo "<option disabled selected>Pilih Bab :  </option>";
            }
    
            foreach($data as $row){
                echo "<option value='".$row->id."'>".$row->judul_bab."</option>";
            }
        }else{
            $kelas = $_GET['kelas'];
            $mapel = $_GET['mapel'];
            $data=  $this->m_materi->bab($kelas,$mapel);
            $thisBAB = $this->m_materi->detail_materi($id);
            
            if(count($data) == 0 && $mapel != 0 ){
                echo "<option selected value = '0' >Belum Ada Bab  </option>";
            }else{
                echo "<option disabled >Pilih Bab :  </option>";
            }
    
            foreach($data as $row){
                $selected = $thisKelas->kelas_id == $row->id?'selected':'';
                echo "<option value='".$row->id."' ".$selected." >".$row->judul_bab."</option>";
            }
        }
    }

}

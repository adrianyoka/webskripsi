<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if (!$this->session->userdata('id')) {
            $this->session->set_flashdata('not-login', 'Harap Login Terlebih Dahulu !');
            redirect('welcome');
        }
        $this->load->model('m_siswa');
        $this->load->model('m_materi');
    }

    public function index()
    {
        $data['user'] = $this->m_siswa->get_siswa($this->session->userdata('id'))->row_array();
        $data['user']['mata_pelajaran'] = $this->m_materi->mapel()->result();
        $this->load->view('user/index',$data['user']);
        $this->load->view('template/footer');
    }

    public function registration()
    {
        $data['user'] = $this->db->get_where('user', ['id' =>
            $this->session->userdata('id')])->row_array();
        $data['page'] = 'siswa';
        $data['kelas'] = $this->m_materi->kelas()->result();
        $this->load->view('admin/template/side_bar',$data);
        $this->load->view('user/registration',$data);
    }

    public function registration_act()
    {
        $this->form_validation->set_rules('nisn', 'Nomor Induk Siswa Nasional', 'required|min_length[4]|numeric', [
            'required' => 'Harap isi kolom Nomor Induk Siswa Nasional.',
            'min_length' => 'Nomor Induk Siswa Nasional terlalu pendek.',
            'numeric' => 'Nomor Induk Siswa Nasional harus berupa angka.',
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[4]', [
            'required' => 'Harap isi kolom username.',
            'min_length' => 'Nama terlalu pendek.',
        ]);
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim', [
            'required' => 'Harap isi kolom kelas.',
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email ini telah digunakan!',
            'required' => 'Harap isi kolom email.',
            'valid_email' => 'Masukan email yang valid.',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', [
            'required' => 'Harap isi kolom Password.',
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek',
        ]);
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim|matches[password]', [
            'matches' => 'Password tidak sama!',
        ]);

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['id' =>
                $this->session->userdata('id')])->row_array();
            $data['page'] = 'siswa';
            $data['kelas'] = $this->m_materi->kelas()->result();
            $this->load->view('admin/template/side_bar',$data);
            $this->load->view('user/registration',$data);
        } else {
            $email = $this->input->post('email', true);
            $user = [
                'username'=>htmlspecialchars(ltrim($this->input->post('nama', true)," ")),
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => '2'
            ];

            $this->db->insert('user', $user);
            $id_user = $this->db->insert_id();

            $siswa = [
                'nisn' => $this->input->post('nisn', true),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'image' => 'default.jpg',
                'kelas_id' => htmlspecialchars($this->input->post('kelas', true)),
                'is_active' => 1,
                'date_created' => time(),
                'id_user' => $id_user
            ];
            //siapkan token

            // $token = base64_encode(random_bytes(32));
            // $user_token = [
            //     'email' => $email,
            //     'token' => $token,
            //     'date_created' => time(),
            // ];

            $this->db->insert('siswa', $siswa);
            // $this->db->insert('token', $user_token);

            // $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('success-reg', 'Berhasil!');
            redirect(base_url('admin/data_siswa'));
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'ini email disini',
            'smtp_pass' => 'Isi Password gmail disini',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];

        $this->email->initialize($config);

        $data = array(
            'name' => 'syauqi',
            'link' => ' ' . base_url() . 'welcome/verify?email=' . $this->input->post('email') . '& token' . urlencode($token) . '"',
        );

        $this->email->from('LearnifyEducations@gmail.com', 'Learnify');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $link =
            $this->email->subject('Verifikasi Akun');
            $body = $this->load->view('template/email-template.php', $data, true);
            $this->email->message($body);
        } else {
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die();
        }
    }
}

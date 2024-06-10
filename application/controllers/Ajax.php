<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

class Ajax extends CI_Controller
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
    public function getNilaiBulan()
    {
        $faker = Faker\Factory::create('id_ID');
        $nama_kelas = array();
        $nama_mapel = array();
        $kelas = $this->m_kelas->tingkat_kelas($_POST['tingkat'])->result();
        $mapel = $this->m_materi->mapel()->result();
        foreach ($kelas as $k){
            $nk = $k->tingkat.$k->rombel;
            array_push($nama_kelas,$nk);
        }
        foreach ($mapel as $m){
            array_push($nama_mapel,$m->nama_mapel);
        }

        $nilai = array();
        for($a=0; $a<90; $a++){
            $person = [
                'kelas' => $faker->randomElements($nama_kelas, $count = 1)[0],
                'nilai' => $faker->numberBetween($min = 50, $max = 100),
                'mapel' => $faker->randomElements($nama_mapel, $count = 1)[0],
            ];
            if(isset($nilai[$person['mapel']])){
                if(isset($nilai[$person['mapel']][$person['kelas']])){
                    array_push($nilai[$person['mapel']][$person['kelas']],$person['nilai']);
                }else{
                    $nilai[$person['mapel']][$person['kelas']] = [$person['nilai']];
                }
            }else{
                $nilai[$person['mapel']] = [
                    $person['kelas'] => [$person['nilai']]
                ];
            }
        }
        foreach($nilai as $mapel => $isi){
            foreach ($isi as $kelas => $angka) {
                if(isset($nilai['avg'])){
                    if(isset($nilai['avg'][$mapel])){
                        $nilai['avg'][$mapel][$kelas] = array_sum($angka)/count($angka);
                    }else{
                        $nilai['avg'][$mapel] = [
                            $kelas => array_sum($angka)/count($angka)
                        ];
                    }
                }else{
                    $nilai['avg'] = [
                        $mapel => [
                            $kelas => array_sum($angka)/count($angka)
                        ]
                    ];
                }
            }
        }
        $data = [
            'avg' => $nilai['avg'],
            'kelas' => $nama_kelas
        ];
        echo json_encode($data);
    }

    

}

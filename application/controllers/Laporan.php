<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('siswabaru_model');
        $this->load->library(['form_validation', 'pdflib', 'excellib']);
    }

    //LAPORAN PPDB DI BAGIAN ADMIN 
    public function index($filter = null)
    {
        $filter = $this->input->post('tahun_akademik');
        if (isset($filter)) {
            $data['title'] = 'MY PPDB | Laporan PPDB';
            $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
            $data['ppdb'] = $this->siswabaru_model->getDataPpdb_laporan($filter);
            $data['filter'] = $filter;
            $this->pagging('laporan/ppdb_admin', $data);
        } else {
            $data['title'] = 'MY PPDB | Laporan PPDB';
            $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
            $data['ppdb'] = $this->siswabaru_model->getDataPpdb_laporan($filter = 9999);
            $data['filter'] = $filter;
            $this->pagging('laporan/ppdb_admin', $data);
        }
    }

    public function reward_admin()
    {

        $filter = $this->input->post('tahun_akademik');
        if (isset($filter)) {
            $data['filter'] = $filter;
            $data['title'] = 'MY PPDB | Laporan Reward';
            $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
            $data['panitia'] = $this->user_model->getDataPanitia_reward($filter);
            $this->pagging('laporan/panitia_admin', $data);
        } else {
            $data['filter'] = $filter;
            $data['title'] = 'MY PPDB | Laporan Reward';
            $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
            $data['panitia'] = $this->user_model->getDataPanitia_reward($filter = 9999);
            $this->pagging('laporan/reward_admin', $data);
        }
    }

    public function print_reward()
    {
        $filter = $this->input->post('filter');
        $data['filter'] = $filter;
        $data['title'] = 'MY PPDB | print Laporan';
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['panitia'] = $this->user_model->getDataPanitia_reward($filter);
        $data['tahun_akademik'] = $this->siswabaru_model->getTahunAkademik($filter);
        $this->load->view('laporan/print_reward', $data);
    }

    public function print_ppdb()
    {
        $filter = $this->input->post('filter');
        $data['title'] = 'MY PPDB | Laporan PPDB';
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['ppdb'] = $this->siswabaru_model->getDataPpdb_laporan($filter);
        $data['tahun_akademik'] = $this->siswabaru_model->getTahunAkademik($filter);
        $this->load->view('laporan/print_ppdb', $data);
    }

    public function excel_ppdbadmin()
    {
        $filter = $this->input->post('filter');
        $data['title'] = 'Laporan PPDB';
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['ppdb'] = $this->siswabaru_model->getPpdb_excel($filter);
        $data['tahun_akademik'] = $this->siswabaru_model->getTahunAkademik($filter);
        $this->load->view('laporan/excel_ppdbadmin', $data);
    }

    public function excel_rewardadmin()
    {
        $filter = $this->input->post('filter');
        $data['filter'] = $filter;
        $data['title'] = 'Laporan Reward';
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['panitia'] = $this->user_model->getDataPanitia_reward($filter);
        $data['tahun_akademik'] = $this->siswabaru_model->getTahunAkademik($filter);
        $this->load->view('laporan/excel_rewardadmin', $data);
    }

    public function lihat_ppdb($id)
    {
        $data['title'] = 'MY PPDB | Lihat PPDB';
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['ppdb'] = $this->siswabaru_model->getDataPpdb_lihat($id);
        $this->pagging('laporan/lihat_ppdb', $data);
    }

    //LAPORAN PPDB DI BAGIAN MEMBER
    public function ppdb_panitia()
    {
        $filter = $this->input->post('tahun_akademik');
        if (isset($filter)) {
            $data['title'] = 'MY PPDB | Laporan PPDB';
            $data['session'] = $this->db->get_where('panitia', ['id_panitia' => $this->session->userdata('id')])->row_array();
            $data['ppdb'] = $this->siswabaru_model->getPpdbPanitia_laporan($filter);
            $data['filter'] = $filter;
            $this->pagging('laporan/ppdb_panitia', $data);
        } else {
            $data['title'] = 'MY PPDB | Laporan PPDB';
            $data['session'] = $this->db->get_where('panitia', ['id_panitia' => $this->session->userdata('id')])->row_array();
            $data['ppdb'] = $this->siswabaru_model->getPpdbPanitia_laporan($filter = 9999);
            $data['filter'] = $filter;
            $this->pagging('laporan/ppdb_panitia', $data);
        }
    }

    public function print_ppdbPanitia()
    {
        $filter = $this->input->post('filter');
        $data['title'] = 'MY PPDB | Laporan PPDB';
        $data['session'] = $this->db->get_where('panitia', ['id_panitia' => $this->session->userdata('id')])->row_array();
        $data['ppdb'] = $this->siswabaru_model->getPpdbPanitia_laporan($filter);
        $data['tahun_akademik'] = $this->siswabaru_model->getTahunAkademik($filter);
        $this->load->view('laporan/print_ppdbpanitia', $data);
    }

    public function excel_ppdbpanitia()
    {
        $filter = $this->input->post('filter');
        $data['title'] = 'Laporan PPDB';
        $data['session'] = $this->db->get_where('panitia', ['id_panitia' => $this->session->userdata('id')])->row_array();
        $data['ppdb'] = $this->siswabaru_model->getPpdbPanitia_laporan($filter);
        $data['tahun_akademik'] = $this->siswabaru_model->getTahunAkademik($filter);
        $this->load->view('laporan/excel_ppdbpanitia', $data);
    }

    public function print_rewardPanitia()
    {
        $filter = $this->input->post('filter');
        $data['title'] = 'MY PPDB | Laporan Reward';
        $data['session'] = $this->db->get_where('panitia', ['id_panitia' => $this->session->userdata('id')])->row_array();
        $data['ppdb'] = $this->siswabaru_model->getDataReward_panitia($filter);
        $data['tahun_akademik'] = $this->siswabaru_model->getTahunAkademik($filter);
        $this->load->view('laporan/print_rewardpanitia', $data);
    }

    public function excel_rewardpanitia()
    {
        $filter = $this->input->post('filter');
        $data['title'] = 'Laporan Reward';
        $data['session'] = $this->db->get_where('member', ['id_member' => $this->session->userdata('id')])->row_array();
        $data['ppdb'] = $this->siswabaru_model->getDataReward_panitia($filter);
        $data['tahun_akademik'] = $this->siswabaru_model->getTahunAkademik($filter);
        $this->load->view('laporan/excel_rewardpanitia', $data);
    }

    //TAMPILAN LAPORAN REWARD DI BAGIAN MEMBER
    public function reward_panitia()
    {
        $filter = $this->input->post('tahun_akademik');
        if (isset($filter)) {
            $data['filter'] = $filter;
            $data['title'] = 'MY PPDB | Laporan Reward';
            $data['session'] = $this->db->get_where('panitia', ['id_panitia' => $this->session->userdata('id')])->row_array();
            $data['ppdb'] = $this->siswabaru_model->getDataReward_panitia($filter);
            $this->pagging('laporan/reward_panitia', $data);
        } else {
            $data['filter'] = $filter;
            $data['title'] = 'MY PPDB | Laporan Reward';
            $data['session'] = $this->db->get_where('member', ['id_member' => $this->session->userdata('id')])->row_array();
            $data['ppdb'] = $this->siswabaru_model->getDataReward_panitia($filter = 9999);

            $this->pagging('laporan/reward_panitia', $data);
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mengelola_ppdb extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('siswabaru_model');
    }


    //MENAMPILKAN DATA PPDB DI MENGELOLA PPDB (BAGIAN KESISWAAN)
    
    public function index()
    {
        $data['title'] = 'MY PPDB | Mengelola PPDB';
        $data['ppdb'] = $this->siswabaru_model->getDataPpdb();
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['kelurahan'] = $this->db->get('kelurahan')->result_array();
        $data['kecamatan'] = $this->db->get('kecamatan')->result_array();
        $this->pagging('mengelola_ppdb/data_ppdb', $data);
    }

    //MENAMPILKAN DATA DETAIL PPDB DI MENGELOLA PPDB (BAGIAN KESISWAAN)
    public function detail($id)
    {
        $data['title'] = 'MY PPPDB | Detail PPDB';
        $data['ppdb'] = $this->siswabaru_model->getDataPpdb_id($id);
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $this->pagging('mengelola_ppdb/detail_ppdb', $data);
    }

    //FUNGSI PRINT PADA MENGELOLA PANITIA (BAGIAN KESISWAAN)
    public function print_ppdb($id)
    {
        $data['title'] = 'MY PPDB | Print PPDB';
        $data['ppdb'] = $this->siswabaru_model->getDataPpdb_id($id);
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $this->load->view('mengelola_ppdb/print_ppdb', $data);
    }

    //FUNGSI UPDATE VERIFIKASI PPDB DI MENGELOLA PPDB
    public function update_verifikasi($id)
    {
        // $this->siswabaru_model->insert_reward($id);
        $this->siswabaru_model->update_verifikasi($id);
        $this->session->set_flashdata('message', ' Di Verifikasi');
        redirect('mengelola_ppdb');
    }
}

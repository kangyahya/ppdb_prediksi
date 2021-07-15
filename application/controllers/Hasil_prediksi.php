<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil_prediksi extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('siswabaru_model');
    }

     //LAPORAN PPDB DI BAGIAN KESISWAAN 
    public function domisili($filter = null)
    {
        $filter = $this->input->post('tahun_akademik');
        if (isset($filter)) {
            $data['title'] = 'MY PPDB | Laporan PPDB';
            $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
            $data['ppdb'] = $this->siswabaru_model->getDataPrediksi($filter);
            $cek = $this->db->get_where('ppdb',['tahun_akademik'=>$filter]);
            $cekmax = $this->db->select_max('tahun_akademik')->get('ppdb')->row();
            if($cek->num_rows() > 0){
                $max = $filter;
            }else{
                $max = $cekmax->tahun_akademik + 1;
            }

            $data['tot'] = $this->db->query("SELECT count(distinct tahun_akademik) as total FROM ppdb WHERE tahun_akademik = ? ",$filter)->row();
            $data['maxi'] = $this->db->query("SELECT count(no_form) as qty FROM ppdb WHERE tahun_akademik = ? ", $filter)->row();
            $data['filter'] = $filter;
            $this->pagging('hasil_prediksi/prediksi_domisili', $data);
        } else {
            $data['title'] = 'MY PPPDB | Laporan PPDB';
            $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
            $data['ppdb'] = $this->siswabaru_model->getDataPrediksi($filter = 9999);
            $data['filter'] = $filter;
            $this->pagging('hasil_prediksi/prediksi_domisili', $data);
        }
    }

    public function sekolah($id)
    {
        $data['title'] = 'MY PPDB | Lihat Prediksi Asal Sekolah';
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['ppdb'] = $this->siswabaru_model->getDataPrediksi($id);
        $this->pagging('hasil_prediksi/prediksi_sekolah', $data);
    }
    public function alur($id)
    {
        $data['title'] = 'MY PPDB | Lihat Prediksi Jalur Pendaftaran';
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['ppdb'] = $this->siswabaru_model->getDataPrediksi($id);
        $this->pagging('hasil_prediksi/prediksi_jalur', $data);
    }
}

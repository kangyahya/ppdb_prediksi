<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prediksi_model extends CI_Model
{
    public function getData()
    {
        $this->db->select('*');
        $this->db->from('ppdb');
        return $this->db->get()->result_array();
    }


    public function getData_id($id)
    {

        return $this->db->get_where('ppdb', ['no_form' => $id])->row_array();
    }


    public function getCodeByID($id)
    {
        $sql = $this->db->select("tanggal_mulai")->from("ppdb")->where("no_form", $id)->get();
        return $sql->row();
    }

    //UNTUK GET DATA LAPORAN BAGIAN ADMIN
    public function getDataPrediksi($filter)
    {
        $this->db->select('*');
        $this->db->from('ppdb');
        $this->db->join('panitia', 'ppdb.id_panitia = panitia.id_panitia');
        $this->db->join('sekolah', 'ppdb.id_sekolah = sekolah.id_sekolah');
        $this->db->where(['status_verifikasi' => 1, 'tahun_akademik' => $filter]);
        return $this->db->get()->result_array();
    }

}

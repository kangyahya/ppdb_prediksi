<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_model extends CI_Model
{
    public function getData()
    {
        $this->db->select('*');
        $this->db->from('jadwal');
        return $this->db->get()->result_array();
    }

    public function tambahData()
    {
        $data = [
            "tanggal_mulai" => $this->input->post('mulai', true),
            "tanggal_selesai" => $this->input->post('selesai', true),
            "tahapan" => $this->input->post('tahapan', true)
        ];

        $this->db->insert('jadwal', $data);
    }

    public function getData_id($id)
    {

        return $this->db->get_where('jadwal', ['id_jadwal' => $id])->row_array();
    }

    public function editData()
    {
        $data = [
            "tanggal_mulai" => $this->input->post('mulai', true),
            "tanggal_selesai" => $this->input->post('akhir', true),
            "tahapan" => $this->input->post('tahapan', true)
        ];

        $this->db->where('id_jadwal', $this->input->post('id'));
        $this->db->update('jadwal', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id_jadwal', $id);
        $this->db->delete('jadwal');
    }

    public function getCodeByID($id)
    {
        $sql = $this->db->select("tanggal_mulai")->from("jadwal")->where("id_jadwal", $id)->get();
        return $sql->row();
    }
}

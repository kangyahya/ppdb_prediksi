<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekolah_model extends CI_Model
{
    public function getData()
    {
        $this->db->select('*');
        $this->db->from('sekolah');
        return $this->db->get()->result_array();
    }

    public function tambahData()
    {
        $data = [
            "kode_sekolah" => $this->input->post('kode', true),
            "nama_sekolah" => $this->input->post('nama', true)
        ];

        $this->db->insert('sekolah', $data);
    }

    public function getData_id($id)
    {

        return $this->db->get_where('sekolah', ['id_sekolah' => $id])->row_array();
    }

    public function editData()
    {
        $data = [
            "kode_sekolah" => $this->input->post('kode', true),
            "nama_sekolah" => $this->input->post('nama', true)
        ];

        $this->db->where('id_sekolah', $this->input->post('id'));
        $this->db->update('sekolah', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id_sekolah', $id);
        $this->db->delete('sekolah');
    }

    public function getCodeByID($id)
    {
        $sql = $this->db->select("kode_sekolah")->from("sekolah")->where("id_sekolah", $id)->get();
        return $sql->row();
    }
}

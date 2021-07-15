<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends My_Controller
{
    public function index()
    {
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['title'] = 'MY PPDB | Informasi';
        $this->pagging('informasi/info_admin', $data);
    }

    public function informasi_member()
    {
        $data['session'] = $this->db->get_where('panitia', ['id_panitia' => $this->session->userdata('id')])->row_array();
        $data['title'] = 'MY PPDB | Informasi';
        $this->pagging('informasi/info_panitia', $data);
    }
}

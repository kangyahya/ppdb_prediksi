<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
    }
    public function pagging($content, $data = NULL)
    {

        $data['notifmasukverifikasi'] = $this->db->get_where('ppdb', ['status_verifikasi' => 1, 'id_panitia' => $this->session->userdata('id')])->num_rows();
        $data['notifmasuk'] = $this->db->get_where('ppdb', ['status_verifikasi' => 0])->num_rows();
        $data['notifmasukpanitia'] = $this->db->get_where('ppdb', ['status_verifikasi' => 0, 'id_panitia' => $this->session->userdata('id')])->num_rows();
        $data['header'] = $this->load->view('template/header', $data, TRUE);
        $data['leftmenu'] = $this->load->view('template/leftmenu', $data, TRUE);
        $data['content'] = $this->load->view($content, $data, TRUE);
        $data['footer'] = $this->load->view('template/footer', $data, TRUE);
        $this->load->view('template/index', $data);
    }
}

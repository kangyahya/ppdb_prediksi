<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends My_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('siswabaru_model');
	}

	//===========================================================
	//					DASHBOARD BAGIAN KESISWAAN
	//===========================================================
	public function index()
	{
		$data['jumlahsekolah'] = $this->db->get('sekolah')->num_rows();
		$data['belumterverifikasi'] = $this->db->get_where('ppdb', ['status_verifikasi' => 0])->num_rows();
		$data['jumlahpanitia'] = $this->db->get('panitia')->num_rows();
		$data['jumlahppdb'] = $this->db->get('ppdb')->num_rows();
		$data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
		$data['title'] = 'MY PPDB | Dashboard';
		$this->pagging('dashboard/admin', $data);
	}


	//===========================================================
	//					DASHBOARD BAGIAN PANITIA
	//===========================================================
	public function panitia()
	{
		$data['jumlahppdb'] = $this->db->get_where('ppdb', ['id_panitia' => $this->session->userdata('id')])->num_rows();
		$data['jumlahpanitia'] = $this->db->get_where('panitia', ['id_panitia' => $this->session->userdata('id')])->num_rows();
		$data['session'] = $this->db->get_where('panitia', ['id_panitia' => $this->session->userdata('id')])->row_array();
		$where = $this->session->userdata('id');
		$data['belumterverifikasi'] = $this->db->get_where('ppdb', ['status_verifikasi' => 0, 'id_panitia' => $where])->num_rows();
		//$data['reward'] = $this->reward_model->reward($where);
		$data['title'] = 'MY PPDB | Dashboard Panitia';
		$this->pagging('dashboard/panitia', $data);
	}
}

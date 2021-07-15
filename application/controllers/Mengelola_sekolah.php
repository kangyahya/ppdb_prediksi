<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mengelola_sekolah extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sekolah_model');
    }

    public function index()
    {
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['title'] = 'MY PPDB | Mengelola Sekolah';
        $data['sekolah'] = $this->sekolah_model->getData();
        $this->pagging('mengelola_sekolah/data_sekolah', $data);
    }

    public function tambah()
    {
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['title'] = 'MY PPDB | Tambah Sekolah';

        //set rules form validasi
        $this->form_validation->set_rules('kode', 'kode', 'required|numeric|min_length[3]|max_length[3]|is_unique[sekolah.kode_sekolah]|trim', [
            'required' => 'Jenis sekolah harus dipilih',
            'numeric' => 'Harus dalam format angka',
            'min_length' => 'Jumlah minimal 3 angka',
            'max_length' => 'Jumlah maksimal 3 angka',
            'is_unique' => 'Kode sudah dipakai'
        ]);

        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Nama sekolah tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('wilayah', 'wilayah', 'required|trim', [
            'required' => 'Wilayah harus dipilih'
        ]);

        //Jika form validasi salah
        if ($this->form_validation->run() == FALSE) {
            $this->pagging('mengelola_sekolah/tambah_sekolah', $data);

            //jika form validasi benar
        } else {
            $this->sekolah_model->tambahData();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Success!</h4> Data Berhasil Di Tambah</div>');
            redirect('mengelola_sekolah');
        }
    }

    public function edit($id)
    {
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['title'] = 'MY PPDB | Edit Sekolah';
        $data['sekolah'] = $this->sekolah_model->getData_id($id);

        //form_validasi 
        $this->form_validation->set_rules('kode', 'kode', 'required|numeric|min_length[3]|max_length[3]|trim', [
            'required' => 'Jenis sekolah harus dipilih',
            'numeric' => 'Harus dalam format angka',
            'min_length' => 'Jumlah minimal 3 angka',
            'max_length' => 'Jumlah maksimal 3 angka',
        ]);
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Nama sekolah tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('wilayah', 'wilayah', 'required|trim', [
            'required' => 'Wilayah harus dipilih'
        ]);

        //Jika form validasi salah
        if ($this->form_validation->run() == FALSE) {
            $this->pagging('mengelola_sekolah/edit_sekolah', $data);

            //jika form validasi benar
        } else {
            $this->sekolah_model->editData();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Success!</h4> Data Berhasil Di Edit</div>');
            redirect('mengelola_sekolah');
        }
    }

    public function hapus($id)
    {
        $this->sekolah_model->hapusData($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Success!</h4> Data Berhasil Di Hapus</div>');
        redirect('mengelola_sekolah');
    }
}

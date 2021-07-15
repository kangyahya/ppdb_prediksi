<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mengelola_jadwal extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jadwal_model');
    }

    public function index()
    {
        $data['session'] = $this->db->get_where('panitia', ['id_panitia' => $this->session->userdata('id')])->row_array(); //DIGUNAKAN UNTUK PROBLEM FOTO_MEMBER
        $data['title'] = 'MY PPDB | Mengelola Jadwal';
        $data['jadwal'] = $this->jadwal_model->getData();
        $this->pagging('mengelola_jadwal/data_jadwal', $data);
    }

    public function tambah()
    {
        $data['session'] = $this->db->get_where('panitia', ['id_panitia' => $this->session->userdata('id')])->row_array();
        $data['title'] = 'MY PPDB | Tambah Jadwal';

        //set rules form validasi
        $this->form_validation->set_rules('mulai', 'mulai', 'required|trim', [
            'required' => 'Tanggal mulai tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('selesai', 'selesai', 'required|trim', [
            'required' => 'Tanggal selesai harus dipilih'
        ]);
        $this->form_validation->set_rules('tahapan', 'tahapan', 'required|trim', [
            'required' => 'Tahapan selesai harus dipilih'
        ]);

        //Jika form validasi salah
        if ($this->form_validation->run() == FALSE) {
            $this->pagging('mengelola_jadwal/tambah_jadwal', $data);

            //jika form validasi benar
        } else {
            $this->jadwal_model->tambahData();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Success!</h4> Data Berhasil Di Tambah</div>');
            redirect('mengelola_jadwal');
        }
    }

    public function edit($id)
    {
        $data['session'] = $this->db->get_where('panitia', ['id_panitia' => $this->session->userdata('id')])->row_array();
        $data['title'] = 'MY PPDB | Edit Jadwal';
        $data['jadwal'] = $this->jadwal_model->getData_id($id);

        //form_validasi 
        $this->form_validation->set_rules('mulai', 'mulai', 'required|trim', [
            'required' => 'Tanggal mulai tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('selesai', 'selesai', 'required|trim', [
            'required' => 'Tanggal selesai harus dipilih'
        ]);
        $this->form_validation->set_rules('tahapan', 'tahapan', 'required|trim', [
            'required' => 'Tahapan selesai harus dipilih'
        ]);

        //Jika form validasi salah
        if ($this->form_validation->run() == FALSE) {
            $this->pagging('mengelola_jadwal/edit_jadwal', $data);

            //jika form validasi benar
        } else {
            $this->jadwal_model->editData();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Success!</h4> Data Berhasil Di Edit</div>');
            redirect('mengelola_jadwal');
        }
    }

    public function hapus($id)
    {
        $this->jadwal_model->hapusData($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Success!</h4> Data Berhasil Di Hapus</div>');
        redirect('mengelola_jadwal');
    }
}

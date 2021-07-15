<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mengelola_user extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    // INI UNTUK BAGIAN KESISWAAN
    public function index()
    {
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['title'] = 'MY PPDB | Mengelola User';
        $data['dosen'] = $this->user_model->getDataAdmin();
        $this->pagging('manajemen_user/data_admin', $data);
    }

    public function tambah_admin()
    {
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['title'] = 'MY PPDB | Tambah Administrator';

        //form validasi set rules
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[admin.email_admin]', [
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Harus di isi dengan format email',
            'is_unique' => 'Email sudah dipakai'
        ]);
        $this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[admin.username_admin]', [
            'required' => 'Username tidak boleh kosong',
            'is_unique' => 'Username sudah dipakai'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[3]', [
            'required' => 'Password harus di isi',
            'min_length' => 'Password terlalu pendek'
        ]);
        $this->form_validation->set_rules('telepon', 'telepon', 'required|numeric', [
            'required' => 'No Telepon tidak boleh kosong',
            'numeric' => 'Harus di isi dengan format angka'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == false) {
            $this->pagging('mengelola_user/tambah_admin', $data);

            //jika form validasi benar
        } else {
            $this->user_model->tambahDataAdmin();
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Success!</h4> Data Berhasil Di Tambahkan</div>');
            redirect('mengelola_user/index');
        }
    }

    public function edit_admin($id)
    {
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['title'] = 'MY PPDB | Edit Administrator';
        $data['admin'] = $this->user_model->getDataAdmin_id($id);

        //form validasi set rules
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email', [
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Harus di isi dengan format email'
        ]);
        $this->form_validation->set_rules('username', 'username', 'required|trim', [
            'required' => 'Username tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('telepon', 'telepon', 'required|numeric', [
            'required' => 'No Telepon tidak boleh kosong',
            'numeric' => 'Harus di isi dengan format angka'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == FALSE) {
            $this->pagging('mengelola_user/edit_admin', $data);

            //jika form validasi benar
        } else {
            $this->user_model->editDataAdmin();
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Success!</h4> Data Berhasil Di Edit</div>');
            redirect('mengelola_user/index');
        }
    }

    public function hapus_admin($id)
    {
        $this->user_model->hapusDataAdmin($id);
        $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Success!</h4> Data Berhasil Di Hapus</div>');
        redirect('mengelola_user/index');
    }

    public function detail_admin($id)
    {
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['title'] = 'MY PPDB | Detail Admin';
        $data['admin'] = $this->user_model->getDataAdmin_id($id);
        $this->pagging('mengelola_user/detail_admin', $data);
    }


    //INI UNTUK PANITIA
    public function panitia()
    {
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['title'] = 'MY PPDB | Mengelola Panitia';
        $data['panitia'] = $this->user_model->getDataPanitia();
        $this->pagging('mengelola_user/data_panitia', $data);
    }

    public function tambah_panitia()
    {
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['title'] = 'MY PPDB | Mengelola User';

        //form validasi set rules
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[panitia.username_panitia]', [
            'required' => 'Username tidak boleh kosong',
            'is_unique' => 'Username sudah dipakai'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[3]', [
            'required' => 'Password harus di isi',
            'min_length' => 'Password terlalu pendek'
        ]);
        $this->form_validation->set_rules('telepon', 'telepon', 'required|numeric|max_length[13]|min_length[8]', [
            'required' => 'No Telepon tidak boleh kosong',
            'numeric' => 'Harus di isi dengan format angka',
            'max_length' => 'Jumlah maksimal 13 angka',
            'min_length' => 'Jumlah minimal 8 angka'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == false) {
            $this->pagging('mengelola_user/tambah_panitia', $data);

            //jika form validasi benar
        } else {
            $this->user_model->tambahDataPanitia();
            $this->session->set_flashdata('message', ' Di Tambahkan');
            redirect('mengelola_user/panitia');
        }
    }

    public function edit_panitia($id)
    {
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['title'] = 'MY PPDB | Edit Panitia';
        $data['panitia'] = $this->user_model->getDataPanitia_id($id);

        //form validasi set rules
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('username', 'username', 'required|trim', [
            'required' => 'Username tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required|trim', [
            'required' => 'Jabatan tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('telepon', 'telepon', 'required|numeric|max_length[13]|min_length[8]', [
            'required' => 'No Telepon tidak boleh kosong',
            'numeric' => 'Harus di isi dengan format angka',
            'max_length' => 'Jumlah maksimal 13 angka',
            'min_length' => 'Jumlah minimal 8 angka'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == FALSE) {
            $this->pagging('mengelola_user/edit_panitia', $data);

            //jika form validasi benar
        } else {
            $this->user_model->editDataPanitia();
            $this->session->set_flashdata('message', ' Di Ubah');
            redirect('mengelola_user/panitia');
        }
    }

    public function hapus_panitia($id)
    {
        $this->user_model->hapusDataPanitia($id);
        $this->session->set_flashdata('message', ' Di Hapus');
        redirect('mengelola_user/panitia');
    }

    public function detail_panitia($id)
    {
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['title'] = 'MY PPDB | Detail Panitia';
        $data['panitia'] = $this->user_model->getDataPanitia_id($id);
        $this->pagging('mengelola_user/detail_panitia', $data);
    }
}

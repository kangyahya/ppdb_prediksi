<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $id = $this->session->userdata('id');
        $data['admin'] = $this->user_model->getDataAdmin_id($id);
        $data['title'] = 'MY PPDB | Profile';
        $this->pagging('profile/profile_admin', $data);
    }

    public function edit_admin()
    {
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $id = $this->session->userdata('id');
        $data['admin'] = $this->user_model->getDataAdmin_id($id);
        $data['title'] = 'MY PPDB | Profile';

        //form validasi set rules
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('username', 'username', 'required|trim', [
            'required' => 'Username tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('handphone', 'handphone', 'required|trim', [
            'required' => 'Handphone tidak boleh kosong'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == FALSE) {
            $this->pagging('profile/edit_admin', $data);

            //jika form validasi benar
        } else {
            $this->user_model->editProfileAdmin();
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Success!</h4> Profil Berhasil Di Edit</div>');
            redirect('profile');
        }
    }

    public function change_passwordAdmin()
    {
        $data['title'] = 'PPPDB SMPN 17 CIREBON | Edit Profil';
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $id = $this->session->userdata('id');
        $data['admin'] = $this->user_model->getDataAdmin_id($id);

        //form validasi set rules
        $this->form_validation->set_rules('pw_lama', 'pw_lama', 'required|trim', [
            'required' => 'Password lama tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('pw_baru', 'pw_baru', 'required|min_length[3]', [
            'required' => 'Password baru tidak boleh kosong',
            'min_length' => 'Harus di isi minimal 3 Karakter',
        ]);
        $this->form_validation->set_rules('pw_baru2', 'pw_baru2', 'required|min_length[3]|matches[pw_baru]', [
            'required' => 'Ulangi password tidak boleh kosong',
            'min_length' => 'Harus di isi minimal 3 Karakter',
            'matches' => 'Password tidak sama'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == FALSE) {
            $this->pagging('profile/edit_admin', $data);

            //jika form validasi benar
        } else {
            $password_lama = $this->input->post('pw_lama');
            $password_baru = $this->input->post('pw_baru');
            if (!password_verify($password_lama, $data['admin']['password_admin'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Salah!</h4> Password Lama Salah</div>');
                redirect('profile/edit_admin');
            } else {
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Salah!</h4> Password baru tidak boleh sama dengan yang lama</div>');
                    redirect('profile/edit_admin');
                } else {
                    //password OK
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                    $this->db->set('password_admin', $password_hash);
                    $this->db->where('id_admin', $this->session->userdata('id'));
                    $this->db->update('admin');

                    redirect('profile');
                }
            }
        }
    }

    public function profil_member()
    {
        $data['session'] = $this->db->get_where('member', ['id_member' => $this->session->userdata('id')])->row_array();
        $id = $this->session->userdata('id');
        $data['member'] = $this->user_model->getDataMember_id($id);
        $where = $this->session->userdata('id');

        $data['title'] = 'MY PPPDB | Profile';
        $this->pagging('profile/profile_member', $data);
    }

    public function edit_member()
    {
        $data['session'] = $this->db->get_where('member', ['id_member' => $this->session->userdata('id')])->row_array();
        $id = $this->session->userdata('id');
        $data['member'] = $this->user_model->getDataMember_id($id);
        $data['title'] = 'MY PPPDB | Profile';

        //form validasi set rules
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('handphone', 'handphone', 'required|trim', [
            'required' => 'Handphone tidak boleh kosong'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == FALSE) {
            $this->pagging('profile/edit_member', $data);

            //jika form validasi benar
        } else {
            $this->user_model->editProfileMember();
            redirect('profile/profil_member');
        }
    }

    public function change_passwordMember()
    {
        $data['title'] = 'PPPDB SMPN 17 CIREBON| Edit Profil';
        $data['session'] = $this->db->get_where('member', ['id_member' => $this->session->userdata('id')])->row_array();
        $id = $this->session->userdata('id');
        $data['member'] = $this->user_model->getDataMember_id($id);

        //form validasi set rules
        $this->form_validation->set_rules('pw_lama', 'pw_lama', 'required|trim', [
            'required' => 'Password lama tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('pw_baru', 'pw_baru', 'required|min_length[3]', [
            'required' => 'Password baru tidak boleh kosong',
            'min_length' => 'Harus di isi minimal 3 Karakter',
        ]);
        $this->form_validation->set_rules('pw_baru2', 'pw_baru2', 'required|min_length[3]|matches[pw_baru]', [
            'required' => 'Ulangi password tidak boleh kosong',
            'min_length' => 'Harus di isi minimal 3 Karakter',
            'matches' => 'Password tidak sama'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == FALSE) {
            $this->pagging('profile/edit_member', $data);

            //jika form validasi benar
        } else {
            $password_lama = $this->input->post('pw_lama');
            $password_baru = $this->input->post('pw_baru');
            if (!password_verify($password_lama, $data['member']['password_member'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Salah!</h4> Password Lama Salah</div>');
                redirect('profile/edit_member');
            } else {
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Salah!</h4> Password baru tidak boleh sama dengan yang lama</div>');
                    redirect('profile/edit_member');
                } else {
                    //password OK
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                    $this->db->set('password_member', $password_hash);
                    $this->db->where('id_member', $this->session->userdata('id'));
                    $this->db->update('member');

                    redirect('profile/profil_member');
                }
            }
        }
    }
}

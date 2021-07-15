<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'MY PPDB | Login';

        //SESSION
        if ($this->session->userdata('username')) {
            redirect('profile');
        }

        //form validasi set rules
        $this->form_validation->set_rules('username', 'username', 'required|trim', [
            'required' => 'Username tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required', [
            'required' => 'Password tidak boleh kosong'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == false) {
            $this->load->view('login/login_admin', $data);

            //jika form validasi benar
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $admin = $this->db->get_where('admin', ['username_admin' => $username])->row_array();

            //jika user ada
            if ($admin) {
                //cek password
                if (password_verify($password, $admin['password_admin'])) {
                    $data = [
                        'id'        => $admin['id_admin'],
                        'username'  => $admin['username_admin'],
                        'id_level'  => $admin['id_level'],
                        'nama'      => $admin['nama_admin'],
                        'foto'      => $admin['foto_admin']
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Password salah!</div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Akun ini tidak ada di database</div>');
                redirect('login');
            }
        }
    }

    public function panitia()
    {
        $data['title'] = 'MY PPDB | Login Panitia';

        //SESSION
        if ($this->session->userdata('username')) {
            redirect('profile');
        }

        //form validasi set rules
        $this->form_validation->set_rules('username', 'username', 'required|trim', [
            'required' => 'Username tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required', [
            'required' => 'Password tidak boleh kosong'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == false) {
            $this->load->view('login/login_panitia', $data);

            //jika form validasi benar
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $panitia = $this->db->get_where('panitia', ['username_panitia' => $username])->row_array();

            //jika user ada
            if ($panitia) {
                //cek password
                if (password_verify($password, $panitia['password_panitia'])) {
                    $data = [
                        'id'        => $panitia['id_panitia'],
                        'username'  => $panitia['username_panitia'],
                        'id_level'  => $panitia['id_level'],
                        'nama'      => $panitia['nama_panitia'],
                        'foto'      => $panitia['foto_panitia']
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard/panitia');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Password salah!</div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Akun ini tidak ada di database</div>');
                redirect('login');
            }
        }
    }

    public function logout_admin()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_level');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('foto');

        $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">
        Logout Berhasil!</div>');
        redirect('login');
    }

    public function logout_panitia()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_level');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('foto');

        $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">
        Logout Berhasil!</div>');
        redirect('login/panitia');
    }
}

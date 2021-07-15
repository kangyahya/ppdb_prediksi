<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    // ====================================================== //
    //                   INI UNTUK ADMIN CUY                  //
    //========================================================//

    public function getDataAdmin()
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->join('level', 'admin.id_level = level.id_level');
        return $this->db->get()->result_array();
    }

    public function tambahDataAdmin()
    {
        $data = [
            "nama_admin" => $this->input->post('nama', true),
            "email_admin" => $this->input->post('email', true),
            "username_admin" => $this->input->post('username', true),
            "password_admin" => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            "telepon_admin" => $this->input->post('telepon', true),
            "id_level" => 1,
            "tgl_buat" => time(),
            "foto_admin" => 'default.png'
        ];
        $this->db->insert('admin', $data);
    }

    public function getDataAdmin_id($id)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->join('level', 'admin.id_level = level.id_level');
        $this->db->where(['id_admin' => $id]);
        return $this->db->get()->row_array();
    }

    public function editDataAdmin()
    {
        $data = [
            "nama_admin" => $this->input->post('nama', true),
            "email_admin" => $this->input->post('email', true),
            "username_admin" => $this->input->post('username', true),
            "telepon_admin" => $this->input->post('telepon', true),
        ];

        $this->db->where('id_admin', $this->input->post('id'));
        $this->db->update('admin', $data);
    }

    public function hapusDataAdmin($id)
    {
        $this->db->where('id_admin', $id);
        $this->db->delete('admin');
    }

    public function editProfileAdmin()
    {
        $id_admin = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $telepon = $this->input->post('handphone');

        //cek jika ada gambar
        $upload_image = $_FILES['foto'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['file_name']       = $this->input->post('nama');
            $config['upload_path']   = './assets/dist/img/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {

                // upload foto dan edit di database
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto_admin', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        //update nama, email dan telepon
        $this->db->set('nama_admin', $nama);
        $this->db->set('username_admin', $username);
        $this->db->set('telepon_admin', $telepon);
        $this->db->where('id_admin', $id_admin);
        $this->db->update('admin');
    }


    // ====================================================== //
    //                   INI UNTUK PANITIA                  //
    //========================================================//

    public function getDataPanitia()
    {
        $this->db->select('*');
        $this->db->from('panitia');
        $this->db->join('level', 'panitia.id_level = level.id_level');
        return $this->db->get()->result_array();
    }

    //FUNGSI UNTUK MENAMBAHKAN PANITIA DIBAGIAN KESISWAAN
    public function tambahDataPanitia()
    {
        $data = [
            "nama_panitia" => $this->input->post('nama', true),
            "username_panitia" => $this->input->post('username', true),
            "password_panitia" => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            "jabatan" => $this->input->post('jabatan', true),
            "telepon_panitia" => $this->input->post('telepon', true),
            "id_level" => 2,
            "tgl_buat" => time(),
            "foto_panitia" => 'default.png'
        ];
        $this->db->insert('panitia', $data);
    }

    //FUNGSI UNTUK MENGAMBIL DATA UNTUK EDIT PANITIA
    public function getDataPanitia_id($id)
    {
        $this->db->select('*');
        $this->db->from('panitia');
        $this->db->join('level', 'panitia.id_level = level.id_level');
        $this->db->where(['id_panitia' => $id]);
        return $this->db->get()->row_array();
    }

    //FUNGSI UNTUK MENGEDIT DATA PANITIA DI BAGIAN KESISWAAN
    public function editDataPanitia()
    {
        $data = [
            "nama_panitia" => $this->input->post('nama', true),
            "username_panitia" => $this->input->post('username', true),
            "jabatan" => $this->input->post('jabatan', true),
            "telepon_panitia" => $this->input->post('telepon', true)
        ];

        $this->db->where('id_panitia', $this->input->post('id'));
        $this->db->update('panitia', $data);
    }

    //FUNGSI UNTUK MENGHAPUS DATA PANITIA DI BAGIAN KESISWAAN
    public function hapusDataPanitia($id)
    {
        $this->db->where('id_panitia', $id);
        $this->db->delete('panitia');
    }

    //FUNGSI UNTUK EDIT PROFIL DI BAGIAN PANITIA
    public function editProfilePanitia()
    {
        $id_panitia = $this->input->post('id');
        $nama = $this->input->post('nama');
        $telepon = $this->input->post('handphone');

        //cek jika ada gambar
        $upload_image = $_FILES['foto'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '6144';
            $config['file_name']       = $this->input->post('nama');
            $config['upload_path']   = './assets/dist/img/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {

                // upload foto dan edit di database
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto_panitia', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        //update nama, email dan telepon
        $this->db->set('nama_panitia', $nama);
        $this->db->set('telepon_panitia', $telepon);
        $this->db->where('id_panitia', $id_panitia);
        $this->db->update('panitia');
    }
}

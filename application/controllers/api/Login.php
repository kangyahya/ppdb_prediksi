<?php defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
class Login extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index_post()
    {
        $data = [];
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');
        $panitia    = $this->db->get_where('panitia', ['username_panitia' => $username])->row_array();

        //jika user ada
        if ($panitia) {
            //cek password
            if (password_verify($password, $panitia['password_panitia'])) {

                $data = [
                    'id'    => $panitia['id_panitia'],
                    'nama'  => $panitia['nama_panitia'],
                    'foto'  => $panitia['foto_panitia']
                ];
                $template = [
                    'code' => 200,
                    'message' => "sukses", 'data' => $data
                ];

                $this->response($template);
            } else {
                $template = [
                    'code' => 400,
                    'message' => "password salah"
                ];
                $this->response($template);
            }
        } else {
            $template = [
                'code' => 400,
                'message' => "Username salah"
            ];
            $this->response($template);
        }
    }
}

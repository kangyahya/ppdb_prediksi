<?php defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
class Jalur_pendaftaran extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index_get()
    {
        $this->db->select('*');
        $this->db->from('jalur_pendaftaran');
        $data = $this->db->get()->result_array();

        $template = [
            'code' => 200,
            'message' => "sukses", 'data' => $data,
        ];
        $this->response($template, 200);
    }
}

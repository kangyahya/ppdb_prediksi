<?php defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
class Ppdb extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('siswabaru_model');
    }

    function index_post()
    {
        $config['upload_path']          = './upload/berkas';
        $config['allowed_types']        = 'rar|zip|jpg|png|jpeg';
        $config['max_size']             = 6144;
        $config['file_name']            = $this->input->post('nama');
        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($this->upload->do_upload('berkas')) {
            $berkas =  $this->upload->data('file_name');
            $config['upload_path'] = './upload/pasfoto/';
            $this->upload->initialize($config);
            $this->upload->do_upload('foto');
            $foto =  $this->upload->data('file_name');

            // NO FORM
            $id_jalur       =   $this->input->post('id_jalur');
            $id_sekolah     =   $this->input->post('sekolah');
            $id_kelurahan   =   $this->input->post('kelurahan');
            $id_kecamatan   =   $this->input->post('kecamatan');
            $no_form        =   $this->main_lib->no_form($id_jalur, $id_sekolah, $id_kelurahan, $id_kecamatan);

            $data = [
                "no_form" => $no_form,
                "tahun_akademik"    =>  $this->input->post('tahun_akademik', true),
                "nama_siswa"        =>  $this->input->post('nama', true),
                "id_sekolah"        =>  $this->input->post('sekolah', true),
                "id_jalur"          =>  $this->input->post('jalur_pendaftaran',true),
                "id_kelurahan"      =>  $this->input->post('kelurahan',true),
                "id_kecamatan"      =>  $this->input->post('kecamatan',true),
                "foto_siswa"        =>  $foto,
                "tanggal_daftar"    =>  date('Y-m-d'),
                "id_member"         =>  $this->input->post('id_member'),
                "status_verifikasi" => 0,
                "berkas_pendaftar"  => $berkas,
            ];
            $this->db->insert('ppdb', $data);
            $template = [
                'code' => 200,
                'message' => "sukses", 'data' => $data
            ];
            $this->response($template);
        } else {
            $template = [
                'code' => 400,
                'message' => "Upload Gagal " . $this->upload->display_errors()
            ];
            $this->response($template);
        }
    }

    function index_get()
    {
        $id_panitia = $this->get('id_panitia');
        if ($id_panitia == "") {
            $this->db->select('*');
            $this->db->from('ppdb');
            $this->db->join('sekolah', 'ppdb.id_sekolah = sekolah.id_sekolah');
            $this->db->join('panitia', 'ppdb.id_panitia = panitia.id_panitia');
            $this->db->join('jalur_pendaftaran', 'ppdb.id_jalur = jalur_pendaftaran.id_jalur');
            $this->db->join('kelurahan', 'ppdb.id_kelurahan = kelurahan.id_kelurahan');
            $this->db->join('kecamatan', 'ppdb.id_kecamatan = kecamatan.id_kecamatan');
            $data = $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('ppdb');
            $this->db->join('sekolah', 'ppdb.id_sekolah = sekolah.id_sekolah');
            $this->db->join('jalur_pendaftaran', 'ppdb.id_jalur = jalur_pendaftaran.id_jalur');
            $this->db->join('panitia', 'ppdb.id_panitia = panitia.id_panitia');
            $this->db->join('kelurahan', 'ppdb.id_kelurahan = kelurahan.id_kelurahan');
            $this->db->join('kecamatan', 'ppdb.id_kecamatan = kecamatan.id_kecamatan');
            $this->db->where(['ppdb.id_panitia' => $id_panitia]);
            $data = $this->db->get()->result_array();
        }

        $template = [
            'code' => 200,
            'message' => "sukses", 'data' => $data
        ];
        $this->response($template, 200);
    }
}

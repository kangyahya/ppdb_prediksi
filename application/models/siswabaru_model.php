<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswabaru_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('siswabaru_model');
    }

    //UNTUK DITAMPILKAN DI TABEL BAGIAN KESISWAAN
    public function getDataPpdb()
    {
        $this->db->select('*');
        $this->db->from('ppdb');
        $this->db->join('sekolah', 'ppdb.id_sekolah = sekolah.id_sekolah');
        $this->db->join('jalur_pendaftaran', 'ppdb.id_jalur = jalur_pendaftaran.id_jalur');
        $this->db->join('kelurahan', 'ppdb.id_kelurahan = kelurahan.id_kelurahan');
        $this->db->join('kecamatan', 'ppdb.id_kecamatan = kecamatan.id_kecamatan');
        $this->db->join('panitia', 'ppdb.id_panitia = panitia.id_panitia');
        $this->db->order_by('no_form');
        return $this->db->get()->result_array();
    }

    //UNTUK GET DATA LAPORAN BAGIAN KESISWAAN
    public function getDataPpdb_laporan($filter)
    {
        $this->db->select('*');
        $this->db->from('ppdb');
        $this->db->join('panitia', 'ppdb.id_panitia = panitia.id_panitia');
        $this->db->join('sekolah', 'ppdb.id_sekolah = sekolah.id_sekolah');
        $this->db->where(['status_verifikasi' => 1, 'tahun_akademik' => $filter]);
        return $this->db->get()->result_array();
    }

    //UNTUK GET DATA LAPORAN BAGIAN KESISWAAN
    public function getTahunAkademik($filter)
    {
        $this->db->select('*');
        $this->db->from('ppdb');
        $this->db->where(['status_verifikasi' => 1, 'tahun_akademik' => $filter]);
        return $this->db->get()->row_array();
    }

    //UNTUK GET DATA LAPORAN BAGIAN PANITIA
    public function getPpdbPanitia_laporan($filter)
    {
        $this->db->select('*');
        $this->db->from('ppdb');
        $this->db->join('panitia', 'ppdb.id_panitia = panitia.id_panitia');
        $this->db->where(['status_verifikasi' => 1, 'tahun_akademik' => $filter, 'panitia.id_panitia' => $this->session->userdata('id')]);
        return $this->db->get()->result_array();
    }

    //UNTUK DITAMPILKAN DI TABEL PANITIA
    public function getDataPpdb_panitia()
    {
        $this->db->select('*');
        $this->db->from('ppdb');
        $this->db->join('sekolah', 'ppdb.id_sekolah = sekolah.id_sekolah');
        $this->db->join('jalur_pendaftaran', 'ppdb.id_jalur = jalur_pendaftaran.id_jalur');
        $this->db->join('kelurahan', 'ppdb.id_kelurahan = kelurahan.id_kelurahan');
        $this->db->join('kecamatan', 'ppdb.id_kecamatan = kecamatan.id_kecamatan');
        $this->db->join('panitia', 'ppdb.id_panitia = panitia.id_panitia');
        $this->db->where(['ppdb.id_panitia' => $this->session->userdata('id')]);
        return $this->db->get()->result_array();
    }


    //UNTUK TAMBAH PENDAFTAR DI PANITIA
    public function tambahDataPpdb()
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
            $id_jalur = $this->input->post('jalur_pendaftaran');
            $id_sekolah = $this->input->post('sekolah');
            $id_kelurahan = $this->input->post('kelurahan');
            $id_kecamatan = $this->input->post('kecamatan');
            $no_form = $this->main_lib->no_form($id_jalur, $id_sekolah, $id_kelurahan, $id_kecamatan);

            $data = [
                "no_form"           => $no_form,
                "tahun_akademik"    => $this->input->post('tahun_akademik', true),
                "nama_siswa"        => $this->input->post('nama', true),
                "jenis_kelamin"     => $this->input->post('jenis', true),
                "tempat_lahir"      => $this->input->post('tempat', true),
                "tgl_lahir"         => $this->input->post('tgl', true),
                "agama"             => $this->input->post('agama', true),
                "alamat_siswa"      => $this->input->post('alamat', true),
                "id_kelurahan"      => $this->input->post('kel', true),
                "rt"                => $this->input->post('rt', true),
                "rw"                => $this->input->post('rw', true),
                "id_kecamatan"      => $this->input->post('kec', true),
                "id_sekolah"        => $this->input->post('sekolah', true),
                "id_jalur"          => $this->input->post('jalur', true),
                "foto_siswa"        => $foto,
                "tanggal_daftar"    => date('Y-m-d'),
                "id_panitia"         => $this->session->userdata('id'),
                "status_verifikasi" => 0,
                "berkas_pendaftar"  => $berkas,
            ];
            $this->db->insert('ppdb', $data);
        } else {
            $this->session->set_flashdata('message', $this->upload->display_errors());
            redirect('ppdb/tambah_ppdb');
        }
    }

    //INI UNTUK TAMPILIN DI DETAIL
    public function getDataPpdb_id($id)
    {
        $this->db->select('*');
        $this->db->from('ppdb');
        $this->db->join('sekolah', 'ppdb.id_sekolah = sekolah.id_sekolah');
        $this->db->join('jalur_pendaftaran', 'ppdb.id_jalur = jalur_pendaftaran.id_jalur');
        $this->db->where(['no_form' => $id]);
        return $this->db->get()->row_array();
    }

    //INI UNTUK TAMPILIN DI EDIT PPDB PANITIA
    public function getEditPpdb_id($id)
    {
        return $this->db->get_where('ppdb', ['no_form' => $id])->row_array();
    }

    //PROSES EDIT PPDB
    public function EditDataPpdb()
    {
        // NO FORM
            $id_jalur = $this->input->post('jalur_pendaftaran');
            $id_sekolah = $this->input->post('sekolah');
            $no_form = $this->main_lib->no_form($id_jalur, $id_sekolah);

        $data = [
            "tahun_akademik"    => $this->input->post('tahun_akademik', true),
            "nama_siswa"        => $this->input->post('nama', true),
            "jenis_kelamin"     => $this->input->post('jenis', true),
            "tempat_lahir"      => $this->input->post('tempat', true),
            "tgl_lahir"         => $this->input->post('tgl', true),
            "agama"             => $this->input->post('agama', true),
            "id_domisili"       => $this->input->post('domisili', true),
            "no_kk"             => $this->input->post('kk', true),
            "no_induk"          => $this->input->post('induk', true),
            "tgl_terbit"        => $this->input->post('tgl', true),
            "alamat_siswa"      => $this->input->post('alamat', true),
            "id_kelurahan"      => $this->input->post('kel', true),
            "rt"                => $this->input->post('rt', true),
            "rw"                => $this->input->post('rw', true),
            "id_kecamatan"      => $this->input->post('kec', true),
            "id_sekolah"        => $this->input->post('sekolah', true),
            "id_jalur"          => $this->input->post('jalur', true)
        ];

        $this->db->where('no_form', $this->input->post('no_form'));
        $this->db->update('ppdb', $data);
    }

    public function hapusDataPpdb($id)
    {
        $this->db->where('no_form', $id);
        $this->db->delete('ppdb');
    }

    public function update_verifikasi($id)
    {
        $data = [
            "status_verifikasi" => 1
        ];
        $this->db->where(['no_form' => $id]);
        $this->db->update('ppdb', $data);
    }

    public function last_code($id_jalur, $id_sekolah)
    {
        $sql = $this->db->select_max('no_form')->where('id_sekolah', $id_sekolah)->where('id_jalur', $id_jalur)->get('ppdb');
        return $sql->row()->no_form;
    }

    public function getPpdb_excel($filter)
    {
        $this->db->select('*');
        $this->db->from('ppdb');
        $this->db->join('panitia', 'ppdb.id_panitia = panitia.id_panitia');
        $this->db->join('sekolah', 'ppdb.id_sekolah = sekolah.id_sekolah');
        $this->db->where(['status_verifikasi' => 1, 'tahun_akademik' => $filter]);
        return $this->db->get()->result_array();
    }

      //UNTUK GET DATA LAPORAN BAGIAN KESISWAAN
    public function getDataPrediksi($filter)
    {
        $this->db->select('*');
        $this->db->from('ppdb');
        $this->db->join('kecamatan', 'ppdb.id_kecamatan = kecamatan.id_kecamatan');
        $this->db->join('kelurahan', 'ppdb.id_kelurahan = kelurahan.id_kelurahan');
        $this->db->join('panitia', 'ppdb.id_panitia = panitia.id_panitia');
        $this->db->join('sekolah', 'ppdb.id_sekolah = sekolah.id_sekolah');
        $this->db->where(['status_verifikasi' => 1, 'tahun_akademik' => $filter]);
        return $this->db->get()->result_array();
    }
    public function import_data_ppdb($data)
    {
        $insert = $this->db->insert_batch('ppdb', $data);
        if($insert){
            return true;
        }
    }
}

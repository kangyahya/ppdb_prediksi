<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppdb extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('siswabaru_model');
    }

// ====================================================== //
//                   INI UNTUK PANITIA                  //
//========================================================//

    //MENAMPILKAN DATA PERSERTA DIDIK BARU
    public function index()
    {
        $data['session'] = $this->db->get_where('panitia', ['id_panitia' => $this->session->userdata('id')])->row_array();
        $data['ppdb'] = $this->siswabaru_model->getDataPpdb_panitia();
        $data['title'] = 'MY PPDB | PPDB';
        $this->pagging('ppdb/data_ppdb', $data);
    }

    //FUNGSI UNTUK TAMBAH DATA PERSERTA DIDIK BARU
    public function tambah_ppdb()
    {
        $data['session'] = $this->db->get_where('panitia', ['id_panitia' => $this->session->userdata('id')])->row_array();
        $data['sekolah'] = $this->db->get('sekolah')->result_array();
        $data['jalur_pendaftaran'] = $this->db->get('jalur_pendaftaran')->result_array();
        $data['kelurahan'] = $this->db->get('kelurahan')->result_array();
        $data['kecamatan'] = $this->db->get('kecamatan')->result_array();
        $data['title'] = 'MY PPDB | Tambah PPDB';

        //form validasi set rules
        $this->form_validation->set_rules('tahun_akademik', 'tahun_akademik', 'required|trim', [
            'required' => 'Tahun Akademik Siswa Tidak Boleh Kosong'
        ]);
       
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Nama Siswa Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('jenis', 'jenis', 'required|trim', [
            'required' => 'Pilih Jenis Kelamin'
        ]);
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Nama Siswa Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('tempat', 'tempat', 'required|trim', [
            'required' => 'Tempat Lahir Siswa Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('agama', 'agama', 'required|trim', [
            'required' => 'Agama Siswa Tidak Boleh Kosong'
        ]);

        //$this->form_validation->set_rules('umur', 'umur', 'required|trim|less_than_equal_to[20]', [
            //'required' => 'Umur Siswa Tidak Boleh Kosong',
            //'less_than_equal_to' => 'Batas umur Tidak Boleh Lebih Dari 20 tahun'
        //]);
        
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
            'required' => 'Alamat Siswa Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('rt', 'rt', 'required|trim', [
            'required' => 'RT Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('rw', 'rw', 'required|trim', [
            'required' => 'RW Tidak Boleh Kosong'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == false) {
            $this->pagging('ppdb/tambah_ppdb', $data);

            //jika form validasi benar
        } else {

            $this->siswabaru_model->tambahDataPpdb();
            $this->session->set_flashdata('message', ' Di Tambahkan');
            redirect('ppdb');
        }
    }

    //FUNGSI DROPFDOWN SEKOLAH
    public function change_sekolah()
    {
        $jenis = $this->db->get_where('sekolah', ['id_jenissekolah' => $this->input->post('jenis_sekolah')])->result_array();
        echo '<option> Pilih Sekolah </option>';
        foreach ($jenis as $j) {
            echo '<option value="' . $j['id_sekolah'] . '">' . $j['nama_sekolah'] . '</option>';
        }
    }
    
    //FUNGSI DROPFDOWN JALUR PPDB
    public function change_jalur()
    {
        $jenis = $this->db->get_where('jalur_pendaftaran', ['id_namajalur' => $this->input->post('jenis_jalur')])->result_array();
        echo '<option> Pilih Jalur </option>';
        foreach ($jenis as $j) {
            echo '<option value="' . $j['id_jalur'] . '">' . $j['nama_jalur'] . '</option>';
        }
    }

    //FUNGSI DROPFDOWN KELURAHAN
    public function change_kelurahan()
    {
        $jenis = $this->db->get_where('kelurahan', ['id_kelurahan' => $this->input->post('jenis_kelurahan')])->result_array();
        echo '<option> Pilih Kelurahan </option>';
        foreach ($jenis as $a) {
            echo '<option value="' . $j['id_kelurahan'] . '">' . $a['kelurahan'] . '</option>';
        }
    }

    //FUNGSI DROPFDOWN KECAMATAN
    public function change_kecamatan()
    {
        $jenis = $this->db->get_where('kecamatan', ['id_kecamatan' => $this->input->post('jenis_kecamatan')])->result_array();
        echo '<option> Pilih Kecamatan </option>';
        foreach ($jenis as $b) {
            echo '<option value="' . $j['id_kecamatan'] . '">' . $b['kecamatan'] . '</option>';
        }
    }


    //FUNGSI UNTUK EDIT DATA PERSERTA DIDIK BARU
    public function edit($id)
    {
        $data['title'] = 'MY PPDB | Edit PPDB';
        $data['ppdb'] = $this->siswabaru_model->getEditPpdb_id($id);
        $data['sekolah'] = $this->db->get('sekolah')->result_array();
        $data['jalur_pendaftaran'] = $this->db->get('jalur_pendaftaran')->result_array();
        $data['kelurahan'] = $this->db->get('kelurahan')->result_array();
        $data['kecamatan'] = $this->db->get('kecamatan')->result_array();

        $data['session'] = $this->db->get_where('panitia', ['id_panitia' => $this->session->userdata('id')])->row_array();

        //form validasi set rules
        $this->form_validation->set_rules('tahun_akademik', 'tahun_akademik', 'required|trim', [
            'required' => 'Tahun Akademik Siswa Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('nomor', 'nomor', 'required|trim', [
            'required' => 'NISN Siswa Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Nama Siswa Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('jenis', 'jenis', 'required|trim', [
            'required' => 'Pilih Jenis Kelamin'
        ]);
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Nama Siswa Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('tempat', 'tempat', 'required|trim', [
            'required' => 'Tempat Lahir Siswa Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('agama', 'agama', 'required|trim', [
            'required' => 'Agama Siswa Tidak Boleh Kosong'
        ]);
        
        $this->form_validation->set_rules('kk', 'kk', 'required|trim', [
            'required' => 'Nomor KK Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('tgl', 'tgl', 'required|trim', [
            'required' => 'Tanggal Terbit KK Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
            'required' => 'Alamat Siswa Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('kel', 'kel', 'required|trim', [
            'required' => 'Kelurahan/Desa Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('rt', 'rt', 'required|trim', [
            'required' => 'RT Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('rw', 'rw', 'required|trim', [
            'required' => 'RW Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('kec', 'kec', 'required|trim', [
            'required' => 'Tanggal Terbit KK Tidak Boleh Kosong'
        ]);
      
        //jika form validasi salah
        if ($this->form_validation->run() == false) {
            $this->pagging('ppdb/edit_ppdb', $data);

            //jika form validasi benar
        } else {
            $this->siswabaru_model->editDataPpdb();
            $this->session->set_flashdata('message', ' Di Ubah');
            redirect('ppdb');
        }
    }

    public function hapus($id)
    {
        $this->siswabaru_model->hapusDataPpdb($id);
        $this->session->set_flashdata('message', ' Di Hapus');
        redirect('ppdb');
    }

    public function detail($id)
    {
        $data['title'] = 'MY PPDB | Detail PPDB';
        $data['ppdb'] = $this->siswabaru_model->getDataPpdb_id($id);
        $data['session'] = $this->db->get_where('panitia', ['id_panitia' => $this->session->userdata('id')])->row_array();
        $this->pagging('ppdb/detail_ppdb', $data);
    }

    public function import_data_ppdb(){
        if (isset($_FILES['fileExcel']["name"])) {
            $path = $_FILES['fileExcel']['tmp_name'];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for($row=2; $row<=$highestRow; $row++)
                {
                    $tahun_akademik = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $nama_siswa = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $jenis_kelamin = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $tempat_lahir = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $tgl_lahir = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $agama = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $alamat_siswa = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $id_kelurahan = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $rt = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $rw = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $id_kecamatan = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                    $id_sekolah = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                    $id_jalur = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                    $no_form = $this->main_lib->no_form($id_jalur, $id_sekolah, $id_kelurahan, $id_kecamatan);
                    $temp_data[] = array(
                        'no_form' => $no_form,
                        'tahun_akademik'  => $tahun_akademik,
                        'nama_siswa'   => $nama_siswa,
                        'jenis_kelamin'  => $jenis_kelamin,
                        'tempat_lahir' => $tempat_lahir,
                        'tgl_lahir' => $tgl_lahir,
                        'agama' => $agama,
                        'alamat_siswa' => $alamat_siswa,
                        'id_kelurahan' => $id_kelurahan,
                        'rt' => $rt,
                        'rw' => $rw,
                        'id_kecamatan' => $id_kecamatan,
                        'id_sekolah' => $id_sekolah,
                        'id_jalur' => $id_jalur,
                        "tanggal_daftar"    => date('Y-m-d'),
                        "id_panitia"         => $this->session->userdata('id'),
                        "status_verifikasi" => 0,
                    );  
                }
            }
            $this->siswabaru_model->import_data_ppdb($temp_data);
            $this->session->set_flashdata('message', ' Di Ubah');
            redirect('ppdb');
        }
    }
}

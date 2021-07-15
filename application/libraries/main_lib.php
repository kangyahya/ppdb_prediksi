<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Main_lib
{
    protected $ci;
    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function no_form($id_jalur, $id_sekolah, $id_kelurahan, $id_kecamatan)
    {
        $tahun = date('Y'); //2019
        $tahun = str_replace("20", "", $tahun); //19


        //date_default_timezone_set('Asia/Karachi'); # add your city to set local time zone
        $now = now('Asia/Jakarta');

        //Id sekolah
        $sekolah = $this->ci->sekolah_model->getCodeByID($id_sekolah);
        $kode_sekolah = $sekolah->kode_sekolah;

        $nomor_urut = $this->ci->siswabaru_model->last_code($id_jalur, $id_sekolah, $id_kelurahan, $id_kecamatan);
        $nomor_urut = substr(floatval($nomor_urut), -3, 3) + 1;
        $add_str = "";
        if (strlen($nomor_urut) == 1) {
            $add_str = "00";
        } elseif (strlen($nomor_urut) == 2) {
            $add_str = "0";
        } else {
            $add_str = "";
        }

        $nomor_urut = $add_str . $nomor_urut;

        //19_1_101_001
        $no_form = $tahun . $id_jalur . $kode_sekolah . $id_kelurahan . $id_kecamatan . $nomor_urut . $now;

        return $no_form;
    }
}

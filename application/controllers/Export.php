<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Export extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('prediksi_model');
        $this->load->model('user_model');
        $this->load->model('siswabaru_model');
        $this->load->library(['form_validation', 'pdflib', 'excellib']);
    }

    public function excel_ppdbadmin()
    {
        $filename = 'LAPORAN PPDB';
        $objPHPExcel = new PHPExcel();
        $activeSheet = $objPHPExcel->getActiveSheet();
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setTitle($filename);

        //Formating MergeCells
        $activeSheet->mergeCells('A1:H2');

        //Style center
        $centerAlign = array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        );

        $activeSheet->getStyle('A1')->getAlignment()->applyFromArray($centerAlign);
        $activeSheet->getStyle('A3')->getAlignment()->applyFromArray($centerAlign);
        $activeSheet->getStyle('A')->getAlignment()->applyFromArray($centerAlign);
        $activeSheet->getStyle('B')->getAlignment()->applyFromArray($centerAlign);
        $activeSheet->getStyle('C')->getAlignment()->applyFromArray($centerAlign);
        $activeSheet->getStyle('D')->getAlignment()->applyFromArray($centerAlign);
        $activeSheet->getStyle('E')->getAlignment()->applyFromArray($centerAlign);
        $activeSheet->getStyle('F')->getAlignment()->applyFromArray($centerAlign);
        $activeSheet->getStyle('G')->getAlignment()->applyFromArray($centerAlign);
        $activeSheet->getStyle('H')->getAlignment()->applyFromArray($centerAlign);

        //Color bg and text
        //$activeSheet->getStyle('A3:G3')
        //->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        //->getStartColor()
        //->setARGB('0000AEEF'); //WARNA BACKGROUND BIRU

        $activeSheet->getStyle('A3:H3')
            ->getFont()
            ->getColor()
            ->setARGB(PHPExcel_Style_Color::COLOR_BLACK);

        //Height and Width
        /* Height */
        $activeSheet->getRowDimension('3')->setRowHeight(30);

        /* Width */
        $activeSheet->getColumnDimension('A')->setAutoSize(true);
        $activeSheet->getColumnDimension('B')->setAutoSize(true);
        $activeSheet->getColumnDimension('C')->setAutoSize(true);
        $activeSheet->getColumnDimension('D')->setAutoSize(true);
        $activeSheet->getColumnDimension('E')->setAutoSize(true);
        $activeSheet->getColumnDimension('F')->setAutoSize(true);
        $activeSheet->getColumnDimension('G')->setAutoSize(true);
        $activeSheet->getColumnDimension('H')->setAutoSize(true);

        //Style Font
        $activeSheet->getStyle('A1')->getFont()->setSize(14);
        $activeSheet->getStyle('A1:A2')->getFont()->setBold(true);
        $activeSheet->getStyle('A3:H3')->getFont()->setBold(true);

        //Value of cell
        $activeSheet->setCellValue('A1', "LAPORAN PPDB");

        //Value table
        $activeSheet->setCellValue('A3', "No.");
        $activeSheet->setCellValue('B3', "No Form");
        $activeSheet->setCellValue('C3', "Nama Siswa");
        $activeSheet->setCellValue('D3', "Asal Sekolah");
        //$activeSheet->setCellValue('E3', "Prodi");
        $activeSheet->setCellValue('F3', "Member");
        $activeSheet->setCellValue('G3', "Tahun Akademik");
        $activeSheet->setCellValue('H3', "Tanggal Daftar");

        //Resource Data from database
        $filter = $this->input->post('filter');
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['ppdb'] = $this->siswabaru_model->getPpdb_excel($filter);
        $data['tahun_akademik'] = $this->siswabaru_model->getTahunAkademik($filter);

        //Count Total daata
        $total_count = count($data['ppdb']);
        $data = $data['ppdb'];
        $total_row = 5 + $total_count;
        $no = 1;

        /* Start Looping data from database! */
        $i = 4;
        for ($j = 0; $j < $total_count; $j++) {
            $activeSheet->setCellValue('A' . $i, $no++);
            $activeSheet->setCellValue('B' . $i, $data[$j]['no_form']);
            $activeSheet->setCellValue('C' . $i, $data[$j]['nama_siswa']);
            $activeSheet->setCellValue('D' . $i, $data[$j]['nama_sekolah']);
            $activeSheet->setCellValue('F' . $i, $data[$j]['nama_panitia']);
            $activeSheet->setCellValue('G' . $i, $data[$j]['tahun_akademik']);
            $activeSheet->setCellValue('H' . $i, $data[$j]['tanggal_daftar']);
            $i++;
        }

        $activeSheet->getPageSetup()
            ->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        $activeSheet->getPageSetup()
            ->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);

        /* Border Style */
        $arrayStyle = array(
            'borders' => array(
                'outline' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000')
                ),
                'top' =>  array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000')
                ),
                'bottom' =>  array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000')
                ),
                'left' =>  array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000')
                ),
                'right' =>  array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000')
                ),
                'vertical' =>  array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000')
                ),
                'horizontal' =>  array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000')
                ),
                'allborders' =>  array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000')
                ),
            )
        );

        $i = $i - 1;
        $activeSheet->getStyle('A3:H' . $i)->applyFromArray($arrayStyle);

        /*//*/
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        //ubah nama file saat diunduh
        header("Content-Disposition: attachment;filename='" . $filename . ".xlsx");
        //unduh file
        $objWriter->save("php://output");
        //*/
    }

    public function excel_rewardadmin()
    {
        $filename = 'LAPORAN REWARD';
        $objPHPExcel = new PHPExcel();
        $activeSheet = $objPHPExcel->getActiveSheet();
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setTitle($filename);

        //Formating MergeCells
        $activeSheet->mergeCells('A1:G2');

        //Style center
        $centerAlign = array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        );

        $activeSheet->getStyle('A1')->getAlignment()->applyFromArray($centerAlign);
        $activeSheet->getStyle('A3')->getAlignment()->applyFromArray($centerAlign);
        $activeSheet->getStyle('A')->getAlignment()->applyFromArray($centerAlign);
        $activeSheet->getStyle('B')->getAlignment()->applyFromArray($centerAlign);
        $activeSheet->getStyle('C')->getAlignment()->applyFromArray($centerAlign);
        $activeSheet->getStyle('D')->getAlignment()->applyFromArray($centerAlign);
        $activeSheet->getStyle('E')->getAlignment()->applyFromArray($centerAlign);
        $activeSheet->getStyle('F')->getAlignment()->applyFromArray($centerAlign);
        $activeSheet->getStyle('G')->getAlignment()->applyFromArray($centerAlign);

        //Color bg and text
        //$activeSheet->getStyle('A3:G3')
        //->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        //->getStartColor()
        //->setARGB('0000AEEF'); //WARNA BACKGROUND BIRU

        $activeSheet->getStyle('A3:G3')
            ->getFont()
            ->getColor()
            ->setARGB(PHPExcel_Style_Color::COLOR_BLACK);

        //Height and Width
        /* Height */
        $activeSheet->getRowDimension('3')->setRowHeight(30);

        /* Width */
        $activeSheet->getColumnDimension('A')->setAutoSize(true);
        $activeSheet->getColumnDimension('B')->setAutoSize(true);
        $activeSheet->getColumnDimension('C')->setAutoSize(true);
        $activeSheet->getColumnDimension('D')->setAutoSize(true);
        $activeSheet->getColumnDimension('E')->setAutoSize(true);
        $activeSheet->getColumnDimension('F')->setAutoSize(true);
        $activeSheet->getColumnDimension('G')->setAutoSize(true);

        //Style Font
        $activeSheet->getStyle('A1')->getFont()->setSize(14);
        $activeSheet->getStyle('A1:A2')->getFont()->setBold(true);
        $activeSheet->getStyle('A3:G3')->getFont()->setBold(true);

        //Value of cell
        $activeSheet->setCellValue('A1', "LAPORAN REWARD");

        //Value table
        $activeSheet->setCellValue('A3', "No.");
        $activeSheet->setCellValue('B3', "Nama Panitia");
        $activeSheet->setCellValue('C3', "Asal Sekolah");
        $activeSheet->setCellValue('D3', "Jumlah PPDB");
        $activeSheet->setCellValue('E3', "Tahun Akademik");
        $activeSheet->setCellValue('F3', "Telepon");
        $activeSheet->setCellValue('G3', "Jumlah Reward");

        //Resource Data from database
        $filter = $this->input->post('filter');
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['panitia'] = $this->user_model->getDataPanitia_reward($filter);
        $data['tahun_akademik'] = $this->siswabaru_model->getTahunAkademik($filter);

        //Count Total daata
        $total_count = count($data['panitia']);
        $data = $data['panitia'];
        $total_row = 5 + $total_count;
        $no = 1;

        /* Start Looping data from database! */
        $i = 4;
        for ($j = 0; $j < $total_count; $j++) {
            $activeSheet->setCellValue('A' . $i, $no++);
            $activeSheet->setCellValue('B' . $i, $data[$j]['nama_panitia']);
            $activeSheet->setCellValue('C' . $i, $data[$j]['nama_sekolah']);
            $activeSheet->setCellValue('D' . $i, $data[$j]['ppdb']);
            $activeSheet->setCellValue('E' . $i, $data[$j]['tahun_akademik']);
            $activeSheet->setCellValue('F' . $i, $data[$j]['telepon_panitia']);
            $activeSheet->setCellValue('G' . $i, $data[$j]['total_reward']);
            $i++;
        }

        $activeSheet->getPageSetup()
            ->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        $activeSheet->getPageSetup()
            ->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);

        /* Border Style */
        $arrayStyle = array(
            'borders' => array(
                'outline' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000')
                ),
                'top' =>  array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000')
                ),
                'bottom' =>  array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000')
                ),
                'left' =>  array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000')
                ),
                'right' =>  array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000')
                ),
                'vertical' =>  array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000')
                ),
                'horizontal' =>  array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000')
                ),
                'allborders' =>  array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000')
                ),
            )
        );

        $i = $i - 1;
        $activeSheet->getStyle('A3:G' . $i)->applyFromArray($arrayStyle);

        /*//*/
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        //ubah nama file saat diunduh
        header("Content-Disposition: attachment;filename='" . $filename . ".xlsx");
        //unduh file
        $objWriter->save("php://output");
        //*/
    }
}

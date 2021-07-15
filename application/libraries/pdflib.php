<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

class Pdflib
{
	protected $ci;
	public function __construct()
	{
		$this->ci = &get_instance();
	}
	public function generate($html, $filename, $orientasi)
	{
		define('DOMPDF_ENABLE_AUTOLOAD', false);
		require_once(APPPATH . "/third_party/dompdf/autoload.inc.php");
		$dompdf = new DOMPDF();
		$dompdf->setPaper('A4', $orientasi);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream($filename . '.pdf', array("Attachment" => false));
	}
}
/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */

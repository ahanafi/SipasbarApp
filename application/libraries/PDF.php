<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class PDF
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function make($html, $filename)
	{
		define('DOMPDF_ENABLE_AUTOLOAD', false);
		$options = new Options();
		$options->set('enable_html5_parser', true);
		$options->set('chroot', 'path-to-test-html-files');
		$pdf = new Dompdf($options);
		$pdf->setPaper('A4', 'Landscape');
	    $pdf->load_html($html);
	    $pdf->render();
	    $pdf->stream($filename.'.pdf',array("Attachment"=>0));
	    exit(0);
		
	}

}

/* End of file PDF.php */
/* Location: ./application/libraries/PDF.php */

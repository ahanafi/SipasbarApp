<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->main_lib->is_login()) {
			redirect(base_url('login'),'refresh');
		}
	}

	public function index()
	{
		$data = array(
			'no'	=> 1,
			'ppb' 	=> $this->PPB->allWithApproval(),
			'csrf' 	=> array(
				'name'	=> $this->security->get_csrf_token_name(),
				'hash'	=> $this->security->get_csrf_hash()
			)
		);

		$this->template->views($data, "report/index");
	}

	public function print($id = NULL)
	{
		$id = $this->uri->segment(4);
		if (!empty(trim($id))) {
			$data = array(
				'ppb'	=> $this->PPB->show($id),
				'barang'=> $this->Barang->PpbId($id),
				'totalb'=> count($this->Barang->PpbId($id)),
				'app'	=> $this->PPB->detailPpb($id),
				'no'	=> 1,
				'root' 	=> $_SERVER['DOCUMENT_ROOT']
			);
			$html = $this->load->view('report/ppb', $data, TRUE);
			//echo $html;
			$this->pdf->make($html, "Report_PPB_".date('Ymd-H:i:s'));
		} else {
			redirect(base_url('report'));
		}
	}

}

/* End of file Report.php */
/* Location: ./application/controllers/Report.php */
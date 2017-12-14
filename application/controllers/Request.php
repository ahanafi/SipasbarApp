<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->main_lib->is_login()){
			redirect(base_url('login'),'refresh');
		}
	}

	public function approval($id = NULL)
	{
		$id = $this->uri->segment(4);
		if (!empty(trim($id))) {
			$data = array('status' => 1);
			if($this->PPB->update($data, $id)){
				$notif = array(
					'level' => 'success',
					'message' => 'Yosh! Data PPB berhasil dikirim ke User! Silahkan tunggu sampai diapprove!'
				);
			} else {
				$notif = array(
					'level' => 'danger',
					'message' => 'Oops! Data PPB gagal dikirim ke User!'
				);
			}
			$this->session->set_flashdata('notif', $notif);
			redirect(base_url('dashboard/ppb'));
		} else {
			redirect(base_url('dashboard'),'refresh');
		}
	}

	public function req_approval()
	{
		$unit = $this->session->unit;
		if($unit == "Approval 1") {
			$ppb = $this->PPB->status(1);
		} elseif($unit == "Approval 2") {
			$ppb = $this->PPB->status(2);
		} elseif($unit == "Approval 3") {
			$ppb = $this->PPB->status(3);
		} else {
			$ppb = $this->PPB->status(4);
		}

		$data = array(
			'csrf' => array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
			),
			'no'  => 1,
			'ppb' => $ppb
		);
		$this->template->views($data, "request/index");
	}
}

/* End of file Request.php */
/* Location: ./application/controllers/Request.php */
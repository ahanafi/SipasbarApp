<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->main_lib->is_login()) {
			redirect(base_url('login'), 'refresh');
		}
	}

	public function index()
	{
		$data['csrf'] = array(
			'name'	=> $this->security->get_csrf_token_name(),
			'hash'	=> $this->security->get_csrf_hash()
		);
		$data['totalRequest'] = count($this->PPB->request());
		$this->template->views($data, "custom_error/404");
	}

	public function access_denied()
	{
		$data['csrf'] = array(
			'name'	=> $this->security->get_csrf_token_name(),
			'hash'	=> $this->security->get_csrf_hash()
		);
		$data['totalRequest'] = count($this->PPB->request());
		$this->template->views($data, "custom_error/access_denied");	
	}

}

/* End of file Error.php */
/* Location: ./application/controllers/Error.php */
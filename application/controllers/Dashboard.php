<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('is_login')){
			redirect(base_url('login'));
		}
		//die(password_hash("admin", PASSWORD_DEFAULT));
	}

	public function index()
	{
		$data = array(
			'totalUsers' 		=> count($this->User->all()),
			'totalOpen' 		=> count($this->PPB->open()),
			'totalInProgress'	=> count($this->PPB->in_progress()),
			'totalComplete'		=> count($this->PPB->complete()),
			'totalRequest'		=> count($this->PPB->request()),
		);
		$data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
        	'hash' => $this->security->get_csrf_hash()
		);
		$this->template->views($data, "dashboard/index");
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
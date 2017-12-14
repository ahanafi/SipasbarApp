<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function views($data = array(), $content)
	{
			$data['role'] = $this->ci->session->role;
			$data['firstStatus'] = count($this->ci->PPB->status(1));
			$data['secondStatus'] = count($this->ci->PPB->status(2));
			$data['thirdStatus'] = count($this->ci->PPB->status(3));
			$data['fourthStatus'] = count($this->ci->PPB->status(4));
		

		$this->ci->load->view('templates/header', $data);
		$this->ci->load->view('templates/navbar');
		$this->ci->load->view('templates/sidebar');

		$this->ci->load->view($content);

		$this->ci->load->view('templates/footer');
	}

	

}

/* End of file Template.php */
/* Location: ./application/libraries/Template.php */

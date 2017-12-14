<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		if($this->main_lib->is_login()){
			redirect(base_url('dashboard'));
		}

		$data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
        	'hash' => $this->security->get_csrf_hash()
		);
		if($this->input->post('login')) {
			$post = $this->input->post();
			$form_rules = array(
				array(
					'field'	=> 'username',
					'label'	=> 'Username',
					'rules'	=> 'required'
				),
				array(
					'field'	=> 'password',
					'label'	=> 'Password',
					'rules'	=> 'required'
				)
			);

			$this->form_validation->set_rules($form_rules);
			if ($this->form_validation->run() === FALSE) {
				$notif = array(
					'level'		=> 'danger',
					'message'	=> 'Oops! Login gagal, username dan password harus diisi!'
				);
				$this->session->set_flashdata('notif', $notif);
				$this->load->view("auth/form_login", $data);
			} else {
				
				$username = $post['username'];
				$password = $post['password'];

				$auth = $this->Auth->authenticate($username, $password);

				if ($auth) {
					redirect(base_url('dashboard'));
				} else {
					$notif = array(
						'level'		=> 'danger',
						'message'	=> 'Oops! Login gagal, username atau password salah!'
					);
					$this->session->set_flashdata('notif', $notif);
					$this->load->view("auth/form_login", $data);
				}
			}

		} else {
			$this->load->view("auth/form_login", $data);
		}
	}

	public function logout()
	{
		if (isset($_POST['logout'])) {
			
			$this->session->sess_destroy();
			$notif = array(
				'level'		=> 'info',
				'message'	=> 'Yosh! Anda berhasil keluar dari system!'
			);
			$this->session->set_flashdata('notif', $notif);
			redirect(base_url('login'));
			
		} else {
			redirect(base_url('dashboard'));
		}
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
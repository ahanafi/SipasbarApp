<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->main_lib->is_login()){
			redirect(base_url('login'),'refresh');
		}
		if ($this->session->role == 0 && $this->uri->segment(2) != "my-profile") {
			redirect(base_url('access-denied'),'refresh');
		}
	}

	public function index()
	{
		$data = array(
			'users' => $this->User->all(),
			'no' => 1,
			'csrf' => array(
				'name' => $this->security->get_csrf_token_name(),
        		'hash' => $this->security->get_csrf_hash()
			)
		);
		$this->template->views($data, "user/index");
	}

	public function create()
	{
		$data['units'] = $this->Unit->unit_type('user');
		$data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
        	'hash' => $this->security->get_csrf_hash()
		);
		$this->template->views($data, "user/create");
	}

	public function store()
	{
		if (isset($_POST['create'])) {

			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('bagian', 'Bagian', 'required');
			$this->form_validation->set_rules('unit_id', 'Sub Unit', 'required');
			$this->form_validation->set_rules('telp', 'No. Telp', 'trim|required|integer');

			$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");

			if ($this->form_validation->run() === FALSE) {
				$data['units'] = $this->Unit->unit_type('user');
				$data['csrf'] = array(
					'name' => $this->security->get_csrf_token_name(),
		        	'hash' => $this->security->get_csrf_hash()
				);
				$this->template->views($data, "user/create");
			} else {
				$data = array(
					'id'		=> $this->main_lib->generateId(),
					'username'	=> $this->input->post('username'),
					'nama'		=> $this->input->post('nama'),
					'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					'email'		=> $this->input->post('email'),
					'bagian'	=> $this->input->post('bagian'),
					'unit_id'	=> $this->input->post('unit_id'),
					'telp'		=> $this->input->post('telp')
				);

				if($this->User->save($data)){
					$notif = array(
						'level' => 'success',
						'message' => 'Yosh! Data user baru berhasil disimpan!'
					);
					$this->session->set_flashdata('notif', $notif);
				} else {
					$notif = array(
						'level' => 'danger',
						'message' => 'Oops! Data user gagal disimpan!'
					);
					$this->session->set_flashdata('notif', $notif);
				}

				redirect(base_url('dashboard/users'));
			}
		} else {
			redirect(base_url('dashboard'));
		}
	}

	public function edit($id)
	{
		$data['units'] = $this->Unit->unit_type('user');
		$data['user'] = $this->User->show($id);
		$data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
        	'hash' => $this->security->get_csrf_hash()
		);
		$this->template->views($data, "user/edit");
	}

	public function update()
	{
		if (isset($_POST['update'])) {

			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('bagian', 'Bagian', 'required');
			$this->form_validation->set_rules('unit_id', 'Sub Unit', 'required');
			$this->form_validation->set_rules('telp', 'No. Telp', 'trim|required|integer');

			$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");

			$id = $this->uri->segment(4);
			if ($this->form_validation->run() === FALSE) {
				$data['units'] = $this->Unit->unit_type('user');
				$data['user'] = $this->User->show($id);
				$data['csrf'] = array(
					'name' => $this->security->get_csrf_token_name(),
		        	'hash' => $this->security->get_csrf_hash()
				);
				$this->template->views($data, "user/edit");
			} else {
				$data = array(
					'username'	=> $this->input->post('username'),
					'nama'		=> $this->input->post('nama'),
					'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					'email'		=> $this->input->post('email'),
					'bagian'	=> $this->input->post('bagian'),
					'unit_id'	=> $this->input->post('unit_id'),
					'telp'		=> $this->input->post('telp')
				);

				if($this->User->update($data, $id)){
					$notif = array(
						'level' => 'success',
						'message' => 'Yosh! New user successfully updated!'
					);
					$this->session->set_flashdata('notif', $notif);
				} else {
					$notif = array(
						'level' => 'danger',
						'message' => 'Oops! Failed to save new data user!'
					);
					$this->session->set_flashdata('notif', $notif);
				}

				redirect(base_url('dashboard/users'));
			}
		} else {
			redirect(base_url('dashboard'));
		}
	}

	public function delete($uid)
	{
		if($this->User->delete($uid)){
			$notif = array(
				'level' => 'success',
				'message' => 'Yosh! Data user berhasil dihapus!'
			);
			$this->session->set_flashdata('notif', $notif);
		} else {
			$notif = array(
				'level' => 'danger',
				'message' => 'Oops! Gagal menghapus data user!'
			);
			$this->session->set_flashdata('notif', $notif);
		}

		redirect(base_url('dashboard/users'));
	}

	public function my_profile()
	{
		$data['csrf'] = array(
			'name'	=> $this->security->get_csrf_token_name(),
			'hash'	=> $this->security->get_csrf_hash()
		);
		$data['totalRequest'] = count($this->PPB->request());
		$this->template->views($data, "user/profile");
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
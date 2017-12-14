<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->main_lib->is_login()){
			redirect(base_url('login'),'refresh');
		}
	}

	public function index()
	{
		$data = array(
			'no'	=> 1,
			'vendor'=> $this->Vendor->all(),
			'csrf' => array(
				'name' => $this->security->get_csrf_token_name(),
        		'hash' => $this->security->get_csrf_hash()
			)
		);
		$this->template->views($data, "vendor/index");
	}

	public function create()
	{
		$data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
        	'hash' => $this->security->get_csrf_hash()
		);
		$data['units'] = $this->Unit->unit_type("vendor");
		$this->template->views($data,"vendor/create");
	}

	public function store()
	{
		if (isset($_POST['create'])) {

			$this->form_validation->set_rules('perusahaan', 'Nama perusahaan', 'required');
			$this->form_validation->set_rules('unit_id', 'Sub Unit', 'required');
			$this->form_validation->set_rules('telp', 'No. Telp', 'trim|required|integer');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');

			$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");

			if ($this->form_validation->run() === FALSE) {
				$data['csrf'] = array(
					'name' => $this->security->get_csrf_token_name(),
		        	'hash' => $this->security->get_csrf_hash()
				);
				$data['units'] = $this->Unit->unit_type("vendor");
				$this->template->views($data,"vendor/create");
			} else {
				$data = array(
					'id'			=> $this->main_lib->generateId(),
					'unit_id'		=> $this->input->post('unit_id'),
					'perusahaan'	=> $this->input->post('perusahaan'),
					'telp'			=> $this->input->post('telp'),
					'alamat'		=> $this->input->post('alamat')
				);

				if ($this->Vendor->save($data)) {
					$notif = array(
						'level' => 'success',
						'message' => 'Yosh! Data vendor berhasil ditambahkan!'
					);
					$this->session->set_flashdata('notif', $notif);
				} else {
					$notif = array(
						'level' => 'danger',
						'message' => 'Oops! Gagal menambahkan vendor baru!'
					);
					$this->session->set_flashdata('notif', $notif);
				}

				redirect(base_url('dashboard/vendor'));
			}

		} else {
			redirect(base_url('dashboard'));
		}
	}

	public function edit($vid)
	{
		$data['vdr'] = $this->Vendor->show($vid);
		$data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
        	'hash' => $this->security->get_csrf_hash()
		);
		$data['units'] = $this->Unit->unit_type("vendor");
		$this->template->views($data,"vendor/edit");
	}

	public function update()
	{
		if (isset($_POST['update'])) {

			$this->form_validation->set_rules('perusahaan', 'Nama perusahaan', 'required');
			$this->form_validation->set_rules('unit_id', 'Sub Unit', 'required');
			$this->form_validation->set_rules('telp', 'No. Telp', 'trim|required|integer');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');

			$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
			$vid = $this->uri->segment(4);

			if ($this->form_validation->run() === FALSE) {
				$data['csrf'] = array(
					'name' => $this->security->get_csrf_token_name(),
		        	'hash' => $this->security->get_csrf_hash()
				);
				$data['vdr'] = $this->Vendor->show($vid);
				$data['units'] = $this->Unit->unit_type("vendor");
				$this->template->views($data,"vendor/update");
			} else {
				$data = array(
					'unit_id'		=> $this->input->post('unit_id'),
					'perusahaan'	=> $this->input->post('perusahaan'),
					'telp'			=> $this->input->post('telp'),
					'alamat'		=> $this->input->post('alamat')
				);

				if ($this->Vendor->update($data, $vid)) {
					$notif = array(
						'level' => 'success',
						'message' => 'Yosh! Data vendor berhasil disimpan!'
					);
					$this->session->set_flashdata('notif', $notif);
				} else {
					$notif = array(
						'level' => 'danger',
						'message' => 'Oops! Gagal mengubah data vendor!'
					);
					$this->session->set_flashdata('notif', $notif);
				}

				redirect(base_url('dashboard/vendor'));
			}

		} else {
			redirect(base_url('dashboard'));
		}
	}

	public function delete($vid)
	{
		if ($this->Vendor->delete($vid)) {
			$notif = array(
				'level' => 'success',
				'message' => 'Yosh! Data vendor berhasil dihapus!'
			);
			$this->session->set_flashdata('notif', $notif);
		} else {
			$notif = array(
				'level' => 'danger',
				'message' => 'Oops! Gagal menghapus data vendor!'
			);
			$this->session->set_flashdata('notif', $notif);
		}

		redirect(base_url('dashboard/vendor'));
	}

}

/* End of file Vendor.php */
/* Location: ./application/controllers/Vendor.php */
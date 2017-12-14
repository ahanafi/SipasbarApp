<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approval extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->main_lib->is_login()){
			redirect(base_url('login'),'refresh');
		}
	}

	public function set($id = NULL)
	{
		$id = $this->uri->segment(4);
		if (empty(trim($id))) {
			redirect(base_url('dashboard/ppb/open'));
		} else {
			$data['csrf'] = array(
				'name'	=> $this->security->get_csrf_token_name(),
				'hash'	=> $this->security->get_csrf_hash()
			);
			$data['ppb'] = $this->PPB->show($id);
			$data['app'] = $this->Approval->show($id);
			$this->template->views($data, "approval/set_approval");
		}
	}

	public  function approve($id = NULL)
	{
		$id = $this->uri->segment(3);
		$unit = $this->session->unit;
		if($unit == "Approval 1"){
			$data = array('is_approve_kasie' => 1);
			$data2= array('status' => 2);
		} elseif ($unit == "Approval 2") {
			$data = array('is_approve_kadept' => 1);
			$data2= array('status' => 3);
		} else if($unit == "Approval 3") {
			$data = array('is_approve_kadiv' => 1);
			$data2= array('status' => 4);
		} else {
			$data = array('is_approve_security' => 1);
			$data2= array('status' => 5);
		}

		$this->PPB->update($data2, $id);
		if($this->Approval->update($data, $id)){
			$notif = array(
				'level'		=> 'success',
				'message'	=> 'Yosh! Data PPB berhasil diapprove!'
			);
		} else {
			$notif = array(
				'level'		=> 'danger',
				'message'	=> 'Oops! Data PPB gagal diapprove!'
			);
		}

		$this->session->set_flashdata('notif', $notif);
		redirect(base_url('dashboard/req/approval'));

	}

	public function set_store($id = NULL)
	{
		$id = $this->uri->segment(4);
		if (isset($_POST['post'])) {
			if (count($_POST) > 2) {
				$data = array(
					'is_approve_kasie'	=> $this->convertNull2Zero($this->input->post('approvedKasie')),
					'is_approve_kadept'	=> $this->convertNull2Zero($this->input->post('approvedKadept')),
					'is_approve_kadiv'	=> $this->convertNull2Zero($this->input->post('approvedKadiv')),
					'is_approve_security'=> $this->convertNull2Zero($this->input->post('approvedSecurity'))
				);

				//echo json_encode($data);
				if ($this->Approval->update($data, $id)) {
					$notif = array(
						'level' => 'success',
						'message'=> "Yosh! Data Approval PPB berhasil di simpan!"
					);
				} else {
					$notif = array(
						'level' => 'danger',
						'message'=> "Oops! Proses approving data error!"
					);
				}

				$this->session->set_flashdata('notif', $notif);
				redirect(base_url('dashboard/ppb/in-progress'));

			} else {
				$data['csrf'] = array(
					'name'	=> $this->security->get_csrf_token_name(),
					'hash'	=> $this->security->get_csrf_hash()
				);
				$data['ppb'] = $this->PPB->show($id);
				$notif = array(
					'level' => 'warning',
					'message'=> "Oops! Tidak ada pilihan yang di <b>Approve</b>!, Silahkan approve salah satu!"
				);
				$this->session->set_flashdata('notif', $notif);
				redirect(base_url('dashboard/approval/set/'.$id));
			}
		} else {
			redirect(base_url('dashboard/ppb/open'));
		}
	}

	public function convertNull2Zero($field)
	{
		$zero = 0;
		if ($field == 1) {
			return $field;
		} else {
			return $zero;
		}
	}

}

/* End of file Approval.php */
/* Location: ./application/controllers/Approval.php */
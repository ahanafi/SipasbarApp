<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

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
			'barang' => $this->Barang->all(),
			'no' => 1,
			'csrf' => array(
				'name' => $this->security->get_csrf_token_name(),
        		'hash' => $this->security->get_csrf_hash()
			)
		);
		$this->template->views($data, "barang/index");
	}

	public function create()
	{
		$data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
        	'hash' => $this->security->get_csrf_hash()
		);
		$this->template->views($data, "barang/create");
	}

	public function store()
	{
		if (isset($_POST['create'])) {

			$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
			$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');
			$this->form_validation->set_rules('satuan', 'Satuan', 'required');

			$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");

			if ($this->form_validation->run() === FALSE) {
				$data['csrf'] = array(
					'name' => $this->security->get_csrf_token_name(),
		        	'hash' => $this->security->get_csrf_hash()
				);
				$this->template->views($data, "barang/create");
			} else {
				$data = array(
					'id'			=> $this->main_lib->generateId(),
					'nama_barang'	=> $this->input->post('nama_barang'),
					'jumlah'		=> abs($this->input->post('jumlah')),
					'satuan'		=> $this->input->post('satuan'),
					'keterangan'=> $this->input->post('keterangan'),
				);

				if($this->Barang->save($data)){
					$notif = array(
						'level' => 'success',
						'message' => 'Yosh! Data Barang baru berhasil disimpan!'
					);
					$this->session->set_flashdata('notif', $notif);
				} else {
					$notif = array(
						'level' => 'danger',
						'message' => 'Oops! Data Barang gagal disimpan!'
					);
					$this->session->set_flashdata('notif', $notif);
				}

				redirect(base_url('dashboard/barang'));
			}
		} else {
			redirect(base_url('dashboard'));
		}
	}

	public function edit($id)
	{
		$data['brg'] = $this->Barang->show($id);
		$data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
        	'hash' => $this->security->get_csrf_hash()
		);
		$data['satuan'] = array("unit", "pack", "buah");
		$this->template->views($data, "barang/edit");
	}

	public function update()
	{
		if (isset($_POST['update'])) {

			$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
			$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');
			$this->form_validation->set_rules('satuan', 'Satuan', 'required');

			$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");

			$id = $this->uri->segment(4);

			if ($this->form_validation->run() === FALSE) {
				$data['csrf'] = array(
					'name' => $this->security->get_csrf_token_name(),
		        	'hash' => $this->security->get_csrf_hash()
				);
				$data['brg'] = $this->Barang->show($id);
				$this->template->views($data, "barang/edit");
			} else {
				$data = array(
					'nama_barang'	=> $this->input->post('nama_barang'),
					'jumlah'		=> abs($this->input->post('jumlah')),
					'satuan'		=> $this->input->post('satuan'),
					'keterangan'=> $this->input->post('keterangan'),
				);

				if($this->Barang->update($data, $id)){
					$notif = array(
						'level' => 'success',
						'message' => 'Yosh! Data Barang  berhasil disimpan!'
					);
					$this->session->set_flashdata('notif', $notif);
				} else {
					$notif = array(
						'level' => 'danger',
						'message' => 'Oops! Data Barang gagal disimpan!'
					);
					$this->session->set_flashdata('notif', $notif);
				}

				redirect(base_url('dashboard/barang'));
			}
		} else {
			redirect(base_url('dashboard'));
		}
	}

	public function delete($uid)
	{
		if($this->Barang->delete($uid)){
			$notif = array(
				'level' => 'success',
				'message' => 'Yosh! Data Barang berhasil dihapus!'
			);
			$this->session->set_flashdata('notif', $notif);
		} else {
			$notif = array(
				'level' => 'danger',
				'message' => 'Oops! Gagal menghapus data Barang!'
			);
			$this->session->set_flashdata('notif', $notif);
		}

		redirect(base_url('dashboard/barang'));
	}

	public function get($id)
	{
		$barang = $this->Barang->show($id);
		echo json_encode($barang);
	}

	public function getBarangPPB($id)
	{
		$barang = $this->Barang->PpbId($id);
		echo json_encode($barang);
	}

}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */
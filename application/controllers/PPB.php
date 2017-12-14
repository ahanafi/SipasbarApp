<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PPB extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->main_lib->is_login()){
			redirect(base_url('login'),'refresh');
		}
	}

	public function create()
	{
		$vendor = $this->Vendor->Only('perusahaan');
		$tujuan = $vendor[mt_rand(0, count($vendor) - 1)];
		$data = array(
			'nomor' 		=> $this->main_lib->generateNumber(),
			'no_kendaraan' 	=> $this->main_lib->generateCarNumber(),
			'tujuan'		=> $tujuan->perusahaan,
		);

		$data['barang'] = $this->Barang->emptyPpbId();
		$data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
        	'hash' => $this->security->get_csrf_hash()
		);
		
		$this->template->views($data, "ppb/create");
	}

	public function store()
	{
		if (isset($_POST['create'])) {
			$this->form_validation->set_rules('nomor', 'Nomor', 'required');
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
			$this->form_validation->set_rules('no_kendaraan', 'Nomor kendaraaan', 'required');
			$this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
			$this->form_validation->set_rules('barang[]', 'Barang', 'required');

			$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");

			if ($this->form_validation->run() === FALSE) {
				$data['barang'] = $this->Barang->emptyPpbId();
				$data['csrf'] = array(
					'name' => $this->security->get_csrf_token_name(),
		        	'hash' => $this->security->get_csrf_hash()
				);
				$this->template->views($data, "ppb/create");
			} else {
				$id = $this->main_lib->generateId();
				$data = array(
					'id'			=> $id,
					'nomor'			=> $this->input->post('nomor'),
					'tanggal'		=>$this->input->post('tanggal'),
					'no_kendaraan'	=> $this->input->post('no_kendaraan'),
					'tujuan'		=> $this->input->post('tujuan'),
					'keterangan'	=> $this->input->post('keterangan')
				);
				$dataApproval = array(
					'id'				=> $this->main_lib->generateId(),
					'ppb_id'			=> $id,
					'is_approve_kasie'	=> 0,
					'is_approve_kadept'	=> 0,
					'is_approve_kadiv'	=> 0,
					'is_approve_security'=>0
				);
				
				$this->PPB->save($data);
				$barang = $this->input->post('barang[]');
				$countBrg = count($barang);
				$data_brg = array('ppb_id' => $id);
				$insertApproval = $this->Approval->save($dataApproval);

				for($i=0; $i<$countBrg; $i++){
					$insert = $this->Barang->update($data_brg, $barang[$i]);
				}

				if ($insert) {
					$notif = array(
						'level' => 'success',
						'message' => 'Yosh! Data PPB baru berhasil disimpan!'
					);
					$this->session->set_flashdata('notif', $notif);
				} else {
					$notif = array(
						'level' => 'danger',
						'message' => 'Oops! Data PPB gagal disimpan!'
					);
					$this->session->set_flashdata('notif', $notif);
				}

				redirect(base_url('dashboard/ppb/open'));

			}
		} else {
			redirect(base_url('dashboard/ppb'));
		}
	}

	public function edit($id = NULL)
	{
		$id = $this->uri->segment(4);
		if (!empty(trim($id))) {
			$emptyPpbId = $this->Barang->emptyPpbId($id);
			$selectedPPB= $this->Barang->PpbId($id);
			$barang = array_merge($emptyPpbId, $selectedPPB);
			$data = array(
				'ppb'	=> $this->PPB->show($id),
				'barang'=> $barang,
				'csrf'	=> array(
					'name' => $this->security->get_csrf_token_name(),
		        	'hash' => $this->security->get_csrf_hash()
				)
			);
			
			$this->template->views($data, "ppb/edit");
		} else {
			redirect(base_url('dashboard/ppb/open'));
		}
	}

	public function update($id = NULL)
	{
		$id = $this->uri->segment(4);
		if (!empty(trim($id))) {
			if (isset($_POST['update'])) {
				$this->form_validation->set_rules('nomor', 'Nomor', 'required');
				$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
				$this->form_validation->set_rules('no_kendaraan', 'Nomor kendaraaan', 'required');
				$this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
				$this->form_validation->set_rules('barang[]', 'Barang', 'required');

				$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");

				if ($this->form_validation->run() === FALSE) {
					$emptyPpbId = $this->Barang->emptyPpbId($id);
					$selectedPPB= $this->Barang->PpbId($id);
					$barang = array_merge($emptyPpbId, $selectedPPB);
					$data = array(
						'ppb'	=> $this->PPB->show($id),
						'barang'=> $barang,
						'csrf'	=> array(
							'name' => $this->security->get_csrf_token_name(),
				        	'hash' => $this->security->get_csrf_hash()
						)
					);
					$this->template->views($data, "ppb/edit");
				} else {
					$data = array(
						'nomor'			=> $this->input->post('nomor'),
						'tanggal'		=>$this->input->post('tanggal'),
						'no_kendaraan'	=> $this->input->post('no_kendaraan'),
						'tujuan'		=> $this->input->post('tujuan'),
						'keterangan'	=> $this->input->post('keterangan')
					);

					$oldSelectedBarang = $this->Barang->PpbId($id);
					$countOldBrg = count($oldSelectedBarang);
					for ($x=0; $x < $countOldBrg; $x++) { 
						if ($oldSelectedBarang[$x]->ppb_id == $id) {
							$this->Barang->update(array('ppb_id' => ''), $oldSelectedBarang[$x]->id);
						}
					}

					$this->PPB->update($data, $id);
					$barang = $this->input->post('barang[]');
					$countBrg = count($barang);
					$data_brg = array('ppb_id' => $id);

					for($i=0; $i<$countBrg; $i++){
						$insert = $this->Barang->update($data_brg, $barang[$i]);
					}

					if ($insert) {
						$notif = array(
							'level' => 'success',
							'message' => 'Yosh! Data PPB berhasil disimpan!'
						);
						$this->session->set_flashdata('notif', $notif);
					} else {
						$notif = array(
							'level' => 'danger',
							'message' => 'Oops! Data PPB gagal disimpan!'
						);
						$this->session->set_flashdata('notif', $notif);
					}

					redirect(base_url('dashboard/ppb/open'));

				}
			} else {
				redirect(base_url('dashboard/ppb'));
			}
		} else {
			redirect(base_url('dashboard/ppb'));
		}
	}

	public function delete($id = NULL)
	{
		$id = $this->uri->segment(4);
		if (!empty(trim($id))) {
			$barang = $this->Barang->PpbId($id);
			$totalBrg = count($barang);

			for ($i=0; $i < $totalBrg; $i++) { 
				$this->Barang->update(array('ppb_id' => ''), $barang[$i]->id);
			}

			if($this->PPB->delete($id)){
				$notif = array(
					'level' => 'success',
					'message' => 'Yosh! Data PPB berhasil dihapus!'
				);
			} else {
				$notif = array(
					'level' => 'danger',
					'message' => 'Oops! Gagal menghapus data PPB!'
				);
			}

			$this->session->set_flashdata('notif', $notif);
			redirect(base_url('dashboard/ppb'));

		} else {
			redirect(base_url('dashboard/ppb'));
		}
	}

	public function open()
	{
		$data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
        	'hash' => $this->security->get_csrf_hash()
		);
		$data['no'] = 1;
		$data['ppb'] = $this->PPB->open();

		$this->template->views($data, "ppb/open");
	}

	public function in_progress()
	{
		$data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
        	'hash' => $this->security->get_csrf_hash()
		);
		$data['no'] = 1;
		$data['ppb'] = $this->PPB->in_progress();

		$this->template->views($data, "ppb/in-progress");
	}

	public function complete()
	{
		$data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
        	'hash' => $this->security->get_csrf_hash()
		);
		$data['no'] = 1;
		$data['ppb'] = $this->PPB->complete();

		$this->template->views($data, "ppb/complete");
	}

	public function get($id = NULL)
	{
		$id = $this->uri->segment(4);
		if (!empty(trim($id))) {
			$ppb = $this->PPB->detailPpb($id);
			echo json_encode($ppb);
		} else {
			redirect(base_url('dashboard/ppb'));
		}
	}

}

/* End of file PPB.php */
/* Location: ./application/controllers/PPB.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PPB_model extends CI_Model {

	protected $table = 'ppb';

	public function all()
	{
		$this->db->select("ppb.*, ppb.id AS pid");
		$this->db->from($this->table);
		$sql = $this->db->get();
		return $sql->result();
	}

	public function allWithApproval()
	{
		$this->db->select("ppb.*, ppb.id AS pid, approval.*");
		$this->db->from($this->table);
		$this->db->join("approval", "ppb.id = approval.ppb_id");
		$sql = $this->db->get();
		return $sql->result();
	}

	public function open()	
	{
		$this->db->select("ppb.*, ppb.id AS pid, approval.*");
		$this->db->from("ppb");
		$this->db->join("approval", "ppb.id = approval.ppb_id");
		$this->db->where("is_approve_kasie", 0);
		$this->db->where("is_approve_kadept", 0);
		$this->db->where("is_approve_kadiv", 0);
		$this->db->where("is_approve_security", 0);
		$sql = $this->db->get();
		return $sql->result();
	}

	public function in_progress()
	{
		$this->db->select("ppb.*, ppb.id AS pid, approval.*");
		$this->db->from("ppb");
		$this->db->join("approval", "ppb.id = approval.ppb_id");
		$this->db->where("is_approve_kasie", 0);
		$this->db->or_where("is_approve_kadept", 0);
		$this->db->or_where("is_approve_kadiv", 0);
		$this->db->or_where("is_approve_security", 0);
		$sql = $this->db->get();
		return $sql->result();
	}

	public function complete()	
	{
		$this->db->select("ppb.*, ppb.id AS pid, approval.*");
		$this->db->from("ppb");
		$this->db->join("approval", "ppb.id = approval.ppb_id");
		$this->db->where("is_approve_kasie", 1);
		$this->db->where("is_approve_kadept", 1);
		$this->db->where("is_approve_kadiv", 1);
		$this->db->where("is_approve_security", 1);
		$sql = $this->db->get();
		return $sql->result();
	}

	public function show($id)
	{
		$sql = $this->db->get_where($this->table, array('id' => $id));
		return $sql->row();
	}

	public function save($data)
	{
		if($this->db->insert($this->table, $data)){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function update($data, $id)
	{
		$this->db->where('id', $id);
		if ($this->db->update($this->table, $data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function delete($pid)
	{
		if ($this->db->delete($this->table, array('id' => $pid))) {
			return true;
		} else {
			return false;
		}
	}

	public function detailPpb($id)
	{
		$this->db->select("approval.*");
		$this->db->from($this->table);
		$this->db->join("approval", "ppb.id = approval.ppb_id");
		$this->db->where("ppb.id", $id);
		$sql = $this->db->get();
		if ($sql->num_rows() > 0) {
			return $sql->row();
		} else {
			$data = array(
				'is_approve_kasie'	=> 0,
				'is_approve_kadept'	=> 0,
				'is_approve_kadiv'	=> 0,
				'is_approve_security'=>0
			);

			return $data;
		}

	}

	public function request()
	{
		$sql = $this->db->get_where($this->table, array('status' => 1));
		return $sql->result();
	}

	public function status($number)
	{
		$this->db->select("ppb.*, ppb.id AS pid, approval.*");
		$this->db->from($this->table);
		$this->db->join("approval", "ppb.id = approval.ppb_id");
		$this->db->where('status', $number);
		$sql = $this->db->get();
		return $sql->result();
	}
}

/* End of file PPB_model.php */
/* Location: ./application/models/PPB_model.php */
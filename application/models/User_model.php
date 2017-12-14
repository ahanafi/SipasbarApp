<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	protected $table = 'users';

	public function all()
	{		
		$this->db->select("users.id AS uid, users.*, unit.*");
		$this->db->from($this->table);
		$this->db->join('unit', "unit.id = users.unit_id");
		$this->db->order_by('users.idx', 'ASC');
		$sql = $this->db->get();
		return $sql->result();
	}

	public function save($data)
	{
		if($this->db->insert($this->table, $data)){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function show($id)
	{
		$this->db->select("users.id AS uid, users.*, unit.*");
		$this->db->from($this->table);
		$this->db->join('unit', "unit.id = users.unit_id");
		$this->db->where('users.id', $id);
		$sql = $this->db->get();
		return $sql->row();
	}

	public function update($data, $id)
	{
		$this->db->where("id", $id);
		if($this->db->update($this->table, $data)){
			return true;
		} else {
			return false;
		}
	}

	public function delete($id)
	{
		if ($this->db->delete($this->table, array('id' => $id))) {
			return true;
		} else {
			return false;
		}
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
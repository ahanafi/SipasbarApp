<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approval_model extends CI_Model {

	protected $table = 'approval';

	public function save($data)
	{
		if ($this->db->insert($this->table, $data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function show($pid)
	{
		$sql = $this->db->get_where($this->table, array('ppb_id' => $pid));
		return $sql->row();
	}

	public function update($data, $id)
	{
		$this->db->where('ppb_id', $id);
		if($this->db->update($this->table, $data)){
			return TRUE;
		} else {
			return FALSE;
		}
	}
	

}

/* End of file Approval_model.php */
/* Location: ./application/models/Approval_model.php */
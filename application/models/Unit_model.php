<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_model extends CI_Model {

	protected $table = "unit";

	public function all()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->order_by('idx', 'ASC');
		return $this->db->get()->result();
	}

	public function unit_type($type)
	{
		$sql = $this->db->get_where($this->table, array('type' => $type));
		return $sql->result();
	}


}

/* End of file Unit_model.php */
/* Location: ./application/models/Unit_model.php */
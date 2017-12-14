<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

	protected $table = 'barang';

	public function all()
	{		
		$this->db->select("*");
		$this->db->from($this->table);
		$this->db->order_by('barang.idx', 'ASC');
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
		$sql = $this->db->get_where($this->table, array('id' => $id));
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

	public function emptyPpbId()
	{
		$sql = $this->db->get_where($this->table, array('ppb_id' => ''));
		return $sql->result();
	}

	public function PpbId($id)
	{
		$sql = $this->db->get_where($this->table, array('ppb_id' => $id));
		return $sql->result();
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
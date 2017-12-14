<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	protected $table = 'users';

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function authenticate($username, $password)
	{
		$sql = $this->db->get_where($this->table, array('username' => $username));
		if($sql->num_rows() > 0) {
			$data = $sql->row();
			
			if(password_verify($password, $data->password)){
				$unit = $this->db->get_where('unit', array('id' => $data->unit_id))->row();
				$user_data = array(
					'name'		=> $data->nama,
					'username' 	=> $data->username,
					'password' 	=> $data->password,
					'bagian'	=> $data->bagian,
					'email'		=> $data->email,
					'unit' 		=> $unit->nama_unit,
					'role'		=> $this->roleUser($unit->nama_unit),
					'is_login'	=> TRUE
				);
				$this->session->set_userdata($user_data);
				return true;
			} else {
				return false;
				//die("gagal login!");
			}
		} else {
			return false;
		}
	}
	
	public function roleUser($unitName)
	{
		if ($unitName == "Administrator") {
			return 1;
		} else {
			return 0;
		}
	}

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_lib
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function generateId()
	{
		$randStr = md5(uniqid(rand(), true));
		$str = strtoupper(substr($randStr, 0,6));
		return $str;
	}

	public function is_login()
	{
		if ($this->ci->session->has_userdata('is_login')){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function generateNumber()
	{
		//Nomor => 1031/10/GS/2017
		$list_number = 2017102020;

		$month = date('m');
		$year = date('Y');

		$numberRand = substr( rand(4, $list_number) , 4,4);

		return $numberRand."/".$month."/GS/".$year;
	}

	public function generateCarNumber()
	{
		//Example AB 1290 HY
		$list_number = 2017102020;
		$first = "ABCDEFGHJKLMNOPQRSTUVWXYZ";
		$last  = "ZYXWVUTSRQPONMLKJIHGFEDCBA";
		$center = substr( rand(0, $list_number) , 4,4);

		$firstShuffle = substr(str_shuffle($first), 8,2);
		$lastShuffle = substr(str_shuffle($last), -8,2);

		return $firstShuffle." ".$center." ".$lastShuffle;
	}

}

/* End of file Main_lib.php */
/* Location: ./application/libraries/Main_lib.php */

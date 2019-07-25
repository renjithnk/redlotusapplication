<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Color_model extends CI_Model {


	public function fetch_colors()
	{
		$this->db->where('active',"1");
		$this->db->select('id, color_name')->from('colors');
		$this->db->order_by("color_name", "ASC");
		$query=$this->db->get();
		if($query->num_rows() > 0)
		{
			$result=$query->result();
			return $result;
		}else{
			return 0;
		}
	}

}

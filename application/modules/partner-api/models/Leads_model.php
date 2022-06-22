<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Leads_model extends MY_Model
{
	public $table = "logins l";
	public $select_column = ['l.id', 'l.name', 'l.mobile', 'l.email'];

	public function make_query($api)
	{
		$this->db->select($this->select_column)
            	 ->from($this->table)
				 ->where(['l.is_deleted' => 0])
				 ->where('l.partner_id', $api)
				 ->where('l.role', 'User')
                 ->join('branches b', 'b.id = l.branch_id', 'left')
				 ->limit($this->input->get("length"), $this->input->get("start"));

	   return $this->db->get()->result();
	}

	public function leads_count($api)
	{
		$this->db->select('l.id')
		         ->from($this->table)
				 ->where(['l.is_deleted' => 0])
                 ->where('l.partner_id', $api)
                 ->where('l.role', "User")
                 ->join('branches b', 'b.id = l.branch_id', 'left');
		            	
		return $this->db->get()->num_rows();
	}
}
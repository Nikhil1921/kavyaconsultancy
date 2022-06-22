<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Followups_model extends MY_Model
{
	public $table = "followups f";
	public $select_column = ['l.name', 'l.mobile', 'f.remarks', 'f.created_at'];

	public function make_query($api)
	{  
		$this->db->select($this->select_column)
            	 ->from($this->table)
                 ->where(['status' => $this->input->get('status')])
                 ->join('logins l', 'l.id = f.u_id')
                 ->where('l.partner_id', $api)
                 ->limit($this->input->get("length"), $this->input->get("start"));

        return $this->db->get()->result();
	}
}
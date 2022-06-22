<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Purchased_plans_model extends MY_Model
{
	public $table = "purchase_plan p";
	public $select_column = ['p.id', 'ip.title', 'p.policy_no', 'p.total_premium', 'p.purchase_date', 'p.expiry_date', 'c.name client', 'p.commission', 'p.commission_status', 'i.comm_type', 'p.od_premium', 'p.premium'];

	public function make_query($api)
	{  
		$this->db->select($this->select_column)
            	 ->from($this->table)
                 ->where('p.partner_id', $api)
                 ->where('ip.ins_type_id', $this->input->get('ins_id'))
                 ->join('insurance_plans ip', 'ip.id = p.plan_id', 'left')
                 ->join('insurance i', 'i.id = ip.ins_id', 'left')
                 ->join('logins c', 'c.id = p.user_id', 'left')
                 ->limit($this->input->get("length"), $this->input->get("start"));
			
        return $this->db->get()->result();
	}
}
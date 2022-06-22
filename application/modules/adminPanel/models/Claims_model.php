<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Claims_model extends MY_Model
{
	public $table = "purchase_plan p";
	public $select_column = ['p.id', 'ip.title', 'p.policy_no', 'c.name client', 'c.mobile client_mobile', 'p.claim_status'];
	public $search_column = ['p.id', 'ip.title', 'p.policy_no', 'c.name', 'c.mobile', 'p.claim_status'];
    public $order_column = [null, 'ip.title', 'p.policy_no', 'c.name', 'c.mobile', 'p.claim_status', null];
	public $order = ['p.id' => 'DESC'];

	public function make_query()
	{  
		if ($this->user->role == 'Partner') unset($this->order_column[8]);
		
		$this->db->select($this->select_column)
            	 ->from($this->table)
                 ->where('p.is_claimed', 1)
                 ->join('insurance_plans ip', 'ip.id = p.plan_id', 'left')
                 ->join('logins c', 'c.id = p.user_id', 'left');
				 
		if ($this->input->get('ins_type'))
			$this->db->where('ip.ins_type_id', d_id($this->input->get('ins_type')));

		switch ($this->session->branch_id) {
            case 0:
                
                break;
            
            default:
                $this->db->where('c.branch_id', $this->session->branch_id);
                break;
        }

		switch ($this->session->role) {
            case 'Sales person':
                $this->db->where('c.staff_id', $this->session->auth);
                break;
            case 'Partner':
                $this->db->where('p.partner_id', $this->session->auth);
                break;
            
            default:
                break;
        }
			
        $this->datatable();
	}

	public function count()
	{
		$this->db->select('p.id')
		         ->from($this->table)
                 ->where('p.is_claimed', 1)
                 ->join('insurance_plans ip', 'ip.id = p.plan_id', 'left')
                 ->join('logins c', 'c.id = p.user_id', 'left');
				 
		if ($this->input->get('ins_type'))
			$this->db->where('ip.ins_type_id', d_id($this->input->get('ins_type')));

		switch ($this->session->branch_id) {
            case 0:
                
                break;
            
            default:
                $this->db->where('c.branch_id', $this->session->branch_id);
                break;
        }

		switch ($this->session->role) {
            case 'Sales person':
                $this->db->where('c.staff_id', $this->session->auth);
                break;
            case 'Partner':
                $this->db->where('p.partner_id', $this->session->auth);
                break;
            
            default:
                break;
        }
		
		return $this->db->get()->num_rows();
	}
}
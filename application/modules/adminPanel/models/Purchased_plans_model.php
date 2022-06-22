<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Purchased_plans_model extends MY_Model
{
	public $table = "purchase_plan p";
	public $select_column = ['p.id', 'ip.title', 'p.policy_no', 'p.total_premium', 'p.purchase_date', 'p.expiry_date', 'c.name client', 'l.name partner', 'p.commission', 'p.commission_status', 'i.comm_type', 'p.od_premium', 'p.premium'];
	public $search_column = ['p.id', 'ip.title', 'p.policy_no', 'p.total_premium', 'p.purchase_date', 'p.expiry_date', 'c.name', 'l.name', 'p.commission', 'p.commission_status'];
    public $order_column = [null, 'ip.title', 'p.policy_no', 'p.total_premium', 'p.purchase_date', 'p.expiry_date', 'c.name', 'l.name', 'p.commission', 'p.commission_status', null];
	public $order = ['p.id' => 'DESC'];

	public function make_query()
	{  
		if ($this->user->role == 'Partner') unset($this->order_column[8]);
		
		$this->db->select($this->select_column)
            	 ->from($this->table)
                 ->join('insurance_plans ip', 'ip.id = p.plan_id', 'left')
                 ->join('insurance i', 'i.id = ip.ins_id', 'left')
                 ->join('logins c', 'c.id = p.user_id', 'left')
                 ->join('logins l', 'l.id = p.partner_id', 'left');
				 
		if ($this->input->get('ins_type'))
			$this->db->where('ip.ins_type_id', d_id($this->input->get('ins_type')));
		if ($this->input->get('start_date'))
			$this->db->where('p.expiry_date >= ', $this->input->get('start_date'));
		if ($this->input->get('end_date'))
			$this->db->where('p.expiry_date <= ', $this->input->get('end_date'));

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
                 ->join('insurance_plans ip', 'ip.id = p.plan_id', 'left')
				 ->join('insurance i', 'i.id = ip.ins_id', 'left')
                 ->join('logins c', 'c.id = p.user_id', 'left')
                 ->join('logins l', 'l.id = p.partner_id', 'left');
				 
		if ($this->input->get('ins_type'))
			$this->db->where('ip.ins_type_id', d_id($this->input->get('ins_type')));
		if ($this->input->get('start_date'))
			$this->db->where('p.expiry_date >= ', $this->input->get('start_date'));
		if ($this->input->get('end_date'))
			$this->db->where('p.expiry_date <= ', $this->input->get('end_date'));
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

	public function commission($status=null, $branch_id=null)
	{
		$this->db->select('SUM(case when (i.comm_type = "NET") 
								THEN
									p.commission * p.premium / 100
								ELSE
									p.commission * p.od_premium / 100
								END)
								as rewards')
		         ->from($this->table)
				 ->join('insurance_plans ip', 'ip.id = p.plan_id', 'left')
				 ->join('insurance i', 'i.id = ip.ins_id', 'left')
				 ->join('logins c', 'c.id = p.user_id', 'left');
			
		if ($branch_id) $this->db->where('c.branch_id', $branch_id);
		if ($status) $this->db->where('p.commission_status', $status);
		if ($this->user->role == 'Partner') $this->db->where('p.partner_id', $this->session->auth);
		
		$commission = $this->db->get()->row_array();
		
		return $commission ? floor($commission['rewards']) : 0;
	}
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Plans_model extends MY_Model
{
	public $table = "insurance_plans ip";
	public $select_column = ['ip.id', 'ip.title', 'i.ins_type', 'ip.plan_type', 'c.company_name', 'ip.image'];
	public $search_column = ['ip.id', 'ip.title', 'i.ins_type', 'ip.plan_type', 'c.company_name'];
    public $order_column = [null, 'ip.title', 'i.ins_type', 'ip.plan_type', 'c.company_name', null];
	public $order = ['ip.id' => 'DESC'];

	public function make_query()
	{  
		$this->db->select($this->select_column)
            	 ->from($this->table)
				 ->where('ip.is_deleted', 0)
				 ->join('companies c', 'c.id = ip.com_id')
				 ->join('insurance i', 'i.id = ip.ins_id');
		
		if ($this->input->get('ins_type'))
			$this->db->where('ip.ins_type_id', d_id($this->input->get('ins_type')));

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('ip.id')
		         ->from($this->table)
				 ->where('ip.is_deleted', 0)
				 ->join('companies c', 'c.id = ip.com_id')
				 ->join('insurance i', 'i.id = ip.ins_id');
				 
		if ($this->input->get('ins_type'))
			$this->db->where('ip.ins_type_id', d_id($this->input->get('ins_type')));
		            	
		return $this->db->get()->num_rows();
	}
}
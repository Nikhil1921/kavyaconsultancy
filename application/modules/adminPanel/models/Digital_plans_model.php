<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Digital_plans_model extends MY_Model
{
	public $table = "digital_plans dp";
	public $select_column = ['dp.id', 'dp.planname', 'dp.price', 'dp.validity'];
	public $search_column = ['dp.id', 'dp.planname', 'dp.price', 'dp.validity'];
    public $order_column = [null, 'dp.planname', 'dp.price', 'dp.validity', null];
	public $order = ['dp.id' => 'DESC'];

	public function make_query()
	{  
		$this->db->select($this->select_column)
            	 ->from($this->table)
				 ->where('dp.is_deleted', 0);

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('dp.id')
		         ->from($this->table)
				 ->where('dp.is_deleted', 0);
		            	
		return $this->db->get()->num_rows();
	}
}
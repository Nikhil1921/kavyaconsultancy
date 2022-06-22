<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Digital_business_model extends MY_Model
{
	public $table = "digital_business b";
	public $select_column = ['b.id', 'b.name', 'b.mobile', 'b.email', 'b.address', 'b.logo'];
	public $search_column = ['b.id', 'b.name', 'b.mobile', 'b.email', 'b.address'];
    public $order_column = [null, 'b.name', 'b.mobile', 'b.email', 'b.address', null];
	public $order = ['b.id' => 'DESC'];

	public function make_query()
	{  
		$this->db->select($this->select_column)
            	 ->from($this->table)
                 ->where(['is_deleted' => 0]);

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('b.id')
		         ->from($this->table)
                 ->where(['is_deleted' => 0]);
		            	
		return $this->db->get()->num_rows();
	}
}
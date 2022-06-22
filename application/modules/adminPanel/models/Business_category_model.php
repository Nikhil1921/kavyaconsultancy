<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Business_category_model extends MY_Model
{
	public $table = "business_category c";
	public $select_column = ['c.id', 'c.c_name', 'c.c_type'];
	public $search_column = ['c.id', 'c.c_name', 'c.c_type'];
    public $order_column = [null, 'c.c_name', 'c.c_type', null];
	public $order = ['c.id' => 'DESC'];

	public function make_query()
	{  
		$this->db->select($this->select_column)
            	 ->from($this->table)
				 ->where('c.is_deleted', 0);

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('c.id')
		         ->from($this->table)
				 ->where('c.is_deleted', 0);
		            	
		return $this->db->get()->num_rows();
	}
}
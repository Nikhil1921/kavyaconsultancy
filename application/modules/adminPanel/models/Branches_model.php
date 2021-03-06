<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Branches_model extends MY_Model
{
	public $table = "branches b";
	public $select_column = ['b.id', 'b.b_name', 'b.owner', 'b.mobile', 'b.email', 'b.state', 'b.city'];
	public $search_column = ['b.id', 'b.b_name', 'b.owner', 'b.mobile', 'b.email', 'b.state', 'b.city'];
    public $order_column = [null, 'b.b_name', 'b.owner', 'b.mobile', 'b.email', 'b.state', 'b.city', null];
	public $order = ['b.id' => 'DESC'];

	public function make_query()
	{  
		$this->db->select($this->select_column)
            	 ->from($this->table)
				 ->where('b.is_deleted', 0);

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('b.id')
		         ->from($this->table)
				 ->where('b.is_deleted', 0);
		            	
		return $this->db->get()->num_rows();
	}
}
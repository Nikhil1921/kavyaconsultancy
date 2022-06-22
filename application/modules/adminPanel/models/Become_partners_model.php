<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Become_partners_model extends MY_Model
{
	public $table = "become_partners p";
	public $select_column = ['p.id', 'p.name', 'p.mobile','p.email'];
	public $search_column = ['p.id', 'p.name', 'p.mobile','p.email'];
    public $order_column = [null, 'p.name', 'p.mobile','p.email', null];
	public $order = ['p.id' => 'DESC'];

	public function make_query()
	{  
		$this->db->select($this->select_column)
            	 ->from($this->table)
                 ->where('p.is_deleted', 0);

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('p.id')
		         ->from($this->table)
                 ->where('p.is_deleted', 0);
		            	
		return $this->db->get()->num_rows();
	}
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class News_model extends MY_Model
{
	public $table = "news n";
	public $select_column = ['n.id', 'n.title', 'n.image'];
	public $search_column = ['n.id', 'n.title'];
    public $order_column = [null, 'n.title', null];
	public $order = ['n.id' => 'DESC'];

	public function make_query()
	{  
		$this->db->select($this->select_column)
            	 ->from($this->table)
				 ->where('n.is_deleted', 0);

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('n.id')
		         ->from($this->table)
				 ->where('n.is_deleted', 0);
		            	
		return $this->db->get()->num_rows();
	}
}
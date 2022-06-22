<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Downloads_model extends MY_Model
{
	public $table = "downloads d";
	public $select_column = ['d.id', 'd.title', 'd.d_type'];
	public $search_column = ['d.id', 'd.title', 'd.d_type'];
    public $order_column = [null, 'd.title', 'd.d_type', null];
	public $order = ['d.id' => 'DESC'];

	public function make_query()
	{  
		$this->db->select($this->select_column)
            	 ->from($this->table);

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('d.id')
		         ->from($this->table);
		            	
		return $this->db->get()->num_rows();
	}
}
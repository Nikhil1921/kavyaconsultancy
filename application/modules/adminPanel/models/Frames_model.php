<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Frames_model extends MY_Model
{
	public $table = "business_frames b";
	public $select_column = ['b.id', 'b.frame', 'c.c_name', 'b.c_type'];
	public $search_column = ['b.id', 'b.frame', 'c.c_name', 'b.c_type'];
    public $order_column = [null, 'b.frame', 'c.c_name', 'b.c_type', null];
	public $order = ['b.id' => 'DESC'];

	public function make_query()
	{  
		$this->db->select($this->select_column)
            	 ->from($this->table)
				 ->where(['b.is_deleted' => 0])
				 ->join('business_category c', 'c.id = b.c_id');

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('b.id')
		         ->from($this->table)
				 ->where(['b.is_deleted' => 0])
				 ->join('business_category c', 'c.id = b.c_id');
		            	
		return $this->db->get()->num_rows();
	}
}
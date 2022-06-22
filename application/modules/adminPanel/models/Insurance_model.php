<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Insurance_model extends MY_Model
{
	public $table = "insurance i";
	public $select_column = ['i.id', 'i.ins_type', 'i.image'];
	public $search_column = ['i.id', 'i.ins_type'];
    public $order_column = [null, 'i.ins_type', null];
	public $order = ['i.id' => 'DESC'];

	public function make_query()
	{  
		$this->db->select($this->select_column)
            	 ->from($this->table)
				 ->where('i.is_deleted', 0);
				 
		if ($this->input->get('ins_type'))
			$this->db->where('i.parent_id', d_id($this->input->get('ins_type')));

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('i.id')
		         ->from($this->table)
				 ->where('i.is_deleted', 0);
				 
		if ($this->input->get('ins_type'))
			$this->db->where('i.parent_id', d_id($this->input->get('ins_type')));
		            	
		return $this->db->get()->num_rows();
	}

	
	public function get_commission()
	{
		$this->db->select('i.id, CONCAT(i.ins_type, " Insurance") ins_type')
		         ->from($this->table)
				 ->where(['i.is_deleted' => 0, 'parent_id != ' => 0]);

		$return = array_map(function($arr){
			$comm = 0;
			if ($this->input->get('user_id'))
				$comm = $this->check('commissions', ['user_id' => d_id($this->input->get('user_id')), 'ins_id' => $arr['id']], 'commission');

			return [
				'id' 	     => e_id($arr['id']),
				'ins_type'   => $arr['ins_type'],
				'commission' => $comm ? $comm : 0
			];

		}, $this->db->get()->result_array());
		
		return $return;
	}
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Vehicle_documents_model extends MY_Model
{
	public $table = "vehicle_documents v";
	public $select_column = ['v.id', 'v.document_name', 'v.expiry_date', 'v.image'];
	public $search_column = ['v.id', 'v.document_name', 'v.expiry_date', 'v.image'];
    public $order_column = [null, 'v.document_name', 'v.expiry_date', null];
	public $order = ['v.id' => 'DESC'];

	public function make_query()
	{  
		
        $veh_id = $this->input->get('ins_type') ? $this->input->get('ins_type') : ($this->uri->segment(4) != null ? 0 : null);
		
		$this->db->select($this->select_column)
            	 ->from($this->table)
				 ->where('v.is_deleted', 0);
		
		if ($veh_id !== null) $this->db->where('v.veh_id', d_id($veh_id));

        $this->datatable();
	}

	public function count()
	{
        $veh_id = $this->input->get('ins_type') ? $this->input->get('ins_type') : ($this->uri->segment(4) != null ? 0 : null);

		$this->db->select('v.id')
		         ->from($this->table)
				 ->where('v.is_deleted', 0);
		
		if ($veh_id !== null) $this->db->where('v.veh_id', d_id($veh_id));
			
		return $this->db->get()->num_rows();
	}
}
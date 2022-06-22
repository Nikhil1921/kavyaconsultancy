<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class User_documents_model extends MY_Model
{
	public $table = "user_documents d";
	public $select_column = ['d.id', 'd.document_name', 'd.expiry_date', 'd.notification', 'd.image'];
	public $search_column = ['d.id', 'd.document_name', 'd.expiry_date', 'd.notification', 'd.image'];
    public $order_column = [null, 'd.document_name', 'd.expiry_date', 'd.notification', null];
	public $order = ['d.id' => 'DESC'];

	public function make_query()
	{  
        $user_id = $this->input->get('ins_type') ? $this->input->get('ins_type') : 0;
		
		$this->db->select($this->select_column)
            	 ->from($this->table)
				 ->where('d.is_deleted', 0);

        if ($user_id) $this->db->where('d.user_id', d_id($user_id));

        if ($this->input->get('doc_type')) $this->db->where('d.doc_type', $this->input->get('doc_type'));

        $this->datatable();
	}

	public function count()
	{
        $user_id = $this->input->get('ins_type') ? $this->input->get('ins_type') : 0;
		
		$this->db->select('d.id')
		         ->from($this->table)
				 ->where('d.is_deleted', 0);
		
		if ($user_id) $this->db->where('d.user_id', d_id($user_id));
		
		if ($this->input->get('doc_type')) $this->db->where('d.doc_type', $this->input->get('doc_type'));
		
		return $this->db->get()->num_rows();
	}
}
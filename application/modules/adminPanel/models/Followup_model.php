<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Followup_model extends MY_Model
{
	public $table = "followups f";
	public $select_column = ['l.name', 'l.mobile', 'f.remarks', 'f.created_at', 's.name user_name'];
	public $search_column = ['l.name', 'l.mobile', 'f.remarks', 'f.created_at', 's.name'];
    public $order_column = [null, 'l.name', 'l.mobile', 'f.remarks', 'f.created_at', 's.name', null];
	public $order = ['f.created_at' => 'DESC'];

	public function make_query()
	{  
		$this->db->select($this->select_column)
            	 ->from($this->table)
                 ->where(['status' => $this->input->get('ins_type')])
                 ->join('logins l', 'l.id = f.u_id')
                 ->join('logins s', 's.id = f.staff_id', 'left');
		
		switch ($this->session->role) {
            case 'Sales person':
                $this->db->where('l.staff_id', $this->session->auth);
                break;
            case 'Partner':
                $this->db->where('l.partner_id', $this->session->auth);
                break;
            
            default:
                break;
        }

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('f.created_at')
		         ->from($this->table)
                 ->where(['status' => $this->input->get('ins_type')])
                 ->join('logins l', 'l.id = f.u_id')
                 ->join('logins s', 's.id = f.staff_id', 'left');
		
		switch ($this->session->role) {
            case 'Sales person':
                $this->db->where('l.staff_id', $this->session->auth);
                break;
            case 'Partner':
                $this->db->where('l.partner_id', $this->session->auth);
                break;
            
            default:
                break;
        }

		return $this->db->get()->num_rows();
	}
}
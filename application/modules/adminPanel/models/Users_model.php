<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Users_model extends MY_Model
{
	public $table = "logins l";
	public $select_column = ['l.id', 'l.name', 'l.mobile', 'l.email', 'b.b_name', 'l.role', 'l.is_activated'];
	public $search_column = ['l.id', 'l.name', 'l.mobile', 'l.email', 'b.b_name'];
    public $order_column = [null, 'l.name', 'l.mobile', 'l.email', 'b.b_name', null];
	public $order = ['l.id' => 'DESC'];

	public function make_query()
	{  
		$this->db->select($this->select_column)
            	 ->from($this->table)
				 ->where(['l.is_deleted' => 0, 'l.id !=' => $this->session->auth])
                 ->join('branches b', 'b.id = l.branch_id', 'left');
		
		switch ($this->session->branch_id) {
            case 0:
                break;
            
            default:
                $this->db->where('l.branch_id', $this->session->branch_id);
                break;
        }

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

		if ($this->input->get('ins_type'))
			$this->db->where('l.role', $this->input->get('ins_type'));

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('l.id')
		         ->from($this->table)
				 ->where(['l.is_deleted' => 0, 'l.id !=' => $this->session->auth])
                 ->join('branches b', 'b.id = l.branch_id', 'left');

		switch ($this->session->branch_id) {
            case 0:
                
                break;
            
            default:
                $this->db->where('l.branch_id', $this->session->branch_id);
                break;
        }

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

		if ($this->input->get('ins_type'))
			$this->db->where('l.role', $this->input->get('ins_type'));
		            	
		return $this->db->get()->num_rows();
	}

	public function addUser($table)
	{
		$post = [
    			'mobile'   	 => $this->input->post('mobile'),
    			'email'   	 => $this->input->post('email'),
    			'name'   	 => $this->input->post('name'),
    			'role'   	 => $this->input->post('role'),
                'branch_id'  => d_id($this->input->post('branch_id')),
                'password'   => my_crypt($this->input->post('password'))
    		];
		
		$this->db->trans_start();
		$this->db->insert($table, $post);
		
        if ($this->input->post('commission')) {
            $data = [];
            foreach ($this->input->post('commission') as $k => $v)
				if($v !== false) $data[] = ['ins_id' => d_id($k), 'commission' => $v, 'user_id' => $this->db->insert_id()];
            
			$this->db->insert_batch('commissions', $data);
        }
		
        $this->db->trans_complete();
        
		return $this->db->trans_status();
	}

	public function updateUser($table, $user_id)
	{
		$post = [
    			'mobile'   	 => $this->input->post('mobile'),
    			'email'   	 => $this->input->post('email'),
    			'name'   	 => $this->input->post('name'),
    			'role'   	 => $this->input->post('role'),
                'branch_id'  => d_id($this->input->post('branch_id'))
    		];
		
		if ($this->input->post('password'))
            $post['password'] = my_crypt($this->input->post('password'));

		$this->db->trans_start();
		$this->db->where(['id' => $user_id])->update($table, $post);
        
        if ($this->input->post('commission')) {
			$this->db->delete('commissions', ['user_id' => $user_id]);
            $data = [];
            foreach ($this->input->post('commission') as $k => $v)
				if($v !== false) $data[] = ['ins_id' => d_id($k), 'commission' => $v, 'user_id' => $user_id];
            $this->db->insert_batch('commissions', $data);
        }
		
        $this->db->trans_complete();
        
		return $this->db->trans_status();
	}

	public function users_count()
	{
		$this->db->select('l.id')
		         ->from($this->table)
				 ->where(['l.is_deleted' => 0, 'l.id !=' => $this->session->auth])
				 ->where(['l.role != ' => 'User'])
                 ->join('branches b', 'b.id = l.branch_id', 'left');

		switch ($this->session->branch_id) {
            case 0:
                
                break;
            
            default:
                $this->db->where('l.branch_id', $this->session->branch_id);
                break;
        }

		switch ($this->session->role) {
            case 'Accountant':
                $this->db->where('l.role', 'Partner');
                break;
            
            default:
                break;
        }

		return $this->db->get()->num_rows();
	}

	public function leads_count()
	{
		$this->db->select('l.id')
		         ->from($this->table)
				 ->where(['l.is_deleted' => 0])
				 ->where(['l.role' => 'User'])
                 ->join('branches b', 'b.id = l.branch_id', 'left');

		switch ($this->session->branch_id) {
            case 0:
                break;
            
            default:
                $this->db->where('l.branch_id', $this->session->branch_id);
                break;
        }

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
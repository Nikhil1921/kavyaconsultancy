<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Admin_controller  {

	private $table = 'logins';
	protected $redirect = 'users';
	protected $title = 'User';
	protected $name = 'users';
	
	public function index()
	{
        check_access($this->name, 'view');
		$data['title'] = $this->title;
        $data['name'] = $this->name;
        $data['url'] = $this->redirect;
        $data['operation'] = "List";
        $data['datatable'] = "$this->redirect/get";
		
		return $this->template->load('template', "$this->redirect/home", $data);
	}

	public function get()
    {
        check_ajax();
        $this->load->model('Users_model', 'data');
        $fetch_data = $this->data->make_datatables();
        $sr = $_GET['start'] + 1;
        $data = [];
        $update = verify_access($this->name, 'update');
        $delete = verify_access($this->name, 'delete');
        $commission = verify_access($this->name, 'commission');
        foreach($fetch_data as $row)
        {
            $sub_array = [];
            $sub_array[] = $sr;
            $sub_array[] = $row->name;
            $sub_array[] = $row->mobile;
            $sub_array[] = $row->email ? $row->email : 'Not Given';
            $sub_array[] = $row->b_name ? $row->b_name : 'Main Branch';
            
            $action = '<div class="btn-group" role="group"><button class="btn btn-success dropdown-toggle" id="btnGroupVerticalDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="icon-settings"></span></button><div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start">';
            if ($update)
                $action .= anchor($this->redirect."/update/".e_id($row->id), '<i class="fa fa-edit"></i> Edit</a>', 'class="dropdown-item"');
            if ($commission && $this->input->get('ins_type') == 'Partner')
                $action .= form_open($this->redirect.'/commission', 'id="'.e_id($row->id).'"', ['id' => e_id($row->id)]).
                    '<a class="dropdown-item" onclick="script.delete('.e_id($row->id).'); return false;" href=""><i class="fa fa-money"></i> Clear Rewards</a>'.
                    form_close();
            if ($delete)
                $action .= form_open($this->redirect.'/delete', 'id="'.e_id($row->id).'"', ['id' => e_id($row->id)]).
                    '<a class="dropdown-item" onclick="script.delete('.e_id($row->id).'); return false;" href=""><i class="fa fa-trash"></i> Delete</a>'.
                    form_close();

            $action .= '</div></div>';
            $sub_array[] = $action;

            $data[] = $sub_array;
            $sr++;
        }

        $output = [
            "draw"              => intval($_GET["draw"]),  
            "recordsTotal"      => $this->data->count(),
            "recordsFiltered"   => $this->data->get_filtered_data(),
            "data"              => $data
        ];
        
        die(json_encode($output));
    }

	public function add()
	{
        check_access($this->name, 'add');
        $this->form_validation->set_rules($this->validate);

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = $this->title;
            $data['name'] = $this->name;
            $data['operation'] = "Add";
            $data['url'] = $this->redirect;
            $data['branches'] = $this->main->getall('branches', 'id, b_name', ['is_deleted' => 0]);
            
            return $this->template->load('template', "$this->redirect/form", $data);
        }else{
            $this->load->model('Users_model');
            
            $id = $this->Users_model->addUser($this->table);

            flashMsg($id, "$this->title added.", "$this->title not added. Try again.", $this->redirect);
        }
	}

	public function update($id)
	{
        check_access($this->name, 'update');
        $this->form_validation->set_rules($this->validate);

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = $this->title;
            $data['name'] = $this->name;
            $data['operation'] = "Update";
            $data['url'] = $this->redirect;
            $data['branches'] = $this->main->getall('branches', 'id, b_name', ['is_deleted' => 0]);
            $data['data'] = $this->main->get($this->table, 'id, mobile, email, name, role, branch_id', ['id' => d_id($id)]);
            
            return $this->template->load('template', "$this->redirect/form", $data);
        }else{
            $this->load->model('Users_model');
            
            $id = $this->Users_model->updateUser($this->table, d_id($id));

            flashMsg($id, "$this->title updated.", "$this->title not updated. Try again.", $this->redirect);
        }
	}

	public function commission()
	{
        check_access($this->name, 'commission');

        $this->form_validation->set_rules('id', 'id', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE)
            flashMsg(0, "", "Some required fields are missing.", $this->redirect);
        else{
            $where = ['commission_status' => 'Pending', 'partner_id' => d_id($this->input->post('id'))];
            
            $id = $this->main->update($where, ['commission_status' => 'Paid'], "purchase_plan");
            
            flashMsg($id, "Rewards cleared.", "Rewards not cleared.", $this->redirect);
        }
	}

	public function delete()
    {
        check_access($this->name, 'delete');
        $this->form_validation->set_rules('id', 'id', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE)
            flashMsg(0, "", "Some required fields are missing.", $this->redirect);
        else{
            $id = $this->main->update(['id' => d_id($this->input->post('id'))], ['is_deleted' => 1], $this->table);
            flashMsg($id, "$this->title deleted.", "$this->title not deleted.", $this->redirect);
        }
    }

    public function mobile_check($str)
    {   
        $where = ['mobile' => $str, 'id != ' => d_id($this->uri->segment(4)), 'is_deleted' => 0, 'role' => $this->input->post('role')];
        
        if ($this->main->check($this->table, $where, 'id'))
        {
            $this->form_validation->set_message('mobile_check', 'The %s is already in use');
            return FALSE;
        } else
            return TRUE;
    }

    public function email_check($str)
    {   
        $where = ['email' => $str, 'id != ' => d_id($this->uri->segment(4)), 'is_deleted' => 0, 'role' => $this->input->post('role')];
        
        if ($this->main->check($this->table, $where, 'id'))
        {
            $this->form_validation->set_message('email_check', 'The %s is already in use');
            return FALSE;
        } else
            return TRUE;
    }

    public function password_check($str)
    {   
        if (! $str && ! $this->uri->segment(4))
        {
            $this->form_validation->set_message('password_check', '%s is required');
            return FALSE;
        } else
            return TRUE;
    }

    protected $validate = [
        [
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required|max_length[255]',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 255 chars allowed"
            ],
        ],
        [
            'field' => 'mobile',
            'label' => 'Mobile',
            'rules' => 'required|numeric|exact_length[10]|callback_mobile_check',
            'errors' => [
                'required' => "%s is required",
                'numeric' => "%s is invalid",
                'exact_length' => "%s is invalid",
            ],
        ],
        [
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|max_length[255]|callback_email_check',
            'errors' => [
                'required' => "%s is required",
                'numeric' => "%s is invalid",
                'max_length' => "Max 255 chars allowed"
            ],
        ],
        [
            'field' => 'role',
            'label' => 'Role',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is required"
            ],
        ],
        [
            'field' => 'branch_id',
            'label' => 'Branch',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is required"
            ],
        ],
        [
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'callback_password_check|max_length[255]',
            'errors' => [
                'max_length' => "Max 255 chars allowed"
            ],
        ]
    ];
}
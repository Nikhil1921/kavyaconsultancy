<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Leads extends Admin_controller  {

	private $table = 'logins';
	protected $redirect = 'leads';
	protected $follow_table = 'followups';
	protected $title = 'Lead';
	protected $name = 'leads';
	
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
        $assign = verify_access($this->name, 'assign');
        $followup = verify_access($this->name, 'followup');
        $plan = verify_access($this->name, 'purchase plan');
        $veh_documents = verify_access($this->name, 'vehicle documents');
        $documents = verify_access($this->name, 'user documents');
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

            $action .= anchor($this->redirect."/details/".e_id($row->id), '<i class="fa fa-user"></i> User Details</a>', 'class="dropdown-item"');
            
            if ($update && ! $row->is_activated)
                $action .= anchor($this->redirect."/update/".e_id($row->id), '<i class="fa fa-edit"></i> Edit</a>', 'class="dropdown-item"');
            if ($assign && ! $row->is_activated)
                $action .= anchor($this->redirect."/assign/".e_id($row->id), '<i class="fa fa-user"></i> Assign Staff</a>', 'class="dropdown-item"');
            if ($followup)
                $action .= anchor($this->redirect."/followup/".e_id($row->id), '<i class="fa fa-users"></i> Follow up</a>', 'class="dropdown-item"');
            if ($plan)
                $action .= anchor($this->redirect."/purchase-plan/".e_id($row->id), '<i class="fa fa-money"></i> Purchase plan</a>', 'class="dropdown-item"');
            if ($veh_documents)
                $action .= anchor($this->redirect."/vehicle-documents/".e_id($row->id), '<i class="fa fa-truck"></i> Vehicle Documents</a>', 'class="dropdown-item"');
            if ($documents)
                $action .= anchor($this->redirect."/documents/".e_id($row->id), '<i class="fa fa-briefcase"></i> User Documents</a>', 'class="dropdown-item"');
            
            /* $action .= form_open($this->redirect.'/delete', 'id="'.e_id($row->id).'"', ['id' => e_id($row->id)]).
                '<a class="dropdown-item" onclick="script.delete('.e_id($row->id).'); return false;" href=""><i class="fa fa-trash"></i> Delete</a>'.
                form_close(); */

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
            $post = [
    			'mobile'   	 => $this->input->post('mobile'),
    			'email'   	 => $this->input->post('email'),
    			'name'   	 => $this->input->post('name'),
    			'role'   	 => "User",
    			'staff_id'   => $this->user->role == 'Sales person' ? $this->session->auth : 0,
    			'partner_id' => $this->user->role == 'Partner' ? $this->session->auth : 0,
                'branch_id'  => d_id($this->input->post('branch_id')),
                'password'   => my_crypt('123456')
    		];
            
            $id = $this->main->add($post, $this->table);

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
            $data['data'] = $this->main->get($this->table, 'mobile, email, name, role, branch_id', ['id' => d_id($id)]);
            
            return $this->template->load('template', "$this->redirect/form", $data);
        }else{
            $post = [
    			'mobile'   	 => $this->input->post('mobile'),
    			'email'   	 => $this->input->post('email'),
    			'name'   	 => $this->input->post('name'),
    			'role'   	 => "User",
                'branch_id'  => d_id($this->input->post('branch_id'))
    		];
            
            $id = $this->main->update(['id' => d_id($id)], $post, $this->table);

            flashMsg($id, "$this->title updated.", "$this->title not updated. Try again.", $this->redirect);
        }
	}
	
    public function assign($id)
	{
        check_access($this->name, 'assign');
        $this->form_validation->set_rules('staff_id', 'Staff', 'required|numeric');

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = $this->title;
            $data['name'] = $this->name;
            $data['operation'] = "Assign Staff";
            $data['url'] = $this->redirect;
            $data['data'] = $this->main->get($this->table, 'staff_id, branch_id', ['id' => d_id($id)]);
            $data['users'] = $this->main->getall('logins', 'id, name', ['is_deleted' => 0, 'role' => 'Sales person', 'branch_id' => $data['data']['branch_id']]);
            
            return $this->template->load('template', "$this->redirect/assign", $data);
        }else{
            $post = [
                'staff_id'  => d_id($this->input->post('staff_id'))
    		];
            
            $id = $this->main->update(['id' => d_id($id)], $post, $this->table);

            flashMsg($id, "$this->title assigned.", "$this->title not assigned. Try again.", $this->redirect);
        }
	}
	
    public function followup($id)
	{
        check_access($this->name, 'followup');

        $this->form_validation->set_rules('remarks', 'Remarks', 'max_length[255]', ['max_length' => "Max 255 chars allowed."]);

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = 'followup';
            $data['name'] = $this->name;
            $data['operation'] = "list";
            $data['url'] = $this->redirect;
            $data['data'] = $this->main->get($this->table, 'mobile, email, name, is_activated', ['id' => d_id($id)]);
            $data['followups'] = $this->main->getall($this->follow_table, '', ['u_id' => d_id($id)]);
            
            return $this->template->load('template', "$this->redirect/followup", $data);
        }else{
            
            $f_id = $this->main->followup(d_id($id), $this->follow_table);
            
            flashMsg($f_id, "Followup added.", "Followup not added. Try again.", $this->redirect.'/followup/'.$id);
        }
	}

    public function vehicle_documents($id=null)
    {
        if ($this->input->is_ajax_request()) {
            
            $this->load->model('Vehicle_documents_model', 'data');
            $fetch_data = $this->data->make_datatables();
            $sr = $_GET['start'] + 1;
            $data = [];
            $path = $this->config->item('document');
            foreach($fetch_data as $row)
            {  
                $sub_array = [];
                $sub_array[] = $sr;
                $sub_array[] = $row->document_name;
                $sub_array[] = date('d-m-Y', strtotime($row->expiry_date));
                
                $action = '<div class="btn-group" role="group"><button class="btn btn-success dropdown-toggle" id="btnGroupVerticalDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="icon-settings"></span></button><div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start">';
                
                $action .= anchor($path.$row->image, '<i class="fa fa-eye"></i> View</a>', 'class="dropdown-item" target="_blank"');
                $action .= anchor($path.$row->image, '<i class="fa fa-download"></i> Download</a>', 'class="dropdown-item" download="download"');

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
        }else{
            check_access($this->name, 'vehicle documents');
            $data['title'] = 'vehicle documents';
            $data['name'] = 'vehicle-documents';
            $data['operation'] = "list";
            $data['url'] = $this->redirect;
            $data['datatable'] = "$this->redirect/vehicle_documents/$id";

            $data['vehicles'] = $this->main->getall("vehicles", 'id, reg_no', ['user_id' => d_id($id)]);
            
            return $this->template->load('template', "$this->redirect/vehicle_documents", $data);
        }
    }

    public function documents($id=null)
    {
        if ($this->input->is_ajax_request()) {
            $this->load->model('User_documents_model', 'data');
            $fetch_data = $this->data->make_datatables();
            $sr = $_GET['start'] + 1;
            $data = [];
            $path = $this->config->item('document');
            foreach($fetch_data as $row)
            {  
                $sub_array = [];
                $sub_array[] = $sr;
                $sub_array[] = $row->document_name;
                $sub_array[] = date('d-m-Y', strtotime($row->expiry_date));
                $sub_array[] = $row->notification;
                
                $action = '<div class="btn-group" role="group"><button class="btn btn-success dropdown-toggle" id="btnGroupVerticalDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="icon-settings"></span></button><div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start">';
                
                $action .= anchor($path.$row->image, '<i class="fa fa-eye"></i> View</a>', 'class="dropdown-item" target="_blank"');
                $action .= anchor($path.$row->image, '<i class="fa fa-download"></i> Download</a>', 'class="dropdown-item" download="download"');

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
        }else{
            check_access($this->name, 'user documents');

            $data['title'] = 'user documents';
            $data['name'] = 'user-documents';
            $data['operation'] = "list";
            $data['url'] = $this->redirect;
            $data['id'] = $id;
            $data['datatable'] = "$this->redirect/documents/$id";

            return $this->template->load('template', "$this->redirect/documents", $data);
        }
    }
    
    public function details($id)
    {
        $data['title'] = 'user';
        $data['name'] = 'user-details';
        $data['details']['motor'] = $this->main->getAll('motor_insurance', '*', ['lead_id' => d_id($id)]);
        $data['details']['life'] = $this->main->getAll('life_insurance', '*', ['lead_id' => d_id($id)]);
        $data['details']['health'] = $this->main->getAll('health_insurance', '*', ['lead_id' => d_id($id)]);
        $data['details']['other'] = $this->main->getAll('other_insurance', '*', ['lead_id' => d_id($id)]);
        $data['details']['misc'] = $this->main->getAll('misc_insurance', '*', ['lead_id' => d_id($id)]);
        
        $data['url'] = $this->redirect;
        $data['operation'] = 'details';

        return $this->template->load('template', "$this->redirect/details", $data);
    }

    public function mobile_check($str)
    {   
        $where = ['mobile' => $str, 'id != ' => d_id($this->uri->segment(4)), 'is_deleted' => 0, 'role' => "User"];
        
        if ($this->main->check($this->table, $where, 'id'))
        {
            $this->form_validation->set_message('mobile_check', 'The %s is already in use');
            return FALSE;
        } else
            return TRUE;
    }

    public function email_check($str)
    {   
        $where = ['email' => $str, 'id != ' => d_id($this->uri->segment(4)), 'is_deleted' => 0, 'role' => "User"];
        
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
            'field' => 'branch_id',
            'label' => 'Branch',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is required"
            ],
        ]
    ];
}
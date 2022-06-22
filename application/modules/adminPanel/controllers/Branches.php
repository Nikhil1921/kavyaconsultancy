<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Branches extends Admin_controller  {

	private $table = 'branches';
	protected $redirect = 'branches';
	protected $title = 'Branch';
	protected $name = 'branches';
	
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
        $this->load->model('Branches_model', 'data');
        $this->load->model('Purchased_plans_model');
        $fetch_data = $this->data->make_datatables();
        $sr = $_GET['start'] + 1;
        $data = [
            [$sr++, "Main Branch", "NA", "NA", "NA", "NA", "NA", 
            $this->Purchased_plans_model->commission('', 0),
            $this->Purchased_plans_model->commission('Pending', 0),
            $this->Purchased_plans_model->commission('Paid', 0), ""]
        ];
        $update = verify_access($this->name, 'update');
        $delete = verify_access($this->name, 'delete');
        foreach($fetch_data as $row)
        {  
            $sub_array = [];
            $sub_array[] = $sr;
            $sub_array[] = $row->b_name;
            $sub_array[] = $row->owner;
            $sub_array[] = $row->mobile;
            $sub_array[] = $row->email;
            $sub_array[] = $row->state;
            $sub_array[] = $row->city;
            $sub_array[] = $this->Purchased_plans_model->commission('', $row->id);
            $sub_array[] = $this->Purchased_plans_model->commission('Pending', $row->id);
            $sub_array[] = $this->Purchased_plans_model->commission('Paid', $row->id);
            
            $action = '<div class="btn-group" role="group"><button class="btn btn-success dropdown-toggle" id="btnGroupVerticalDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="icon-settings"></span></button><div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start">';
            if ($update)
                $action .= anchor($this->redirect."/update/".e_id($row->id), '<i class="fa fa-edit"></i> Edit</a>', 'class="dropdown-item"');
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
            
            return $this->template->load('template', "$this->redirect/form", $data);
        }else{
            $post = [
                'b_name'     => $this->input->post('b_name'),
                'owner'      => $this->input->post('owner'),
                'mobile'     => $this->input->post('mobile'),
                'email'      => $this->input->post('email'),
                'address'    => $this->input->post('address'),
                'city'       => $this->input->post('city'),
                'state'      => $this->input->post('state')
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
            $data['data'] = $this->main->get($this->table, 'b_name, owner, mobile, email, address, city, state', ['id' => d_id($id)]);
            
            return $this->template->load('template', "$this->redirect/form", $data);
        }else{
            $post = [
                'b_name'     => $this->input->post('b_name'),
                'owner'      => $this->input->post('owner'),
                'mobile'     => $this->input->post('mobile'),
                'email'      => $this->input->post('email'),
                'address'    => $this->input->post('address'),
                'city'       => $this->input->post('city'),
                'state'      => $this->input->post('state')
            ];
            
            $id = $this->main->update(['id' => d_id($id)], $post, $this->table);

            flashMsg($id, "$this->title updated.", "$this->title not updated. Try again.", $this->redirect);
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
        $where = ['mobile' => $str, 'id != ' => d_id($this->uri->segment(4)), 'is_deleted' => 0];
        
        if ($this->main->check($this->table, $where, 'id'))
        {
            $this->form_validation->set_message('mobile_check', 'The %s is already in use');
            return FALSE;
        } else
            return TRUE;
    }

    public function email_check($str)
    {   
        $where = ['email' => $str, 'id != ' => d_id($this->uri->segment(4)), 'is_deleted' => 0];
        
        if ($this->main->check($this->table, $where, 'id'))
        {
            $this->form_validation->set_message('email_check', 'The %s is already in use');
            return FALSE;
        } else
            return TRUE;
    }

    protected $validate = [
        [
            'field' => 'b_name',
            'label' => 'Branch name',
            'rules' => 'required|max_length[100]',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 100 chars allowed.",
            ],
        ],
        [
            'field' => 'owner',
            'label' => 'Branch owner',
            'rules' => 'required|max_length[100]',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 100 chars allowed.",
            ],
        ],
        [
            'field' => 'mobile',
            'label' => 'Contact person no.',
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
            'rules' => 'required|max_length[100]|callback_email_check',
            'errors' => [
                'required' => "%s is required",
                'numeric' => "%s is invalid",
                'max_length' => "Max 100 chars allowed"
            ],
        ],
        [
            'field' => 'address',
            'label' => 'Address',
            'rules' => 'required|max_length[255]',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 255 chars allowed"
            ],
        ],
        [
            'field' => 'city',
            'label' => 'City',
            'rules' => 'required|max_length[50]',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 50 chars allowed"
            ],
        ],
        [
            'field' => 'state',
            'label' => 'State',
            'rules' => 'required|max_length[50]',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 50 chars allowed"
            ],
        ],
    ];
}
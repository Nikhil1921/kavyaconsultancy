<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Insurance_plans extends Admin_controller  {

    public function __construct()
	{
		parent::__construct();
		$this->path = $this->config->item('plans');
	}

	private $table = 'insurance_plans';
	protected $redirect = 'insurance_plans';
	protected $title = 'Insurance plan';
	protected $name = 'insurance_plans';
	
	public function index()
	{
        check_access($this->name, 'view');
		$data['title'] = $this->title;
        $data['name'] = $this->name;
        $data['url'] = $this->redirect;
        $data['operation'] = "List";
        $data['datatable'] = "$this->redirect/get";
        $data['types'] = $this->main->getall('insurance', 'id, ins_type', ['is_deleted' => 0, 'parent_id' => 0]);
		
		return $this->template->load('template', "$this->redirect/home", $data);
	}

	public function get()
    {
        check_ajax();
        $this->load->model('Plans_model', 'data');
        $fetch_data = $this->data->make_datatables();
        $sr = $_GET['start'] + 1;
        $data = [];
        $update = verify_access($this->name, 'update');
        $delete = verify_access($this->name, 'delete');
        foreach($fetch_data as $row)
        {  
            $sub_array = [];
            $sub_array[] = $sr;
            $sub_array[] = $row->title;
            $sub_array[] = $row->ins_type;
            $sub_array[] = $row->plan_type;
            $sub_array[] = $row->company_name;
            
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
            $data['types'] = $this->main->getall("insurance", 'id, ins_type', ['is_deleted' => 0, 'parent_id' => 0]);
            $data['companies'] = $this->main->getall("companies", 'id, company_name', ['is_deleted' => 0]);
            
            return $this->template->load('template', "$this->redirect/form", $data);
        }else{
            $image = $this->uploadImage('image', 'pdf');
            
            if ($image['error'] == TRUE)
			    flashMsg(0, "", $image["message"], "$this->redirect/add");
            else{
                $post = [
                    'ins_type_id' => d_id($this->input->post('ins_type_id')),
                    'ins_id'      => d_id($this->input->post('ins_id')),
                    'com_id'      => d_id($this->input->post('com_id')),
                    'plan_type'   => $this->input->post('plan_type'),
                    'title'       => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'image'       => $image['message']
                ];
                
                $id = $this->main->add($post, $this->table);

                flashMsg($id, "$this->title added.", "$this->title not added. Try again.", $this->redirect);
            }
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
            $data['types'] = $this->main->getall("insurance", 'id, ins_type', ['is_deleted' => 0, 'parent_id' => 0]);
            $data['companies'] = $this->main->getall("companies", 'id, company_name', ['is_deleted' => 0]);
            $data['data'] = $this->main->get($this->table, 'ins_type_id, ins_id, com_id, plan_type, title, description, image', ['id' => d_id($id)]);
            
            return $this->template->load('template', "$this->redirect/form", $data);
        }else{
            $post = [
                    'ins_type_id' => d_id($this->input->post('ins_type_id')),
                    'ins_id'      => d_id($this->input->post('ins_id')),
                    'com_id'      => d_id($this->input->post('com_id')),
                    'plan_type'   => $this->input->post('plan_type'),
                    'title'       => $this->input->post('title'),
                    'description' => $this->input->post('description')
                ];

            if (!empty($_FILES['image']['name'])) {
                $image = $this->uploadImage('image', 'pdf');
                if ($image['error'] == TRUE)
                    flashMsg(0, "", $image["message"], "$this->redirect/update/$id");
                else{
                    if (file_exists($this->path.$this->input->post('image')))
                        unlink($this->path.$this->input->post('image'));
                    $post['image'] = $image['message'];
                }
            }
            
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

    protected $validate = [
        [
            'field' => 'ins_type_id',
            'label' => 'Insurance Type',
            'rules' => 'required|numeric',
            'errors' => [
                'required' => "%s is required",
                'numeric' => "%s is invalid.",
            ],
        ],
        [
            'field' => 'ins_id',
            'label' => 'Insurance',
            'rules' => 'required|numeric',
            'errors' => [
                'required' => "%s is required",
                'numeric' => "%s is invalid.",
            ],
        ],
        [
            'field' => 'com_id',
            'label' => 'Insurance Company',
            'rules' => 'required|numeric',
            'errors' => [
                'required' => "%s is required",
                'numeric' => "%s is invalid.",
            ],
        ],
        [
            'field' => 'plan_type',
            'label' => 'Plan Type',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is required"
            ],
        ],
        [
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'required|max_length[100]',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 100 chars allowed.",
            ],
        ],
        [
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is required"
            ],
        ]
    ];
}
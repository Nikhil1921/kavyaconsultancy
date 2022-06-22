<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Leads extends MY_Controller  {

    public function __construct()
	{
		parent::__construct();
        $this->load->helper('api');
	}

	private $table = 'logins';
	protected $follow_table = 'followups';
	protected $title = 'Lead';

	public function index()
	{
        get();
		$api = authenticate($this->table);
        verifyRequiredParams(["length", "start"]);

        $this->load->model('Leads_model', 'data');
        $row = $this->data->make_query($api);
        
        if ($row) {
			$response['row'] = $row;
			$response['error'] = false;
			$response['message'] = "Leads success.";
		}else{
			$response['error'] = true;
			$response['message'] = "Leads not success.";
		}

		echoRespnse(200, $response);
	}

	public function add()
	{
        post();
		$api = authenticate($this->table);
        $this->form_validation->set_rules($this->validate);
        
        if ($this->form_validation->run() == FALSE)
        {
            $response['error'] = true;
			$response['message'] = $this->form_validation->error_array();
        }else{
            $post = [
    			'mobile'   	 => $this->input->post('mobile'),
    			'email'   	 => $this->input->post('email'),
    			'name'   	 => $this->input->post('name'),
    			'role'   	 => "User",
    			'staff_id'   => 0,
    			'partner_id' => $api,
                'branch_id'  => $this->input->post('branch_id'),
                'password'   => my_crypt('123456')
    		];

            if ($this->main->add($post, $this->table)) {
				$response['error'] = false;
				$response['message'] = "$this->title added.";
			}else{
				$response['error'] = true;
				$response['message'] = "$this->title not added. Try again.";
			}
        }

        echoRespnse(200, $response);
	}

	public function update($id)
	{
        post();
        $api = authenticate($this->table);

        $this->form_validation->set_rules($this->validate);

        if ($this->form_validation->run() == FALSE)
        {
            $response['error'] = true;
			$response['message'] = $this->form_validation->error_array();
        }else{
            $post = [
    			'mobile'   	 => $this->input->post('mobile'),
    			'email'   	 => $this->input->post('email'),
    			'name'   	 => $this->input->post('name')
    		];

            if ($this->main->update(['id' => d_id($id)], $post, $this->table)) {
				$response['error'] = false;
				$response['message'] = "$this->title updated.";
			}else{
				$response['error'] = true;
				$response['message'] = "$this->title not updated. Try again.";
			}
        }

        echoRespnse(200, $response);
	}
	
    public function followup($id)
	{
        $row['data'] = $this->main->get($this->table, 'mobile, email, name', ['id' => $id]);
        $row['followups'] = $this->main->getall($this->follow_table, '', ['u_id' => $id]);
        
        if ($row) {
            $response['row'] = $row;
            $response['error'] = false;
            $response['message'] = "Followup success.";
        }else{
            $response['error'] = true;
            $response['message'] = "Followup not success. Try again.";
        }
        
        echoRespnse(200, $response);
	}

    public function mobile_check($str)
    {   
        $where = ['mobile' => $str, 'id != ' => $this->uri->segment(4), 'is_deleted' => 0, 'role' => "User"];
        
        if ($this->main->check($this->table, $where, 'id'))
        {
            $this->form_validation->set_message('mobile_check', 'The %s is already in use');
            return FALSE;
        } else
            return TRUE;
    }

    public function email_check($str)
    {   
        $where = ['email' => $str, 'id != ' => $this->uri->segment(4), 'is_deleted' => 0, 'role' => "User"];
        
        if ($this->main->check($this->table, $where, 'id'))
        {
            $this->form_validation->set_message('email_check', 'The %s is already in use');
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
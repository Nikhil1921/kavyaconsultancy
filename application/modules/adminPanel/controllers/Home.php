<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_controller  {

	private $table = 'logins';
	protected $redirect = '';
	
	public function index()
	{
		$data['title'] = 'dashboard';
        $data['name'] = 'dashboard';
        $data['url'] = $this->redirect;

        if(verify_access('banners', 'view')):
            $this->load->model('Banner_model', 'banners');
            $data['banners'] = $this->banners->count();
        endif;
        if(verify_access('news', 'view')):
            $this->load->model('News_model', 'news');
            $data['news'] = $this->news->count();
        endif;
        if(verify_access('insurance', 'view')):
            $this->load->model('Insurance_model', 'insurance');
            $data['insurance'] = $this->insurance->count();
        endif;
        if(verify_access('insurance_plans', 'view')):
            $this->load->model('Plans_model', 'plans');
            $data['plans'] = $this->plans->count();
        endif;
        if(verify_access('companies', 'view')):
            $this->load->model('Companies_model', 'companies');
            $data['companies'] = $this->companies->count();
        endif;
        /* if(verify_access('become_partners', 'view')):
            $this->load->model('Become_partners_model', 'partners');
            $data['partners'] = $this->partners->count();
        endif;
        if(verify_access('branches', 'view')):
            $this->load->model('Branches_model', 'branches');
            $data['branches'] = $this->branches->count();
        endif; */
        if(verify_access('users', 'view')):
            $this->load->model('Users_model', 'users');
            $data['users'] = $this->users->users_count();
        endif;
        if(verify_access('leads', 'view')):
            $this->load->model('Users_model', 'leads');
            $data['leads'] = $this->leads->leads_count();
        endif;
        /* if(in_array($this->user->role, ['Partner', 'Admin'])):
            $this->load->model('Purchased_plans_model');
            $data['commission'] = $this->Purchased_plans_model->commission();
            $data['pending_commission'] = $this->Purchased_plans_model->commission('Pending');
            $data['paid_commission'] = $this->Purchased_plans_model->commission('Paid');
        endif; */
        
        return $this->template->load('template', 'home', $data);
	}

	public function profile()
    {
        $this->form_validation->set_rules($this->profile);

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = 'profile';
            $data['name'] = 'dashboard';
            $data['operation'] = 'update';
            $data['url'] = $this->redirect;

            return $this->template->load('template', 'profile', $data);
        }
        else
        {
            $post = [
    			'mobile'   	 => $this->input->post('mobile'),
    			'email'   	 => $this->input->post('email'),
    			'name'   	 => $this->input->post('name')
    		];

            if ($this->input->post('password'))
                $post['password'] = my_crypt($this->input->post('password'));

            $id = $this->main->update(['id' => $this->session->auth], $post, $this->table);

            flashMsg($id, "Profile updated.", "Profile not updated. Try again.", $this->redirect."profile");
        }
    }

	public function logout()
    {
        $this->session->sess_destroy();
        return redirect(admin('login'));
    }

	public function commission_details()
    {
        if(! $this->user->role == 'Partner') return redirect(admin());
        
        if ($this->session->checkCommision)
        {
            $this->session->set_flashdata('checkCommision', true);
            $data['commissions'] = $this->main->commission_details($this->session->auth);
        }

        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $post = [
    			'id'   	     => $this->session->auth,
    			'password'   => my_crypt($this->input->post('password'))
    		];
            
    		$user = $this->main->get($this->table, 'id', $post);

            if ($user) {
    			$this->session->set_flashdata('checkCommision', true);
    			return redirect(admin('commission-details'));
    		}else{
    			$this->session->set_flashdata('error', 'Password not match.');
    			return redirect(admin('commission-details'));
    		}
        }

        $data['title'] = 'rewards details';
        $data['name'] = 'rewards details';
        $data['operation'] = 'view';
        $data['url'] = $this->redirect;
        
        return $this->template->load('template', 'commission_details', $data);
    }

	public function backup()
    {
        // Load the DB utility class
        $this->load->dbutil();
        
        // Backup your entire database and assign it to a variable
        $backup = $this->dbutil->backup();

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download(APP_NAME.'.zip', $backup);
        return redirect(admin());
    }

    public function mobile_check($str)
    {   
        $where = ['mobile' => $str, 'id != ' => $this->session->auth, 'is_deleted' => 0, 'role' => $this->user->role];
        
        if ($this->main->check($this->table, $where, 'id'))
        {
            $this->form_validation->set_message('mobile_check', 'The %s is already in use');
            return FALSE;
        } else
            return TRUE;
    }

    public function email_check($str)
    {   
        $where = ['email' => $str, 'id != ' => $this->session->auth, 'is_deleted' => 0, 'role' => $this->user->role];
        
        if ($this->main->check($this->table, $where, 'id'))
        {
            $this->form_validation->set_message('email_check', 'The %s is already in use');
            return FALSE;
        } else
            return TRUE;
    }

    protected $profile = [
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
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'max_length[255]',
            'errors' => [
                'max_length' => "Max 255 chars allowed"
            ],
        ]
    ];
}
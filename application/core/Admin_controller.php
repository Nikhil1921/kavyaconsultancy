<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Admin_controller extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->auth) 
			return redirect(admin('login'));

        $this->user = (object) $this->main->get("logins", 'name, role, mobile, email, branch_id', ['id' => $this->session->auth]);
		$this->redirect = admin($this->redirect);
	}

    public function get_insurance_list()
    {
        check_ajax();
        $return = array_map(function($ins){
            return ['val' => e_id($ins['id']), 'ins_type' => $ins['ins_type']];
        }, $this->main->getall("insurance", 'id, ins_type', ['is_deleted' => 0, 'parent_id' => d_id($this->input->get('parent_id'))]));
        
        die(json_encode($return));
    }

    public function get_category_list()
    {
        check_ajax();
        $return = array_map(function($ins){
            return ['val' => e_id($ins['id']), 'c_name' => $ins['c_name']];
        }, $this->main->getall("business_category", 'id, c_name', ['is_deleted' => 0, 'c_type' => $this->input->get('parent_id')]));
        
        die(json_encode($return));
    }

    public function get_commission()
    {
        check_ajax();
        $this->load->model('Insurance_model', 'insurance');
        $html = '<div class="row">';
        foreach($this->insurance->get_commission() as $commission):
            $html .= '<div class="col-6"><div class="form-group">';
            $html .= form_label($commission['ins_type'], 'commission_'.$commission['id'], 'class="col-form-label"');
            $html .= form_input([
                                    'class' => "form-control",
                                    'type'  => "number",
                                    'id'    => 'commission_'.$commission['id'],
                                    'name'  => "commission[".$commission['id']."]",
                                    'value' => $commission['commission']
                                ]);
            $html .= '</div></div>';
        endforeach;
        $html .= '</div>';
        die($html);
    }

    public function purchase_plan($id)
    {
        check_access('leads', 'purchase plan');

        $this->path = $this->config->item('purchase');

        $this->form_validation->set_rules($this->purchase_plan);

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = $this->title;
            $data['name'] = $this->name;
            $data['operation'] = "purchase plan";
            $data['url'] = $this->redirect;
            $data['data'] = $this->main->get("logins", 'mobile, email, name, partner_id, branch_id', ['id' => d_id($id)]);
            $users = ['is_deleted' => 0, 'role' => 'Partner', 'branch_id' => $data['data']['branch_id']];
            
            if (isset($data['data']['partner_id'])) $users['id'] = $data['data']['partner_id'];

            $data['users'] = $this->main->getall('logins', 'id, name', $users);
            $data['plans'] = $this->main->getall('insurance_plans', 'id, title', ['is_deleted' => 0]);
            
            return $this->template->load('template', "leads/purchase_plan", $data);
        }else{
            $image = $this->uploadImage('image', 'pdf');
            if ($image['error'] == TRUE)
			    flashMsg(0, "", $image["message"], "$this->redirect/purchase-plan/$id");
            else{
                $user_id = d_id($this->input->post('user_id'));
                $plan_id = d_id($this->input->post('plan_id'));
                $ins_id = $user_id ? $this->main->check('insurance_plans', ['id' => $plan_id], 'ins_id') : 0;
                $commission = $user_id ? $this->main->check('commissions', ['user_id' => $user_id, 'ins_id' => $ins_id], 'commission') : 0;
                
                $post = [
                    'plan_id'         => $plan_id,
                    'policy_no'       => $this->input->post('policy_no'),
                    'premium'         => $this->input->post('premium'),
                    'od_premium'      => $this->input->post('od_premium'),
                    'total_premium'   => $this->input->post('total_premium'),
                    'purchase_date'   => date('Y-m-d', strtotime($this->input->post('purchase_date'))),
                    'expiry_date'     => date('Y-m-d', strtotime($this->input->post('expiry_date'))),
                    'user_id'         => d_id($id),
                    'partner_id'      => $user_id,
                    'commission'      => $commission ? $commission : 0,
                    'policy_document' => $image['message']
                ];
                
                $id = $this->main->add($post, 'purchase_plan');

                flashMsg($id, "Plan purchase success.", "Plan purchase not success. Try again.", $this->redirect);
            }
        }
    }

    protected $purchase_plan = [
        [
            'field' => 'plan_id',
            'label' => 'Insurance plan',
            'rules' => 'required|numeric',
            'errors' => [
                'required' => "%s is required",
                'numeric' => "%s is invalid.",
            ],
        ],
        [
            'field' => 'policy_no',
            'label' => 'Policy no',
            'rules' => 'required|max_length[255]',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 255 chars allowed"
            ],
        ],
        [
            'field' => 'premium',
            'label' => 'Net Policy premium',
            'rules' => 'required|numeric',
            'errors' => [
                'required' => "%s is required",
                'numeric' => "%s is invalid.",
            ],
        ],
        [
            'field' => 'od_premium',
            'label' => 'OD Policy premium',
            'rules' => 'required|numeric',
            'errors' => [
                'required' => "%s is required",
                'numeric' => "%s is invalid.",
            ],
        ],
        [
            'field' => 'total_premium',
            'label' => 'Total Policy premium',
            'rules' => 'required|numeric',
            'errors' => [
                'required' => "%s is required",
                'numeric' => "%s is invalid.",
            ],
        ],
        [
            'field' => 'purchase_date',
            'label' => 'Purchase date',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is required"
            ],
        ],
        [
            'field' => 'expiry_date',
            'label' => 'Expiry date',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is required"
            ],
        ],
        [
            'field' => 'user_id',
            'label' => 'Partner',
            'rules' => 'numeric',
            'errors' => [
                'numeric' => "%s is invalid.",
            ],
        ],
    ];
}
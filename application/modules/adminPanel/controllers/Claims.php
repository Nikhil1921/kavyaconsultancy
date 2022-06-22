<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Claims extends Admin_controller  {

    public function __construct()
	{
		parent::__construct();
		$this->path = $this->config->item('purchase');
	}

	private $table = 'purchase_plan';
	private $follow_table = 'purchase_followups';
	protected $redirect = 'claims';
	protected $title = 'Claim';
	protected $name = 'claims';
	
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
        $this->load->model('Claims_model', 'data');
        $fetch_data = $this->data->make_datatables();
        $sr = $_GET['start'] + 1;
        $data = [];
        $followup = verify_access($this->name, 'followup');
        foreach($fetch_data as $row)
        {  
            $sub_array = [];
            $sub_array[] = $sr;
            $sub_array[] = $row->title;
            $sub_array[] = $row->policy_no;
            $sub_array[] = $row->client;
            $sub_array[] = $row->client_mobile;
            $sub_array[] = $row->claim_status;
            
            $action = '<div class="btn-group" role="group"><button class="btn btn-success dropdown-toggle" id="btnGroupVerticalDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="icon-settings"></span></button><div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start">';
            
            if($followup)
                $action .= anchor($this->redirect."/followup/".e_id($row->id), '<i class="fa fa-users"></i> Follow Up</a>', 'class="dropdown-item"');
                
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
            $data['data'] = $this->main->get($this->table, 'policy_no, purchase_date, expiry_date', ['id' => d_id($id)]);
            $data['followups'] = $this->main->getall($this->follow_table, '', ['claim_id' => d_id($id)]);
            
            return $this->template->load('template', "$this->redirect/followup", $data);
        }else{
            
            $f_id = $this->main->purchase_followup(d_id($id), $this->table, $this->follow_table);
            
            flashMsg($f_id, "Followup added.", "Followup not added. Try again.", $this->redirect.'/followup/'.$id);
        }
	}
}
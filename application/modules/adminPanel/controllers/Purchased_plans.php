<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Purchased_plans extends Admin_controller  {

    public function __construct()
	{
		parent::__construct();
		$this->path = $this->config->item('purchase');
	}

	private $table = 'purchase_plan';
	protected $redirect = 'purchased_plans';
	protected $title = 'Purchased plan';
	protected $name = 'purchased_plans';
	
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
        $this->load->model('Purchased_plans_model', 'data');
        $fetch_data = $this->data->make_datatables();
        $sr = $_GET['start'] + 1;
        $data = [];
        foreach($fetch_data as $row)
        {  
            $sub_array = [];
            $sub_array[] = $sr;
            $sub_array[] = $row->title;
            $sub_array[] = $row->policy_no;
            $sub_array[] = "$row->premium + $row->od_premium = $row->total_premium";
            $sub_array[] = date('d-m-Y', strtotime($row->purchase_date));
            $sub_array[] = date('d-m-Y', strtotime($row->expiry_date));
            $sub_array[] = $row->client;
            if (in_array($this->user->role, ['Admin', 'Accountant'])):
                $sub_array[] = $row->partner ? $row->partner : 'Direct Customer';
                $comm = $row->comm_type == 'NET' ? $row->premium : $row->od_premium;
                $sub_array[] = $row->partner ? $comm * $row->commission / 100 : 'Direct Customer';
                $sub_array[] = $row->partner ? $row->commission_status : 'Direct Customer';
            endif;
            
            /* $action = '<div class="btn-group" role="group"><button class="btn btn-success dropdown-toggle" id="btnGroupVerticalDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="icon-settings"></span></button><div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start">';
            
            $action .= anchor($this->redirect."/update/".e_id($row->id), '<i class="fa fa-edit"></i> Edit</a>', 'class="dropdown-item"');
                
            $action .= '</div></div>';
            $sub_array[] = $action; */

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
}
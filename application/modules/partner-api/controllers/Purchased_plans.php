<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Purchased_plans extends MY_Controller  {

    public function __construct()
	{
		parent::__construct();
        $this->load->helper('api');
	}

	private $table = 'logins';
	protected $title = 'Purchased plans';

	public function index()
	{
        get();
		$api = authenticate($this->table);
        verifyRequiredParams(["length", "start", "ins_id"]);

        $this->load->model('Purchased_plans_model', 'data');
        $row = $this->data->make_query($api);
        
        if ($row) {
			$response['row'] = $row;
			$response['error'] = false;
			$response['message'] = "$this->title success.";
		}else{
			$response['error'] = true;
			$response['message'] = "$this->title not success.";
		}

		echoRespnse(200, $response);
	}
}
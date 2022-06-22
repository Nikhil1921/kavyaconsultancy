<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Followups extends MY_Controller  {

    public function __construct()
	{
		parent::__construct();
        $this->load->helper('api');
	}

	private $table = 'logins';
	protected $title = 'Followups';

	public function index()
	{
        get();
		$api = authenticate($this->table);
        verifyRequiredParams(["length", "start", "status"]);

        $this->load->model('Followups_model', 'data');
        $row = $this->data->make_query($api);
        
        if ($row) {
			$response['row'] = $row;
			$response['error'] = false;
			$response['message'] = "Followups success.";
		}else{
			$response['error'] = true;
			$response['message'] = "Followups not success.";
		}

		echoRespnse(200, $response);
	}
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller  {

    public function __construct()
	{
		parent::__construct();
        $this->load->helper('api');
	}

	private $table = 'logins';
	private $role = 'Partner';

	public function login()
	{
		post();
		verifyRequiredParams(["mobile", "password"]);

		$post = [
    			'mobile'   	 	=> $this->input->post('mobile'),
    			'role'   	 	=> $this->role,
    			'password'   	=> my_crypt($this->input->post('password')),
    			'is_deleted' 	=> 0
    		];
            
		if ($user = $this->main->get($this->table, 'id, name, mobile, email, branch_id', $post)) {
			$response['row'] = $user;
			$response['error'] = false;
			$response['message'] = "Login success.";
		}else{
			$response['error'] = true;
			$response['message'] = "Login not success.";
		}

		echoRespnse(200, $response);
	}
	
	public function profile()
	{
		get();
		$api = authenticate($this->table);
		
		if ($user = $this->main->get($this->table, 'id, name, mobile, email, branch_id', ['id' => $api])) {
			$response['row'] = $user;
			$response['error'] = false;
			$response['message'] = "Profile success.";
		}else{
			$response['error'] = true;
			$response['message'] = "Profile not success.";
		}

		echoRespnse(200, $response);
	}

	public function update_profile()
	{
		post();
		$api = authenticate($this->table);
		verifyRequiredParams(["name", "mobile", "email"]);
	
		if ($this->main->get($this->table, 'id', ['mobile' => $this->input->post('mobile'), 'is_deleted' => 0, 'id != ' => $api, 'role' => $this->role])) {
			$response['error'] = true;
			$response['message'] = "Mobile already in use.";
		} elseif ($this->main->get($this->table, 'id', ['email' => $this->input->post('email'), 'is_deleted' => 0, 'id != ' => $api, 'role' => $this->role])) {
			$response['error'] = true;
			$response['message'] = "Email already in use.";
		} else {
			$post = [
				'mobile'   		=> $this->input->post('mobile'),
				'name'   	    => $this->input->post('name'),
				'email'   	    => $this->input->post('email'),
				'update_at' 	=> date('Y-m-d H:i:s')
			];

			if ($this->main->update(['id' => $api], $post, $this->table)) {
				$response['error'] = false;
				$response['message'] = "Profile updated.";
			} else {
				$response['error'] = true;
				$response['message'] = "Profile not updated.";
			}
		}

		echoRespnse(200, $response);
	}

	public function forgot_password()
	{
		post();
		verifyRequiredParams(["mobile"]);

		$post = [
    			'mobile'   	 	=> $this->input->post('mobile'),
    			'role'   	 	=> $this->role,
    			'is_deleted' 	=> 0
    		];
            
		if ($user = $this->main->get($this->table, 'id', $post)) {
			$this->load->helper('string');
			$update = [
				'otp'   	 => random_string('numeric', 6),
				'otp'   	 => 999999,
				'update_at'  => date('Y-m-d H:i:s', strtotime('+5 minutes')),
			];
			if ($this->main->update(['id' => $user['id']], $update, $this->table) === true) {
				// send_sms(); // pendig because sms panel not available.
				$response['error'] = false;
				$response['message'] = "OTP send success.";
			}else{
				$response['error'] = true;
				$response['message'] = "OTP send not success.";
			}
		}else{
			$response['error'] = true;
			$response['message'] = "Mobile not registered or account blocked.";
		}

		echoRespnse(200, $response);
	}
	
	public function check_otp()
	{
		post();
		verifyRequiredParams(["mobile", 'otp']);

		$post = [
    			'mobile'   		=> $this->input->post('mobile'),
    			'otp'   	    => $this->input->post('otp'),
    			'role'   	 	=> $this->role,
    			'update_at >= ' => date('Y-m-d H:i:s')
    		];
            
		if ($user = $this->main->get($this->table, 'id', $post)) {
			
			$update = ['otp' => 0, 'is_varified' => 1];

			if ($this->main->update(['id' => $user['id']], $update, $this->table) === true) {
				$response['error'] = false;
				$response['message'] = "OTP check success.";
			}else{
				$response['error'] = true;
				$response['message'] = "OTP check not success.";
			}
		}else{
			$response['error'] = true;
			$response['message'] = "OTP expired or Invalid OTP.";
		}

		echoRespnse(200, $response);
	}
	
	public function change_password()
	{
		post();
		verifyRequiredParams(["mobile", "password"]);

		$post = [
    			'mobile'   		=> $this->input->post('mobile'),
    			'role'   	 	=> $this->role
    		];
         	
		$update = [
    			'password'   => my_crypt($this->input->post('password'))
    		];

		if ($this->main->update($post, $update, $this->table) === true) {
			$response['error'] = false;
			$response['message'] = "Password changed. Login with new password.";
		}else{
			$response['error'] = true;
			$response['message'] = "Password not changed. Try again.";
		}
		
		echoRespnse(200, $response);
	}

	public function error_404()
	{
		$response['error'] = true;
		$response['message'] = "The page you are attempting to reach is currently not available.";
		echoRespnse(404, $response);
	}

	public function commission_details()
	{
		get();
		$api = authenticate($this->table);

		if ($row['commissions'] = $this->main->commission_details($api)) {
			$response['row'] = $row;
			$response['error'] = false;
			$response['message'] = "Commission details success.";
		}else{
			$response['error'] = true;
			$response['message'] = "Commission details not success.";
		}

		echoRespnse(200, $response);
	}

	public function dashboard()
	{
		get();
		$api = authenticate($this->table);

		$row['commission'] = $this->main->commission($api);
		$row['pending_commission'] = $this->main->commission($api, 'Pending');
		$row['paid_commission'] = $this->main->commission($api, 'Paid');
		$this->load->model('Leads_model', 'leads');
		$row['leads'] = $this->leads->leads_count($api);

		if ($row) {
			$response['row'] = $row;
			$response['error'] = false;
			$response['message'] = "Dashboard success.";
		}else{
			$response['error'] = true;
			$response['message'] = "Dashboard not success.";
		}

		echoRespnse(200, $response);
	}

	public function insurance_types()
	{
		get();
		$api = authenticate($this->table);

		$row['insurance_types'] = $this->main->getall('insurance', 'id, ins_type', ['is_deleted' => 0, 'parent_id' => 0]);

		if ($row) {
			$response['row'] = $row;
			$response['error'] = false;
			$response['message'] = "Insurance types success.";
		}else{
			$response['error'] = true;
			$response['message'] = "Insurance types not success.";
		}

		echoRespnse(200, $response);
	}
}
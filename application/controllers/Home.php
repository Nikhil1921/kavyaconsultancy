<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		return redirect(admin());
	}

	public function index()
	{
		$data['name'] = 'home';
		$data['title'] = 'Home';
		
		return $this->template->load('template', "home", $data);
	}

	public function become_partner()
	{
		$data['name'] = 'become_partner';
		$data['title'] = 'Become Partner';
		$data['breads'] = [['title' => 'Become Partner']];
		$data['heading'] = '<span class="page_heading">Become</span> Partner';
		$data['validate'] = TRUE;

		return $this->template->load('template', "become_partner", $data);
	}

	public function contact()
	{
		$data['name'] = 'contact';
		$data['title'] = 'Contact Us';
		$data['breads'] = [['title' => 'Contact Us']];
		$data['heading'] = '<span class="page_heading">Contact</span> Us';
		$data['validate'] = TRUE;

		return $this->template->load('template', "contact", $data);
	}

	public function about_us()
	{
		$data['name'] = 'about_us';
		$data['title'] = 'About Us';
		$data['breads'] = [['title' => 'About Us']];
		$data['heading'] = '<span class="page_heading">About</span> Us';

		return $this->template->load('template', "about_us", $data);
	}

	public function mission_vision()
	{
		$data['name'] = 'mission_vision';
		$data['title'] = 'Mission & Vision';
		$data['breads'] = [['title' => 'Mission & Vision']];
		$data['heading'] = '<span class="page_heading">Mission & </span> Vision';

		return $this->template->load('template', "mission_vision", $data);
	}

	public function gallery()
	{
		$data['name'] = 'gallery';
		$data['title'] = 'Our Gallery';
		$data['breads'] = [['title' => 'Our Gallery']];
		$data['heading'] = '<span class="page_heading">Our </span>Gallery';

		return $this->template->load('template', "gallery", $data);
	}

	public function achievements()
	{
		$data['name'] = 'achievements';
		$data['title'] = 'Our Achievements';
		$data['breads'] = [['title' => 'Achievements']];
		$data['heading'] = '<span class="page_heading">Our </span>Achievements';

		return $this->template->load('template', "achievements", $data);
	}

	public function privacy()
	{
		$data['name'] = 'privacy';
		$data['title'] = 'Privacy Policy';
		$data['breads'] = [['title' => 'Privacy Policy']];
		$data['heading'] = '<span class="page_heading">Privacy </span>Policy';

		return $this->template->load('template', "privacy", $data);
	}

	public function terms()
	{
		$data['name'] = 'terms';
		$data['title'] = 'Terms Of Use';
		$data['breads'] = [['title' => 'Terms Of Use']];
		$data['heading'] = '<span class="page_heading">Terms </span>Of Use';

		return $this->template->load('template', "terms", $data);
	}
	
	public function refund()
	{
		$data['name'] = 'refund';
		$data['title'] = 'Refund policy';
		$data['breads'] = [['title' => 'Refund policy']];
		$data['heading'] = '<span class="page_heading">Refund </span>policy';

		return $this->template->load('template', "refund", $data);
	}

	public function news_blog()
	{
		$data['name'] = 'news_blog';
		$data['title'] = 'News & Blogs';
		$data['breads'] = [['title' => 'News & Blogs']];
		$data['heading'] = '<span class="page_heading">News & </span>Blogs';
		$data['news'] = $this->main->getAll('news', 'created_at, slug, title, CONCAT("'.$this->config->item('news').'", image) image', ['is_deleted' => 0]);
		
		return $this->template->load('template', "news_blog", $data);
	}

	public function career()
	{
		$data['name'] = 'career';
		$data['title'] = 'Career';
		$data['breads'] = [['title' => 'Career']];
		$data['heading'] = '<span class="page_heading">Career</span>';
		$data['validate'] = TRUE;
		
		return $this->template->load('template', "career", $data);
	}

	public function career_post()
	{
		$this->path = $this->config->item('document');

		$img = $this->uploadImage('uplod_rc', $exts='jpg|jpeg|png|pdf', [], round(microtime(true) * 1000));
		
		if($img['error']) die(json_encode($img));

		$post = [
			'fname'     => $this->input->post('fname'),
			'lname'     => $this->input->post('lname'),
			'address'   => $this->input->post('address'),
			'email'     => $this->input->post('email'),
			'mobile'    => $this->input->post('mobile'),
			'location'  => $this->input->post('location'),
			'message'   => $this->input->post('message'),
			'resume_cv' => $img['message']
		];
		
		if($this->main->add($post, "careers"))
			$response = [
				'error' => false,
				'message' => 'Request saved successfully.'
			];
		else
			$response = [
				'error' => true,
				'message' => 'Request not saved.'
			];
		
		die(json_encode($response));
	}

	public function news($slug)
	{
		$news = $this->main->get('news', 'title, description', ['is_deleted' => 0, 'slug' => $slug]);
		
		if($news)
		{
			$data['name'] = 'news';
			$data['title'] = $news['title'];
			$data['breads'] = [['title' => 'News & Blogs', 'url' => 'news-blog'], ['title' => 'News Page']];
			$data['heading'] = '<span class="page_heading">'.$news['title'].'</span>';
			$data['news'] = $news;
			
			return $this->template->load('template', "news", $data);
		}else
			return $this->error_404();
	}

	public function contact_post()
	{
		$post = [
			'name'	  => $this->input->post('name'),
			'email'	  => $this->input->post('email'),
			'mobile'  => $this->input->post('mobile'),
			'subject' => $this->input->post('subject'),
			'message' => $this->input->post('message')
		];
		
		if($this->main->add($post, "contact_us"))
			$response = [
				'error' => false,
				'message' => 'Request saved successfully.'
			];
		else
			$response = [
				'error' => true,
				'message' => 'Request not saved.'
			];
		
		die(json_encode($response));
	}

	public function motor($page)
	{
		$data['name'] = 'motor_insurance';
		$data['validate'] = TRUE;
		
		switch ($page) {
			case 'car':
				$data['title'] = 'Car insurance';
				break;
			case 'bike':
				$data['title'] = 'Bike insurance';
				break;
			case 'taxi':
				$data['title'] = 'PCV (Passenger Carrying Vehicle)';
				break;
			case 'truck':
				$data['title'] = 'GCV (Goods Carrying Vehicle)';
				break;
			case 'misc':
				$data['title'] = 'Misc D insurance';
				break;
			case 'staff-buses':
				$data['title'] = 'Staff Buses insurance';
				break;
			case 'school-buses':
				$data['title'] = 'School Buses insurance';
				break;
			
			default:
				return $this->error_404();
				break;
		}

		return $this->template->load('template', "motor/$page", $data);
	}

	public function motor_post($page)
	{	
		switch ($page) {
			case 'car':
			case 'bike':
			case 'taxi':
			case 'truck':
			case 'staff-buses':
			case 'school-buses':
				$this->path = $this->config->item('document');

				$uplod_rc = $this->uploadImage('uplod_rc', $exts='jpg|jpeg|png|pdf', [], round(microtime(true) * 1000));
				
				if($uplod_rc['error']) die(json_encode($uplod_rc));
				
				$ext_policy['message'] = '';
				
				if (!empty($_FILES['ext_policy']['name'])) {
					$ext_policy = $this->uploadImage('ext_policy', $exts='jpg|jpeg|png|pdf', [], round(microtime(true) * 1000));
					if($ext_policy['error']){
						if(is_file($this->path.$uplod_rc['message'])) unlink($this->path.$uplod_rc['message']);
						die(json_encode($ext_policy));
					}
				}

				$post = [
					'ins_type'	  => $this->input->post('ins_type'),
					'reg_no'	  => $this->input->post('reg_no'),
					'veh_make'	  => $this->input->post('veh_make'),
					'veh_model'	  => $this->input->post('veh_model'),
					'mobile'	  => $this->input->post('mobile'),
					'email'		  => $this->input->post('email'),
					'exp_date'	  => $this->input->post('exp_date'),
					'claim'		  => $this->input->post('claim'),
					'ext_policy'  => $ext_policy['message'],
					'name'		  => $this->input->post('name'),
					'message'	  => $this->input->post('message'),
					'uplod_rc'	  => $uplod_rc['message'],
					'ins_list'	  => $page,
				];
				
				if($this->main->addMotor($post, $this->path.$uplod_rc['message'], $this->path.$ext_policy['message']))
					$response = [
						'error' => false,
						'message' => 'Request saved successfully.'
					];
				else
					$response = [
						'error' => true,
						'message' => 'Request not saved.'
					];
				
				break;
			
			case 'misc':
				$post = [
					'name'		  => $this->input->post('name'),
					'mobile'	  => $this->input->post('mobile'),
					'email'		  => $this->input->post('email'),
					'location'	  => $this->input->post('location'),
					'reg_no'	  => $this->input->post('reg_no'),
					'message'	  => $this->input->post('message'),
					'ins_list'	  => $page,
				];
				
				if($this->main->addHealth($post, 'misc_insurance'))
					$response = [
						'error' => false,
						'message' => 'Request saved successfully.'
					];
				else
					$response = [
						'error' => true,
						'message' => 'Request not saved.'
					];
				break;
			
			default:
				$response = [
					'error' => true,
					'message' => 'Something is not going good.'
				];
				break;
		}

		die(json_encode($response));
	}

	public function life($page)
	{
		$data['name'] = 'life_insurance';
		$data['validate'] = TRUE;
		
		switch ($page) {
			case 'regular-income':
				$data['title'] = 'Regular Income';
				break;
			case 'need-base-solution':
				$data['title'] = 'Need Base Solution';
				break;
			case 'child-mrg':
				$data['title'] = 'Child Mrg';
				break;
			case 'family-protection':
				$data['title'] = 'Family Protection';
				break;
			case 'income-protection':
				$data['title'] = 'Income Protection';
				break;
			case 'retirement-solution':
				$data['title'] = 'Retirement Solution';
				break;
			case 'tax-benifit':
				$data['title'] = 'Tax Benifit';
				break;
			
			default:
				return $this->error_404();
				break;
		}

		return $this->template->load('template', "life/$page", $data);
	}

	public function life_post($page)
	{	
		switch ($page) {
			case 'regular-income':
			case 'need-base-solution':
			case 'child-mrg':
			case 'family-protection':
			case 'income-protection':
			case 'retirement-solution':
			case 'tax-benifit':
				$post = [
					'name'		  => $this->input->post('name'),
					'mobile'	  => $this->input->post('mobile'),
					'dob'	  	  => $this->input->post('dob'),
					'email'		  => $this->input->post('email'),
					'dob'	  	  => $this->input->post('dob'),
					'location'	  => $this->input->post('location'),
					'occupation'  => $this->input->post('occupation'),
					'income'	  => $this->input->post('income'),
					'education'	  => $this->input->post('education'),
					'ins_list'	  => $page,
				];

				if($this->main->addHealth($post, 'life_insurance'))
					$response = [
						'error' => false,
						'message' => 'Request saved successfully.'
					];
				else
					$response = [
						'error' => true,
						'message' => 'Request not saved.'
					];
				
				break;
			
			default:
				$response = [
					'error' => true,
					'message' => 'Something is not going good.'
				];
				break;
		}

		die(json_encode($response));
	}

	public function other($page='')
	{
		$data['name'] = 'other_insurance';
		$data['validate'] = TRUE;
		
		switch ($page) {
			case 'workmen-compensation':
				$data['title'] = 'Workmen Compensation';
				break;
			case 'cpm':
				$data['title'] = 'Plant and Machinery (CPM)';
				break;
			case 'fire-insurance':
				$data['title'] = 'Fire insurance';
				break;
			case 'home-insurance':
				$data['title'] = 'Home insurance';
				break;
			case 'shopkeeper-insurance':
				$data['title'] = 'Shopkeeper insurance';
				break;
			case 'office-package-policy':
				$data['title'] = 'Office package policy';
				break;
			case 'travel-insurance':
				$data['title'] = 'Travel insurance';
				break;
			case 'marine-insurance':
				$data['title'] = 'Marine insurance';
				break;
			
			default:
				return $this->error_404();
				break;
		}

		return $this->template->load('template', "other/$page", $data);
	}

	public function other_post($page)
	{
		switch ($page) {
			case 'workmen-compensation':
			case 'cpm':
			case 'fire-insurance':
			case 'home-insurance':
			case 'shopkeeper-insurance':
			case 'office-package-policy':
			case 'travel-insurance':
			case 'marine-insurance':
				$post = [
					'name' => $this->input->post('name'),
					'mobile' => $this->input->post('mobile'),
					'email' => $this->input->post('email'),
					'location' => $this->input->post('location'),
					'message' => $this->input->post('message'),
					'ins_list'	  => $page,
				];

				if($this->main->addHealth($post, 'other_insurance'))
					$response = [
						'error' => false,
						'message' => 'Request saved successfully.'
					];
				else
					$response = [
						'error' => true,
						'message' => 'Request not saved.'
					];
			break;
			
			default:
				$response = [
					'error' => true,
					'message' => 'Something is not going good.'
				];
			break;
		}

		die(json_encode($response));
	}

	public function health($page)
	{
		$data['name'] = 'health_insurance';
		$data['validate'] = TRUE;
		
		switch ($page) {
			case 'mediclaim':
				$data['title'] = 'Workmen Compensation';
				break;
			case 'covid':
				$data['title'] = 'Plant and Machinery (CPM)';
				break;
			case 'gpa':
				$data['title'] = 'Fire insurance';
				break;
			case 'personal-accidents':
				$data['title'] = 'Home insurance';
				break;
			case 'shopkeeper-insurance':
				$data['title'] = 'Shopkeeper insurance';
				break;
			case 'gmc':
				$data['title'] = 'Office package policy';
				break;
			
			default:
				return $this->error_404();
				break;
		}

		return $this->template->load('template', "health/$page", $data);
	}

	public function downloads($page)
	{
		$data['name'] = 'downloads';
		
		switch ($page) {
			case 'proposal-forms':
				$data['title'] = 'Proposal Form Downloads';
				$data['breads'] = [['title' => 'Proposal Form Downloads']];
				$data['heading'] = '<span class="page_heading">Proposal Form </span>Downloads';
				$form = 'Proposal Forms';
				break;
			case 'claim-forms':
				$data['title'] = 'Claim Form Downloads';
				$data['breads'] = [['title' => 'Claim Form Downloads']];
				$data['heading'] = '<span class="page_heading">Claim Form </span>Downloads';
				$form = 'Claim Forms';
				break;
			case 'brochures':
				$data['title'] = 'Brochure Downloads';
				$data['breads'] = [['title' => 'Brochure Downloads']];
				$data['heading'] = '<span class="page_heading">Brochure </span>Downloads';
				$form = 'Brochures';
				break;
			case 'others':
				$data['title'] = 'Other Downloads';
				$data['breads'] = [['title' => 'Other Downloads']];
				$data['heading'] = '<span class="page_heading">Other </span>Downloads';
				$form = 'Others';
				break;
			
			default:
				return $this->error_404();
				break;
		}

		$data['forms'] =  $this->main->getAll('downloads', 'title, CONCAT("'.$this->config->item('downloads').'", d_file) d_file', ['is_deleted' => 0, 'd_type' => $form]);
		
		return $this->template->load('template', "downloads", $data);
	}

	public function health_post($page)
	{	
		switch ($page) {
			case 'mediclaim':
			case 'covid':
			case 'gpa':
			case 'personal-accidents':
			case 'shopkeeper-insurance':
			case 'gmc':
				$post = [
					'adult_qty' => $this->input->post('adult_qty'),
					'child_qty' => $this->input->post('child_qty'),
					'age' => $this->input->post('age'),
					'gender' => $this->input->post('gender'),
					'sum_insured' => $this->input->post('sum_insured'),
					'pincode' => $this->input->post('pincode'),
					'mobile' => $this->input->post('mobile'),
					'email' => $this->input->post('email'),
					'name' => $this->input->post('name'),
					'ins_list'	  => $page,
				];
				
				if($this->main->addHealth($post, 'health_insurance'))
					$response = [
						'error' => false,
						'message' => 'Request saved successfully.'
					];
				else
					$response = [
						'error' => true,
						'message' => 'Request not saved.'
					];
			break;
			
			default:
				$response = [
					'error' => true,
					'message' => 'Something is not going good.'
				];
			break;
		}

		die(json_encode($response));
	}
	
	public function error_404()
	{
		$data['name'] = 'error_404';
		$data['title'] = 'Error 404';

		return $this->template->load('template', "error_404", $data);
	}
	
	public function send_notifications()
	{
		foreach ($this->main->getExpiryDocs() as $doc) {
			$body = "Your $doc->document_name will expire on ". date('d-m-Y', strtotime($doc->expiry_date));
			send_notification(APP_NAME, $body, $doc->auth_token);
		}
	}
}
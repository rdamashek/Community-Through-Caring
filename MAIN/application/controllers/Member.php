<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);


		if (isset($_SESSION['user'])) {
			redirect(base_url('member/my_offers'));
		} else {
			redirect(base_url('welcome/login'));
		}
	}

	public function dashboard()
	{
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);



		if (!isset($_SESSION['user'])) {
			redirect(base_url('welcome/login?please-before-login'));
		}

		$data['title'] = 'Dashboard';

		$this->load->view('global/header', $data);
		$this->load->view('global/nav', $data);
		$this->load->view('member/side_nav');
		$this->load->view('global/footer', $data);
	}




	public function my_offers()
	{
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);
		if (!isset($_SESSION['user'])) {
			redirect(base_url('welcome/login?n=add-new'));
		}

		$data['title'] = 'My Offers';

		$data['goals'] = $this->db->where('type', 'offer')->where('member_id', $_SESSION['user']['id'])->order_by('id', 'desc')->get('goals')->result_array();

		$this->load->view('global/header', $data);
		$this->load->view('global/nav', $data);
		$this->load->view('member/side_nav');
		$this->load->view('member/my_offers', $data);
		$this->load->view('global/footer', $data);
	}

	public function my_needs()
	{
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);
		if (!isset($_SESSION['user'])) {
			redirect(base_url('welcome/login?n=add-new'));
		}

		$data['title'] = 'My Needs';

		$data['goals'] = $this->db->where('type', 'need')->where('member_id', $_SESSION['user']['id'])->order_by('id', 'desc')->get('goals')->result_array();

		$this->load->view('global/header', $data);
		$this->load->view('global/nav', $data);
		$this->load->view('member/side_nav');
		$this->load->view('member/my_needs', $data);
		$this->load->view('global/footer', $data);
	}
	// public function login_post()
	// {
	// 	if (isset($_POST['submit'])) {
	// 		$email = $_POST['email'];
	// 		$password = $_POST['password'];
	// 		$this->load->database();

	// 		$records = $this->db->where('email', $email)->get('member')->result_array();



	// 		if(sizeof($records)){

	// 			$records = $records[0];
	// 			if(password_verify($_POST['password'], $records['password'])){
	// 				$_SESSION['member'] = $records;

	// 			 redirect('welcome/index');
	// 				}else{
	// 					 redirect('welcome/login?error');
	// 				}

	// 		}else{
	// 			redirect('welcome/login?error');
	// 	   }


	// 	}else{
	// 		redirect('welcome/login?error');
	//    }
	// }
	public function account_settings()
	{
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);
		if (!isset($_SESSION['user'])) {
			redirect(base_url('welcome/login?n=add-new'));
		}

		$data['title'] = 'Account Setting';

		$data['goal'] = $this->db->where('id', $_SESSION['user']['id'])->get('member')->result_array()[0];

		// $this->db->where('type', 'need')->where('member_id', $_SESSION['member']['id'])->order_by('id', 'desc')->get('goals')->result_array();

		$this->load->view('global/header', $data);
		$this->load->view('global/nav', $data);
		$this->load->view('member/side_nav');
		$this->load->view('member/account_settings', $data);
		$this->load->view('global/footer', $data);
	}
	public function update_member_account()
	{
	
		$data = array(

			'name' => $this->input->post('name'),
			'phone' => $this->input->post('phone'),
			'email' => $this->input->post('email')
		

		);
		if (isset($_FILES['goal_image'])) {
			$photo_url = doupload('goal_image');
			if (strlen($photo_url) > 0) {
				$data['photo'] = $photo_url;
			}
		}

		$this->db->where('id', $_SESSION['user']['id'])->update('member', $data);
		$_SESSION['user']['photo'] = $data['photo'];
		$_SESSION['user']['name'] = $data['name'];
		$_SESSION['user']['phone'] = $data['phone'];
		$_SESSION['user']['email'] = $data['email'];
		 return redirect('member/account_settings');
	}
	public function update_member_password()
	
	{
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);

		
		$member_pass = $this->db->select('password')->from('member')->where('id', $_SESSION['user']['id'])->get()->result_array()[0];

		if (password_verify($_POST['old_password'], $member_pass['password'])) {

			if ($_POST['new_password'] == $_POST['confirm_password']) {
				$pass = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
				$data = array(

					'password' => $pass,

				);

				$this->db->where('id', $_SESSION['user']['id'])->update('member', $data);
			} else {
				return redirect('member/change_password?password_not_match');
				// password anc confirm password dont match
			}
		} else {
			return redirect('member/change_password?old_pass_not_match');
		}

		return redirect('member/account_settings');
	}


	public function change_password()
	{
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);


		$data['title'] = 'Change Password';

		// $data['goals'] = $this->db->where('type', 'need')->where('member_id', $_SESSION['user']['id'])->order_by('id', 'desc')->get('goals')->result_array();

		$this->load->view('global/header', $data);
		$this->load->view('global/nav', $data);
		$this->load->view('member/side_nav');
		$this->load->view('member/change_pass', $data);
		$this->load->view('global/footer', $data);
	}


	public function create_goal()
	{
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);

		if (!isset($_SESSION['user'])) {
			redirect(base_url('welcome/login?redirect=member_create_goal'));
		}

		$data['title'] = 'Create new offer';

		$this->load->view('global/header', $data);
		$this->load->view('global/nav', $data);
		$this->load->view('member/create_goal');
		$this->load->view('global/footer', $data);
	}

	public function new_message()
	{
		$infoMessage ='';
		if (empty($_POST['message'])) {
			$infoMessage= "<script>alert('Please fill in the Blanks');</script>";
		} else {
			$ins = array(
				'from' => $_SESSION['user']['id'],
				'message' => $_POST['message']
			);
		}

		$this->db->insert('chat', $ins);
		
	}




	public function contact_member()
	{

		$goal_id = $_POST['goal_id'];
		$goal = $this->db->where('id', $goal_id)->get('goals')->result_array()[0];
		$member = $this->db->where('id', $goal['member_id'])->get('member')->result_array()[0];
		$email = $_POST['email'];
		$name = $_POST['name'];
		$message = $_POST['message'];
		$to = $member['email'];

		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'mail.lipsumtechnologies.com',
			'smtp_port' => 465,
			'smtp_user' => 'noreply@lipsumtechnologies.com', // change it to yours
			'smtp_pass' => 'XS1HiePeAXC%', // change it to yours
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);




		$mail_data = array();
		$mail_data['name'] = $member['name'];
		$mail_data['goal_type'] = $goal['type'];
		$mail_data['sender_name'] = $name;
		$mail_data['sender_email'] = $email;
		$mail_data['message'] = $message;

		$message = $this->load->view('emails/contact', $mail_data, TRUE);








		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('noreply@lipsumtechnologies.com'); // change it to yours
		$this->email->to($to); // change it to yours
		$this->email->subject('Goalpost | New contact against your ' . $goal['type']);
		$this->email->message($message);
		if ($this->email->send()) {
			echo 'Email sent.';
		} else {
			show_error($this->email->print_debugger());
		}
	}

	public function create_offer()
	{
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);

		if (!isset($_SESSION['user'])) {
			redirect(base_url('welcome/login?n=add-new'));
		}

		$data['title'] = 'Create new offer';

		$this->load->view('global/header', $data);
		$this->load->view('global/nav', $data);
		$this->load->view('member/create_offer');
		$this->load->view('global/footer', $data);
	}

	public function create_need()
	{
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);

		if (!isset($_SESSION['user'])) {
			redirect(base_url('welcome/login?n=add-new'));
		}

		$data['title'] = 'Create new need';

		$this->load->view('global/header', $data);
		$this->load->view('global/nav', $data);
		$this->load->view('member/create_need');
		$this->load->view('global/footer', $data);
	}


	public function logout()
	{

		unset($_SESSION['user']);
		redirect('welcome');
	}

	public function save_new_offer()
	{
		$goal_data = $_POST['goal'];
		$contact_data = $_POST['contact'];
		$area_data = $_POST['address'];
		$goal_data['member_id'] = $_SESSION['user']['id'];


		if (isset($_FILES['goal_image'])) {
			$goal_data['photo'] = doupload('goal_image');
		}


		$this->db->insert('goals', $goal_data);
		$goal_id = $this->db->insert_id();

		$this->db->insert('contact', $contact_data);
		$contact_id = $this->db->insert_id();

		$contact_update = array(
			'goal_id' => $goal_id,
			'contact_id' => $contact_id,
		);
		$this->db->insert('goal_contact', $contact_update);

		$area_data['goal_id'] = $goal_id;
		$this->db->insert('area_shared', $area_data);
	}

	public function update_offer_save()
	{
		$goal_id = $_POST['update_id'];
		$goal_data = $_POST['goal'];
		$contact_data = $_POST['contact'];
		$area_data = $_POST['address'];


		if (isset($_FILES['goal_image'])) {
			$photo_url = doupload('goal_image');
			if (strlen($photo_url) > 0) {
				$goal_data['photo'] = $photo_url;
			}
		}


		$this->db->where('id', $goal_id)->update('goals', $goal_data);

		$gc = $this->db->where('goal_id', $goal_id)->get('goal_contact')->result_array()[0];
		$this->db->where('id', $gc['contact_id'])->delete('contact');
		$this->db->where('goal_id', $goal_id)->delete('goal_contact');


		$this->db->insert('contact', $contact_data);
		$contact_id = $this->db->insert_id();

		$contact_update = array(
			'goal_id' => $goal_id,
			'contact_id' => $contact_id,
		);
		$this->db->insert('goal_contact', $contact_update);


		$this->db->where('goal_id', $goal_id)->delete('area_shared');

		$area_data['goal_id'] = $goal_id;
		$this->db->insert('area_shared', $area_data);
	}

	public function update_need_save()
	{
		$goal_id = $_POST['update_id'];
		$goal_data = $_POST['goal'];
		$contact_data = $_POST['contact'];
		$area_data = $_POST['address'];


		if (isset($_FILES['goal_image'])) {
			$photo_url = doupload('goal_image');
			if (strlen($photo_url) > 0) {
				$goal_data['photo'] = $photo_url;
			}
		}


		$this->db->where('id', $goal_id)->update('goals', $goal_data);

		$gc = $this->db->where('goal_id', $goal_id)->get('goal_contact')->result_array()[0];
		$this->db->where('id', $gc['contact_id'])->delete('contact');
		$this->db->where('goal_id', $goal_id)->delete('goal_contact');


		$this->db->insert('contact', $contact_data);
		$contact_id = $this->db->insert_id();

		$contact_update = array(
			'goal_id' => $goal_id,
			'contact_id' => $contact_id,
		);
		$this->db->insert('goal_contact', $contact_update);


		$this->db->where('goal_id', $goal_id)->delete('area_shared');

		$area_data['goal_id'] = $goal_id;
		$this->db->insert('area_shared', $area_data);
	}


	public function edit_offer($id)
	{

		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);

		$data['goal'] = $this->db->where('id', $id)->get('goals')->result_array()[0];
		$data['period'] = @$this->db->where('goal_id', $id)->get('time_period')->result_array()[0];
		$gc = @$this->db->where('goal_id', $id)->get('goal_contact')->result_array()[0];
		$data['contact'] = @$this->db->where('id', $gc['contact_id'])->get('contact')->result_array()[0];
		$data['address'] = @$this->db->where('goal_id', $id)->get('area_shared')->result_array()[0];

		if (!isset($_SESSION['user'])) {
			redirect(base_url('welcome/login?n=add-new'));
		}

		$data['title'] = 'Edit offer';

		$this->load->view('global/header', $data);
		$this->load->view('global/nav', $data);
		$this->load->view('member/edit_offer', $data); 
		$this->load->view('global/footer', $data);
	}
	public function delete_offer($id)
	{
		if (!isset($_SESSION['user'])) {
			redirect(base_url('welcome/login?redirect=member_create_goal'));
		}
		$this->db->where(array('id' => $id));
		$this->db->delete('goals');
		redirect('member/my_offers');
	}

	public function edit_need($id)
	{

		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);


		$data['goal'] = $this->db->where('id', $id)->get('goals')->result_array()[0];
		$data['period'] = @$this->db->where('goal_id', $id)->get('time_period')->result_array()[0];
		$gc = @$this->db->where('goal_id', $id)->get('goal_contact')->result_array()[0];
		$data['contact'] = @$this->db->where('id', $gc['contact_id'])->get('contact')->result_array()[0];
		$data['address'] = @$this->db->where('goal_id', $id)->get('area_shared')->result_array()[0];

		if (!isset($_SESSION['user'])) {
			redirect(base_url('welcome/login?n=add-new'));
		}

		$data['title'] = 'Edit Need';

		$this->load->view('global/header', $data);
		$this->load->view('global/nav', $data);
		$this->load->view('member/editNeed', $data);
		$this->load->view('global/footer', $data);
	}

	public function remove_img($id)
	{
		$upd = array(
			'photo' => '',
		);
		$this->db->where('id', $id)->update('goals', $upd);
	}

	public function add_fav($id)
	{

		$ins = array(
			'goal_id' => $id,
			'member_id' => $_SESSION['user']['id'],
			
		);
		$this->db->insert('fav', $ins);
	}

	public function remove_fav($id)
	{

		$this->db->where('goal_id', $id)->where('member_id',  $_SESSION['user']['id'])->delete('fav');
	}

	public function save_new_need()
	{
		$goal_data = $_POST['goal'];
		$period_data = $_POST['period'];
		$contact_data = $_POST['contact'];
		$area_data = $_POST['address'];;
		$goal_data['member_id'] = $_SESSION['user']['id'];



		if (isset($_FILES['goal_image'])) {
			$goal_data['photo'] = doupload('goal_image');
		}

		$this->db->insert('goals', $goal_data);
		$goal_id = $this->db->insert_id();


		unset($period_data['day']);
		$period_data['day'] = json_encode(@$_POST['period']['day']);

		$period_data['goal_id'] = $goal_id;
		$this->db->insert('time_period', $period_data);

		$this->db->insert('contact', $contact_data);
		$contact_id = $this->db->insert_id();

		$contact_update = array(
			'goal_id' => $goal_id,
			'contact_id' => $contact_id,
		);
		$this->db->insert('goal_contact', $contact_update);

		$area_data['goal_id'] = $goal_id;
		$this->db->insert('area_shared', $area_data);
	}
	public function delete_need($id)
	{
		$this->db->where(array("id" => $id));
		$this->db->delete('goals');
		redirect('member/my_needs');
	}
}

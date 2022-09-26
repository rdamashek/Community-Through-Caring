<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		
	}

	public function index()
	{

		$language = $this->db->get('language')->result_array();
		$data['language'] = array();
		foreach ($language as $lang) {
			$data['language'][$lang['word']] = $lang['display_text'];
		}


		if (isset($_SESSION['user'])) {
			redirect(base_url('member/dashboard'));
		} else {
			redirect(base_url('welcome/login'));
		}
	}

	public function dashboard()
	{
		$language = $this->db->get('language')->result_array();
		$data['language'] = array();
		foreach ($language as $lang) {
			$data['language'][$lang['word']] = $lang['display_text'];
		}



		if (!isset($_SESSION['user'])) {
			redirect(base_url('welcome/login?n=add-new'));
		}

		$data['title'] = 'Dashboard';

		$this->load->view('global/header', $data);
		$this->load->view('global/nav', $data);
		$this->load->view('member/side_nav');
		$this->load->view('global/footer', $data);
	}




	// public function my_offers()
	// {
	// 	if (isset($_SESSION['admin'])) {
	// 		# code...
	// 	}
	// 	$language = $this->db->get('language')->result_array();
	// 	$data['language'] = array();
	// 	foreach ($language as $lang) {
	// 		$data['language'][$lang['word']] = $lang['display_text'];
	// 	}


	// 	$data['title'] = 'Home';

	// 	$data['goals'] = $this->db->where('type', 'offer')->order_by('id', 'desc')->get('goals')->result_array();

	// 	$this->load->view('global/header', $data);
	// 	$this->load->view('admin/side_nav');
	// 	$this->load->view('admin/member/my_offers', $data);
	// 	$this->load->view('global/footer', $data);
	// }

	// public function my_needs()
	// {
	// 	$language = $this->db->get('language')->result_array();
	// 	$data['language'] = array();
	// 	foreach ($language as $lang) {
	// 		$data['language'][$lang['word']] = $lang['display_text'];
	// 	}


	// 	$data['title'] = 'Home';

	// 	$data['goals'] = $this->db->where('type', 'need')->order_by('id', 'desc')->get('goals')->result_array();

	// 	$this->load->view('global/header', $data);
	// 	$this->load->view('admin/side_nav');
	// 	$this->load->view('admin/member/my_needs', $data);
	// 	$this->load->view('global/footer', $data);
	// }

	public function account_settings()
	{
		$language = $this->db->get('language')->result_array();
		$data['language'] = array();
		foreach ($language as $lang) {
			$data['language'][$lang['word']] = $lang['display_text'];
		}


		$data['title'] = 'Home';

		$data['goals'] = $this->db->where('type', 'need')->where('member_id', $_SESSION['user']['id'])->order_by('id', 'desc')->get('goals')->result_array();

		$this->load->view('global/header', $data);
		$this->load->view('global/nav', $data);
		$this->load->view('member/side_nav');
		$this->load->view('member/account_settings', $data);
		$this->load->view('global/footer', $data);
	}


	public function change_password()
	{
		$language = $this->db->get('language')->result_array();
		$data['language'] = array();
		foreach ($language as $lang) {
			$data['language'][$lang['word']] = $lang['display_text'];
		}


		$data['title'] = 'Home';

		$data['goals'] = $this->db->where('type', 'need')->where('member_id', $_SESSION['user']['id'])->order_by('id', 'desc')->get('goals')->result_array();

		$this->load->view('global/header', $data);
		$this->load->view('global/nav', $data);
		$this->load->view('member/side_nav');
		$this->load->view('member/change_pass', $data);
		$this->load->view('global/footer', $data);
	}


	public function create_goal()
	{
		$language = $this->db->get('language')->result_array();
		$data['language'] = array();
		foreach ($language as $lang) {
			$data['language'][$lang['word']] = $lang['display_text'];
		}

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

		$ins = array(
			'from' => $_SESSION['user']['id'],
			'message' => $_POST['message']
		);

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
		$language = $this->db->get('language')->result_array();
		$data['language'] = array();
		foreach ($language as $lang) {
			$data['language'][$lang['word']] = $lang['display_text'];
		}

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
		$language = $this->db->get('language')->result_array();
		$data['language'] = array();
		foreach ($language as $lang) {
			$data['language'][$lang['word']] = $lang['display_text'];
		}

		if (!isset($_SESSION['user'])) {
			redirect(base_url('welcome/login?n=add-new'));
		}

		$data['title'] = 'Create new offer';

		$this->load->view('global/header', $data);
		$this->load->view('global/nav', $data);
		$this->load->view('member/create_need');
		$this->load->view('global/footer', $data);
	}


	public function logout()
	{

		unset($_SESSION);
		redirect('admin');
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


	// public function edit_offer($id)
	// {

	// 	$language = $this->db->get('language')->result_array();
	// 	$data['language'] = array();
	// 	foreach ($language as $lang) {
	// 		$data['language'][$lang['word']] = $lang['display_text'];
	// 	}

	// 	$data['goal'] = $this->db->where('id', $id)->get('goals')->result_array()[0];
	// 	$data['period'] = @$this->db->where('goal_id', $id)->get('time_period')->result_array()[0];
	// 	$gc = @$this->db->where('goal_id', $id)->get('goal_contact')->result_array()[0];
	// 	$data['contact'] = @$this->db->where('id', $gc['contact_id'])->get('contact')->result_array()[0];
	// 	$data['address'] = @$this->db->where('goal_id', $id)->get('area_shared')->result_array()[0];

	// 	if (isset($_SESSION['user'])) {
	// 		redirect(base_url('welcome/login?n=add-new'));
	// 	}

	// 	$data['title'] = 'Edit offer';

	// 	$this->load->view('global/header', $data);
	// 	$this->load->view('admin/side_nav');
	// 	$this->load->view('admin/member/edit_offer', $data);
	// 	$this->load->view('global/footer', $data);
	// }

	// public function delete_offer($id)
	// {
	// 	$this->db->where(array("id" => $id));
	// 	$this->db->delete('goals');
	// 	redirect('admin/my_offers');
	// }

	// public function edit_need($id)
	// {

	// 	$language = $this->db->get('language')->result_array();
	// 	$data['language'] = array();
	// 	foreach ($language as $lang) {
	// 		$data['language'][$lang['word']] = $lang['display_text'];
	// 	}


	// 	$data['goal'] = $this->db->where('id', $id)->get('goals')->result_array()[0];
	// 	$data['period'] = @$this->db->where('goal_id', $id)->get('time_period')->result_array()[0];
	// 	$gc = @$this->db->where('goal_id', $id)->get('goal_contact')->result_array()[0];
	// 	$data['contact'] = @$this->db->where('id', $gc['contact_id'])->get('contact')->result_array()[0];
	// 	$data['address'] = @$this->db->where('goal_id', $id)->get('area_shared')->result_array()[0];

	// 	if (isset($_SESSION['user'])) {
	// 		redirect(base_url('welcome/login?n=add-new'));
	// 	}

	// 	$data['title'] = 'Edit offer';

	// 	$this->load->view('global/header', $data);
	// 	$this->load->view('admin/side_nav');
	// 	$this->load->view('admin/member/editNeed', $data);
	// 	$this->load->view('global/footer', $data);
	// }

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
			'member_id' => $_SESSION['user']['id']
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
	// public function delete_need($id)
	// {
	// 	$this->db->where(array("id" => $id));
	// 	$this->db->delete('goals');
	// 	redirect('users/my_needs');
	// }
	// public function language()
	// {
	// 	$data['language'] = $language = $this->db->get('language')->result_array();
	// 	$data['language'] = array();
	// 	foreach ($language as $lang) {
	// 		$data['language'][$lang['word']] = $lang['display_text'];
	// 	}


	// 	$data['title'] = 'Language';

	// 	$data['languages'] = $language = $this->db->get('language')->result_array();
	// 	// 		
		

	// 	$this->load->view('global/header', $data);
	// 	$this->load->view('admin/side_nav');
	// 	$this->load->view('admin/member/language', $data);
	// 	$this->load->view('global/footer', $data);
	// }

	public function edit_language($id)
	{
		$language = $this->db->get('language')->result_array();
		$data['language'] = array();
		foreach ($language as $lang) {
			$data['language'][$lang['word']] = $lang['display_text'];
		}


		$data['title'] = 'Edit Language';

		$update = array(

			'display_text' => $this->input->post('display_text')
		);

		$data['languages'] = $this->db->where('id', $id)->get('language')->result_array()[0];


		// $this->db->where('id', $id)->update('language', $update);


		//   $this->db->where('id', $id)->update('admin', $data);

		// if (isset($id)) {
		// 	redirect(base_url('welcome/login?n=add-new'));
		// }



		$this->load->view('global/header', $data);
		$this->load->view('admin/side_nav');
		$this->load->view('admin/member/edit_language', $data);
		$this->load->view('global/footer', $data);
	}


	public function edit_language_submit()
	{
		$update = array(

			'display_text' => $this->input->post('display_text')
		);

		$id = $this->input->post('update_id');

		$this->db->where('id', $id)->update('language', $update);

		redirect('users/language');
	}
}

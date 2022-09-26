<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);
		$data['title'] = 'Login';
		$this->load->view('global/header', $data);
		$this->load->view('admin/login', $data);
		$this->load->view('global/footer', $data);
	}

	public function dashboard()
	{
		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=please-login_before'));
		}
		$data['title'] = 'Dashboard';
		$this->load->view('global/header', $data);
		$this->load->view('admin-header-nav/nav', $data);
		$this->load->view('admin/side_nav', $data);
		$this->load->view('admin/admindashboard', $data);

		$this->load->view('global/footer', $data);
	}

	public function my_offers()
	{

		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=please-login_before'));
		}
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);


		$data['title'] = 'My Offers';

		$data['goals'] = $this->db->where('type', 'offer')->order_by('id', 'desc')->get('goals')->result_array();

		$this->load->view('global/header', $data);
		$this->load->view('admin-header-nav/nav', $data);
		$this->load->view('admin/side_nav');
		$this->load->view('admin/member/my_offers', $data);
		$this->load->view('global/footer', $data);
	}

	public function edit_offer($id)
	{

		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);

		$data['goal'] = $this->db->where('id', $id)->get('goals')->result_array()[0];
		$data['period'] = @$this->db->where('goal_id', $id)->get('time_period')->result_array()[0];
		$gc = @$this->db->where('goal_id', $id)->get('goal_contact')->result_array()[0];
		$data['contact'] = @$this->db->where('id', $gc['contact_id'])->get('contact')->result_array()[0];
		$data['address'] = @$this->db->where('goal_id', $id)->get('area_shared')->result_array()[0];

		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=add-new'));
		}

		$data['title'] = 'Edit offer';

		$this->load->view('global/header', $data);
		$this->load->view('admin/side_nav');
		$this->load->view('admin/member/edit_offer', $data);
		$this->load->view('global/footer', $data);
	}
	public function delete_offer($id)
	{
		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=add-new'));
		}
		$this->db->where(array("id" => $id));
		$this->db->delete('goals');
		redirect('admin/my_offers');
	}

	public function my_needs()
	{
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);

		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=add-new'));
		}

		$data['title'] = 'My Needs';

		if (!isset($_SESSION['admin'])) {
			redirect(base_url('welcome/login?please-before-login'));
		}

		$data['goals'] = $this->db->where('type', 'need')->order_by('id', 'desc')->get('goals')->result_array();

		$this->load->view('global/header', $data);
		$this->load->view('admin-header-nav/nav', $data);
		$this->load->view('admin/side_nav');
		$this->load->view('admin/member/my_needs', $data);
		$this->load->view('global/footer', $data);
	}
	public function edit_need($id)
	{

		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);

		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=please-login_before'));
		}


		$data['goal'] = $this->db->where('id', $id)->get('goals')->result_array()[0];
		$data['period'] = @$this->db->where('goal_id', $id)->get('time_period')->result_array()[0];
		$gc = @$this->db->where('goal_id', $id)->get('goal_contact')->result_array()[0];
		$data['contact'] = @$this->db->where('id', $gc['contact_id'])->get('contact')->result_array()[0];
		$data['address'] = @$this->db->where('goal_id', $id)->get('area_shared')->result_array()[0];


		$data['title'] = 'Edit offer';

		$this->load->view('global/header', $data);
		$this->load->view('admin/side_nav');
		$this->load->view('admin/member/editNeed', $data);
		$this->load->view('global/footer', $data);
	}

	public function delete_need($id)
	{
		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=please-login_before'));
		}
		$this->db->where(array("id" => $id));
		$this->db->delete('goals');
		redirect('admin/my_needs');
	}


	// ==== language===
	public function language()
	{

		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=please-login_before'));
		}
		// $data['language'] = $language = $this->db->get('language')->result_array();
		// $data['language'] = array();
		// foreach ($language as $lang) {
		// 	$data['language'][$lang['word']] = $lang['display_text'];
		// }
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);

		$data['title'] = 'Language';

		// $data['languages'] = $language = $this->db->get('language')->result_array();
		// 		


		$this->load->view('global/header', $data);
		$this->load->view('admin-header-nav/nav', $data);
		$this->load->view('admin/side_nav');
		$this->load->view('admin/member/language', $data);
		$this->load->view('global/footer', $data);
	}
	public function edit_language()
	{
		$lang = $_POST['lang'];

		// validate
		// decode JSON to array and confirm if the array size is greater than 20
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);
		// if is_array(json_decode($lang), true) && sizeof/count($array) > 20
		if (is_array(json_decode($lang, true)) && count($data['language']) > 20) {
			// update file using file_put_contents OR fopen PHP functions
			$data = fopen("language.json", "w");
			fwrite($data, $lang);
			fclose($data);
			echo base_url('admin/language?msg=updated');
		} 
		// if condition false, dont update and show error 
		else {
			echo base_url('admin/language?error=invalid_format');
		}

		

		






		// if (!isset($_SESSION['admin'])) {
		// 	redirect(base_url('admin/login?n=please-login_before'));
		// }
		// $language = $this->db->get('language')->result_array();
		// $data['language'] = array();
		// foreach ($language as $lang) {
		// 	$data['language'][$lang['word']] = $lang['display_text'];
		// }


		// $data['title'] = 'Edit Language';

		// $update = array(

		// 	'display_text' => $this->input->post('display_text')
		// );

		// $data['languages'] = $this->db->where('id', $id)->get('language')->result_array()[0];






		// $this->load->view('global/header', $data);
		// $this->load->view('admin/side_nav');
		// $this->load->view('admin/member/edit_language', $data);
		// $this->load->view('global/footer', $data);
	}


	public function edit_language_submit()
	{
		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=please-login_before'));
		}

		$update = array(

			'display_text' => $this->input->post('display_text')
		);

		$id = $this->input->post('update_id');

		$this->db->where('id', $id)->update('language', $update);

		redirect('admin/language');
	}


	// ====language end===

	public function add_users()
	{

		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);
		$data['title'] = 'Add User';
		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=please-login_before'));
		}
		// $data['username']='test';
		$this->load->view('global/header');
		$this->load->view('admin/add_users');

		$this->load->view('global/footer');
	}

	public function login()
	{
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);
		$data['title'] = 'Login';
		$this->load->view('global/header', $data);
		$this->load->view('admin/login', $data);
		$this->load->view('global/footer', $data);
	}



	public function login_post()
	{
		if (isset($_POST['submit'])) {
			// login logic
			// $this->db->where('email', $email)->get('admin')->result_array();
			$email = $_POST['email'];
			$password = $_POST['password'];
			$this->load->database();

			$records = $this->db->where('email', $email)->get('admin')->result_array();



			if (sizeof($records)) {

				$records = $records[0];
				if (password_verify($_POST['password'], $records['password'])) {
					$_SESSION['admin'] = $records;

					redirect('admin/my_offers');
				} else {
					redirect('admin/login?error');
				}
			} else {
				redirect('admin/login?error');
			}

			// old code


			// if (count($records) > 0) {
			// 	$_SESSION['admin'] = $records[0];
			// 	return redirect('admin/dashboard');
			// } else {
			// 	return redirect('admin/login?error');
			// }

			// end old code
			// $this->db->select('*')->from('admin')->where('email', $email)->where('password', $password)->get()->result_array();

			// 			$q = $this->db->query("SELECT * FROM admin WHERE `email`='$email' AND `password`='$password';");

			// after login redirect to homepage

		} else {
			redirect('admin/login?error');
		}
	}
	public function account_settings()
	{
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);
		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=please-login_before'));
		}
		$data['title'] = 'Account Setting';

		$this->load->view('global/header', $data);
		$this->load->view('admin-header-nav/nav', $data);
		$this->load->view('admin/side_nav');
		$this->load->view('admin/account_settings', $data);
		$this->load->view('global/footer', $data);
	}
	public function update_admin_account()
	{
		$data = array(

			'name' => $this->input->post('name'),
			'email' => $this->input->post('email')
		);

		$this->db->where('id', $_SESSION['admin']['id'])->update('admin', $data);
		$_SESSION['admin']['name'] = $data['name'];
		$_SESSION['admin']['email'] = $data['email'];
		return redirect('admin/account_settings');
	}


	public function update_admin_password()
	{
		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=please-login_before'));
		}

		$admin_pass = $this->db->select('password')->from('admin')->where('id', $_SESSION['admin']['id'])->get()->result_array()[0];

		if (password_verify($_POST['old_password'], $admin_pass['password'])) {

			if ($_POST['new_password'] == $_POST['confirm_password']) {
				$pass = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
				$data = array(

					'password' => $pass,

				);

				$this->db->where('id', $_SESSION['admin']['id'])->update('admin', $data);
			} else {
				return redirect('admin/change_password?password_not_match');
				// password anc confirm password dont match
			}
		} else {
			return redirect('admin/change_password?old_pass_not_match');
		}

		return redirect('admin/account_settings');
	}

	public function change_password()
	{
		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=please-login_before'));
		}
		$data['title'] = 'Change Password';

		// $_SESSION['admin']['password'] = $data['password'];

		$this->load->view('global/header', $data);
		$this->load->view('admin/side_nav');
		$this->load->view('admin/change_pass', $data);
		$this->load->view('global/footer', $data);
	}

	public function logout()
	{
		unset($_SESSION['admin']);
		redirect('admin/login');
	}
	public function login_detail()
	{
	}
}

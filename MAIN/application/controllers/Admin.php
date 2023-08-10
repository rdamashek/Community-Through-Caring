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

//	public function delete_lang($kw)
//	{
//		$this->db->where('lang_key', $kw)->delete('language');
//	}

	public function my_offers()
	{

		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=please-login_before'));
		}
		


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
		$this->load->view('admin-header-nav/nav', $data);

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

		

		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=please-login_before'));
		}


		$data['goal'] = $this->db->where('id', $id)->get('goals')->result_array()[0];
		$data['period'] = @$this->db->where('goal_id', $id)->get('time_period')->result_array()[0];
		$gc = @$this->db->where('goal_id', $id)->get('goal_contact')->result_array()[0];
		$data['contact'] = @$this->db->where('id', $gc['contact_id'])->get('contact')->result_array()[0];
		$data['address'] = @$this->db->where('goal_id', $id)->get('area_shared')->result_array()[0];


		$data['title'] = 'Edit Need';

		$this->load->view('global/header', $data);
		$this->load->view('admin-header-nav/nav', $data);

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
		 $data['language'] = $this->db->get('language')->result_array();

		

		$data['title'] = 'Language';



		$this->load->view('global/header', $data);
		$this->load->view('admin-header-nav/nav', $data);
		$this->load->view('admin/side_nav');
		$this->load->view('admin/member/language', $data);
		$this->load->view('global/footer', $data);
	}

	// Save Language in database 
	public function db_language()
	{

		$json_string = file_get_contents('./language.json');
		$data = json_decode($json_string, true);
		// print_r($data);die();

		foreach ($data as $key => $row) {
			$ins = array(
				'key' => $key,
				'value' => $row
			);
			$this->db->insert('language', $ins);
		}
	}
	private function array_to_csv($array) {
		$csv = '';
		$header = array_keys($array[0]);
		$csv .= implode(',', $header) . "\n";

		foreach ($array as $row) {
			$csv .= implode(',', array_values($row)) . "\n";
		}

		return $csv;
	}

	public function export_langauge(){

		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->helper('download');

		$this->load->dbutil();

		$query = $this->db->select('lang_key, lang_value, notes')
			->get('language');

		$delimiter = ",";
		$newline = "\r\n";
		$enclosure = '"';

		$csv_data = $this->dbutil->csv_from_result($query, $delimiter, $newline, $enclosure);
		$file_name = 'language_export_' . date('Y_m_d_H_i_s') . '.csv';

		force_download($file_name, $csv_data);

/*

		// Select all rows from the language table
		$this->load->dbutil();
		$query = $this->db->get('language');
		$result = $query->result_array();

		// Generate SQL string for all rows
		$sql = $this->dbutil->backup(array(
			'tables' => array('language'), // table to backup
			'format' => 'txt', // format of the backup
			'add_drop' => TRUE, // Whether to add DROP TABLE statements to backup file
			'add_insert' => TRUE, // Whether to add INSERT statements to backup file
			'newline' => "\n" // Character used to separate lines in the backup file
		));

		// Set filename for SQL file
		$filename = 'language_backup_' . date('YmdHis') . '.sql';

		// Set headers for download
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="' . $filename . '"');

		// Output the SQL file to the browser for download
		echo $sql;
		exit;

*/
	}

	public function export_data(){
		$this->load->helper('download');

		$dir = './assets/images/uploads/';
		$zipFilename = './assets/exportData.zip';
		$textFilename = 'export_data.json';

		// Create a new zip archive
		$zip = new \PhpZip\ZipFile();

		try {
			$data=array();

			foreach ($_POST['exported_users'] as $exported_user) {
				$selected_users[] = $exported_user;
			}

			$export_ids = $_POST['exported_users'];
			$members = $this->db->where_in('id', $export_ids)->get('member')->result_array();

			foreach ($members as $member){
				// Add members
				$data['members'][$member['id']]['member_data'] = $member;

				// Add goals for each member
				$data['members'][$member['id']]['goals']=$this->db->where('member_id', $member['id'])->get('goals')->result_array();

				foreach ($data['members'][$member['id']]['goals'] as $k => $goal){
					// Add image to the zip archive
					if(strlen($goal['photo']) > 5){
						$zip->addFile($dir . $goal['photo'], $goal['photo']);
					}
					// Add area_shared for each goal
					$data['members'][$member['id']]['goals'][$k]['area_shared'] = $this->db->where('goal_id', $goal['id'])->get('area_shared')->result_array();

					// Add time_period for each goal
					$data['members'][$member['id']]['goals'][$k]['time_period'] = $this->db->where('goal_id', $goal['id'])->get('time_period')->result_array();

					// Add contacts for each goal
					$contacts = $this->db->where('goal_id', $goal['id'])->get('goal_contact')->result_array();
					foreach ($contacts as $contact){
						$data['members'][$member['id']]['goals'][$k]['contact'] = $this->db->where('id', $contact['contact_id'])->get('contact')->result_array();
					}

					// Add contacts for each member
					$contacts = $this->db->where('member_id', $member['id'])->get('member_contact')->result_array();
					foreach ($contacts as $contact){
						$data['members'][$member['id']]['member_contact'] = $this->db->where('id', $contact['contact_id'])->get('contact')->result_array();
					}

					// All goals favouries by this member
					$data['members'][$member['id']]['fav'] = $this->db->where('member_id', $member['id'])->get('fav')->result_array();
				}
			}

			$customText = json_encode($data);
			$zip->addFromString($textFilename, $customText);

			// Set password
			if (!empty($_POST['zip_password'])) {
				$zip->setPassword($_POST['zip_password']);
			}

			// Save the archive to a file
			$zip->saveAsFile($zipFilename)->close();

			// Download the zip file
			force_download($zipFilename, NULL);
		} catch (\PhpZip\Exception\ZipException $e) {
			// Handle exception
			die("55001 An error occurred: " . $e->getMessage());
		} catch (\Exception $e) {
			// Handle exception
			die("96002 An error occurred: " . $e->getMessage());
		}
	}



	public function import_userdata(){
		$config['upload_path'] = './assets/uploads_csv/';
		$config['max_size'] = '10000000';
		$config['allowed_types'] = '*';
		$this->load->library('upload');
		$new_data_ids = array();
		$this->upload->initialize($config);
		$password=$_POST['zip_password'];
		if (!$this->upload->do_upload('file')) {
			$error = $this->upload->display_errors();
			echo $error;
		} else {
			$file_data = $this->upload->data();
			$zipFilename = './assets/uploads_csv/' . $file_data['file_name'];
			$extractDir = './assets/images/uploads/';

			// Open the zip file
			$zip = new \PhpZip\ZipFile();

			try {

				$zip->openFile($zipFilename)->setReadPassword($password);
				// Extract the images to the specified directory
				$zip->extractTo($extractDir);

				// Read the custom text file
				$textFilename = 'export_data.json';
				$textContent = $zip->getEntryContents($textFilename);

				// Close the zip file
				$zip->close();

				$data = json_decode($textContent, true);
				// rest of your import logic here...

			} catch (\PhpZip\Exception\ZipException $e) {
				// Handle exception
				die("An error occurred: " . $e->getMessage());
			} catch (\Exception $e) {
				// Handle exception
				die("An error occurred: " . $e->getMessage());
			}

				$duplicates = 0;
				$additions = 0;
				$userdatas = $data['members'];



				foreach ($userdatas as $userdata){
					$member = $userdata['member_data'];
					$old_member_id = $member['id'];
					unset($member['id']);
					$member_already = $this->db->where('email', $member['email'])->get('member')->result_array();
					if(sizeof($member_already)){
						$duplicates++;
					}else {
						$this->db->insert('member', $member);
						$member_id = $this->db->insert_id();

						$new_data_ids['member'][$old_member_id] = $member_id;

						$goals_data = $userdata['goals'];
						foreach ($goals_data as $g_datum){
							$area_shared = $g_datum['area_shared'];
							$time_period = $g_datum['time_period'];
							$contact = $g_datum['contact'];
							unset($g_datum['area_shared']);
							unset($g_datum['time_period']);
							unset($g_datum['contact']);
							$old_goal_id = $g_datum['id'];
							unset($g_datum['id']);
							$g_datum['member_id'] = $member_id;

							$this->db->insert('goals', $g_datum);
							$goal_id = $this->db->insert_id();

							$new_data_ids['goals'][$old_goal_id] = $goal_id;

							foreach ($area_shared as $area_single){
								unset($area_single['id']);
								$area_single['goal_id'] = $goal_id;
								$this->db->insert('area_shared', $area_single);
							}

							foreach ($time_period as $tp){
								unset($tp['id']);
								$tp['goal_id'] = $goal_id;
								$this->db->insert('time_period', $tp);
							}

							foreach ($contact as $ct){
								unset($ct['id']);
								$contac = $this->db->insert('contact', $ct);

								$goal_ct = array(
									'contact_id' => $contac,
									'goal_id' => $goal_id
								);
								$this->db->insert('goal_contact', $goal_ct);
							}


						}
						$additions++;
					}
				}

				foreach ($userdatas as $userdata) {
					foreach ($userdata['fav'] as $favv) {
						$user_id = @$new_data_ids['member'][$favv['member_id']];
						$goal_id = @$new_data_ids['goals'][$favv['goal_id']];
						if($user_id>0 && $goal_id>0) {
							$ins = array(
								'goal_id' => $goal_id,
								'member_id' => $user_id
							);
							$this->db->insert('fav', $ins);
						}
					}
				}



		}

return redirect('admin/all_users');
	}

	public function download_images(){

		$dirPath = './assets/images/uploads/'; // Replace with the actual directory path

	// Create a zip archive
		$zip = new ZipArchive();
		$zipName = 'images.zip';
		$zipPath = $dirPath . '/' . $zipName;

		if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
			// Get all files in the directory
			$files = glob($dirPath . '/*.jpg'); // Change the file extension if needed

			// Add each file to the zip archive
			foreach ($files as $file) {
				$fileName = basename($file);
				$zip->addFile($file, $fileName);
			}

			// Close the zip archive
			$zip->close();

			// Set appropriate headers for the download
			header('Content-Type: application/zip');
			header('Content-Disposition: attachment; filename="' . $zipName . '"');
			header('Content-Length: ' . filesize($zipPath));

			// Send the zip file to the browser
			readfile($zipPath);

			// Delete the temporary zip file
			unlink($zipPath);
		} else {
			echo 'Failed to create the zip archive.';
		}

	}


	public function import_language_table(){
		$config['upload_path'] = './assets/uploads_csv/';
		$config['allowed_types'] = 'csv';
		$config['max_size'] = '10000';
		$this->load->library('upload');

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('sql_file')) {
			$error = $this->upload->display_errors();
			echo $error;
		} else {
			$file_data = $this->upload->data();
			$file_path = './assets/uploads_csv/' . $file_data['file_name'];

			if ($this->_import_csv($file_path)) {
				echo 'Imported language table successfully!';

			} else {
				echo 'An error occurred while importing the CSV file.';

			}
		}
	}

	private function _import_csv($file_path)
	{
		$this->db->truncate('language');

		$csv_data = array_map('str_getcsv', file($file_path));
		$header = array_shift($csv_data);

		foreach ($csv_data as $row) {
			$user_data = array(
				'lang_key' => $row[0],
				'lang_value' => $row[1],
				'notes' => $row[2]
			);
			$this->db->insert('language', $user_data);
		}

		return true;
	}



	public function general_settings()
	{


		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=please-login_before'));
		}

		

		$data['title'] = 'Settings';

		$data['settings'] = $this->db->get('general_settings')->result_array();
		$data['email_templates'] = $this->db->get('email_templates')->result_array();

		$this->load->view('global/header', $data);
		$this->load->view('admin-header-nav/nav', $data);
		$this->load->view('admin/side_nav');
		$this->load->view('admin/general_settings', $data);
		$this->load->view('global/footer', $data);
	}

	public function update_general_setting($id)
	{
		$upd = array(
			'value' => $_POST['value']
		);
		$this->db->where('id', $id)->update('general_settings', $upd);
	}

	public function edit_language()
	{
		$lang = $_POST['lang'];

		// validate
		// decode JSON to array and confirm if the array size is greater than 20
		
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

		
		$data['title'] = 'Add User';
		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=please-login_before'));
		}
		// $data['username']='test';
		$this->load->view('global/header');
		$this->load->view('admin/add_users');

		$this->load->view('global/footer');
	}



	public function email_templates()
	{

		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=please-login_before'));
		}
		


		$data['title'] = 'Email Templates';

		$data['email_templates'] = $this->db->get('email_templates')->result_array();

		$this->load->view('global/header', $data);
		$this->load->view('admin-header-nav/nav', $data);
		$this->load->view('admin/side_nav');
		$this->load->view('admin/email_templates', $data);
		$this->load->view('global/footer', $data);
	}

	public function get_email_template($id)
	{
		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=please-login_before'));
		}
		$email_template = $this->db->where('id', $id)->get('email_templates')->result_array()[0];
		echo json_encode($email_template);
	}

	public function get_keyword($id)
	{
		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=please-login_before'));
		}
		$email_template = $this->db->where('id', $id)->get('language')->result_array()[0];
		echo json_encode($email_template);
	}

	public function save_email()
	{
		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=please-login_before'));
		}
		$upd = array(
			'body' => $_POST['body'],
			'subject' => $_POST['subject'],
		);

		$this->db->where('id', $_POST['id'])->update('email_templates', $upd);
		redirect(base_url('admin/general_settings'));
	}


	public function update_keyword()
	{
		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=please-login_before'));
		}
		$upd = array(
			'lang_value' => $_POST['lang_value'],
			'notes' => $_POST['notes'],
		);

		$this->db->where('id', $_POST['id'])->update('language', $upd);
	}

	public function new_keyword()
	{
		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=please-login_before'));
		}
		$upd = array(
			'lang_value' => $_POST['lang_value'],
			'lang_key' => $_POST['lang_key'],
		);

		$this->db->insert('language', $upd);
	}



	public function login()
	{
		
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

	// ========================
	public function all_users()
	{

		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=please-login_before'));
		}
		


		$data['title'] = 'All Users';


		$data['users'] = $this->db->get('member')->result_array();
		// print_r($data);die();

		$this->load->view('global/header', $data);
		$this->load->view('admin-header-nav/nav', $data);
		$this->load->view('admin/side_nav');
		$this->load->view('admin/member/all_users', $data);
		$this->load->view('global/footer', $data);
	}


	public function edit_user($id)
	{
		// print_r($id);die();

		

		$data['users'] = $this->db->where('id', $id)->get('member')->result_array()[0];

		// $data['period'] = @$this->db->where('goal_id', $id)->get('time_period')->result_array()[0];
		// $gc = @$this->db->where('goal_id', $id)->get('goal_contact')->result_array()[0];
		// $data['contact'] = @$this->db->where('id', $gc['contact_id'])->get('contact')->result_array()[0];
		// $data['address'] = @$this->db->where('goal_id', $id)->get('area_shared')->result_array()[0];

		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=add-new'));
		}

		$data['title'] = 'Edit user';

		$this->load->view('global/header', $data);
		$this->load->view('admin/side_nav');
		$this->load->view('admin/member/edit_user', $data);
		$this->load->view('global/footer', $data);
	}

	public function update_user()
	{
		$user_id = $_POST['update_id'];
		$data = array(



			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
		);
		$data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
		// $user_id = $_POST['update_id'];
		// $user_data = $_POST['user'];





		$res = $this->db->where('id', $user_id)->update('member', $data);

		if ($res == true) {
			$this->session->set_flashdata('true', 'User Update Successfully ');
		} else {
			$this->session->set_flashdata('err', "Error");
		}
		redirect('admin/all_users');
	}
	public function delete_user($id)
	{
		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=add-new'));
		}
		$this->db->where(array("member_id" => $id));
		$this->db->delete('goals');

		$this->db->where(array("member_id" => $id));
		$this->db->delete('fav');

		$this->db->where(array("id" => $id));
		$this->db->delete('member');
		redirect('admin/all_users');
	}


	public function chat()
	{
		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=please-login_before'));
		}
		

		$data['title'] = 'Public chat';

		$data['messages'] = $this->db->select('chat.*, member.name, member.signup_date as join_date, member.photo')->join('member', 'member.id=chat.from')->get('chat')->result_array();



		$this->load->view('global/header', $data);
		$this->load->view('admin-header-nav/nav', $data);
		$this->load->view('admin/side_nav');
		$this->load->view('admin/worldchat', $data);
		$this->load->view('global/footer', $data);
	}


	public function delete_chat($id)
	{
		if (!isset($_SESSION['admin'])) {
			redirect(base_url('admin/login?n=add-new'));
		}
		$this->db->where(array("id" => $id));
		$this->db->delete('chat');
		redirect(base_url('admin/chat'));
	}
}

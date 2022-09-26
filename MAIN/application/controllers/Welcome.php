<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);

		$data['title'] = 'Home';

		$data['goals'] = $this->db->where('type', 'offer')->order_by('id', 'desc')->get('goals')->result_array();


		if (@$_SESSION['user']['id'] > 0) {
			$data['fav'] = $this->db->select('goals.*')->where('fav.member_id', $_SESSION['user']['id'])->where('goals.type', 'need')->join('goals', 'fav.goal_id=goals.id')->order_by('id', 'desc')->get('fav')->result_array();
		}


		$this->load->view('global/header', $data);
		$this->load->view('global/nav', $data);
		$this->load->view('offers', $data);
		$this->load->view('global/footer', $data);
	}
	public function needs()
	{
		// $language = $this->db->get('language')->result_array();
		// $data['language'] = array();
		// foreach ($language as $lang) {
		// 	$data['language'][$lang['word']] = $lang['display_text'];
		// }
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);


		$data['title'] = 'Needs';

		$data['goals'] = $this->db->where('type', 'need')->order_by('id', 'desc')->get('goals')->result_array();

		if (@$_SESSION['user']['id'] > 0) {
			$data['fav'] = $this->db->select('goals.*')->where('fav.member_id', $_SESSION['user']['id'])->where('goals.type', 'need')->join('goals', 'fav.goal_id=goals.id')->order_by('id', 'desc')->get('fav')->result_array();
		}


		$this->load->view('global/header', $data);
		$this->load->view('global/nav', $data);
		$this->load->view('needs', $data);
		$this->load->view('global/footer', $data);
	}


	public function need_detail($id = '')
	{
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);


		$data['title'] = 'Need Detail';

		if (strlen($id) > 0) {
		} else {
			die('INVALID');
		}
		$goal_id_exp = explode('__', $id);
		$goal_id = end($goal_id_exp);

		$data['goal'] = $this->db->where('id', $goal_id)->get('goals')->result_array()[0];

		$data['goal']['address'] = @$this->db->where('goal_id', $goal_id)->get('area_shared')->result_array()[0];

		$data['goal']['contact'] = @$this->db->select('contact.*')->where('goal_id', $goal_id)->join('contact', 'goal_contact.contact_id=contact.id')->get('goal_contact')->result_array()[0];

		$is_fav = $this->db->where('goal_id', $goal_id)->get('fav')->num_rows();
		if ($is_fav > 0) {
			$data['goal']['is_fav'] = '1';
		} else {
			$data['goal']['is_fav'] = '0';
		}

		$this->load->view('global/header', $data);
		$this->load->view('global/nav', $data);
		$this->load->view('need_single', $data);
		$this->load->view('global/footer', $data);
	}


	public function offer_detail($id = '')
	{
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);


		$data['title'] = 'Offer Detail';

		if (strlen($id) > 0) {
		} else {
			die('INVALID');
		}
		$goal_id_exp = explode('__', $id);
		$goal_id = end($goal_id_exp);

		$data['goal'] = $this->db->where('id', $goal_id)->get('goals')->result_array()[0];


		$data['goal']['address'] = $this->db->where('goal_id', $goal_id)->get('area_shared')->result_array()[0];

		$data['goal']['contact'] = $this->db->select('contact.*')->where('goal_id', $goal_id)->join('contact', 'goal_contact.contact_id=contact.id')->get('goal_contact')->result_array()[0];

		$is_fav = $this->db->where('goal_id', $goal_id)->get('fav')->num_rows();
		if ($is_fav > 0) {
			$data['goal']['is_fav'] = '1';
		} else {
			$data['goal']['is_fav'] = '0';
		}


		$this->load->view('global/header', $data);
		$this->load->view('global/nav', $data);
		$this->load->view('offer_single', $data);
		$this->load->view('global/footer', $data);
	}
	// =============send email code===============
	public function contact_member()
	{
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);

		$goal_id = $_POST['goal_id'];

		$goal = $this->db->where('id', $goal_id)->get('goals')->result_array()[0];

		$member = $this->db->where('id', $goal['member_id'])->get('member')->result_array()[0];
		$email = $_POST['email'];
		$name = $_POST['name'];
		$message = $_POST['message'];
		$to = $member['email'];


		// 		echo 'to: '.$to.'<br/>';
		// 		echo 'from: '.$email.'<br/>';
		// 		echo 'name: '.$name.'<br/>';
		// 		echo 'message: '.$message.'<br/>';


		// $config = array(
		// 	'protocol' => 'smtp',
		// 	'smtp_host' => 'mail.lipsumtechnologies.com',
		// 	'smtp_port' => 465,
		// 	'smtp_user' => 'ghanikhan137@gmail.com',
		// 	'smtp_pass' => 'khange6060',
		// 	// 'smtp_user' => 'noreply@lipsumtechnologies.com <noreply@lipsumtechnologies.com>',
		// 	// 'smtp_pass' => 'E!Eu=p9F*1i4',
		// 	'mailtype'  => 'html',
		// 	'charset'   => 'iso-8859-1'
		// );


		$this->load->model('Common');
		$this->Common->send_email($to, $name . ' has contacted you through '. $data['language']['app_name_goalpost'], $message, $email, $name);
	}
	// =============send email code end===============



	public function offers($start = 0)
	{
		// $language = $this->db->get('language')->result_array();
		// $data['language'] = array();
		// foreach ($language as $lang) {
		// 	$data['language'][$lang['word']] = $lang['display_text'];
		// }

		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);

		$data['title'] = 'Offers';
		$limit = 10000;
		$goals = $this->db->where('type', 'offer')->order_by('id', 'desc')->get('goals')->result_array();

		$count = 0;
		foreach ($goals as $goal) { 
			if ($count >= $start && $count < $limit) {
				$data['goals'][] = $goal;
			}
			$count++;
		}

		if (@$_SESSION['user']['id'] > 0) {
			$data['fav'] = $this->db->select('goals.*')->where('fav.member_id', $_SESSION['user']['id'])->where('goals.type', 'offer')->join('goals', 'fav.goal_id=goals.id')->order_by('id', 'desc')->get('fav')->result_array();
		}


		$this->load->view('global/header', $data);
		$this->load->view('global/nav', $data);
		$this->load->view('offers', $data);
		$this->load->view('global/footer', $data);
	}

	public function offer_search($inp)
	{
		$data['title'] = 'Offer Search';
		$goals = $this->db->where('type', 'offer')->like('name', $inp, 'both')->order_by('id', 'desc')->get('goals')->result_array();

		foreach ($goals as $goal) {
?>
			<div class="row single-goal" onclick="window.location='<?php echo base_url('welcome/offer_detail/' . ($goal['name']) . '__' . ($goal['id'])); ?>'">
				<div class="col-sm-10 goal-desc-left">
					<h4><?php echo $goal['name']; ?></h4>
					<p><?php echo $goal['description']; ?></p>
					<small><?php echo time_elapsed_string($goal['date_created']); ?></small>
				</div>

				<?php
				$no_img = explode(' ', ucfirst($goal['name']));
				$w1 = mb_substr($no_img[0], 0, 1);
				$w2 = (isset($no_img[1]) ? mb_substr($no_img[1], 0, 1) : '');
				?>

				<div class="col-sm-2 goal-img">
					<?php
					if (isset($goal['photo']) && strlen($goal['photo']) > 2) {
						echo '<img style="width: 80px; height: 80px; object-fit: cover;border-radius: 15px; float: right;" src="' . base_url('assets/images/uploads/thumb/' . $goal['photo']) . '">';
					} else {
					?>
						<div class="goal-img-alt"><?php echo $w1 . $w2; ?></div>
					<?php
					}
					?>
				</div>
			</div>
<?php
		}
	}

	public function chat()
	{

		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);

		$data['title'] = 'Public chat';

		$data['messages'] = $this->db->select('chat.*, member.name, member.photo')->join('member', 'member.id=chat.from')->get('chat')->result_array();

		$this->load->view('global/header', $data);
		$this->load->view('global/nav', $data);
		$this->load->view('worldchat', $data);
		$this->load->view('global/footer', $data);
	}

	public function signup()
	{
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);


		$data['title'] = 'Signup';
		if (isset($_GET['er'])) {
			if ($_GET['er'] == 'already') {
				$data['error'] = 'Email already in use. Please try a different email.';
			}
		}
		$this->load->view('global/header', $data);
		$this->load->view('welcome/signup', $data);
		$this->load->view('global/footer', $data);
	}

	public function signup_handler()
	{
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);



		$ret = array(
			'success' => 0,
			'redirect' => '',
		);




		$user_data = array(

			'email' => $_POST['email'],
			'password' => $_POST['password'],
			'name' => $_POST['name'],
			'phone' => $_POST['phone'],
		);
		$already = $this->db->where('email', $_POST['email'])->get('member')->result_array();
		if (sizeof($already)) {
			$ret['redirect'] = base_url('welcome/login?er=already&user=' . $user_data['email']);
			$ret['success'] = 0;
		} else {

			$user_photo = '';

			if (isset($_FILES['photo'])) {
				$user_photo = doupload('photo');
			}

			$user_data['photo'] = $user_photo;


			// ==================
			$user_data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$this->db->insert('member', $user_data);
			$user_data['id'] = $this->db->insert_id();
			unset($user_data['password']);
			$_SESSION['user'] = $user_data;

			if (isset($_SESSION['redirect_after_login']) && strlen($_SESSION['redirect_after_login']) > 0) {
				$ret['redirect'] = base_url($_SESSION['redirect_after_login']);
			} else {
				$ret['redirect'] = base_url('member');
			}

			$ret['success'] = 1;
		}

		echo json_encode($ret);
	}

	public function login()
	{
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);


		unset($_SESSION['redirect_after_login']);
		$data['title'] = 'Login';
		if (isset($_GET['redirect'])) {
			$haystack = $_GET['redirect'];
			$needle = '_';
			$replace = '/';
			$pos = strpos($haystack, $needle);
			$redirect = '';
			if ($pos !== false) {
				$redirect = substr_replace($haystack, $replace, $pos, strlen($needle));
			}
			$_SESSION['redirect_after_login'] = $redirect;
		}
		if (isset($_GET['er'])) {
			if ($_GET['er'] == 'invalid') {
				$data['error'] = 'Invalid email/ password';
			}
		}
		$this->load->view('auth/login', $data);
	}

	public function login_handler()
	{

		$ret = array(
			'success' => 0,
			'redirect' => '',
		);
		$member = $this->db->where('email', $_POST['email'])->get('member')->result_array();
		if (sizeof($member)) {

			$member = $member[0];
			if (password_verify($_POST['password'], $member['password'])) {
				$_SESSION['user'] = $member;

				if (isset($_SESSION['redirect_after_login']) && strlen($_SESSION['redirect_after_login']) > 0) {
					$ret['redirect'] = base_url($_SESSION['redirect_after_login']);
				} else {
					$ret['redirect'] = base_url('member');
				}
			} else {
				$ret['redirect'] = base_url('welcome/login?er=invalid');
			}
		} else {
			$ret['redirect'] = base_url('welcome/login?er=invalid');
		}
		echo json_encode($ret);
	}

	public function authenticate_user()
	{



		$ret = array(
			'email_found' => 0,
		);
		$member = $this->db->where('email', $_POST['email'])->get('member')->result_array();
		if (sizeof($member)) {
			$ret['email_found'] = '1';
		}
		echo json_encode($ret);
		die();
	}


	public function send_confirmation()
	{
		$email = $_POST['email'];
		$code = rand(100000, 999999);
		mail($email, 'Confirm your email', "Here's the confirmation code for Goalpost: $code");
	}


	public function forgot_password()
	{
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);
		
		$this->load->view('auth/forgot_password', $data);
	}

	public function forgot_password_process()
	{
		$email = $_POST['email'];
		$this->sendpassword($email);
		$this->db->select('email');
		$this->db->from('member');
		$this->db->where('email', $email);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function sendpassword($data)
	{
		$jsonLanguage['language'] = json_decode(file_get_contents(base_url('language.json')), true);
		$email = $data;
	$member = $this->db->where('email', $email)->get('member')->result_array();

		if (is_array($member) && @sizeof($member) > 0) {
			$member = $member[0];
			$passwordplain = "";
			$passwordplain = rand(10000, 99999);
			$newpass['auth_code'] = $passwordplain;

			$this->db->where('email', $email);
			$this->db->update('member', $newpass);

			$message = 'Hi' . $member['name'] . '!\n It looks like you requested for password reset. Here\'s the password reset code: <b>' . $passwordplain . '</b>';


			$this->load->model('Common');

			$email_content = $jsonLanguage['language']['controller_sendpassword_email_message'];
			$email_content = str_replace('{{name}}', $member['name'], $email_content);
			$email_content = str_replace('{{otp_code}}', $newpass['auth_code'], $email_content);
			$email_content = str_replace('{{app_name}}', $jsonLanguage['language']['app_name_goalpost'], $email_content);

				$subject = $jsonLanguage['language']['controller_sendpassword_email_subject'];


			$result = $this->Common->send_email($member['email'], $subject, $email_content, '', '');






			if (!$result) {
				$this->session->set_flashdata('msg', 'Failed to send password, please try again!');
			} else {
				echo "send this line";
				$this->session->set_flashdata('msg', 'Password sent to your email!');
			}
			redirect(base_url() . 'welcome/email_reset_pass', 'refresh');
		} else {
			$this->session->set_flashdata('msg', 'Email not found try again!');
			redirect(base_url() . 'welcome/forgot_password?this_email_was_not_register', 'refresh');
		}
	}


	public function email_reset_pass()
	{
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);


		$data['title'] = 'Email Reset';

		// $data['goals'] = $this->db->where('type', 'need')->where('member_id', $_SESSION['user']['id'])->order_by('id', 'desc')->get('goals')->result_array();

		$this->load->view('global/header', $data);
		$this->load->view('global/nav', $data);
		$this->load->view('auth/email_reset_password', $data);
		$this->load->view('global/footer', $data);
	}

	public function auth_code()
	{
		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);



		$ret = array(
			'authCode_found' => 0,
		);
		$member = $this->db->where('auth_code', $_POST['auth_code'])->get('member')->result_array();
		if (sizeof($member)) {
			$ret['authCode_found'] = '1';
			$ret['success'] = 'true';
		} else {
			$ret['success'] = 'false';
			$ret['message'] = $data['language']['welcome_page_auth_code_not_match_message'];
			//<?php echo $language['welcome_page_auth_code_message'] //
			$ret['authCode_found'] = '0';
		}
		echo json_encode($ret);
		die();
	}

	// ========

	public function update_member_password()
	{

		$data['language'] = json_decode(file_get_contents(base_url('language.json')), true);

		$infoMessage = '';
		if (empty($_POST['newPassword'])) {
			$infoMessage = "<script>alert('Please fill in the Blanks');</script>";
		} else {
			$ret = array();
			$member_pass = $this->db->select('*')->from('member')->where('auth_code', $_POST['authCode'])->get()->result_array()[0];

			if ($_POST['authCode'] == $member_pass['auth_code']) {

				if ($_POST['newPassword'] == $_POST['confirmPassword']) {
					$pass = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
					$data = array(

						'password' => $pass,
						'auth_code' => ''
					);

					$this->db->where('auth_code', $_POST['authCode'])->update('member', $data);
					$ret['success'] = 'true';
					$ret['message'] = ' updated successfully';
				} else {
					$ret['success'] = 'false';
					$ret['message'] = $data['language']['welcome_page_password_confirm_not_match_message'];
				}
			} else {
				$ret['success'] = 'false';
				$ret['message'] = $data['language']['welcome_page_auth_code_not_match_message'];
				//<?php echo $data['language']['welcome_page_auth_code_message'] //
			}
		}
		echo json_encode($ret);
	}
}

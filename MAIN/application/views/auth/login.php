<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $title; ?> | <?php echo get_lang('lang_offers_and_needs'); ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">


	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/auth.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/nav.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
	<link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">


	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/overhang.css">

	<script src="<?php echo base_url(); ?>assets/css/overhang.js"></script>


	<style>
		.navbar-nav li {
			padding: 0 10px;
		}
	</style>
	<style>
		.single-goal {
			border-left: 5px solid skyblue;
			margin-bottom: 15px;
			padding: 15px;
			border-top-right-radius: 15px;
			border-bottom-right-radius: 15px;
			border-bottom: 1px solid #f3f3f3;
			transition: all 0.5s;
		}

		.single-goal:hover {
			box-shadow: 0px 0px 29px -14px rgb(0 0 0 / 37%) inset;
			-webkit-box-shadow: 0px 0px 29px -14px rgb(0 0 0 / 37%) inset;
			-moz-box-shadow: 0px 0px 29px -14px rgb(0 0 0 / 37%) inset;
			cursor: pointer;
			padding-left: 25px;
			transition: all 0.5s;
		}

		.goal-desc-left h4,
		.goal-desc-left p,
		#goals-tabls td>p {
			margin-bottom: 0;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
		}

		.goal-img .goal-img-alt {
			height: 80px;
			line-height: 80px;
			border-radius: 15px;
			background-color: skyblue;
			font-size: 25px;
			text-align: center;
			width: 80px;
			float: right;
		}


		.ui-tabs-nav {
			display: flex;
			justify-content: space-between;
			background-color: white;
			border: none;
		}

		.ui-tabs-nav li,
		.ui-tabs-nav li.ui-state-default {
			width: 49%;
			margin: auto;
			border: none;
			background-color: #eeeeee;
		}

		.ui-tabs-nav li a {
			float: none;
			margin: auto;
			width: 100%;
			text-align: center;
		}

		.ui-tabs-nav li.ui-state-active {
			background-color: black;
		}




		.auth-container input.main-single-inp,
		.auth-container select.main-single-inp,
		.auth-container textarea.main-single-inp {
			width: 433px;
			margin: auto;
			margin-top: 50px;
			background-color: #ffffff00;
			height: 50px;
			border: none;
			border-bottom: 2px solid #ffffff;
			border-radius: 0;
			color: #fff;
			outline: none;
			font-size: 25px;
			text-align: center;
			box-shadow: none !important;
			max-width: 100%;
		}

		.auth-container h2.main-heading {
			font-size: 85px;
			font-weight: 600;
			color: #fff
		}

		.auth-container h2.sub-heading {
			font-size: 45px;
			font-weight: 600;
			color: #fff
		}

		.auth-container h3.heading-small {
			font-size: 22px;
			font-weight: 300;
			color: #fff;
			max-width: 800px;
			margin: auto;
		}

		.auth-container .main-single-inp::placeholder {
			color: #ffffff70;
		}

		.auth-container a.next-btn-circle {
			display: block;
			width: 50px;
			height: 50px;
			border-radius: 50%;
			background-color: #fff;
			color: #4caf9d;
			line-height: 53px;
			text-align: center;
			margin: auto;
			margin-top: 28px;
			border: 2px solid white;
			padding-left: 2px;
			transition: all 0.3s;

		}

		.auth-container a.next-btn-circle:hover {
			padding-left: 10px;
			transition: all 0.3s;
		}

		.auth-container a.next-btn-circle>i {
			font-size: 23px;
		}

		@media (max-width: 700px) {
			.auth-container h2.main-heading {
				font-size: 60px;
			}

			.auth-container h3 {
				font-size: 22px;
				font-weight: 400;
			}

		}

		.alert-warning {
			color: #810000;
			background-color: #4caf9d;
			border-color: #810000;
		}

		.dataTables_wrapper>.dt-buttons {
			display: flex;
			zoom: 0.7;
			margin-top: 15px;
		}

		/* =================== */
		.dt-down-arrow {
			display: none !important;
		}

		.dt-button-collection {
			top: 50px !important;
			left: 0px !important;
			
		}

		.buttons-html5, .buttons-print{
			color: #fff !important;
			background-color: #268171 !important;
		}
		
		
		

		

		/* ================== */
		.dataTables_wrapper>.dt-buttons>.dt-button {
			margin: 0;
			background-color: #288171;
			color: white;
			border-radius: 25px;
			border: none;
		}

		.dataTables_wrapper>.dt-buttons>.dt-button:hover {
			background-color: #28817150;
			border: none;
		}

		/* .dataTables_wrapper>.dt-buttons>.dt-button:first-child {
			border-top-left-radius: 25px;
			border-bottom-left-radius: 25px;
		} */

		/* .dataTables_wrapper>.dt-buttons>.dt-button:last-child {
			border-top-right-radius: 25px;
			border-bottom-right-radius: 25px;
		} */

		.navbar-light .navbar-brand:hover{
			color: #fff;
		}
		.navbar-collapse.in {
    display: block !important;
}
	</style>
</head>

<body style="background-color: #4caf9d;">


	<nav class="navbar navbar-expand-lg navbar-light fixed-top">
		<div class="container">
			<a class="navbar-brand" href="<?php echo base_url(); ?>"><?php echo get_setting_value('app_name'); ?></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">

				<ul class="navbar-nav ml-auto">

					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>welcome/offers"><i class="fa fa-earth"></i>
							<?php echo get_lang('lang_offers'); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>welcome/needs"><i class="fa fa-heart"></i> <?php echo get_lang('lang_needs'); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>welcome/chat"><i class="fa fa-comments"></i> <?php echo get_lang('lang_chat'); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>member"><i class="fa fa-user"></i> <?php echo get_lang('lang_sign_in'); ?></a>
					</li>
				</ul>

			</div>
		</div>
	</nav>

	<div class="container text-center auth-container" style="margin-top: 25vh">
		<form method="post" id="signup_form">
			<div class="step">
				<h2 class="main-heading" >

					<?php echo get_lang('lang_welcome') ?></h2>
				<h3 style="color: #fff"><?php echo get_lang('lang_please_enter_your_email') ?></h3>

				<input name="email" autofocus="autofocus" type="email" class="form-control main-single-inp" id="email_login" placeholder="<?php echo get_lang('lang_john_example_com') ?>" style="" value="<?php echo isset($_GET['user']) ? $_GET['user'] : ''; ?>" required>


				<?php
				if (isset($_GET['er'])) {
					echo '<div style="max-width: 500px; margin: auto; font-size: 13px; border: none" class="alert alert-warning  fade show" role="alert">';
					if ($_GET['er'] == 'already') {
				?>


						<strong style="color: #fff;"><?php echo get_lang('lang_error') ?>!</strong> <a href="<?php echo base_url(); ?>welcome/forgot_password"" style="color: #fff; text-decoration: none;" ><?php echo get_lang('lang_email_already_associated') ?></a>

					<?php
					} elseif ($_GET['er'] == 'invalid') {
					?>

						<strong style="color: #fff;"><?php echo get_lang('lang_invalid_details') ?>!</strong><a style="color: #fff; text-decoration: none;" href="<?php echo base_url(); ?>welcome/forgot_password"><?php echo get_lang('lang_incorrect_password') ?></a>

					<?php
					}
					echo '</div>';
				} elseif (isset($_GET['n'])) {
					?>
					<div style="max-width: 500px; margin: auto; font-size: 13px; border: none" class="alert alert-warning  fade show" role="alert">
						<?php echo get_lang('lang_please_login_before_adding_a_new_offer_or_need') ?></div>
				<?php
				}

				if (isset($_GET['status_err'])) {
					if($_GET['status_err'] == '0'){
						?>
						<strong style="color: #fff;"><?php echo get_lang('lang_pending_approval_by_admin') ?></strong>
							<?php
					}
					if($_GET['status_err'] == '3' || $_GET['status_err'] == '2'){
						?>
						<strong style="color: #fff;"><?php echo get_lang('lang_restricted_by_admin') ?></strong>
						<?php
					}

				}

				?>


				<a href="#" class="next-btn-circle"  onclick=" authenticate_user(this);"><i class="fa fa-angle-right" ></i></a>

			</div>

			<div class="step password_step" style="display: none;">
				<h2 class="sub-heading" style=""><?php echo get_lang('lang_enter_your_password') ?></h2>
				<h3 class="heading-small" style="color: #fff"><?php echo get_lang('lang_please_enter_your_password_below') ?></h3>

				<div class="d-flex" style="justify-content: space-between; max-width: 433px; margin: auto;margin-top: 15px;color: #686bd2;">
					<div style="margin:0px auto;"> <a href="<?php echo base_url('welcome/forgot_password'); ?>" style="margin:0px auto; color: #686bd2;font-weight: 600;"> <?php echo get_lang('lang_forgot_password') ?></a>
					</div>
				</div>

				<div style="display: inline-block">
					<input type="password" class="form-control main-single-inp" id="password_inp_login" placeholder="<?php echo get_lang('lang_your_password') ?>" style="max-width: 300px">
					<i onclick="$('#password_inp_login').attr('type', 'text'); $(this).hide(); $('.fa-eye-low-vision').show();" style="color: white;position:relative;top: -35px;right: 7px;float: right;font-size: 20px;height: 30px;width: 30px;line-height: 30px;cursor: pointer;" class="fa fa-eye"></i>
					<i onclick="$('#password_inp_login').attr('type', 'password');  $(this).hide(); $('.fa-eye').show();" style="display: none ;color: white;position:relative;top: -35px;right: 7px;float: right;font-size: 20px;height: 30px;width: 30px;line-height: 30px;cursor: pointer;" class="fa fa-eye-low-vision"></i>
				</div>
				<br />
				<a class="next-btn-circle" style="width: auto;display: inline-block;border-radius: 25px;clear: both;padding: 0px 38px;border: none; box-shadow: none; color: #4caf9d; cursor: pointer;line-height:  44px;text-decoration: none;font-size: 25px;" onclick="login_user(this);"><?php echo get_lang('lang_sign_in'); ?>!
				</a>

			</div>

			<div class="step no_match" style="display: none;">
				<h2 class="sub-heading" style=""><?php echo get_lang('lang_oops_this_email_does_not_match_with_any_account'); ?></h2>
				<h3 class="heading-small" style="color: #fff"><?php echo get_lang('lang_but_you_can_create_an_account_simply_by_clicking_the_button_below'); ?>: </h3>


				<br />
				<a href="#" class="next-btn-circle" style="width: auto;display: inline-block;border-radius: 25px;clear: both;padding: 0px 38px;border: none; box-shadow: none; color: #4caf9d; cursor: pointer;line-height:  44px;text-decoration: none;font-size: 25px;" onclick="$('.step').hide(); $('.step.new_account').show();"><?php echo get_lang('lang_sign_up_now'); ?>!
				</a>
			</div>

			<div class="step new_account" style="display: none; max-width: 449px; margin: auto">
				<h2 class="sub-heading" style=""><?php echo get_lang('lang_the_last_step'); ?> ;)</h2>
				<h3 class="heading-small" style="color: #fff"><?php echo get_lang('lang_please_enter_your_details_below'); ?>:</h3>


				<div>
					<!-- <label style="height: 165px;border: 25px; display: block; width: 100%;text-align: center;font-size: 25px;padding: 20px 0;background-color: #288171;border-radius: 25px;opacity: 0.8;margin: 30px 0;border: 2px dashed;">
						Click or drag to upload<br>
						<i class="fa fa-file-upload" style="font-size: 50px;padding-top: 20px;"></i>
						<input id="file_input" onchange="readURL(this);" type="file" name="goal_image" style="display: none;">
					</label>
					<div id="image_preview" class="text-center" style="display: none">
						<h5>Preview</h5>

						<i class="fa fa-close" onclick="reset_img();" style="border: 2px solid white;border-radius: 50%;width: 20px;height: 20px;position: relative;bottom: -3px; cursor: pointer"></i>
						<img id="blah" src="http://placehold.it/180" alt="your image" style=" max-width: 100%; height: 250px; margin: auto; display: block; border-radius: 25px; border: 3px solid #1f6458; opacity: 0.8;" />
					</div> --> 

					<input style="font-size: 20px;" class="form-control main-single-inp" type="file" name="photo">
					<span style="color: white;display: block;text-align: le;font-style: italic;font-size: 13px;"><?php echo get_lang('lang_add_your_photo'); ?></span>
				</div>
				<div>
					<input type="text" class="form-control main-single-inp" name="name" id="name_inp" placeholder="<?php echo get_lang('lang_your_name'); ?>" style="max-width: 433px" value="">
				</div>
				<div>
					<input type="text" class="form-control main-single-inp" name="phone" id="phone_inp" placeholder="<?php echo get_lang('lang_phone_number'); ?>" style="max-width: 433px" value="">
				</div>


				<div>
					<input type="email" class="form-control main-single-inp" name="email" id="new_email_inp" placeholder="<?php echo get_lang('lang_your_email'); ?>" style="max-width: 433px" value="">
				</div>

				<div>
					<input type="password" class="form-control main-single-inp" name="password" id="password_inp" placeholder="<?php echo get_lang('lang_your_password'); ?>" style="max-width: 433px">
					<i onclick="$('#password_inp').attr('type', 'text'); $(this).hide(); $('.fa-eye-low-vision').show();" style="color: white;position:relative;top: -35px;right: 7px;float: right;font-size: 20px;height: 30px;width: 30px;line-height: 30px;cursor: pointer;" class="fa fa-eye"></i>
					<i onclick="$('#password_inp').attr('type', 'password');  $(this).hide(); $('.fa-eye').show();" style="display: none ;color: white;position:relative;top: -35px;right: 7px;float: right;font-size: 20px;height: 30px;width: 30px;line-height: 30px;cursor: pointer;" class="fa fa-eye-low-vision"></i>
				</div>

				<br />
				<a href="#" class="next-btn-circle" style="width: auto;display: inline-block;border-radius: 25px;clear: both;padding: 0px 38px;border: none; box-shadow: none; color: #4caf9d; cursor: pointer;line-height:  44px;text-decoration: none;font-size: 25px;" onclick="submit_form(this);"><?php echo get_lang('lang_sign_up'); ?>!
				</a>
			</div>


		</form>
	</div>




	<script>
		function authenticate_user($this) {
			$email = $('input[name=email]').val();
			if (!isEmail($email)) {
				$('#email_login').css('color', '#ac5b5b');
				return false;
			} else {
				$('#email_login').css('color', 'white');
				$.ajax({
					url: '<?php echo base_url('welcome/authenticate_user'); ?>',
					data: {
						'email': $email
					},
					type: 'post',
					success: function(data) {
						data = JSON.parse(data);
						if (data.email_found == '1') {
							$('.step').hide();
							$('.step.password_step').show();
						} else {
							$('.step').hide();
							$('.step.no_match').show();
							$('#new_email_inp').val($email);
						}
					}
				})
			}
		}
		// ===================
		function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('#blah')
							.attr('src', e.target.result);
						$('#image_preview').show();
					};

					reader.readAsDataURL(input.files[0]);
				}
			}

			function reset_img(){
				$('#image_preview').hide();

				$('#file_input').val(null);
			}
		// ===================

		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$('#blah')
						.attr('src', e.target.result);
					$('#image_preview').show();
				};

				reader.readAsDataURL(input.files[0]);
			}
		}

		function reset_img() {
			$('#image_preview').hide();

			$('#file_input').val(null);
		}

		function submit_form($this) {


		$form = new FormData($('#signup_form')[0])
		$.ajax({
			url: '<?php echo base_url('welcome/signup_handler'); ?>',
			type:'post',
			cache:false,
			contentType: false,
			processData: false,
			data:$form,
				success: function(data) {
					data = JSON.parse(data);
					window.location = data.redirect;
				}
			})
		}


		function login_user($this) {
			
			$email = $('input#email_login').val();
			$password = $('input#password_inp_login').val();
			$.ajax({
				url: '<?php echo base_url('welcome/login_handler'); ?>',
				data: {
					email: $email,
					password: $password
				},
				type: 'post',
				success: function(data) {
					data = JSON.parse(data);
					window.location = data.redirect;
				}
			})
		}


		function isEmail(email) {
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			return regex.test(email);
		}

		
	</script>

	<!--<footer><span style="color: #999;" >Copyrights &copy; 2022. Designed & Developed by Lipsum Technologies &reg; Pvt Ltd</span></footer>-->
</body>

</html>

<style>
	body {
		background: #268171;
		padding-bottom: 60px;
	}

	.text-muted {
		color: white !important;
	}
</style>
<div class="container text-center auth-container" style="margin-top: 25vh">
	<form action="<?php echo base_url('admin/login_post'); ?>" method="post"
		  style="text-align: left; max-width: 500px; margin: auto; color: white">
		<div style=" "><a href="/"
						  style=" float: left; border: 1px solid white; width: 35px; height: 35px; border-radius: 50%; display: flex; justify-content: center; align-items: center; color: white; "><i
						class="fa fa-home"></i></a>
			<h3 style=" color: white; text-align: center; ">Admin Login</h3></div>
		<div style="border: 1px solid silver; border-radius: 5px; padding: 15px">
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email"
					   class="form-control" name="email" id="email" aria-describedby="helpId"
					   placeholder="Enter your email">
			</div>


			<div class="form-group">
				<label for="email">Password</label>
				<input type="password"
					   class="form-control" name="password" id="email" aria-describedby="helpId"
					   placeholder="Enter your Password">
			</div>

			<div class="form-group">
				<input type="submit"
					   class="btn btn-primary" name="submit" id="email" aria-describedby="helpId" value="Submit"
				>
			</div>


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
				data: {'email': $email},
				type: 'post',
				success: function (data) {
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


	function submit_form($this) {
		$name = $('input#name_inp').val();
		$email = $('input#new_email_inp').val();
		$password = $('input#password_inp').val();
		$.ajax({
			url: '<?php echo base_url('welcome/signup_handler'); ?>',
			data: {email: $email, name: $name, password: $password},
			type: 'post',
			success: function (data) {
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
			data: {email: $email, password: $password},
			type: 'post',
			success: function (data) {
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

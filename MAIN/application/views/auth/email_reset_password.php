<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

	<!-- ================= -->

	<div class="container text-center col-md-10 auth-container" style="margin-top: 15vh;">
		<div class="col-md-8" style="margin: auto; color: white">

			<div class="alert alert-warning" id="alert-message" style="display: none">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<span id="message"></span>
			</div>
			<div class="alert alert-warning" id="alert-message-auth" style="display: none">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<span id="auth-message"></span>
			</div>




			<form method="post" action="<?php //echo base_url('member/update_member_password'); 
										?>">



				<div style="margin-top: 15px" class="step">
					<h3 class="text-center"><?php echo $language['email_reset_password_page_enter_auth_code']; ?></h3>
					<p class="text-center"><?php  echo $language['email_reset_password_page_check_the_spam_folder_for_the_password_reset']; ?></p>
					<input type="text" id="auth_code" class="form-control main-single-inp" name="auth_code" placeholder="<?php echo $language['email_reset_password_page_placeholder_auth_code']; ?>">
					<a href="#" class="next-btn-circle" onclick=" authenticate_user(this);"><i class="fa fa-angle-right"></i></a>
				</div>



				<hr>
				<div style="margin-top: 15px; display: none;" class="step password_step">
				<h3 class="text-center"><?php echo $language['email_reset_password_page_change_your_password']; ?></h3>
					<input type="password" id="new_password" class="form-control main-single-inp" name="new_password" placeholder="<?php echo $language['email_reset_password_page_placeholder_new_password']; ?>">
				</div>
				<div style="margin-top: 15px; display: none;" class="step password_step">
					<input type="password" id="confirm_password" class="form-control main-single-inp" name="confirm_password" placeholder="<?php echo $language['email_reset_password_page_placeholder_confirm_password']; ?>">
				</div>


				<div style="margin-top: 15px; display: none;" class="step password_step">
					<button onclick="change_member_pass(this);" type="button" style="background-color: #fff; color: #288171; cursor:pointer; width: auto;margin: auto;margin-top: 30px;" class="form-control"><i class="fa fa-check"></i> <?php echo $language['email_reset_password_page_button_update_password']; ?></button>
				</div>


			</form>
		</div>
	</div>

	<!-- ===================== -->




	<script>
		function authenticate_user($this) {
			$('#alert-message').hide();
			$authCode = $('input[name=auth_code]').val();
			if ($authCode) {
				$('#auth_code').css('color', 'white');
				$.ajax({
					url: '<?php echo base_url('welcome/auth_code'); ?>',
					data: {
						'auth_code': $authCode
					},
					type: 'post',
					success: function(data) {
						data = JSON.parse(data);
						if (data.authCode_found == '1') {
							$('.step').hide();
							$('.step.password_step').show();
						} else {
							$('#alert-message').find('#message').html(data.message);
							$('#alert-message').show();
						}
					}
				})
			}

		}

		function change_member_pass($this) {

			$authCode = $('input#auth_code').val();
			$newPassword = $('input#new_password').val();
			$confirmPassword = $('input#confirm_password').val();
			$.ajax({
				url: '<?php echo base_url('welcome/update_member_password'); ?>',
				data: {
					authCode: $authCode,
					newPassword: $newPassword,
					confirmPassword: $confirmPassword
				},
				type: 'post',
				success: function(data) {
					data = JSON.parse(data);
					if (data.success == 'true') {
						window.location='<?php echo base_url('welcome/login?password_updated'); ?>';
					} else {
						$('#alert-message').find('#message').html(data.message);
						$('#alert-message').show();
					}

				}
			})
		}
	</script>

	<!--<footer><span style="color: #999;" >Copyrights &copy; 2022. Designed & Developed by Lipsum Technologies &reg; Pvt Ltd</span></footer>-->
</body>

</html>
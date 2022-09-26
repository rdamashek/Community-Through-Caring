<div class="container text-center offset-md-2 col-md-10" style="margin-top: 15vh;">
	<div class="col-md-8" style="margin: auto; color: white">
		<h3 class="text-center">Change password</h3>

<?php
if(isset($_GET['old_pass_not_match'])){
	?>

<div class="alert alert-warning">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Error</strong> Old password is incorrect
</div>

	<?php
}
if(isset($_GET['password_not_match'])){
	?>

<div class="alert alert-warning">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Error</strong> Password and confirm password dont match
</div>

	<?php
}
?>


		<form method="post" action="<?php echo base_url('admin/update_admin_password'); ?>">



			<div style="margin-top: 15px">
				<span style="color: white; display: block; text-align: left;font-style: italic;font-size: 13px;">Old password</span>
				<input type="password" <?php echo $_SESSION['admin']['password'] ?> id="offer_price" class="form-control main-single-inp" name="old_password"
					   placeholder="">
			</div>

			<hr>
			<div style="margin-top: 15px">
				<span style="color: white; display: block; text-align: left;font-style: italic;font-size: 13px;">New password</span>
				<input type="password" id="offer_price" class="form-control main-single-inp" name="new_password"
					   placeholder="">
			</div>
			<div style="margin-top: 15px">
				<span style="color: white; display: block; text-align: left;font-style: italic;font-size: 13px;">Confirm new password</span>
				<input type="password" id="offer_price" class="form-control main-single-inp" name="confirm_password"
					   placeholder="">
			</div>


			<div style="margin-top: 15px">
				<button type="submit"   style="background-color: #fff; color: #288171; cursor:pointer;" class="form-control"><i class="fa fa-check"></i> Update Password</button>
			</div>


		</form>
	</div>
</div>

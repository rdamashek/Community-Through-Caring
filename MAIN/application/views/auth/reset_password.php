<div class="container text-center col-md-10" style="margin-top: 15vh;">
	<div class="col-md-8" style="margin: auto; color: white">
		<h3 class="text-center"><?php echo get_lang('lang_change_password'); ?></h3>

<?php
if(isset($_GET['old_pass_not_match'])){
	?>

<div class="alert alert-warning">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong><?php echo get_lang('lang_error'); ?></strong> <?php echo get_lang('lang_old_password_is_incorrect'); ?>
</div>

	<?php
}
if(isset($_GET['password_not_match'])){
	?>

<div class="alert alert-warning">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong><?php echo get_lang('lang_error'); ?></strong> <?php echo get_lang('lang_new_password_and_confirmation_do_not_match'); ?>
</div>

	<?php
}
?>


		<form method="post" action="<?php echo base_url('reset/password?hash='.$hash); ?>">



			<div style="margin-top: 15px">
				<span style="color: white; display: block; text-align: left;font-style: italic;font-size: 13px;"><?php echo get_lang('lang_old_password'); ?></span>
				<input type="password" <?php echo $_SESSION['user']['password'] ?> id="offer_price" class="form-control main-single-inp" name="old_password"
					   placeholder="">
			</div>

			<hr>
			<div style="margin-top: 15px">
				<span style="color: white; display: block; text-align: left;font-style: italic;font-size: 13px;"><?php echo get_lang('lang_new_password'); ?></span>
				<input type="password" id="offer_price" class="form-control main-single-inp" name="new_password"
					   placeholder="">
			</div>
			<div style="margin-top: 15px">
				<span style="color: white; display: block; text-align: left;font-style: italic;font-size: 13px;"><?php echo get_lang('lang_confirm_new_password'); ?></span>
				<input type="password" id="offer_price" class="form-control main-single-inp" name="confirm_password"
					   placeholder="">
			</div>


			<div style="margin-top: 15px">
				<button type="submit"   style="background-color: #fff; color: #288171; cursor:pointer;" class="form-control"><i class="fa fa-check"></i><?php echo get_lang('lang_update_password'); ?></button>
			</div>


		</form>
	</div>
</div>

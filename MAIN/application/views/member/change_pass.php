

<style>
input.main-single-inp {
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

		 h2.main-heading {
			font-size: 85px;
			font-weight: 600;
			color: #fff
		}

		 h2.sub-heading {
			font-size: 45px;
			font-weight: 600;
			color: #fff
		}

		 h3.heading-small {
			font-size: 22px;
			font-weight: 300;
			color: #fff;
			max-width: 800px;
			margin: auto;
		}

		 input.main-single-inp::placeholder {
			color: #ffffff70;
		}

		 a.next-btn-circle {
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

		 a.next-btn-circle:hover {
			padding-left: 10px;
			transition: all 0.3s;
		}

		 a.next-btn-circle>i {
			font-size: 23px;
		}

		@media (max-width: 700px) {
			 h2.main-heading {
				font-size: 60px;
			}

			 h3 {
				font-size: 22px;
				font-weight: 400;
			}

		}

		.alert-warning {
			color: #810000;
			background-color: #4caf9d;
			border-color: #810000;
		}
	</style>

<div class="container text-center offset-md-2 col-md-10 auth-container" style="margin-top: 15vh;">
	<div class="col-md-8" style="margin: auto; color: white">
		<h3 class="text-center"><?php echo get_lang('lang_change_password'); ?></h3>

		<?php
		if (isset($_GET['old_pass_not_match'])) {
		?>

			<div class="alert alert-warning">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong><?php echo get_lang('lang_error'); ?></strong> <?php echo get_lang('lang_old_password_is_incorrect'); ?>
			</div>

		<?php
		}
		if (isset($_GET['password_not_match'])) {
		?>

			<div class="alert alert-warning">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong><?php echo get_lang('lang_error'); ?></strong> <?php echo get_lang('lang_password_and_confirmation_password_do_not_match'); ?>
			</div>

		<?php
		}
		?>


		<form method="post" action="<?php echo base_url('member/update_member_password'); ?>">



			<div style="margin-top: 15px">
				<input type="password" <?php echo $_SESSION['user']['password']; ?> id="offer_price" class="form-control main-single-inp" name="old_password" placeholder="<?php echo get_lang('lang_old_password'); ?>">
			</div>

			<hr>
			<div style="margin-top: 15px">
				<input type="password" id="offer_price" class="form-control main-single-inp" name="new_password" placeholder="<?php echo get_lang('lang_new_password'); ?>">
			</div>
			<div style="margin-top: 15px">
				<input type="password" id="offer_price" class="form-control main-single-inp" name="confirm_password" placeholder="<?php echo get_lang('lang_confirm_new_password'); ?>">
			</div>


			<div style="margin-top: 15px">
				<button type="submit" style="background-color: #fff; color: #288171; cursor:pointer;width: auto;margin: auto;margin-top: 35px;" class="form-control"><i class="fa fa-check"></i> <?php echo get_lang('lang_update_password'); ?></button>
			</div>


		</form>
	</div>
</div>

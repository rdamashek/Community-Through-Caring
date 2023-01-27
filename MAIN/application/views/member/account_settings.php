<?php
// print_r($_SESSION['user']);
?>

<style>
	/* image css  */
	@import url("https://fonts.googleapis.com/css2?family=ABeeZee&family=Barlow:wght@400;500&display=swap");





	button,
	input[type="submit"],
	input[type="reset"] {
		background: none;
		color: inherit;
		border: none;
		padding: 0;
		font: inherit;
		cursor: pointer;
		outline: inherit;
	}

	.choice-button {
		height: 50px;
		margin: auto;
		margin-top: 40px;
		color: #606076;
		background-color: #ffffff;
		padding: 12px 38px;
		padding-right: 27px;
		border-radius: 37px;
		display: flex;
		align-items: center;
		transition: 0.35s ease all;
		box-shadow: 10px 9px 12px -1px rgba(0, 0, 0, 0.03);
	}

	.choice-button:hover {
		background-color: #18c2a8;
		color: #ffffff;
	}

	.choice-icons {
		display: flex;
		margin-left: 8px;
	}

	.choice-icons div {
		border-radius: 7px;
	}

	.choice-icons div:first-child {
		margin-right: 5px;
		margin-left: 15px;
		box-shadow: 5px 9px 27px rgba(10, 202, 177, 0.33);
	}

	.choice-icons svg {
		padding: 13px 7px;
		height: 17px;
		width: 17px;
	}

	.upload-icon {
		background-color: #18c2a8;
		transition: 0.35s ease all;
	}

	#button-text {
		min-width: 125px;
	}

	.choice-button:hover .upload-icon {
		background-color: #f3faff;
	}

	.choice-button path {
		transition: 0.2s ease all;
	}

	.choice-button:hover .upload-icon path {
		fill: #8989a3;
	}

	.template-icon {
		background-color: #d7d7e2;
		transition: 0.35s ease all;
	}

	.choice-button:hover .template-icon {
		background-color: #315270;
	}

	.choice-button .template-icon:hover {
		background-color: #072c4e;
	}


	/* image css end */
	input.main-single-inp {
		width: 433px;
		margin: auto;
		margin-top: 30px !important;
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
<div class="container text-center offset-md-2 col-md-10 auth-container" style="margin-top: 5vh;">

<?php
	if ($this->session->flashdata('true')) {
	?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<?php echo $this->session->flashdata('true'); ?>
		</div>
	<?php
	} else if ($this->session->flashdata('err')) {
	?>
		<div class="alert alert-success">
			<?php echo $this->session->flashdata('err'); ?>
		</div>
	<?php } ?>
	<div class="col-md-8" style="margin: auto; color: white">
		<h3 class="text-center"><?php echo $language['account_setting_page']; ?></h3>

		<form method="post" enctype="multipart/form-data" action="<?php echo base_url('member/update_member_account'); ?>">


			<div style="margin-top: 15px">

				<label for="image_display" style="max-width:100%;width: 460px;margin: auto;padding: 15px;border: 2px solid white;border-radius: 25px;background-color: #46af9d;">
					<label style="display: block;margin-bottom: 15px;"><?php echo $language['account_settings_your_photo']; ?></label>
					<img class="user-img" style="height: 80px;width: 80px;border-radius: 50%;" src="<?php echo base_url('assets/images/uploads/thumb/' . $_SESSION['user']['photo']) ?>"></label>
				<button onclick="" type="button" class="choice-button">
					<label for="file_input" style="display: contents;">
						<span id="button-text"><?php echo $language['account_settings_change_photo']; ?></span>
						<div class="choice-icons">
							<div class="upload-icon">
								<input id="file_input" type="file" name="goal_image" style="display: none;">
								<svg style="height: 40px; width: 27px;" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M5.86002 11.4612C5.16128 11.4612 4.57841 10.9537 4.51739 10.2922C4.38982 8.90918 4.35753 7.51996 4.42063 6.13345C4.34447 6.12861 4.26831 6.12355 4.19217 6.11827L2.84677 6.02507C1.98685 5.9655 1.50615 5.0543 1.9704 4.36385C2.9605 2.89133 4.77529 1.24324 6.26873 0.223737C6.70572 -0.0745794 7.29431 -0.0745786 7.7313 0.223737C9.22474 1.24324 11.0395 2.89133 12.0296 4.36385C12.4939 5.0543 12.0132 5.9655 11.1533 6.02507L9.80786 6.11827C9.73172 6.12355 9.65556 6.12861 9.5794 6.13345C9.6425 7.51996 9.61021 8.90918 9.48264 10.2922C9.42162 10.9537 8.83875 11.4612 8.14001 11.4612H5.86002ZM5.80908 5.56883C5.70637 7.10291 5.72555 8.64223 5.86649 10.1737H8.13354C8.27448 8.64222 8.29366 7.10291 8.19095 5.56883C8.17943 5.39684 8.24096 5.22765 8.36176 5.09912C8.48256 4.97058 8.65254 4.89345 8.83367 4.88497C9.12572 4.87129 9.41763 4.85435 9.70936 4.83415L10.6865 4.76646C9.81979 3.55334 8.73457 2.49392 7.47989 1.6374L7.00002 1.30982L6.52014 1.6374C5.26546 2.49392 4.18024 3.55335 3.31355 4.76646L4.29067 4.83415C4.5824 4.85436 4.87431 4.87129 5.16636 4.88497C5.34748 4.89345 5.51747 4.97059 5.63827 5.09912C5.75907 5.22765 5.8206 5.39684 5.80908 5.56883Z" fill="white" />
									<path d="M1.35484 11.7812C1.35484 11.4256 1.05155 11.1374 0.677419 11.1374C0.303291 11.1374 0 11.4256 0 11.7812V13.4979C0 14.3275 0.707679 15 1.58065 15H12.4194C13.2923 15 14 14.3275 14 13.4979V11.7812C14 11.4256 13.6967 11.1374 13.3226 11.1374C12.9485 11.1374 12.6452 11.4256 12.6452 11.7812V13.4979C12.6452 13.6164 12.5441 13.7125 12.4194 13.7125H1.58065C1.45594 13.7125 1.35484 13.6164 1.35484 13.4979V11.7812Z" fill="white" />
								</svg>

							</div>
						</div>
					</label>
				</button>



			</div>
			<div style="margin-top: 15px">
				<input type="text" id="offer_price" value="<?php echo $_SESSION['user']['name']; ?>" class="form-control main-single-inp" name="name" placeholder="<?php echo $language['account_settings_input_lable_name']; ?>">
				<span style="color: white;display: block;text-align: le;font-style: italic;font-size: 13px;"><?php echo $language['account_settings_input_lable_name']; ?></span>

			</div>
			<div style="margin-top: 15px">
				<input type="text" id="offer_price" value="<?php echo $_SESSION['user']['email']; ?>" class="form-control main-single-inp" name="email" placeholder="<?php echo $language['account_settings_input_lable_email']; ?>" readonly="readonly">
				<span style="color: white;display: block;text-align: le;font-style: italic;font-size: 13px;"><?php echo $language['account_settings_input_lable_email']; ?></span>
			</div>
			<div style="margin-top: 15px">
				<input type="text" id="offer_price" class="form-control main-single-inp" name="phone" value="<?php echo $_SESSION['user']['phone']; ?>" placeholder="<?php echo $language['account_settings_input_lable_phone']; ?>">
				<span style="color: white;display: block;text-align: le;font-style: italic;font-size: 13px;"><?php echo $language['account_settings_input_lable_phone']; ?></span>
			</div>


			<div style="margin-top: 30px">
				<button type="button" onclick="window.location='<?php echo base_url('member/change_password'); ?>'" style="background-color: #29af9e;color: white; cursor:pointer;margin-top: 40px;width: 440px;max-width: 100%; margin: auto;margin-top: 48px;border: none;border-bottom: 2px solid;border-radius: 0;" class="form-control"><i class="fa fa-eye" style="margin-right: 15px;"></i><?php echo $language['account_settings_input_lable_password']; ?></button>
				
			</div>

			<div style="margin-top: 35px">
				<button type="submit" style="background-color: #288171; color: white; cursor:pointer; width: 250px; max-width:100%; margin: auto;" class="form-control"><i class="fa fa-check"></i> <?php echo $language['account_settings_input_lable_submit']; ?></button>

			</div>

		</form>
	</div>
</div>
<script>


</script>

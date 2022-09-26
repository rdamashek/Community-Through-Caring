

<div class="container text-center offset-md-2 col-md-10" style="margin-top: 15vh;">
	<div class="col-md-8" style="margin: auto; color: white">
		<h3 class="text-center">Account settings</h3>

		<form method="post" action="<?php echo base_url('admin/update_admin_account');?>">


			
			<div style="margin-top: 15px">
				<span style="color: white; display: block; text-align: left;font-style: italic;font-size: 13px;">Name</span>
				<input type="text" id="offer_price" class="form-control main-single-inp" name="name"
					   placeholder="" value="<?php echo $_SESSION['admin']['name']; ?>">
			</div>
			<div style="margin-top: 15px">
				<span style="color: white; display: block; text-align: left;font-style: italic;font-size: 13px;">Email Address</span>
				<input type="text" id="offer_price" class="form-control main-single-inp" name="email"
					   placeholder="" value="<?php echo $_SESSION['admin']['email'] ?>">
			</div>
			


			<div style="margin-top: 15px">
				<button type="button"  onclick="window.location='<?php echo base_url('admin/change_password'); ?>'" style="background-color: #fff; color: #288171; cursor:pointer;" class="form-control"><i class="fa fa-eye"></i> Change Password</button>
			</div>

			<div style="margin-top: 35px">
				<button type="submit" style="background-color: #288171; color: white; cursor:pointer;" class="form-control"><i class="fa fa-check"></i> Submit</button>
			</div>

		</form>
	</div>
</div>

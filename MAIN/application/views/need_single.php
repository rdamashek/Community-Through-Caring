<style>
	.form-control,
	.form-control:active,
	.form-control:focus,
	.form-control:hover {
		border-radius: 0;
		outline: none;
		background-color: #349080;
		color: white;
		border-color: #55a899;
	}

	.form-control::placeholder {
		color: white;
	}

	.fade:not(.show) {
		opacity: 1;
	}

	.modal-backdrop.fade:not(.show) {
		opacity: 0.5;
	}
</style>

<div class="container text-center " style="margin-top: 15vh">
	<div class="col-md-8" style="margin: auto; color: white; text-align: left">

		<img style="width: 400px; max-height: 380px; max-width:100%; object-fit: cover; margin: auto; display: block;" src="<?php echo base_url('assets/images/uploads/' . $goal['photo']); ?>">
		<h3 style="margin-top: 25px"><?php echo $goal['name']; ?> <span style="float: right;font-size: 13px;line-height: 35px;color: #d4fff7;font-style: italic;font-weight: normal;"><i class="fa fa-clock"></i><?php echo time_elapsed_string($goal['date_created']); ?> &nbsp; &nbsp; <a href="#" style="color: white" onclick="add_fav(this, <?php echo $goal['id']; ?>)"><i class="<?php echo $goal['is_fav'] == '1' ? 'fa' : 'fa-regular'; ?> fa-heart" style="font-size: 27px;position: relative;top: 4px;"></i></a> </span></h3>
		<p><?php echo $goal['description']; ?>
		<div>
			<h5><?php echo $language['needs_single_detail'] ?></h5>

		</div>

	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="login-prompt" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document" style="    margin-top: 20vh;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?php echo $language['needs_single_model_login'] ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<?php echo $language['needs_single_model_login_info'] ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $language['needs_single_model_close'] ?></button>
				<button type="button" class="btn btn-primary" onclick="window.location='<?php echo base_url('welcome/login?redirect=welcome_needs'); ?>'"><?php echo $language['needs_single_model_login_now'] ?></button>
			</div>
		</div>
	</div>
</div>

<script>
	function add_fav($this, $id) {

		<?php
		if (isset($_SESSION['user']['id'])) {

		?>
		if ($($this).find('i').hasClass('fa-regular')) {
			$.ajax({
				url: '<?php echo base_url('member/add_fav'); ?>/' + $id,
				success: function(data) {
					$($this).find('i').removeClass('fa-regular').addClass('fa');
				}
			})
		} else {
			$.ajax({
				url: '<?php echo base_url('member/remove_fav'); ?>/' + $id,
				success: function(data) {
					$($this).find('i').removeClass('fa').addClass('fa-regular');
				}
			})
		}
		<?php

		} else {
		?>
			$('#login-prompt').modal('show');
		<?php
		}
		?>
	}
</script>
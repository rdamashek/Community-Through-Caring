<style>
	.list-group-item {
		position: relative;
		display: block;
		padding: 0.75rem 1.25rem;
		margin-bottom: -1px;
		background-color: #349080;
		border: 1px solid rgba(0, 0, 0, .125);
	}

	.list-group-item .badge {
		float: right;
		font-size: 16px;
		font-weight: 600;
	}

	a,
	a:hover {
		color: white;
	}
</style>

<div class="container text-center " style="margin-top: 15vh">
	<div class="col-md-8" style="margin: auto; color: white; text-align: left">

		<img style="width: 400px; max-height: 380px; max-width: 100%; object-fit: cover; margin: auto; display: block;" id="goal_img" src="<?php echo base_url('assets/images/uploads/' . $goal['photo']); ?>">
		<h3 style="margin-top: 25px"><?php echo $goal['name']; ?> <span style="float: right;font-size: 13px;line-height: 35px;color: #d4fff7;font-style: italic;font-weight: normal;"><i class="fa fa-clock"></i><?php echo time_elapsed_string($goal['date_created']); ?> &nbsp; &nbsp; <a href="#" style="color: white" onclick="add_fav(this, <?php echo $goal['id']; ?>)"><i class="<?php echo $goal['is_fav'] == '1' ? 'fa' : 'fa-regular'; ?> fa-heart" style="font-size: 27px;position: relative;top: 4px;"></i></a> </span></h3>
		<p><?php echo $goal['description']; ?>
		<div>
			<h5><?php echo $language['offers_single_detail'] ?></h5>

			<ul class="list-group">
				<?php
				if (strtolower($goal['cost']) == 'price') {
					echo '<li class="list-group-item">Cost<span class="badge">' . $goal['price'] . '</span></li>';
				} elseif (strtolower($goal['cost']) == 'barter') {
					echo '<li class="list-group-item">Barter <span class="badge">' . $goal['barter_details'] . '</span></li>';
				} elseif (strtolower($goal['cost']) == 'free') {
					echo '<li class="list-group-item">Cost<span class="badge">FREE</span></li>';
				}

				if ($goal['delivery_type'] == 'virtual') {
					echo '<li class="list-group-item">Delivery Details<span class="badge" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 350px;">' . $goal['deliery_location'] . '</span></li>';
				} elseif ($goal['delivery_type'] == 'address') {
					echo '<li class="list-group-item">Delivery Address<span class="badge">' . $goal['address']['address'].' '.$goal['address']['city'] . ', ' . $goal['address']['state_province'].', '. $goal['address']['county'].', '. $goal['address']['country'].' - '. $goal['address']['zip'] .  '</span></li>';

					if(strlen($goal['address']['zip']) > 0){
						echo '<li class="list-group-item">ZIP'.'<span class="badge">' .  $goal['address']['zip'] . '</span></li>';
					}



					echo '<li class="list-group-item">Available within the '.'<span class="badge">' .  ucwords($goal['address']['region']) . '</span></li>';

					if($goal['address']['distance'] > 0) {
						echo '<li class="list-group-item">Available in the area of ' . '<span class="badge">' . $goal['address']['distance'] . ' Miles</span></li>';
					}

				}


				if ($goal['contact']['is_public'] == '1') {
					echo '<li class="list-group-item">Contact Name<span class="badge">' . $goal['contact']['name'] . '</span></li>';
					echo '<li class="list-group-item">Email<span class="badge"><a href="mailto:' . $goal['contact']['email'] . '">' . $goal['contact']['email'] . '</a></span></li>';
				} 
				?>


					<div id="contact_box" class="" style="margin-top: 35px; background-color: #3b9b8a; padding: 15px;">
						<h4 class="text-center" style="margin-bottom: 25px; border-bottom: 1px solid;"><?php echo $language['offers_single_contact_owner'] ?></h4>

						<form id="contact_form">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="name"><?php echo $language['offers_single_contact__your_name'] ?></label>
										<input type="text" class="form-control " name="name" id="name" aria-describedby="name" placeholder="<?php echo $language['offers_single_contact__input_your_name'] ?>">
									</div>
								</div>
								<input type="hidden" name="goal_id" value="<?php echo $goal['id']; ?>">
								<div class="col-md-6">
									<div class="form-group">
										<label for="name"><?php echo $language['offers_single_contact__your_email'] ?></label>
										<input type="text" class="form-control " name="email" id="email" aria-describedby="name" placeholder="<?php echo $language['offers_single_contact__input_your_email'] ?>">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="name"><?php echo $language['offers_single_contact__your_message'] ?></label>
										<textarea class="form-control " name="message" id="message" aria-describedby="name" placeholder="<?php echo $language['offers_single_contact__input_message'] ?>"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<button type="button" style="background-color: #288171; cursor:pointer;" class="form-control" onclick="contact_send(this);"><i class="fa fa-envelope" style="padding-right: 10px;"></i><?php echo $language['offers_single_contact__button_submit'] ?> </button>
								</div>
							</div>
						</form>
					</div>
				

			</ul>

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



		</div>

	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="login-prompt" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document" style="    margin-top: 20vh;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?php echo $language['offer_single_page_model_login'] ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo $language['offer_single_page_model_login_please_login_before_like_offer'] ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $language['offer_single_page_model_login_close'] ?></button>
				<button type="button" class="btn btn-primary" onclick="window.location='<?php echo base_url('welcome/login?redirect=welcome_offers'); ?>'"><?php echo $language['offer_single_page_model_login_login_now'] ?></button>
			</div>
		</div>
	</div>
</div>

<script>
	function contact_send($this) {

		$form = $('#contact_form').serializeArray();
		$.ajax({
			url: '<?php echo base_url('welcome/contact_member'); ?>',
			type: 'post',

			data: $form,
			success: function(data) {
				$("body").overhang({
					type: "success",
					message: "your are mesage his been send successfully",
					callback: function (value) {
						window.location='<?php echo base_url('welcome/offers'); ?>';
					}
				});

			}
		})
	}




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

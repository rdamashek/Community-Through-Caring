<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

<style>
	.option-div>label {
		cursor: pointer;
	}

	.option-div .checked-rad {
		display: none;
	}

	.option-div.checked .checked-rad {
		display: block;
	}

	.option-div.checked>label {
		background-color: #328173 !important;
	}

	.choices div {
		background-color: #45b09d;
	}

	.choices__list--dropdown .choices__item--selectable.is-highlighted {
		background-color: #268171 !important;
	}


	div#address_detail input,
	div#address_detail select {
		margin-top: 3px;
		border-bottom: 1px solid;
		width: 72%;
		font-size: 20px;
		height: 35px;
	}

	div#address_detail {
		margin-top: 35px;
	}

	div#address_detail span {
		text-align: left !important;
		width: 70% !important;
		margin: auto;
	}

	select option {
		color: #fff;
		background-color: #44c0aa
	}
</style>
<div class="auth-container " style="max-width: 600px; margin: auto; margin-top: 15vh; color: white; padding: 25px; background-color: #369382; border-radius: 18px;">

	<form method="post" action="<?php echo base_url('admin/update_user'); ?>" <?php echo base_url('admin/edit_user' . $users['id']) ?>>


		<input type="hidden" name="id" value="user">
		<div class="step">


			<div class="spt-container offer_steps">


				<div class="single-step">
					<h3 class="text-center">
					<a style="color: #fff; text-decoration: none;" href="<?php echo base_url('admin/all_users'); ?>"><i class="back-step-btn fa fa-angle-left" style="    float: left;font-size: 25px;width: 35px;height: 35px;border-radius: 50%;border: 2px solid;line-height: 30px;cursor: pointer;display: flex;align-items: center;flex-wrap: nowrap;flex-direction: row;justify-content: center;"></i></a>
						Update User
					</h3>

					<input type="hidden" name="update_id" value="<?php echo $users['id']; ?>">

					<input type="text" class="form-control main-single-inp" name="name" value="<?php echo $users['name']; ?>" placeholder="User Name">
					<input type="text" class="form-control main-single-inp" name="email" value="<?php echo $users['email']; ?>" placeholder="email">

					<input type="text" class="form-control main-single-inp" name="phone" value="<?php echo $users['phone']; ?>" placeholder="Phone Number">
					<!-- <input type="password" class="form-control main-single-inp" name="password" value="" placeholder="Change User Password"> -->




					<div style="text-align: center;margin-top: 30px;">
						<button type="button" onclick="$(this).parents('.single-step').hide().next('.single-step').show();" style="background-color: #fff; color: #288171; cursor:pointer;" class="form-control next-btn-circle"><i class="fa fa-eye"></i> Change Password</button>

					</div>
					<!-- <a href="#" class="next-btn-circle" style="font-size: 38px"
					   onclick="$(this).parents('.single-step').hide().next('.single-step').show();"><i
							class="fa fa-angle-right" style="font-size: 38px"></i></a> -->

					<div style="text-align: center;margin-top: 30px;">
						<button type="submit" style="background-color: #288171; color: white; cursor:pointer;" class="form-control next-btn-circle"><i class="fa fa-check"></i> Update User</button>

					</div>

				</div>
				<div class="single-step" style="display: none">
					<h3 class="text-center">
						<a style="color: #fff; text-decoration: none;" href="<?php base_url('admin/edit_user'); ?>"><i class="back-step-btn fa fa-angle-left" style="    float: left;font-size: 25px;width: 35px;height: 35px;border-radius: 50%;border: 2px solid;line-height: 30px;cursor: pointer;display: flex;align-items: center;flex-wrap: nowrap;flex-direction: row;justify-content: center;"></i></a>
						Update User password
					</h3>
					<input type="password" class="form-control main-single-inp" name="password" value="" placeholder="Change User Password">


					<div style="text-align: center;margin-top: 30px;">
						<button type="submit" style="background-color: #fff; color: #288171; cursor:pointer;" class="form-control next-btn-circle"><i class="fa fa-check"></i> Update User Password</button>

					</div>
				</div>



				


			</div>

		</div>


	</form>

</div>


<script>
	$(document).ready(function() {

		var element = document.getElementById('back-link');


		element.setAttribute('href', document.referrer);

		element.onclick = function() {
			history.back();
			return false;
		}

	});

	function show_options($this) {
		$val = $($this).val();
		console.log($val);
		if ($val == 'asap') {
			$('.form-group.start_date').hide();
			$('.form-group.end_date').hide();
			$('.form-group.days').hide();
		}
		if ($val == 'before') {
			$('.form-group.start_date').hide();
			$('.form-group.end_date').show();
			$('.form-group.days').hide();
		}
		if ($val == 'period') {
			$('.form-group.start_date').show();
			$('.form-group.end_date').show();
			$('.form-group.days').hide();
		}
		if ($val == 'recurring') {
			$('.form-group.start_date').hide();
			$('.form-group.end_date').hide();
			$('.form-group.days').show();
		}
	}

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

		$.ajax({
			url: '<?php echo base_url('member/remove_img/' . $goal['id']); ?>',
			success: function(data) {

			}
		})
	}


	function show_payment_options($this) {
		$val = $($this).val();
		$('#price_option').hide();
		$('#barter_option').hide();
		if ($val == 'price') {
			$('#price_option').show();
		}
		if ($val == 'barter') {
			$('#barter_option').show();
		}
	}

	// $(document).ready(function() {


	// 	$('.back-step-btn').on('click', function(e) {
	// 		$('.single-step').hide();
	// 		$(this).parents('.single-step').prev('.single-step').show();
	// 	})

	// });

	function post_goal() {
		$form = new FormData($('#goal_form')[0])
		$.ajax({
			url: '<?php echo base_url('member/update_user'); ?>',
			type: 'post',
			cache: false,
			contentType: false,
			processData: false,
			data: $form,
			success: function(data) {

				$("body").overhang({
					type: "success",
					message: "User updated successfully",
					callback: function(value) {
						window.location = '<?php echo base_url('admin/all_users'); ?>';
					}
				});

			}
		})
	}


	$('.goal_delivery_type').on('change', function() {

		if ($(this).val() == 'address') {
			$('textarea.address_inp_field').slideUp();
			$('#address_detail').slideDown();
		} else if ($(this).val() == 'virtual') {
			$('#address_detail').slideUp();
			$('textarea.address_inp_field').slideDown();
		}
	})
</script>

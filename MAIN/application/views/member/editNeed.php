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
<div class="auth-container " style="max-width: 600px; margin: auto; margin-top: 200px; color: white; padding: 25px; background-color: #369382; border-radius: 18px;">

	<form id="goal_form" method="post" enctype="multipart/form-data">



		<div class="step">

			<div class="spt-container need_steps">

				<input type="hidden" name="goal[type]" value="need">
				<div class="single-step">
					<h3 class="text-center">
						<?php echo get_lang('lang_update_my_need'); ?>
					</h3>

					<input type="hidden" name="update_id" value="<?php echo $goal['id']; ?>">


					<input type="text" class="form-control main-single-inp" name="goal[name]" value="<?php echo $goal['name']; ?>" placeholder="<?php echo get_lang('lang_i_need_a_bike'); ?>">
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo get_lang('lang_please_enter_the_title_of_the_need'); ?></span>



					<textarea class="form-control main-single-inp" name="goal[description]" placeholder="<?php echo get_lang('lang_description_about_something_i_need'); ?>" style="height: 80px;font-size: 17px; text-align: left"><?php echo $goal['description']; ?></textarea>
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo get_lang('lang_please_enter_the_need_description'); ?></span>


					<select onchange="show_payment_options(this);" class="form-control main-single-inp" name="goal[cost]">
						<option disabled selected><?php echo get_lang('lang_select_an_option'); ?></option>
						<option value="price" <?php echo $goal['cost'] == 'price' ? 'selected' : ''; ?> style="color: #fff; background-color: #44c0aa"><?php echo get_lang('lang_price'); ?></option>
						<option value="barter" <?php echo $goal['cost'] == 'barter' ? 'selected' : ''; ?> style="color: #fff; background-color: #44c0aa"><?php echo get_lang('lang_barter'); ?></option>
						<option value="free" <?php echo $goal['cost'] == 'free' ? 'selected' : ''; ?> style="color: #fff; background-color: #44c0aa"><?php echo get_lang('lang_free'); ?></option>
					</select>
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo get_lang('lang_please_select_the_medium_of_exchange'); ?></span>

					<div id="barter_option" style="display: none; display: <?php echo $goal['cost'] == 'barter' ? 'block' : 'none'; ?>">
						<input type="text" id="offer_price" class="form-control main-single-inp" name="goal[barter_details]" value="<?php echo $goal['barter_details']; ?>" placeholder="">
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo get_lang('lang_enter_the_barter_details'); ?></span>
					</div>
					<div id="price_option" style="display: none; display: <?php echo $goal['cost'] == 'price' ? 'block' : 'none'; ?>">
						<input type="text" id="offer_price" class="form-control main-single-inp" name="goal[price]" value="<?php echo $goal['price']; ?>" placeholder="$500">
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo get_lang('lang_offer_price'); ?></span>
					</div>




					<select onchange="show_options(this);" class="form-control main-single-inp" name="period[type]">
						<option disabled selected><?php echo get_lang('lang_select_urgency'); ?></option>
						<option value="asap" <?php echo $period['type'] == 'asap' ? 'selected' : ''; ?> style="color: #fff; background-color: #44c0aa"><?php echo get_lang('lang_asap'); ?></option>
						<option value="before" <?php echo $period['type'] == 'before' ? 'selected' : ''; ?> style="color: #fff; background-color: #44c0aa"><?php echo get_lang('lang_before'); ?></option>
						<option value="recurring" <?php echo $period['type'] == 'recurring' ? 'selected' : ''; ?> style="color: #fff; background-color: #44c0aa"><?php echo get_lang('lang_recurring'); ?></option>
						<option value="after" <?php echo $period['type'] == 'after' ? 'selected' : ''; ?> style="color: #fff; background-color: #44c0aa"><?php echo get_lang('lang_after'); ?></option>
					</select>
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo get_lang('lang_how_soon_do_you_need_it'); ?></span>

					<div class="form-group start_date" style="display: none;  display: <?php echo $period['type'] == 'after' ? 'block' : 'none'; ?>">
						<input type="date" class="form-control main-single-inp" autocomplete="false" name="period[start_date]" value="<?php echo $period['start_date']; ?>" id="userName">
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo get_lang('lang_please_select_the_start_date'); ?></span>
					</div>
					<div class="form-group days" style="display: none; display: <?php echo $period['type'] == 'recurring' ? 'block' : 'none'; ?>">
						<select id="choices-multiple-remove-button" class="main-single-inp" name="period[day][]" placeholder="<?php echo get_lang('lang_select_days'); ?>" multiple>

							<?php
							$days = @json_decode($period['day']);
							if(!is_array($days)){
								$days = array();
							}
							?>

							<option <?php echo @in_array('Sunday', $days) ? 'selected' : ''; ?>><?php echo get_lang('lang_sunday'); ?></option>
							<option <?php echo @in_array('Monday', $days) ? 'selected' : ''; ?>><?php echo get_lang('lang_monday'); ?></option>
							<option <?php echo @in_array('Tuesday', $days) ? 'selected' : ''; ?>><?php echo get_lang('lang_tuesday'); ?></option>
							<option <?php echo @in_array('Wednesday', $days) ? 'selected' : ''; ?>><?php echo get_lang('lang_wednesday'); ?></option>
							<option <?php echo @in_array('Thursday', $days) ? 'selected' : ''; ?>><?php echo get_lang('lang_thursday'); ?></option>
							<option <?php echo @in_array('Friday', $days) ? 'selected' : ''; ?>><?php echo get_lang('lang_friday'); ?></option>
							<option <?php echo @in_array('Saturday', $days) ? 'selected' : ''; ?>><?php echo get_lang('lang_saturday'); ?></option>
						</select>
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo get_lang('lang_please_select_recurring_days_when_you_need_it'); ?></span>

					</div>


					<div class="form-group end_date" style="display: none;  display: <?php echo $period['type'] == 'before' ? 'block' : 'none'; ?>">
						<input type="date" class="form-control main-single-inp" autocomplete="false" name="period[end_date]" value="<?php echo $period['end_date']; ?>" id="userName">
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo get_lang('lang_please_select_the_end_date'); ?></span>
					</div>


					<a href="#" class="next-btn-circle" style="font-size: 38px" onclick="$(this).parents('.single-step').hide().next('.single-step').show();"><i class="fa fa-angle-right" style="font-size: 38px"></i></a>
				</div>

				<div class="single-step" style="display: none">
					<h3 class="text-center">
						<i class="back-step-btn fa fa-angle-left" style="float:left; font-size: 25px;width: 30px;height: 30px;border-radius: 50%;border: 1px solid;line-height: 30px;cursor: pointer;"></i>
						<?php echo get_lang('lang_want_to_add_an_image'); ?>
					</h3>


					<label style="height: 165px;border: 25px; display: block; width: 100%;text-align: center;font-size: 25px;padding: 20px 0;background-color: #288171;border-radius: 25px;opacity: 0.8;margin: 30px 0;border: 2px dashed;">
						<?php echo get_lang('lang_click_or_drag_to_upload'); ?><br>
						<i class="fa fa-file-upload" style="font-size: 50px;padding-top: 20px;"></i>
						<input id="file_input" onchange="readURL(this);" type="file" name="goal_image" style="display: none;">
					</label>
					<div id="image_preview" class="text-center" style="display: <?php echo strlen($goal['photo']) > 0 ? 'block' : 'none'; ?>">
						<h5><?php echo get_lang('lang_preview'); ?></h5>

						<i class="fa fa-close" onclick="reset_img();" style="border: 2px solid white;border-radius: 50%;width: 20px;height: 20px;position: relative;bottom: -3px; cursor: pointer"></i>
						<img id="blah" src="<?php echo strlen($goal['photo']) > 0 ? base_url('assets/images/uploads/' . $goal['photo']) : ''; ?>" alt="your image" style=" max-width: 100%; height: 250px; margin: auto; display: block; border-radius: 25px; border: 3px solid #1f6458; opacity: 0.8;" />
					</div>
					<a href="#" class="next-btn-circle" style="font-size: 38px" onclick="$(this).parents('.single-step').hide().next('.single-step').show();"><i class="fa fa-angle-right" style="font-size: 38px"></i></a>
				</div>




				<div class="single-step" style="display: none">
					<h3 class="text-center">
						<i class="back-step-btn fa fa-angle-left" style="float:left; font-size: 25px;width: 30px;height: 30px;border-radius: 50%;border: 1px solid;line-height: 30px;cursor: pointer;"></i>
						<?php echo get_lang('lang_please_provide_the_address_details'); ?>
					</h3>


					<select class="form-control main-single-inp goal_delivery_type" id="goal_delivery_type" name="goal[delivery_type]" value="<?php echo $goal['delivery_type']; ?>">
						<option disabled selected><?php echo get_lang('lang_select_address_type'); ?></option>
						<option style="color: #fff; background-color: #44c0aa" <?php echo $goal['delivery_type'] == 'virtual' ? 'selected' : ''; ?> value="virtual"><?php echo get_lang('lang_virtual'); ?></option>
						<option style="color: #fff; background-color: #44c0aa" <?php echo $goal['delivery_type'] == 'address' ? 'selected' : ''; ?> value="address"><?php echo get_lang('lang_address'); ?></option>
					</select>
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo get_lang('lang_please_select_the_address_type'); ?></span>

					<textarea id="address_inp_field" class="form-control main-single-inp address_inp_field" style="display:none;margin-top: 10px;height: 90px; display: <?php echo $goal['delivery_type'] == 'virtual' ? 'block' : 'none'; ?>" placeholder="<?php echo get_lang('lang_please_enter_the_need_delivery_location'); ?>" autocomplete="false" name="goal[deliery_location]"><?php echo $goal['deliery_location']; ?></textarea>


					<div id="address_detail" style="display:none;display: <?php echo $goal['delivery_type'] == 'address' ? 'block' : 'none'; ?>">

						<input type="text" class="form-control main-single-inp" name="address[address]" value="<?php echo $address['address']; ?>" placeholder="<?php echo get_lang('lang_address'); ?>">
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo get_lang('lang_street_address'); ?></span>

						<input type="text" class="form-control main-single-inp" name="address[city]" value="<?php echo $address['city']; ?>" placeholder="<?php echo get_lang('lang_city'); ?>">
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo get_lang('lang_city'); ?></span>



						<input type="text" class="form-control main-single-inp" name="address[state_province]" value="<?php echo $address['state_province']; ?>" placeholder="<?php echo get_lang('lang_state_province'); ?>">
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo get_lang('lang_state_province'); ?></span>




						<input type="text" class="form-control main-single-inp" name="address[zip]" value="<?php echo $address['zip']; ?>" placeholder="<?php echo get_lang('lang_zip_or_postal_code'); ?>">
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo get_lang('lang_zip_or_postal_code'); ?></span>

						<input type="text" class="form-control main-single-inp" name="address[county]" value="<?php echo $address['county']; ?>" placeholder="<?php echo get_lang('lang_County'); ?>">
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo get_lang('lang_County'); ?></span>

						<select class="form-control main-single-inp" name="address[region]" value="<?php echo $address['region']; ?>">
							<option><?php echo get_lang('lang_locality'); ?></option>
							<option selected><?php echo get_lang('lang_County'); ?></option>
							<option><?php echo get_lang('lang_nation'); ?></option>
							<option><?php echo get_lang('lang_continent'); ?></option>
							<option><?php echo get_lang('lang_world'); ?></option>
						</select>
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo get_lang('lang_region'); ?></span>

						<input type="text" class="form-control main-single-inp" name="address[country]" value="<?php echo $address['country']; ?>" placeholder="<?php echo get_lang('lang_country'); ?>">
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo get_lang('lang_country'); ?></span>



						<input type="text" class="form-control main-single-inp" name="address[distance]" value="<?php echo $address['distance']; ?>" placeholder="<?php echo get_lang('lang_distance'); ?>" value="0">
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo get_lang('lang_how_far_away_from_the_address_will_the_need_be_shared'); ?> </span>

					</div>



					<a href="#" class="next-btn-circle" style="font-size: 38px" onclick="$(this).parents('.single-step').hide().next('.single-step').show();"><i class="fa fa-angle-right" style="font-size: 38px"></i></a>
				</div>

				<div class="single-step" style="display: none">
					<h3 class="text-center">
						<i class="back-step-btn fa fa-angle-left" style="float:left; font-size: 25px;width: 30px;height: 30px;border-radius: 50%;border: 1px solid;line-height: 30px;cursor: pointer;"></i>
						<?php echo get_lang('lang_please_provide_the_contact_details'); ?>
					</h3>


					<div style="text-align: center;margin-top: 25px;">
						<label><input id="" name="contact[is_public]" value="1" type="checkbox" <?php echo ($contact['is_public'] == '1') ? 'checked="checked"' : ''; ?> style="height: 20px;width: 19px;position: relative;top: 3px;margin-right: 5px;"> <?php echo get_lang('lang_display_my_contact_details_on_my_listing'); ?></label>
					</div>


					<input type="text" class="form-control main-single-inp" name="contact[name]" value="<?php echo $contact['name']; ?>" placeholder="<?php echo get_lang('lang_john_doe'); ?>" style="margin-top: 25px;">
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo get_lang('lang_display_name'); ?></span>

					<input type="text" class="form-control main-single-inp" name="contact[email]" value="<?php echo $contact['email']; ?>" placeholder="<?php echo get_lang('lang_someone_example_com'); ?>">
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo get_lang('lang_the_primary_contact_email'); ?></span>




					<div style="text-align: center;margin-top: 25px;">
						<input id="agree_check"  value="1" type="checkbox" style="height: 20px;width: 19px;position: relative;top: 3px;margin-right: 5px;"> <?php echo get_lang('lang_i_agree_to_the'); ?> <a href="#" style="text-decoration: none;color: #b8efe5;"> <?php echo get_lang('lang_terms_and_conditions'); ?></a>
					</div>

					<div style="text-align: center;margin-top: 30px;">

						<a href="#" class="next-btn-circle" style="text-decoration: none;font-size: 38px;width: auto;border-radius: 25px;display: inline-block;padding: 0px 30px;margin: auto;display: inline-block;font-size: 25px;" onclick="post_goal();"><i class="fa fa-check" style="font-size: 25px;"></i> <?php echo get_lang('lang_post_my_need'); ?></a>
					</div>
				</div>


			</div>



		</div>


	</form>
</div>


<script>
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
		if ($val == 'after') {
			$('.form-group.start_date').show();
			$('.form-group.end_date').hide();
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

	$(document).ready(function() {

		var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
			removeItemButton: true,
			maxItemCount: 7,
			searchResultLimit: 7,
			renderChoiceLimit: 7
		});


		$('.back-step-btn').on('click', function(e) {
			$('.single-step').hide();
			$(this).parents('.single-step').prev('.single-step').show();
		})


	});



	function post_goal() {
		$form = new FormData($('#goal_form')[0])

		if($("input[name='goal[name]']").val()==''){
			$("body").overhang({
				type: "error",
				message: "<?php echo get_lang('lang_name_title_cannot_be_blank') ?>",
				callback: function () {

				}
			});
			$('body').find('.single-step').hide('slow');
			$('body').find('#goal_form').find("input[name='goal[name]']").parents('.single-step').slideDown('slow');
			$('body').find('#goal_form').find("input[name='goal[name]']").next('span').css('color', '#bf0000');
			return false;
		}
		if($('#agree_check').is(':checked')){


		$.ajax({
			url: '<?php echo base_url('member/update_need_save'); ?>',
			type: 'post',
			cache: false,
			contentType: false,
			processData: false,
			data: $form,
			success: function(data) {
				$("body").overhang({
					type: "success",
					message: "<?php echo get_lang('lang_need_updated_successfully'); ?>",
					callback: function(value) {
						window.location = '<?php echo base_url('member/my_needs'); ?>';
					}
				});

			}
		})
	}else{
			$("body").overhang({
				type: "error",
				message: "<?php echo get_lang('lang_you_must_agree_to_the_terms_and_conditions') ?>",
			});
		}
	}
	$('body').on('change keyup', 'input', function (){
		$(this).next('span').css('color', 'white');
	})



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

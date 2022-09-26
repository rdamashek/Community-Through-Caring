<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

<style>
	.option-div > label {
		cursor: pointer;
	}

	.option-div .checked-rad {
		display: none;
	}

	.option-div.checked .checked-rad {
		display: block;
	}

	.option-div.checked > label {
		background-color: #328173 !important;
	}

	.choices div {
		background-color: #45b09d;
	}

	.choices__list--dropdown .choices__item--selectable.is-highlighted {
		background-color: #268171 !important;
	}

	div#address_detail input, div#address_detail select {
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
	select option{
		color: #fff; background-color: #44c0aa
	}
</style>
<div class="auth-container "
	 style="max-width: 600px; margin: auto; margin-top: 200px; color: white; padding: 25px; background-color: #369382; border-radius: 18px;">

	<form id="goal_form"  method="post" enctype="multipart/form-data">



		<div class="step" >

			<div class="spt-container need_steps" >

<input type="hidden" name="goal[type]" value="need">
				<div class="single-step">
					<h3 class="text-center">
					<?php echo $language['create_need_page_heading']; ?>
					</h3>


					<input type="text" class="form-control main-single-inp" name="goal[name]"
						   placeholder="<?php echo $language['create_need_page_goal_name_placeholder']; ?>"
						   >
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_need_page_span_enter_title_need']; ?></span>



					<textarea class="form-control main-single-inp" name="goal[description]" placeholder="<?php echo $language['create_need_page_textarea_placeholder']; ?>" style="height: 80px;font-size: 17px; text-align: left"></textarea>
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_need_page_span_enter_need_description']; ?></span>


					<input type="hidden" name="goal[cost]" value="price">
					<input type="text" class="form-control main-single-inp" name="goal[price]" placeholder="$700"
						   >
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_need_page_span_enter_budget_need']; ?></span>

					<select onchange="show_options(this);" class="form-control main-single-inp" name="period[type]"
							>
						<option disabled selected><?php echo $language['create_need_page_select_urgency']; ?></option>
						<option value="asap" style="color: #fff; background-color: #44c0aa"><?php echo $language['create_need_page_select_urgency_asap']; ?></option>
						<option value="before" style="color: #fff; background-color: #44c0aa"><?php echo $language['create_need_page_select_urgency_before']; ?></option>
						<option value="recurring" style="color: #fff; background-color: #44c0aa"><?php echo $language['create_need_page_select_urgency_recurring']; ?></option>
						<option value="period" style="color: #fff; background-color: #44c0aa"><?php echo $language['create_need_page_select_urgency_after']; ?></option>
					</select>
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_need_page_span_soon_need']; ?></span>

					<div class="form-group start_date" style="display: none">
						<input type="date" class="form-control main-single-inp" autocomplete="false"
							   name="period[start_date]" id="userName">
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_need_page_select_start_date']; ?></span>
					</div>
					<div class="form-group days" style="display: none">
						<select id="choices-multiple-remove-button" class="main-single-inp" name="period[day][]"
								placeholder="<?php echo $language['create_need_page_select_day']; ?>" multiple>
							<option><?php echo $language['create_need_page_select_day_sunday']; ?></option>
							<option><?php echo $language['create_need_page_select_day_monday']; ?></option>
							<option><?php echo $language['create_need_page_select_day_tuesday']; ?></option>
							<option><?php echo $language['create_need_page_select_day_wednesday']; ?></option>
							<option><?php echo $language['create_need_page_select_day_thursday']; ?></option>
							<option><?php echo $language['create_need_page_select_day_friday']; ?></option>
							<option><?php echo $language['create_need_page_select_day_saturday']; ?></option>
						</select>
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_need_page_span_recurring_days_need']; ?></span>

					</div>


					<div class="form-group end_date" style="display: none">
						<input type="date" class="form-control main-single-inp" autocomplete="false"
							   name="period[end_date]" id="userName">
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_need_page_select_end_date']; ?></span>
					</div>


					<a href="#" class="next-btn-circle" style="font-size: 38px"
					   onclick="$(this).parents('.single-step').hide().next('.single-step').show();"><i
							class="fa fa-angle-right" style="font-size: 38px"></i></a>
				</div>

				<div class="single-step" style="display: none">
					<h3 class="text-center">
						<i class="back-step-btn fa fa-angle-left" style="float:left; font-size: 25px;width: 30px;height: 30px;border-radius: 50%;border: 1px solid;line-height: 30px;cursor: pointer;"></i>

						<?php echo $language['create_need_page_want_add_image']; ?>
					</h3>


					<label style="height: 165px;border: 25px; display: block; width: 100%;text-align: center;font-size: 25px;padding: 20px 0;background-color: #288171;border-radius: 25px;opacity: 0.8;margin: 30px 0;border: 2px dashed;">
					<?php echo $language['create_need_page_add_click_drag_upload']; ?><br>
						<i class="fa fa-file-upload" style="font-size: 50px;padding-top: 20px;"></i>
						<input id="file_input" onchange="readURL(this);" type="file" name="goal_image" style="display: none;">
					</label>
					<div id="image_preview" class="text-center" style="display: none">
						<h5><?php echo $language['create_need_page_preview']; ?></h5>

						<i class="fa fa-close" onclick="reset_img();" style="border: 2px solid white;border-radius: 50%;width: 20px;height: 20px;position: relative;bottom: -3px; cursor: pointer"></i>
					<img id="blah" src="http://placehold.it/180" alt="your image" style=" max-width: 100%; height: 250px; margin: auto; display: block; border-radius: 25px; border: 3px solid #1f6458; opacity: 0.8;"/>
					</div>
					<a href="#" class="next-btn-circle" style="font-size: 38px"
					   onclick="$(this).parents('.single-step').hide().next('.single-step').show();"><i
								class="fa fa-angle-right" style="font-size: 38px"></i></a>
				</div>




				<div class="single-step" style="display: none">
					<h3 class="text-center">
						<i class="back-step-btn fa fa-angle-left" style="float:left; font-size: 25px;width: 30px;height: 30px;border-radius: 50%;border: 1px solid;line-height: 30px;cursor: pointer;"></i>

						<?php echo $language['create_need_page_fill_address_detail']; ?>
					</h3>


					<select class="form-control main-single-inp goal_delivery_type" id="goal_delivery_type" name="goal[delivery_type]" >
						<option disabled selected><?php echo $language['create_need_page_select_address_type']; ?></option>
						<option style="color: #fff; background-color: #44c0aa" value="virtual"><?php echo $language['create_need_page_select_address_type_virtual']; ?></option>
						<option style="color: #fff; background-color: #44c0aa" value="address"><?php echo $language['create_need_page_select_address_type_address']; ?></option>
					</select>
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_need_page_please_select_address_type']; ?></span>

					<textarea id="address_inp_field" class="form-control main-single-inp address_inp_field"
							  style="display:none;margin-top: 10px;height: 90px;"
							  placeholder="<?php echo $language['create_need_page_please_enter_the_goal_delivery_location']; ?>" autocomplete="false"
							  name="goal[deliery_location]"></textarea>


					<div id="address_detail" style="display:none;">

						<input type="text" class="form-control main-single-inp" name="address[address]" placeholder="<?php echo $language['create_nees_page_placeholder_address']; ?>"
							   >
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_need_page_street_address']; ?></span>

						<input type="text" class="form-control main-single-inp" name="address[city]" placeholder="<?php echo $language['create_need_page_placeholder_city']; ?>"
							   >
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_need_page_span_city']; ?></span>

						<input type="text" class="form-control main-single-inp" name="address[zip]" placeholder="<?php echo $language['create_need_page_placeholder_zip']; ?>"
							   >
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_need_page_span_zip_code']; ?></span>

						<input type="text" class="form-control main-single-inp" name="address[county]" placeholder="<?php echo $language['create_need_page_placeholder_county']; ?>"
							   >
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_need_page_span_county']; ?></span>

						<input type="text" class="form-control main-single-inp" name="address[country]" placeholder="<?php echo $language['create_need_page_placeholder_county']; ?>"
							   >
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_need_page_span_county']; ?></span>

						<select class="form-control main-single-inp" name="address[region]" >
						<option><?php echo $language['create_need_page_select_address_region_locality']; ?></option>
							<option selected><?php echo $language['create_need_page_select_address_region_county']; ?></option>
							<option><?php echo $language['create_need_page_select_address_region_nation']; ?></option>
							<option><?php echo $language['create_need_page_select_address_region_continent']; ?></option>
							<option><?php echo $language['create_need_page_select_address_region_world']; ?></option>
						</select>
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_need_page_region']; ?></span>

						<input type="text" class="form-control main-single-inp" name="address[distance]" placeholder="<?php echo $language['create_need_page_input_distance']; ?>" value="0"
							   >
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_need_page_span_how_miles_message']; ?> </span>

					</div>



					<a href="#" class="next-btn-circle" style="font-size: 38px"
					   onclick="$(this).parents('.single-step').hide().next('.single-step').show();"><i
								class="fa fa-angle-right" style="font-size: 38px"></i></a>
				</div>

				<div class="single-step" style="display: none">
					<h3 class="text-center">
						<i class="back-step-btn fa fa-angle-left" style="float:left; font-size: 25px;width: 30px;height: 30px;border-radius: 50%;border: 1px solid;line-height: 30px;cursor: pointer;"></i>
						<?php echo $language['create_need_page_fill_contact_detail']; ?>
					</h3>



					<div style="text-align: center;margin-top: 25px;">
						<label>
						<input id="agree_check" name="contact[is_public]" value="1" type="checkbox" style="height: 20px;width: 19px;position: relative;top: 3px;margin-right: 5px;"> <?php echo $language['create_need_page_display_contact_detail']; ?>
						</label>
					</div>


					<input type="text" class="form-control main-single-inp" name="contact[name]" placeholder="<?php echo $language['create_need_page_name_palceholder']; ?>"
						   style="margin-top: 25px;">
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_need_page_display_name']; ?></span>

					<input type="text" class="form-control main-single-inp" name="contact[email]" placeholder="<?php echo $language['create_need_page_email_palceholder']; ?>"
						   >
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_need_page_primary_contact_email']; ?></span>




					<div style="text-align: center;margin-top: 25px;">
						<input id="agree_check" type="checkbox" style="height: 20px;width: 19px;position: relative;top: 3px;margin-right: 5px;"> <?php echo $language['create_need_page_agree']; ?> <a href="#" style="text-decoration: none;color: #b8efe5;"> <?php echo $language['create_need_page_trem_condition']; ?></a>
					</div>

					<div style="text-align: center;margin-top: 30px;">

						<a href="#" class="next-btn-circle"
						   style="text-decoration: none;font-size: 38px;width: auto;border-radius: 25px;display: inline-block;padding: 0px 30px;margin: auto;display: inline-block;font-size: 25px;"
						   onclick="post_goal();"><i
									class="fa fa-check" style="font-size: 25px;"></i> <?php echo $language['create_need_page_post_my_need']; ?></a>
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

			reader.onload = function (e) {
				$('#blah')
					.attr('src', e.target.result);
				$('#image_preview').show();
			};

			reader.readAsDataURL(input.files[0]);
		}
	}

	function reset_img(){
		$('#image_preview').hide();
		$('#file_input').val(null);
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

	$(document).ready(function () {

		var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
			removeItemButton: true,
			maxItemCount: 7,
			searchResultLimit: 7,
			renderChoiceLimit: 7
		});

		$('.back-step-btn').on('click', function (e){
			$('.single-step').hide();
			$(this).parents('.single-step').prev('.single-step').show();
		})
	});



	function post_goal(){
		$form = new FormData($('#goal_form')[0])
		$.ajax({
			url:'<?php echo base_url('member/save_new_need'); ?>',
			type:'post',
			cache:false,
			contentType: false,
			processData: false,
			data:$form,
			success: function (data){
				$("body").overhang({
					type: "success",
					message: "<?php echo $language['create_need_page_offer_posted_successfully']; ?>",
					callback: function (value) {
						window.location='<?php echo base_url('member/my_needs'); ?>';
					}
				});
			}
		})
	}



	$('.goal_delivery_type').on('change', function () {

		if ($(this).val() == 'address') {
			$('textarea.address_inp_field').html('').slideUp();
			$('#address_detail').slideDown();
		} else if ($(this).val() == 'virtual') {
			$('#address_detail').slideUp();
			$('textarea.address_inp_field').html('').slideDown();
		}
	})
</script>

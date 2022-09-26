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

	<form id="goal_form">


		<input type="hidden" name="goal[type]" value="offer">
		<div class="step" >


			<div class="spt-container offer_steps" >


				<div class="single-step">
					<h3 class="text-center">
					<?php echo $language['edit_offer_page_updated_your_offer']; ?>
					</h3>

					<input type="hidden" name="update_id" value="<?php echo $goal['id']; ?>">

					<input type="text" class="form-control main-single-inp" name="goal[name]" value="<?php echo $goal['name']; ?>"
						   placeholder="<?php echo $language['edit_offer_page_something_i_want_to_offer']; ?>"
						   >
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['edit_offer_page_what_would_you_like_offer']; ?></span>


					<textarea class="form-control main-single-inp" name="goal[description]" placeholder="<?php echo $language['edit_offer_page_description_about_something_I_want_to_offer']; ?>" style="height: 80px;font-size: 17px; text-align: left"><?php echo $goal['description']; ?></textarea>
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['edit_offer_page_what_would_you_like_offer']; ?></span>


					<select onchange="show_payment_options(this);" class="form-control main-single-inp"
							name="goal[cost]" >
						<option disabled selected><?php echo $language['edit_offer_page_select_option']; ?></option>
						<option value="price" <?php echo $goal['cost']=='price'?'selected':''; ?> style="color: #fff; background-color: #44c0aa"><?php echo $language['edit_offer_page_select_option_price']; ?></option>
						<option value="barter" <?php echo $goal['cost']=='barter'?'selected':''; ?> style="color: #fff; background-color: #44c0aa"><?php echo $language['edit_offer_page_select_option_barter']; ?></option>
						<option value="free" <?php echo $goal['cost']=='free'?'selected':''; ?> style="color: #fff; background-color: #44c0aa"><?php echo $language['edit_offer_page_select_option_free']; ?></option>
					</select>
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['edit_offer_page_select_medium_of_exchange']; ?></span>

					<div id="barter_option" style="display: none; display: <?php echo $goal['cost']=='barter'?'block':'none'; ?>">
						<input type="text" id="offer_price" class="form-control main-single-inp" name="goal[barter_details]" value="<?php echo $goal['barter_details']; ?>"
							   placeholder=""
						>
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['edit_offer_page_enter_barter_detail']; ?></span>
					</div>
					<div id="price_option" style="display: none; display: <?php echo $goal['cost']=='price'?'block':'none'; ?>">
						<input type="text" id="offer_price" class="form-control main-single-inp" name="goal[price]" value="<?php echo $goal['price']; ?>"
							   placeholder="$500"
						>
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['edit_offer_page_offer_price']; ?></span>
					</div>


					<a href="#" class="next-btn-circle" style="font-size: 38px"
					   onclick="$(this).parents('.single-step').hide().next('.single-step').show();"><i
							class="fa fa-angle-right" style="font-size: 38px"></i></a>
				</div>


				<div class="single-step" style="display: none">
					<h3 class="text-center">
						<i class="back-step-btn fa fa-angle-left" style="float:left; font-size: 25px;width: 30px;height: 30px;border-radius: 50%;border: 1px solid;line-height: 30px;cursor: pointer;"></i>
						<?php echo $language['edit_offer_page_want_to_add_image']; ?>
					</h3>


					<label style="height: 165px;border: 25px; display: block; width: 100%;text-align: center;font-size: 25px;padding: 20px 0;background-color: #288171;border-radius: 25px;opacity: 0.8;margin: 30px 0;border: 2px dashed;">
					<?php echo $language['edit_offer_page_click_or_drag_to_uploade']; ?><br>
						<i class="fa fa-file-upload" style="font-size: 50px;padding-top: 20px;"></i>
						<input id="file_input" onchange="readURL(this);" type="file" name="goal_image" style="display: none;">
					</label>
					<div id="image_preview" class="text-center" style="display: <?php echo strlen($goal['photo'])>0?'block':'none'; ?>">
						<h5><?php echo $language['edit_offer_page_preview']; ?></h5>

						<i class="fa fa-close" onclick="reset_img();" style="border: 2px solid white;border-radius: 50%;width: 20px;height: 20px;position: relative;bottom: -3px; cursor: pointer"></i>
						<img id="blah" src="<?php echo strlen($goal['photo'])>0?base_url('assets/images/uploads/'.$goal['photo']):''; ?>" alt="your image" style=" max-width: 100%; height: 250px; margin: auto; display: block; border-radius: 25px; border: 3px solid #1f6458; opacity: 0.8;"/>
					</div>
					<a href="#" class="next-btn-circle" style="font-size: 38px"
					   onclick="$(this).parents('.single-step').hide().next('.single-step').show();"><i
							class="fa fa-angle-right" style="font-size: 38px"></i></a>
				</div>



				<div class="single-step" style="display: none">
					<h3 class="text-center">
						<i class="back-step-btn fa fa-angle-left" style="float:left; font-size: 25px;width: 30px;height: 30px;border-radius: 50%;border: 1px solid;line-height: 30px;cursor: pointer;"></i>
						<?php echo $language['edit_offer_page_fill_the_address_detail']; ?>
					</h3>


					<select class="form-control main-single-inp goal_delivery_type" id="goal_delivery_type" name="goal[delivery_type]" value="<?php echo $goal['delivery_type']; ?>" >
						<option disabled selected><?php echo $language['edit_offer_page_select_address_type']; ?></option>
						<option style="color: #fff; background-color: #44c0aa" value="virtual" <?php echo $goal['delivery_type']=='virtual'?'selected':''; ?>><?php echo $language['edit_offer_page_select_address_type_virtual']; ?></option>
						<option style="color: #fff; background-color: #44c0aa" value="address" <?php echo $goal['delivery_type']=='address'?'selected':''; ?>><?php echo $language['edit_offer_page_select_address_type_address']; ?></option>
					</select>
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['edit_offer_page_select_the_address_type']; ?></span>

					<textarea id="address_inp_field" class="form-control main-single-inp address_inp_field"
							  style="display:none;margin-top: 10px;height: 90px;  display: <?php echo $goal['delivery_type']=='virtual'?'block':'none'; ?>"
							  placeholder="<?php echo $language['edit_offer_page_enter_goal_delivery_location']; ?>" autocomplete="false"
							  name="goal[deliery_location]"><?php echo $goal['deliery_location']; ?></textarea>


					<div id="address_detail" style="display:none; display: <?php echo $goal['delivery_type']=='address'?'block':'none'; ?>">

						<input type="text" class="form-control main-single-inp" name="address[address]" value="<?php echo $address['address']; ?>" placeholder="<?php echo $language['edit_offer_page_address']; ?>"
							   >
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['edit_offer_page_street_address']; ?></span>

						<input type="text" class="form-control main-single-inp" name="address[city]" value="<?php echo $address['city']; ?>" placeholder="<?php echo $language['edit_offer_page_placeholder_city']; ?>"
							   >
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['edit_offer_page_city']; ?></span>

						<input type="text" class="form-control main-single-inp" name="address[zip]" value="<?php echo $address['zip']; ?>" placeholder="<?php echo $language['edit_offer_page_placeholder_zip']; ?>"
							   >
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['edit_offer_page_zip_code']; ?></span>

						<input type="text" class="form-control main-single-inp" name="address[county]" value="<?php echo $address['county']; ?>" placeholder="<?php echo $language['edit_offer_page_placeholder_county']; ?>"
							   >
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['edit_offer_page_county']; ?></span>

						<input type="text" class="form-control main-single-inp" name="address[country]" value="<?php echo $address['country']; ?>" placeholder="<?php echo $language['edit_offer_page_placeholder_country']; ?>"
							   >
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['edit_offer_page_country']; ?></span>

						<select class="form-control main-single-inp" name="address[region]" value="<?php echo $address['region']; ?>" >
							<option><?php echo $language['edit_offer_page_select_region_locality']; ?></option>
							<option selected><?php echo $language['edit_offer_page_select_region_county']; ?></option>
							<option><?php echo $language['edit_offer_page_select_region_nation']; ?></option>
							<option><?php echo $language['edit_offer_page_select_region_continent']; ?></option>
							<option><?php echo $language['edit_offer_page_select_region_world']; ?></option>
						</select>
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['edit_offer_page_region']; ?></span>

						<input type="text" class="form-control main-single-inp" name="address[distance]" value="<?php echo $address['distance']; ?>" placeholder="<?php echo $language['edit_offer_page_distance']; ?>" value="0"
							   >
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['edit_offer_page_how_for_away_from_address_goal_sheard_miles']; ?> </span>

					</div>



					<a href="#" class="next-btn-circle" style="font-size: 38px"
					   onclick="$(this).parents('.single-step').hide().next('.single-step').show();"><i
							class="fa fa-angle-right" style="font-size: 38px"></i></a>
				</div>

				<div class="single-step" style="display: none">
					<h3 class="text-center">
						<i class="back-step-btn fa fa-angle-left" style="float:left; font-size: 25px;width: 30px;height: 30px;border-radius: 50%;border: 1px solid;line-height: 30px;cursor: pointer;"></i>
						<?php echo $language['edit_offer_page_fill_contact_detail']; ?>
					</h3>


					<div style="text-align: center;margin-top: 25px;">
						<label>
							<input id="agree_check" name="contact[is_public]" value="<?php echo $contact['is_public']; ?>" type="checkbox" style="height: 20px;width: 19px;position: relative;top: 3px;margin-right: 5px;"> <?php echo $language['edit_offer_page_display_my_contact_detail_on_listing']; ?>
						</label>
					</div>


					<input type="text" class="form-control main-single-inp" name="contact[name]" value="<?php echo $contact['name']; ?>" placeholder="<?php echo $language['edit_offer_page_placeholder_name']; ?>"
						   style="margin-top: 25px;">
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['edit_offer_page_display_name']; ?></span>

					<input type="text" class="form-control main-single-inp" name="contact[email]" value="<?php echo $contact['email']; ?>" placeholder="<?php echo $language['edit_offer_page_placeholder_email']; ?>"
						   >
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['edit_offer_page_primary_contact_email']; ?></span>



					<div style="text-align: center;margin-top: 25px;">
						<input id="agree_check" type="checkbox" style="height: 20px;width: 19px;position: relative;top: 3px;margin-right: 5px;"> <?php echo $language['edit_offer_page_i_agree']; ?> <a href="#" style="text-decoration: none;color: #b8efe5;"> <?php echo $language['edit_offer_page_terms_and_condition']; ?></a>
					</div>

					<div style="text-align: center;margin-top: 30px;">

						<a href="#" class="next-btn-circle"
						   style="text-decoration: none;font-size: 38px;width: auto;border-radius: 25px;display: inline-block;padding: 0px 30px;margin: auto;display: inline-block;font-size: 25px;"
						   onclick="post_goal();"><i
								class="fa fa-check" style="font-size: 25px;"></i> <?php echo $language['edit_offer_page_update_my_offer']; ?></a>
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

		$.ajax({
			url:'<?php echo base_url('member/remove_img/'.$goal['id']); ?>',
			success: function (data){

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
			url:'<?php echo base_url('member/update_offer_save'); ?>',
			type:'post',
			cache:false,
			contentType: false,
			processData: false,
			data:$form,
			success: function (data){

				$("body").overhang({
					type: "success",
					message: "<?php echo $language['edit_offer_page_offer_updated_successfully']; ?>",
					callback: function (value) {
						window.location='<?php echo base_url('member/my_offers'); ?>';
					}
				});

			}
		})
	}


	$('.goal_delivery_type').on('change', function () {

		if ($(this).val() == 'address') {
			$('textarea.address_inp_field').slideUp();
			$('#address_detail').slideDown();
		} else if ($(this).val() == 'virtual') {
			$('#address_detail').slideUp();
			$('textarea.address_inp_field').slideDown();
		}
	})
</script>

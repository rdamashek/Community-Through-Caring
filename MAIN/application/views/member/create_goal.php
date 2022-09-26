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
</style>
<div class="auth-container "
	 style="max-width: 600px; margin: auto; margin-top: 200px; color: white; padding: 25px; background-color: #369382; border-radius: 18px;">

	<form id="goal_form">


		<div class="step">
			<h2 class="text-center">
			<?php echo $language['create_goal_page_heading']; ?>
			</h2>

			<div class="auth-container row text-center" style="padding-top: 50px">
				<div class="col-md-6 option-div " 
					 onclick=" $('.option-div').removeClass('checked'); $(this).addClass('checked'); $this=$(this); setTimeout(function (){window.location='<?php echo base_url('member/create_offer'); ?>';}, 200)">
					<label class="col-md-12"
						   style="background-color: #46af9d;padding: 20px 5px;border-radius: 10px;border: 1px solid;">

						<i class="fa fa-check checked-rad"
						   style="font-size: 30px;position: absolute;top: 10px;right: 10px;"></i>
						<i class="fa fa-earth" style="font-size: 40px;margin-bottom: 15px;"></i>
						<h4><?php echo $language['create_goal_page_offer']; ?></h4>

						<p style="font-size: 15px"><?php echo $language['create_goal_page_create_new_offer']; ?> </p>
						<input name="goal[type]"  type="radio" height="30px"
							   style="width: 20px;height: 20px;position: absolute;top: 5px;left: 5px; display: none">
					</label>
				</div>

				<div class="col-md-6 option-div" 
					 onclick=" $('.option-div').removeClass('checked'); $(this).addClass('checked'); $this=$(this); setTimeout(function (){window.location='<?php echo base_url('member/create_need'); ?>';}, 200)">
					<label class="col-md-12"
						   style="background-color: #46af9d;padding: 20px 5px;border-radius: 10px;border: 1px solid;">

						<i class="fa fa-check  checked-rad"
						   style="font-size: 30px;position: absolute;top: 10px;right: 10px;"></i>

						<i class="fa fa-heart" style="font-size: 40px;margin-bottom: 15px;"></i>
						<h4><?php echo $language['create_goal_page_need']; ?></h4>

						<p style="font-size: 15px"><?php echo $language['create_goal_page_want_post_my_need']; ?> </p>
						<input type="radio" name="goal[type]" height="30px"
							   style="width: 20px;height: 20px;position: absolute;top: 5px;left: 5px;  display: none">
					</label>
				</div>

			</div>
		</div>

		<div class="step" style="display: none;">

			<div class="spt-container need_steps" style="display: none">


				<div class="single-step">
					<h3 class="text-center">
					<?php echo $language['create_need_page_fill_detail_your_need']; ?>
					</h3>


					<input type="text" class="form-control main-single-inp" name="goal[name]"
						   placeholder="<?php echo $language['create_need_page_i_need_bike']; ?>"
						   >
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_goal_page_span_enter_title_need']; ?></span>


					<input type="text" class="form-control main-single-inp" name="goal[cost]" placeholder="$700"
						   >
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_goal_page_span_enter_budget_need']; ?></span>

					<select onchange="show_options(this);" class="form-control main-single-inp" name="period[type]"
							>
							<option disabled selected><?php echo $language['create_goal_page_select_urgency']; ?></option>
						<option value="asap" style="color: #fff; background-color: #44c0aa"><?php echo $language['create_goal_page_select_urgency_asap']; ?></option>
						<option value="before" style="color: #fff; background-color: #44c0aa"><?php echo $language['create_goal_page_select_urgency_before']; ?></option>
						<option value="recurring" style="color: #fff; background-color: #44c0aa"><?php echo $language['create_goal_page_select_urgency_recurring']; ?></option>
						<option value="period" style="color: #fff; background-color: #44c0aa"><?php echo $language['create_goal_page_select_urgency_after']; ?></option>
					</select>
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_goal_page_span_soon_need']; ?></span>

					<div class="form-group start_date" style="display: none">
						<input type="date" class="form-control main-single-inp" autocomplete="false"
							   name="period[start_date]" id="userName">
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_goal_page_select_start_date']; ?></span>
					</div>
					<div class="form-group days" style="display: none">
						<select id="choices-multiple-remove-button" class="main-single-inp" name="period[day][]"
								placeholder="<?php echo $language['create_goal_page_select_day']; ?>" multiple>
								<option><?php echo $language['create_goal_page_select_day_sunday']; ?></option>
							<option><?php echo $language['create_goal_page_select_day_monday']; ?></option>
							<option><?php echo $language['create_goal_page_select_day_tuesday']; ?></option>
							<option><?php echo $language['create_goal_page_select_day_wednesday']; ?></option>
							<option><?php echo $language['create_goal_page_select_day_thursday']; ?></option>
							<option><?php echo $language['create_goal_page_select_day_friday']; ?></option>
							<option><?php echo $language['create_goal_page_select_day_saturday']; ?></option>
						</select>
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_goal_page_span_recurring_days_need']; ?></span>

					</div>


					<div class="form-group end_date" style="display: none">
						<input type="date" class="form-control main-single-inp" autocomplete="false"
							   name="period[end_date]" id="userName">
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_goal_page_select_end_date']; ?></span>
					</div>


					<a href="#" class="next-btn-circle" style="font-size: 38px"
					   onclick="$(this).parents('.single-step').hide().next('.single-step').show();"><i
							class="fa fa-angle-right" style="font-size: 38px"></i></a>
				</div>

				<div class="single-step" style="display: none">
					<h3 class="text-center">
					<?php echo $language['create_goal_page_fill_contact_detail']; ?>
					</h3>


					<input type="text" class="form-control main-single-inp" name="goal[name]" placeholder="XXXXXXXXXXXX"
						   >
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_goal_page_primary_phone_number']; ?></span>


					<select class="form-control main-single-inp goal_delivery_type" id="goal_delivery_type" name="goal[cost]" >
						<option disabled selected><?php echo $language['create_goal_page_select_address_type']; ?></option>
						<option style="color: #fff; background-color: #44c0aa" value="virtual"><?php echo $language['create_goal_page_select_address_type_virtual']; ?></option>
						<option style="color: #fff; background-color: #44c0aa" value="address"><?php echo $language['create_goal_page_select_address_type_address']; ?></option>
					</select>
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_goal_page_please_select_address_type']; ?></span>

					<textarea id="address_inp_field" class="form-control main-single-inp address_inp_field"
							  style="display:none;margin-top: 10px;height: 90px;"
							  placeholder="<?php echo $language['create_goal_page_enter_goal_delivery']; ?>" autocomplete="false"
							  name="goal[deliery_location]"></textarea>
					<div class="address_details">

					</div>



					<div style="text-align: center;margin-top: 25px;">
						<input id="agree_check" type="checkbox" style="height: 20px;width: 19px;position: relative;top: 3px;margin-right: 5px;"> <?php echo $language['create_goal_page_agree']; ?> <a href="#" style="text-decoration: none;color: #b8efe5;"> <?php echo $language['create_goal_page_trem_condition']; ?></a>
					</div>
					<div style="text-align: center;margin-top: 30px;">
						<a href="#" class="next-btn-circle"
						   style="text-decoration: none;font-size: 38px;width: auto;border-radius: 25px;display: inline-block;padding: 0px 30px;margin: auto;display: inline-block;font-size: 25px;"
						   onclick="post_goal();"><i
								class="fa fa-check" style="font-size: 25px;"></i> <?php echo $language['create_goal_page_post_my_need']; ?></a>
					</div>
				</div>


			</div>


			<div class="spt-container offer_steps" style="display: none">


				<div class="single-step">
					<h3 class="text-center">
					<?php echo $language['create_goal_page_fill_detail_your_offer']; ?>
					</h3>


					<input type="text" class="form-control main-single-inp" name="goal[name]"
						   placeholder="<?php echo $language['create_goal_page_placeholder_something_want_offer']; ?>"
						   >
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_goal_page_you_like_offer']; ?></span>


					<select onchange="show_payment_options(this);" class="form-control main-single-inp"
							name="goal[name]" >
						<option disabled selected><?php echo $language['create_goal_page_select_option']; ?></option>
						<option value="price" style="color: #fff; background-color: #44c0aa"><?php echo $language['create_goal_page_select_option_price']; ?></option>
						<option value="barter" style="color: #fff; background-color: #44c0aa"><?php echo $language['create_goal_page_select_option_barter']; ?></option>
						<option value="free" style="color: #fff; background-color: #44c0aa"><?php echo $language['create_goal_page_select_option_free']; ?></option>
					</select>
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_goal_page_select_medium_exchange']; ?></span>

					<div id="barter_option" style="display: none">
						<input type="text" id="offer_price" class="form-control main-single-inp" name="goal[name]"
							   placeholder=""
						>
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_goal_page_enter_barter_detail']; ?></span>
					</div>
					<div id="price_option" style="display: none">
						<input type="text" id="offer_price" class="form-control main-single-inp" name="goal[name]"
							   placeholder="$500"
						>
						<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_goal_page_offer_price']; ?></span>
					</div>


					<a href="#" class="next-btn-circle" style="font-size: 38px"
					   onclick="$(this).parents('.single-step').hide().next('.single-step').show();"><i
							class="fa fa-angle-right" style="font-size: 38px"></i></a>
				</div>

				<div class="single-step" style="display: none">
					<h3 class="text-center">
					<?php echo $language['create_goal_page_fill_contact_detail']; ?>
					</h3>


					<input type="text" class="form-control main-single-inp" name="goal[name]" placeholder="XXXXXXXXXXXX"
						   >
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_goal_page_primary_phone_number']; ?></span>


					<select class="form-control main-single-inp goal_delivery_type" id="goal_delivery_type" name="goal[cost]" >
					<option disabled selected><?php echo $language['create_goal_page_select_address_type']; ?></option>
						<option style="color: #fff; background-color: #44c0aa" value="virtual"><?php echo $language['create_goal_page_select_address_type_virtual']; ?></option>
						<option style="color: #fff; background-color: #44c0aa" value="address"><?php echo $language['create_goal_page_select_address_type_address']; ?></option>
					</select>
					<span style="color: white; display: block; text-align: center;font-style: italic;font-size: 13px;"><?php echo $language['create_goal_page_please_select_address_type']; ?></span>

					<textarea id="address_inp_field" class="form-control main-single-inp address_inp_field"
							  style="display:none;margin-top: 10px;height: 90px;"
							  placeholder="<?php echo $language['create_goal_page_enter_goal_delivery']; ?>" autocomplete="false"
							  name="goal[deliery_location]"></textarea>

					<div style="text-align: center;margin-top: 25px;">
						<input id="agree_check" type="checkbox" style="height: 20px;width: 19px;position: relative;top: 3px;margin-right: 5px;"> <?php echo $language['create_goal_page_agree']; ?> <a href="#" style="text-decoration: none;color: #b8efe5;"> <?php echo $language['create_goal_page_trem_condition']; ?></a>
					</div>

					<div style="text-align: center;margin-top: 30px;">

						<a href="#" class="next-btn-circle"
						   style="text-decoration: none;font-size: 38px;width: auto;border-radius: 25px;display: inline-block;padding: 0px 30px;margin: auto;display: inline-block;font-size: 25px;"
						   onclick="post_goal();"><i
								class="fa fa-check" style="font-size: 25px;"></i> <?php echo $language['create_goal_page_post_my_offer']; ?></a>
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


	});

	function post_goal(){
		$form = $('#goal_form').serializeArray();
		// if()
	}


	$('.goal_delivery_type').on('change', function () {

		if ($(this).val() == 'address') {
			$('textarea.address_inp_field').html('').slideDown();
		} else if ($(this).val() == 'virtual') {
			$('textarea.address_inp_field').html('').slideDown();
		}
	})
</script>

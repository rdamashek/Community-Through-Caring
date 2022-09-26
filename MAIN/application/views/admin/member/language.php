<style>
	.fade:not(.show) {
		opacity: 1;
	}

	.modal-backdrop.fade:not(.show) {
		opacity: 0.5;
	}
</style>

<div class="col-md-10 offset-md-2">
	<div class="container" style="background-color: white; margin-top: 75px; padding: 15px; border-radius: 25px;">
		<h2 style="padding-top: 50px" class="text-center"><?php echo $language['admin_my_offers_page_language_setting'] ?></h2>
		<?php
		if (isset($_GET['error'])) {
			if ($_GET['error'] == 'invalid_format') {

		?>

				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Error!</strong> Update rejected because of improper JSON format
				</div>

		<?php

			}
		}
		?>
		<?php
		if (isset($_GET['msg'])) {
			if ($_GET['msg'] == 'updated') {

		?>

				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Success!</strong> language updated successfully
				</div>

		<?php

			}
		}
		?>
		<form id="goal_laguange" method="POST">
			<div class="col-md-12">
				<textarea style="margin-top: 30px; width: 100%;border-radius: 5px;border: 3px solid #268171;" name="lang_content" id="" cols="30" rows="10"><?php echo file_get_contents(base_url('language.json')); ?></textarea>
			</div>
			<div class="col-md-12">
				<input id="submit" type="button" onclick="update_language()" style="border-radius: 25px;padding: 3px 40px;margin-top: 10px;margin: 0px auto;background: #268171;color: white;border: none;display: inline-block;font-size: 25px;" value="Update">
			</div>
		</form>




	</div>
</div>



</div>

<script>
	
	function update_language() {
		$("body").overhang({
			type: "confirm",
			primary: "#40D47E",
			accent: "#27AE60",
			yesColor: "#3498DB",
			message: "Do you want to update language?",
			overlay: true,
			callback: function(value) {

				if (value) {
					$lang = $('textarea[name=lang_content]').val();
					$.ajax({
						url: '<?php echo base_url('admin/edit_language'); ?>',
						data: {
							lang: $lang
						},
						type: 'post',
						success: function(data) {
							window.location = data;
							// $("body").overhang({
							// 	type: "success",
							// 	message: "language updated successfully",
							// 	callback: function (value) {
							//  		window.location='<?php //  echo base_url('admin/language'); 
							// 							?>';
							// 	}
							// });

						}
					});
				}
			}
		});
	}
</script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">



<div class="plus" style="position:fixed; bottom: 30px; right: 30px;height: 80px;width: 80px;border-radius: 50%;background-color: white;color: #288171;font-size: 44px;padding: 15px;align-items: center;justify-content: center;display: flex; cursor:pointer;z-index: 999;border: 2px solid;">
	<i onclick="window.location='<?php echo base_url('member/create_goal'); ?>'" class="fa fa-plus"></i>
	<div onclick="this.remove()" style="position: absolute; top: auto; background-color: #bdfff3; width: 305px; height: auto; right: 8px; cursor: default; border-radius: 15px; font-size: 13px; padding: 11px; color: #216655; bottom: 80px;">
	<?php echo get_lang('lang_create_offer_right_away_popup_text') ?>	
	
		<i class="fa fa-close" style="cursor:pointer;border: 1px solid; border-radius: 50%; width: 20px; height: 20px;display: flex; justify-content: center;align-items: center;font-size: 18px;background-color: white;border: 1px solid;top: -10px;right: -10px;position: absolute;"></i>
	</div>


</div>
<style>
	@media (max-width: 600px) {
		.plus {
			height: 50px !important;
			width: 50px !important;

		}
	}

	#search_box::placeholder {
		color: white;
	}

	#search_box:hover,
	#search_box:active,
	#search_box:focus {
		border: none;
		outline: none;
	}

	#goals-tabls p {
		overflow: hidden;
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-line-clamp: 1;
		-webkit-box-orient: vertical;
		white-space: pre-wrap;
	}

	#goals-tabls h4 {
		overflow: hidden;
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-line-clamp: 1;
		-webkit-box-orient: vertical;
		white-space: pre-wrap;
	}
</style>


<div class="clearfix"></div>

<div class="container">
	<div id="tabs" style="margin-top: 150px;">
		<ul>
			<li><a href="#all-goals"><?php echo get_lang('lang_all'); ?></a></li>
			<li><a href="#match-goals"><i class="fa-solid fa-heart-circle-check" style="color: #078a72;"></i> <?php echo get_lang('lang_match'); ?></a></li>
		</ul>


		<div id="all-goals">
			<!---->
			<!--			<div id="top-action-bar" style="padding: 15px;text-align: right">-->
			<!--				<div style="display: inline-block;clear: both; ">-->
			<!--				<input type="text" placeholder="Seach offers..." id="search_box" style="padding: 5px; border: none; border-bottom: 1px solid silver; width: 270px; font-size: 19px; margin-bottom: 15px; background: #2a8a72c9; border-radius: 25px; padding-right: 35px; padding-left: 14px; color: white;">-->
			<!--				<a href="#" onclick="search_offers(this);" style="width: 35px;height: 35px;background-color: #288171;display: inline-block;line-height: 35px;text-align: center;border-radius: 50%;color: white;position: relative;left: -40px;top: 1px;border: 1px solid white;"><i class="fa fa-search"></i></a>-->
			<!--				</div>-->
			<!--			</div>-->

			<div id="goals-list">
				<table class="table" id="goals-tabls" style="width: 100%;">
					<thead style="display: none">
						<tr>
							<th>desc</th>
							<th>img</th>
						</tr>
					</thead>
					<tbody>

						<!-- ================= -->
						<?php

						if (isset($goals)) {
							if (sizeof($goals) > 0) {
								foreach ($goals as $goal) {
						?>
									<?php
									$no_img = explode(' ', ucfirst($goal['name']));
									$w1 = mb_substr($no_img[0], 0, 1);
									$w2 = (isset($no_img[1]) ? mb_substr($no_img[1], 0, 1) : '');
									?>
									<tr class="single-goal" onclick="window.location='<?php echo base_url('welcome/offer_detail/' . clean($goal['name']) . '__' . ($goal['id'])); ?>'">
										<td style="max-width: 60%">
											<div class="col-sm-10 goal-desc-left">
												<h4><?php echo mb_strimwidth($goal['name'], 0, 100, '...');; ?></h4>
												<p><?php echo mb_strimwidth($goal['description'], 0, 100, '...'); ?></p>
												<small><?php echo time_elapsed_string($goal['date_created']); ?></small>
											</div>
										</td>
										<td>
											<div class=" goal-img">
												<?php
												if (isset($goal['photo']) && strlen($goal['photo']) > 2) {
													echo '<img style="width: 80px; height: 80px; object-fit: cover;border-radius: 15px; float: right;" src="' . base_url('assets/images/uploads/thumb/' . $goal['photo']) . '">';
												} else {
												?>
													<div class="goal-img-alt" style=""><?php echo $w1 . $w2; ?></div>
												<?php
												}
												?>
											</div>
										</td>
									</tr>
						<?php
								}
							}
						}

						?>

					</tbody>
				</table>
			</div>

		</div>
		<div id="match-goals" style="">
			<?php
			if (isset($_SESSION['user']['id'])) {
				if (isset($fav)) {
					if (sizeof($fav) > 0) {
						foreach ($fav as $goal) {
			?>
							<div class="row single-goal" onclick="window.location='<?php echo base_url('welcome/offer_detail/' . $goal['name'] . '__' . ($goal['id'])); ?>'">
								<div class="col-sm-10 goal-desc-left">
									<h4><?php echo $goal['name']; ?></h4>
									<p><?php echo $goal['description']; ?></p>
									<small><?php echo time_elapsed_string($goal['date_created']); ?></small>
								</div>

								<?php
								$no_img = explode(' ', ucfirst($goal['name']));
								$w1 = mb_substr($no_img[0], 0, 1);
								$w2 = (isset($no_img[1]) ? mb_substr($no_img[1], 0, 1) : '');
								?>

								<div class="col-sm-2 goal-img">
									<?php
									if (isset($goal['photo']) && strlen($goal['photo']) > 2) {
										echo '<img style="width: 80px; height: 80px; object-fit: cover;border-radius: 15px; float: right;" src="' . base_url('assets/images/uploads/' . $goal['photo']) . '">';
									} else {
									?>
										<div class="goal-img-alt" style=""><?php echo $w1 . $w2; ?></div>
									<?php
									}
									?>
								</div>
							</div>
			<?php
						}
					} else {
						echo '<h2 class="text-center" style="height:200px;margin-top:90px">' . get_lang('lang_you_do_not_have_any_matches_yet') . '</h2>';
					}
				}
			} else {
				echo '<h2 class="text-center">' . get_lang('lang_please_sign_in_to_add_view_your_match') . '</h2>';
				echo '<center style="height:200px;"><a href="' . base_url('welcome/login') . '" class="next-btn-circle" style="width: auto;display: inline-block;border-radius: 25px;clear: both;padding: 0px 38px;border: none; box-shadow: none; background: #4caf9d; color:#fff; margin-top:35px; cursor: pointer;line-height:  44px;text-decoration: none;font-size: 25px;" >' . get_lang('lang_sign_in_now') . '
				</a></center>';
			}
			?>
		</div>

	</div>
</div>
<!-- Modal -->


<script>
	$(function() {
		$("#tabs").tabs();
		$('#goals-tabls').dataTable({
			responsive: true,
			dom: 'Bfrtip',
			order: [],
			buttons: [{
				extend: 'collection',
				text: '<i class="fa fa-download"></i>',
				buttons: [
					'copy',
					'excel',
					'csv',
					'pdf',
					'print'
				]
			}],
			"language": {
				"sProcessing": "<?php echo get_lang('lang_processing') ?>...",
				"sLengthMenu": "<?php echo get_lang('lang_show_menu_entries') ?>",
				"sZeroRecords": "<?php echo get_lang('lang_no_results_found') ?>",
				"sEmptyTable": "<?php echo get_lang('lang_no_data_available_in_table') ?>",
				"sInfo": "<?php echo get_lang('lang_showing_start_to_end_of_total_entries') ?>",
				"sInfoEmpty": "<?php echo get_lang('lang_showing_0_to_0_of_0_entries') ?>",
				"sInfoFiltered": "(<?php echo get_lang('lang_filtering_a_total_of') ?> _MAX_ <?php echo get_lang('lang_records') ?>)",
				"sInfoPostFix": "",
				"sSearch": "<?php echo get_lang('lang_search') ?>:",
				"sUrl": "",
				"sInfoThousands": ",",
				"sLoadingRecords": "<?php echo get_lang('lang_charging') ?>...",
				"oPaginate": {
					"sFirst": "<?php echo get_lang('lang_first') ?>",
					"sLast": "<?php echo get_lang('lang_last') ?>",
					"sNext": "<?php echo get_lang('lang_next') ?>",
					"sPrevious": "<?php echo get_lang('lang_previous') ?>"
				},
				"oAria": {
					"sSortAscending": ": <?php echo get_lang('lang_check_to_sort_the_column_in_ascending_order') ?>",
					"sSortDescending": ": <?php echo get_lang('lang_check_to_sort_column_descending') ?>"
				}
			}
		});
	});
</script>

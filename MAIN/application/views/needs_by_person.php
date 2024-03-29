<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

<style>
	#goals-tabls p{
		overflow: hidden;
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-line-clamp: 1;
		-webkit-box-orient: vertical;
		white-space: pre-wrap;
	}
	#goals-tabls h4{
		overflow: hidden;
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-line-clamp: 1;
		-webkit-box-orient: vertical;
		white-space: pre-wrap;
	}
	@media (max-width: 600px) {
		.plus {
			height: 50px !important;
			width: 50px !important;

		}
	}


</style>

<div class="plus" style="position:fixed; bottom: 30px; right: 30px;height: 80px;width: 80px;border-radius: 50%;background-color: white;color: #288171;font-size: 44px;padding: 15px;align-items: center;justify-content: center;display: flex; cursor:pointer;z-index: 999;border: 2px solid;">
	<i onclick="window.location='<?php echo base_url('member/create_goal'); ?>'" class="fa fa-plus"></i>
	<div onclick="this.remove()" style="position: absolute; top: auto; background-color: #bdfff3; width: 305px; height: auto; right: 8px; cursor: default; border-radius: 15px; font-size: 13px; padding: 11px; color: #216655; bottom: 80px;">
		<?php echo get_lang('lang_create_need_right_away_popup_text') ?>
		<i class="fa fa-close" style="cursor:pointer;border: 1px solid; border-radius: 50%; width: 20px; height: 20px;display: flex; justify-content: center;align-items: center;font-size: 18px;background-color: white;border: 1px solid;top: -10px;right: -10px;position: absolute;"></i>
	</div>


</div>

<div class="clearfix"></div>

<div class="container">
	<h3 style="display: block;top: 120px;position: relative;text-align: center;color: white;">Posted by <b><?php echo $user['name'];?></b></h3>
	<div id="tabs" style="margin-top: 150px">
		<ul>
			<li><a href="#all-goals"><?php echo get_lang('lang_needs'); ?></a></li>
			<li><a href="#match-goals"> <?php echo get_lang('lang_offers'); ?></a></li>
		</ul>


		<div id="all-goals">

			<table class="table" id="goals-tabls">
				<thead style="display: none">
				<tr>
					<th>desc</th>
					<th>img</th>
				</tr>
				</thead>
				<tbody>


				<!-- ================= -->
				<?php

				if (isset($needs)) {
					if (sizeof($needs) > 0) {
						foreach ($needs as $goal) {
							?>
							<?php
							$no_img = explode(' ', ucfirst($goal['name']));
							$w1 = mb_substr($no_img[0], 0, 1);
							$w2 = (isset($no_img[1]) ? mb_substr($no_img[1], 0, 1) : '');
							?>
							<tr class="single-goal" onclick="window.location='<?php echo base_url('welcome/need_detail/' . clean($goal['name']) . '__' . ($goal['id'])); ?>'">
								<td style="max-width: 60%">
									<div class="col-sm-10 goal-desc-left">
										<h4><?php echo mb_strimwidth($goal['name'], 0, 100, '...');; ?></h4>
										<p><?php echo mb_strimwidth($goal['description'], 0, 100, '...'); ?></p>
										<small><?php echo time_elapsed_string($goal['date_created']); ?></small>
									</div>
								</td>
								<td>
									<div class="goal-img">
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
		<div id="match-goals" style="">
			<table class="table" id="offers-tabls" style="width: 100%;">
				<thead style="display: none">
				<tr>
					<th>desc</th>
					<th>img</th>
				</tr>
				</thead>
				<tbody>

				<!-- ================= -->
				<?php

				if (isset($offers)) {
					if (sizeof($offers) > 0) {
						foreach ($offers as $goal) {
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
											echo '<img style="width: 80px; height: 80px; object-fit: cover;border-radius: 15px; float: right;" src="' . base_url('assets/images/uploads/' . $goal['photo']) . '">';
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
</div>

<script>


	$(function() {
		$("#tabs").tabs();
		$('#goals-tabls').dataTable({
			dom: 'Bfrtip',
			order: [],
			buttons: [
				{
					extend: 'collection',
					text: '<i class="fa fa-download"></i>',
					buttons: [
						'copy',
						'excel',
						'csv',
						'pdf',
						'print'
					]
				}
			],
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


		$('#offers-tabls').dataTable({
			dom: 'Bfrtip',
			order: [],
			buttons: [
				{
					extend: 'collection',
					text: '<i class="fa fa-download"></i>',
					buttons: [
						'copy',
						'excel',
						'csv',
						'pdf',
						'print'
					]
				}
			],
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

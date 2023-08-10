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
		<h2 style="padding-top: 50px" class="text-center"><?php echo get_lang('lang_all_offers') ?>
			<i onclick="window.location='<?php echo base_url('member/create_goal'); ?>'" class="fa fa-plus" style="color: white;border-radius: 50%;background-color: #008172;width: 35px;line-height: 35px;margin-left: 10px;font-size: 21px;position: relative;top: -3px;"></i>
		</h2>

		<table class="table" id="goals_table">
			<thead>
				<tr>
					<th>#</th>
					<th><?php echo get_lang('lang_offer_name') ?></th>
					<th><?php echo get_lang('lang_description') ?></th>
					<th><?php echo get_lang('lang_date_created') ?></th>
					<th><?php echo get_lang('lang_actions') ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$count = 0;
				foreach ($goals as $goal) {
					$count++;
				?>
					<tr>
						<td><?php echo $count; ?></td>
						<td><?php echo $goal['name']; ?></td>
						<td><?php echo mb_strimwidth($goal['description'], 0, 60, '...'); ?></td>
						<td><?php echo date('d M Y', strtotime($goal['date_created'])); ?></td>
						<td><a href="<?php echo base_url('member/edit_offer/' . $goal['id']); ?>"><i class="fa fa-edit" style="color: #268171;"></i></a> &nbsp; <a onclick="delete_offer(<?php echo $goal['id']; ?>);" href="#"><i class="fa fa-trash" style="color: #268171;"></i> </a></td>
					</tr>
				<?php
				}
				?>

			</tbody>
		</table>

	</div>
</div>

</div>

<script>
	window.onload = function() {
		$('#goals_table').dataTable({
			responsive: true,
			columnDefs: [{
					responsivePriority: 1,
					targets: 0
				},
				{
					responsivePriority: 2,
					targets: -1
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
	}

	function delete_offer($id) {
		$("body").overhang({
			type: "confirm",
			primary: "#40D47E",
			accent: "#27AE60",
			yesColor: "#3498DB",
			message: "Do you want to continue?",
			overlay: true,
			callback: function(value) {

				if (value) {
					window.location = '<?php echo base_url('member/delete_offer/'); ?>' + $id;
				}
			}
		});
	}
</script>

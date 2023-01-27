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
		<h2 style="padding-top: 50px" class="text-center"><?php echo $language['my_offers_page_my_offers'] ?>
			<i onclick="window.location='<?php echo base_url('member/create_goal'); ?>'" class="fa fa-plus" style="color: white;border-radius: 50%;background-color: #008172;width: 35px;line-height: 35px;margin-left: 10px;font-size: 21px;position: relative;top: -3px;"></i>
		</h2>

		<table class="table" id="offers_table">
			<thead>
				<tr>
					<th>#</th>
					<th><?php echo $language['my_offers_page_offer_name'] ?></th>
					<th><?php echo $language['my_offers_page_description'] ?></th>
					<th><?php echo $language['my_offers_page_date_create'] ?></th>
					<th><?php echo $language['my_offers_page_action'] ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$count = 0;
				foreach ($offers as $offer) {
					$count++;
				?>
					<tr>
						<td><?php echo $count; ?></td>
						<td><?php echo $offer['name']; ?></td>
						<td><?php echo mb_strimwidth($offer['description'], 0, 60, '...'); ?></td>
						<td><?php echo date('d M Y', strtotime($offer['date_created'])); ?></td>
						<td><a href="<?php echo base_url('member/edit_offer/' . $offer['id']); ?>"><i class="fa fa-edit" style="color: #268171;"></i></a> &nbsp; <a onclick="delete_offer(<?php echo $offer['id']; ?>);" href="#"><i class="fa fa-trash" style="color: #268171;"></i> </a></td>
					</tr>
				<?php
				}
				?>

			</tbody>
		</table>

	</div>
</div>

<div class="col-md-10 offset-md-2">
	<div class="container" style="background-color: white; margin-top: 75px; padding: 15px; border-radius: 25px;">
		<h2 style="padding-top: 50px" class="text-center"><?php echo $language['my_needs_page_my_needs'] ?>
			<i onclick="window.location='<?php echo base_url('member/create_goal'); ?>'" class="fa fa-plus" style="color: white;border-radius: 50%;background-color: #008172;width: 35px;line-height: 35px;margin-left: 10px;font-size: 21px;position: relative;top: -3px;"></i>
		</h2>


		<table class="table" id="needs_table">
			<thead>
				<tr>
					<th>#</th>
					<th><?php echo $language['my_offers_page_offer_name'] ?></th>
					<th><?php echo $language['my_offers_page_description'] ?></th>
					<th><?php echo $language['my_offers_page_date_create'] ?></th>
					<th><?php echo $language['my_offers_page_action'] ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$count = 0;
				foreach ($needs as $need) {
					$count++;
				?>
					<tr>
						<td><?php echo $count; ?></td>
						<td><?php echo $need['name']; ?></td>
						<td><?php echo mb_strimwidth($need['description'], 0, 60, '...'); ?></td>
						<td><?php echo date('d M Y', strtotime($need['date_created'])); ?></td>
						<td><a href="<?php echo base_url('member/edit_need/' . $need['id']); ?>"><i class="fa fa-edit" style="color: #268171;"></i></a> &nbsp; <a onclick="delete_need(<?php echo $need['id']; ?>);" href="#"><i class="fa fa-trash" style="color: #268171;"></i> </a></td>
					</tr>
				<?php
				}
				?>

			</tbody>
		</table>

	</div>

</div>

<script>
	window.onload = function() {
		$('#offers_table').dataTable({
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
				"sProcessing": "<?php echo $language['datatable_processing'] ?>...",
				"sLengthMenu": "<?php echo $language['datatable_show_menu_entries'] ?>",
				"sZeroRecords": "<?php echo $language['datatable_no_results_found'] ?>",
				"sEmptyTable": "<?php echo $language['datatable_no_data_avaulable_in_table'] ?>",
				"sInfo": "<?php echo $language['datatable_showing_start_to_end_of_total_entries'] ?>",
				"sInfoEmpty": "<?php echo $language['datatable_showing_0_to_0_of_0_entries'] ?>",
				"sInfoFiltered": "(<?php echo $language['datatable_filtering_a_total_of'] ?> _MAX_ <?php echo $language['datatable_records'] ?>)",
				"sInfoPostFix": "",
				"sSearch": "<?php echo $language['datatable_search'] ?>:",
				"sUrl": "",
				"sInfoThousands": ",",
				"sLoadingRecords": "<?php echo $language['datatable_charging'] ?>...",
				"oPaginate": {
					"sFirst": "<?php echo $language['datatable_first'] ?>",
					"sLast": "<?php echo $language['datatable_last'] ?>",
					"sNext": "<?php echo $language['datatable_next'] ?>",
					"sPrevious": "<?php echo $language['datatable_previous'] ?>"
				},
				"oAria": {
					"sSortAscending": ": <?php echo $language['datatable_Check_to_sort_the_column_in_ascending_order'] ?>",
					"sSortDescending": ": <?php echo $language['datatable_Check_to_sort_column_descending'] ?>"
				}
			}
		});
		$('#needs_table').dataTable({
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
				"sProcessing": "<?php echo $language['datatable_processing'] ?>...",
				"sLengthMenu": "<?php echo $language['datatable_show_menu_entries'] ?>",
				"sZeroRecords": "<?php echo $language['datatable_no_results_found'] ?>",
				"sEmptyTable": "<?php echo $language['datatable_no_data_avaulable_in_table'] ?>",
				"sInfo": "<?php echo $language['datatable_showing_start_to_end_of_total_entries'] ?>",
				"sInfoEmpty": "<?php echo $language['datatable_showing_0_to_0_of_0_entries'] ?>",
				"sInfoFiltered": "(<?php echo $language['datatable_filtering_a_total_of'] ?> _MAX_ <?php echo $language['datatable_records'] ?>)",
				"sInfoPostFix": "",
				"sSearch": "<?php echo $language['datatable_search'] ?>:",
				"sUrl": "",
				"sInfoThousands": ",",
				"sLoadingRecords": "<?php echo $language['datatable_charging'] ?>...",
				"oPaginate": {
					"sFirst": "<?php echo $language['datatable_first'] ?>",
					"sLast": "<?php echo $language['datatable_last'] ?>",
					"sNext": "<?php echo $language['datatable_next'] ?>",
					"sPrevious": "<?php echo $language['datatable_previous'] ?>"
				},
				"oAria": {
					"sSortAscending": ": <?php echo $language['datatable_Check_to_sort_the_column_in_ascending_order'] ?>",
					"sSortDescending": ": <?php echo $language['datatable_Check_to_sort_column_descending'] ?>"
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
	function delete_need($id) {
		$("body").overhang({
			type: "confirm",
			primary: "#40D47E",
			accent: "#27AE60",
			yesColor: "#3498DB",
			message: "Do you want to continue?",
			overlay: true,
			callback: function(value) {

				if (value) {
					window.location = '<?php echo base_url('member/delete_need/'); ?>' + $id;
				}
			}
		});
	}
</script>

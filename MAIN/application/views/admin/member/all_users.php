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
	<?php
	if ($this->session->flashdata('true')) {
	?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<?php echo $this->session->flashdata('true'); ?>
		</div>
	<?php
	} else if ($this->session->flashdata('err')) {
	?>
		<div class="alert alert-success">
			<?php echo $this->session->flashdata('err'); ?>
		</div>
	<?php } ?>

		<h2 style="padding-top: 50px" class="text-center">Users Management</h2>

		<table class="table" id="goals_table">
			<thead>
				<tr>
					<th>#</th>
					<th><?php //echo $language['my_offers_page_offer_name'] 
						?>Name</th>
					<th><?php //echo $language['my_offers_page_description'] 
						?>Email</th>
					<!-- <th><?php //echo $language['my_offers_page_date_create'] 
								?>Photo</th> -->
					<th><?php //echo $language['my_offers_page_action'] 
						?>Phone</th>
					<th><?php //echo $language['my_offers_page_action'] 
						?>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$count = 0;
				foreach ($users as $user) {
					$count++;
				?>
					<tr>
						<td><?php echo $count; ?></td>
						<td><?php echo $user['name']; ?></td>
						<td><?php echo $user['email']; ?></td>
						<td><?php echo $user['phone']; ?></td>

						<td><a href="<?php echo base_url('admin/edit_user/' . $user['id']); ?>"><i class="fa fa-edit" style="color: #268171;"></i></a> &nbsp; <a onclick="delete_user(<?php echo $user['id']; ?>);" href="#"><i class="fa fa-trash" style="color: #268171;"></i> </a></td>
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

	function delete_user($id) {
		$("body").overhang({
			type: "confirm",
			primary: "#40D47E",
			accent: "#27AE60",
			yesColor: "#3498DB",
			message: "Do you want to continue?",
			overlay: true,
			callback: function(value) {

				if (value) {
					window.location = '<?php echo base_url('admin/delete_user/'); ?>' + $id;
				}
			}
		});
	}
</script>

<style>
	.fade:not(.show) {
		opacity: 1;
	}

	.modal-backdrop.fade:not(.show) {
		opacity: 0.5;
	}

	button.dt-button, div.dt-button, a.dt-button, input.dt-button {
		position: relative;
		display: inline-block;
		box-sizing: border-box;
		margin-left: 0.167em;
		margin-right: 0.167em;
		margin-bottom: 0.333em;
		padding: 0.5em 1em;
		border: 1px solid rgba(0, 0, 0, 0.3);
		border-radius: 2px;
		cursor: pointer;
		font-size: .88em;
		line-height: 1.6em;
		color: black;
		white-space: nowrap;
		overflow: hidden;
		background-color: rgba(0, 0, 0, 0.1);
		background: -webkit-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);
		background: -moz-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);
		background: -ms-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);
		background: -o-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);
		background: linear-gradient(to bottom, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);
		filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr="rgba(230, 230, 230, 0.1)", EndColorStr="rgba(0, 0, 0, 0.1)");
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
		text-decoration: none;
		outline: none;
		text-overflow: ellipsis;
	}

	.dataTables_wrapper>.dt-buttons>.dt-button {
		margin: 0;
		background-color: #288171;
		color: white;
		border-radius: 25px;
		border: none;
	}

	input:-webkit-autofill, input:-webkit-autofill:hover, input:-webkit-autofill:focus, input:-webkit-autofill:active {
		border-radius: 3px;
		left: auto;
		box-shadow: none;
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

		<h2 style="padding-top: 50px" class="text-center"><?php echo get_lang('lang_users_management'); ?></h2>
<a class="dt-button buttons-collection" href="#" data-toggle="modal" data-target="#exportData" id="">Export users & data</a>
<a class="dt-button buttons-collection" href="#" data-toggle="modal" data-target="#importData" >Import users & data</a>

		<table class="table" id="goals_table">
			<thead>
				<tr>
					<th>#</th>
					<th><?php echo get_lang('lang_name'); ?></th>
					<th><?php echo get_lang('lang_email'); ?></th>
					
					<th><?php echo get_lang('lang_phone'); ?></th>
					<th><?php echo get_lang('lang_actions'); ?></th>
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

<!-- Modal -->
<div class="modal fade" id="exportData" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document" style="margin-top: 150px;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Export users data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?php echo base_url('admin/export_data/'); ?>">
			<div class="modal-body">

<form id="filter_export">
				<a onclick="$('.select-user-checkbox').prop('checked', true);" style="font-size: 12px; padding: 0px 5px;" class="btn btn-primary" href="#"><i class="fa fa-check"></i> Check All</a> <a onclick="$('.select-user-checkbox').prop('checked', false);" style="font-size: 12px; padding: 0px 5px;" class="btn btn-warning" href="#"><i class="fa fa-ban"></i> Uncheck All</a>
				<hr/>
				<div style="max-height: 245px; overflow-x: hidden;overflow-y:auto;">
				<?php
				$count = 0;
				foreach ($users as $user) {
					?>
					<div class="row">
						<label style="display: flex">
						<div class="col-md-1">
							<input class="select-user-checkbox" value="<?php echo $user['id']; ?>" type="checkbox" name="exported_users[]">
						</div>
						<div class="col-md-11">
							<?php echo $user['name']; ?>
							(<?php echo $user['email']; ?>)
						</div>
						</label>
					</div>
					<?php
				}
				?>
				</div>
				<hr/>

				<div class="form-group">
					<label for="">Set a password to the exported data</label>
					<input type="password" class="form-control" name="zip_password" id="password_inp_login" placeholder="Enter zip file password">
					<i onclick="$('#password_inp_login').attr('type', 'text'); $(this).hide(); $('.fa-eye-low-vision').show();" style="color: black;position:relative;top: -35px;right: 7px;float: right;font-size: 20px;height: 30px;width: 30px;line-height: 30px;cursor: pointer;" class="fa fa-eye"></i>
					<i onclick="$('#password_inp_login').attr('type', 'password');  $(this).hide(); $('.fa-eye').show();" style="display: none ;color: black;position:relative;top: -35px;right: 7px;float: right;font-size: 20px;height: 30px;width: 30px;line-height: 30px;cursor: pointer;" class="fa fa-eye-low-vision"></i>
				</div>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" id="export_data" class="btn btn-primary">Export</button>
			</div>
			</form>
		</div>
	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="importData" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document" style="margin-top: 150px;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Import users data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?php echo base_url('admin/import_userdata/'); ?>" enctype="multipart/form-data">
			<div class="modal-body">

<div class="form-group">
	<label>Select the Zip File:	</label>
				<input style="width: 100%" name="file" class="form-control" type="file" id="">

</div>
				<hr/>

				<div class="form-group">
					<label for="">Zip file password</label>
					<input type="password" class="form-control" name="zip_password" id="password_inp_zip" placeholder="Enter zip file password">
					<i onclick="$('#password_inp_zip').attr('type', 'text'); $(this).hide(); $('.fa-eye-low-vision').show();" style="color: black;position:relative;top: -35px;right: 7px;float: right;font-size: 20px;height: 30px;width: 30px;line-height: 30px;cursor: pointer;" class="fa fa-eye"></i>
					<i onclick="$('#password_inp_zip').attr('type', 'password');  $(this).hide(); $('.fa-eye').show();" style="display: none ;color: black;position:relative;top: -35px;right: 7px;float: right;font-size: 20px;height: 30px;width: 30px;line-height: 30px;cursor: pointer;" class="fa fa-eye-low-vision"></i>
				</div>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" id="export_data" class="btn btn-primary">Start Import</button>
			</div>
			</form>
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

	function delete_user($id) {
		$("body").overhang({
			type: "confirm",
			primary: "#40D47E",
			accent: "#27AE60",
			yesColor: "#3498DB",
			message: "<?php echo get_lang('lang_do_you_want_to_continue') ?>",
			overlay: true,
			callback: function(value) {

				if (value) {
					window.location = '<?php echo base_url('admin/delete_user/'); ?>' + $id;
				}
			}
		});
	}


	//$('body').on('click', '#export_data', function (){
	//	$form = $('#filter_export').serialize();
	//	$.ajax({
	//		url:'<?php //echo base_url('admin/export_data/'); ?>//',
	//		type:'post',
	//		data:$form,
	//		success: function (response){
	//
	//			// Process the response
	//			if (response.success) {
	//				// Convert the response to a Blob
	//				var blob = new Blob([response.zipData], { type: 'application/zip' });
	//
	//				// Create a temporary download link
	//				var downloadLink = document.createElement('a');
	//				downloadLink.href = URL.createObjectURL(blob);
	//				downloadLink.download = 'file.zip';
	//
	//				// Trigger the download
	//				downloadLink.click();
	//
	//				// Clean up the temporary download URL
	//				URL.revokeObjectURL(downloadLink.href);
	//			} else {
	//				// Handle the error case
	//				console.error('Error generating the ZIP file.');
	//			}
	//
	//		}
	//	})
	//
	//})

	$('body').on('change', '#up_data', function (){

			data = new FormData();
			data.append('file', $('#up_data')[0].files[0]);


					$.ajax({
						url: "<?php echo base_url() ?>/admin/import_userdata",
						type: "POST",
						data: data,
						enctype: 'multipart/form-data',
						processData: false,  // tell jQuery not to process the data
						contentType: false,   // tell jQuery not to set contentType
						success: function (data){
							alert(data);
						}
					});
					return false;



	})
</script>

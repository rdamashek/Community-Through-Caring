<style>
	.fade:not(.show) {
		opacity: 1;
	}

	.modal-backdrop.fade:not(.show) {
		opacity: 0.5;
	}

</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/richtext/richtext.min.css'); ?>">
<script src="<?php echo base_url('assets/richtext/jquery.richtext.min.js'); ?>"></script>
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

		<h2 style="padding-top: 50px" class="text-center">Website Settings</h2>

		<table class="table" id="goals_table">
			<thead>
			<tr>
				<th>#</th>
				<th><?php //echo $language['my_offers_page_offer_name']
					?>Setting Name</th>
				<th><?php //echo $language['my_offers_page_description']
					?>Value</th>
				<!-- <th><?php //echo $language['my_offers_page_date_create']
				?>Photo</th> -->
				<th><?php //echo $language['my_offers_page_action']
					?>Actions</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$count = 0;
			foreach ($settings as $setting) {
				$count++;
				?>
				<tr>
					<td><?php echo $count; ?></td>
					<td><?php echo ucwords(str_replace('_', ' ', $setting['setting_name'])); ?></td>
					<td><?php echo $setting['value']; ?></td>

					<td><a href="javascript:" onclick="edit_setting(<?php echo $setting['id']; ?>, '<?php echo ucwords(str_replace('_', ' ', $setting['setting_name'])); ?>', '<?php echo $setting['value']; ?>')"><i class="fa fa-edit" style="color: #268171;"></i></a> &nbsp;</td>
				</tr>
				<?php
			}
			?>

			</tbody>
		</table>
</div>

	<div class="container" style="background-color: white; margin-top: 25px; padding: 15px; border-radius: 25px;">
		<h2 style="padding-top: 50px" class="text-center">Email Templates</h2>

		<table class="table" style="background-color: white; padding: 15px;  width: 100%">
			<tr>
				<th>Title</th>
				<th>Email Subject</th>
				<th>View</th>
			</tr>
			<?php
			foreach ($email_templates as $email_template) {
				echo "<tr>
				<td>$email_template[name]</td>
				<td>$email_template[subject]</td>";
				?>
				<td><a href='#' onclick="view_template(<?php echo $email_template['id']; ?>)">View/ Edit</a> </td><?php
				echo "</tr>";
				?>

				<?php
			}
			?>
		</table>
		</div>
	</div>
</div>



</div>

<div class="modal fade" id="email_view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document" style="padding-top: 20vh;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?php echo $email_template['name']; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?php echo base_url('admin/save_email'); ?>">
				<div class="modal-body">

					<div class="form-group">
						<label class="form-label" >Subject</label>
						<input type="hidden" name="id" value="" id="email_id">
						<input type="text" class="form-control" id="email_subject" name="subject" value="<?php echo $email_template['subject']; ?>"><br/>
					</div>



					<div class="form-group" style="padding-top: 25px; border: 1px solid #008a73 !important;">
					<textarea class="content" id="email_body" name="body" style="height: 500px; border: 1px solid black"></textarea>
					</div>

					<div style="    background-color: #dbdbdb;padding: 15px;">
						<div style="cursor:pointer;" onclick="$('#variables').slideToggle()"><b>Variables for the email template</b> <i style="float: right; font-weight: bold" class="fa fa-angle-down"></i> </div>
						<code id="variables" style="display: none">

						</code>
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Save changes</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document" style="padding-top: 20vh;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Settings</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="" id="setting_name"></label>
					<input type="hidden" value="" id="setting_id" name="id">
					<input type="text" name="" id="setting_value" class="form-control" placeholder="Please enter the new value" aria-describedby="helpId">
<!--					<small id="helpId" class="text-muted">Help text</small>-->
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" id="save_setting_btn" class="btn btn-primary">Save changes</button>
			</div>
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

	function edit_setting($id, $name, $val) {

		$('#editModal').find('#setting_id').val($id);
		$('#editModal').find('#setting_value').val($val);
		$('#editModal').find('#setting_name').html($name);
$('#editModal').modal('show');

	}

	$('body').on('click', '#save_setting_btn', function (){

		$.ajax({
			url:'<?php echo base_url('admin/update_general_setting'); ?>/'+$('#editModal').find('#setting_id').val(),
			type:'post',
			data:{value:$('#editModal').find('#setting_value').val()},
			success: function (data){
				$("body").overhang({
					type: "success",
					message: "Setting value updated successfully",
					callback: function(value) {
						window.location = '<?php echo base_url('admin/general_settings'); ?>';
					}
				});
			}
		})
	})

	function view_template(id){
		$.ajax({
			url:'<?php echo base_url('admin/get_email_template'); ?>/'+id,
			success: function (data){
				data =JSON.parse(data);
				$('#email_view').find('#email_subject').val(data.subject);
				$('.content').unRichText()
				$('#email_view').find('#email_body').val(data.body).richText();
				$('#email_view').find('#email_id').val(data.id);
				$('#email_view').find('#variables').html(data.variable_description);
				$('#email_view').modal('show');
			}
		})
	}


	$(document).ready(function() {
		$('.content').richText();
	});
</script>

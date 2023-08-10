<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">


<style>
	.fade:not(.show) {
		opacity: 1;
	}

	.modal-backdrop.fade:not(.show) {
		opacity: 0.5;
	}

</style>
<div class="col-md-10 offset-md-2">
	<div class="container " style="background-color: white; margin-top: 75px; padding: 15px; border-radius: 25px;">
		<h2 style="padding-top: 50px" class="text-center"><?php echo get_lang('lang_language_setting') ?></h2>


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
<!--<button onclick="new_lang()"><i class="fa fa-plus"></i> New Keyword</button>-->
		<table class="table table-hover table-striped" id="goals_table" >
			<thead>
			<tr>
				<th>id</th>
				<th>Display Text</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
			foreach ($language as $lang){
				?>
				<tr data-id="<?php echo $lang['id']; ?>">
					<td><?php echo $lang['id']; ?></td>
					<td class="lang_phrase"><?php echo $lang['lang_value']; ?></td>
					<td><a href="#" onclick="get_lang(<?php echo $lang['id']; ?>)"><i class="fa fa-edit" style="color: #268171;"></i></a> </td>
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
<div class="modal fade" id="edit_lang" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" style="    margin-top: 150px;" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Language Text</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="lang_text">Current phrase</label>
					<p style="background-color: black; color: #00e1c7; font-family: monospace; padding: 7px; cursor:pointer;" id="old_lang_text"></p>
					<input type="hidden" name="id" value="" id="lang_id">
				</div>
<hr/>
				<div class="form-group">
					<label for="lang_text">New phrase</label>
					<textarea class="form-control" name="lang_text" id="lang_text"
						   aria-describedby=""
							  placeholder="New Text"></textarea>
					<small id="" class="form-text text-muted">Enter new word for the above phrase </small>
				</div>


<hr/>

				<button style="background: transparent; border: none; border: 1px solid silver; border-radius: 25px; padding: 2px; font-size: 12px; float: right; padding: 2px 15px; cursor: pointer;" onclick="$(this).next('.notes-section').slideToggle();"><i class="fa fa-plus"></i> Notes</button>
				<div class="notes-section" style="display:none;">
					<div class="form-group">
						<label for="notes">Notes</label>
						<textarea class="form-control" name="notes" id="notes"
								  aria-describedby=""
								  placeholder="Notes for this keyword (optional)"></textarea>
						<small id="" class="form-text text-muted">Notes for this keyword </small>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" onclick="submit_lang()" id="submit_lang" class="btn btn-primary">Save</button>
			</div>
		</div>
	</div>
</div>






<div class="modal fade" id="new_lang" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" style="    margin-top: 150px;" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">New Language Text</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="form-group">
					<label for="newlang_key">Keyword</label>
					<input type="text" class="form-control" name="newlang_key" id="newlang_key"
							  aria-describedby=""
							  placeholder="Keyword">

				</div>

				<div class="form-group">
					<label for="newlang_text">Value</label>
					<textarea class="form-control" name="newlang_text" id="newlang_text"
						   aria-describedby=""
							  placeholder=" Text"></textarea>
				</div>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" onclick="submit_new_lang()" id="submit_lang" class="btn btn-primary">Save</button>
			</div>
		</div>
	</div>


</div>
<input type="file" name="sql_file" id="newlangfile" style="">
<script>

	window.onload=function (){
		$('#goals_table').dataTable({
			responsive: true,
			columnDefs: [
				{ responsivePriority: 1, targets: 0 },
				{ responsivePriority: 2, targets: -1 }
			],
			dom: 'Bfrtip',
			order: [],
			buttons: [{
				extend: 'collection',
				text: '<i class="fa fa-print"></i> Print',
				buttons: [
					'print',
					'csv'
				]
			},{
					extend: 'collection',
					text: '<a target="_blank" onclick="window.location=`<?php echo base_url('admin/export_langauge'); ?>`" href="#" style="color: white; text-decoration: none"><i class="fa fa-download"></i> Export data</a>',
				},{
				extend: 'collection',
				text: '<span  onclick="selectfile();"><i class="fa fa-file"></i> Import data </span>',

			},]
		});
	}


	function selectfile(){
		$('#newlangfile').trigger('click');
	}

	$('#newlangfile').on('change', function() {
		var file = this.files[0];
		if (file) {
			uploadFile(file);
		}
	});

	function uploadFile(file) {
		// Create new form data object
		var formData = new FormData();

		// Append file to form data object
		formData.append('sql_file', file);

		// Create new AJAX request
		$.ajax({
			url: '<?php echo base_url('admin/import_language_table'); ?>', // Change this to your upload URL
			type: 'POST',
			data: formData,
			processData: false,
			contentType: false,
			success: function(response) {
				// Handle success response
				$("body").overhang({
					type: "success",
					duration: 2,
					message: response,
					callback: function(value) {
						location.reload();
					}
				});
			},
			error: function(xhr, status, error) {
				// Handle error response
				$("body").overhang({
					type: "danger",
					duration: 5,
					message: "Upload failed. Please make sure to select the exported language file having file extension of (.sql)",
					callback: function(value) {
						location.reload();
					}
				});

			}
		});
	}

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

	function get_lang($id){
		$.ajax({
			url:'<?php echo base_url('admin/get_keyword'); ?>/'+$id,
			success: function (data){
				data=JSON.parse(data);
				$('#old_lang_text').html(data.lang_value);
				$('#lang_text').val(data.lang_value);
				$('#lang_id').val(data.id);
				$('#notes').val(data.notes);

				$('#edit_lang').modal('show');
			}
		})
	}

	function new_lang(){

				$('#new_lang').modal('show');

	}

	function submit_lang(){
		$id=$('#edit_lang').find('#lang_id').val();
		$value = $('#edit_lang').find('#lang_text').val();
		$notes = $('#edit_lang').find('#notes').val();
		$('#edit_lang').modal('hide');
		$.ajax({
			url:'<?php echo base_url('admin/update_keyword'); ?>/',
			type: 'post',
			data: {'lang_value': $value, 'id':$id, 'notes': $notes},
			success: function (data){
				$('tr[data-id='+$id+']').find('td.lang_phrase').html($value);
				$("body").overhang({
					type: "success",
					duration: 1,
					message: "The keyword updated successfully",
				});

			}
		})
	}

	function submit_new_lang(){

		 $key = $('#new_lang').find('#newlang_key').val();
		$value = $('#new_lang').find('#newlang_text').val();

		$.ajax({
			url:'<?php echo base_url('admin/new_keyword'); ?>/',
			type: 'post',
			data: {'lang_key': $key, 'lang_value':$value},
			success: function (data){

						location.reload()




			}
		})
	}
</script>





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
		<h2 style="padding-top: 50px" class="text-center"><?php echo $language['my_offers_page_my_offers'] ?></h2>

		<table class="table" id="goals_table">
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
				foreach ($goals as $goal) {
					$count++;
				?>
					<tr>
						<td><?php echo $count; ?></td>
						<td><?php echo $goal['name']; ?></td>
						<td><?php echo mb_strimwidth($goal['description'], 0, 60, '...'); ?></td>
						<td><?php echo date('d M Y', strtotime($goal['date_created'])); ?></td>
						<td><a href="<?php echo base_url('admin/edit_offer/' . $goal['id']); ?>"><i class="fa fa-edit" style="color: #268171;"></i></a> &nbsp; <a onclick="delete_offer(<?php echo $goal['id']; ?>);" href="#"><i class="fa fa-trash" style="color: #268171;"></i> </a></td>
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
				"sProcessing": "Procesando...",
				"sLengthMenu": "<?php echo $language['datatable_show_menu_entries'] ?>",
				"sZeroRecords": "No se encontraron resultados",
				"sEmptyTable": "<?php echo $language['datatable_no_data_avaulable_in_table'] ?>",
				"sInfo": "<?php echo $language['datatable_showing_start_to_end_of_total_entries'] ?>",
				"sInfoEmpty": "<?php echo $language['datatable_showing_0_to_0_of_0_entries'] ?>",
				"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
				"sInfoPostFix": "",
				"sSearch": "<?php echo $language['datatable_search'] ?>:",
				"sUrl": "",
				"sInfoThousands": ",",
				"sLoadingRecords": "Cargando...",
				"oPaginate": {
					"sFirst": "Primero",
					"sLast": "Último",
					"sNext": "<?php echo $language['datatable_next'] ?>",
					"sPrevious": "<?php echo $language['datatable_previous'] ?>"
				},
				"oAria": {
					"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
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
					window.location = '<?php echo base_url('admin/delete_offer/'); ?>' + $id;
				}
			}
		});
	}
</script>
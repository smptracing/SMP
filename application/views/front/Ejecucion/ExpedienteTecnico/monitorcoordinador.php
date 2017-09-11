<div class="right_col" role="main">
	<div>
		<div class="clearfix"></div>
		<div class="col-md-12 col-xs-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2><b>MONITOR DE EXPEDIENTE TÉCNICO (COORDINADOR)</b></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table id="tableExpedienteTecnico">
						<thead>
							<th>Nombre</th>
						</thead>
						<tbody>
							<?php foreach($listaETExpedienteTecnico as $key => $value){ ?>
								<tr>
									<td>
										<?=$value->nombre_ue?>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).on('ready', function()
	{
		$('#tableExpedienteTecnico').DataTable();
	});
</script>
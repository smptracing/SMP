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
					<table id="tableExpedienteTecnico" class="table table-striped">
						<thead>
							<th style="text-align: center;">Código único</th>
							<th>Nombre PI</th>
							<th>Inicio/Fin</th>
						</thead>
						<tbody>
							<?php foreach($listaETExpedienteTecnico as $key => $value){ ?>
								<tr>
									<td style="text-align: center;"><?=$value->codigo_unico_pi?></td>
									<td><?=$value->nombre_pi?></td>
									<td><?=($value->existeGantt ? substr($value->primeraETTarea->fecha_inicio_tarea, 0, 10).'/'.substr($value->ultimaETTarea->fecha_final_tarea, 0, 10) : '')?></td>
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
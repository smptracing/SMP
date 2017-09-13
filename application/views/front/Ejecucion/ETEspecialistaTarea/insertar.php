<link rel="stylesheet" href="<?=base_url()?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/bootstrap-select.css">
<style>
	.cajonEspecialidad
	{
		background-color: #ffffff;
		box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.4);
		cursor: move;
		display: inline-table;
		height: 70px;
		margin: 2px;
		padding: 4px;
		text-align: center;
		user-select: none;
		vertical-align: middle;
		width: 170px;
	}

	.cajonEspecialidad:hover
	{
		background: #2f9bfb;
		color: #ffffff;
	}

	.cajonEspecialidad > small
	{
		display: table-cell;
		vertical-align: middle;
	}
</style>
<h4 style="padding: 5px;margin: 0px;">Actividad: <span style="color: #2f9bfb;">Sistema de seguimiento y mon</span></h4>
<hr style="margin: 3px;">
<div style="padding: 5px;user-select: none;">
	<table style="width: 100%;">
		<thead>
			<tr>
				<th style="text-align: center;height: 25px"><b></b></th>
				<th style="text-align: center;height: 25px"><b>Especialistas requeridos para esta actividad</b></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="background-color: #f5f5f5;text-align: center;width: 200px;">
					<div style="height: 450px;overflow-y: scroll;">
						<?php foreach($listaEspecialidad as $key => $value){ ?>
							<div class="cajonEspecialidad">
								<small><?=$value->nombre_esp?></small>
							</div>
						<?php } ?>
					</div>
				</td>
				<td style="background-color: #f5fbfb;">
					<h3 style="color: #999999;text-align: center;">Arrastre especialidades de la izquierda</h3>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<script src="<?=base_url()?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/dist/js/bootstrap-select.js"></script>
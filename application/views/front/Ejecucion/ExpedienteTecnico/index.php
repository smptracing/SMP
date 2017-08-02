<div class="right_col" role="main">
	<div>
		<div class="clearfix"></div>
		<div class="col-md-12 col-xs-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2><b>EXPEDIENTE TÉCNICO</b></h2>
					<div class="clearfix"></div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<button type="button" class="btn btn-primary " onclick="paginaAjaxDialogo(null, 'Registro de componentes, metas y partidas', null, base_url+'index.php/ET_Componente/insertar', 'GET', null, null, false, true);">
								NUEVO
							</button>
							<button type="button" class="btn btn-primary " onclick="paginaAjaxDialogo(null, 'Administración de partidad y analítico', null, base_url+'index.php/ET_Partida/insertar', 'GET', null, null, false, true);">
								NUEVA
							</button>
								<button type="button" class="btn btn-primary " onclick="paginaAjaxDialogo(null, 'Registrar Expediente Técnico', null, base_url+'index.php/Expediente_Tecnico/insertar', 'GET', null, null, false, true);">
								NUEVO EXPEDIENTE
							</button>
							<button onclick="codigo()"> NUEVO EXPEDIENTE</button>
							<div class="x_title">
								<div class="clearfix"></div>
							</div>
							<table id="table-ExpedienteTecnico"  class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<td>Unidad Ejecutora</td>
										<td>Nombre del proyecto</td>
										<td>Costo Total del proyecto Preinversion</td>
										<td>Costo Total del proyecto Inversion</td>
										<td>Tiempo Ejecucion</td>
										<td>Numero Beneficiarios</td>
										<td class="col-md-1 col-md-1 col-xs-12">ACCIONES</td>
									</tr>
								</thead>
								<tbody>
								<?php foreach($listaExpedienteTecnico as $item ){ ?>
								  	<tr>
										 <td>
												<?= $item->nombre_ue?>
											</td>
											<td>
												<?= $item->nombre_pi?>
											</td>
											<td>
												<?= $item->costo_total_preinv_et?>
											</td>
											<td>
												<?= $item->costo_total_inv_et?>
											</td>
											<td>
												<?= $item->tiempo_ejecucion_pi_et?>
											</td>
											<td>
												<?= $item->num_beneficiarios?>
											</td>
											<td>
										  		<button type='button' class='editar btn btn-primary btn-xs'><i class='ace-icon fa fa-pencil bigger-120'></i></button>
										  		<button type='button' class='eliminar btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></button>
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
		<div class="clearfix"></div>
	</div>
</div>
<script>
	$(document).ready(function()
	{
		$('#table-ExpedienteTecnico').DataTable(
		{
			"language":idioma_espanol
		});
	});
function codigo()
{
	swal({
	  title: "Buscar",
	  text: "Proyecto: Ingrese código único del proyecto",
	  type: "input",
	  showCancelButton: true,
	  closeOnConfirm: false,
	  inputPlaceholder: "Ingrese Codigo Unico"
	}, function (inputValue) {
	  if (inputValue === false) return false;
	  if (inputValue === "") {
	    swal.showInputError("Ingrese Codigo Unico!");
	    return false
	  }
	  paginaAjaxDialogo(null, 'Registrar Expediente Técnico',{CodigoUnico:inputValue}, base_url+'index.php/Expediente_Tecnico/insertar', 'GET', null, null, false, true);
	  swal("Correcto!", "Correcto: " + inputValue, "success");
	});

}

</script>
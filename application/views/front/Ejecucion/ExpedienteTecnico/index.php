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
							<button onclick="codigo()" class="btn btn-primary"> NUEVO</button>
							<div class="x_title">
								<div class="clearfix"></div>
							</div>
							<table id="table-ExpedienteTecnico" style="text-align: center;" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<td>Unidad Ejecutora</td>
										<td>Nombre del proyecto</td>
										<td>Costo Total del proyecto Preinversion</td>
										<td>Costo Total del proyecto Inversion</td>
										<td>Tiempo Ejecucion</td>
										<td>Numero Beneficiarios</td>
										<td class="col-md-2 col-md-2 col-xs-12">ACCIONES</td>
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
												<button type='button' title='Registro de componentes, metas y partidas' class='editar btn btn-warning btn-xs' onclick="paginaAjaxDialogo(null, 'Registro de componentes, metas y partidas', null, base_url+'index.php/ET_Componente/insertar', 'GET', null, null, false, true);"><i class='ace-icon fa fa-align-left bigger-120'></i></button>
												<button type='button' title='Administración de partidad y analítico' class='editar btn btn-success btn-xs' onclick="paginaAjaxDialogo(null, 'Administración de partidad y analítico', null, base_url+'index.php/ET_Partida/insertar', 'GET', null, null, false, true);"><i class='ace-icon fa fa-indent bigger-120'></i></button>
												<a type="button" title='Ficha tecnica de expediente tecnico' class="btn btn-info btn-xs" href="<?= site_url('Expediente_Tecnico/reportePdfExpedienteTecnico/'.$item->id_et);?>" target="_blank"><i class='ace-icon fa fa-file-pdf-o bigger-120'></i></a>
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
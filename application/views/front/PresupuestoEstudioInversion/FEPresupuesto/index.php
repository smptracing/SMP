<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="">
			<div class="col-md-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><i class="fa fa-bars"></i>PRESUPUESTO   Proyecto Inversión:<?= $nombreProyectoInv->nombre_est_inv?></h2>
						<ul class="nav navbar-right panel_toolbox">
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="" role="tabpanel" data-example-id="togglable-tabs">
							<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
								<li role="presentation" class="active"><a href="#tab_etapasFE" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"> <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>Presupuesto</a>
								</li>
							</ul>
							<div id="myTabContent" class="tab-content">
								<div role="tabpanel" class="tab-pane fade active in" id="#tab_etapasFE" aria-labelledby="home-tab">
									<div class="row">
										<div class="col-md-12 col-xs-12">
											<div class="x_panel">
												<button type="button" class="btn btn-primary " onclick="paginaAjaxDialogo(null, 'Registro de Presupuesto para Formulación y Evaluación', { id: '<?=$nombreProyectoInv->codigo_unico_est_inv?>' }, base_url+'index.php/FE_Presupuesto_Inv/insertar', 'GET', null, null, false, true);"  >
													<span class="fa fa-plus-circle"></span>
													Nuevo
												</button>
												<button type="button" class="btn btn-primary " onclick="paginaAjaxDialogo(null, 'Detalle de Presupuesto para Formulación y Evaluación',null, base_url+'index.php/FE_Detalle_Presupuesto/insertar', 'GET', null, null, false, true);"  >
													<span class="fa fa-plus-circle"></span>
													Nuevo
												</button>
											</button>
											<div class="x_title">
												<ul class="nav navbar-right panel_toolbox">
													<li>
														<a class="collapse-link">
															<i class="fa fa-chevron-up"></i>
														</a>
													</li>
													<li>
														<a class="close-link">
															<i class="fa fa-close"></i>
														</a>
													</li>
												</ul>
												<div class="clearfix"></div>
											</div>
											<div class="x_content">
												<table id="table-Presupuesto" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
													<thead>
														<tr>
															<td>Sector</td>
															<td>Pliego</td>
															<td>Presupuesto</td>
															<td class="col-md-1 col-md-1 col-xs-12"></td>
														</tr>
													</thead>
													<tbody>
														<?php foreach($ListarPresupuesto as $item ){ ?>
															<tr>
																<td>
																<?=$item->nombre_sector?>
																</td>
																<td>
																<?=$item->pliego?>
																</td>
																<td>
																<?=$item->PresupuestoTotal?>
																</td>
																<td>
																  	<button type='button' class='editar btn btn-primary btn-xs' ><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
</div>
<?php
$sessionTempCorrecto=$this->session->flashdata('correcto');
$sessionTempError=$this->session->flashdata('error');

if($sessionTempCorrecto){ ?>
	<script>swal('','<?=$sessionTempCorrecto?>', "success");</script>
<?php }

if($sessionTempError){ ?>
	<script>swal('','<?=$sessionTempError?>', "error");</script>
<?php } ?>
<script>
	$(document).ready(function()
	{
		$('#table-Presupuesto').DataTable(
		{
			"language":idioma_espanol
		});
	});
</script>
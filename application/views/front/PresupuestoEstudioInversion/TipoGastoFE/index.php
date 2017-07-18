<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="">
			<div class="col-md-12 col-xs-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><i class="fa fa-bars"></i> Tipo Gasto </h2>
						<ul class="nav navbar-right panel_toolbox">
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="" role="tabpanel" data-example-id="togglable-tabs">
							<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
								<li role="presentation" class="active">
									<a href="#tab_Sector"  id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">
										<span class="glyphicon glyphicon-inbox" aria-hidden="true">
										</span> Tipo Gasto
									</a>
								</li>
							</ul>
							<div id="myTabContent" class="tab-content">
								<!-- /Contenido del sector -->
								<div role="tabpanel" class="tab-pane fade active in" id="tab_Sector" aria-labelledby="home-tab">
									<!-- /tabla de sector desde el row -->
									<div class="row">  
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="x_panel">
												<button type="button" class="btn btn-primary " onclick="paginaAjaxDialogo(null, 'Registrar tipo de gasto', null, base_url+'index.php/Tipo_Gasto_FE/insertar', 'GET', null, null, false, true);">
													NUEVO
												</button>
													<div class="x_title">                                                              
														<ul class="nav navbar-right panel_toolbox">
															<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
															</li>
															<li><a class="close-link"><i class="fa fa-close"></i></a>
															</li>
														</ul>
														<div class="clearfix"></div>
													</div>
													<div class="x_content">
														<table id="table-Tipo_Gasto_FE"  class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
															<thead>
																<tr>
																	<td>TIPO DE GASTO</td>
																	<td class="col-md-1 col-md-1 col-xs-12"></td>
																</tr>
															</thead>
															<tbody>
																<?php foreach($ListaTipoGastoFE as $item ){ ?>
																	  <tr>
																		  <td>
																		  	<?=$item->desc_tipo_gasto?>
																		  </td>
																		  <td>
																		  	<button type='button' class='editar btn btn-primary btn-xs' onclick="paginaAjaxDialogo(null, 'Modificar tipo  de gasto',{id:'<?=$item->id_tipo_gasto?>'}, base_url+'index.php/Tipo_Gasto_FE/editar', 'POST', null, null, false, true)"><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>
																		  </td>
																	  </tr>
															     <?php } ?>
															</tbody>
														</table>
													</div>
											</div>
										</div>
									</div>
										<!-- / fin tabla de sector desde el row -->
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
		$('#table-Tipo_Gasto_FE').DataTable(
		{
			"language":idioma_espanol
		});
	});
</script>
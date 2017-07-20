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
											<button type="button" class="btn btn-primary " onclick="paginaAjaxDialogo(null, 'Registrar tipo  de gasto', null, 'http://localhost/smp/index.php/Tipo_Gasto_FE/insertar', 'POST', null, null, false, true)" >
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
														<!--<thead>
															<tr>
																<th class="col-sm-1">ID</th>
																<th class="">TIPO DE GASTO</th>
																<th class="col-sm-2"></th>
															</tr>
														</thead>-->
														<thead>
														<tr>
															<td>ID</td>
															<td>TIPO DE GASTO</td>
															<td class="col-md-1 col-md-1 col-xs-12"></td>
														</tr>
													</thead>
													<?php foreach($Tipo_Gasto_FE as $Tipo_Gasto_FE ){ ?>
														  <tr>
															  <td>
															  <?=$Tipo_Gasto_FE->id_tipo;?>
															  </td>
															  <td>
															  <?= $Tipo_Gasto_FE->descripcion_tipo;?>
															  </td>
															  <td>
															  <button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#VentanaModificarFuncion'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='eliminar btn btn-danger btn-xs' data-toggle='modal' data-target='#'><i class='fa fa-trash-o'></i></button>
															  </td>
														  </tr>
												     <?php } ?>
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

	<script type="text/javascript">
		$(document).ready(function()
		{
			$('#table-Tipo_Gasto_FE').DataTable();
		} );
	</script>
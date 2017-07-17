<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="">
			<div class="col-md-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><i class="fa fa-bars"></i>UNIDAD  DE MEDIDA</h2>
						<ul class="nav navbar-right panel_toolbox">
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="" role="tabpanel" data-example-id="togglable-tabs">
							<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
								<li role="presentation" class="active"><a href="#tab_etapasFE" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"> <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>Etapas</a>
								</li>
							</ul>
							<div id="myTabContent" class="tab-content">
								<div role="tabpanel" class="tab-pane fade active in" id="#tab_etapasFE" aria-labelledby="home-tab">
									<div class="row">
										<div class="col-md-12 col-xs-12">
											<div class="x_panel">
												<button type="button" class="btn btn-primary " onclick="paginaAjaxDialogo(null, 'Registrar Unidad de Medida', null, base_url+'index.php/Unidad_Medida/insertar', 'POST', null, null, false, true)" >
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
												<table id="table-UnidadaMedida" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
													<thead>
														<tr>
															<td>Id</td>
															<td>Descripción</td>
															<td class="col-md-1 col-md-1 col-xs-12"></td>
														</tr>
													</thead>
													<?php foreach($Unidad_Medida as $Unidad_Medida ){ ?>
														  <tr>
															  <td>
															  <?=$Unidad_Medida->id_unidad;?>
															  </td>
															  <td>
															  <?= $Unidad_Medida->descripcion;?>
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
			$("#form-addUnidad_Medida").submit(function(event)
			{
				event.preventDefault();
				$.ajax(
				{
					url:base_url+"index.php/Unidad_Medida/insertar",
					type:$(this).attr('method'),
					data:$(this).serialize(),
					success:function(resp)
					{
					   swal("",resp, "success");
					   $('#table-UnidadaMedida').dataTable()._fnAjaxUpdate();

					}
				});
			});

			$(document).ready(function()
			{
		    
		        $('#table-UnidadaMedida').DataTable
		        ( {
			        "columnDefs": 
			        [
			            {
			                "targets": [ 0 ],
			                "visible": false,
			                "searchable": true
			            },  
			        ],
			         "language":idioma_espanol
		   		 } );		        
			} );

</script>

<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="">
			<div class="col-md-12 col-xs-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><b>PRESUPUESTO DE EJECUCION</b> </h2>
						<ul class="nav navbar-right panel_toolbox">
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="" role="tabpanel" data-example-id="togglable-tabs">
							<ul id="myTab" class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active">
									<a href="#tab_Sector"  id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">
										<b> Presupuesto</b>
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
												<button type="button" class="btn btn-primary " onclick="paginaAjaxDialogo(null, 'Registrar Nuevo Presupuesto de Ejecucion', null, base_url+'index.php/ET_Presupuesto_Ejecucion/insertar', 'POST', null, null, false, true);">
													NUEVO
												</button>
													<div class="x_title">                                                              
											
														<div class="clearfix"></div>
													</div>
													<div class="x_content">
														<table id="table-Presupuesto_Ejecucion"  class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
															<thead>
																<tr>
																	<td>Descripcion</td>
																	<td class="col-md-1 col-md-1 col-xs-12">ACCIONES</td>
																</tr>
															</thead>
															<tbody>
															<?php foreach($listaPresupuestoEjecucion as $item ){ ?>
															  	<tr>
																	<td>
																		<?=$item->desc_presupuesto_ej?>
															    	</td>
																	<td>
																  		<button type='button' class='editar btn btn-primary btn-xs' onclick="paginaAjaxDialogo(null, 'Modificar Presupuesto', { id: '<?=$item->id_presupuesto_ej?>' }, base_url+'index.php/ET_Presupuesto_Ejecucion/editar', 'GET', null, null, false, true);"><i class='ace-icon fa fa-pencil bigger-120'></i></button>
																  		<button type='button' class='eliminar btn btn-danger btn-xs' onclick="Eliminar(<?=$item->id_presupuesto_ej?>)"><i class='fa fa-trash-o'></i></button>
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

<script>
	$(document).ready(function()
	{
		$('#table-Presupuesto_Ejecucion').DataTable(
		{
			"language":idioma_espanol
		});
	});

	function Eliminar(id_presupuesto_ej)
	{
		swal({
				title: "Esta seguro que desea eliminar el presupuesto de ejecucion?",
				text: "",
				type: "warning",
				showCancelButton: true,
				cancelButtonText:"CERRAR" ,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "SI,Eliminar",
				closeOnConfirm: false
			},
			function()
			{
				$.ajax({
                        url:base_url+"index.php/ET_Presupuesto_Ejecucion/eliminar",
                        type:"POST",
                        data:{id_presupuesto_ej:id_presupuesto_ej},
                        success:function(respuesta)
                        {
							
							swal("ELIMINADO!", "Se elimino correctamente el clasificador.", "success");
							window.location.href='<?=base_url();?>index.php/ET_Presupuesto_Ejecucion/index/';
							renderLoading();
                        }
                    });
			});
	}

</script>
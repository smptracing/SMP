<style>
	.modal-dialog
	{
		width: 90%;
		margin: 0;
		margin-left: 5%;
		padding: 0;
	}

	.modal-content
	{
		height: auto;
		min-height: 100%;
		border-radius: 0;
	}
</style>

<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="">
			<div class="col-md-12 col-xs-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><b>DETALLE EXPEDIENTE SIAF</b> </h2>
						<ul class="nav navbar-right panel_toolbox">
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="" role="tabpanel" data-example-id="togglable-tabs">
					
							<div id="myTabContent" class="tab-content">
								<!-- /Contenido del sector -->
								<div role="tabpanel" class="tab-pane fade active in" id="tab_Sector" aria-labelledby="home-tab">
									<!-- /tabla de sector desde el row -->
									<div class="row">
						                <div class="col-md-12 col-sm-12 col-xs-12">
										
					                        <div>					                        	
					                        	<table id="table-DatoGen"  class="table-hover" cellspacing="0" width="100%">
												<body>
										
													<?php $anio=0 ?>
													<?php $entidad=0 ?>
													<?php $expediente=0 ?>
													<?php $tipoOpe=0 ?>
													<?php $modalidadCompra=0 ?>
													<?php $tipoProceso=0 ?>

													<?php foreach($listadetalleOrdenExpSiaf as $item ){ ?>
														<?php  $anio = $item->ano_eje ;?>
														<?php  $entidad = $item->entidad;?>
														<?php  $expediente = $item->expediente;?>
														<?php  $tipoOpe = $item->tipo_operacion;?>
														<?php  $modalidadCompra = $item->modalidad_compra;?>
														<?php  $tipoProceso = $item->tipo_proceso;?>
																		    
													<?php } ?>


													<tr>
														<td><b>Año:</b> <?php  echo $anio ?> </td>
													</tr>
													<tr>
														<td><b>Entidad: </b><?php  echo $entidad ?> </td>
													</tr>
													<tr>
														<td><b>Expediente:</b> <?php  echo $expediente ?> </td>
													</tr>
													<tr>
														<td><b>Tipo de operación:</b> <?php  echo $tipoOpe ?> </td>
													</tr>
													<tr>
														<td><b>Modalidad de compra:</b>  <?php  echo $modalidadCompra ?>  </td>
													</tr>
													<tr>
														<td><b>Tipo de proceso: </b> <?php  echo $tipoProceso ?>  </td>
													</tr>
													
											
														
												</body>
											</table>

					                        </div>

						                </div>
						        	</div>
									<br>

									<div class="row">  
										<div class="col-md-12 col-sm-12 col-xs-12">
											<button id="btnActualizarExpediente" class="btn btn-success btn-xs" onclick="siafExpediente('<?php  echo $anio ?>', '<?php  echo $expediente ?>', '000747')">Actualizar estados de expediente</button>
											<table id="table-DetalleOrdenExpSiaf"  class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
												<thead>
													<tr>
														<td>Ciclo</td>
														<td>Fase</td>
														<td>Secuencia</td>
														<td>Correlativo</td>
														<td>Cod Doc</td>
														<td>Num Doc</td>
														<td>Fecha Doc</td>
														<td>Moneda</td>
														<td>Monto</td>
													</tr>
												</thead>
												<tbody>
													<?php foreach($listadetalleOrdenExpSiaf as $item ){ ?>
													  	<tr>
													    	<td>
																<?=$item->ciclo?>
													    	</td>
													    	<td>
																<?=$item->fase?>
													    	</td>
													    	<td>
																<?=$item->secuencia?>
													    	</td>
													    	<td>
																<?=$item->correlativo?>
													    	</td>
													    	<td>
																<?=$item->cod_doc?>
													    	</td>
													    	<td>
																<?=$item->num_doc?>
													    	</td>
													    	<td>
																<?=$item->fecha_doc?>
													    	</td>
													    	<td>
																<?=$item->moneda?>
													    	</td>
															<td>
																<?=number_format($item->monto,2)?>
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
		<div class="clearfix"></div>
	</div>
</div>
<script>
	function siafExpediente(anio_expediente, expediente, unidad_ejecutora) {
    	// var anio_expediente=$("#txtAnioExpediente").val();
    	// var expediente=$("#txtExpediente").val();
    	// var unidad_ejecutora=$("#txtUnidadEjecutora").val();

		var start = +new Date();
		var ups_url = '<?php $ups_url = $this->config->item('ups_url');echo $ups_url;?>';
		//alert(ups_url + "/Expediente/estado_expediente/" + anio_expediente + "/" + expediente +"/" +unidad_ejecutora);
    	$.ajax({
				url: ups_url + "/Expediente/estado_expediente/" + anio_expediente + "/" + expediente +"/" +unidad_ejecutora,
				type: "POST",
				cache: false,
		        contentType:false,
		        processData:false,
				beforeSend: function(request) {
					//request.setRequestHeader("Authorization", "Negotiate");
				    renderLoading();
				},
				success:function(data){
					$('#divModalCargaAjax').hide();
					datos=JSON.parse(data);
					var rtt = +new Date() - start;

					if(datos.actualizo)
					{
						swal(
						  'Operacion Completada',
						  datos.mensaje + ' Tiempo: ' + (rtt/1000) +'s',
						  'success'
						);
					}
					else
					{
						swal(
						  'No se pudo completar la Operacion',
						  datos.mensaje + ' Tiempo: ' + (rtt/1000) +'s',
						  'error'
						);
					}
				},
				error: function (xhr, textStatus, errorMessage) {
			        $('#divModalCargaAjax').hide();
			        swal(
						  'ERROR!',
						  'No se pudo conectar con el servidor de Importacion, error 0x5642418',
						  'error'
						);
			    }
			});
    }
</script>
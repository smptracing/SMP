<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="">
			<div class="col-md-12 col-xs-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><b>REPORTE DE CALIFICACIÓN DE SEGUIMIENTO A CERTIFICADO</b> </h2>
						<ul class="nav navbar-right panel_toolbox">
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="" role="tabpanel" data-example-id="togglable-tabs">
							<ul id="myTab" class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active">
									<a href="#tabde_Sector"  id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">
										<b> Proyecto de Inversión</b>
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
													<div class="clearfix">
														<div class="pull-right tableTools-container"></div>
													</div>
													<div class="x_content">
														BÚSQUEDA POR AÑO: 
														<div class="row">
													
														  <div class="col-lg-6">
														    <div class="input-group">
														      <input type="text" id="BuscarPipAnio" value="<?= $anio?>"  class="form-control" placeholder="Ingrese Año">
														      <span class="input-group-btn">
														        <button id="AnioPip" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"> Buscar</span></button>
														      </span>
														    </div>
														  </div>
														  <div class="col-lg-6">
														    <div class="input-group">
														      <span class="input-group-btn">

														        <a href="javascript:siafActualizadorCertificado()"><button id="BtnAcatualizar" class="btn btn-success" type="button"><i class="fa fa-spinner"></i> Actualizar Avance Financiero Total</button></a>
														      </span>
														    </div>
														  </div>
								
														</div>			
			

															<div class="row" style="margin-left: 10px; margin:10px; ">
																<div class="panel panel-default">
																	<div class="panel-heading"> CONSOLIDADO DE AVANCE FISICO Y FINANCIERO DE OBRA </div>
																 
																	  	<div id="avancefisicoFinan" class="">
																			<br>
																			<table id="table-consolidadoAvance" style="text-align: center;" class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%"> 
																			 	<thead>
																				 	<tr>
																					 	<td>Proy snip</td>
																					 	<td>Sec</td>
																					 	<td>Nombre</td>
																					 	<td>Costo</td>
																					 	<td>Pim</td>
																					 	<td>Monto Certif</td>
																					 	<td>Avance</td>
																					 	<td>Seguimiento</td>
																					 	<td>Saldo porProg</td>
																				 	</tr>
																			 	</thead>
																			 	<tbody>
																					<?php foreach($Consolidado as $item ){ ?>
																					  	<tr>
																							<td>
																								<?=$item->proyecto_snip?>
																					    	</td>
																					    	<td>
																								<?=$item->sec_func?>
																					    	</td>
																					    	<td>
																								<?=$item->nombre?>
																					    	</td>
																					    	<td>
																								<?=$item->costo_actual?>
																					    	</td>
																					    	<td>
																								<?=$item->pim_acumulado?>
																					    	</td>
																					    	<td>
																								<?=$item->monto_certificado?>
																					    	</td>
																					    	<td>
																								<?=$item->avance_pim_cert?>
																					    	</td>
																					    	<td>
																								<?=$item->para_seguimiento?>
																					    	</td>
																					    	<td>
																								<?=$item->saldo_por_gastar?>
																					    	</td>
																					  </tr>
																					<?php } ?>
																				</tbody>	
																		  </table> 

																	  </div>
																</div>
															</div>
															
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

$(document).on("ready" ,function(){
	

$("#AnioPip").on( "click", function()
	{
		avanceFisico();
	});	

	var myTable=$('#table-consolidadoAvance').DataTable(
	{
		"language":idioma_espanol
	});
		
	$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

	new $.fn.dataTable.Buttons( myTable, {
		buttons: [
		  {
			"extend": "excel",
			"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
			"className": "btn btn-white btn-primary btn-bold"
		  },
		  {
			"extend": "pdf",
			"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
			"className": "btn btn-white btn-primary btn-bold"
		  },
		  {
			"extend": "print",
			"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
			"className": "btn btn-white btn-primary btn-bold",
			autoPrint: false,
			message: 'This print was produced using the Print button for DataTables'
		  }		  
		]
	} );
	myTable.buttons().container().appendTo( $('.tableTools-container') );

});
function avanceFisico()
{
		$("#avancefisicoFinan").show(2000);

		var anio=$("#BuscarPipAnio").val();
		window.location.href=base_url+"index.php/ProyectoInversion/ReporteBuscadorPorAnio/"+anio;


}
function siafActualizadorCertificado() 
	{
		var anio=$("#BuscarPipAnio").val();
		var urll="http://192.168.1.100:8080/importador_siaf/index.php/ImporSeguimientoCertificado/inicio/"+anio;
	    ventana=window.open(urll, 'Nombre de la ventana', 'widtd=1400,height=800');
	    window.location.href=base_url+"index.php/ProyectoInversion/ReporteBuscadorPorAnio/"+anio;
	}

</script>


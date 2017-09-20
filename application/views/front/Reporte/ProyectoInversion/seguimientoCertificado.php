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
														      <input type="text" id="BuscarPipAnio"  class="form-control" placeholder="Ingrese Año">
														      <span class="input-group-btn">
														        <button id="AnioPip" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"> Buscar</span></button>
														      </span>
														    </div>
														  </div>
								
														</div>			
			

															<div class="row" style="margin-left: 10px; margin:10px; ">
																<div class="panel panel-default">
																	<div class="panel-heading"> CONSOLIDADO DE AVANCE FISICO Y FINANCIERO DE OBRA </div>
																 
																	  	<div id="avancefisicoFinan">
																			<br>
																			<table id="table-consolidadoAvance" class="table  table-striped jambo_table bulk_action" style="text-align: left;"> 
																			 
																		  </table> 
																	  </div>
																</div>
															</div>
																		
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
		$("#avancefisicoFinan").show(2000);

		var anio=$("#BuscarPipAnio").val();
		
		$.ajax({
		"url":base_url+"index.php/PrincipalReportes/ConsolidadoAvanceFisicoFinan",
		type:"POST",
		data:{anio:anio},
		success: function(data)
			{
		        var datos=JSON.parse(data); 
		        var html;
				html+="<thead><tr><th>Proy snip</th><th>Sec</th><th>Nombre</th><th>Costo</th><th>Pim</th><th>Monto Certif</th><th>Avance</th><th>Seguimiento</th><th>Saldo porProg</th></tr></thead>"
				$.each( datos, function( key, value ) {
				  html +="<tbody> <tr><th>"+value.proyecto_snip+"</th><th>"+value.sec_func+"</th><th>"+value.nombre+"</th><th>"+value.costo_actual+"</th><th>"+value.pim_acumulado+"</th><th>"+value.monto_certificado+"</th><th>"+value.avance_pim_cert+"</th><th>"+value.para_seguimiento+"</th><th>"+value.saldo_por_gastar+"</th></tr>";      
						html +="</tbody>";
				});
	
				$("#table-consolidadoAvance").html(html);

				
			}
		});
		});	
});

</script>


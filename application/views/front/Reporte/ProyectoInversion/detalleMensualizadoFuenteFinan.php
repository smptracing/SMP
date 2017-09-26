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
						<h2><b>DATOS GENERALES Y DETALLE POR FUENTE DE FINANCIAMIENTO</b> </h2>
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
					                        	<table id="table-DatoGenerales"  class="table-hover" cellspacing="0" width="100%">
												<body>
													
													<tr>
														<td>AÑO: <?=$listaDetalleMensualizadoFuenteFinanDatosG->ano_eje;?>  </td>
													</tr>
													<tr>
														<td>CORRELATIVO META: <?=$listaDetalleMensualizadoFuenteFinanDatosG->meta;?>  </td>
													</tr>
													<tr>
														<td>NOMBRE DEL PROYECTO: <?=$listaDetalleMensualizadoFuenteFinanDatosG->nombre;?>  </td>
													</tr>
													<tr>
														<td>FINALIDAD: <?=$listaDetalleMensualizadoFuenteFinanDatosG->nombre_finalidad;?>  </td>
													</tr>
												</body>
											
											</table>

					                        </div>

						                </div>
						        	</div>
									<br>
									<div class="row">  
										<div class="col-md-12 col-sm-12 col-xs-12">
											<table id="table-DetalleMensualizado"  class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
												<thead>
													<tr>
										
														<td>Fuente Financiamiento</td>
														<td>Pia</td>
														<td>Pim</td>
														<td>Pim Acumulado</td>
														<td>Monto Finan 1</td>
														<td>Monto Finan 2</td>
														<td>Ejecución</td>
														<td>Compromiso</td>
														<td>Certificado</td>
														<td>Devengado</td>
														<td>Girado</td>
														<td>Pagado</td>
														<td>Ampliación</td>
														<td>Crédito</td>
														
													</tr>
												</thead>
												<tbody>
													<?php foreach($listaDetalleMensualizadoFuenteFinan as $item ){ ?>
													  	<tr>
															<td>
																<?=$item->fuente_financ?>
													    	</td>
													    	<td>
																<?=$item->pia?>
													    	</td>
													    	<td>
																<?=$item->pim?>
													    	</td>
													    	<td>
																<?=$item->pim_acumulado?>
													    	</td>
													    	<td>
																<?=$item->monto_financ1?>
													    	</td>
													    	<td>
																<?=$item->monto_financ2?>
													    	</td>
													    	<td>
																<?=$item->ejecucion?>
													    	</td>
													    	<td>
																<?=$item->compromiso?>
													    	</td>
													    	<td>
																<?=$item->monto_certificado?>
													    	</td>
													    	<td>
																<?=$item->devengado?>
													    	</td>
													    	<td>
																<?=$item->girado?>
													    	</td>
													    	<td>
																<?=$item->pagado?>
													    	</td>
													    	<td>
																<?=$item->ampliacion?>
													    	</td>
													    	<td>
																<?=$item->credito?>
													    	</td>
													    	
													  </tr>
													<?php } ?>
												</tbody>
											
											</table>
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
window.setTimeout(function()
{
	var meta=document.getElementById("txtcorrelativo").value;
	var anio=document.getElementById("txtanioMeta").value;

	$("#contenedorGrafico").css({"height":"450"});
	$.ajax({
		"url":base_url+"index.php/PrincipalReportes/GrafDetalleMensualizado",
		type:"GET", 
		data:{meta:meta,anio:anio},
		cache:false,
		success:function(resp)
		{
			//alert(resp);
			var pip=JSON.parse(resp);
			var dom = document.getElementById("contenedorGrafico");
			var myChart = echarts.init(dom);
			var app = {};
			option = null;
			var posList = [
			    'left', 'right', 'top', 'bottom',
			    'inside',
			    'insideTop', 'insideLeft', 'insideRight', 'insideBottom',
			    'insideTopLeft', 'insideTopRight', 'insideBottomLeft', 'insideBottomRight'
			];

			app.configParameters = {
			    rotate: {
			        min: -90,
			        max: 90
			    },
			    align: {
			        options: {
			            left: 'left',
			            center: 'center',
			            right: 'right'
			        }
			    },
			    verticalAlign: {
			        options: {
			            top: 'top',
			            middle: 'middle',
			            bottom: 'bottom'
			        }
			    },
			    position: {
			        options: echarts.util.reduce(posList, function (map, pos) {
			            map[pos] = pos;
			            return map;
			        }, {})
			    },
			    distance: {
			        min: 0,
			        max: 100
			    }
			};

			app.config = {
			    rotate: 90,
			    align: 'left',
			    verticalAlign: 'middle',
			    position: 'insideBottom',
			    distance: 15,
			    onChange: function () {
			        var labelOption = {
			            normal: {
			                rotate: app.config.rotate,
			                align: app.config.align,
			                verticalAlign: app.config.verticalAlign,
			                position: app.config.position,
			                distance: app.config.distance
			            }
			        };
			        myChart.setOption({
			            series: [{
			                label: labelOption
			            }, {
			                label: labelOption
			            }, {
			                label: labelOption
			            }, {
			                label: labelOption
			            }]
			        });
			    }
			};


			var labelOption = {
			    normal: {
			        show: true,
			        position: app.config.position,
			        distance: app.config.distance,
			        align: app.config.align,
			        verticalAlign: app.config.verticalAlign,
			        rotate: app.config.rotate,
			        formatter: '{c}  {name|{a}}',
			        fontSize: 10,
			        rich: {
			            name: {
			                textBorderColor: '#fff'
			            }
			        }
			    }
			};

			option = {
			    color: ['#003366', '#16A085', '#4cabce', '#e5323e','#D35400','#8E44AD'],
			    tooltip: {
			        trigger: 'axis',
			        axisPointer: {
			            type: 'shadow'
			        }
			    },
			    legend: {
			        data: ['Ejecucion', 'Compromiso','Certificado','Devengado', 'Girado','Pagado']
			    },
			    toolbox: {
			        show: true,
			        orient: 'vertical',
			        left: 'right',
			        top: 'center',
			        feature: {
			            mark: {show: true},
			            dataView: {show: true, readOnly: false},
			            magicType: {show: true, type: ['line', 'bar', 'stack', 'tiled']},
			            restore: {show: true},
			            saveAsImage: {show: true}
			        }
			    },
			    calculable: true,
			    xAxis: [
			        {
			            type: 'category',
			            axisTick: {show: false},
			            data: pip[0]
			        }
			    ],
			    yAxis: [
			        {
			            type: 'value'
			        }
			    ],
			    series: [
			        {
			            name: 'Ejecucion',
			            type: 'bar',
			            barGap: 0,
			            label: labelOption,
			            data: pip[1]
			        },
			        {
			            name: 'Compromiso',
			            type: 'bar',
			            label: labelOption,
			            data: pip[2]
			        },
			          {
			            name: 'Certificado',
			            type: 'bar',
			            label: labelOption,
			            data: pip[3]
			        },
			        {
			            name: 'Devengado',
			            type: 'bar',
			            label: labelOption,
			            data: pip[4]
			        },
			        {
			            name: 'Girado',
			            type: 'bar',
			            label: labelOption,
			            data: pip[5]
			        },
			        {
			            name: 'Pagado',
			            type: 'bar',
			            label: labelOption,
			            data: pip[6]
			        }
			    ]
			};

			if (option && typeof option === "object") {
			    myChart.setOption(option, true);
			}
		}
	});
}, 5000);
</script>